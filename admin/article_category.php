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

require (dirname(__FILE__) . '/include/init.php');

// rec操作项的初始化
$rec = $check->is_rec($_REQUEST['rec']) ? $_REQUEST['rec'] : 'default';

// 赋值给模板
$smarty->assign('rec', $rec);
$smarty->assign('cur', 'article_category');

/**
 * +----------------------------------------------------------
 * 分类列表
 * +----------------------------------------------------------
 */
 if ($rec == 'active') {
	$val = intval($_POST['val']) > 0?0:1;
	if(intval($_POST['id']) > 0){
		$id = intval($_POST['id']);
	}else{
		echo "数据错误";
		exit;
	}
	$sql = "UPDATE ".$dou->table('article_category')." Set is_password = '{$val}' Where cat_id ='{$id}' ";
	
	if($dou->query($sql)){
		
		$sql = "UPDATE ".$dou->table('article')." Set is_password = '{$val}' Where cat_id ='{$id}' ";
		$dou->query($sql);
	}
	echo 'success';
}
if ($rec == 'default') {
    $smarty->assign('ur_here', $_LANG['article_category']);
    $smarty->assign('action_link', array (
            'text' => $_LANG['article_category_add'],
            'href' => 'article_category.php?rec=add' 
    ));
    
    // 赋值给模板
    $smarty->assign('article_category', $dou->get_category_nolevel('article_category'));
    
    $smarty->display('article_category.htm');
} 

/**
 * +----------------------------------------------------------
 * 分类添加
 * +----------------------------------------------------------
 */
elseif ($rec == 'add') {
    $smarty->assign('ur_here', $_LANG['article_category_add']);
    $smarty->assign('action_link', array (
            'text' => $_LANG['article_category'],
            'href' => 'article_category.php' 
    ));
    
    // CSRF防御令牌生成
    $smarty->assign('token', $firewall->set_token('article_category_add'));

    $smarty->assign('homePosition',$dou->get_home_position());
    // 赋值给模板
    $smarty->assign('form_action', 'insert');
    $smarty->assign('article_category', $dou->get_category_nolevel('article_category'));
    
    $smarty->display('article_category.htm');
} 

elseif ($rec == 'insert') {
    if (empty($_POST['cat_name']))
        $dou->dou_msg($_LANG['article_category_name'] . $_LANG['is_empty']);

    if (!$check->is_unique_id($_POST['unique_id']))
        $dou->dou_msg($_LANG['unique_id_wrong']);

    if ($dou->value_exist('article_category', 'unique_id', $_POST['unique_id']))
        $dou->dou_msg($_LANG['unique_id_existed']);
        
    // CSRF防御令牌验证
    $firewall->check_token($_POST['token'], 'article_category_add');
    $position = '';
    if(isset($_POST['homePosition']) && !empty($_POST['homePosition'])){
        $position = implode(',',$_POST['homePosition']);
    }
    $_POST['template'] = isset($_POST['template']) && !empty($_POST['template']) ? $_POST['template'] :'default';
    $sql = "INSERT INTO " . $dou->table('article_category') . " (cat_id, unique_id, parent_id, cat_name, keywords, description, sort,custom_url,home_position,template)" . " VALUES (NULL, '$_POST[unique_id]', '$_POST[parent_id]', '$_POST[cat_name]', '$_POST[keywords]', '$_POST[description]', '$_POST[sort]','$_POST[custom_url]','$position','$_POST[template]')";
    
    $dou->query($sql);
    
    $dou->create_admin_log($_LANG['article_category_add'] . ': ' . $_POST['cat_name']);
    $dou->dou_msg($_LANG['article_category_add_succes'], 'article_category.php');
} 

/**
 * +----------------------------------------------------------
 * 分类编辑
 * +----------------------------------------------------------
 */
