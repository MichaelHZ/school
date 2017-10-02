<?php
/**
 * DouPHP
 * --------------------------------------------------------------------------------------------------
 * 版权所有 2013-2015 漳州豆壳网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.douco.com
 * --------------------------------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在遵守授权协议前提下对程序代码进行修改和使用；不允许对程序代码以任何形式任何目的的再发布。
 * 授权协议：http://www.douco.com/license.html
 * --------------------------------------------------------------------------------------------------
 * Author: DouCo
 * Release Date: 2015-10-16
 */
define('IN_DOUCO', true);

require (dirname(__FILE__) . '/include/init.php');

// rec操作项的初始化
$rec = $check->is_rec($_REQUEST['rec']) ? $_REQUEST['rec'] : 'default';
// 获取参数
$cat_id = $check->is_number($_REQUEST['cat_id']) ? $_REQUEST['cat_id'] : 0;
// 图片上传
include_once (ROOT_PATH . 'include/upload.class.php');
$images_dir = 'images/article/'; // 文件上传路径，结尾加斜杠
$thumb_dir = ''; // 缩略图路径（相对于$images_dir） 结尾加斜杠，留空则跟$images_dir相同
$img = new Upload(ROOT_PATH . $images_dir, $thumb_dir); // 实例化类文件
if (!file_exists(ROOT_PATH . $images_dir)) {
    mkdir(ROOT_PATH . $images_dir, 0777);
}

// 赋值给模板
$smarty->assign('rec', $rec);
$smarty->assign('HTTP_HOST', $_SERVER['HTTP_HOST']);
$smarty->assign('cur', 'article');

/**
 * +----------------------------------------------------------
 * 文章列表
 * +----------------------------------------------------------
 */
if ($rec == 'active') {
	$val = intval($_POST['val']) > 0?0:1;
	if(intval($_POST['id']) > 0){
		$id = intval($_POST['id']);
	}else{
		echo "数据错误";
		exit;
	}
	$sql = "UPDATE ".$dou->table('article_category')." Set is_password = '{$val}' Where cat_id ='{$id}' ";
	
	if($dou->query($sql)){
		
		$sql = "UPDATE ".$dou->table('article')." Set is_password = '{$val}' Where cat_id ='{$id}' ";
		$dou->query($sql);
	}
	echo 'success';
}
if ($rec == 'default') {
  
 
    $smarty->assign('ur_here', $_LANG['article']);
    $href = isset($_GET['cat_id']) && intval($_GET['cat_id']) > 0 ? 'article.php?rec=add&cat_id='.intval($_GET['cat_id']):'article.php?rec=add';
    $smarty->assign('action_link', array (
            'text' => $_LANG['article_add'],
            'href' => $href, 
    ));
    
    // 获取参数
    $cat_id = $check->is_number($_REQUEST['cat_id']) ? $_REQUEST['cat_id'] : 0;
    if($cat_id > 0){
    	if(in_array($cat_id,$group_id_all)){
    		 $smarty->assign('IS_GROUP',true);
    	}

    	if(in_array($cat_id,$create_id_all)){
    		$smarty->assign('IS_CREATE',true);
    	}
    }
    
    $keyword = isset($_REQUEST['keyword']) ? trim($_REQUEST['keyword']) : '';
    
    // 筛选条件
    $where = ' WHERE cat_id IN (' . $cat_id . $dou->dou_child_id('article_category', $cat_id) . ') And stype = 1 ';
    if ($keyword) {
        $where = $where . " AND title LIKE '%$keyword%'";
        $get = '&keyword=' . $keyword;
    }
    
    // 分页
    $page = $check->is_number($_REQUEST['page']) ? $_REQUEST['page'] : 1;
    $page_url = 'article.php' . ($cat_id ? '?cat_id=' . $cat_id : '');
    $limit = $dou->pager('article', 15, $page, $page_url, $where, $get);
    
    $sql = "SELECT id, title, cat_id, image, add_time,user_id,is_password FROM " . $dou->table('article') . $where . " ORDER BY id DESC" . $limit;
    $query = $dou->query($sql);
    while ($row = $dou->fetch_array($query)) {
        $cat_name = $dou->get_one("SELECT cat_name FROM " . $dou->table('article_category') . " WHERE cat_id = '$row[cat_id]'");
		$own = $dou->get_one("SELECT nick_name FROM " . $dou->table('admin') . " WHERE user_id = '$row[user_id]'");
        $add_time = date("Y-m-d", $row['add_time']);
        
        $article_list[] = array (
                "id" => $row['id'],
				"is_password" => $row['is_password'],
                "cat_id" => $row['cat_id'],
                "cat_name" => $cat_name,
                "title" => $row['title'],
                "image" => $row['image'],
                "add_time" => $add_time,
				"own" => $own ? $own : '系统',
        );
    }
    
    // 首页显示文章数量限制框
    for($i = 1; $i <= $_CFG['home_display_article']; $i++) {
        $sort_bg .= "<li><em></em></li>";
    }
    
    // 赋值给模板
    $smarty->assign('if_sort', $_SESSION['if_sort']);
    $smarty->assign('sort', get_sort_article());
    $smarty->assign('sort_bg', $sort_bg);
    $smarty->assign('cat_id', $cat_id);
    $smarty->assign('keyword', $keyword);
    $smarty->assign('article_category', $dou->get_category_nolevel('article_category'));
    $smarty->assign('article_list', $article_list);
    $smarty->display('article.htm');
} 

