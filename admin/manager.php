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

$smarty->assign('rec', $rec);
// 图片上传
include_once (ROOT_PATH . 'include/upload.class.php');
$images_dir = 'images/face/'; // 文件上传路径，结尾加斜杠
$thumb_dir = ''; // 缩略图路径（相对于$images_dir） 结尾加斜杠，留空则跟$images_dir相同
$img = new Upload(ROOT_PATH . $images_dir, $thumb_dir); // 实例化类文件
if (!file_exists(ROOT_PATH . $images_dir)) {
	mkdir(ROOT_PATH . $images_dir, 0777);
}
/**
 * +----------------------------------------------------------
 * 管理员列表
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
	$sql = "UPDATE ".$dou->table('admin')." Set status = '{$val}' Where user_id ='{$id}' ";
	
	$dou->query($sql);
	echo 'success';
}
if ($rec == 'sort') {
	$val = intval($_POST['sort']) > 0? intval($_POST['sort']):0;
	if(intval($_POST['uid']) > 0 and $val > 0){
		$id = intval($_POST['uid']);
	}else{
		echo "数据错误";
		exit;
	}
	$sql = "UPDATE ".$dou->table('admin')." Set sort = '{$val}' Where user_id ='{$id}' ";
	
	$dou->query($sql);
	echo 'success';
}
if ($rec == 'default') {
    $smarty->assign('ur_here', $_LANG['manager']);
    $smarty->assign('action_link', array (
            'text' => $_LANG['manager_add'],
            'href' => 'manager.php?rec=add' 
    ));
    // 组权限
    $sql = "SELECT * FROM " . $dou->table('admin_group');
    $query = $dou->query($sql);
    $group = array();
    while ($row = $dou->fetch_array($query)) {
    	$group[$row['gid']] = $row['groupname'];
    }
    // 职位列表
    $sql = "SELECT * FROM " . $dou->table('job_list');
    $query = $dou->query($sql);
   
    $job = array();
    while ($row = $dou->fetch_array($query)) {
    	$job[$row['jid']] = $row['job_name'];
    }
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
    $sort = isset($_REQUEST['sort']) ? trim($_REQUEST['sort']).' ASC,': '';
    // 筛选条件
    $where = '  ';
    if ($keyword) {
    	$where =  "WHERE (nick_name LIKE '%$keyword%' Or user_name LIKE '%$keyword%' Or mobile LIKE '%$keyword%') ";
    	$get = '&keyword=' . $keyword;
    }
     if ($sort) {
    	
    	$get = '&sort=' . trim($_REQUEST['sort']);
    }
	//echo $get;
    // 分页
    $page = $check->is_number($_REQUEST['page']) ? $_REQUEST['page'] : 1;
    $page_url = 'manager.php';
    $limit = $dou->pager('admin', 15, $page, $page_url, $where, $get);
    
    $sql = "SELECT * FROM " . $dou->table('admin') . $where ." ORDER BY ".$sort."user_id ASC"  . $limit;
    $query = $dou->query($sql);
    
    while ($row = $dou->fetch_array($query)) {
        $add_time = date("Y-m-d", $row['add_time']);
        $last_login = date("Y-m-d H:i:s", $row['last_login']);
        
        $manager_list[] = array (
                "user_id" => $row['user_id'],
                "user_name" => $row['user_name'],
        		"nick_name" => $row['nick_name'],
        		"group_name" => $group[$row['group_id']],
        		"mobile" => $row['mobile'],
        		"job_name" => $job[$row['job_id']],
                "email" => $row['email'],
                "action_list" => $row['action_list'],
                "add_time" => $add_time,
                "last_login" => $last_login,
        		"status" =>$row['status'], 
        		"sort" =>$row['sort'] 
        );
    }
    
    // 赋值给模板
    $smarty->assign('cur', 'manager');
    $smarty->assign('manager_list', $manager_list);
    
    $smarty->display('manager.htm');
} 

/**
 * +----------------------------------------------------------
 * 管理员添加处理
 * +----------------------------------------------------------
 */
elseif ($rec == 'add') {
    if ($_USER['action_list'] != 'ALL') {
        $dou->dou_msg($_LANG['without'], 'manager.php');
    }
    // 组权限
    $sql = "SELECT * FROM " . $dou->table('admin_group');
    $query = $dou->query($sql);
    $group_list = array();
    while ($row = $dou->fetch_array($query)) {
    	$group_list[] = $row;
    }
    // 职位列表
    $sql = "SELECT * FROM " . $dou->table('job_list');
    $query = $dou->query($sql);
     
    $job_list = array();
    while ($row = $dou->fetch_array($query)) {
    	$job_list[] = $row;
    }
   
    $smarty->assign('group_list', $group_list);
    $smarty->assign('job_list', $job_list);
    $smarty->assign('ur_here', $_LANG['manager']);
    $smarty->assign('action_link', array (
            'text' => $_LANG['manager_list'],
            'href' => 'manager.php' 
    ));
    
    // CSRF防御令牌生成
    $smarty->assign('token', $firewall->set_token('manager_add'));
    
    $smarty->display('manager.htm');
} 

