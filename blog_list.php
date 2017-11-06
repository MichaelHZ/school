<?php

define('IN_DOUCO', true);
// 开启SESSION
session_start();
require(dirname(__FILE__) . '/include/init.php');


// 验证并获取合法的ID，如果不合法将其设定为-1
$cat_id = $firewall->get_legal_id('blog_category', intval($_REQUEST['id']));

if ($cat_id == -1) {
    $dou->dou_msg('博客栏目不存在', ROOT_URL);
}

$cat_one = $cat_two = '';
$cur_cat_info = $dou->get_row("Select cat_id,cat_name,parent_id From" . $dou->table('blog_category') . " Where cat_id = '" . $cat_id . "' ");
$cur_cat_info['url'] = $dou->rewrite_url('blog_category', $cur_cat_info['cat_id']);

if ($cur_cat_info['parent_id'] == 0) {
    $cat_one = $cur_cat_info;
    $tmp = $dou->get_row("Select cat_id,cat_name,parent_id From" . $dou->table('blog_category') . " Where parent_id = '" . $cat_id . "' limit 1");

    $cat_two = $tmp;


    $cat_two['url'] = $dou->rewrite_url('blog_category', $cat_two['cat_id']);
} else {
    $tmp = $dou->get_row("Select cat_id,cat_name,parent_id From" . $dou->table('blog_category') . " Where cat_id = '" . $cur_cat_info['parent_id'] . "' Order by sort asc limit 1");
    $cat_one = $tmp;
    $cat_one['url'] = $dou->rewrite_url('blog_category', $cat_one['cat_id']);
    $cat_two = $cur_cat_info;

}


$sql = "Select user_id,nick_name From ".$dou->table('admin')." Where status = 1 order by sort,user_id asc ";
$query = $dou->query($sql);
$user_list = array();
while($row = $dou->fetch_array($query)){

    $user_list[$row['user_id']] = $row['nick_name'];

}
$cats = $dou->get_home_category('blog_category');
$where = " WHERE blog_id = '" . $cat_two['cat_id'] . "' And stype='2' ";


// 获取分页信息
$page = $check->is_number($_REQUEST['page']) ? trim($_REQUEST['page']) : 1;
$limit = $dou->blog_pager('article', ($_DISPLAY['article'] ? $_DISPLAY['article'] : 10), $page, $dou->rewrite_url('blog_category', $cat_id), $where);

//var_dump($cate);
/* 获取文章列表 */
$sql = "SELECT id, title, content, image, blog_id, add_time, click, description,ctype,source,custom_url,user_id FROM " . $dou->table('article') . $where . " ORDER BY sort ASC,add_time DESC" . $limit;

$query = $dou->query($sql);
$index = 0;
while ($row = $dou->fetch_array($query)) {

    $url = $dou->rewrite_url('blog', $row['id']);
    $add_time = date("Y-m-d", $row['add_time']);
    $add_time_short = date("m-d", $row['add_time']);
    $add_day = date("d", $row['add_time']);
    $add_month = date("m", $row['add_time']);
    $image = $row['image'] ? ROOT_URL . $row['image'] : '';

    // 如果描述不存在则自动从详细介绍中截取
    $description = $row ['description'] ? $row ['description'] : $dou->dou_substr($row ['content'], 200, false);
    //var_dump($row['blog_id']);
    $article_list [] = array(
        "id" => $row ['id'],
        "user_name"=>$user_list[$row['user_id']],
        "index" => $index++,
        "blog_id" => $row ['blog_id'],
        "cat_name" => $cats[1][$row ['blog_id']]['cat_name'],
        "title" => $row ['title'],
        "image" => $image,
        "month" => $add_month,
        "day" => $add_day,
        "add_time" => $add_time,
        "add_time_short" => $add_time_short,
        "click" => $row ['click'],
        "description" => $description,
        "ctype" => $row ['ctype'],
        "keywords" => $row ['keywords'],
        "url" => $row['custom_url'] ? $row['custom_url'] : $url
    );
}

$smarty->assign('article_list', $article_list);
$smarty->display('blog_list.dwt');



?>