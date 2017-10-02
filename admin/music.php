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
 * Release Date: 2015-06-10
 */
define('IN_DOUCO', true);

require (dirname(__FILE__) . '/include/init.php');

// rec操作项的初始化
$rec = $check->is_rec($_REQUEST['rec']) ? $_REQUEST['rec'] : 'default';

// 图片上传
include_once (ROOT_PATH . 'include/upload.class.php');
$images_dir = 'images/gallery/'; // 文件上传路径，结尾加斜杠
$thumb_dir = ''; // 缩略图路径（相对于$images_dir） 结尾加斜杠，留空则跟$images_dir相同
$img = new Upload(ROOT_PATH . $images_dir, $thumb_dir); // 实例化类文件
if (!file_exists(ROOT_PATH . $images_dir)) {
    mkdir(ROOT_PATH . $images_dir, 0777);
}
include_once (ROOT_PATH . 'include/musicUpload.class.php');
$music_dir = 'music/mp3/'; // 文件上传路径，结尾加斜杠
$thumb_dir = ''; // 缩略图路径（相对于$images_dir） 结尾加斜杠，留空则跟$images_dir相同

$msc = new MusicUpload(ROOT_PATH . $music_dir, $thumb_dir); // 实例化类文件

if (!file_exists(ROOT_PATH . $music_dir)) {
    mkdir(ROOT_PATH . $music_dir, 0777);
}

// 下一个自动生成的ID
$auto_id = $dou->get_one("SELECT auto_increment FROM information_schema.`TABLES` WHERE  TABLE_SCHEMA='" . $dbname . "' AND TABLE_NAME = '" . trim($dou->table('music'), '`') . "'");

// 赋值给模板
$smarty->assign('rec', $rec);
$smarty->assign('cur', 'music');
if ($rec == 'active') {
	$val = intval($_POST['val']) > 0?0:1;
	if(intval($_POST['id']) > 0){
		$id = intval($_POST['id']);
	}else{
		echo "数据错误";
		exit;
	}
	$sql = "UPDATE ".$dou->table('music')." Set is_show = '{$val}' Where id ='{$id}' ";
	$dou->query($sql);
	echo 'success';
}
/**
 * +----------------------------------------------------------
 * 图片列表
 * +----------------------------------------------------------
 */
if ($rec == 'default') {
    $smarty->assign('ur_here', '音乐');
    $smarty->assign('action_link', array (
            'text' => '添加音乐',
            'href' => 'music.php?rec=add' 
    ));
    
    // 获取参数
    $cat_id = $check->is_number($_REQUEST['mcat_id']) ? $_REQUEST['mcat_id'] : 0;
    $keyword = isset($_REQUEST['keyword']) ? trim($_REQUEST['keyword']) : '';
    
    // 筛选条件
    $where = ' WHERE cat_id IN (' . $cat_id . $dou->dou_child_id('music_category', $cat_id) . ')';
    if ($keyword) {
        $where = $where . " AND title LIKE '%$keyword%'";
        $get = '&keyword=' . $keyword;
    }
    
    // 分页
    $page = $check->is_number($_REQUEST['page']) ? $_REQUEST['page'] : 1;
    $page_url = 'music.php' . ($cat_id ? '?cat_id=' . $cat_id : '');
    $limit = $dou->pager('music', 15, $page, $page_url, $where, $get);
    
    $sql = "SELECT id, title, cat_id, image, add_time,is_show FROM " . $dou->table('music') . $where . " ORDER BY id DESC" . $limit;
   
    $query = $dou->query($sql);
    while ($row = $dou->fetch_array($query)) {
        $cat_name = $dou->get_one("SELECT cat_name FROM " . $dou->table('music_category') . " WHERE cat_id = '$row[cat_id]'");
        $add_time = date("Y-m-d", $row['add_time']);
        
        $gallery_list[] = array (
                "id" => $row['id'],
                "cat_id" => $row['cat_id'],
                "cat_name" => $cat_name,
                "title" => $row['title'],
                "image" => $row['image'],
        		"show" => $row['is_show'],
                "add_time" => $add_time 
        );
    }
    
    // 首页显示图片数量限制框
    for($i = 1; $i <= $_CFG['home_display_music']; $i++) {
        $sort_bg .= "<li><em></em></li>";
    }
    
    // 赋值给模板
    $smarty->assign('if_sort', $_SESSION['if_sort']);
    $smarty->assign('sort', get_sort_gallery());
    $smarty->assign('sort_bg', $sort_bg);
    $smarty->assign('cat_id', $cat_id);
    $smarty->assign('keyword', $keyword);
    $smarty->assign('music_category', $dou->get_category_nolevel('music_category'));
    $smarty->assign('music_list', $gallery_list);
    
    $smarty->display('music.htm');
} 

