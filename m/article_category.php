<?php

define('IN_DOUCO', true);

require(dirname(__FILE__) . '/include/init.php');
// 留言板的三个栏目ID
$messageBoard = array('', '', '');
// 验证并获取合法的ID，如果不合法将其设定为-1
$cat_id = $firewall->get_legal_id('article_category', $_REQUEST['id'], $_REQUEST['unique_id']);

// 查找栏目
$special = $dou->get_one('select special from ' . $dou->table('article_category') . ' where cat_id =' . $cat_id);

if ($special > 0) {
    include_once 'special_page.php';

} else {

    $get_cat = $dou->get_two_catid($cat_id);
//$cat_id = $get_cat['child'];

    if ($cat_id == -1) {
        $dou->dou_msg($GLOBALS['_LANG']['page_wrong'], ROOT_URL);
    } else {
        $where = ' WHERE cat_id IN (' . $cat_id . $dou->dou_child_id('article_category', $cat_id) . ") And auditing = '1' And micromail = '1' ";
    }

// 获取分页信息
    $page = $check->is_number($_REQUEST['page']) ? trim($_REQUEST['page']) : 1;

    $limit = $dou->blog_pager('article', ($_DISPLAY['article'] ? $_DISPLAY['article'] : 10), $page, $dou->rewrite_url('article_category_list', $cat_id), $where, $get = '', $close_rewrite = false);

    $sql = "SELECT id FROM " . $dou->table('nav') . " WHERE guide = '$get_cat[root]' and type='middle'";
    $cur_nav = $dou->get_one($sql);
//var_dump($cur_nav);
// 面包屑导航
    $sql = "SELECT cat_id, cat_name, parent_id,template FROM " . $dou->table('article_category') . " WHERE cat_id = '$get_cat[root]' ";
    $query = $dou->query($sql);
    $root = $dou->fetch_array($query);
    $root['url'] = $url = $dou->rewrite_url('article_category', $get_cat['root']);
    $sql = "SELECT cat_id, cat_name, parent_id,template FROM " . $dou->table('article_category') . " WHERE cat_id = '$get_cat[two]' ";
    $query = $dou->query($sql);
    $two = $dou->fetch_array($query);
    $two['url'] = $url = $dou->rewrite_url('article_category', $get_cat['two']);
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

    $smarty->assign('get_cat', $get_cat);
    $smarty->assign('cat_id', $cat_id);
    $smarty->assign('article_list', $article_list);
    if (in_array($cat_id, $messageBoard)) {
        if ($cat_id != 70) {
            // 留言板
            $smarty->display('guestbook_list.dwt');
        } else {
            // 留言列表
            $smarty->display('guestbook.dwt');
        }
        exit;
    }
    $smarty->display('article_category.dwt');

}

?>