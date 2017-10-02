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
class MusicUpload {
    var $music_dir;
    var $thumb_dir;
    var $upfile_type; // 上传的类型，默认为：mp3
    var $upfile_size_max; // 上传大小限制，单位是“KB”，默认为：2048KB
    var $to_file = true; // $this->to_file设定为false时将以原图文件名创建缩略图
    
    /**
     * +----------------------------------------------------------
     * 构造函数
     * $images_dir 文件上传路径
     * $thumb_dir 缩略图路径
     * +----------------------------------------------------------
     */
    function MusicUpload($music_dir = '../upload/', $thumb_dir = 'thumb/', $upfile_type = 'mp3', $upfile_size_max = '20480') {
        $this->music_dir = $music_dir; // 文件上传路径 结尾加斜杠
        $this->thumb_dir = $thumb_dir; // 缩略图路径（相对于$images_dir） 结尾加斜杠，留空则跟$images_dir相同
        $this->upfile_type = $upfile_type;
        $this->upfile_size_max = $upfile_size_max;
    }
    
    /**
     * +----------------------------------------------------------
     * 图片上传的处理函数
     * $upfile 上传的图片域
     * $image_name 给上传的图片重命名
     * +----------------------------------------------------------
     */
    function upload_image($upfile, $music_name = '') {
        if ($GLOBALS['dou']->dir_status($this->music_dir) != 'write') {
            $GLOBALS['dou']->dou_msg($GLOBALS['_LANG']['upload_dir_wrong']);
        }
        
        // 没有命名规则默认以时间作为文件名
        if (empty($music_name)) {
            $music_name = time(); // 设定当前时间为图片名称
        }
        
        if (@ empty($_FILES[$upfile]['name'])) {
            $GLOBALS['dou']->dou_msg($GLOBALS['_LANG']['upload_image_empty']);
        }
        $name = explode(".", $_FILES[$upfile]["name"]); // 将上传前的文件以“.”分开取得文件类型
        $img_count = count($name); // 获得截取的数量
        $img_type = $name[$img_count - 1]; // 取得文件的类型
        if (stripos($this->upfile_type, $img_type) === false) {
            $GLOBALS['dou']->dou_msg($GLOBALS['_LANG']['upload_file_support'] . $this->upfile_type . $GLOBALS['_LANG']['upload_file_support_no'] . $img_type);
        }
        $photo = $image_name . "." . $img_type; // 写入数据库的文件名
        $upfile_name = $this->music_dir . $photo; // 上传后的文件名称
        $upfile_ok = move_uploaded_file($_FILES[$upfile]["tmp_name"], $upfile_name);
        if ($upfile_ok) {
            $img_size = $_FILES[$upfile]["size"];
            $img_size_kb = round($img_size / 1024);
            if ($img_size_kb > $this->upfile_size_max) {
                @unlink($upfile_name);
                $GLOBALS['dou']->dou_msg($GLOBALS['_LANG']['upload_out_size'] . $this->upfile_size_max . "KB");
            }
        } else {
            $GLOBALS['_LANG']['upload_wrong'] = preg_replace('/d%/Ums', $this->upfile_size_max, $GLOBALS['_LANG']['upload_wrong']);
            $GLOBALS['dou']->dou_msg($GLOBALS['_LANG']['upload_wrong']);
        }
        return $photo;
    }

