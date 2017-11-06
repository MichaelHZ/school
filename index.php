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

// 强制在移动端中显示PC版
if (isset($_REQUEST['mobile'])) {
    setcookie('client', 'pc');
    if ($_COOKIE['client'] != 'pc') $_COOKIE['client'] = 'pc';
}

require(dirname(__FILE__) . '/include/init.php');

// 如果存在搜索词则转入搜索页面
if ($_REQUEST['s']) {
    if ($check->is_search_keyword($keyword = trim($_REQUEST['s']))) {
        require(ROOT_PATH . 'include/search.inc.php');
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
$smarty->assign('nav_top_list', $dou->get_nav('top'));
$smarty->assign('nav_bottom_list', $dou->get_nav('bottom'));
$smarty->assign('nav_middle_list', $dou->get_nav('middle'));

//$smarty->assign('nav_bottom_list', $dou->get_nav('bottom'));
//$smarty->assign('nav_right_list', $dou->get_nav('index'));

// 幻灯
$smarty->assign('show_list_top', $dou->get_show_list('pc',1,9));
$smarty->assign('show_list_bottom', $dou->get_show_list('pc',10,19));
// 友链
$smarty->assign('link', get_link_list());

$smarty->assign('index', $index);

//$smarty->assign('recommend_product', $dou->get_list('product', 'ALL', $_DISPLAY['home_product'], 'sort DESC'));
//$smarty->assign('recommend_article', $dou->get_list('article', 'ALL', $_DISPLAY['home_article'], 'sort DESC'));


// 新闻中心
// 头条
$top = get_article_list(2, 0, 1, true);

$smarty->assign('news_top', $top[0]);
$smarty->assign('news_list', get_article_list(2, $top[0]['id']));

// 校园公告
$smarty->assign('notice_list', get_article_list(3));


// 教师风采
$smarty->assign('teacher_style_list', get_article_list(4));

// 教师获奖
$smarty->assign('teacher_award_list', get_article_list(5));

// 学生风采
$smarty->assign('student_list', get_article_list(6));

// 学生获奖
$smarty->assign('student_award_list', get_article_list(7));

// 美丽校园
$smarty->assign('school_list', get_article_list(8,0,1,true));

// 教师团队
$smarty->assign('teacher_list', get_article_list(9,0,1,true));

// 社团掠影
$smarty->assign('team_list', get_article_list(10,0,1,true));

// 家长园地
$smarty->assign('genearch_list', get_article_list(11,0,1,true));

// 校务文件
$smarty->assign('file_list', get_article_list(12));

// 校务公开
$smarty->assign('public_list', get_article_list(13));

// 特色课程
$smarty->assign('trait_list', get_article_list(14));

// 图片中心
$smarty->assign('image_list', get_article_list(15,'',6,true));

// CSRF防御令牌生成
$smarty->assign('token', $firewall->set_token('guestbook'));
$smarty->display('index.dwt');

/**
 * +----------------------------------------------------------
 * 获取友情链接
 * +----------------------------------------------------------
 */
function get_link_list()
{
    $sql = "SELECT * FROM " . $GLOBALS['dou']->table('link') . " ORDER BY sort ASC, id ASC";
    $query = $GLOBALS['dou']->query($sql);
    while ($row = $GLOBALS['dou']->fetch_array($query)) {
        $link_list[] = array(
            "id" => $row['id'],
            "link_name" => $row['link_name'],
            "link_url" => $row['link_url'],
            "sort" => $row['sort']
        );
    }

    return $link_list;
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
        $add_time = date("Y-m-d", $row['add_time']);
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