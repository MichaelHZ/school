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

require (dirname(__FILE__) . '/include/init.php');

// 如果存在搜索词则转入搜索页面
if ($_REQUEST['s']) {
    if ($check->is_search_keyword($keyword = trim($_REQUEST['s']))) {
        require (ROOT_PATH . 'include/search.inc.php');
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
$smarty->assign('nav_middle_list', $dou->get_nav('middle'));
$smarty->assign('nav_bottom_list', $dou->get_nav('bottom'));
$smarty->assign('nav_right_list', $dou->get_nav('index'));
// 赋值给模板-数据
$smarty->assign('show_list', $dou->get_show_list());
$smarty->assign('link', get_link_list());
$smarty->assign('index', $index);
$smarty->assign('recommend_product', $dou->get_list('product', 'ALL', $_DISPLAY['home_product'], 'sort DESC'));
$smarty->assign('recommend_article', $dou->get_list('article', 'ALL', $_DISPLAY['home_article'], 'sort DESC'));
// 新闻
$smarty->assign('play_article', get_news_list());
// 新闻
$smarty->assign('play_article_words', get_news_words_list());
// 公告
$smarty->assign('public_notice', get_public_notic());
// 创建
$smarty->assign('create', get_article_list(61,0,10));
// 所有
$smarty->assign('all', get_article_list(array(1,2,3)));
// 管理记事
$smarty->assign('manage', get_article_list(19));
// 多彩活动
$smarty->assign('active', get_article_list(33));
// 社团动态
$smarty->assign('dynamic', get_article_list(34));

// 童话课堂
$smarty->assign('class', get_article_list(43));
// 教师
$teachers = get_teacher_list(0,20);
foreach($teachers as $k=>$each){
	$teachers[$k]['description'] = str_replace("###",'<br>',$teachers[$k]['description']);
}

$smarty->assign('teacher', $teachers);
// 6大栏目
// 学校
$smarty->assign('cat_1', get_six_list(1,0,9));
// 党建
$smarty->assign('cat_2', get_six_list(2,0,9));
// 学生
$smarty->assign('cat_3', get_six_list(3,0,9));
// 教师
$smarty->assign('cat_4', get_six_list(4,0,9));
// 家长
$smarty->assign('cat_5', get_six_list(5,0,9));
// 回眸
$smarty->assign('cat_6', get_six_list(6,0,9));
// CSRF防御令牌生成
$smarty->assign('token', $firewall->set_token('guestbook'));
$smarty->display('index.dwt');

/**
 * +----------------------------------------------------------
 * 获取友情链接
 * +----------------------------------------------------------
 */
function get_link_list() {
    $sql = "SELECT * FROM " . $GLOBALS['dou']->table('link') . " ORDER BY sort ASC, id ASC";
    $query = $GLOBALS['dou']->query($sql);
    while ($row = $GLOBALS['dou']->fetch_array($query)) {
        $link_list[] = array (
                "id" => $row['id'],
                "link_name" => $row['link_name'],
                "link_url" => $row['link_url'],
                "sort" => $row['sort'] 
        );
    }
    
    return $link_list;
}
function get_article_list($cat_id,$limit_start = 0,$limit_end = 6,$no_cat = ''){
	global $dou;
	if(is_array($cat_id)){
		$where = 'Where ';
		$temp = '';
		foreach($cat_id as $row){
			$temp.=  $row .$dou->dou_child_id('article_category', $row).',';
		}
		$where = "Where cat_id IN (".rtrim($temp,',').") and image != '' and cat_id != '41' ";
		
	}else{
		if ($cat_id == -1) {
			$dou->dou_msg($GLOBALS['_LANG']['page_wrong'], ROOT_URL);
		} else {
			if($no_cat > 0){
				$where = ' WHERE cat_id IN (' . $cat_id . str_replace( $no_cat.',', '',$dou->dou_child_id('article_category', $cat_id)) . ')'." and image != '' and stype='1' And auditing = '1'";
			}else{
				$where = ' WHERE cat_id IN (' . $cat_id . $dou->dou_child_id('article_category', $cat_id). ')'." and image != '' and stype='1' And auditing = '1'";
			}
			
	
		}
	}
	
	/* 获取文章列表 */
	if($cat_id == '61' or $cat_id == '18' ){
		// 创建不需要图片
		$sql = "SELECT id, title, content, image, cat_id, add_time, click,custom_url, description,ctype,keywords FROM " . $dou->table('article') . ' WHERE cat_id IN (' . $cat_id . $dou->dou_child_id('article_category', $cat_id). ')'."  and stype='1' And auditing = '1'" . " ORDER BY add_time  DESC limit $limit_start,$limit_end";
	}else{
		$sql = "SELECT id, title, content, image, cat_id, add_time, click, description,ctype,custom_url,keywords FROM " . $dou->table('article') . $where . " ORDER BY add_time  DESC limit $limit_start,$limit_end";
	}

	
    $index = 1;
	$query = $dou->query($sql);
	while ($row = $dou->fetch_array($query)) {
		$url = $dou->rewrite_url('article', $row['id']);
		$add_time = date("Y-m-d", $row['add_time']);
		$add_time_short = date("m-d", $row['add_time']);
		$image = $row['image'] ? ROOT_URL . $row['image'] : '';
	
		// 如果描述不存在则自动从详细介绍中截取
		$description = $row['description'] ? $row['description'] : $dou->dou_substr($row['content'], 200, false);
	
		$article_list[] = array (
		         "index" => $index++,
				"id" => $row['id'],
				"cat_id" => $row['cat_id'],
				"title" => $row['title'],
				"image" => $image,
				"add_time" => $add_time,
				"add_time_short" => $add_time_short,
				"click" => $row['click'],
				"description" => $description,
				"custom_url" => $row['custom'],
				"ctype" => $row['ctype'],
				"keywords" => $row['keywords'],
				"url" => $row['custom_url']?$row['custom_url']:$url
		);
	}
	return $article_list;
}
function get_news_list($limit_start = 0,$limit_end = 10){
	global $dou;
    $cat = "10,18,12,13,14,16,17,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,42,43,44,45,46,98,51,52,53,47,48,49,50";
	/* 获取文章列表 */
	$sql = "SELECT id, title, content, image, cat_id, add_time, click, description,ctype,keywords,custom_url FROM " . $dou->table('article')  . "where cat_id  in ({$cat}) and  image<>'' and stype='1' And auditing = '1'  ORDER BY add_time  DESC limit $limit_start,$limit_end";
  
	$query = $dou->query($sql);
	while ($row = $dou->fetch_array($query)) {
		$url = $dou->rewrite_url('article', $row['id']);
		$add_time = date("Y-m-d", $row['add_time']);
		$add_time_short = date("m-d", $row['add_time']);
		$image = $row['image'] ? ROOT_URL . $row['image'] : '';

		// 如果描述不存在则自动从详细介绍中截取
		$description = $row['description'] ? $row['description'] : $dou->dou_substr($row['content'], 200, false);

		$article_list[] = array (
				"id" => $row['id'],
				"cat_id" => $row['cat_id'],
				"title" => $row['title'],
				"image" => $image,
				"add_time" => $add_time,
				"add_time_short" => $add_time_short,
				"click" => $row['click'],
				"description" => $description,
				"ctype" => $row['ctype'],
				"keywords" => $row['keywords'],
				"url" => $row['custom_url']?$row['custom_url']:$url
		);
	}
	return $article_list;
}
function get_public_notic($limit_start = 0,$limit_end = 12){
	global $dou;
    $cat = "12,13,14,15,16,17,18";
	/* 获取文章列表 */
	$sql = "SELECT id, title, content, image, cat_id, add_time, click, description,ctype,keywords,custom_url FROM " . $dou->table('article')  . "where cat_id  in ({$cat})  and stype='1' And auditing = '1'  ORDER BY add_time DESC limit $limit_start,$limit_end";
  
	$query = $dou->query($sql);
	$index = 1;
	while ($row = $dou->fetch_array($query)) {
		$url = $dou->rewrite_url('article', $row['id']);
		$add_time = date("Y-m-d", $row['add_time']);
		$add_time_short = date("m-d", $row['add_time']);
		$image = $row['image'] ? ROOT_URL . $row['image'] : '';

		// 如果描述不存在则自动从详细介绍中截取
		$description = $row['description'] ? $row['description'] : $dou->dou_substr($row['content'], 200, false);
     
		$article_list[] = array (
		        "index" => $index++,
				"id" => $row['id'],
				"cat_id" => $row['cat_id'],
				"title" => $row['title'],
				"image" => $image,
				"add_time" => $add_time,
				"add_time_short" => $add_time_short,
				"click" => $row['click'],
				"description" => $description,
				"ctype" => $row['ctype'],
				"keywords" => $row['keywords'],
				"url" => $row['custom_url']?$row['custom_url']:$url
		);
	}
	return $article_list;
}
function get_news_words_list($limit_start = 0,$limit_end = 12){
	global $dou;
    $cat = "19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,42,43,44,45,46,98,51,52,53,47,48,49,50";
	/* 获取文章列表 */
	$sql = "SELECT id, title, content, image, cat_id, add_time, click, description,ctype,keywords,custom_url FROM " . $dou->table('article')  . "where cat_id  in ({$cat})  and stype='1' And auditing = '1'  ORDER BY add_time DESC limit $limit_start,$limit_end";
  
	$query = $dou->query($sql);
	$index = 1;
	while ($row = $dou->fetch_array($query)) {
		$url = $dou->rewrite_url('article', $row['id']);
		$add_time = date("Y-m-d", $row['add_time']);
		$add_time_short = date("m-d", $row['add_time']);
		$image = $row['image'] ? ROOT_URL . $row['image'] : '';

		// 如果描述不存在则自动从详细介绍中截取
		$description = $row['description'] ? $row['description'] : $dou->dou_substr($row['content'], 200, false);
     
		$article_list[] = array (
		        "index" => $index++,
				"id" => $row['id'],
				"cat_id" => $row['cat_id'],
				"title" => $row['title'],
				"image" => $image,
				"add_time" => $add_time,
				"add_time_short" => $add_time_short,
				"click" => $row['click'],
				"description" => $description,
				"ctype" => $row['ctype'],
				"keywords" => $row['keywords'],
				"url" => $row['custom_url']?$row['custom_url']:$url
		);
	}
	return $article_list;
}
// 四滚动图
function get_six_list($index,$limit_start = 0,$limit_end = 10){
	global $dou;
	$cat = "";
	switch($index){
		case 1:
			// 学校
			$cat = "12,13,14,17,19,20,22,23,24,25,26.27,28,29,32,31,30,31";  
			break;
		case 2:
			// 党建
			$cat = "22,23,24,25,26,27,28,29";
			break;
		case 3:
			// 学生
			$cat = "32,33,34,35,36,37,38,39,40";
			break;
		case 4:
			// 教师
			$cat = "42,43,44,45,46";
			break;
		case 5:
			// 家长
			$cat = "98,51,52,53";
			break;
		case 6:
			// 回眸
			$cat = "47,48,49,50";
			break;
		default:
			break;
	}
	/* 获取文章列表 */
	$sql = "SELECT id, title, content, image, cat_id, add_time, click, description,ctype,keywords,custom_url FROM " . $dou->table('article')  . "where cat_id  in ({$cat})  and stype='1' And auditing = '1'  ORDER BY add_time  DESC limit $limit_start,$limit_end";

	$query = $dou->query($sql);
	while ($row = $dou->fetch_array($query)) {
		$url = $dou->rewrite_url('article', $row['id']);
		$add_time = date("Y-m-d", $row['add_time']);
		$add_time_short = date("m-d", $row['add_time']);
		$image = $row['image'] ? ROOT_URL . $row['image'] : '';

		// 如果描述不存在则自动从详细介绍中截取
		$description = $row['description'] ? $row['description'] : $dou->dou_substr($row['content'], 200, false);

		$article_list[] = array (
				"id" => $row['id'],
				"cat_id" => $row['cat_id'],
				"title" => $row['title'],
				"image" => $image,
				"add_time" => $add_time,
				"add_time_short" => $add_time_short,
				"click" => $row['click'],
				"description" => $description,
				"ctype" => $row['ctype'],
				"keywords" => $row['keywords'],
				"url" => $row['custom_url']?$row['custom_url']:$url
		);
	}
	return $article_list;
}
function get_teacher_list($limit_start = 0,$limit_end = 10){
	global $dou;
	$cat = "41";
	/* 获取文章列表 */
	$sql = "SELECT count(id) c FROM " . $dou->table('article')  . "where cat_id  in ({$cat}) and  image<>'' and stype='1'";
	$count = $dou->get_one($sql);
	$sql = "SELECT id, title, content, image, cat_id, add_time, click, description,ctype,keywords,custom_url FROM " . $dou->table('article')  . "where cat_id  in ({$cat}) and  image<>'' and stype='1' And auditing = '1'";
   
	$query = $dou->query($sql);
	$list = array();
	while ($row = $dou->fetch_array($query)) {
		$list[] = $row;
	}
	$array = array();
	//var_dump($list);
	for($i = 0 ; $i < 20; $i++){
		$rand = rand(0,$count - 1);
		if(!in_array($rand,$array)){
			array_push($array,$rand);
			$row = $list[$rand];
			$url = $dou->rewrite_url('article', $row['id']);
			$add_time = date("Y-m-d", $row['add_time']);
			$add_time_short = date("m-d", $row['add_time']);
			$image = $row['image'] ? ROOT_URL . $row['image'] : '';

			// 如果描述不存在则自动从详细介绍中截取
			$description = $row['description'] ? $row['description'] : $dou->dou_substr($row['content'], 200, false);

			$article_list[] = array (
					"id" => $row['id'],
					"cat_id" => $row['cat_id'],
					"title" => $row['title'],
					"image" => $image,
					"add_time" => $add_time,
					"add_time_short" => $add_time_short,
					"click" => $row['click'],
					"description" => $description,
					"ctype" => $row['ctype'],
					"keywords" => $row['keywords'],
					"url" => $row['custom_url']?$row['custom_url']:$url
			);
		}
	} 
	return $article_list;
}
?>