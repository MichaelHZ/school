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
$id = $firewall->get_legal_id('gallery', $_REQUEST['id'], $_REQUEST['unique_id']);
$cat_id = '74';
$parent_id = $dou->get_one("SELECT parent_id FROM " . $dou->table('article_category') . " WHERE cat_id = '" . $cat_id . "'");

if ($id == -1)
    $dou->dou_msg($GLOBALS['_LANG']['page_wrong'], ROOT_URL);
    
/* 获取详细信息 */
$query = $dou->select($dou->table('gallery'), '*', '`id` = \'' . $id . '\'');
$gallery = $dou->fetch_array($query);

// 格式化数据
$gallery['add_time'] = date("Y-m-d", $gallery['add_time']);

// 相册图集
if (is_array($gallery_array = unserialize($gallery['gallery']))) {
    $i = 0;
    foreach ($gallery_array as $row) {
        $array[] = array (
                "image" => ROOT_URL . $row,
                "number" => $i 
        );
        $i++;
    }
    $gallery['array'] = $array;
}
//var_dump($gallery['array']);
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
$click = $gallery['click'] + 1;
$dou->query("update " . $dou->table('gallery') . " SET click = '$click' WHERE id = '$id'");

// 赋值给模板-meta和title信息
$smarty->assign('page_title', $dou->page_title('gallery_category', $cat_id, $gallery['title']));
$smarty->assign('keywords', $gallery['keywords']);
$smarty->assign('description', $gallery['description']);

// 赋值给模板-导航栏
$smarty->assign('nav_top_list', $dou->get_nav('top'));
$smarty->assign('nav_middle_list', $dou->get_nav('middle', '0', 'gallery_category', $cat_id, $parent_id));
$smarty->assign('nav_bottom_list', $dou->get_nav('bottom'));

// 赋值给模板-数据
$smarty->assign('ur_here', $dou->ur_here('article_category', $cat_id, $article['title']));
$smarty->assign('get_cat',$get_cat);
$smarty->assign('article_category', $dou->get_category('article_category',$get_cat['root'], $get_cat['child']));
$smarty->assign('lift', $dou->lift('article', $id, $cat_id));
$smarty->assign('defined', $defined);
$smarty->assign('cat_id', $cat_id);
$smarty->assign('gallery', $gallery);
$smarty->display('gallery.dwt');
?>