/**
 * +----------------------------------------------------------
 * 文章添加
 * +----------------------------------------------------------
 */
elseif ($rec == 'add') {
    $smarty->assign('ur_here', $_LANG['article_add']);
	$href = $_GET['cat_id']?'article.php?cat_id='.$_GET['cat_id']:'article.php';
    $smarty->assign('action_link', array (
            'text' => $_LANG['article'],
            'href' => $href, 
    ));
    
    // 格式化自定义参数，并存到数组$article，文章编辑页面中调用文章详情也是用数组$article，
    if ($_DEFINED['article']) {
        $defined = explode(',', $_DEFINED['article']);
        foreach ($defined as $row) {
            $defined_article .= $row . "：\n";
        }
        $article['defined'] = trim($defined_article);
        $article['defined_count'] = count(explode("\n", $article['defined'])) * 2;
    }
    
    // CSRF防御令牌生成
    $smarty->assign('token', $firewall->set_token('article_add'));
    
    // 赋值给模板
    $smarty->assign('form_action', 'insert');
    $smarty->assign('article_category', $dou->get_category_nolevel('article_category'));
    $smarty->assign('article', $article);
    $smarty->assign('cur_time',time());
    $smarty->assign('cat_id',intval($_GET['cat_id']));
	 $smarty->assign('IS_SELF',true);
    $smarty->display('article.htm');
} 

