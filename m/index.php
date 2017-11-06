<?php

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
$index['about_name'] = $about['page_name'];
$index['about_content'] = $about['description'] ? $about['description'] : $dou->dou_substr($about['content'], 300, false); // 这里的300数值不能设置得过大，否则会造成程序卡死
$index['about_link'] = $dou->rewrite_url('page', '1');
$index['cur'] = true;

// 赋值给模板-meta和title信息
$smarty->assign('page_title', $dou->page_title());
$smarty->assign('keywords', $_CFG['site_keywords']);
$smarty->assign('description', $_CFG['site_description']);



// 赋值给模板-导航栏
$smarty->assign('nav_list', is_array($dou->get_nav()) ? $dou->get_nav() : $dou->get_nav('middle'));



// 获取分页信息
$page = $check->is_number($_REQUEST['page']) ? trim($_REQUEST['page']) : 1;


// 校园动态
$dou->blog_pager('article', ($_DISPLAY['article'] ? $_DISPLAY['article'] : 10), $page, $dou->rewrite_url('article_list', 25), get_cats(25),$get='',$close_rewrite = false,$cur='pager1');

// 学校管理
$dou->blog_pager('article', ($_DISPLAY['article'] ? $_DISPLAY['article'] : 10), $page, $dou->rewrite_url('article_list', 26), get_cats(26),$get='',$close_rewrite = false,$cur='pager2');
// 教育科研
$dou->blog_pager('article', ($_DISPLAY['article'] ? $_DISPLAY['article'] : 10), $page, $dou->rewrite_url('article_list', 27), get_cats(27),$get='',$close_rewrite = false,$cur='pager3');
// 常规评比
$dou->blog_pager('article', ($_DISPLAY['article'] ? $_DISPLAY['article'] : 10), $page, $dou->rewrite_url('article_list', 28), get_cats(28),$get='',$close_rewrite = false,$cur='pager4');

// 幻灯
$smarty->assign('show_list', is_array($dou->get_show_list('mobile')) ? $dou->get_show_list('mobile') : $dou->get_show_list('pc'));

$smarty->assign('index', $index);

$smarty->assign('dynamic_list', get_article_list(25,0,3));

$smarty->assign('article_category', $dou->get_category('article_category'));


// CSRF防御令牌生成
$smarty->assign('token', $firewall->set_token('guestbook'));
$smarty->display('index.dwt');

function get_cats($position){
    global $dou;

    if (intval($position) < 0) {
        return false;
    }

    $position = intval($position);

    $sql = "Select cat_id From " . $dou->table('article_category') . " where find_in_set(" . $position . ",home_position)";

    $query = $dou->query($sql);

    if (!$query) {
        return false;
    }


    $list = array();

    while ($row = $dou->fetch_array($query)) {
        $list[] = $row['cat_id'];
    }


    $cat = implode(',', $list);

    return ' Where cat_id In (' . $cat . ')  And stype= 1 ';
}

/**
 * 取得首页对应位置的栏目下的文章
 *
 * @var int $position // home position id
 *
 * @var int $except // article id
 *
 * @var int $limit // limit count
 *
 * @var boolean $img // need images
 *
 * @return array | boolean
 */
function get_article_list($position, $except = 0, $limit = 10, $img = false)
{
    global $dou;

    if (intval($position) < 0) {
        return false;
    }

    $position = intval($position);

    $sql = "Select cat_id From " . $dou->table('article_category') . " where find_in_set(" . $position . ",home_position)";

    $query = $dou->query($sql);

    if (!$query) {
        return false;
    }


    $list = array();

    while ($row = $dou->fetch_array($query)) {
        $list[] = $row['cat_id'];
    }


    $cat = implode(',', $list);

    $where = ' Where cat_id In (' . $cat . ')';

    if ($img) {
        $where .= " And image <> '' ";
    }

    if ($except > 0) {
        $where .= " And id <> '$except' ";
    }

    $where .= " And stype = '1' ";

    $where .= " And auditing = '1' ";

    $where .= " Order By sort desc,add_time desc";


    $sql = "SELECT count(id) c FROM " . $dou->table('article') . $where;

    $count = $dou->get_one($sql);

    if ($count <= 0) {
        return false;
    }
    /* 获取文章列表 */

    $where .= " Limit " . $limit;

    $sql = "SELECT id, title, content, image, cat_id, add_time, click, description,ctype,keywords,custom_url FROM " . $dou->table('article') . $where;

    $query = $dou->query($sql);

    if (!$query) {

        return false;

    }
    $list = array();

    while ($row = $dou->fetch_array($query)) {
        $list[] = $row;
    }

    $array = array();
    $article_list = array();
    //var_dump($list);
    foreach ($list as $row) {

        $url = $dou->rewrite_url('article', $row['id']);
        $add_time = date("Y.m.d", $row['add_time']);
        $add_time_short = date("m-d", $row['add_time']);
        $add_time_ym = date("Y-m", $row['add_time']);
        $add_time_d = date("d", $row['add_time']);
        $image = $row['image'] ? ROOT_URL . $row['image'] : '';

        // 如果描述不存在则自动从详细介绍中截取
        $description = $row['description'] ? $row['description'] : $dou->dou_substr($row['content'], 200, false);

        $article_list[] = array(
            "id" => $row['id'],
            "cat_id" => $row['cat_id'],
            "title" => $row['title'],
            "image" => $image,
            "add_time" => $add_time,
            "add_time_ym" => $add_time_ym,
            "add_time_d" => $add_time_d,
            "add_time_short" => $add_time_short,
            "click" => $row['click'],
            "description" => $description,
            "ctype" => $row['ctype'],
            "keywords" => $row['keywords'],
            "url" => $row['custom_url'] ? $row['custom_url'] : $url
        );

    }

    //var_dump($article_list);
    return $article_list;
}
?>