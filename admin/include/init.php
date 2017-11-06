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
if (!defined('IN_DOUCO')) {
    die('Hacking attempt');
}

// 开启SESSION
session_start();

// error_reporting
error_reporting(E_ALL ^ E_NOTICE);

// 调整时区
if (PHP_VERSION >= '5.1') {
    date_default_timezone_set('PRC');
}

include_once ('../data/config.php');
// 定义常量
define('ROOT_PATH', str_replace(ADMIN_PATH . '/include/init.php', '', str_replace('\\', '/', __FILE__)));
define('ROOT_URL', preg_replace('/' . ADMIN_PATH . '\//Ums', '', dirname('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']) . "/"));
define('IS_ADMIN', true);

$cfg_basehost = ROOT_URL;
$cfg_basedir = ROOT_PATH;

if (!file_exists(ROOT_PATH . "data/system.dou")) {
    header("Location: ../install/index.php\n");
    exit();
}

require (ROOT_PATH . 'include/smarty/Smarty.class.php');
require (ROOT_PATH . 'include/mysql.class.php');
require (ROOT_PATH . 'include/common.class.php');
require (ROOT_PATH . ADMIN_PATH . '/include/action.class.php');
require (ROOT_PATH . 'include/check.class.php');
require (ROOT_PATH . 'include/firewall.class.php');

// 实例化类
$dou = new Action($dbhost, $dbuser, $dbpass, $dbname, $prefix, DOU_CHARSET);
$check = new Check();
$firewall = new Firewall();

// 定义系统标示
define('DOU_SHELL', $dou->get_one("SELECT value FROM " . $dou->table('config') . " WHERE name = 'hash_code'"));
define('DOU_ID', 'admin_' . substr(md5(DOU_SHELL . 'admin'), 0, 5));

// 豆壳防火墙
$firewall->dou_firewall();

// 设置页面缓存和编码
header('content-type: text/html; charset=' . DOU_CHARSET);
header('Expires: Fri, 14 Mar 1980 20:53:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache');

// 开启缓冲区
ob_start();

// SMARTY配置
$smarty = new smarty();
$smarty->config_dir = ROOT_PATH . 'include/smarty/Config_File.class.php'; // 目录变量
$smarty->template_dir = ROOT_PATH . ADMIN_PATH . '/templates'; // 模板存放目录
$smarty->compile_dir = ROOT_PATH . 'cache/' . ADMIN_PATH; // 编译目录
$smarty->left_delimiter = '{'; // 左定界符
$smarty->right_delimiter = '}'; // 右定界符
                                
// 如果编译和缓存目录不存在则建立
if (!file_exists($smarty->compile_dir))
    mkdir($smarty->compile_dir, 0777);

// 验证管理员
$smarty->assign("user", $_USER = $dou->admin_check($_SESSION[DOU_ID]['user_id'], $_SESSION[DOU_ID]['shell']));

// 读取站点信息
$smarty->assign("site", $_CFG = $dou->get_config());

// 系统模块
$_MODULE = $dou->dou_module();

// 载入语言文件
foreach ($_MODULE['lang'] as $lang_file) {
    require ($lang_file); // 载入系统语言文件
}

// 工作空间
$smarty->assign("workspace", $dou->dou_workspace());

// 通用信息调用
$smarty->assign("lang", $_LANG);
$_DISPLAY = unserialize($_CFG['display']); // 显示设置
$_DEFINED = unserialize($_CFG['defined']); // 自定义属性

// Smarty 过滤器
function remove_html_comments($source, & $smarty) {
    return $source = preg_replace('/<!--.*{(.*)}.*-->/U', '{$1}', $source);
}
// 统计没有审核的留言
$sql ="Select count(*) From ".$dou->table('guestbook')." Where if_read = '0' and reply_id = '0'";
$guestbook_count = $dou->get_one($sql);
// 统计没有审核的文章
$sql ="Select count(*) From ".$dou->table('article')." Where auditing = '0' And stype = '1' ";
$article_auditing_count = $dou->get_one($sql);
/*******************************************************************************
// 学校栏目ID和子栏目ID
$school_id_all = '1'.$dou->dou_child_id('article_category', '1');
$school_id_all  = explode(',',$school_id_all);
// 学生栏目ID和子栏目ID
$student_id_all = '2'.$dou->dou_child_id('article_category', '2');
$student_id_all  = explode(',',$student_id_all);
// 教师栏目ID和子栏目ID
$teacher_id_all = '3'.$dou->dou_child_id('article_category', '3');
$teacher_id_all  = explode(',',$teacher_id_all);
// 回眸栏目ID和子栏目ID
$history_id_all = '4'.$dou->dou_child_id('article_category', '4');
$history_id_all  = explode(',',$create_id_all);
// 瞭望栏目ID和子栏目ID
$future_id_all = '5'.$dou->dou_child_id('article_category', '5');
$future_id_all  = explode(',',$future_id_all);
// 资源栏目ID和子栏目ID
$source_id_all = '6'.$dou->dou_child_id('article_category', '6');
$source_id_all  = explode(',',$source_id_all);
// 幼教栏目ID和子栏目ID
$baby_id_all = '7'.$dou->dou_child_id('article_category', '7');
$baby_id_all  = explode(',',$baby_id_all);
*********************************************************************************/
// 创建栏目ID和子栏目ID