elseif ($rec == 'insert') {
    if (empty($_POST['title']))
        $dou->dou_msg($_LANG['article_name'] . $_LANG['is_empty']);
    
    // 判断是否有上传图片/上传图片生成
    if ($_FILES['image']['name'] != "") {
        // 生成图片文件名
        $file_name = date('Ymd');
        for($i = 0; $i < 6; $i++) {
            $file_name .= chr(mt_rand(97, 122));
        }
        
        // 其中image指的是上传的文本域名称，$file_name指的是生成的图片文件名
        $upfile = $img->upload_image('image', $file_name);
        $file = $images_dir . $upfile;
        // $img->make_thumb($upfile, 100, 100); // 生成缩略图
    }
    
   if(!empty($_POST['file'])){
	  $file = trim(str_replace('http://'.$_SERVER['HTTP_HOST'],'',$_POST['file']),'/');
   }
    // 继承栏目的密码属性
	$is_password = $dou->get_one("SELECT is_password FROM " . $dou->table('article_category') . " Where cat_id = '{$_POST['cat_id']}' ");
	$password = $dou->get_one("SELECT password FROM " . $dou->table('article_category') . " Where cat_id = '{$_POST['cat_id']}' ");
	if($password == $_POST['password'] ){
		$_POST['password'] = '';
	}else{
		if($_POST['password'] == 'cssm'){
			$_POST['password'] = $password;
		}
	}
	
    // 格式化自定义参数
    $_POST['defined'] = str_replace("\r\n", ',', $_POST['defined']);
        
    // CSRF防御令牌验证
    $firewall->check_token($_POST['token'], 'article_add');
    $add_time = !empty($_POST['add_time'])? strtotime($_POST['add_time']) : time();
    $_POST['micromial'] =  $_POST['micromial'] ? $_POST['micromial'] : 0;
    $_POST['ctype'] =  $_POST['ctype'] ? $_POST['ctype'] : 0;
    if($_USER['group_id'] > 2){
    	$sql = "INSERT INTO " . $dou->table('article') . " (id, cat_id, title, defined, content, image ,keywords, add_time, description,source,micromail,custom_url,ctype,user_id,password,is_password)" . " VALUES (NULL, '$_POST[cat_id]', '$_POST[title]', '$_POST[defined]', '$_POST[content]', '$file', '$_POST[keywords]', '$add_time', '$_POST[description]','$_POST[source]','$_POST[micromail]','$_POST[custom_url]','$_POST[ctype]','$_USER[user_id]','$_POST[password]','$is_password')";
    }else{
    	$sql = "INSERT INTO " . $dou->table('article') . " (id, cat_id, title, defined, content, image ,keywords, add_time, description,source,micromail,custom_url,ctype,user_id,auditing,password,is_password)" . " VALUES (NULL, '$_POST[cat_id]', '$_POST[title]', '$_POST[defined]', '$_POST[content]', '$file', '$_POST[keywords]', '$add_time', '$_POST[description]','$_POST[source]','$_POST[micromail]','$_POST[custom_url]','$_POST[ctype]','$_USER[user_id]','1','$_POST[password]','$is_password')";
    }
    
    $dou->query($sql);
    
    $dou->create_admin_log($_LANG['article_add'] . ': ' . $_POST['title']);
    $dou->dou_msg($_LANG['article_add_succes'], $_POST['cat_id']?'article.php?cat_id='.$_POST['cat_id']:'article.php');
} 

/**
 * +----------------------------------------------------------
 * 文章编辑
 * +----------------------------------------------------------
 */
elseif ($rec == 'edit') {
    $smarty->assign('ur_here', $_LANG['article_edit']);
	
    
    // 验证并获取合法的ID
    $id = $check->is_number($_REQUEST['id']) ? $_REQUEST['id'] : '';
    
    $query = $dou->select($dou->table('article'), '*', '`id` = \'' . $id . '\'');
    $article = $dou->fetch_array($query);
    //var_dump($article);
    // 格式化自定义参数
    if ($_DEFINED['article'] || $article['defined']) {
        $defined = explode(',', $_DEFINED['article']);
        foreach ($defined as $row) {
            $defined_article .= $row . "：\n";
        }
        // 如果文章中已经写入自定义参数则调用已有的
        $article['defined'] = $article['defined'] ? str_replace(",", "\n", $article['defined']) : trim($defined_article);
        $article['defined_count'] = count(explode("\n", $article['defined'])) * 2;
    }
    $href = $article['cat_id']?'article.php?cat_id='.$article['cat_id']:'article.php';
    $smarty->assign('action_link', array (
            'text' => $_LANG['article'],
            'href' => $href, 
    ));
    // CSRF防御令牌生成
    $smarty->assign('token', $firewall->set_token('article_edit'));
    
    // 赋值给模板
    $smarty->assign('form_action', 'update');
    $smarty->assign('article_category', $dou->get_category_nolevel('article_category'));
    $smarty->assign('article', $article);
	//var_dump($article['user_id']);
    $smarty->assign('IS_SELF', $article['user_id'] == $_USER['user_id']);
    $smarty->display('article.htm');
} 

