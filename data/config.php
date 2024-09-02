<?php
/**
 * DouPHP
 * --------------------------------------------------------------------------------------------------
 * 版权所有 2014-2015 漳州豆壳网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.douco.com
 * --------------------------------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在遵守授权协议前提下对程序代码进行修改和使用；不允许对程序代码以任何形式任何目的的再发布。
 * 授权协议：http://www.douco.com/license.html
 * --------------------------------------------------------------------------------------------------
 * Author: DouCo
 * Release Date: 2015-06-10
 */

// database host
$dbhost   = "localhost";

// database name
$dbname   = "";

// database username
$dbuser   = "";

// database password
$dbpass   = "";

// table prefix
$prefix   = "sm_";

// charset
define('DOU_CHARSET','utf-8');

// administrator path
define('ADMIN_PATH','admin');

// mobile path
define('M_PATH','m');


// 兼容DEDE的全局变量
$cfg_basehost = "http://www.bc.com";
$cfg_multi_site = 'N';


//上传的普通图片的路径,建议按默认
$cfg_image_dir = $cfg_basedir .'/images/imgall';
//上传的缩略图
$ddcfg_image_dir = $cfg_basedir .'/images/litimg';

$cfg_ddimg_width = 240;
$cfg_ddimg_height = 180;
$cfg_auot_description = 240;
$cfg_addon_savetype = 'ymd';
$cfg_soft_lang = 'utf-8';

$cfg_photo_type['gif'] = true;
$cfg_photo_type['jpeg'] = true;
$cfg_photo_type['png'] = true;
$cfg_photo_type['wbmp'] = true;
$cfg_photo_typenames = Array();
$cfg_ddimg_bgcolor = 0;
?>
