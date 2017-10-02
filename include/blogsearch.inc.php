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

// 初始化
$module = $check->is_letter($_REQUEST['module']) ? $_REQUEST['module'] : 'article';
switch ($module) {
//     case 'product' : // 产品模块
//         $name_field = 'name';
//         $smarty->assign('keyword', $keyword);
//         $search_url = '?s=';
//         break;
    default :
        $name_field = 'title';
        $smarty->assign('keyword_article', $keyword);
        $search_url = '?module=article&s=';
}

// 筛选条件
//$where = " WHERE " . $name_field . " LIKE '%$keyword%' And stype='2' And auditing = '1' ";
$where = " WHERE " . $name_field . " LIKE '%$keyword%' And stype='2'  ";
// 获取分页信息
$page = $check->is_number($_REQUEST['page']) ? $_REQUEST['page'] : 1;
$limit = $dou->pager($module, ($_DISPLAY[$module] ? $_DISPLAY[$module] : 10), $page, ROOT_URL . $search_url . $keyword, $where, '', true);
// 获取分类信息
$sql = "SELECT * FROM " . $dou->table ( 'blog_category' );
$query = $dou->query ( $sql );
while ( $row = $dou->fetch_array ( $query ) ) {
	$cate [$row ['blog_id']] = $row ['cat_name'];
	$sql = "SELECT count(*) FROM " . $dou->table ( 'article' ) . "WHERE user_id = '{$user['user_id']}' And stype='2' And blog_id ='{$row['blog_id']}'";
	$row ['article_count'] = $dou->get_one ( $sql );
	$cate_info [] = $row;
}
/* 获取搜索结果列表 */
$sql = "SELECT * FROM " . $dou->table($module) . $where . " ORDER BY id DESC" . $limit;

$query = $dou->query($sql);
while ($row = $dou->fetch_array($query)) {
    //$cat_name = $dou->get_one("SELECT cat_name FROM " . $dou->table('product_category') . " WHERE cat_id = '$row[cat_id]'");
//     $url = $dou->rewrite_url($module, $row['id']). "&blog_id={$row['user_id']}";
//     $add_time = date("Y-m-d", $row['add_time']);
//     $add_time_short = date("m-d", $row['add_time']);
    
//     $description = $row['description'] ? $row['description'] : $dou->dou_substr($row['content'], 150);
    
//     // 生成缩略图的文件名
//     $image = explode('.', $row['image']);
//     $thumb = ROOT_URL . $image[0] . '_thumb.' . $image[1];
//     $price = $row['price'] > 0 ? $dou->price_format($row['price']) : $_LANG['price_discuss'];
//     $cat_info = get_cat_info($row['cat_id']);
//     $search_list[] = array (
//             "id" => $row['id'],
//             "cat_id" => $row['cat_id'],
//     		"cat_name_1" => $cat_info,
//     		"cat_url" => '/article_category.php?id='.$row['cat_id'],
//             "name" => $row[$name_field],
//             "title" => $row[$name_field],
//             "price" => $price,
//             "thumb" => $thumb,
//             "cat_name" => $cat_name,
//             "add_time" => $add_time,
//             "add_time_short" => $add_time_short,
//             "click" => $row['click'],
//             "description" => $description,
//             "url" => $url 
//     );
	$url = $dou->rewrite_url ( 'blog', $row ['id'] ) . "&blog_id={$row['user_id']}";
	$add_time = date ( "Y-m-d", $row ['add_time'] );
	$add_time_short = date ( "m-d", $row ['add_time'] );
	$image = $row ['image'] ? ROOT_URL . $row ['image'] : '';
	
	// 如果描述不存在则自动从详细介绍中截取
	$description = $row ['description'] ? $row ['description'] : $dou->dou_substr ( $row ['content'], 200, false );
	//var_dump($row['blog_id']);
	$search_list [] = array (
			"id" => $row ['id'],
			"user_face" => $user_list[$row['user_id']]['face'],
			"index" => $index++,
			"blog_id" => $row ['blog_id'],
			"cat_name" => $cate [$row ['blog_id']],
			"title" => $row ['title'],
			"image" => $image,
			"add_time" => $add_time,
			"add_time_short" => $add_time_short,
			"click" => $row ['click'],
			"description" => $description,
			"ctype" => $row ['ctype'],
			"keywords" => $row ['keywords'],
			"url" => $url
	);
   
}
//var_dump($search_list);
$search_results = preg_replace('/d%/Ums', $keyword, $_LANG['search_results']);

// 赋值给模板-meta和title信息
$smarty->assign('page_title', $dou->page_title('search', '', $search_results));
$smarty->assign('keywords', $_CFG['site_keywords']);
$smarty->assign('description', $_CFG['site_description']);

// 赋值给模板-导航栏
$smarty->assign('nav_top_list', $dou->get_nav('top'));
$smarty->assign('nav_middle_list', $dou->get_nav('middle'));
$smarty->assign('nav_bottom_list', $dou->get_nav('bottom'));

// 赋值给模板-数据
$smarty->assign('ur_here', $search_results);
$smarty->assign('search_module', $module);
$smarty->assign('article_category', $dou->get_category('article_category'));
$smarty->assign('search_list', $search_list);

$smarty->display('blogsearch.dwt');

// 终止执行文件外的程序
exit();
function get_cat_info($cat_id) {
    $sql = "SELECT cat_name FROM " . $GLOBALS['dou']->table('article_category') . " where cat_id = '".$cat_id."'";
    
    $query = $GLOBALS['dou']->query($sql);
    while ($row = $GLOBALS['dou']->fetch_array($query)) {
        $link_list = $row;
    }
    
    return $link_list['cat_name'];
}
?>