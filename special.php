<?php

define('IN_DOUCO', true);
// 开启SESSION
session_start();
require (dirname(__FILE__) . '/include/init.php');

// 验证并获取合法的ID，如果不合法将其设定为-1
$cat_id = $firewall->get_legal_id('article_category', $_REQUEST['id'], $_REQUEST['unique_id']);
if($_POST){
	$article_id = intval($_REQUEST['blog_id']);
	$pwd = trim($_REQUEST['pwd']);
	if(empty($pwd) || empty($article_id)){
		echo 1;
		exit;
	}
	$id = $dou->get_one("SELECT id FROM " . $dou->table('article') . " WHERE password = '{$pwd}' And stype='1' and id = '$article_id'");
	$cat_id = $dou->get_one("SELECT cat_id FROM " . $dou->table('article') . " WHERE stype='1' and id = '$article_id'");
	if($id > 0){
		$_SESSION['password'] = $article_id;
		echo 0;

	}else{
		if($cat_id > 0){
			$cat_is_password = $dou->get_one("SELECT is_password FROM " . $dou->table('article_category') . " WHERE cat_id = '$cat_id'");
		}
		if($cat_is_password > 0){
			$cat_password = $dou->get_one("SELECT password FROM " . $dou->table('article_category') . " WHERE cat_id = '$cat_id'");
			if($cat_password == $pwd){
			$_SESSION['password'] = $article_id;
				echo 0;
			}else{
				echo 1;
			}
		}else{
			// 定义每篇文章应有一个对应的栏目ID 执行到这定义错误
			echo 2;
		}
	}
	exit;
}

$get_cat = $dou->get_top_three_cats($cat_id);


$cat_id = $get_cat ['child'][cat_id];

// 面包屑导航
$sql = "SELECT id,nav_name,parent_id FROM " . $dou->table('nav') . " WHERE guide = '$cat_id' and type='middle'";
$one = $dou->get_row($sql);



$sql = "SELECT cat_id, cat_name, parent_id,template FROM " . $dou->table('article_category') . " WHERE cat_id = '{$get_cat['root']['cat_id']}' ";
$query = $dou->query($sql);
$root = $dou->fetch_array($query);
$root ['url'] = $url = $dou->rewrite_url('article_category', $get_cat ['root']['cat_id']);
$sql = "SELECT cat_id, cat_name, parent_id,template FROM " . $dou->table('article_category') . " WHERE cat_id = '{$get_cat['two']['cat_id']}' ";
$query = $dou->query($sql);
$two = $dou->fetch_array($query);

$two ['url'] = $url = $dou->rewrite_url('article_category', $get_cat ['two']['cat_id']);


$sql = "SELECT cat_id, cat_name, parent_id,template FROM " . $dou->table('article_category') . " WHERE cat_id = '{$get_cat['child']['cat_id']}' ";

$query = $dou->query($sql);
$child = $dou->fetch_array($query);

$smarty->assign('cat_root', $root);
$smarty->assign('cat_two', $two);
$smarty->assign('cat_child', $child);
// 获取分类信息

$cate_info = $child;

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



$smarty->assign('article_category',$dou->get_category('article_category', 0, $get_cat ['child']['cat_id']));
// var_dump($get_cat);
$smarty->assign('get_cat', $get_cat);
$smarty->assign('cat_id', $cat_id);


if($child['template'] == 'research_list'){

   $table = 'research';
}elseif($child['template'] == 'special_list'){
    $table = 'special';
}

$id = $firewall->get_legal_id($table, $_REQUEST['sid'], $_REQUEST['unique_id']);

if ($id == -1)
    $dou->dou_msg($GLOBALS['_LANG']['page_wrong'], ROOT_URL);





/* 获取详细信息 */
$query = $dou->select($dou->table($table), '*', '`id` = \'' . $id . '\'');

$article = $dou->fetch_array($query);

// 格式化数据
$article['add_time'] = date("Y-m-d", $article['add_time']);
// 口令

 if ( !empty($article['is_password'] )  && $_SESSION['password'] != $article['id']  ){
	//var_dump($_SESSION['password'] );
    $smarty->assign('cur_blog_id',$id);
	$smarty->display('apassword.dwt');
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
$dou->query("update " . $dou->table('special') . " SET click = '$click' WHERE id = '$id'");


$smarty->assign('article', $article);
$smarty->assign('lift', $dou->special_lift($table, $id, $cat_id));
$smarty->display('special.dwt');

?>