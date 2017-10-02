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
define ( 'IN_DOUCO', true );
// 开启SESSION
session_start();
require (dirname ( __FILE__ ) . '/include/init.php');

// 验证并获取合法的ID，如果不合法将其设定为-1
$cat_id = $firewall->get_legal_id ( 'article_category', $_REQUEST ['id'], $_REQUEST ['unique_id'] );
// 不同栏目不同banner和话语
$cat_school_ids = '1' . $dou->dou_child_id ( 'article_category', 1 );
$cat_student_ids = '2' . $dou->dou_child_id ( 'article_category', 2 );
$cat_teacher_ids = '3' . $dou->dou_child_id ( 'article_category', 3 );
$cat_history_ids = '4' . $dou->dou_child_id ( 'article_category', 4 );
$cat_parent_ids = '5' . $dou->dou_child_id ( 'article_category', 5 );
$cat_source_ids = '6' . $dou->dou_child_id ( 'article_category', 6 );
$cat_baby_ids = '7' . $dou->dou_child_id ( 'article_category', 7 );
$cat_create_ids = '8' . $dou->dou_child_id ( 'article_category', 8 );
$cat_group_ids = '9' . $dou->dou_child_id ( 'article_category', 9 );
$cat_school_ids = explode ( ',', $cat_school_ids );
$cat_student_ids = explode ( ',', $cat_student_ids );
$cat_teacher_ids = explode ( ',', $cat_teacher_ids );
$cat_history_ids = explode ( ',', $cat_history_ids );
$cat_parent_ids = explode ( ',', $cat_parent_ids );
$cat_source_ids = explode ( ',', $cat_source_ids );
$cat_baby_ids = explode ( ',', $cat_baby_ids );
$cat_create_ids = explode ( ',', $cat_create_ids );
$cat_group_ids = explode ( ',', $cat_group_ids );
if (in_array ( $cat_id, $cat_school_ids )) {
	$banner_info = array (
			'banner' => '/theme/school/images/ad1.jpg',
			'wordss' => true 
	);
} elseif (in_array ( $cat_id, $cat_student_ids )) {
	$banner_info = array (
			'banner' => '/theme/school/images/ad2.jpg',
			'wordss' => true 
	);
} elseif (in_array ( $cat_id, $cat_teacher_ids )) {
	$banner_info = array (
			'banner' => '/theme/school/images/ad3.jpg',
			'wordss' => true 
	);
} elseif (in_array ( $cat_id, $cat_history_ids )) {
	$banner_info = array (
			'banner' => '/theme/school/images/ad4.jpg',
			'wordss' => true 
	);
} elseif (in_array ( $cat_id, $cat_parent_ids )) {
	$banner_info = array (
			'banner' => '/theme/school/images/ad5.jpg',
			'wordss' => true 
	);
} elseif (in_array ( $cat_id, $cat_source_ids )) {
	$banner_info = array (
			'banner' => '/theme/school/images/ad6.jpg',
			'wordss' => '' 
	);
} elseif (in_array ( $cat_id, $cat_baby_ids )) {
	$banner_info = array (
			'banner' => '/theme/school/images/ad7.jpg',
			'wordss' => true 
	);
} elseif (in_array ( $cat_id, $cat_create_ids )) {
	$banner_info = array (
			'banner' => '/theme/school/images/ad8.jpg',
			'wordss' => '' 
	);
} elseif (in_array ( $cat_id, $cat_group_ids )) {
	$banner_info = array (
			'banner' => '/theme/school/images/ad9.jpg',
			'wordss' => '' 
	);
}
$smarty->assign ( 'banner_info', $banner_info );
// var_dump($banner_info);
// exit;
if ($cat_id == 9) {
	// 集团首页
	if ($cat_id == - 1) {
		$dou->dou_msg ( $GLOBALS ['_LANG'] ['page_wrong'], ROOT_URL );
	} else {
		$where = ' WHERE cat_id IN (' . $cat_id . $dou->dou_child_id ( 'article_category', $cat_id ) . ") And auditing = '1'  And stype='1' ";
	}
	
	// 获取分页信息
	$page = $check->is_number ( $_REQUEST ['page'] ) ? trim ( $_REQUEST ['page'] ) : 1;
	$limit = $dou->pager ( 'article', ($_DISPLAY ['article'] ? $_DISPLAY ['article'] : 10), $page, $dou->rewrite_url ( 'article_category', $cat_id ), $where );
	
	/* 获取文章列表 */
	$sql = "SELECT id, title, content, image, cat_id, add_time, click, description,ctype,source,custom_url FROM " . $dou->table ( 'article' ) . $where . " ORDER BY add_time  DESC" . $limit;
	$query = $dou->query ( $sql );
	
	while ( $row = $dou->fetch_array ( $query ) ) {
		$url = $dou->rewrite_url ( 'article', $row ['id'] );
		$add_time = date ( "Y-m-d", $row ['add_time'] );
		$add_time_short = date ( "m-d", $row ['add_time'] );
		$image = $row ['image'] ? ROOT_URL . $row ['image'] : '';
		
		// 如果描述不存在则自动从详细介绍中截取
		$description = $row ['description'] ? $row ['description'] : $dou->dou_substr ( $row ['content'], 200, false );
		
		$article_list [] = array (
				"id" => $row ['id'],
				"cat_id" => $row ['cat_id'],
				"title" => $row ['title'],
				"image" => $image,
				"add_time" => $add_time,
				"add_time_short" => $add_time_short,
				"click" => $row ['click'],
				"description" => $description,
				"ctype" => $row ['ctype'],
				"source" => $row ['source'],
				"url" => $row['custom_url']?$row['custom_url']:$url
		);
	}
	
	// 获取分类信息
	$sql = "SELECT cat_id, cat_name, parent_id FROM " . $dou->table ( 'article_category' ) . " WHERE cat_id = '$cat_id'";
	$query = $dou->query ( $sql );
	$cate_info = $dou->fetch_array ( $query );
	
	// 赋值给模板-meta和title信息
	$smarty->assign ( 'page_title', $dou->page_title ( 'article_category', $cat_id ) );
	$smarty->assign ( 'keywords', $cate_info ['keywords'] );
	$smarty->assign ( 'description', $cate_info ['description'] );
	
	// 赋值给模板-导航栏
	$smarty->assign ( 'nav_top_list', $dou->get_nav ( 'top' ) );
	$smarty->assign ( 'nav_middle_list', $dou->get_nav ( 'middle', '0', 'article_category', $cat_id, $cate_info ['parent_id'] ) );
	$smarty->assign ( 'nav_bottom_list', $dou->get_nav ( 'bottom' ) );
	$smarty->assign ( 'nav_group_list', $dou->get_nav ( 'group' ) );
	// exit;
	// 赋值给模板-数据
	$smarty->assign ( 'ur_here', $dou->ur_here ( 'article_category', $cat_id ) );
	$smarty->assign ( 'cate_info', $cate_info );
	$smarty->assign ( 'article_category', $dou->get_category ( 'article_category', 0, $cat_id ) );
	$smarty->assign ( 'article_list', $article_list );
	// 总校动态
	$smarty->assign ( 'play_article', get_news_list () );
	// 集团动态
	$smarty->assign ( 'group_article', get_article_list ( 9 ) );
	// 友情链接
	$smarty->assign ( 'link', get_link_list () );
	$smarty->display ( 'article_category_group.dwt' );
	exit ();
}
$get_cat = $dou->get_two_catid ( $cat_id );
$cat_id = $get_cat ['child'];
if ($cat_id == - 1) {
	$dou->dou_msg ( $GLOBALS ['_LANG'] ['page_wrong'], ROOT_URL );
} else {
	if($cat_id == 3){
		$where = " WHERE cat_id IN ( 42,43,44,45,46) And auditing = '1'  And stype='1' ";
	}else{
		$where = ' WHERE cat_id IN (' . $cat_id . $dou->dou_child_id ( 'article_category', $cat_id ) . ") And auditing = '1'  And stype='1'";
	}

}