elseif ($rec == 'edit') {
    $smarty->assign('ur_here', $_LANG['article_category_edit']);
    $smarty->assign('action_link', array (
            'text' => $_LANG['article_category'],
            'href' => 'article_category.php' 
    ));
    
    // 获取分类信息
    $cat_id = $check->is_number($_REQUEST['cat_id']) ? $_REQUEST['cat_id'] : '';
    $query = $dou->select($dou->table('article_category'), '*', '`cat_id` = \'' . $cat_id . '\'');
    $cat_info = $dou->fetch_array($query);
    
    // CSRF防御令牌生成
    $smarty->assign('token', $firewall->set_token('article_category_edit'));

    $smarty->assign('selectPosition',explode(',',$cat_info['home_position']));
    $smarty->assign('homePosition',$dou->get_home_position());
    // 赋值给模板
    $smarty->assign('form_action', 'update');
    $smarty->assign('article_category', $dou->get_category_nolevel('article_category', '0', '0', $cat_id));
    $smarty->assign('cat_info', $cat_info);
    
    $smarty->display('article_category.htm');
} 

elseif ($rec == 'update') {
    if (empty($_POST['cat_name']))
        $dou->dou_msg($_LANG['article_category_name'] . $_LANG['is_empty']);

    if (!$check->is_unique_id($_POST['unique_id']))
        $dou->dou_msg($_LANG['unique_id_wrong']);

    if ($dou->value_exist('article_category', 'unique_id', $_POST['unique_id'], "AND cat_id != '$_POST[cat_id]'"))
        $dou->dou_msg($_LANG['unique_id_existed']);
        
    // CSRF防御令牌验证
    $firewall->check_token($_POST['token'], 'article_category_edit');
    $position = '';
    if(isset($_POST['homePosition']) && !empty($_POST['homePosition'])){
        $position = implode(',',$_POST['homePosition']);
    }
    $_POST['theme'] = isset($_POST['template']) && !empty($_POST['template']) ? $_POST['template'] :'default';
    $sql = "update " . $dou->table('article_category') . " SET cat_name = '$_POST[cat_name]', unique_id = '$_POST[unique_id]', parent_id = '$_POST[parent_id]', keywords = '$_POST[keywords]' ,description = '$_POST[description]', sort = '$_POST[sort]',custom_url = '$_POST[custom_url]',home_position='$position',template = '$_POST[template]' WHERE cat_id = '$_POST[cat_id]'";

	$dou->query($sql);
    
    $dou->create_admin_log($_LANG['article_category_edit'] . ': ' . $_POST['cat_name']);
    $dou->dou_msg($_LANG['article_category_edit_succes'], 'article_category.php');
} 

/**
 * +----------------------------------------------------------
 * 分类删除
 * +----------------------------------------------------------
 */
elseif ($rec == 'del') {
    $cat_id = $check->is_number($_REQUEST['cat_id']) ? $_REQUEST['cat_id'] : $dou->dou_msg($_LANG['illegal'], 'article_category.php');
    $cat_name = $dou->get_one("SELECT cat_name FROM " . $dou->table('article_category') . " WHERE cat_id = '$cat_id'");
    $is_parent = $dou->get_one("SELECT id FROM " . $dou->table('article') . " WHERE cat_id = '$cat_id'") . $dou->get_one("SELECT cat_id FROM " . $dou->table('article_category') . " WHERE parent_id = '$cat_id' And stype='1'");
    
    if ($is_parent) {
        $_LANG['article_category_del_is_parent'] = preg_replace('/d%/Ums', $cat_name, $_LANG['article_category_del_is_parent']);
        $dou->dou_msg($_LANG['article_category_del_is_parent'], 'article_category.php', '', '3');
    } else {
        if (isset($_POST['confirm']) ? $_POST['confirm'] : '') {
            $dou->create_admin_log($_LANG['article_category_del'] . ': ' . $cat_name);
            $dou->delete($dou->table('article_category'), "cat_id = $cat_id", 'article_category.php');
        } else {
            $_LANG['del_check'] = preg_replace('/d%/Ums', $cat_name, $_LANG['del_check']);
            $dou->dou_msg($_LANG['del_check'], 'article_category.php', '', '30', "article_category.php?rec=del&cat_id=$cat_id");
        }
    }
}
?>