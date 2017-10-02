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
// 留言板的三个栏目ID
$messageBoard = array('68','69','70');
// 验证并获取合法的ID，如果不合法将其设定为-1
$cat_id = $firewall->get_legal_id('article_category', $_REQUEST['id'], $_REQUEST['unique_id']);
if($_POST){
	$stat = $data = $msg = '';
	$cat_id = $_POST['cat_id'];
	// ajax
	if ($cat_id == -1) {
		$stat = 0;
		$msg = '栏目ID错误';
	} else {
		$where = ' WHERE cat_id IN (' . $cat_id . $dou->dou_child_id('article_category', $cat_id) .") And auditing = '1' And micromail = '1' ";
	}
	if($cat_id != 74){
		
		
		// 获取分页信息
		$page = $check->is_number($_REQUEST['page']) ? trim($_REQUEST['page']) + 1 : 1;
		$limit = $dou->pager('gallery', ($_DISPLAY['gallery'] ? $_DISPLAY['gallery'] : 10), $page, $dou->rewrite_url('gallery', $cat_id), $where);
		
		/* 获取文章列表 */
		$sql = "SELECT id, title, content, image, cat_id, add_time, click,custom_url description,ctype,source FROM " . $dou->table('article') . $where . " ORDER BY add_time  DESC" . $limit;
		$query = $dou->query($sql);
		
		while ($row = $dou->fetch_array($query)) {
			$url = $row['custom_url']?$row['custom_url']:$dou->rewrite_url('article', $row['id']);
			$add_time = date("Y-m-d", $row['add_time']);
			$add_time_short = date("m-d", $row['add_time']);
			$image = $row['image'] ? ROOT_URL . $row['image'] : '';
		
			// 如果描述不存在则自动从详细介绍中截取
			$description = $row['description'] ? $row['description'] : $dou->dou_substr($row['content'], 200, false);
		
			$data[] = array (
					"id" => $row['id'],
					"cat_id" => $row['cat_id'],
					"title" => $row['title'],
					"image" => $image,
					"add_time" => $add_time,
					"add_time_short" => $add_time_short,
					"click" => $row['click'],
					"description" => $description ? substr($description,0,'76').'...':'',
					"ctype" => $row['ctype'],
					"source" => $row['source'],
					"url" => $url
			);
		}
		
		if(!empty($data)){
			$stat = 1;
		}
		exit(json_encode(array('stat'=>$stat,'msg'=>$msg,'data'=>$data)));
	}else{
		
		// 获取分页信息
		if ($cat_id == -1) {
			$dou->dou_msg($GLOBALS['_LANG']['page_wrong'], M_URL);
		} else {
			$where = ' WHERE cat_id IN (' . $cat_id . $dou->dou_child_id('gallery_category', $cat_id) . ')';
		}
		// 获取分页信息
		$page = $check->is_number ( $_REQUEST ['page'] ) ? trim($_REQUEST['page']) + 1 : 1;
		$limit = $dou->pager ( 'gallery', ($_DISPLAY ['gallery'] ? $_DISPLAY ['gallery'] : 10), $page,$dou->rewrite_url ( 'article_category', '74' )," Where is_show = '1' ");
		
		/* 获取案例列表 */
		$sql = "SELECT id, title, image, cat_id, add_time, click, description FROM " . $dou->table('gallery') .  " where is_show = '1'  ORDER BY add_time  DESC"  . $limit;
		
		
		$query = $dou->query($sql);
		while ($row = $dou->fetch_array($query)) {
			$url = $dou->rewrite_url('gallery', $row['id']);
			$add_time = date("Y-m-d", $row['add_time']);
			$add_time_short = date("m-d", $row['add_time']);
			$image = $row['image'] ? ROOT_URL . $row['image'] : '';
		
			$data[] = array (
					"id" => $row['id'],
					"cat_id" => $row['cat_id'],
					"title" => $row['title'],
					"image" => $image,
					"add_time" => $add_time,
					"add_time_short" => $add_time_short,
					"click" => $row['click'],
					"description" => $row['description'] ? substr($row['description'],0,'76').'...':'',
					"url" => $url
			);
		}
		
		if(!empty($data)){
			$stat = 1;
		}
		exit(json_encode(array('stat'=>$stat,'msg'=>$msg,'data'=>$data)));
	}
	
}
$get_cat = $dou->get_two_catid($cat_id);
//$cat_id = $get_cat['child'];

