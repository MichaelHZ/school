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
// 开启SESSION
session_start();
require (dirname(__FILE__) . '/include/init.php');

// 验证并获取合法的ID，如果不合法将其设定为-1
$id = $firewall->get_legal_id('article', $_REQUEST['id'], $_REQUEST['unique_id']);
if($_POST){
	$article_id = intval($_REQUEST['blog_id']);
	$pwd = trim($_REQUEST['pwd']);
	if(empty($pwd) || empty($article_id)){
		echo 1;
		exit;
	}
	$id = $dou->get_one("SELECT id FROM " . $dou->table('article') . " WHERE password = '{$pwd}' And stype='1' and id = '$article_id'");
	$cat_id = $dou->get_one("SELECT cat_id FROM " . $dou->table('article') . " WHERE stype='1' and id = '$article_id'");
	if($id > 0){
		$_SESSION['password'] = $article_id;
		echo 0;
		
	}else{
		if($cat_id > 0){
			$cat_is_password = $dou->get_one("SELECT is_password FROM " . $dou->table('article_category') . " WHERE cat_id = '$cat_id'");
		}
		if($cat_is_password > 0){
			$cat_password = $dou->get_one("SELECT password FROM " . $dou->table('article_category') . " WHERE cat_id = '$cat_id'");
			if($cat_password == $pwd){
			$_SESSION['password'] = $article_id;
				echo 0;
			}else{
				echo 1;
			}
		}else{
			// 定义每篇文章应有一个对应的栏目ID 执行到这定义错误
			echo 2;
		}
	}
	exit;
}
$cat_id = $dou->get_one("SELECT cat_id FROM " . $dou->table('article') . " WHERE id = '$id'");
// 不同栏目不同banner和话语
$cat_school_ids = '1'.$dou->dou_child_id('article_category', 1);
$cat_student_ids = '2'.$dou->dou_child_id('article_category', 2);
$cat_teacher_ids = '3'.$dou->dou_child_id('article_category', 3);
$cat_history_ids = '4'.$dou->dou_child_id('article_category', 4);
$cat_parent_ids = '5'.$dou->dou_child_id('article_category', 5);
$cat_source_ids = '6'.$dou->dou_child_id('article_category', 6);
$cat_baby_ids = '7'.$dou->dou_child_id('article_category', 7);
$cat_create_ids = '8'.$dou->dou_child_id('article_category', 8);
$cat_group_ids = '9'.$dou->dou_child_id('article_category', 9);
$cat_school_ids = explode(',',$cat_school_ids);
$cat_student_ids = explode(',',$cat_student_ids);
$cat_teacher_ids = explode(',',$cat_teacher_ids);
$cat_history_ids = explode(',',$cat_history_ids);
$cat_parent_ids = explode(',',$cat_parent_ids);
$cat_source_ids = explode(',',$cat_source_ids);
$cat_baby_ids = explode(',',$cat_baby_ids);
$cat_create_ids = explode(',',$cat_create_ids);
$cat_group_ids = explode(',',$cat_group_ids);
if(in_array($cat_id,$cat_school_ids)){
	$banner_info= array('banner'=>'/theme/school/images/ad1.jpg','words'=>'');
}elseif(in_array($cat_id,$cat_student_ids)){
	$banner_info=  array('banner'=>'/theme/school/images/ad2.jpg','words'=>'');
}elseif(in_array($cat_id,$cat_teacher_ids)){
	$banner_info=  array('banner'=>'/theme/school/images/ad3.jpg','words'=>'');
}elseif(in_array($cat_id,$cat_history_ids)){
	$banner_info=  array('banner'=>'/theme/school/images/ad4.jpg','words'=>'');
}elseif(in_array($cat_id,$cat_parent_ids)){
	$banner_info=  array('banner'=>'/theme/school/images/ad5.jpg','words'=>'');
}elseif(in_array($cat_id,$cat_source_ids)){
	$banner_info= array('banner'=>'/theme/school/images/ad6.jpg','words'=>'');
}elseif(in_array($cat_id,$cat_baby_ids)){
	$banner_info= array('banner'=>'/theme/school/images/ad7.jpg','words'=>'');
}elseif(in_array($cat_id,$cat_create_ids)){
	$banner_info=  array('banner'=>'/theme/school/images/ad8.jpg','words'=>'');
}elseif(in_array($cat_id,$cat_group_ids)){
	$banner_info= array('banner'=>'/theme/school/images/ad9.jpg','words'=>'');
}
$smarty->assign('banner_info', $banner_info);
$parent_id = $dou->get_one("SELECT parent_id FROM " . $dou->table('article_category') . " WHERE cat_id = '" . $cat_id . "'");
if ($id == -1)
    $dou->dou_msg($GLOBALS['_LANG']['page_wrong'], ROOT_URL);
    
