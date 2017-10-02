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

$sub = 'insert|del';
$subbox = array (
		"module" => 'guestbook',
		"sub" => $sub 
);

require (dirname ( __FILE__ ) . '/include/init.php');

// 开启SESSION
session_start ();

// rec操作项的初始化
$rec = $check->is_rec ( $_REQUEST ['rec'] ) ? $_REQUEST ['rec'] : 'default';

/**
 * +----------------------------------------------------------
 * 留言板
 * +----------------------------------------------------------
 */
if($_POST && $rec!= 'insert'){
	$stat = 0;
	$msg = false;
	// SQL查询条件
	$where = " WHERE if_show = '1'";
	
	// 获取分页信息
	$page = $check->is_number ( $_REQUEST ['page'] ) ? trim ( $_REQUEST ['page'] ) : 1;
	$limit = $dou->pager ( 'guestbook', 10, $page, $dou->rewrite_url ( 'guestbook' ), $where );
	$sql = "SELECT * FROM " . $GLOBALS ['dou']->table ( 'guestbook' ) . $where . " ORDER BY id DESC" . $limit;
	$query = $GLOBALS ['dou']->query ( $sql );
	while ( $row = $GLOBALS ['dou']->fetch_array ( $query ) ) {
		$add_time = date ( "Y-m-d H:i:s", $row ['add_time'] );
	
		// 获取管理员回复
		$reply = "SELECT content, add_time FROM " . $dou->table ( 'guestbook' ) . " WHERE reply_id = '$row[id]'";
		$reply = $dou->fetch_array ( $dou->query ( $reply ) );
		$reply_time = date ( "Y-m-d", $reply ['add_time'] );
	
		$guestbook [] = array (
				"id" => $row ['id'],
				"title" => $row ['title'],
				"name" => $row ['name'],
				"content" => $row ['content'],
				"add_time" => $add_time,
				"reply" => $reply ['content'],
				"reply_time" => $reply_time
		);
		$stat = 1;
		$msg = true;
	}
	die(json_encode(array('stat'=>$stat,'msg'=>$msg,'data'=> $guestbook)));
}
if ($rec == 'default') {
	// SQL查询条件
	$where = " WHERE if_show = '1'";
	
	// 获取分页信息
	$page = $check->is_number ( $_REQUEST ['page'] ) ? trim ( $_REQUEST ['page'] ) : 1;
	$limit = $dou->pager ( 'guestbook', 10, $page, $dou->rewrite_url ( 'guestbook' ), $where );
	
	// CSRF防御令牌生成
	$smarty->assign ( 'token', $firewall->set_token ( 'guestbook' ) );
	
	$sql = "SELECT * FROM " . $GLOBALS ['dou']->table ( 'guestbook' ) . $where . " ORDER BY id DESC" . $limit;
	$query = $GLOBALS ['dou']->query ( $sql );
	while ( $row = $GLOBALS ['dou']->fetch_array ( $query ) ) {
		$add_time = date ( "Y-m-d H:i:s", $row ['add_time'] );
		
		// 获取管理员回复
		$reply = "SELECT content, add_time FROM " . $dou->table ( 'guestbook' ) . " WHERE reply_id = '$row[id]'";
		$reply = $dou->fetch_array ( $dou->query ( $reply ) );
		$reply_time = date ( "Y-m-d", $reply ['add_time'] );
		
		$guestbook [] = array (
				"id" => $row ['id'],
				"title" => $row ['title'],
				"name" => $row ['name'],
				"content" => $row ['content'],
				"add_time" => $add_time,
				"reply" => $reply ['content'],
				"reply_time" => $reply_time 
		);
	}
	
	// 初始化回复方式
	$contact_type = array (
			'email',
			'tel',
			'qq' 
	);
	foreach ( $contact_type as $value ) {
		$selected = ($value == $post ['contact_type']) ? ' selected="selected"' : '';
		$option .= "<option value=" . $value . $selected . ">" . $_LANG ['guestbook_' . $value] . "</option>";
	}
	// 兼容文章二级栏目
	if (! isset ( $_REQUEST ['cat_id'] ) or empty ( $_REQUEST ['cat_id'] )) {
		$_REQUEST ['cat_id'] = '70';
	}
	$cat_id = $firewall->get_legal_id ( 'article_category', $_REQUEST ['cat_id'], $_REQUEST ['unique_id'] );
	$get_cat = $dou->get_two_catid ( $cat_id );
	$cat_id = $get_cat ['child'];
	$sql = "SELECT id FROM " . $dou->table ( 'nav' ) . " WHERE guide = '$get_cat[root]' and type='middle'";
	$cur_nav = $dou->get_one ( $sql );
	// var_dump($cur_nav);
	// 面包屑导航
	$sql = "SELECT cat_id, cat_name, parent_id,template FROM " . $dou->table ( 'article_category' ) . " WHERE cat_id = '$get_cat[root]' ";
	$query = $dou->query ( $sql );
	$root = $dou->fetch_array ( $query );
	$root ['url'] = $url = $dou->rewrite_url ( 'article_category', $get_cat ['root'] );
	$sql = "SELECT cat_id, cat_name, parent_id,template FROM " . $dou->table ( 'article_category' ) . " WHERE cat_id = '$get_cat[two]' ";
	$query = $dou->query ( $sql );
	$two = $dou->fetch_array ( $query );
	$two ['url'] = $url = $dou->rewrite_url ( 'article_category', $get_cat ['two'] );
	$sql = "SELECT cat_id, cat_name, parent_id,template FROM " . $dou->table ( 'article_category' ) . " WHERE cat_id = '$get_cat[child]' ";
	$query = $dou->query ( $sql );
	$child = $dou->fetch_array ( $query );
	$smarty->assign ( 'cur_nav', $cur_nav );
	$smarty->assign ( 'cat_root', $root );
	$smarty->assign ( 'cat_two', $two );
	$smarty->assign ( 'cat_child', $child );
	$smarty->assign ( 'article_category', $dou->get_category ( 'article_category', $get_cat ['root'], $get_cat ['child'] ) );
	
	// 赋值给模板-meta和title信息
	$smarty->assign ( 'page_title', $dou->page_title ( 'guestbook' ) );
	$smarty->assign ( 'keywords', $_CFG ['site_keywords'] );
	$smarty->assign ( 'description', $_CFG ['site_description'] );
	
	// 赋值给模板-导航栏
	$smarty->assign ( 'nav_top_list', $dou->get_nav ( 'top' ) );
	$smarty->assign ( 'nav_middle_list', $dou->get_nav ( 'middle', 0, 'guestbook', 0 ) );
	$smarty->assign ( 'nav_bottom_list', $dou->get_nav ( 'bottom' ) );
	
	// 赋值给模板-数据
	$smarty->assign ( 'rec', $rec );
	$smarty->assign ( 'insert_url', $_URL ['insert'] );
	$smarty->assign ( 'option', $option );
	$smarty->assign ( 'guestbook', $guestbook );
	$smarty->assign ( 'ur_here', $dou->ur_here ( 'guestbook' ) );
	if (($two ['template'] != 'default') && ($two ['cat_id'] == $child ['cat_id'])) {
		$smarty->display ( $two ['template'] . '.dwt' );
	} elseif (($child ['template'] != 'default') && ($two ['cat_id'] != $child ['cat_id'])) {
		$smarty->display ( $child ['template'] . '.dwt' );
	} else {
		$smarty->display ( 'guestbook.dwt' );
	}
}