$create_id_all = '';
$create_id_all  = explode(',',$create_id_all);
// 集团栏目ID和子栏目ID
$group_id_all = $backup_group_id = '9'.$dou->dou_child_id('article_category', '9');
$group_id_all = explode(',',$group_id_all);
if($_USER['group_id'] == 1 or $_USER['group_id'] == 2){
	define("IS_ADMIN_NEW",true);
	$smarty->assign('IS_ADMIN',true);
}

if($_USER['group_id'] > 1){
	
	define('NEWTEMP',true);
	// 用户左侧菜单权限
	$sql ="Select * From ".$dou->table('admin_group')." Where gid = '".$_USER['group_id']."'";
	//echo $sql;
	$res = $dou->query($sql);
	
	$user_auth = mysql_fetch_array($res);
	
	$user_group_auth = explode(',', $user_auth['option_group']);
	$user_process_auth = unserialize( $user_auth['option_process']);
   
	// 按权限分配左侧菜单
	$left_nav  = $dou->get_category('article_category');
	$left_auth = array();
	if(!empty($user_group_auth)) foreach($left_nav as $k=>$first){
		if(in_array($first['cat_id'], $user_group_auth)){
			
			$left_auth[$k] = $first;
			// 二级菜单
			if(!empty($first['child']))foreach($first['child'] as $kk=>$second){
				unset($left_auth[$k]['child']); 
				if(in_array($second['cat_id'], $user_group_auth)){
					
					$left_auth[$k]['c'][$kk] = $second;
				}
			}
		}
	}
	 //var_dump($left_auth);
	//exit; 
//  	 	var_dump($left_auth);
//  	 	exit;
    $show_cat_id = intval($_REQUEST['cat_id'])>0?intval($_REQUEST['cat_id']):0;
    // 当前栏目ID的副栏目
    $sql = "Select parent_id From ".$dou->table('article_category')."  Where cat_id = '".$show_cat_id."' ";
    
    $show_parent_id = $dou->get_one($sql);
   //var_dump($show_cat_id);
    if($show_parent_id != 0){
    	$sql = "Select parent_id From ".$dou->table('article_category')."  Where cat_id = '".$show_parent_id."' ";
        $temp = $dou->get_one($sql);
        if($temp != 0){
        	$three_cat = $show_cat_id;
        	$two_cat = $show_parent_id;
        	$one_cat = $temp;
        }else{
        	$three_cat = '';
        	$two_cat = $show_cat_id;
        	$one_cat = $show_parent_id;
        }
    }

    $smarty->assign('cat_group',array('one'=>$one_cat,'two'=>$two_cat,'three'=>$three_cat));
	$smarty->assign('_USER_',$_USER);
	$smarty->assign('left_auth',$left_auth);
	$smarty->assign('guest_count',$guestbook_count);
	$smarty->assign('auditing_count',$article_auditing_count);
	$smarty->assign('process_auth',$user_process_auth);
}else{
	define('NEWTEMP',false);
}
//  跟新权限组为1和2的all权限
$sql ="Update ".$dou->table('admin')." Set action_list = 'ALL' Where (group_id = '1' or group_id = '2') and action_list != 'ALL' ";
	//echo $sql;
$dou->query($sql);
// 防跳墙
if($_REQUEST['cat_id'] > 0){
	$sql ="Select count(*) From ".$dou->table('admin_group')."  Where gid = '{$_USER['group_id']}'and FIND_IN_SET('{$_REQUEST['cat_id']}',option_group) ";
	if( !$dou->get_one($sql) && !defined('IS_ADMIN_NEW')){
		// 可能是三级栏目
		
		$sql ="Select parent_id From ".$dou->table('article_category')."  Where cat_id = '{$_REQUEST['cat_id']}'";
		$cur_parent_id = $dou->get_one($sql);
		if(empty($cur_parent_id)){
			header('Location:/admin');
		}
		$sql ="Select count(*) From ".$dou->table('admin_group')."  Where gid = '{$_USER['group_id']}'and FIND_IN_SET('{$cur_parent_id}',option_group) ";
		if( !$dou->get_one($sql)){
			header('Location:/admin');
		}
	}
}else{

	if(!defined('IS_ADMIN_NEW') && preg_match('/article\.php/i',$_SERVER['URL']) && !preg_match('/edit|del/i',$_SERVER['REQUEST_URI'])){
		header('Location:/admin');
	}
}


$smarty->register_prefilter('remove_html_comments');
?>