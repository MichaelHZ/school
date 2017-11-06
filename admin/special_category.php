<?php

define('IN_DOUCO', true);

require (dirname(__FILE__) . '/include/init.php');

// rec操作项的初始化
$rec = $check->is_rec($_REQUEST['rec']) ? $_REQUEST['rec'] : 'default';

// 赋值给模板
$smarty->assign('rec', $rec);
$smarty->assign('cur', 'special_category');

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
	$sql = "UPDATE ".$dou->table('special_category')." Set is_password = '{$val}' Where cat_id ='{$id}' ";
	
	if($dou->query($sql)){
		
		$sql = "UPDATE ".$dou->table('special')." Set is_password = '{$val}' Where cat_id ='{$id}' ";
		$dou->query($sql);
	}
	echo 'success';
}
if ($rec == 'default') {
    $smarty->assign('ur_here','特色课程栏目');
    $smarty->assign('action_link', array (
            'text' => '特色课程栏目增加',
            'href' => 'special_category.php?rec=add' 
    ));
    
    // 赋值给模板
    $smarty->assign('article_category', $dou->get_category_nolevel('special_category'));
    
    $smarty->display('special_category.htm');
} 

/**
 * +----------------------------------------------------------
 * 分类添加
 * +----------------------------------------------------------
 */
elseif ($rec == 'add') {
    $smarty->assign('ur_here', '特色课程栏目增加');
    $smarty->assign('action_link', array (
            'text' => '特色课程栏目',
            'href' => 'special_category.php'
    ));
    
    // CSRF防御令牌生成
    $smarty->assign('token', $firewall->set_token('special_category_add'));


    // 赋值给模板
    $smarty->assign('form_action', 'insert');
    $smarty->assign('special_category', $dou->get_category_nolevel('special_category'));
    
    $smarty->display('special_category.htm');
} 

elseif ($rec == 'insert') {
    if (empty($_POST['cat_name']))
        $dou->dou_msg('栏目名为空' . $_LANG['is_empty']);

    if (!$check->is_unique_id($_POST['unique_id']))
        $dou->dou_msg($_LANG['unique_id_wrong']);

    if ($dou->value_exist('special_category', 'unique_id', $_POST['unique_id']))
        $dou->dou_msg($_LANG['unique_id_existed']);
        
    // CSRF防御令牌验证
    $firewall->check_token($_POST['token'], 'special_category_add');

    $_POST['template'] = isset($_POST['template']) && !empty($_POST['template']) ? $_POST['template'] :'default';
    $sql = "INSERT INTO " . $dou->table('special_category') . " (cat_id, unique_id, parent_id, cat_name, keywords, description, sort,custom_url,template)" . " VALUES (NULL, '$_POST[unique_id]', '$_POST[parent_id]', '$_POST[cat_name]', '$_POST[keywords]', '$_POST[description]', '$_POST[sort]','$_POST[custom_url]','$_POST[template]')";
    
    $dou->query($sql);
    
    $dou->create_admin_log('特色课程栏目添加' . ': ' . $_POST['cat_name']);
    $dou->dou_msg('特色课程栏目添加成功', 'special_category.php');
} 

/**
 * +----------------------------------------------------------
 * 分类编辑
 * +----------------------------------------------------------
 */
elseif ($rec == 'edit') {
    $smarty->assign('ur_here','特色课程栏目编辑');
    $smarty->assign('action_link', array (
            'text' => '特色课程栏目编辑',
            'href' => 'special_category.php'
    ));
    
    // 获取分类信息
    $cat_id = $check->is_number($_REQUEST['cat_id']) ? $_REQUEST['cat_id'] : '';
    $query = $dou->select($dou->table('special_category'), '*', '`cat_id` = \'' . $cat_id . '\'');
    $cat_info = $dou->fetch_array($query);
    
    // CSRF防御令牌生成
    $smarty->assign('token', $firewall->set_token('special_category_edit'));


    // 赋值给模板
    $smarty->assign('form_action', 'update');
    $smarty->assign('special_category', $dou->get_category_nolevel('special_category', '0', '0', $cat_id));
    $smarty->assign('cat_info', $cat_info);
    
    $smarty->display('special_category.htm');
} 

elseif ($rec == 'update') {
    if (empty($_POST['cat_name']))
        $dou->dou_msg('栏目名为空' . $_LANG['is_empty']);

    if (!$check->is_unique_id($_POST['unique_id']))
        $dou->dou_msg($_LANG['unique_id_wrong']);

    if ($dou->value_exist('special_category', 'unique_id', $_POST['unique_id'], "AND cat_id != '$_POST[cat_id]'"))
        $dou->dou_msg($_LANG['unique_id_existed']);
        
    // CSRF防御令牌验证
    $firewall->check_token($_POST['token'], 'special_category_edit');

    $_POST['theme'] = isset($_POST['template']) && !empty($_POST['template']) ? $_POST['template'] :'default';
    $sql = "update " . $dou->table('special_category') . " SET cat_name = '$_POST[cat_name]', unique_id = '$_POST[unique_id]', parent_id = '$_POST[parent_id]', keywords = '$_POST[keywords]' ,description = '$_POST[description]', sort = '$_POST[sort]',custom_url = '$_POST[custom_url]',template = '$_POST[template]' WHERE cat_id = '$_POST[cat_id]'";

	$dou->query($sql);
    
    $dou->create_admin_log('特色课程栏目编辑'. ': ' . $_POST['cat_name']);
    $dou->dou_msg('特色课程栏目编辑成功', 'special_category.php');
} 

/**
 * +----------------------------------------------------------
 * 分类删除
 * +----------------------------------------------------------
 */
elseif ($rec == 'del') {
    $cat_id = $check->is_number($_REQUEST['cat_id']) ? $_REQUEST['cat_id'] : $dou->dou_msg($_LANG['illegal'], 'special_category.php');
    $cat_name = $dou->get_one("SELECT cat_name FROM " . $dou->table('special_category') . " WHERE cat_id = '$cat_id'");
    $is_parent = $dou->get_one("SELECT id FROM " . $dou->table('special') . " WHERE cat_id = '$cat_id'") . $dou->get_one("SELECT cat_id FROM " . $dou->table('article_category') . " WHERE parent_id = '$cat_id' And stype='1'");
    
    if ($is_parent) {
        $_LANG['article_category_del_is_parent'] = preg_replace('/d%/Ums', $cat_name, $_LANG['article_category_del_is_parent']);
        $dou->dou_msg($_LANG['article_category_del_is_parent'], 'special_category.php', '', '3');
    } else {
        if (isset($_POST['confirm']) ? $_POST['confirm'] : '') {
            $dou->create_admin_log($_LANG['article_category_del'] . ': ' . $cat_name);
            $dou->delete($dou->table('special_category'), "cat_id = $cat_id", 'special_category.php');
        } else {
            $_LANG['del_check'] = preg_replace('/d%/Ums', $cat_name, $_LANG['del_check']);
            $dou->dou_msg($_LANG['del_check'], 'special_category.php', '', '30', "special_category.php?rec=del&cat_id=$cat_id");
        }
    }
}
?>