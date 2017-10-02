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

// 图片上传
include_once (ROOT_PATH . 'include/upload.class.php');
$images_dir = 'images/fragment/'; // 文件上传路径，结尾加斜杠
$img = new Upload(ROOT_PATH . $images_dir, ''); // 实例化类文件
if (!file_exists(ROOT_PATH . $images_dir)) {
    mkdir(ROOT_PATH . $images_dir, 0777);
}

$smarty->assign('rec', $rec);
$smarty->assign('cur', 'fragment');

/**
 * +----------------------------------------------------------
 * 数据列表
 * +----------------------------------------------------------
 */
if ($rec == 'default') {
    $smarty->assign('ur_here', $_LANG['fragment_list']);
    $smarty->assign('action_link', array (
            'text' => $_LANG['fragment_add'],
            'href' => 'fragment.php?rec=add' 
    ));
    
    // 赋值给模板
    $smarty->assign('fragment_list', get_fragment_list());
    $smarty->display('fragment.htm');
} 

/**
 * +----------------------------------------------------------
 * 数据添加
 * +----------------------------------------------------------
 */
elseif ($rec == 'add') {
    $smarty->assign('ur_here', $_LANG['fragment_add']);
    $smarty->assign('action_link', array (
            'text' => $_LANG['fragment_list'],
            'href' => 'fragment.php' 
    ));
    
    // CSRF防御令牌生成
    $smarty->assign('token', $firewall->set_token('fragment_add'));
    
    // 赋值给模板
    $smarty->assign('form_action', 'insert');
    $smarty->assign('fragment_list', get_fragment_list());
    
    $smarty->display('fragment.htm');
} 

elseif ($rec == 'insert') {
    if (empty($_POST['fragment_name']))
        $dou->dou_msg($_LANG['fragment_name'] . $_LANG['is_empty']);
    
    if (!preg_match("/^[a-z0-9_]+$/", $_POST['mark']))
        $dou->dou_msg($_LANG['fragment_mark_cue']);

    // 判断是否有上传图片/上传图片生成
    if ($_FILES['image']['name'] != "") {
        $upfile = $img->upload_image('image', $_POST['mark']); // 以唯一标记为图片名称
        $image = $images_dir . $upfile;
    }
        
    // CSRF防御令牌验证
    $firewall->check_token($_POST['token'], 'fragment_add');
    
    $sql = "INSERT INTO " . $dou->table('fragment') . " (id, fragment_name, mark, parent_id, text ,image, link, sort)" . " VALUES (NULL, '$_POST[fragment_name]', '$_POST[mark]', '$_POST[parent_id]', '$_POST[text]', '$image', '$_POST[link]', '$_POST[sort]')";
    $dou->query($sql);
    
    $dou->create_admin_log($_LANG['fragment_add'] . ': ' . $_POST['fragment_name']);
    $dou->dou_msg($_LANG['fragment_add_succes'], 'fragment.php');
} 

/**
 * +----------------------------------------------------------
 * 数据编辑
 * +----------------------------------------------------------
 */
elseif ($rec == 'edit') {
    $smarty->assign('ur_here', $_LANG['fragment_edit']);
    $smarty->assign('action_link', array (
            'text' => $_LANG['fragment_list'],
            'href' => 'fragment.php' 
    ));
    
    // 验证并获取合法的ID
    $id = $check->is_number($_REQUEST['id']) ? $_REQUEST['id'] : '';
    
    $query = $dou->select($dou->table('fragment'), '*', '`id` = \'' . $id . '\'');
    $fragment = $dou->fetch_array($query);
    
    // CSRF防御令牌生成
    $smarty->assign('token', $firewall->set_token('fragment_edit'));
    
    // 赋值给模板
    $smarty->assign('form_action', 'update');
    $smarty->assign('fragment_list', get_fragment_list(0, 0, $id));
    $smarty->assign('fragment', $fragment);
    
    $smarty->display('fragment.htm');
} 

