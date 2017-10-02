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

require (dirname ( __FILE__ ) . '/include/init.php');
// require (ROOT_PATH . ADMIN_PATH . '/include/backup.class.php');

// rec操作项的初始化
$rec = $check->is_rec ( $_REQUEST ['rec'] ) ? $_REQUEST ['rec'] : 'default';
$cur = (isset( $_REQUEST ['cur']) && !empty( $_REQUEST ['cur'] )) ? $_REQUEST ['cur'] : '2';

// 初始化
$sqlcharset = str_replace ( '-', '', DOU_CHARSET );

@ set_time_limit ( 0 );

// 赋值给模板
$smarty->assign ( 'rec', $rec );
$smarty->assign ( 'cur2', 'managergrouplist' );

/**
 * +----------------------------------------------------------
 * 数据备份
 * +----------------------------------------------------------
 */
if ($_POST) {
	// 栏目权限列表
	$data ['option_group'] = isset($_POST ['ckboxCat']) ?implode ( ',', $_POST ['ckboxCat'] ):0;
	// 处理权限列表
	$tmp ['ckboxBlok_open'] = isset ( $_POST ['ckboxBlok_open'] ) ? 1 : 0;
	$tmp ['ckboxCatAuth_add'] = isset ( $_POST ['ckboxCatAuth_add'] ) ? 1 : 0;
	$tmp ['ckboxCatAuth_edit'] = isset ( $_POST ['ckboxCatAuth_edit'] ) ? 1 : 0;
	$tmp ['ckboxCatAuth_del'] = isset ( $_POST ['ckboxCatAuth_del'] ) ? 1 : 0;
	$tmp ['ckboxCatAuth_adt'] = isset ( $_POST ['ckboxCatAuth_adt'] ) ? 1 : 0;
	$tmp ['ckboxGroup_add'] = isset ( $_POST ['ckboxGroup_add'] ) ? 1 : 0;
	$tmp ['ckboxCreate_add'] = isset ( $_POST ['ckboxCreate_add'] ) ? 1 : 0;
	$tmp ['ckboxCreate_edit'] = isset ( $_POST ['ckboxCreate_edit'] ) ? 1 : 0;
	$tmp ['ckboxCreate_del'] = isset ( $_POST ['ckboxCreate_del'] ) ? 1 : 0;
	$tmp ['ckboxCat_add'] = isset ( $_POST ['ckboxCat_add'] ) ? 1 : 0;
	$tmp ['ckboxCat_edit'] = isset ( $_POST ['ckboxCat_edit'] ) ? 1 : 0;
	$tmp ['ckboxCat_del'] = isset ( $_POST ['ckboxCat_del'] ) ? 1 : 0;
	$tmp ['ckboxMsg_look'] = isset ( $_POST ['ckboxMsg_look'] ) ? 1 : 0;
	$tmp ['ckboxMsg_reply'] = isset ( $_POST ['ckboxMsg_reply'] ) ? 1 : 0;
	$tmp ['ckboxSys_nav'] = isset ( $_POST ['ckboxSys_nav'] ) ? 1 : 0;
	$tmp ['ckboxSys_banner'] = isset ( $_POST ['ckboxSys_banner'] ) ? 1 : 0;
	$tmp ['ckboxSys_single'] = isset ( $_POST ['ckboxSys_single'] ) ? 1 : 0;
	$tmp ['ckboxSys_dbbackup'] = isset ( $_POST ['ckboxSys_dbbackup'] ) ? 1 : 0;
	$tmp ['ckboxSys_cleancache'] = isset ( $_POST ['ckboxSys_cleancache'] ) ? 1 : 0;
	$tmp ['ckboxSys_record'] = isset ( $_POST ['ckboxSys_record'] ) ? 1 : 0;
	$data ['option_process'] = serialize ( $tmp );
	
	$sql = "update " . $dou->table ( 'admin_group' ) . " Set option_group = '{$data['option_group']}',option_process='{$data['option_process']}' where gid='{$_POST['group_select']}'";
	
	$query = $dou->query ( $sql );
	$dou->create_admin_log ( '更新权限列表：组ID：' . $_POST ['group_select'] );
	$dou->dou_msg ( '更新权限成功', 'managergrouplist.php' );
}
if ($rec == 'default') {
	$smarty->assign ( 'ur_here', '权限设置' );
	$smarty->assign ( 'action_link', array (
			'text' => $_LANG ['backup_restore'],
			'href' => 'backup.php?rec=restore' 
	) );
	
	// 权限组
	$cur_group = array ();
	$sql = "Select * From " . $dou->table ( 'admin_group' ) . " where active != 1  ";
	$query = $dou->query ( $sql );
	while ( $row = $dou->fetch_array ( $query ) ) {
		
		$list [] = $row;
		if ($row ['gid'] == $cur) {
			// 栏目
			$cur_group ['cat'] = explode ( ',', $row ['option_group'] );
			$cur_group ['process'] = unserialize ( $row ['option_process'] );
		}
	}
	
	// 文章栏目
	$article_list = $dou->get_category ( 'article_category' );
	// 当前组选中项
	if (! empty ( $cur_group ['cat'] ) && is_array ( $cur_group ['cat'] )) {
		
		foreach ( $article_list as $k => $article ) {
			if (in_array ( $article ['cat_id'], $cur_group ['cat'] )) {
				$article_list [$k] ['checked'] = 'checked';
			} else {
				$article_list [$k] ['checked'] = '';
			}
			if (! empty ( $article ['child'] ))
				foreach ( $article ['child'] as $kk => $child ) {
					if (in_array ( $child ['cat_id'], $cur_group ['cat'] )) {
						$article_list [$k]['child'] [$kk] ['checked'] = 'checked';
						
					} else {
						$article_list [$k] ['child'][$kk] ['checked'] = '';
					}
				}
		}
	} else {
		foreach ( $article_list as $k => $article ) {
			$article_list [$k] ['checked'] = '';
			if (! empty ( $article ['child'] ))
				foreach ( $article ['child'] as $kk => $child ) {
					$article_list [$k] [$kk] ['checked'] = '';
				}
		}
	}
	// var_dump($cur_group['cat']);
	$smarty->assign ( 'article_list', $article_list );
	// 当前组操作权限
	$smarty->assign ( 'group', $cur_group ['process'] );
	// 
	$smarty->assign ( 'cur', $cur );
	// CSRF防御令牌生成
	$smarty->assign ( 'token', $firewall->set_token ( 'managergrouplist' ) );
	
	// 初始化数据
	$smarty->assign ( 'list', $list );
	$smarty->assign ( 'totalsize', $list );
	$smarty->assign ( 'file_name', $file_name );
	
	$smarty->display ( 'managergrouplist.htm' );
}
function is_check($type, $parm) {
	//
}
?>