/**
 * +----------------------------------------------------------
 * 音乐添加
 * +----------------------------------------------------------
 */
elseif ($rec == 'add') {
    $smarty->assign('ur_here', '添加音乐');
    $smarty->assign('action_link', array (
            'text' => '音乐列表',
            'href' => 'music.php' 
    ));
    
    // 格式化自定义参数，并存到数组$gallery，图片编辑页面中调用图片详情也是用数组$gallery，
    if ($_DEFINED['music']) {
        $defined = explode(',', $_DEFINED['music']);
        foreach ($defined as $row) {
            $defined_music .= $row . "：\n";
        }
        $music['defined'] = trim($defined_music);
        $music['defined_count'] = count(explode("\n", $music['defined'])) * 2;
    }
    
    // CSRF防御令牌生成
    $smarty->assign('token', $firewall->set_token('music_add'));
    
    // 赋值给模板
    $smarty->assign('form_action', 'insert');
    $smarty->assign('music_category', $dou->get_category_nolevel('music_category'));
    $smarty->assign('music', $music);
    $smarty->assign('music_list', get_music_list());
    
    $smarty->display('music.htm');
} 

elseif ($rec == 'insert') {
    if (empty($_POST['title']))
        $dou->dou_msg('音乐名不能为空');
    
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
    
    $add_time = time();
    $musicName = $_POST['musicName'];
    $music =  $_POST['music'];
    $tmp = array();
    foreach($music as $k=>$row){
    	$tmp[$k]['music_name'] =  $musicName[$k];
    	$tmp[$k]['music_path'] =  $row;
    }
    $music = serialize($tmp);
        
    // CSRF防御令牌验证
    $firewall->check_token($_POST['token'], 'music_add');
    
    $sql = "INSERT INTO " . $dou->table('music') . " (id, cat_id, title, image, music ,keywords, add_time, description)" . " VALUES (NULL, '$_POST[cat_id]', '$_POST[title]', '$file', '$music', '$_POST[keywords]', '$add_time', '$_POST[description]')";
//     echo $sql;
//     exit;
    $dou->query($sql);
    
    $dou->create_admin_log('音乐增加' . ': ' . $_POST['title']);
    $dou->dou_msg('音乐增加成功', 'music.php');
} 

/**
 * +----------------------------------------------------------
 * 图片编辑
 * +----------------------------------------------------------
 */
elseif ($rec == 'edit') {
    $smarty->assign('ur_here', '音乐编辑');
    $smarty->assign('action_link', array (
            'text' => '音乐',
            'href' => 'music.php' 
    ));
    
    // 验证并获取合法的ID
    $id = $check->is_number($_REQUEST['id']) ? $_REQUEST['id'] : '';
    
    $query = $dou->select($dou->table('music'), '*', '`id` = \'' . $id . '\'');
    $music = $dou->fetch_array($query);
    
    // CSRF防御令牌生成
    $smarty->assign('token', $firewall->set_token('music_edit'));
    
    // 赋值给模板
    $smarty->assign('form_action', 'update');
    $smarty->assign('music_category', $dou->get_category_nolevel('music_category'));
    $smarty->assign('music', $music);
    $smarty->assign('music_list', get_music_list($id));
    
    $smarty->display('music.htm');
} 

elseif ($rec == 'update') {
    if (empty($_POST['title']))
        $dou->dou_msg('音乐名'. $_LANG['is_empty']);
        
    // 上传图片生成
    if ($_FILES['image']['name'] != "") {
        // 获取图片文件名
        $basename = addslashes(basename($_POST['music']));
        $file_name = substr($basename, 0, strrpos($basename, '.'));
        
        $upfile = $img->upload_image('image', "$file_name"); // 上传的文件域
        $file = $music_dir . $upfile;
        // $img->make_thumb($upfile, 100, 100); // 生成缩略图
        
        $up_file = ", music='$file'";
    }
    //var_dump( $_POST);
    // 格式化数据
    $_POST['defined'] = str_replace("\r\n", ',', $_POST['defined']);
    $musicName = $_POST['musicName'];
    $music =  $_POST['music'];
    $tmp = array();
    foreach($music as $k=>$row){
    	$tmp[$k]['music_name'] =  $musicName[$k];
    	$tmp[$k]['music_path'] =  $row;
    }
    $music = serialize($tmp);
    // CSRF防御令牌验证
    $firewall->check_token($_POST['token'], 'music_edit');
    
    $sql = "UPDATE " . $dou->table('music') . " SET cat_id = '$_POST[cat_id]', title = '$_POST[title]'" . $up_file . ", music = '$music', keywords = '$_POST[keywords]', description = '$_POST[description]' WHERE id = '$_POST[id]'";
    $dou->query($sql);

    $dou->create_admin_log('编辑音乐'. ': ' . $_POST['title']);
    $dou->dou_msg('音乐编辑成功', 'music.php?rec=edit&id='.$_POST['id']);
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
    $id = $check->is_number($_REQUEST['id']) ? $_REQUEST['id'] : $dou->dou_msg($_LANG['illegal'], 'music.php');
    
    $max_sort = $dou->get_one("SELECT sort FROM " . $dou->table('music') . " ORDER BY sort DESC");
    $new_sort = $max_sort + 1;
    $dou->query("UPDATE " . $dou->table('music') . " SET sort = '$new_sort' WHERE id = '$id'");
    
    $dou->dou_header($_SERVER['HTTP_REFERER']);
} 