elseif ($rec == 'update') {
    if (empty($_POST['title']))
        $dou->dou_msg($_LANG['article_name'] . $_LANG['is_empty']);
        
    // 上传图片生成
    if ($_FILES['image']['name'] != "") {
        // 获取图片文件名
        $basename = addslashes(basename($_POST['image']));
        $file_name = substr($basename, 0, strrpos($basename, '.'));
        
        $upfile = $img->upload_image('image', "$file_name"); // 上传的文件域
        $file = $images_dir . $upfile;
        // $img->make_thumb($upfile, 100, 100); // 生成缩略图
        
        $up_file = ", image='$file'";
    }
	
   if(empty($up_file) && !empty($_POST['file'])){
	  $up_file =  ", image='".trim(str_replace('http://'.$_SERVER['HTTP_HOST'],'',$_POST['file']),'/')."'";
   }
    // 格式化自定义参数
    $_POST['defined'] = str_replace("\r\n", ',', $_POST['defined']);
    
    // CSRF防御令牌验证
    $firewall->check_token($_POST['token'], 'article_edit');
    $_POST['micromial'] =  $_POST['micromial'] ? $_POST['micromial'] : 0;
    $_POST['ctype'] =  $_POST['ctype'] ? $_POST['ctype'] : 0;
    $add_time = !empty($_POST['add_time'])? strtotime($_POST['add_time']) : time();
    $sql = "UPDATE " . $dou->table('article') . " SET cat_id = '$_POST[cat_id]', title = '$_POST[title]', defined = '$_POST[defined]' ,content = '$_POST[content]'" . $up_file . ", keywords = '$_POST[keywords]', description = '$_POST[description]',source='$_POST[source]',micromail='$_POST[micromail]',custom_url = '$_POST[custom_url]',add_time='$add_time',ctype='$_POST[ctype]',password = '$_POST[password]' WHERE id = '$_POST[id]' ";
	
    $dou->query($sql);
    
    $dou->create_admin_log($_LANG['article_edit'] . ': ' . $_POST['title']);
    $dou->dou_msg($_LANG['article_edit_succes'], $_POST['cat_id']?'article.php?cat_id='.$_POST['cat_id']:'article.php');
} 

/**
 * +----------------------------------------------------------
 * 首页商品筛选
 * +----------------------------------------------------------
 */
elseif ($rec == 'sort') {
    $_SESSION['if_sort'] = $_SESSION['if_sort'] ? false : true;
    
    // 跳转到上一页面
    $dou->dou_header($_SERVER['HTTP_REFERER']);
} 

/**
 * +----------------------------------------------------------
 * 设为首页显示商品
 * +----------------------------------------------------------
 */
elseif ($rec == 'set_sort') {
    // 验证并获取合法的ID
    $id = $check->is_number($_REQUEST['id']) ? $_REQUEST['id'] : $dou->dou_msg($_LANG['illegal'], 'article.php');
    
    $max_sort = $dou->get_one("SELECT sort FROM " . $dou->table('article') . " ORDER BY sort DESC");
    $new_sort = $max_sort + 1;
    $dou->query("UPDATE " . $dou->table('article') . " SET sort = '$new_sort' WHERE id = '$id'");
    
    $dou->dou_header($_SERVER['HTTP_REFERER']);
} 

/**
 * +----------------------------------------------------------
 * 取消首页显示商品
 * +----------------------------------------------------------
 */
