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

// 如果存在搜索词则转入搜索页面
if ($_REQUEST['s']) {
    if ($check->is_search_keyword($keyword = trim($_REQUEST['s']))) {
        require (ROOT_PATH . M_PATH . '/include/search.inc.php');
    } else {
        $dou->dou_msg($_LANG['search_keyword_wrong']);
    }
}

// 获取关于我们信息
$sql = "SELECT * FROM " . $dou->table('page') . " WHERE id = '1'";
$query = $dou->query($sql);
$about = $dou->fetch_array($query);

// 写入到index数组
$index['cur'] = true;
// 新闻
$smarty->assign('play_article',get_article_list(18,0,20));
// 新闻速递
$smarty->assign('cat_3', get_news_list(0,5));
// 教师风采
$smarty->assign('teacher', get_article_list(41,0,10));
// 赋值给模板-meta和title信息
$smarty->assign('page_title', $dou->page_title());
$smarty->assign('keywords', $_CFG['mobile_keywords']);
$smarty->assign('description', $_CFG['mobile_description']);

// 赋值给模板-导航栏
$smarty->assign('nav_list', is_array($dou->get_nav()) ? $dou->get_nav() : $dou->get_nav('middle'));

// 赋值给模板-数据
$smarty->assign('show_list', is_array($dou->get_show_list('mobile')) ? $dou->get_show_list('mobile') : $dou->get_show_list('pc'));
$smarty->assign('index', $index);
$smarty->assign('recommend_product', $dou->get_list('product', 'ALL', $_DISPLAY['home_product'], 'sort DESC'));
$smarty->assign('recommend_article', $dou->get_list('article', 'ALL', $_DISPLAY['home_article'], 'sort DESC'));

$smarty->display('index.dwt');
function get_article_list($cat_id,$limit_start = 0,$limit_end = 6){
	global $dou;
	if ($cat_id == -1) {
		$dou->dou_msg($GLOBALS['_LANG']['page_wrong'], ROOT_URL);
	} else {
		$where = ' WHERE cat_id IN (' . $cat_id . $dou->dou_child_id('article_category', $cat_id) . ')'."and image != ''  And auditing = '1' And micromail = '1' and stype='1' ";
	}
	/* 获取文章列表 */
	$sql = "SELECT id, title, content, image, cat_id, add_time, click, description,ctype,keywords FROM " . $dou->table('article') . $where . " ORDER BY sort desc,add_time  DESC limit $limit_start,$limit_end";
    //echo $sql;
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
				"url" => $url
		);
	}
	return $article_list;
}
function get_news_list($limit_start = 0,$limit_end = 6){
	global $dou;
	$no_cat = "41,54,55,56,57,58,57,77,78,79,80,81,82,83,84,85,86,87,88,89,90,97,75,100";
	/* 获取文章列表 */
	$sql = "SELECT id, title, content, image, cat_id, add_time,source, click, description,ctype,keywords FROM " . $dou->table('article')  . "where image != ''  And auditing = '1' And micromail = '1' and cat_id not in({$no_cat}) and stype='1' ORDER BY add_time  DESC limit $limit_start,$limit_end";

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
				"source" => $row['source'],
				"description" => $description,
				"ctype" => $row['ctype'],
				"keywords" => $row['keywords'],
				"url" => $url
		);
	}
	return $article_list;
}

?>