if (in_array ( $cat_id, array (
		6,
		74 
) )) {
	// 资源栏目 图片
	// 验证并获取合法的ID，如果不合法将其设定为-1
	// $cat_id = $firewall->get_legal_id('aticle_category', $_REQUEST['id'], $_REQUEST['unique_id']);
	// if ($cat_id == -1) {
	// $dou->dou_msg($GLOBALS['_LANG']['page_wrong'], ROOT_URL);
	// } else {
	// $where = ' WHERE cat_id IN (' . $cat_id . $dou->dou_child_id('gallery_category', $cat_id) . ')';
	// }
	
	// 获取图片分页信息
	$page = $check->is_number ( $_REQUEST ['page'] ) ? trim ( $_REQUEST ['page'] ) : 1;
	$limit = $dou->pager ( 'gallery', ($_DISPLAY ['gallery'] ? $_DISPLAY ['gallery'] : 10), $page,$dou->rewrite_url ( 'article_category', '74' )," Where is_show = '1' ");
	
	/* 获取图片列表 */
	// $sql = "SELECT id, title, image, cat_id, add_time, click, description FROM " . $dou->table('gallery') . $where . " ORDER BY add_time  DESC" . $limit;
	$sql = "SELECT id, title, image, cat_id, gallery,add_time, click, description FROM " . $dou->table ( 'gallery' ) . " where is_show = '1'  ORDER BY add_time  DESC" . $limit;
	// echo $sql;
	
	$query = $dou->query ( $sql );
	
	while ( $row = $dou->fetch_array ( $query ) ) {
		$url = $dou->rewrite_url ( 'gallery', $row ['id'] );
		$add_time = date ( "Y-m-d", $row ['add_time'] );
		$add_time_short = date ( "m-d", $row ['add_time'] );
		$image = $row ['image'] ? ROOT_URL . $row ['image'] : '';
		
		$article_list [] = array (
				"id" => $row ['id'],
				"cat_id" => $row ['cat_id'],
				"title" => $row ['title'],
				"image" => $image,
				"count" => count(unserialize($row['gallery'])),
				"add_time" => $add_time,
				"add_time_short" => $add_time_short,
				"click" => $row ['click'],
				"description" => $row ['description'],
				"url" => $url 
		);
		//var_dump($row['gallery']);
	}
	
} /*else if ($cat_id == 75) {
	// 获取 音乐分页信息
	$page = $check->is_number ( $_REQUEST ['page'] ) ? trim ( $_REQUEST ['page'] ) : 1;
	$limit = $dou->pager ( 'music', ($_DISPLAY ['music'] ? $_DISPLAY ['music'] : 10), $page,$dou->rewrite_url ( 'article_category', '75' )," Where is_show = '1' ");
	
	// 获取图片列表 
	// $sql = "SELECT id, title, image, cat_id, add_time, click, description FROM " . $dou->table('gallery') . $where . " ORDER BY add_time  DESC" . $limit;
	$sql = "SELECT id, title, image, cat_id, music,add_time, click, description FROM " . $dou->table ( 'music' ) . " where is_show = '1'  ORDER BY add_time  DESC" . $limit;
	// echo $sql;
	
	$query = $dou->query ( $sql );
	
	while ( $row = $dou->fetch_array ( $query ) ) {
		$url = $dou->rewrite_url ( 'music', $row ['id'] );
		$add_time = date ( "Y-m-d", $row ['add_time'] );
		$add_time_short = date ( "m-d", $row ['add_time'] );
		$image = $row ['image'] ? ROOT_URL . $row ['image'] : '';
	
		$article_list [] = array (
				"id" => $row ['id'],
				"cat_id" => $row ['cat_id'],
				"title" => $row ['title'],
				"image" => $image,
				"count" => count(unserialize($row['music'])),
				"add_time" => $add_time,
				"add_time_short" => $add_time_short,
				"click" => $row ['click'],
				"description" => $row ['description'],
				"url" => $url
		);
		//var_dump($row['gallery']);
	}
} */ else {
	// 获取普通文章分页信息
	$page = $check->is_number ( $_REQUEST ['page'] ) ? trim ( $_REQUEST ['page'] ) : 1;
	$show_list = ($banner_info['wordss'] && $cat_id != 41) ? 20 :($_DISPLAY ['article'] ? $_DISPLAY ['article'] : 10);
	$limit = $dou->pager ( 'article', ($show_list), $page, $dou->rewrite_url ( 'article_category', $cat_id ), $where );
	
	/* 获取文章列表 */
	$sql = "SELECT id, title, content, image, cat_id, add_time, click, description,ctype,source,custom_url FROM " . $dou->table ( 'article' ) . $where . " ORDER BY add_time  DESC" . $limit;
	
	$query = $dou->query ( $sql );
	
	while ( $row = $dou->fetch_array ( $query ) ) {
		$url = $dou->rewrite_url ( 'article', $row ['id'] );
		$add_time = date ( "Y-m-d", $row ['add_time'] );
		$add_time_short = date ( "m-d", $row ['add_time'] );
		$image = $row ['image'] ? ROOT_URL . $row ['image'] : '';
		
		// 如果描述不存在则自动从详细介绍中截取
		$description = $row ['description'] ? $row ['description'] : $dou->dou_substr ( $row ['content'], 200, false );
		
		$article_list [] = array (
				"id" => $row ['id'],
				"cat_id" => $row ['cat_id'],
				"title" => $row ['title'],
				"image" => $image,
				"add_time" => $add_time,
				"add_time_short" => $add_time_short,
				"click" => $row ['click'],
				"description" => $description,
				"ctype" => $row ['ctype'],
				"source" => $row ['source'],
				"url" => $row['custom_url']?$row['custom_url']:$url,
				"custom_url" => $row['custom_url'],
		);
		
	}
	
}