elseif ($rec == 'del_sort') {
    // 验证并获取合法的ID
    $id = $check->is_number($_REQUEST['id']) ? $_REQUEST['id'] : $dou->dou_msg($_LANG['illegal'], 'article.php');
    
    $dou->query("UPDATE " . $dou->table('article') . " SET sort = '' WHERE id = '$id'");
    
    $dou->dou_header($_SERVER['HTTP_REFERER']);
} 

/**
 * +----------------------------------------------------------
 * 文章删除
 * +----------------------------------------------------------
 */
elseif ($rec == 'del') {
    // 验证并获取合法的ID
    $id = $check->is_number($_REQUEST['id']) ? $_REQUEST['id'] : $dou->dou_msg($_LANG['illegal'], 'article.php');
    $title = $dou->get_one("SELECT title FROM " . $dou->table('article') . " WHERE id = '$id'");
    
    if (isset($_POST['confirm']) ? $_POST['confirm'] : '') {
		 $cat_id = $dou->get_one("SELECT cat_id FROM " . $dou->table('article') . " WHERE id = '$id'");
		if(!check_aticle_is_self($id)){
			
			 $dou->dou_msg("无权限删除", 'article.php?cat_id='.$cat_id, '', '3');
		}
		
        // 删除相应商品图片
        $image = $dou->get_one("SELECT image FROM " . $dou->table('article') . " WHERE id = '$id'");
		if(!defined('IS_ADMIN_NEW')){
			
		}
		$image = $dou->get_one("SELECT image FROM " . $dou->table('article') . " WHERE id = '$id'");
        $dou->del_image($image);
        
        $dou->create_admin_log($_LANG['article_del'] . ': ' . $title);
		
        $dou->delete($dou->table('article'), "id = $id", "article.php?cat_id=$cat_id");
    } else {
        $_LANG['del_check'] = preg_replace('/d%/Ums', $title, $_LANG['del_check']);
        $dou->dou_msg($_LANG['del_check'], 'article.php', '', '30', "article.php?rec=del&id=$id");
    }
} 

/**
 * +----------------------------------------------------------
 * 批量操作选择
 * +----------------------------------------------------------
 */
elseif ($rec == 'action') {
    if (is_array($_POST['checkbox'])) {
        if ($_POST['action'] == 'del_all') {
            // 批量文章删除
			
			foreach($_POST['checkbox'] as $k=>$e){
				if(!check_aticle_is_self($e)){
					unset($_POST['checkbox'][$k]);
				}
			}
			 if (is_array($_POST['checkbox']) && !empty($_POST['checkbox']) ) {
				 $cat_id = $dou->get_one("SELECT cat_id FROM " . $dou->table('article') . " WHERE id = '{$_POST['checkbox'][0]}'");
				 $dou->del_all('article', $_POST['checkbox'], 'id', 'image','article.php?cat_id='.$cat_id);
			 }else{
				 $dou->dou_msg("所选文章无权删除");
			 }
        } elseif ($_POST['action'] == 'category_move') {
            // 批量移动分类
            $dou->category_move('article', $_POST['checkbox'], $_POST['new_cat_id']);
        }elseif($_POST['action'] == 'auditing_all'){
        	$dou->auditing_all('article', $_POST['checkbox'], 'id');
        } else {
            $dou->dou_msg($_LANG['select_empty']);
        }
    } else {
        $dou->dou_msg($_LANG['article_select_empty']);
    }
}
/**
 * +----------------------------------------------------------
 * 审核
 * +----------------------------------------------------------
 */
