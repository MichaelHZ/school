<?php

define('IN_DOUCO', true);

require (dirname(__FILE__) . '/include/init.php');

// 验证并获取合法的ID，如果不合法将其设定为-1
$id = $firewall->get_legal_id('gallery', $_REQUEST['id'], $_REQUEST['unique_id']);
$cat_id = '74';
if ($id == -1)
    $dou->dou_msg($GLOBALS['_LANG']['page_wrong'], M_URL);
    
/* 获取详细信息 */
$query = $dou->select($dou->table('gallery'), '*', '`id` = \'' . $id . '\'');
$gallery = $dou->fetch_array($query);

// 格式化数据
$gallery['add_time'] = date("Y-m-d", $gallery['add_time']);
$gallery['array'] = unserialize($gallery['gallery']);

// 格式化自定义参数
foreach (explode(',', $gallery['defined']) as $row) {
    $row = explode('：', str_replace(":", "：", $row));
    
    if ($row['1']) {
        $defined[] = array (
                "arr" => $row['0'],
                "value" => $row['1'] 
        );
    }
}

// 访问统计
$click = $gallery['click'] + 1;
$dou->query("update " . $dou->table('gallery') . " SET click = '$click' WHERE id = '$id'");
$get_cat = $dou->get_two_catid($cat_id);
$cat_id = $get_cat['child'];
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
$smarty->assign('get_cat',$get_cat);
$smarty->assign('cat_id',$cat_id);
// 赋值给模板-数据
$smarty->assign('cate_info', $cate_info);
$smarty->assign('head', $dou->head($_LANG['gallery']));
$smarty->assign('ur_here', $dou->ur_here('article_category', $cat_id));
$smarty->assign('article_category', $dou->get_category('article_category', $get_cat['root'], $get_cat['child']));
$smarty->assign('gallery', $gallery);
$smarty->assign('defined', $defined);

$smarty->display('gallery.dwt');
?>