// var_dump($article_list);
// exit;
$sql = "SELECT id FROM " . $dou->table ( 'nav' ) . " WHERE guide = '$get_cat[root]' and type='middle'";
$cur_nav = $dou->get_one ( $sql );
// var_dump($cur_nav);
// 面包屑导航
$sql = "SELECT cat_id, cat_name, parent_id,template FROM " . $dou->table ( 'article_category' ) . " WHERE cat_id = '$get_cat[root]' ";
$query = $dou->query ( $sql );
$root = $dou->fetch_array ( $query );
$root ['url'] = $url = $dou->rewrite_url ( 'article_category', $get_cat ['root'] );
$sql = "SELECT cat_id, cat_name, parent_id,template FROM " . $dou->table ( 'article_category' ) . " WHERE cat_id = '$get_cat[two]' ";
$query = $dou->query ( $sql );
$two = $dou->fetch_array ( $query );
$two ['url'] = $url = $dou->rewrite_url ( 'article_category', $get_cat ['two'] );
$sql = "SELECT cat_id, cat_name, parent_id,template FROM " . $dou->table ( 'article_category' ) . " WHERE cat_id = '$get_cat[child]' ";
$query = $dou->query ( $sql );
$child = $dou->fetch_array ( $query );
$smarty->assign ( 'cur_nav', $cur_nav );
$smarty->assign ( 'cat_root', $root );
$smarty->assign ( 'cat_two', $two );
$smarty->assign ( 'cat_child', $child );
// 获取分类信息
$sql = "SELECT cat_id, cat_name, parent_id FROM " . $dou->table ( 'article_category' ) . " WHERE cat_id = '$cat_id'";
$query = $dou->query ( $sql );
$cate_info = $dou->fetch_array ( $query );