elseif ($rec == 'auditing') {
	$smarty->assign('ur_here', $_LANG['article']);
	$href = isset($_GET['cat_id']) && intval($_GET['cat_id']) > 0 ? 'article.php?rec=add&cat_id='.intval($_GET['cat_id']):'article.php?rec=add';
	$smarty->assign('action_link', array (
			'text' => $_LANG['article_add'],
			'href' => $href,
	));
	
	// 获取参数
	$cat_id = $check->is_number($_REQUEST['cat_id']) ? $_REQUEST['cat_id'] : 0;
	if($cat_id > 0){
		if(in_array($cat_id,$group_id_all)){
			$smarty->assign('IS_GROUP',true);
		}
		
		if(in_array($cat_id,$create_id_all)){
			$smarty->assign('IS_CREATE',true);
		}
	}
	
	$keyword = isset($_REQUEST['keyword']) ? trim($_REQUEST['keyword']) : '';
	
	// 筛选条件
	if($_USER['group_id'] > 2){
		$where = ' WHERE cat_id IN (' . $cat_id . $dou->dou_child_id('article_category', $cat_id) . ') And stype = 1 And auditing = 0 And cat_id not in ('.$backup_group_id.')';	
	}else{
		$where = ' WHERE cat_id IN (' . $cat_id . $dou->dou_child_id('article_category', $cat_id) . ') And stype = 1 And auditing = 0';
	}
	
	if ($keyword) {
		$where = $where . " AND title LIKE '%$keyword%'";
		$get = '&keyword=' . $keyword;
	}
	
	// 分页
	$page = $check->is_number($_REQUEST['page']) ? $_REQUEST['page'] : 1;
	$page_url = 'article.php' . ($cat_id ? '?cat_id=' . $cat_id : '');
	$limit = $dou->pager('article', 15, $page, $page_url, $where, $get);
	
	$sql = "SELECT id, title, cat_id, image, add_time,auditing FROM " . $dou->table('article') . $where . " ORDER BY id DESC" . $limit;
	/* echo $sql;
	exit; */
	$query = $dou->query($sql);
	while ($row = $dou->fetch_array($query)) {
		$cat_name = $dou->get_one("SELECT cat_name FROM " . $dou->table('article_category') . " WHERE cat_id = '$row[cat_id]'");
		$add_time = date("Y-m-d", $row['add_time']);
	
		$article_list[] = array (
				"id" => $row['id'],
				"cat_id" => $row['cat_id'],
				"cat_name" => $cat_name,
				"title" => $row['title'],
				"image" => $row['image'],
				"add_time" => $add_time
		);
	}
	
	// 首页显示文章数量限制框
	for($i = 1; $i <= $_CFG['home_display_article']; $i++) {
		$sort_bg .= "<li><em></em></li>";
	}
	
	// 赋值给模板
	$smarty->assign('if_sort', $_SESSION['if_sort']);
	$smarty->assign('sort', get_sort_article());
	$smarty->assign('sort_bg', $sort_bg);
	$smarty->assign('cat_id', $cat_id);
	$smarty->assign('keyword', $keyword);
	$smarty->assign('article_category', $dou->get_category_nolevel('article_category'));
	$smarty->assign('article_list', $article_list);

	$smarty->display('article.htm');
}

/**
 * +----------------------------------------------------------
 * 获取首页显示文章
 * +----------------------------------------------------------
 */
function get_sort_article() {
    $limit = $GLOBALS['_DISPLAY']['home_article'] ? ' LIMIT ' . $GLOBALS['_DISPLAY']['home_article'] : '';
    $sql = "SELECT id, title FROM " . $GLOBALS['dou']->table('article') . " WHERE stype=1 and sort > 0 ORDER BY sort DESC" . $limit;
	
    $query = $GLOBALS['dou']->query($sql);
    while ($row = $GLOBALS['dou']->fetch_array($query)) {
        $sort[] = array (
                "id" => $row['id'],
                "title" => $row['title'] 
        );
    }
    
    return $sort;
}
function check_aticle_is_self($aid){
		if(defined('IS_ADMIN_NEW')){
			return true;
		}
		
		if($GLOBALS['dou']->get_one("SELECT id FROM " . $GLOBALS['dou']->table('article') . " WHERE id = '$aid' and user_id= '{$GLOBALS['_USER']['user_id']}' ")){
			return true;
		}
		return false;
	}
?>