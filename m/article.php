<?php

define('IN_DOUCO', true);

require (dirname(__FILE__) . '/include/init.php');
// 开启SESSION
session_start();
// 验证并获取合法的ID，如果不合法将其设定为-1
$id = $firewall->get_legal_id('article', $_REQUEST['id'], $_REQUEST['unique_id']);
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

$cat_id = $dou->get_one("SELECT cat_id FROM " . $dou->table('article') . " WHERE id = '$id'");
$parent_id = $dou->get_one("SELECT parent_id FROM " . $dou->table('article_category') . " WHERE cat_id = '" . $cat_id . "'");
if ($id == -1)
    $dou->dou_msg($GLOBALS['_LANG']['page_wrong'], ROOT_URL);
    
/* 获取详细信息 */
$query = $dou->select($dou->table('article'), '*', '`id` = \'' . $id . '\'');
$article = $dou->fetch_array($query);

// 格式化数据
$article['add_time'] = date("Y-m-d", $article['add_time']);
// 口令

 if ( !empty($article['is_password'] )  && $_SESSION['password'] != $article['id']  ){
	

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

$sql = "Select user_id,nick_name From ".$dou->table('admin')." Where status = 1 order by sort,user_id asc ";
$query = $dou->query($sql);
$user_list = array();
while($row = $dou->fetch_array($query)){

    $user_list[$row['user_id']] = $row['nick_name'];

}
$smarty->assign('userList',$user_list);

// 访问统计
$click = $article['click'] + 1;
$dou->query("update " . $dou->table('article') . " SET click = '$click' WHERE id = '$id'");

// 赋值给模板-meta和title信息
$smarty->assign('page_title', $dou->page_title('article_category', $cat_id, $article['title']));
$smarty->assign('keywords', $article['keywords']);
$smarty->assign('description', $article['description']);

// 赋值给模板-导航栏
$smarty->assign('nav_top_list', $dou->get_nav('top'));
$smarty->assign('nav_middle_list', $dou->get_nav('middle', '0', 'article_category', $cat_id, $parent_id));
$smarty->assign('nav_bottom_list', $dou->get_nav('bottom'));

// 赋值给模板-数据
$smarty->assign('ur_here', $dou->ur_here('article_category', $cat_id, $article['title']));
$smarty->assign('article_category', $dou->get_category('article_category',$get_cat['root'], $get_cat['child']));
$smarty->assign('lift', $dou->lift('article', $id, $cat_id));
$smarty->assign('article', $article);
$smarty->assign('defined', $defined);
$smarty->display('article.dwt');


?>