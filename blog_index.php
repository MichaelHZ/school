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
// 最新博文有图
$smarty->assign ( 'new_blog_img',get_article_list (-1,0,6,$cate) );
// 最新博文
$smarty->assign ( 'new_blog_8',get_hot_blog_list (-1,0,8,$cate,0) );
// 每周星博文
$smarty->assign ( 'new_blog_1',get_article_list (-1,0,6,$cate,0,false,true) );
// 最新博文头12条
$smarty->assign ( 'new_blog_12',get_article_list (-1,0,12,$cate,0) );

// 博客之星按阅读数排名
$sql = "Select user_id From ".$dou->table('article')." where stype='2' group by user_id order by sum(click) desc limit 3";
$query = $dou->query($sql);
$blog_star = array();
while($row = $dou->fetch_array($query)){
	$sql = "Select * From ".$dou->table('admin')." Where user_id = '{$row['user_id']}' ";
	$temp = $dou->query($sql);
	$one = $dou->fetch_array($temp);
	
	$blog_star[] = $one;
}
$smarty->assign ( 'blog_star',$blog_star );
// 博文排行榜
$sql = "Select user_id,count(id) c From ".$dou->table('article')." where stype='2' group by user_id order by sum(id) desc limit 6";
$query = $dou->query($sql);
$blog_much = array();
$index = 1;
while($row = $dou->fetch_array($query)){
	$sql = "Select * From ".$dou->table('admin')." Where user_id = '{$row['user_id']}' ";
	$temp = $dou->query($sql);
	$one = $dou->fetch_array($temp);
	$one['count'] = $row['c'];
	$one['index'] = $index++;
	$blog_much[] = $one;
}
$smarty->assign ( 'blog_much',$blog_much );
// 博文更新新排行榜
$sql = "Select user_id,count(id) c From ".$dou->table('article')." where stype='2' group by user_id ORDER BY add_time  DESC limit 6";
$query = $dou->query($sql);
$blog_update = array();
$index = 1;
while($row = $dou->fetch_array($query)){
	$sql = "Select * From ".$dou->table('admin')." Where user_id = '{$row['user_id']}' ";
	$temp = $dou->query($sql);
	$one = $dou->fetch_array($temp);
	$one['count'] = $row['c'];
	$one['index'] = $index++;
	$blog_update[] = $one;
}
$smarty->assign ( 'blog_update',$blog_update );
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
// var_dump($list);
//  exit;
$smarty->assign ( 'member_list',$list );
// 博文滚动图
$smarty->assign ( 'blog_active',get_article_list (-1,7,16,$cate) );
//$smarty->assign ( 'blog_all',get_article_list (-1,0,4,$cate) );
$blog_all = array();
// 所有
$blog_all[] = get_article_list (-1,0,4,$cate,0);