elseif ($rec == 'update') {
    if (empty($_POST['fragment_name']))
        $dou->dou_msg($_LANG['fragment_name'] . $_LANG['is_empty']);
    
    if (!preg_match("/^[a-z0-9_]+$/", $_POST['mark']))
        $dou->dou_msg($_LANG['fragment_mark_cue']);

    // 判断是否有上传图片/上传图片生成
    if ($_FILES['image']['name'] != "") {
        $upfile = $img->upload_image('image', $_POST['mark']); // 以唯一标记为图片名称
        $image = ", image='" . $images_dir . $upfile . "'";
    }
        
    // CSRF防御令牌验证
    $firewall->check_token($_POST['token'], 'fragment_edit');
    
    $sql = "UPDATE " . $dou->table('fragment') . " SET fragment_name = '$_POST[fragment_name]', mark = '$_POST[mark]', parent_id = '$_POST[parent_id]', text = '$_POST[text]'" . $image . ", link = '$_POST[link]', sort = '$_POST[sort]' WHERE id = '$_POST[id]'";
    $dou->query($sql);
    
    $dou->create_admin_log($_LANG['fragment_edit'] . ': ' . $_POST['fragment_name']);
    $dou->dou_msg($_LANG['fragment_edit_succes'], 'fragment.php', '', '3');
} 

/**
 * +----------------------------------------------------------
 * 数据删除
 * +----------------------------------------------------------
 */
elseif ($rec == 'del') {
    // 验证并获取合法的ID
    $id = $check->is_number($_REQUEST['id']) ? $_REQUEST['id'] : $dou->dou_msg($_LANG['illegal'], 'fragment.php');
    
    $fragment_name = $dou->get_one("SELECT fragment_name FROM " . $dou->table('fragment') . " WHERE id = '$id'");
    $is_parent = $dou->get_one("SELECT id FROM " . $dou->table('fragment') . " WHERE parent_id = '$id'");
    
    if ($is_parent) {
        $_LANG['fragment_del_is_parent'] = preg_replace('/d%/Ums', $fragment_name, $_LANG['fragment_del_is_parent']);
        $dou->dou_msg($_LANG['fragment_del_is_parent'], 'fragment.php', '', '3');
    } else {
        if (isset($_POST['confirm']) ? $_POST['confirm'] : '') {
            // 删除相应商品图片
            $image = $dou->get_one("SELECT image FROM " . $dou->table('fragment') . " WHERE id = '$id'");
            $dou->del_image($image);
            
            $dou->create_admin_log($_LANG['fragment_del'] . ': ' . $fragment_name);
            $dou->delete($dou->table('fragment'), "id = $id", 'fragment.php');
        } else {
            $_LANG['del_check'] = preg_replace('/d%/Ums', $fragment_name, $_LANG['del_check']);
            $dou->dou_msg($_LANG['del_check'], 'fragment.php', '', '30', "fragment.php?rec=del&id=$id");
        }
    }
}

/**
 * +----------------------------------------------------------
 * 获取数据调用列表
 * +----------------------------------------------------------
 * $parent_id 默认获取一级导航
 * $current_id 当前页面栏目ID
 * +----------------------------------------------------------
 */
function get_fragment_list($parent_id = 0, $current_id = '') {
    $category = array ();
    $data = $GLOBALS['dou']->fetch_array_all($GLOBALS['dou']->table('fragment'), 'sort ASC');
    foreach ((array)$data as $value) {
        // $parent_id将在嵌套函数中随之变化
        if ($value['parent_id'] == $parent_id) {
            $value['cur'] = $value['id'] == $current_id ? true : false;
            $value['content'] = $value['image'] ? '<img src="' . ROOT_URL . $value['image'] . '" />' : '<span>' . $value['text'] . '</span>';
            
            foreach ($data as $child) {
                // 筛选下级导航
                if ($child['parent_id'] == $value['id']) {
                    // 嵌套函数获取子分类
                    $value['child'] = get_fragment_list($value['id'], $current_id);
                    break;
                }
            }
            $fragment_list[] = $value;
        }
    }
    
    return $fragment_list;
}
?>