/* 获取详细信息 */
$query = $dou->select($dou->table('article'), '*', '`id` = \'' . $id . '\'');
$article = $dou->fetch_array($query);

// 格式化数据
$article['add_time'] = date("Y-m-d", $article['add_time']);
// 口令

 if ( !empty($article['is_password'] )  && $_SESSION['password'] != $article['id']  ){
	//var_dump($_SESSION['password'] );
    $smarty->assign('cur_blog_id',$id);
	$smarty->display('apassword.dwt');
	exit;
}
// 格式化自定义参数
foreach (explode(',', $article['defined']) as $row) {
    $row = explode('：', str_replace(":", "：", $row));
    
    if ($row['1']) {
        $defined[] = array (
                "arr" => $row['0'],
                "value" => $row['1'] 
        );
    }
}
$get_cat = $dou->get_two_catid($cat_id);
$sql = "SELECT id FROM " . $dou->table('nav') . " WHERE guide = '$get_cat[root]' and type='middle'";
$cur_nav =  $dou->get_one($sql);
//var_dump($cur_nav);
// 面包屑导航
$sql = "SELECT cat_id, cat_name, parent_id,template FROM " . $dou->table('article_category') . " WHERE cat_id = '$get_cat[root]' ";
$query = $dou->query($sql);
$root = $dou->fetch_array($query);
$root['url'] =  $url = $dou->rewrite_url('article_category', $get_cat['root']);
$sql = "SELECT cat_id, cat_name, parent_id,template FROM " . $dou->table('article_category') . " WHERE cat_id = '$get_cat[two]' ";
$query = $dou->query($sql);
$two = $dou->fetch_array($query);
$two['url'] =  $url = $dou->rewrite_url('article_category', $get_cat['two']);
$sql = "SELECT cat_id, cat_name, parent_id,template FROM " . $dou->table('article_category') . " WHERE cat_id = '$get_cat[child]' ";
$query = $dou->query($sql);
$child= $dou->fetch_array($query);
$smarty->assign('cur_nav', $cur_nav);
$smarty->assign('cat_root', $root);
$smarty->assign('cat_two', $two);
$smarty->assign('cat_child', $child);
// 访问统计
$click = $article['click'] + 1;
$dou->query("update " . $dou->table('article') . " SET click = '$click' WHERE id = '$id'");

// 赋值给模板-meta和title信息
$smarty->assign('page_title', $dou->page_title('article_category', $cat_id, $article['title']));
$smarty->assign('keywords', $article['keywords']);
$smarty->assign('description', $article['description']);

// 赋值给模板-导航栏
$smarty->assign('nav_top_list', $dou->get_nav('top'));
$smarty->assign('nav_middle_list', $dou->get_nav('middle', '0', 'article_category', $cat_id, $parent_id));
$smarty->assign('nav_bottom_list', $dou->get_nav('bottom'));

// 赋值给模板-数据
$smarty->assign('ur_here', $dou->ur_here('article_category', $cat_id, $article['title']));
$smarty->assign('get_cat',$get_cat);

$smarty->assign('article_category', $dou->get_category('article_category',$get_cat['root'], $get_cat['child']));
$smarty->assign('lift', $dou->lift('article', $id, $cat_id));
$smarty->assign('article', $article);
$smarty->assign('defined', $defined);
$smarty->display('article.dwt');
exit;
if(($child['template'] != 'default' ) && ($two['cat_id'] != $child['cat_id'])){
	
	$smarty->display($child['template'].'.dwt');
}elseif(($two['template'] != 'default') && ($two['cat_id'] == $child['cat_id'])){
	$smarty->display($two['template'].'.dwt');
}else{
	$smarty->display('article.dwt');
}

?>