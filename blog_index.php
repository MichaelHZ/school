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
define ( 'IN_DOUCO', true );
// 开启SESSION
session_start ();
// 强制在移动端中显示PC版
if (isset ( $_REQUEST ['mobile'] )) {
	setcookie ( 'client', 'pc' );
	if ($_COOKIE ['client'] != 'pc')
		$_COOKIE ['client'] = 'pc';
}

require (dirname ( __FILE__ ) . '/include/init.php');

// 如果存在搜索词则转入搜索页面
if ($_REQUEST ['s']) {
	if ($check->is_search_keyword ( $keyword = trim ( $_REQUEST ['s'] ) )) {
		require (ROOT_PATH . 'include/blogsearch.inc.php');
	} else {
		$dou->dou_msg ( $_LANG ['search_keyword_wrong'] );
	}
}

// 获取分类信息
$sql = "SELECT * FROM " . $dou->table ( 'blog_category' );
$query = $dou->query ( $sql );
while ( $row = $dou->fetch_array ( $query ) ) {
	$cate [$row ['blog_id']] = $row ['cat_name'];
	$sql = "SELECT count(*) FROM " . $dou->table ( 'article' ) . "WHERE user_id = '{$user['user_id']}' And stype='2' And blog_id ='{$row['blog_id']}'";
	$row ['article_count'] = $dou->get_one ( $sql );
	$cate_info [] = $row;
}
$smarty->assign ( 'cate_info',$cate_info );

// 博客所有成员按职务排列
$sql = "Select * From ".$dou->table('job_list')." where jid != '8' order by jid asc";

$query = $dou->query($sql);
while($row = $dou->fetch_array($query)){

    $list[$row['jid']]['job_name'] = $row['job_name'];
    $sql = "Select user_id,nick_name From ".$dou->table('admin')." Where job_id = '{$row['jid']}' and status = 1 order by sort,user_id asc ";
    $a = array();
    $q = $dou->query($sql);
    while($r = $dou->fetch_array($q)){
        $a[] = $r;
    }

    $list[$row['jid']]['member'] = $a;
}
$smarty->assign ( 'member_list', $list );

$cats = $dou->get_home_category('blog_category');

$smarty->assign ( 'blog_category', $cats[0] );
$smarty->assign ( 'cats', $cats[1] );

//  新闻中心
$top = get_article_list(16, 0, 8, true);

$smarty->assign('news_top', $top);

$resource = get_article_list(17, 0, 8, false,$cats[1]);


$smarty->assign('resource_top', $resource);

$blog_home_position = $dou->get_home_position('blog_home');

$list = array();
foreach($blog_home_position as $cate){
    $list[$cate['id']] = get_article_list($cate['id'], '',8);
}



$smarty->assign('list',$list);

// 赋值给模板-meta和title信息
$smarty->assign ( 'page_title', '报慈小学博客首页' );
$smarty->assign ( 'keywords', '报慈小学博客首页' );
$smarty->assign ( 'description', '报慈小学博客首页' );

// 赋值给模板-导航栏
$smarty->assign ( 'nav_top_list', $dou->get_nav ( 'top' ) );
$smarty->assign ( 'nav_middle_list', $dou->get_nav ( 'middle' ) );
$smarty->assign ( 'nav_bottom_list', $dou->get_nav ( 'bottom' ) );

// 赋值给模板-数据
$smarty->assign ( 'show_list', $dou->get_show_list () );
$smarty->assign ( 'index', $index );
$smarty->assign ( 'recommend_article', $dou->get_list ( 'article', 'ALL', $_DISPLAY ['home_article'], 'sort DESC' ) );

// CSRF防御令牌生成
$smarty->assign ( 'token', $firewall->set_token ( 'guestbook' ) );
$smarty->display ( 'blog_index.dwt' );


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
function get_article_list($position, $except = 0, $limit = 10, $img = false,$cats = array())
{


    global $dou;

    if (intval($position) < 0) {
        return false;
    }

    $position = intval($position);

    $sql = "Select cat_id From " . $dou->table('blog_category') . " where find_in_set(" . $position . ",home_position)";
//    echo $sql;

    $query = $dou->query($sql);

    if (!$query) {
        return false;
    }


    $list = array();

    while ($row = $dou->fetch_array($query)) {
        $list[] = $row['cat_id'];
    }


    $cat = implode(',', $list);

    $where = ' Where blog_id In (' . $cat . ')';

    if ($img) {
        $where .= " And image <> '' ";
    }

    if ($except > 0) {
        $where .= " And id <> '$except' ";
    }

    $where .= " And stype = '2' ";

    $where .= " And auditing = '1' ";

    $where .= " Order By sort desc,add_time desc";


    $sql = "SELECT count(id) c FROM " . $dou->table('article') . $where;

    $count = $dou->get_one($sql);

    if ($count <= 0) {
        return false;
    }
    /* 获取文章列表 */

    $where .= " Limit " . $limit;

    $sql = "SELECT id, title, content, image, cat_id, add_time, click, description,ctype,keywords,custom_url,blog_id FROM " . $dou->table('article') . $where;

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

        $url = $dou->rewrite_url('blog', $row['id']);
        $add_time = date("Y-m-d", $row['add_time']);
        $add_time_short = date("m-d", $row['add_time']);
        $add_time_ym = date("Y-m", $row['add_time']);
        $add_time_d = date("d", $row['add_time']);
        $image = $row['image'] ? ROOT_URL . $row['image'] : '';

        // 如果描述不存在则自动从详细介绍中截取
        $description = $row['description'] ? $row['description'] : $dou->dou_substr($row['content'], 200, false);
        $cat_name = '';

        if(count($cats) > 0){
            //var_dump($cats);
            $cat_name = $cats[$row['blog_id']]['cat_name'];
        }

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
            "cat_name" => $cat_name,
            "keywords" => $row['keywords'],
            "url" => $row['custom_url'] ? $row['custom_url'] : $url
        );

    }

    //var_dump($article_list);
    return $article_list;
}
?>