// 赋值给模板-meta和title信息
$smarty->assign ( 'page_title', $dou->page_title ( 'article_category', $cat_id ) );
$smarty->assign ( 'keywords', $cate_info ['keywords'] );
$smarty->assign ( 'description', $cate_info ['description'] );

// 赋值给模板-导航栏
$smarty->assign ( 'nav_top_list', $dou->get_nav ( 'top' ) );
$smarty->assign ( 'nav_middle_list', $dou->get_nav ( 'middle', '0', 'article_category', $cat_id, $cate_info ['parent_id'] ) );
$smarty->assign ( 'nav_bottom_list', $dou->get_nav ( 'bottom' ) );

// 赋值给模板-数据
$smarty->assign ( 'ur_here', $dou->ur_here ( 'article_category', $cat_id ) );
$smarty->assign ( 'cate_info', $cate_info );

$smarty->assign ( 'article_category', $dou->get_category ( 'article_category', $get_cat ['root'], $get_cat ['child'] ) );
// var_dump($get_cat);
$smarty->assign ( 'get_cat', $get_cat );
$smarty->assign ( 'cat_id', $cat_id );
$smarty->assign ( 'article_list', $article_list );

if (isset ( $_GET ['ctype'] ) && ! empty ( $_GET ['ctype'] )) {
	// 创建
	$smarty->assign ( 'nav_create_list', $dou->get_nav ( $_GET ['ctype'] ) );
	$smarty->display ( 'article_category_create.dwt' );
	exit ();
}

