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
if($_POST){
	$article_id = intval($_REQUEST['blog_id']);
	$pwd = intval($_REQUEST['pwd']);
	$id = $dou->get_one("SELECT id FROM " . $dou->table('article') . " WHERE password = '{$pwd}' And stype='2' and id = '$article_id'");	
	if($id > 0){
		$_SESSION['password'] = $article_id;
		echo 0;
	}else{
		echo 1;
	}
	exit;
}
// 验证并获取合法的ID，如果不合法将其设定为-1
$user = $firewall->get_legal_user('admin', $_REQUEST['blog_id']);
if ($user == -1) {
	$dou->dou_msg('博客不存在', ROOT_URL);
} else {
		$where = " WHERE user_id = '{$user['user_id']}' And stype='2' ";
}
$article_id  = $firewall->get_legal_user('article', $_REQUEST['id']);
$blog_id = $dou->get_one("SELECT blog_id FROM " . $dou->table('article') . " WHERE user_id = '{$user['user_id']}' And stype='2' and id = '$article_id'");	
if(!($blog_id > 0)){
	$dou->dou_msg('博文不存在', ROOT_URL);
}
   
/* 获取详细信息 */
$query = $dou->select($dou->table('article'), '*', '`id` = \'' . $article_id . '\'');
$article = $dou->fetch_array($query);

// 格式化数据
$article['add_time'] = date("Y-m-d", $article['add_time']);
// 口令

 if ( !empty($article['password'] )  && $_SESSION['password'] != $article['id']  ){
	//var_dump($_SESSION['password'] );
    $smarty->assign('cur_blog_id',$article_id);
	$smarty->display('password.dwt');
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
// 访问统计
$click = $article['click'] + 1;

$dou->query("update " . $dou->table('article') . " SET click = '$click' WHERE id = '$article_id'");
// 个人博客文章总数
$sql = "SELECT count(*) FROM " . $dou->table('article') . "WHERE user_id = '{$user['user_id']}' And stype='2'";
$smarty->assign('article_count',$dou->get_one($sql));
// 个人博客阅读总数
$sql = "SELECT sum(click) FROM " . $dou->table('article') . "WHERE user_id = '{$user['user_id']}' And stype='2'";
$smarty->assign('click_count',$dou->get_one($sql));
// 同系老师
$sql = "SELECT * FROM " . $dou->table('admin') . "WHERE job_id = '{$user['job_id']}'";
$query = $dou->query($sql);
while ($row = $dou->fetch_array($query)) {
	$teachers[] = $row;
}
$smarty->assign('teachers',$teachers);
// 获取分类信息
$sql = "SELECT * FROM " . $dou->table('blog_category');
$query = $dou->query($sql);
while($row = $dou->fetch_array($query)){
	$cate[$row['blog_id']] = $row['cat_name'];
	$sql = "SELECT count(*) FROM " . $dou->table('article') . "WHERE user_id = '{$user['user_id']}' And stype='2' And blog_id ='{$row['blog_id']}'";
	$row['article_count'] = $dou->get_one($sql);
	$cate_info[] = $row;

}
// 个人排行榜
$sql =  "SELECT * FROM " . $dou->table('article') . "WHERE user_id = '{$user['user_id']}' And stype='2' order by click desc limit 10";
$query = $dou->query($sql);
while ($row = $dou->fetch_array($query)) {
	$url = $dou->rewrite_url('blog', $row['id']).'&blog_id='.$user['user_id'];
	$add_time = date("Y-m-d", $row['add_time']);
	$add_time_short = date("m-d", $row['add_time']);
	$add_day = date("d", $row['add_time']);
	$add_month = date("m", $row['add_time']);
	$image = $row['image'] ? ROOT_URL . $row['image'] : '';

	// 如果描述不存在则自动从详细介绍中截取
	$description = $row['description'] ? $row['description'] : $dou->dou_substr($row['content'], 200, false);

	$list[] = array (
			"id" => $row['id'],
			"blog_id" => $row['blog_id'],
			"title" => $row['title'],
			"cat_name" => $cate[$row['blog_id']],
			"image" => $image,
			"add_time" => $add_time,
			"add_time_short" => $add_time_short,
			"day"=>$add_day,
			"month" => $add_month,
			"click" => $row['click'],
			"description" => $description,
			"source" => $row['source'],
			"url" => $url
	);
}
// 赋值给模板-meta和title信息
	$smarty->assign('page_title',$user['nick_name'].'的博客');
	$smarty->assign('keywords', $user['nick_name'].'的博客');
	$smarty->assign('description', $user['nick_name'].'的博客');

// 赋值给模板-导航栏
$smarty->assign('nav_top_list', $dou->get_nav('top'));
$smarty->assign('nav_middle_list', $dou->get_nav('middle', '0', 'article_category', $cat_id, $parent_id));
$smarty->assign('nav_bottom_list', $dou->get_nav('bottom'));
$article['cat_name'] = $cate[$article['blog_id']];
// 赋值给模板-数据
$smarty->assign('cate_info',$cate_info);
$smarty->assign('lift', $dou->blog_lift('article', $article_id, $user['user_id']));
$smarty->assign('ur_here', $dou->ur_here('blog_category', $blog_id, $article['title']));
$smarty->assign('cur_blog_id', $blog_id);
$smarty->assign('article', $article);
$smarty->assign('defined', $defined);
$smarty->assign('USER',$user);
$smarty->assign('list', $list);
$smarty->display('blog.dwt');

?>