elseif ($rec == 'insert') {
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
    if ($_USER['action_list'] != 'ALL') {
        $dou->dou_msg($_LANG['without'], 'manager.php');
    }
    
    // 验证用户名
    if (!$check->is_username($_POST['user_name']))
        $dou->dou_msg($_LANG['manager_username_cue']);
    $sql = "Select user_id From {$dou->table('admin')} Where user_name='{$_POST['user_name']}'";
    if ($dou->get_one($sql)){
    	$dou->dou_msg('账号已存在');
    }   
    // 验证密码
    if (!$check->is_password($_POST['password']))
        $dou->dou_msg($_LANG['manager_password_cue']);
    if (empty($_POST['nick_name'])){
    	$dou->dou_msg('姓名不能为空');
    }
   
    // 验证确认密码
    /*
    if ($_POST['password_confirm'] !== $_POST['password'])
        $dou->dou_msg($_LANG['manager_password_confirm_cue']);
    */
    $password = md5($_POST['password']);
    $add_time = time();
    
    // CSRF防御令牌验证
    $firewall->check_token($_POST['token'], 'manager_add');
    
    $sql = "INSERT INTO " . $dou->table('admin') . " (user_id, user_name, email, password, action_list, add_time,nick_name,sex,group_id,job_id,mobile,face,about)" . " VALUES (NULL, '$_POST[user_name]', '$_POST[email]', '$password', 'ADMIN', '$add_time','$_POST[nick_name]','$_POST[sex]','$_POST[group_id]','$_POST[job_id]','$_POST[mobile]','$file','$_POST[about]')";
    $dou->query($sql);
    $dou->create_admin_log($_LANG['manager_add'] . ': ' . $_POST['user_name']);
    $dou->dou_msg($_LANG['manager_add_succes'], 'manager.php');
} 

/**
 * +----------------------------------------------------------
 * 管理员编辑
 * +----------------------------------------------------------
 */
elseif ($rec == 'edit') {
    $smarty->assign('ur_here', $_LANG['manager']);
	$href = defined("IS_ADMIN_NEW")?'manager.php':"index.php";
    $smarty->assign('action_link', array (
            'text' => $_LANG['manager_list'],
            'href' => $href 
    ));
    // 组权限
    $sql = "SELECT * FROM " . $dou->table('admin_group');
    $query = $dou->query($sql);
    $group_list = array();
    while ($row = $dou->fetch_array($query)) {
    	$group_list[] = $row;
    }
    // 职位列表
    $sql = "SELECT * FROM " . $dou->table('job_list');
    $query = $dou->query($sql);
     
    $job_list = array();
    while ($row = $dou->fetch_array($query)) {
    	$job_list[] = $row;
    }
     
    $smarty->assign('group_list', $group_list);
    $smarty->assign('job_list', $job_list);
    // 验证并获取合法的ID
    $id = $check->is_number($_REQUEST['id']) ? $_REQUEST['id'] : '';
    
    $query = $dou->select($dou->table('admin'), '*', '`user_id` = \'' . $id . '\'');
    $manager_info = $dou->fetch_array($query);
    
    if ($_USER['action_list'] != 'ALL' && $manager_info['user_name'] != $_USER['user_name']) {
        $dou->dou_msg($_LANG['without'], 'manager.php');
    }
    
    // 超级管理员修改普通管理员信息无需旧密码
    if ($_USER['action_list'] == 'ALL' && $manager_info['user_name'] != $_USER['user_name']) {
        $if_check = false;
    } else {
        $if_check = true;
    }
    
    // CSRF防御令牌生成
    $smarty->assign('token', $firewall->set_token('manager_edit'));
    
    $smarty->assign('if_check', $if_check);
    $smarty->assign('manager_info', $manager_info);
    
    $smarty->display('manager.htm');
} 