if ($cat_id == -1) {
    $dou->dou_msg($GLOBALS['_LANG']['page_wrong'], ROOT_URL);
} else {
    $where = ' WHERE cat_id IN (' . $cat_id . $dou->dou_child_id('article_category', $cat_id) .") And auditing = '1' And micromail = '1' ";
}
if($cat_id == 74){
	if ($cat_id == -1) {
		$dou->dou_msg($GLOBALS['_LANG']['page_wrong'], M_URL);
	} else {
		$where = ' WHERE cat_id IN (' . $cat_id . $dou->dou_child_id('gallery_category', $cat_id) . ')';
	}	
	// 获取分页信息
$page = $check->is_number ( $_REQUEST ['page'] ) ? trim ( $_REQUEST ['page'] ) : 1;
$limit = $dou->pager ( 'gallery', ($_DISPLAY ['gallery'] ? $_DISPLAY ['gallery'] : 10), $page,$dou->rewrite_url ( 'article_category', '74' )," Where is_show = '1' ");

/* 获取案例列表 */
$sql = "SELECT id, title, image, cat_id, add_time, click, description FROM " . $dou->table('gallery') .  " where is_show = '1'  ORDER BY add_time  DESC"  . $limit;


$query = $dou->query($sql);
while ($row = $dou->fetch_array($query)) {
	$url = $dou->rewrite_url('gallery', $row['id']);
	$add_time = date("Y-m-d", $row['add_time']);
	$add_time_short = date("m-d", $row['add_time']);
	$image = $row['image'] ? ROOT_URL . $row['image'] : '';

	$gallery_list[] = array (
			"id" => $row['id'],
			"cat_id" => $row['cat_id'],
			"title" => $row['title'],
			"image" => $image,
			"add_time" => $add_time,
			"add_time_short" => $add_time_short,
			"click" => $row['click'],
			"description" => $row['description'],
			"url" => $url
	);
}
	
// 	 var_dump($gallery_list);
// 	 exit;
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
	// 获取分类信息
	$sql = "SELECT cat_id, cat_name, parent_id FROM " . $dou->table('article_category') . " WHERE cat_id = '$cat_id'";
	$query = $dou->query($sql);
	$cate_info = $dou->fetch_array($query);
	
	// 赋值给模板-meta和title信息
	$smarty->assign('page_title', $dou->page_title('article_category', $cat_id));
	$smarty->assign('keywords', $cate_info['keywords']);
	$smarty->assign('description', $cate_info['description']);
	
	// 赋值给模板-导航栏
	$smarty->assign('nav_top_list', $dou->get_nav('top'));
	$smarty->assign('nav_middle_list', $dou->get_nav('middle', '0', 'article_category', $cat_id, $cate_info['parent_id']));
	$smarty->assign('nav_bottom_list', $dou->get_nav('bottom'));
	
	// 赋值给模板-数据
	$smarty->assign('ur_here', $dou->ur_here('article_category', $cat_id));
	$smarty->assign('cate_info', $cate_info);
	
	$smarty->assign('article_category', $dou->get_category('article_category', $get_cat['root'], $get_cat['child']));
	
	$smarty->assign('get_cat',$get_cat);
	$smarty->assign('cat_id',$cat_id);
	$smarty->assign('gallery_list', $gallery_list);
	$smarty->display('gallery_category.dwt');
}else{
	// 获取分页信息
	$page = $check->is_number($_REQUEST['page']) ? trim($_REQUEST['page']) : 1;
	$limit = $dou->pager('article', ($_DISPLAY['article'] ? $_DISPLAY['article'] : 10), $page, $dou->rewrite_url('article_category', $cat_id), $where);
	
	/* 获取文章列表 */
	$sql = "SELECT id, title, content, image, cat_id, add_time,custom_url, click, description,ctype,source FROM " . $dou->table('article') . $where . " ORDER BY add_time  DESC" . $limit;
	$query = $dou->query($sql);
	
	while ($row = $dou->fetch_array($query)) {
		$url = $row['custom_url']?$row['custom_url']:$dou->rewrite_url('article', $row['id']);
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
				"source" => $row['source'],
				"url" => $url
		);
	}
	// var_dump($article_list);
	// exit;
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
	// 获取分类信息
	$sql = "SELECT cat_id, cat_name, parent_id FROM " . $dou->table('article_category') . " WHERE cat_id = '$cat_id'";
	$query = $dou->query($sql);
	$cate_info = $dou->fetch_array($query);
	
	// 赋值给模板-meta和title信息
	$smarty->assign('page_title', $dou->page_title('article_category', $cat_id));
	$smarty->assign('keywords', $cate_info['keywords']);
	$smarty->assign('description', $cate_info['description']);
	
	// 赋值给模板-导航栏
	$smarty->assign('nav_top_list', $dou->get_nav('top'));
	$smarty->assign('nav_middle_list', $dou->get_nav('middle', '0', 'article_category', $cat_id, $cate_info['parent_id']));
	$smarty->assign('nav_bottom_list', $dou->get_nav('bottom'));
	
	// 赋值给模板-数据
	$smarty->assign('ur_here', $dou->ur_here('article_category', $cat_id));
	$smarty->assign('cate_info', $cate_info);
	
	$smarty->assign('article_category', $dou->get_category('article_category', $get_cat['root'], $get_cat['child']));
	
	$smarty->assign('get_cat',$get_cat);
	$smarty->assign('cat_id',$cat_id);
	$smarty->assign('article_list', $article_list);
	if(in_array($cat_id,$messageBoard)){
		if($cat_id != 70){
			// 留言板
			$smarty->display('guestbook_list.dwt');
		}else{
			// 留言列表
			$smarty->display('guestbook.dwt');
		}
		exit;
	}
	$smarty->display('article_category.dwt');
}    





?>