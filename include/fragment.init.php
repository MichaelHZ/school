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
if (!defined('IN_DOUCO')) {
    die('Hacking attempt');
}

/* 获取碎片列表 */
$sql = "SELECT * FROM " . $dou->table('fragment') . " ORDER BY sort DESC, id DESC";
$query = $dou->query($sql);

while ($row = $dou->fetch_array($query)) {
    $image = $row['image'] ? ROOT_URL . $row['image'] : '';
    
    $fragment[$row['mark']] = array (
            "name" => $row['fragment_name'],
            "image" => $image,
            "text" => $row['text'],
            "link" => $row['link']
    );
}

// 赋值给模板
$smarty->assign('fragment', $fragment);
?>