if (($two ['template'] != 'default') && ($two ['cat_id'] == $child ['cat_id'])) {
	
	$smarty->display ( $two ['template'] . '.dwt' );
} elseif (($child ['template'] != 'default') && ($two ['cat_id'] != $child ['cat_id'])) {
	$smarty->display ( $child ['template'] . '.dwt' );
} else {
	$smarty->display ( 'article_category.dwt' );
}
function get_article_list($cat_id, $limit_start = 0, $limit_end = 6) {
	global $dou;
	if ($cat_id == - 1) {
		$dou->dou_msg ( $GLOBALS ['_LANG'] ['page_wrong'], ROOT_URL );
	} else {
		$where = ' WHERE cat_id IN (' . $cat_id . $dou->dou_child_id ( 'article_category', $cat_id ) . ')' ." and stype='1' And auditing = '1' ";
	}
	/* 获取文章列表 */
	$sql = "SELECT id, title, content, image, cat_id, add_time, click, description,ctype,keywords,custom_url FROM " . $dou->table ( 'article' ) . $where . " ORDER BY add_time  DESC limit $limit_start,$limit_end";
	
	$query = $dou->query ( $sql );
	while ( $row = $dou->fetch_array ( $query ) ) {
		$url = $dou->rewrite_url ( 'article', $row ['id'] );
		$add_time = date ( "Y-m-d", $row ['add_time'] );
		$add_time_short = date ( "m-d", $row ['add_time'] );
		$image = $row ['image'] ? ROOT_URL . $row ['image'] : '';
		
		// 如果描述不存在则自动从详细介绍中截取
		$description = $row ['description'] ? $row ['description'] : $dou->dou_substr ( $row ['content'], 200, false );
		
		$article_list [] = array (
				"id" => $row ['id'],
				"cat_id" => $row ['cat_id'],
				"title" => $row ['title'],
				"image" => $image,
				"add_time" => $add_time,
				"add_time_short" => $add_time_short,
				"click" => $row ['click'],
				"description" => $description,
				"ctype" => $row ['ctype'],
				"keywords" => $row ['keywords'],
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
	$sql = "SELECT * FROM " . $GLOBALS ['dou']->table ( 'link' ) . " ORDER BY sort ASC, id ASC";
	$query = $GLOBALS ['dou']->query ( $sql );
	while ( $row = $GLOBALS ['dou']->fetch_array ( $query ) ) {
		$link_list [] = array (
				"id" => $row ['id'],
				"link_name" => $row ['link_name'],
				"link_url" => $row ['link_url'],
				"sort" => $row ['sort'] 
		);
	}
	
	return $link_list;
}
function get_news_list($limit_start = 0, $limit_end = 8) {
	global $dou;
	$cat = "19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,42,43,44,45,46,98,51,52,53,47,48,49,50";
	/* 获取文章列表 */
	$sql = "SELECT id, title, content, image, cat_id, add_time, click, description,ctype,keywords,custom_url FROM " . $dou->table ( 'article' ) . "where cat_id in ({$cat})  and stype='1' And auditing = '1' ORDER BY add_time  DESC limit $limit_start,$limit_end";
	//echo $sql;
	$query = $dou->query ( $sql );
	while ( $row = $dou->fetch_array ( $query ) ) {
		$url = $dou->rewrite_url ( 'article', $row ['id'] );
		$add_time = date ( "Y-m-d", $row ['add_time'] );
		$add_time_short = date ( "m-d", $row ['add_time'] );
		$image = $row ['image'] ? ROOT_URL . $row ['image'] : '';
		
		// 如果描述不存在则自动从详细介绍中截取
		$description = $row ['description'] ? $row ['description'] : $dou->dou_substr ( $row ['content'], 200, false );
		
		$article_list [] = array (
				"id" => $row ['id'],
				"cat_id" => $row ['cat_id'],
				"title" => $row ['title'],
				"image" => $image,
				"add_time" => $add_time,
				"add_time_short" => $add_time_short,
				"click" => $row ['click'],
				"description" => $description,
				"ctype" => $row ['ctype'],
				"keywords" => $row ['keywords'],
				"url" => $row['custom_url']?$row['custom_url']:$url
		);
	}
	return $article_list;
}
?>