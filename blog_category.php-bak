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
$user = $firewall->get_legal_user('admin', $_REQUEST['id']);
if ($user == -1) {
	$dou->dou_msg('博客不存在', ROOT_URL);
} else {
		$where = " WHERE user_id = '{$user['user_id']}' And stype='2' ";
}
	$blog_id = $firewall->get_legal_user('blog_category', $_REQUEST['blog_id']);	
	//echo $blog_id;
	if($blog_id != -1){
		$where .= " And blog_id = '{$blog_id}' ";
	}
	// 获取分页信息
	$page = $check->is_number($_REQUEST['page']) ? trim($_REQUEST['page']) : 1;
	$limit = $dou->pager('article', ($_DISPLAY['article'] ? $_DISPLAY['article'] : 10), $page, $dou->rewrite_url('blog_category', $user['user_id']), $where);
	// 获取分类信息
	$sql = "SELECT * FROM " . $dou->table('blog_category');
	$query = $dou->query($sql);
	while($row = $dou->fetch_array($query)){
		$cate[$row['blog_id']] = $row['cat_name'];
		$sql = "SELECT count(*) FROM " . $dou->table('article') . "WHERE user_id = '{$user['user_id']}' And stype='2' And blog_id ='{$row['blog_id']}'";
		$row['article_count'] = $dou->get_one($sql);
		$cate_info[] = $row;
		
	}
	$smarty->assign('cate_info',$cate_info);
	//var_dump($cate);
	/* 获取文章列表 */
	$sql = "SELECT id, title, content, image,image2,image3, blog_id, add_time, click, description,ctype,source,custom_url FROM " . $dou->table('article') . $where . " ORDER BY add_time DESC" . $limit;
	$query = $dou->query($sql);
	
	while ($row = $dou->fetch_array($query)) {
		$url = $dou->rewrite_url('blog', $row['id']).'&blog_id='.$user['user_id'];
		$add_time = date("Y-m-d", $row['add_time']);
		$add_time_short = date("m-d", $row['add_time']);
		$add_day = date("d", $row['add_time']);
		$add_month = date("m", $row['add_time']);
		$image = $row['image'] ? ROOT_URL . $row['image'] : '';
		$image2 = $row ['image2'] ? ROOT_URL . $row ['image2'] : '';
		$image3 = $row ['image3'] ? ROOT_URL . $row ['image3'] : '';
		// 如果描述不存在则自动从详细介绍中截取
		$description = $row ['description'] ? $row ['description'] : $dou->dou_substr ( $row ['content'], 200, false );
		//var_dump($row['blog_id']);
		$article_list [] = array (
				"id" => $row ['id'],
				"user_face" => $user_list[$row['user_id']]['face'],
				"index" => $index++,
				"blog_id" => $row ['blog_id'],
				"cat_name" => $cate [$row ['blog_id']],
				"title" => $row ['title'],
				"image" => $image,
				"image2" => $image2,
				"image3" => $image3,
				"month" => $add_month,
				"day" => $add_day,
				"add_time" => $add_time,
				"add_time_short" => $add_time_short,
				"click" => $row ['click'],
				"description" => $description,
				"ctype" => $row ['ctype'],
				"keywords" => $row ['keywords'],
				"url" => $row['custom_url']?$row['custom_url']:$url 
		);
	}
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
				"url" => $row['custom_url']?$row['custom_url']:$url 
		);
	}
	// 赋值给模板-meta和title信息
	$smarty->assign('page_title',$user['nick_name'].'的博客');
	$smarty->assign('keywords', $user['nick_name'].'的博客');
	$smarty->assign('description', $user['nick_name'].'的博客');
	
	// 赋值给模板-导航栏
	$smarty->assign('nav_top_list', $dou->get_nav('top'));
	$smarty->assign('nav_middle_list', $dou->get_nav('middle', '0', 'article_category', $cat_id, $cate_info['parent_id']));
	$smarty->assign('nav_bottom_list', $dou->get_nav('bottom'));
	$sql = "SELECT * FROM " . $dou->table('blog_category');
	$query = $dou->query($sql);
	$article_category = array();
	while ($row = $dou->fetch_array($query)) {
		$article_category[] = $row;
	}
	// 赋值给模板-数据
	$smarty->assign('ur_here', $dou->ur_here('blog_category', $user['user_id']));
	$smarty->assign('USER',$user);
	$smarty->assign('blog_category', $article_category);
	$smarty->assign('article_list', $article_list);
	$smarty->assign('list', $list);
	$smarty->assign('cur_blog_id', $blog_id);
	$smarty->display('blog_category.dwt');
	