    /**
     * +----------------------------------------------------------
     * 批量上传音乐函数
     * $upfile 上传的音乐域
     * $music_url 音乐地址
     * $image_name 给上传的图片重命名
     * +----------------------------------------------------------
     */
    function upload_music($upfile, $music_url, $music_name = '') {
        if ($GLOBALS['dou']->dir_status($this->music_dir) != 'write') {
            echo $GLOBALS['_LANG']['upload_dir_wrong'];
            exit;
        }
        
        // 没有命名规则默认以时间作为文件名
        if (empty($music_name)) {
            $music_name = time(); // 设定当前时间为图片名称
        }
        
        if (@ empty($_FILES[$upfile]['name'])) {
            echo $GLOBALS['_LANG']['upload_image_empty'];
            exit;
        }
       
        $name = explode(".", $_FILES[$upfile]["name"]); // 将上传前的文件以“.”分开取得文件类型
//         var_dump($_FILES[$upfile]["name"]);
//         exit;
        $msc_count = count($name); // 获得截取的数量
        $msc_type = $name[$msc_count - 1]; // 取得文件的类型
        $old_name =  $_FILES[$upfile]["name"];
        if (stripos($this->upfile_type, $msc_type) === false) {
            echo $GLOBALS['_LANG']['upload_file_support'] . $this->upfile_type . $GLOBALS['_LANG']['upload_file_support_no'] . $msc_type;
            exit;
        }
        $photo = $music_name . "." . $msc_type; // 写入数据库的文件名
        $upfile_name = $this->music_dir . $photo; // 上传后的文件名称
        $upfile_ok = move_uploaded_file($_FILES[$upfile]["tmp_name"], $upfile_name);
        if ($upfile_ok) {
            $msc_size = $_FILES[$upfile]["size"];
            $msc_size_kb = round($msc_size / 1024);
            if ($msc_size_kb > $this->upfile_size_max) {
                @unlink($upfile_name);
                echo $GLOBALS['_LANG']['upload_out_size'] . $this->upfile_size_max . "KB";
            } else {
                echo '<li style="position:relative;"><img src="/images/fragment/none.jpg" id="' . $photo . '">';
                echo '<input style="position:absolute;top:0px;left:0px;width:100%;" type="test" name="musicName[]" value="'.$old_name.'" />';
                echo '<input type="hidden" name="music[]" value="' . $music_url . $photo . '" />';
                echo '<span id="' . $photo . '" class="del">X</span></li>';
            }
        } else {
            $GLOBALS['_LANG']['upload_wrong'] = preg_replace('/d%/Ums', $this->upfile_size_max, $GLOBALS['_LANG']['upload_wrong']);
            echo $GLOBALS['_LANG']['upload_wrong'];
        }
    }
    
    /**
     * +----------------------------------------------------------
     * 获取上传图片信息
     * $photo 原始图片
     * +----------------------------------------------------------
     */
    function get_msc_info($photo) {
        $photo = $this->music_dir . $photo;
        $image_size = getimagesize($photo);
        $img_info["width"] = $image_size[0];
        $img_info["height"] = $image_size[1];
        $img_info["type"] = $image_size[2];
        $img_info["name"] = basename($photo);
        $img_info["ext"] = pathinfo($photo, PATHINFO_EXTENSION);
        return $img_info;
    }
    
    /**
     * +----------------------------------------------------------
     * 创建图片的缩略图
     * $photo 原始图片
     * $width 缩略图宽度
     * $height 缩略图高度
     * $quality 生成缩略图片质量
     * +----------------------------------------------------------
     */
    function make_thumb($photo, $width = '128', $height = '128', $quality = '90') {
        $img_info = $this->get_img_info($photo);
        $photo = $this->music_dir . $photo; // 获得图片源
        $thumb_name = substr($img_info["name"], 0, strrpos($img_info["name"], ".")) . "_thumb." . $img_info["ext"]; // 缩略图名称
        if ($img_info["type"] == 1) {
            $img = imagecreatefromgif($photo);
        } elseif ($img_info["type"] == 2) {
            $img = imagecreatefromjpeg($photo);
        } elseif ($img_info["type"] == 3) {
            $img = imagecreatefrompng($photo);
        } else {
            $img = "";
        }
        
        if (empty($img)) {
            return False;
        }
        
        if (function_exists("imagecreatetruecolor")) {
            $new_thumb = imagecreatetruecolor($width, $height);
            ImageCopyResampled($new_thumb, $img, 0, 0, 0, 0, $width, $height, $img_info["width"], $img_info["height"]);
        } else {
            $new_thumb = imagecreate($width, $height);
            ImageCopyResized($new_thumb, $img, 0, 0, 0, 0, $width, $height, $img_info["width"], $img_info["height"]);
        }
        
        // $this->to_file设定为false时将以原图文件名创建缩略图
        if ($this->to_file) {
            if (file_exists($this->music_dir . $this->thumb_dir . $thumb_name))
                @ unlink($this->music_dir . $this->thumb_dir . $thumb_name);
            ImageJPEG($new_thumb, $this->music_dir . $this->thumb_dir . $thumb_name, $quality);
            return $this->music_dir . $this->thumb_dir . $thumb_name;
        } else {
            ImageJPEG($new_thumb, '', $quality);
        }
        ImageDestroy($new_thumb);
        ImageDestroy($img);
        return $thumb_name;
    }
}
?>