/**
 * +----------------------------------------------------------
 * 取消首页显示商品
 * +----------------------------------------------------------
 */
elseif ($rec == 'del_sort') {
    // 验证并获取合法的ID
    $id = $check->is_number($_REQUEST['id']) ? $_REQUEST['id'] : $dou->dou_msg($_LANG['illegal'], 'music.php');
    
    $dou->query("UPDATE " . $dou->table('music') . " SET sort = '' WHERE id = '$id'");
    
    $dou->dou_header($_SERVER['HTTP_REFERER']);
} 

/**
 * +----------------------------------------------------------
 * 图片删除
 * +----------------------------------------------------------
 */
elseif ($rec == 'del') {
    // 验证并获取合法的ID
    $id = $check->is_number($_REQUEST['id']) ? $_REQUEST['id'] : $dou->dou_msg($_LANG['illegal'], 'music.php');
    $title = $dou->get_one("SELECT title FROM " . $dou->table('music') . " WHERE id = '$id'");
    
    if (isset($_POST['confirm']) ? $_POST['confirm'] : '') {
        // 删除相应商品图片
        $image = $dou->get_one("SELECT image FROM " . $dou->table('music') . " WHERE id = '$id'");
        $dou->del_image($image);
        
        $dou->create_admin_log('删除音乐' . ': ' . $title);
        $dou->delete($dou->table('music'), "id = $id", 'music.php');
    } else {
        $_LANG['del_check'] = preg_replace('/d%/Ums', $title, $_LANG['del_check']);
        $dou->dou_msg($_LANG['del_check'], 'music.php', '', '30', "music.php?rec=del&id=$id");
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
            // 批量图片删除
            $dou->del_all('music', $_POST['checkbox'], 'id', 'music');
        } elseif ($_POST['action'] == 'category_move') {
            // 批量移动分类
            $dou->category_move('music', $_POST['checkbox'], $_POST['new_cat_id']);
        } else {
            $dou->dou_msg( '选择为空');
        }
    } else {
        $dou->dou_msg('选择为空');
    }
}

/**
 * +----------------------------------------------------------
 * 音乐上传
 * +----------------------------------------------------------
 */
elseif ($rec == 'music') {
    // 生成图片文件名
    $rand = date('Ymd');
    for($i = 0; $i < 6; $i++) {
        $rand .= chr(mt_rand(97, 122));
    }

    // 验证并获取合法的ID
    $id = $check->is_number($_POST['id']) ? $_POST['id'] : '';
    $action_id = $id ? $id : $auto_id;
   
    $file_name = $action_id . '_' . $rand;
    $msc->upload_music('music_file', $music_dir, $file_name); // 文件上传
} 

/**
 * +----------------------------------------------------------
 * 图片删除
 * +----------------------------------------------------------
 */
elseif ($rec == 'music_del') {
    $img_name = $_REQUEST['music_name'];
    $image = $images_dir . $img_name;
    
    $dou->del_image($image);
} 

/**
 * +----------------------------------------------------------
 * 获取相册列表
 * +----------------------------------------------------------
 * $id 编号
 * +----------------------------------------------------------
 */
function get_music_list($id = '') {
    if ($id) {
        $music = $GLOBALS['dou']->get_one("SELECT music FROM " . $GLOBALS['dou']->table('music') . " WHERE id = '$id'");
        $images = $music ? unserialize($music) : glob(ROOT_PATH . $music_dir . $id . '_*.*');
    } else {
        $images = glob(ROOT_PATH . $music_dir . $GLOBALS['auto_id'] . '_*.*');
    }
    
    foreach ((array)$images as $value) {
        $music_list[] = array('value'=>basename($value['music_path']),'name'=>$value['music_name']);
    }
    
    return $music_list;
}

/**
 * +----------------------------------------------------------
 * 获取首页显示图片
 * +----------------------------------------------------------
 */
function get_sort_gallery() {
    $limit = $GLOBALS['_DISPLAY']['home_music'] ? ' LIMIT ' . $GLOBALS['_DISPLAY']['home_music'] : '';
    $sql = "SELECT id, title FROM " . $GLOBALS['dou']->table('music') . " WHERE sort > 0 ORDER BY sort DESC" . $limit;
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