/**
 * +----------------------------------------------------------
 * 留言添加
 * +----------------------------------------------------------
 */
if ($rec == 'insert') {

	$ip = $dou->get_ip ();
	$add_time = time ();
	$captcha = $check->is_captcha ( $_POST ['captcha'] ) ? strtoupper ( $_POST ['captcha'] ) : '';
	
	// 如果限制必须输入中文则修改错误提示
	$include_chinese = $_CFG ['guestbook_check_chinese'] ? $_LANG ['guestbook_include_chinese'] : '';
	/*
	 * // 验证主题
	 * if ($check->is_illegal_char($_POST['title'])) {
	 * $wrong['title'] = $_LANG['guestbook_title'] . $_LANG['illegal_char'];
	 * } elseif (!check_guestbook($_POST['title'], 200)) {
	 * $wrong['title'] = preg_replace('/d%/Ums', $include_chinese, $_LANG['guestbook_title_wrong']);
	 * }
	 */
	// 验证联系人
	if ($check->is_illegal_char ( $_POST ['name'] )) {
		$wrong ['name'] = $_LANG ['guestbook_name'] . $_LANG ['illegal_char'];
	} elseif (! check_guestbook ( $_POST ['name'], 200 )) {
		$wrong ['name'] = preg_replace ( '/d%/Ums', $include_chinese, $_LANG ['guestbook_name_wrong'] );
	}
	/*
	 * // 验证回复方式
	 * if (empty($_POST['contact_type'])) {
	 * $wrong['contact'] = $_LANG['guestbook_contact_type_empty'];
	 * } elseif ($_POST['contact_type'] == 'email') {
	 * if (!$check->is_email($_POST['contact']))
	 * $wrong['contact'] = $_LANG['guestbook_email_wrong'];
	 * } elseif ($_POST['contact_type'] == 'tel') {
	 * if (!$check->is_telphone($_POST['contact']))
	 * $wrong['contact'] = $_LANG['guestbook_tel_wrong'];
	 * } elseif ($_POST['contact_type'] == 'qq') {
	 * if (!$check->is_qq($_POST['contact']))
	 * $wrong['contact'] = $_LANG['guestbook_qq_wrong'];
	 * }
	 */
	
	// 验证联系方式
	/*
	if (empty ( $_POST ['email'] ) or ! $check->is_email ( $_POST ['email'] )) {
		$wrong ['contact'] = $_LANG ['guestbook_email_wrong'];
	}
	
	if (empty ( $_POST ['tel'] ) or ! $check->is_telphone ( $_POST ['tel'] )) {
		$wrong ['contact'] = $_LANG ['guestbook_tel_wrong'];
	}
	
	 * if(empty($_POST['qq']) or !$check->is_qq($_POST['qq'])){
	 * $wrong['contact'] = $_LANG['guestbook_qq_wrong'];
	 * }
	 */
	// 验证留言内容
	if ($check->is_illegal_char ( $_POST ['content'] )) {
		$wrong ['content'] = $_LANG ['guestbook_content'] . $_LANG ['illegal_char'];
	} elseif (! check_guestbook ( $_POST ['content'], 300 )) {
		$wrong ['content'] = preg_replace ( '/d%/Ums', $include_chinese, $_LANG ['guestbook_content_wrong'] );
	}
	
	// 判断验证码
	if ($_CFG ['captcha'] && md5 ( $captcha . DOU_SHELL ) != $_SESSION ['captcha'])
		$wrong ['captcha'] = $_LANG ['captcha_wrong'];
		
		// AJAX验证表单
// 	if ($_REQUEST ['do'] == 'callback') {
// 		if ($wrong) {
// 			foreach ( $_POST as $key => $value ) {
// 				$wrong_json [$key] = $wrong [$key];
// 			}
// 			echo json_encode ( $wrong_json );
// 		}
// 		exit ();
// 	}
	
	// 检查IP是否频繁留言
	if (is_water ( $ip ))
		$dou->dou_msg ( $_LANG ['guestbook_is_water'], $_URL ['guestbook'] );
	
	if ($wrong) {
		foreach ( $wrong as $key => $value ) {
			$wrong_format .= $wrong [$key] . '<br>';
		}
		$dou->dou_msg ( $wrong_format, $_URL ['guestbook'] );
	}
	
	// CSRF防御令牌验证
	$firewall->check_token ( $_POST ['token'], 'guestbook' );
	
	// 安全处理用户输入信息
	$_POST = $firewall->dou_foreground ( $_POST );
	
	$sql = "INSERT INTO " . $dou->table ( 'guestbook' ) . " (id,  name, tel, email , qq, content, ip, add_time)" . " VALUES (NULL, '$_POST[name]', '$_POST[tel]', '$_POST[email]', '$_POST[qq]', '$_POST[content]', '$ip', '$add_time')";
	
	$dou->query ( $sql );
	
	$dou->dou_msg ( $_LANG ['guestbook_insert_success'], $_URL ['guestbook'] );
}

/**
 * +----------------------------------------------------------
 * 防灌水
 * +----------------------------------------------------------
 */
function is_water($ip) {
	$unread_messages = $GLOBALS ['dou']->get_one ( "SELECT COUNT(*) FROM " . $GLOBALS ['dou']->table ( 'guestbook' ) . " WHERE ip = '$ip' AND if_read = 0 AND reply_id = 0" );
	
	// 如果管理员未回复的留言数量大于3
	if ($unread_messages >= '3')
		return true;
}

/**
 * +----------------------------------------------------------
 * 检查是否包含中文字符且长度符合要求
 * +----------------------------------------------------------
 */
function check_guestbook($value, $length) {
	$check_chinese = $GLOBALS ['_CFG'] ['guestbook_check_chinese'] ? $GLOBALS ['check']->if_include_chinese ( $value ) : true;
	
	if ($check_chinese && $GLOBALS ['check']->ch_length ( $value, $length )) {
		return true;
	}
}
?>