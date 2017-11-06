<?php

define('IN_DOUCO', true);
// 开启SESSION
session_start();
require(dirname(__FILE__) . '/include/init.php');

// 验证并获取合法的ID，如果不合法将其设定为-1
$cat_id = $firewall->get_legal_id('article_category', $_REQUEST ['id'], $_REQUEST ['unique_id']);
// 不同栏目不同banner和话语
$smarty->assign('banner', $dou->get_parent_image($cat_id));

// 查找栏目
$special = $dou->get_one('select special from '.$dou->table('article_category').' where cat_id ='.$cat_id);

if( $special > 0 ){
    include_once 'special_page.php';

}else{
    $get_cat = $dou->get_two_catid($cat_id);
    $cat_id = $get_cat ['child'];
    if ($cat_id == -1) {
        $dou->dou_msg($GLOBALS ['_LANG'] ['page_wrong'], ROOT_URL);
    } else {

        $where = ' WHERE cat_id IN (' . $cat_id . $dou->dou_child_id('article_category', $cat_id) . ") And auditing = '1'  And stype='1'";

    }


// 获取普通文章分页信息
    $page = $check->is_number($_REQUEST ['page']) ? trim($_REQUEST ['page']) : 1;
    $show_list = $_DISPLAY ['article'] ? $_DISPLAY ['article'] : 10;
    $limit = $dou->pager('article', ($show_list), $page, $dou->rewrite_url('article_category', $cat_id), $where);

    /* 获取文章列表 */
    $sql = "SELECT id, title, content, image, cat_id, add_time, click, description,ctype,source,custom_url FROM " . $dou->table('article') . $where . " ORDER BY add_time  DESC" . $limit;

    $query = $dou->query($sql);

    while ($row = $dou->fetch_array($query)) {
        $url = $dou->rewrite_url('article', $row ['id']);
        $add_time = date("Y-m-d", $row ['add_time']);
        $add_time_short = date("m-d", $row ['add_time']);
        $image = $row ['image'] ? ROOT_URL . $row ['image'] : '';

        // 如果描述不存在则自动从详细介绍中截取
        $description = $row ['description'] ? $row ['description'] : $dou->dou_substr($row ['content'], 200, false);

        $article_list [] = array(
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
            "url" => $row['custom_url'] ? $row['custom_url'] : $url,
            "custom_url" => $row['custom_url'],
        );

    }

// 面包屑导航
    $sql = "SELECT id,nav_name,parent_id FROM " . $dou->table('nav') . " WHERE guide = '$cat_id' and type='middle'";
    $one = $dou->get_row($sql);

// var_dump($cur_nav);

    $sql = "SELECT cat_id, cat_name, parent_id,template FROM " . $dou->table('article_category') . " WHERE cat_id = '$get_cat[root]' ";
    $query = $dou->query($sql);
    $root = $dou->fetch_array($query);
    $root ['url'] = $url = $dou->rewrite_url('article_category', $get_cat ['root']);
    $sql = "SELECT cat_id, cat_name, parent_id,template FROM " . $dou->table('article_category') . " WHERE cat_id = '$get_cat[two]' ";
    $query = $dou->query($sql);
    $two = $dou->fetch_array($query);
    $two ['url'] = $url = $dou->rewrite_url('article_category', $get_cat ['two']);
    $sql = "SELECT cat_id, cat_name, parent_id,template FROM " . $dou->table('article_category') . " WHERE cat_id = '$get_cat[child]' ";
    $query = $dou->query($sql);
    $child = $dou->fetch_array($query);
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
    $smarty->assign('keywords', $cate_info ['keywords']);
    $smarty->assign('description', $cate_info ['description']);

// 赋值给模板-导航栏
    $smarty->assign('nav_top_list', $dou->get_nav('top'));
    $smarty->assign('nav_middle_list', $dou->get_nav('middle', '0', 'article_category', $cat_id, $cate_info ['parent_id']));
    $smarty->assign('nav_bottom_list', $dou->get_nav('bottom'));

// 赋值给模板-数据
    $smarty->assign('ur_here', $dou->ur_here('article_category', $cat_id));
    $smarty->assign('cate_info', $cate_info);



    $smarty->assign('article_category',$dou->get_category('article_category', 0, $get_cat ['child']));
// var_dump($get_cat);
    $smarty->assign('get_cat', $get_cat);
    $smarty->assign('cat_id', $cat_id);
    $smarty->assign('article_list', $article_list);

    if (isset ($_GET ['ctype']) && !empty ($_GET ['ctype'])) {
        // 创建
        $smarty->assign('nav_create_list', $dou->get_nav($_GET ['ctype']));
        $smarty->display('article_category_create.dwt');
        exit ();
    }

    if (($two ['template'] != 'default') && ($two ['cat_id'] == $child ['cat_id'])) {


        $smarty->display($two ['template'] . '.dwt');
    } elseif (($child ['template'] != 'default') && ($two ['cat_id'] != $child ['cat_id'])) {
        echo 2;
        $smarty->display($child ['template'] . '.dwt');
    } else {
        $smarty->display('article_category.dwt');
    }
}


