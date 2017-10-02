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
 * 权限列表
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
    $smarty->assign('ur_here', "权限组");
    $smarty->assign('action_link', array (
            'text' => '权限组添加',
            'href' => 'managergroup.php?rec=add' 
    ));
    // 组权限分页
    $page = $check->is_number($_REQUEST['page']) ? $_REQUEST['page'] : 1;
    $page_url = 'managergroup.php';
    $limit = $dou->pager('admin_group', 15, $page, $page_url, '', '');
    
    $sql = "SELECT * FROM " . $dou->table('admin_group') . $limit;
    $query = $dou->query($sql);
    
    while ($row = $dou->fetch_array($query)) {
        $manager_list[] = array (
                "gid" => $row['gid'],
                "groupname" => $row['groupname'],
        );
    }
    
    // 赋值给模板
    $smarty->assign('cur', 'managergroup');
    $smarty->assign('manager_list', $manager_list);
    
    $smarty->display('managergroup.htm');
} 

/**
 * +----------------------------------------------------------
 * 权限组添加处理
 * +----------------------------------------------------------
 */
elseif ($rec == 'add') {
    if ($_USER['action_list'] != 'ALL') {
        $dou->dou_msg($_LANG['without'], 'managergroup.php');
    }
    $smarty->assign('ur_here', "权限组");
    $smarty->assign('action_link', array (
            'text' => '返回',
            'href' => 'managergroup.php' 
    ));
    // CSRF防御令牌生成
    $smarty->assign('token', $firewall->set_token('manager_add'));
    $smarty->display('managergroup.htm');
} 

elseif ($rec == 'insert') {

    // CSRF防御令牌验证
    $firewall->check_token($_POST['token'], 'manager_add');
    $optin_process = 'a:20:{s:14:"ckboxBlok_open";i:1;s:16:"ckboxCatAuth_add";i:1;s:17:"ckboxCatAuth_edit";i:0;s:16:"ckboxCatAuth_del";i:0;s:16:"ckboxCatAuth_adt";i:0;s:14:"ckboxGroup_add";i:0;s:15:"ckboxCreate_add";i:0;s:16:"ckboxCreate_edit";i:0;s:15:"ckboxCreate_del";i:0;s:12:"ckboxCat_add";i:1;s:13:"ckboxCat_edit";i:1;s:12:"ckboxCat_del";i:1;s:13:"ckboxMsg_look";i:0;s:14:"ckboxMsg_reply";i:0;s:12:"ckboxSys_nav";i:0;s:15:"ckboxSys_banner";i:0;s:15:"ckboxSys_single";i:0;s:17:"ckboxSys_dbbackup";i:0;s:19:"ckboxSys_cleancache";i:0;s:15:"ckboxSys_record";i:0;}';
    $sql = "INSERT INTO " . $dou->table('admin_group') . " (groupname, active, option_process)" . " VALUES ( '$_POST[groupname]', '1', '$optin_process')";

    $dou->query($sql);
    $dou->create_admin_log("权限组增加". ': ' . $_USER['user_name']);
    $dou->dou_msg("权限组增加成功", 'managergroup.php');
} 

/**
 * +----------------------------------------------------------
 * 权限组编辑
 * +----------------------------------------------------------
 */
elseif ($rec == 'edit') {
    $smarty->assign('ur_here',"权限组");
	$href = defined("IS_ADMIN_NEW")?'managergroup.php':"index.php";
    $smarty->assign('action_link', array (
            'text' => $_LANG['manager_list'],
            'href' => $href 
    ));
 
    // 验证并获取合法的ID
    $id = $check->is_number($_REQUEST['id']) ? $_REQUEST['id'] : '';
    $query = $dou->select($dou->table('admin_group'), '*', '`gid` = \'' . $id . '\'');
    $manager_info = $dou->fetch_array($query);
    // CSRF防御令牌生成
    $smarty->assign('token', $firewall->set_token('manager_edit'));
    $smarty->assign('manager_info', $manager_info);
    
    $smarty->display('managergroup.htm');
} 

elseif ($rec == 'update') {
    // CSRF防御令牌验证
    $firewall->check_token($_POST['token'], 'manager_edit');
   
    $sql = "UPDATE " . $dou->table('admin_group') . " SET groupname = '$_POST[groupname]' WHERE gid = '$_POST[id]'";
    
    $dou->query($sql);
    
    $dou->create_admin_log( "编辑权限成功" . ': ' . $_USER['user_name']);
    $href = defined("IS_ADMIN_NEW")?'managergroup.php':"index.php";
	
    $dou->dou_msg("编辑权限成功", $href);
} 

/**
 * +----------------------------------------------------------
 * 权限组删除
 * +----------------------------------------------------------
 */
elseif ($rec == 'del') {
    if ($_USER['action_list'] != 'ALL') {
        $dou->dou_msg($_LANG['without'], 'managergroup.php');
    }
    
    // 验证并获取合法的ID
    $gid = $check->is_number($_REQUEST['id']) ? $_REQUEST['id'] : $dou->dou_msg($_LANG['illegal'], 'managergroup.php');
    
    $user_name = $dou->get_one("SELECT gid FROM " . $dou->table('admin_group') . " WHERE gid = '$gid'");
    
    if (!empty($user_name)) {
         $dou->create_admin_log("权限组删除" . ': ' . $_USER['user_name']);
         $dou->delete($dou->table('admin_group'), "gid = $gid", 'managergroup.php');
		 
    }
} 


?>