foreach($cate as $k=>$each){
	$blog_all[] = get_article_list ($k,0,4,$cate,0);
}
//var_dump($blog_all);
$smarty->assign ( 'blog_all',$blog_all);
// 赋值给模板-meta和title信息
$smarty->assign ( 'page_title', '石梅小学博客首页' );
$smarty->assign ( 'keywords', '石梅小学博客首页' );
$smarty->assign ( 'description', '石梅小学博客首页' );

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
function get_article_list($blog_id, $limit_start = 0, $limit_end = 6,$cate  = array(), $had_img = 1,$top = false,$sort = false) {
	global $dou;
	
	if ($blog_id == - 1) {
		if ($had_img) {
			$where = " WHERE  image != '' and  stype='2' ";
		} else {
			$where = " WHERE stype='2' ";
		}
	} else {
		
		if ($had_img) {
			$where = " WHERE blog_id = '{$blog_id}'  and image != '' and  stype='2' ";
		} else {
			$where = " WHERE blog_id = '{$blog_id}' and  stype='2' ";
		}
	}
	$sql = "Select user_id,nick_name,face From ".$dou->table('admin');
	
	$admin_list = $dou->query($sql);
	$user_list = array();
	while ( $row = $dou->fetch_assoc ( $admin_list ) ) {
		$user_list[$row['user_id']] = $row;
	}

	/* 获取文章列表 */
	if($blog_id == - 1){
		 if($top){
			$sql = "SELECT id, title, content, image,image2,image3,cat_id, add_time, click, description,ctype,keywords,user_id,blog_id,custom_url FROM " . $dou->table ( 'article' ) . $where . " ORDER BY click DESC,add_time desc limit $limit_start,$limit_end"; 
		 }else{
			 if(!empty($sort)){
				  $sql = "SELECT id, title, content, image,image2,image3,cat_id, add_time, click, description,ctype,keywords,user_id,blog_id,custom_url FROM " . $dou->table ( 'article' ) . $where . " ORDER BY sort DESC,add_time DESC,click desc limit $limit_start,$limit_end";
			 }else{
				  $sql = "SELECT id, title, content, image,image2,image3,cat_id, add_time, click, description,ctype,keywords,user_id,blog_id,custom_url FROM " . $dou->table ( 'article' ) . $where . " ORDER BY add_time DESC,click desc limit $limit_start,$limit_end";
			 }
			
		 }
		
	}else{
		$sql = "SELECT id, title, content, image,image2,image3,cat_id, add_time, click, description,ctype,keywords,user_id,blog_id,custom_url FROM " . $dou->table ( 'article' ) . $where . " ORDER BY add_time DESC limit $limit_start,$limit_end";
		
	}
	
	
	$query = $dou->query ( $sql );
	
	$index = 1;

	while ( $row = $dou->fetch_array ( $query ) ) {
		$url = $dou->rewrite_url ( 'blog', $row ['id'] ) . "&blog_id={$row['user_id']}";
		//$auth = $dou->get_one("Select nick_name From " . $dou->table ( 'article' ) ." Where user_id = '{$row['user_id']}'");
		$add_time = date ( "Y-m-d", $row ['add_time'] );
		$add_time_short = date ( "m-d", $row ['add_time'] );
		$image = $row ['image'] ? ROOT_URL . $row ['image'] : '';
		$image2 = $row ['image2'] ? ROOT_URL . $row ['image2'] : '';
		$image3 = $row ['image3'] ? ROOT_URL . $row ['image3'] : '';
		// 如果描述不存在则自动从详细介绍中截取
		$description = $row ['description'] ? $row ['description'] : $dou->dou_substr ( $row ['content'], 200, false );
		//var_dump($row['blog_id']);
		$article_list [] = array (
				"id" => $row ['id'],
				"user_face" => $user_list[$row['user_id']]['face'],
				"user_name" => $user_list[$row['user_id']]['nick_name'],
				"index" => $index++,
				"blog_id" => $row ['blog_id'],
				"cat_name" => $cate [$row ['blog_id']],
				"title" => $row ['title'],
				"image" => $image,
				"image2" => $image2,
				"image3" => $image3,
				"add_time" => $add_time,
				"add_time_short" => $add_time_short,
				"click" => $row ['click'],
				"description" => $description,
				"ctype" => $row ['ctype'],
				"keywords" => $row ['keywords'],
				"url" => $row['custom_url']?$row['custom_url']:$url  
		);
	}
	return $article_list;
}
function get_hot_blog_list($blog_id, $limit_start = 0, $limit_end = 6,$cate  = array(), $had_img = 1) {
	global $dou;
	
	if ($blog_id == - 1) {
		if ($had_img) {
			$where = " WHERE  image != '' and  stype='2' ";
		} else {
			$where = " WHERE stype='2' ";
		}
	} else {
		
		if ($had_img) {
			$where = " WHERE blog_id = '{$blog_id}'  and image != '' and  stype='2' ";
		} else {
			$where = " WHERE blog_id = '{$blog_id}' and  stype='2' ";
		}
	}
	$sql = "Select user_id,nick_name,face From ".$dou->table('admin');
	
	$admin_list = $dou->query($sql);
	$user_list = array();
	while ( $row = $dou->fetch_assoc ( $admin_list ) ) {
		$user_list[$row['user_id']] = $row;
	}

	/* 获取文章列表 */
	$sql = "SELECT id, title, content, image,image2,image3, cat_id, add_time, click, description,ctype,keywords,user_id,blog_id,custom_url FROM " . $dou->table ( 'article' ) . $where . " ORDER BY sort desc, click DESC limit $limit_start,$limit_end";
/* echo $sql;
exit; */
	$query = $dou->query ( $sql );
	
	$index = 1;

	while ( $row = $dou->fetch_array ( $query ) ) {
		$url = $dou->rewrite_url ( 'blog', $row ['id'] ) . "&blog_id={$row['user_id']}";
		$add_time = date ( "Y-m-d", $row ['add_time'] );
		$add_time_short = date ( "m-d", $row ['add_time'] );
		$image = $row ['image'] ? ROOT_URL . $row ['image'] : '';
		
		// 如果描述不存在则自动从详细介绍中截取
		$description = $row ['description'] ? $row ['description'] : $dou->dou_substr ( $row ['content'], 200, false );
		//var_dump($row['blog_id']);
		$article_list [] = array (
				"id" => $row ['id'],
				"user_face" => $user_list[$row['user_id']]['face'],
				"index" => $index++,
				"blog_id" => $row ['blog_id'],
				"cat_name" => $cate [$row ['blog_id']],
				"title" => $row ['title'],
				"image" => $image,
				"add_time" => $add_time,
				"add_time_short" => $add_time_short,
				"click" => $row ['click'],
				"description" => $description,
				"ctype" => $row ['ctype'],
				"keywords" => $row ['keywords'],
				"url" => $row['custom_url']?$row['custom_url']:$url 
		);
	}
	return $article_list;
}
function get_news_list($limit_start = 0, $limit_end = 10) {
	global $dou;
	
	/* 获取文章列表 */
	$sql = "SELECT id, title, content, image,image2,image3, cat_id, add_time, click, description,ctype,keywords,custom_url FROM " . $dou->table ( 'article' ) . "where cat_id != '41' and  image<>'' ORDER BY add_time  DESC limit $limit_start,$limit_end";
	
	$query = $dou->query ( $sql );
	while ( $row = $dou->fetch_array ( $query ) ) {
		$url = $dou->rewrite_url ( 'article', $row ['id'] );
		$add_time = date ( "Y-m-d", $row ['add_time'] );
		$add_time_short = date ( "m-d", $row ['add_time'] );
		$image = $row ['image'] ? ROOT_URL . $row ['image'] : '';
		
		// 如果描述不存在则自动从详细介绍中截取
		$description = $row ['description'] ? $row ['description'] : $dou->dou_substr ( $row ['content'], 200, false );
		
		$article_list [] = array (
				"id" => $row ['id'],
				"cat_id" => $row ['cat_id'],
				"title" => $row ['title'],
				"image" => $image,
				"add_time" => $add_time,
				"add_time_short" => $add_time_short,
				"click" => $row ['click'],
				"description" => $description,
				"ctype" => $row ['ctype'],
				"keywords" => $row ['keywords'],
				"url" => $row['custom_url']?$row['custom_url']:$url  
		);
	}
	return $article_list;
}
?>