function get_article_list($cat_id, $limit_start = 0, $limit_end = 6)
{
    global $dou;
    if ($cat_id == -1) {
        $dou->dou_msg($GLOBALS ['_LANG'] ['page_wrong'], ROOT_URL);
    } else {
        $where = ' WHERE cat_id IN (' . $cat_id . $dou->dou_child_id('article_category', $cat_id) . ')' . " and stype='1' And auditing = '1' ";
    }
    /* 获取文章列表 */
    $sql = "SELECT id, title, content, image, cat_id, add_time, click, description,ctype,keywords,custom_url FROM " . $dou->table('article') . $where . " ORDER BY add_time  DESC limit $limit_start,$limit_end";

    $query = $dou->query($sql);
    while ($row = $dou->fetch_array($query)) {
        $url = $dou->rewrite_url('article', $row ['id']);
        $add_time = date("Y-m-d", $row ['add_time']);
        $add_time_short = date("m-d", $row ['add_time']);
        $image = $row ['image'] ? ROOT_URL . $row ['image'] : '';

        // 如果描述不存在则自动从详细介绍中截取
        $description = $row ['description'] ? $row ['description'] : $dou->dou_substr($row ['content'], 200, false);

        $article_list [] = array(
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
            "url" => $row['custom_url'] ? $row['custom_url'] : $url
        );
    }
    return $article_list;
}

/**
 * +----------------------------------------------------------
 * 获取友情链接
 * +----------------------------------------------------------
 */
function get_link_list()
{
    $sql = "SELECT * FROM " . $GLOBALS ['dou']->table('link') . " ORDER BY sort ASC, id ASC";
    $query = $GLOBALS ['dou']->query($sql);
    while ($row = $GLOBALS ['dou']->fetch_array($query)) {
        $link_list [] = array(
            "id" => $row ['id'],
            "link_name" => $row ['link_name'],
            "link_url" => $row ['link_url'],
            "sort" => $row ['sort']
        );
    }

    return $link_list;
}

//
//function get_news_list($limit_start = 0, $limit_end = 8)
//{
//    global $dou;
//    $cat = "19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,42,43,44,45,46,98,51,52,53,47,48,49,50";
//    /* 获取文章列表 */
//    $sql = "SELECT id, title, content, image, cat_id, add_time, click, description,ctype,keywords,custom_url FROM " . $dou->table('article') . "where cat_id in ({$cat})  and stype='1' And auditing = '1' ORDER BY add_time  DESC limit $limit_start,$limit_end";
//    //echo $sql;
//    $query = $dou->query($sql);
//    while ($row = $dou->fetch_array($query)) {
//        $url = $dou->rewrite_url('article', $row ['id']);
//        $add_time = date("Y-m-d", $row ['add_time']);
//        $add_time_short = date("m-d", $row ['add_time']);
//        $image = $row ['image'] ? ROOT_URL . $row ['image'] : '';
//
//        // 如果描述不存在则自动从详细介绍中截取
//        $description = $row ['description'] ? $row ['description'] : $dou->dou_substr($row ['content'], 200, false);
//
//        $article_list [] = array(
//            "id" => $row ['id'],
//            "cat_id" => $row ['cat_id'],
//            "title" => $row ['title'],
//            "image" => $image,
//            "add_time" => $add_time,
//            "add_time_short" => $add_time_short,
//            "click" => $row ['click'],
//            "description" => $description,
//            "ctype" => $row ['ctype'],
//            "keywords" => $row ['keywords'],
//            "url" => $row['custom_url'] ? $row['custom_url'] : $url
//        );
//    }
//    return $article_list;
//}

?>