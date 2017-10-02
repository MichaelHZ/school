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
// 验证并获取合法的ID，如果不合法将其设定为-1
if($_POST){
	$stat = $data = $msg = '';
	$cat_id = $_POST['cat_id'];
	// ajax
	if ($cat_id == -1) {
		$stat = 0;
		$msg = '栏目ID错误';
	} else {
		$where = '';
	}
	// 获取分页信息
	$list = 10;
	$page = $check->is_number($_REQUEST['page']) ? trim($_REQUEST['page']) + 1 : 1;
	$limit = $list * $page;
	
	/* 获取文章列表 */
	$no_cat = "41,54,55,56,57,58,57,77,78,79,80,81,82,83,84,85,86,87,88,89,90,97,75,100";
	$sql = "SELECT id, title, content, image, cat_id, add_time,source, click, description,ctype,keywords FROM " . $dou->table('article')  . "where image != ''  And auditing = '1' And micromail = '1' and cat_id not in({$no_cat}) and stype='1' ORDER BY add_time  DESC limit  {$limit},{$list}";
	
	$query = $dou->query($sql);

	while ($row = $dou->fetch_array($query)) {
		$url = $dou->rewrite_url('article', $row['id']);
		$add_time = date("Y-m-d", $row['add_time']);
		$add_time_short = date("m-d", $row['add_time']);
		$image = $row['image'] ? ROOT_URL . $row['image'] : '';
	
		// 如果描述不存在则自动从详细介绍中截取
		$description = $row['description'] ? $row['description'] : $dou->dou_substr($row['content'], 76, false);
	
		$data[] = array (
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

	if(!empty($data)){
		$stat = 1;
	}
	
	echo json_encode(array('stat'=>$stat,'msg'=>$msg,'data'=>$data));
	exit;

}
$get_cat = $dou->get_two_catid($cat_id);
$cat_id = $get_cat['child'];
if ($cat_id == -1) {
    $dou->dou_msg($GLOBALS['_LANG']['page_wrong'], ROOT_URL);
} else {
    $where = '';
}
    
// 获取分页信息
$page = $check->is_number($_REQUEST['page']) ? trim($_REQUEST['page']) : 1;
$limit = $dou->pager('article', ($_DISPLAY['article'] ? $_DISPLAY['article'] : 10), $page, $dou->rewrite_url('article_category', $cat_id), $where);

	/* 获取文章列表 */
	$no_cat = "41,54,55,56,57,58,57,77,78,79,80,81,82,83,84,85,86,87,88,89,90,97,75,100";
	$sql = "SELECT id, title, content, image, cat_id, add_time,source, click, description,ctype,keywords FROM " . $dou->table('article')  . "where image != ''  And auditing = '1' And micromail = '1' and cat_id not in({$no_cat}) and stype='1' ORDER BY add_time  DESC limit 10";

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

$smarty->display('news_category.dwt');


?>