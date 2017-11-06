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
if($_POST){
	$article_id = intval($_REQUEST['blog_id']);
	$pwd = intval($_REQUEST['pwd']);
	$id = $dou->get_one("SELECT id FROM " . $dou->table('article') . " WHERE password = '{$pwd}' And stype='2' and id = '$article_id'");	
	if($id > 0){
		$_SESSION['password'] = $article_id;
		echo 0;
	}else{
		echo 1;
	}
	exit;
}

// 验证并获取合法的ID，如果不合法将其设定为-1
// 验证并获取合法的ID，如果不合法将其设定为-1
$article_id  = $firewall->get_legal_user('article', $_REQUEST['id']);

if ($article_id == -1) {

	$dou->dou_msg('博客不存在', ROOT_URL);

} else {
		$where = " WHERE  stype='2' ";
}


$blog_id = $dou->get_one("SELECT blog_id FROM " . $dou->table('article') . " WHERE  stype='2' and id = '$article_id'");

if(!($blog_id > 0)){
	$dou->dou_msg('博文不存在', ROOT_URL);
}
   
/* 获取详细信息 */
$query = $dou->select($dou->table('article'), '*', '`id` = \'' . $article_id . '\'');
$article = $dou->fetch_array($query);

// 格式化数据
$article['add_time'] = date("Y-m-d H:i:s", $article['add_time']);
// 口令

 if ( !empty($article['password'] )  && $_SESSION['password'] != $article['id']  ){
	//var_dump($_SESSION['password'] );
    $smarty->assign('cur_blog_id',$article_id);
	$smarty->display('password.dwt');
	exit;
}
// 格式化自定义参数
foreach (explode(',', $article['defined']) as $row) {
    $row = explode('：', str_replace(":", "：", $row));
    
    if ($row['1']) {
        $defined[] = array (
                "arr" => $row['0'],
                "value" => $row['1'] 
        );
    }
}
// 访问统计
$click = $article['click'] + 1;
$dou->query("update " . $dou->table('article') . " SET click = '$click' WHERE id = '$article_id'");


// 获取分类信息
$cat_one = $cat_two = '';
$cur_cat_info = $dou->get_row("Select cat_id,cat_name,parent_id From" . $dou->table('blog_category') . " Where cat_id = '" . $blog_id . "' ");
$cur_cat_info['url'] = $dou->rewrite_url('blog_category', $cur_cat_info['cat_id']);
if ($cur_cat_info['parent_id'] == 0) {
    $cat_one = $cur_cat_info;
    $tmp = $dou->get_row("Select cat_id,cat_name,parent_id From" . $dou->table('blog_category') . " Where parent_id = '" . $blog_id . "' limit 1");

    $cat_two = $tmp;

    $cat_two['url'] = $dou->rewrite_url('blog_category', $cat_two['cat_id']);
} else {
    $tmp = $dou->get_row("Select cat_id,cat_name,parent_id From" . $dou->table('blog_category') . " Where cat_id = '" . $cur_cat_info['parent_id'] . "' Order by sort asc limit 1");
    $cat_one = $tmp;
    $cat_one['url'] = $dou->rewrite_url('blog_category', $cat_one['cat_id']);
    $cat_two = $cur_cat_info;
}

$cats = $dou->get_blog_category('blog_category');

$smarty->assign('cat_one', $cat_one);
$smarty->assign('cat_two', $cat_two);
$smarty->assign('blog_category_list', $cats[0]);
// 赋值给模板-meta和title信息
$smarty->assign('page_title',$user['nick_name'].'的博客');
$smarty->assign('keywords', $user['nick_name'].'的博客');
$smarty->assign('description', $user['nick_name'].'的博客');

// 赋值给模板-导航栏
$smarty->assign('nav_top_list', $dou->get_nav('top'));
$smarty->assign('nav_middle_list', $dou->get_nav('middle', '0', 'article_category', $cat_id, $parent_id));
$smarty->assign('nav_bottom_list', $dou->get_nav('bottom'));
$article['cat_name'] = $cats[1][$article['blog_id']];
// 赋值给模板-数据
$smarty->assign('top_list',get_article_list($cat_two['cat_id'],10,10,true ));

$smarty->assign('view_list',get_article_list($cat_two['cat_id'],0,10,false,array(), ' click desc,sort desc,add_time desc' ));

$smarty->assign('lift', $dou->blog_lift('article', $article_id, $user['user_id']));


$smarty->assign('nick_name', $dou->get_row("Select nick_name From ".$dou->table('admin')." where user_id =".$article['user_id']));
$smarty->assign('article', $article);



$smarty->display('blog.dwt');



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
 * @var array $cats // need category name
 *
 * @var string $orderBy // order by
 *
 * @return array | boolean
 */
function get_article_list($blog_id, $except = 0, $limit = 10, $img = false,$cats = array(),$orderBy = '')
{


    global $dou;

    if (intval($blog_id) < 0) {
        return false;
    }

    $blog_id = intval($blog_id);

    $where = ' Where blog_id In (' . $blog_id . ')';

    if ($img) {
        $where .= " And image <> '' ";
    }

    if ($except > 0) {
        $where .= " And id <> '$except' ";
    }

    $where .= " And stype = '2' ";

    $where .= " And auditing = '1' ";

    if(!empty($orderBy)){
        $where .= " Order By ".$orderBy;
    }else{
        $where .= " Order By sort desc,add_time desc";
    }



    $sql = "SELECT count(id) c FROM " . $dou->table('article') . $where;

    $count = $dou->get_one($sql);

    if ($count <= 0) {
        return false;
    }

    if(!empty($limit)){
        $where .= ' Limit '.$limit;
    }


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