function get_article_list($cat_id,$limit_start = 0,$limit_end = 6){
	global $dou;
	if ($cat_id == -1) {
		$dou->dou_msg($GLOBALS['_LANG']['page_wrong'], ROOT_URL);
	} else {
		$where = ' WHERE cat_id IN (' . $cat_id . $dou->dou_child_id('article_category', $cat_id) . ')';
	}
	/* 获取文章列表 */
	$sql = "SELECT id, title, content, image, cat_id, add_time, click, description,ctype,keywords,custom_url FROM " . $dou->table('article') . $where . " ORDER BY add_time DESC limit $limit_start,$limit_end";

	$query = $dou->query($sql);
	while ($row = $dou->fetch_array($query)) {
		$url = $dou->rewrite_url('article', $row['id']);
		$add_time = date("Y-m-d", $row['add_time']);
		$add_time_short = date("m-d", $row['add_time']);
		$image = $row['image'] ? ROOT_URL . $row['image'] : '';

		// 如果描述不存在则自动从详细介绍中截取
		$description = $row['description'] ? $row['description'] : $dou->dou_substr($row['content'], 200, false);

		$article_list[] = array (
				"id" => $row['id'],
				"cat_id" => $row['cat_id'],
				"title" => $row['title'],
				"image" => $image,
				"add_time" => $add_time,
				"add_time_short" => $add_time_short,
				"click" => $row['click'],
				"description" => $description,
				"ctype" => $row['ctype'],
				"keywords" => $row['keywords'],
				"url" => $row['custom_url']?$row['custom_url']:$url 
		);
	}
	
	return $article_list;
}
/**
 * +----------------------------------------------------------
 * 获取友情链接
 * +----------------------------------------------------------
 */
function get_link_list() {
	$sql = "SELECT * FROM " . $GLOBALS['dou']->table('link') . " ORDER BY sort ASC, id ASC";
	$query = $GLOBALS['dou']->query($sql);
	while ($row = $GLOBALS['dou']->fetch_array($query)) {
		$link_list[] = array (
				"id" => $row['id'],
				"link_name" => $row['link_name'],
				"link_url" => $row['link_url'],
				"sort" => $row['sort']
		);
	}

	return $link_list;
}
function get_news_list($limit_start = 0,$limit_end = 8){
	global $dou;

	/* 获取文章列表 */
	$sql = "SELECT id, title, content, image, cat_id, add_time, click, description,ctype,keywords,custom_url FROM " . $dou->table('article')  . "where image != '' and cat_id != '41' ORDER BY add_time DESC limit $limit_start,$limit_end";

	$query = $dou->query($sql);
	while ($row = $dou->fetch_array($query)) {
		$url = $dou->rewrite_url('article', $row['id']);
		$add_time = date("Y-m-d", $row['add_time']);
		$add_time_short = date("m-d", $row['add_time']);
		$image = $row['image'] ? ROOT_URL . $row['image'] : '';

		// 如果描述不存在则自动从详细介绍中截取
		$description = $row['description'] ? $row['description'] : $dou->dou_substr($row['content'], 200, false);

		$article_list[] = array (
				"id" => $row['id'],
				"cat_id" => $row['cat_id'],
				"title" => $row['title'],
				"image" => $image,
				"add_time" => $add_time,
				"add_time_short" => $add_time_short,
				"click" => $row['click'],
				"description" => $description,
				"ctype" => $row['ctype'],
				"keywords" => $row['keywords'],
				"url" => $row['custom_url']?$row['custom_url']:$url 
		);
	}
	return $article_list;
}
?>