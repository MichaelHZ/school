<?php

define('IN_DOUCO', true);

require (dirname(__FILE__) . '/include/init.php');

// rec操作项的初始化
$rec = $check->is_rec($_REQUEST['rec']) ? $_REQUEST['rec'] : 'default';

// 赋值给模板
$smarty->assign('rec', $rec);
$smarty->assign('cur', 'research_category');

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
	$sql = "UPDATE ".$dou->table('research_category')." Set is_password = '{$val}' Where cat_id ='{$id}' ";
	
	if($dou->query($sql)){
		
		$sql = "UPDATE ".$dou->table('research')." Set is_password = '{$val}' Where cat_id ='{$id}' ";
		$dou->query($sql);
	}
	echo 'success';
}
if ($rec == 'default') {
    $smarty->assign('ur_here', '研究课题栏目');
    $smarty->assign('action_link', array (
            'text' => '课题研究栏目增加',
            'href' => 'research_category.php?rec=add'
    ));

    // 赋值给模板


    $smarty->assign('article_category', $dou->get_category_nolevel('research_category'));

    $smarty->display('research_category.htm');
} 

/**
 * +----------------------------------------------------------
 * 分类添加
 * +----------------------------------------------------------
 */
elseif ($rec == 'add') {
    $smarty->assign('ur_here', '课题研究栏目增加');
    $smarty->assign('action_link', array (
            'text' => '课题研究栏目',
            'href' => 'research_category.php'
    ));
    
    // CSRF防御令牌生成
    $smarty->assign('token', $firewall->set_token('research_category_add'));


    // 赋值给模板
    $smarty->assign('form_action', 'insert');
    $smarty->assign('article_category', $dou->get_category_nolevel('research_category'));
    
    $smarty->display('research_category.htm');
} 

elseif ($rec == 'insert') {
    if (empty($_POST['cat_name']))
        $dou->dou_msg('栏目名为空' . $_LANG['is_empty']);

    if (!$check->is_unique_id($_POST['unique_id']))
        $dou->dou_msg($_LANG['unique_id_wrong']);

    if ($dou->value_exist('research_category', 'unique_id', $_POST['unique_id']))
        $dou->dou_msg($_LANG['unique_id_existed']);
        
    // CSRF防御令牌验证
    $firewall->check_token($_POST['token'], 'research_category_add');

    $_POST['template'] = isset($_POST['template']) && !empty($_POST['template']) ? $_POST['template'] :'default';
    $sql = "INSERT INTO " . $dou->table('research_category') . " (cat_id, unique_id, parent_id, cat_name, keywords, description, sort,custom_url,template)" . " VALUES (NULL, '$_POST[unique_id]', '$_POST[parent_id]', '$_POST[cat_name]', '$_POST[keywords]', '$_POST[description]', '$_POST[sort]','$_POST[custom_url]','$_POST[template]')";

    $dou->query($sql);
    
    $dou->create_admin_log('课题研究栏目添加' . ': ' . $_POST['cat_name']);
    $dou->dou_msg('课题研究栏目添加成功', 'research_category.php');
} 

/**
 * +----------------------------------------------------------
 * 分类编辑
 * +----------------------------------------------------------
 */
elseif ($rec == 'edit') {
    $smarty->assign('ur_here','课题研究栏目编辑');
    $smarty->assign('action_link', array (
            'text' => '课题研究栏目编辑',
            'href' => 'research_category.php'
    ));
    
    // 获取分类信息
    $cat_id = $check->is_number($_REQUEST['cat_id']) ? $_REQUEST['cat_id'] : '';
    $query = $dou->select($dou->table('research_category'), '*', '`cat_id` = \'' . $cat_id . '\'');
    $cat_info = $dou->fetch_array($query);
    
    // CSRF防御令牌生成
    $smarty->assign('token', $firewall->set_token('research_category_edit'));



    // 赋值给模板
    $smarty->assign('form_action', 'update');

    $smarty->assign('article_category', $dou->get_category_nolevel('research_category', '0', '0', $cat_id));
    $smarty->assign('cat_info', $cat_info);
    
    $smarty->display('research_category.htm');
} 

elseif ($rec == 'update') {
    if (empty($_POST['cat_name']))
        $dou->dou_msg('栏目名为空' . $_LANG['is_empty']);

    if (!$check->is_unique_id($_POST['unique_id']))
        $dou->dou_msg($_LANG['unique_id_wrong']);

    if ($dou->value_exist('research_category', 'unique_id', $_POST['unique_id'], "AND cat_id != '$_POST[cat_id]'"))
        $dou->dou_msg($_LANG['unique_id_existed']);
        
    // CSRF防御令牌验证
    $firewall->check_token($_POST['token'], 'research_category_edit');

    $_POST['theme'] = isset($_POST['template']) && !empty($_POST['template']) ? $_POST['template'] :'default';
    $sql = "update " . $dou->table('research_category') . " SET cat_name = '$_POST[cat_name]', unique_id = '$_POST[unique_id]', parent_id = '$_POST[parent_id]', keywords = '$_POST[keywords]' ,description = '$_POST[description]', sort = '$_POST[sort]',custom_url = '$_POST[custom_url]',template = '$_POST[template]' WHERE cat_id = '$_POST[cat_id]'";

	$dou->query($sql);
    
    $dou->create_admin_log('课题研究栏目编辑'. ': ' . $_POST['cat_name']);
    $dou->dou_msg('课题研究栏目编辑成功', 'research_category.php');
} 

/**
 * +----------------------------------------------------------
 * 分类删除
 * +----------------------------------------------------------
 */
elseif ($rec == 'del') {
    $cat_id = $check->is_number($_REQUEST['cat_id']) ? $_REQUEST['cat_id'] : $dou->dou_msg($_LANG['illegal'], 'research_category.php');
    $cat_name = $dou->get_one("SELECT cat_name FROM " . $dou->table('research_category') . " WHERE cat_id = '$cat_id'");
    $is_parent = $dou->get_one("SELECT id FROM " . $dou->table('research') . " WHERE cat_id = '$cat_id'") . $dou->get_one("SELECT cat_id FROM " . $dou->table('article_category') . " WHERE parent_id = '$cat_id' And stype='1'");
    
    if ($is_parent) {
        $_LANG['article_category_del_is_parent'] = preg_replace('/d%/Ums', $cat_name, $_LANG['article_category_del_is_parent']);
        $dou->dou_msg($_LANG['article_category_del_is_parent'], 'research_category.php', '', '3');
    } else {
        if (isset($_POST['confirm']) ? $_POST['confirm'] : '') {
            $dou->create_admin_log($_LANG['article_category_del'] . ': ' . $cat_name);
            $dou->delete($dou->table('research_category'), "cat_id = $cat_id", 'research_category.php');
        } else {
            $_LANG['del_check'] = preg_replace('/d%/Ums', $cat_name, $_LANG['del_check']);
            $dou->dou_msg($_LANG['del_check'], 'research_category.php', '', '30', "research_category.php?rec=del&cat_id=$cat_id");
        }
    }
}
?>