elseif ($rec == 'update') {

	// 上传图片生成
	if ($_FILES['image']['name'] != "") {
		// 获取图片文件名
		$basename = addslashes(basename($_POST['image']));
		$file_name = substr($basename, 0, strrpos($basename, '.'));
	
		$upfile = $img->upload_image('image', "$file_name"); // 上传的文件域
		$file = $images_dir . $upfile;
		// $img->make_thumb($upfile, 100, 100); // 生成缩略图
	
		$up_file = ", face='$file'";
	}
	
    $query = $dou->select($dou->table('admin'), '*', '`user_id` = \'' . $_POST['id'] . '\'');
    $manager_info = $dou->fetch_array($query);
    
    // 判断管理员账号是否符合规范
    if (!$check->is_username($_POST['user_name'])) {
        $dou->dou_msg($_LANG['manager_username_cue']);
    }
    $sql = "Select user_id From {$dou->table('admin')} Where user_name='{$_POST['user_name']}' and user_id != '$_POST[id]'";
    if ($dou->get_one($sql)){
    	$dou->dou_msg('账号已存在');
    }
    // 超级管理员修改普通管理员信息无需旧密码
    if (!($_USER['action_list'] == 'ALL' && $manager_info['user_name'] != $_USER['user_name'])) {
        if (!$_POST['old_password']) {
            $dou->dou_msg($_LANG['manager_old_password_cue']);
        } elseif (md5($_POST['old_password']) != $manager_info['password']) {
            $dou->create_admin_log($_LANG['manager_edit'] . ': ' . $_POST['user_name'] . " ( " . $_LANG['manager_old_password_cue'] . " )");
            $dou->dou_msg($_LANG['manager_old_password_cue']);
        }
    }
    
    // 如果有输入新密码，则验证新密码
    if ($_POST['password']) {
        if (!$check->is_password($_POST['password'])) {
            $dou->dou_msg($_LANG['manager_password_cue']);
        }/* elseif ($_POST['password_confirm'] != $_POST['password']) {
        	
            $dou->dou_msg($_LANG['manager_password_confirm_cue']);
        }*/
        
        $update_password = ", password = '" . md5($_POST['password']) . "'";
    }
    
    // CSRF防御令牌验证
    $firewall->check_token($_POST['token'], 'manager_edit');
    if (!($_USER['action_list'] == 'ALL' && $manager_info['user_name'] != $_USER['user_name'])) {
    	$sql = "UPDATE " . $dou->table('admin') . " SET user_name = '$_POST[user_name]',  email = '$_POST[email]'" . $update_password . ", nick_name = '".$_POST['nick_name']."',mobile='".$_POST['mobile']."',job_id ='".$_POST['job_id']."',sex = '".$_POST['sex']."'".$up_file.",about='$_POST[about]' WHERE user_id = '$_POST[id]'";
    }else{
    	
    	$sql = "UPDATE " . $dou->table('admin') . " SET user_name = '$_POST[user_name]',  email = '$_POST[email]'" . $update_password .", group_id = '".$_POST['group_id']."' , nick_name = '".$_POST['nick_name']."',mobile='".$_POST['mobile']."',job_id ='".$_POST['job_id']."',sex = '".$_POST['sex']."'".$up_file.",about='$_POST[about]' WHERE user_id = '$_POST[id]'";
    }
    //echo $sql;
	//exit;
    $dou->query($sql);
    
    $dou->create_admin_log($_LANG['manager_edit'] . ': ' . $_POST['user_name']);
    $href = defined("IS_ADMIN_NEW")?'manager.php':"index.php";
	
    $dou->dou_msg($_LANG['manager_edit_succes'], $href);
} 

/**
 * +----------------------------------------------------------
 * 管理员删除
 * +----------------------------------------------------------
 */
elseif ($rec == 'del') {
    if ($_USER['action_list'] != 'ALL') {
        $dou->dou_msg($_LANG['without'], 'manager.php');
    }
    
    // 验证并获取合法的ID
    $user_id = $check->is_number($_REQUEST['id']) ? $_REQUEST['id'] : $dou->dou_msg($_LANG['illegal'], 'manager.php');
    
    $user_name = $dou->get_one("SELECT user_name FROM " . $dou->table('admin') . " WHERE user_id = '$user_id'");
    
    if ($user_name == $_USER['user_name'] || ($_USER['action_list'] != 'ALL' && $manager_info['user_name'] != $_USER['user_name'])) {
        $dou->dou_msg($_LANG['manager_del_wrong'], 'manager.php', '', '3');
    } else {
        if (isset($_POST['confirm']) ? $_POST['confirm'] : '') {
            $dou->create_admin_log($_LANG['manager_del'] . ': ' . $user_name);
            $dou->delete($dou->table('admin'), "user_id = $user_id", 'manager.php');
        } else {
            $_LANG['del_check'] = preg_replace('/d%/Ums', $user_name, $_LANG['del_check']);
            $dou->dou_msg($_LANG['del_check'], 'manager.php', '', '30', "manager.php?rec=del&id=$user_id");
        }
    }
} 

/**
 * +----------------------------------------------------------
 * 操作记录
 * +----------------------------------------------------------
 */
elseif ($rec == 'manager_log') {
    $smarty->assign('ur_here', $_LANG['manager_log']);
    $smarty->assign('action_link', array (
            'text' => $_LANG['manager_list'],
            'href' => 'manager.php' 
    ));
    $smarty->assign('cur', 'manager_log');
    
    // 验证并获取合法的分页ID
    $page = $check->is_number($_REQUEST['page']) ? $_REQUEST['page'] : 1;
    $limit = $dou->pager('admin_log', 15, $page, 'manager.php?rec=manager_log');
    
    $sql = "SELECT * FROM " . $dou->table('admin_log') . " ORDER BY id DESC" . $limit;
    $query = $dou->query($sql);
    while ($row = $dou->fetch_array($query)) {
        $create_time = date("Y-m-d H:i:s", $row['create_time']);
        $user_name = $dou->get_one("SELECT user_name FROM " . $dou->table('admin') . " WHERE user_id = " . $row['user_id']);
        
        $log_list[] = array (
                "id" => $row['id'],
                "create_time" => $create_time,
                "user_name" => $user_name,
                "action" => $row['action'],
                "ip" => $row['ip'] 
        );
    }
    
    // 赋值给模板
    $smarty->assign('log_list', $log_list);
    
    $smarty->display('manager.htm');
}
?>