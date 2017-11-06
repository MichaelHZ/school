<?php

 
define('IN_DOUCO', true);

require (dirname(__FILE__) . '/include/init.php');

// rec操作项的初始化
$rec = $check->is_rec($_REQUEST['rec']) ? $_REQUEST['rec'] : 'default';

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
$smarty->assign('cur', 'blog');

/**
 * +----------------------------------------------------------
 * 文章列表
 * +----------------------------------------------------------
 */
if ($rec == 'default') {
    $smarty->assign('ur_here', '博文列表');
    $smarty->assign('action_link', array (
            'text' => $_LANG['article_add'],
            'href' => 'blog_list.php?rec=add' 
    ));
    
    // 获取参数
    $cat_id = $check->is_number($_REQUEST['cat_id']) ? $_REQUEST['cat_id'] : 0;
    $keyword = isset($_REQUEST['keyword']) ? trim($_REQUEST['keyword']) : '';
    
    // 筛选条件
    $where =" where stype='2' ";
    //$where = ' WHERE cat_id IN (' . $cat_id . $dou->dou_child_id('article_category', $cat_id) . ')';
    if ($keyword) {
       
		// 查找blog栏目
		$serch_blog_id = $dou->get_one("Select blog_id From " . $dou->table('blog_category') . " Where cat_name LIKE '%$keyword%' ");

		if($serch_blog_id > 0){
			 $where = $where . " AND (title LIKE '%$keyword%' Or blog_id = '$serch_blog_id')";
		
	
		// 查找blog所属
		$serch_user_id = $dou->get_one("Select user_id From " . $dou->table('admin') . " Where nick_name LIKE '%$keyword%' or user_name LIKE '%$keyword%'");
		if($serch_user_id > 0){
			 $where = $where . " AND (title LIKE '%$keyword%' or blog_id = '$serch_blog_id' or user_id = '$serch_user_id' )";
		}
		}else{
			// 查找blog所属
		$serch_user_id = $dou->get_one("Select user_id From " . $dou->table('admin') . " Where nick_name LIKE '%$keyword%' or user_name LIKE '%$keyword%'");
		if($serch_user_id > 0){
			 $where = $where . " AND (title LIKE '%$keyword%' or  user_id = '$serch_user_id' )";
		}else{
			 $where = $where . " AND title LIKE '%$keyword%'";
		}
		}
        $get = '&keyword=' . $keyword;
    }
    if($_USER['group_id'] > 2){
    	$where = $where . " AND user_id = '$_USER[user_id]' ";
    }
    // 分页
    $page = $check->is_number($_REQUEST['page']) ? $_REQUEST['page'] : 1;
    //$page_url = 'article.php' . ($cat_id ? '?cat_id=' . $cat_id : '');
    $page_url = 'blog_list.php';
	
    $limit = $dou->pager('article', 15, $page, $page_url, $where, $get);
    
    $sql = "SELECT id, title, cat_id, image, add_time,blog_id,user_id FROM " . $dou->table('article') . $where . " ORDER BY id DESC" . $limit;
	
    /*  echo $sql;
     exit;  */
    $query = $dou->query($sql);
    while ($row = $dou->fetch_array($query)) {
        $cat_name = $dou->get_one("SELECT cat_name FROM " . $dou->table('blog_category') . " WHERE blog_id = '$row[blog_id]'");
        $own = $dou->get_one("SELECT nick_name FROM " . $dou->table('admin') . " WHERE user_id = '$row[user_id]'");
        //echo $row[blog_id];
        $add_time = date("Y-m-d", $row['add_time']);
        
        $article_list[] = array (
                "id" => $row['id'],
                "blog_id" => $row['blog_id'],
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
    $smarty->display('blog_list.htm');
} 

/**
 * +----------------------------------------------------------
 * 文章添加
 * +----------------------------------------------------------
 */
elseif ($rec == 'add') {
    $smarty->assign('ur_here', '添加博文');
    $smarty->assign('action_link', array (
            'text' => '添加博文',
            'href' => 'blog_list.php' 
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
    $sql = "SELECT * FROM " . $dou->table('blog_category');
    $query = $dou->query($sql);
    $article_category = array();
     while ($row = $dou->fetch_array($query)) {
     	$article_category[] = $row;
     }
    // 赋值给模板
    $smarty->assign('form_action', 'insert');
    $smarty->assign('article_category',$article_category);
    $smarty->assign('article', $article);
    $smarty->assign('cur_time',time());
    $smarty->display('blog_list.htm');
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
    
    // 判断是否有上传图片/上传图片生成
    if ($_FILES['image2']['name'] != "") {
        // 生成图片文件名
        $file_name2 = date('Ymd');
        for($i = 0; $i < 6; $i++) {
            $file_name2 .= chr(mt_rand(97, 122));
        }
        
        // 其中image指的是上传的文本域名称，$file_name指的是生成的图片文件名
        $upfile2 = $img->upload_image('image2', $file_name2);
        $file2 = $images_dir . $upfile2;
        // $img->make_thumb($upfile, 100, 100); // 生成缩略图
    }
	 // 判断是否有上传图片/上传图片生成
    if ($_FILES['image3']['name'] != "") {
        // 生成图片文件名
        $file_name3 = date('Ymd');
        for($i = 0; $i < 6; $i++) {
            $file_name3 .= chr(mt_rand(97, 122));
        }
        
        // 其中image指的是上传的文本域名称，$file_name指的是生成的图片文件名
        $upfile3 = $img->upload_image('image3', $file_name3);
        $file3 = $images_dir . $upfile3;
        // $img->make_thumb($upfile, 100, 100); // 生成缩略图
    }
    
    // 格式化自定义参数
    $_POST['defined'] = str_replace("\r\n", ',', $_POST['defined']);
        
    // CSRF防御令牌验证
    $firewall->check_token($_POST['token'], 'article_add');
    $add_time = !empty($_POST['add_time'])? strtotime($_POST['add_time']) : time();
    $_POST['micromial'] =  $_POST['micromial'] ? $_POST['micromial'] : 0;
    $_POST['ctype'] =  $_POST['ctype'] ? $_POST['ctype'] : 0;
    $sql = "INSERT INTO " . $dou->table('article') . " (id, cat_id, title, defined, content, image ,image2,image3,keywords, add_time, description,source,micromail,custom_url,ctype,stype,user_id,blog_id)" . " VALUES (NULL, '', '$_POST[title]', '$_POST[defined]', '$_POST[content]', '$file','$file2','$file3', '$_POST[keywords]', '$add_time', '$_POST[description]','','','$_POST[custom_url]','0','2','$_USER[user_id]','$_POST[cat_id]')";
    $dou->query($sql);
    
    $dou->create_admin_log('博文添加成功' . ': ' . $_POST['title']);
    $dou->dou_msg('博文添加成功', 'blog_list.php');
} 

/**
 * +----------------------------------------------------------
 * 文章编辑
 * +----------------------------------------------------------
 */
elseif ($rec == 'edit') {
    $smarty->assign('ur_here', $_LANG['article_edit']);
    $smarty->assign('action_link', array (
            'text' => $_LANG['article'],
            'href' => 'blog_list.php' 
    ));
    
    // 验证并获取合法的ID
    $id = $check->is_number($_REQUEST['id']) ? $_REQUEST['id'] : '';
    
    $query = $dou->select($dou->table('article'), '*', '`id` = \'' . $id . '\'');
    $article = $dou->fetch_array($query);
    
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
    
    // CSRF防御令牌生成
    $smarty->assign('token', $firewall->set_token('article_edit'));
    $sql = "SELECT * FROM " . $dou->table('blog_category');
    $query = $dou->query($sql);
    $article_category = array();
    while ($row = $dou->fetch_array($query)) {
    	$article_category[] = $row;
    }
    // 赋值给模板
    $smarty->assign('form_action', 'update');
    $smarty->assign('article_category', $article_category);
    $smarty->assign('article', $article);
    
    $smarty->display('blog_list.htm');
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
     // 上传图片生成
    if ($_FILES['image2']['name'] != "") {
        // 获取图片文件名
		if(empty($_POST['image2']) or $_POST['image'] ==  $_POST['image2'] ){
			$_POST['image2'] = $_FILES['image2']['name'];
		}
        $basename2 = addslashes(basename($_POST['image2']));
        $file_name2 = substr($basename2, 0, strrpos($basename2, '.'));
        
        $upfile2 = $img->upload_image('image2', "$file_name2"); // 上传的文件域
        $file2 = $images_dir . $upfile2;
        // $img->make_thumb($upfile, 100, 100); // 生成缩略图
        
        $up_file2 = ", image2='$file2'";
    }
	
	 // 上传图片生成
    if ($_FILES['image3']['name'] != "") {
        // 获取图片文件名
		if(empty($_POST['image3']) or $_POST['image3'] ==  $_POST['image2']){
			$_POST['image3'] = $_FILES['image3']['name'];
		}
        $basename3 = addslashes(basename($_POST['image3']));
		echo $basename3 ."<br>";
        $file_name3 = substr($basename3, 0, strrpos($basename3, '.'));
        
        $upfile3 = $img->upload_image('image3', "$file_name3"); // 上传的文件域
        $file3 = $images_dir . $upfile3;
        // $img->make_thumb($upfile, 100, 100); // 生成缩略图
        
        $up_file3 = ", image3='$file3'";
    }
	
	
    // 格式化自定义参数
    $_POST['defined'] = str_replace("\r\n", ',', $_POST['defined']);
    
    // CSRF防御令牌验证
    $firewall->check_token($_POST['token'], 'article_edit');
    $_POST['micromial'] =  $_POST['micromial'] ? $_POST['micromial'] : 0;
    $_POST['ctype'] =  $_POST['ctype'] ? $_POST['ctype'] : 0;
    $add_time = !empty($_POST['add_time'])? strtotime($_POST['add_time']) : time();
    $sql = "UPDATE " . $dou->table('article') . " SET title = '$_POST[title]', defined = '$_POST[defined]' ,content = '$_POST[content]'" . $up_file . $up_file2 . $up_file3 .", keywords = '$_POST[keywords]', description = '$_POST[description]',custom_url = '$_POST[custom_url]',add_time='$add_time',blog_id='$_POST[cat_id]' WHERE id = '$_POST[id]' ";
   
	$dou->query($sql);
    
    $dou->create_admin_log('修改博文' . ': ' . $_POST['title']);
    $dou->dou_msg('修改博文成功', 'blog_list.php');
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
    $id = $check->is_number($_REQUEST['id']) ? $_REQUEST['id'] : $dou->dou_msg($_LANG['illegal'], 'blog_list.php');
    
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
    $id = $check->is_number($_REQUEST['id']) ? $_REQUEST['id'] : $dou->dou_msg($_LANG['illegal'], 'blog_list.php');
    
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
    $id = $check->is_number($_REQUEST['id']) ? $_REQUEST['id'] : $dou->dou_msg($_LANG['illegal'], 'blog_list.php');
    $title = $dou->get_one("SELECT title FROM " . $dou->table('article') . " WHERE id = '$id'");
    
    if (isset($_POST['confirm']) ? $_POST['confirm'] : '') {
        // 删除相应商品图片
        $image = $dou->get_one("SELECT image FROM " . $dou->table('article') . " WHERE id = '$id'");
        $dou->del_image($image);
        
        $dou->create_admin_log($_LANG['article_del'] . ': ' . $title);
        $dou->delete($dou->table('article'), "id = $id", 'blog_list.php');
    } else {
        $_LANG['del_check'] = preg_replace('/d%/Ums', $title, $_LANG['del_check']);
        $dou->dou_msg($_LANG['del_check'], 'blog_list.php', '', '30', "blog_list.php?rec=del&id=$id");
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
            $dou->del_all('article', $_POST['checkbox'], 'id', 'image','blog_list.php');
        } elseif ($_POST['action'] == 'category_move') {
            // 批量移动分类
            $dou->category_move('article', $_POST['checkbox'], $_POST['new_cat_id']);
        } else {
            $dou->dou_msg($_LANG['select_empty'],'blog_list.php');
        }
    } else {
        $dou->dou_msg($_LANG['article_select_empty'],'blog_list.php');
    }
}

/**
 * +----------------------------------------------------------
 * 获取首页显示文章
 * +----------------------------------------------------------
 */
function get_sort_article() {
    $limit = $GLOBALS['_DISPLAY']['home_article'] ? ' LIMIT ' . $GLOBALS['_DISPLAY']['home_article'] : '';
    $sql = "SELECT id, title FROM " . $GLOBALS['dou']->table('article') . " WHERE stype=2 and sort > 0 ORDER BY sort DESC" . $limit;
    $query = $GLOBALS['dou']->query($sql);
    while ($row = $GLOBALS['dou']->fetch_array($query)) {
        $sort[] = array (
                "id" => $row['id'],
                "title" => $row['title'] 
        );
    }
    
    return $sort;
}
?>