<?php
/**
 * KindEditor PHP
 *
 * 本PHP程序是演示程序，建议不要直接在实际项目中使用。
 * 如果您确定直接使用本程序，使用之前请仔细确认相关安全设置。
 *
 */
define('IN_DOUCO', true);

require (dirname(__FILE__) . '/init.php');

// 文件保存目录路径
$save_path = ROOT_PATH . 'images/upload/';
// 文件保存目录URL
$save_url = ROOT_URL . 'images/upload/';
// 定义允许上传的文件扩展名
$ext_arr = array (
        'image' => array (
                'gif',
                'jpg',
                'jpeg',
                'png',
                'bmp' 
        ),
        'flash' => array (
                'swf',
                'flv' 
        ),
        'media' => array (
                'swf',
                'flv',
                'mp3',
                'wav',
                'wma',
                'wmv',
                'mid',
                'avi',
                'mpg',
                'asf',
                'rm',
                'rmvb' 
        ),
        'file' => array (
                'doc',
                'docx',
                'xls',
                'xlsx',
                'ppt',
                'htm',
                'html',
                'txt',
                'zip',
                'rar',
                'gz',
                'bz2' 
        ) 
);
// 最大文件大小
$max_size = 2048000;

$save_path = realpath($save_path) . '/';

// PHP上传失败
if (!empty($_FILES['imgFile']['error'])) {
    switch ($_FILES['imgFile']['error']) {
        case '1' :
            $error = '超过php.ini允许的大小。';
            break;
        case '2' :
            $error = '超过表单允许的大小。';
            break;
        case '3' :
            $error = '图片只有部分被上传。';
            break;
        case '4' :
            $error = '请选择图片。';
            break;
        case '6' :
            $error = '找不到临时目录。';
            break;
        case '7' :
            $error = '写文件到硬盘出错。';
            break;
        case '8' :
            $error = 'File upload stopped by extension。';
            break;
        case '999' :
        default :
            $error = '未知错误。';
    }
    alert($error);
}

// 有上传文件时
if (empty($_FILES) === false) {
    // 原文件名
    $file_name = $_FILES['imgFile']['name'];
    // 服务器上临时文件名
    $tmp_name = $_FILES['imgFile']['tmp_name'];
    // 文件大小
    $file_size = $_FILES['imgFile']['size'];
    // 检查文件名
    if (!$file_name) {
        alert("请选择文件。");
    }
    // 检查目录
    if (@is_dir($save_path) === false) {
        alert("上传目录不存在。");
    }
    // 检查目录写权限
    if (@is_writable($save_path) === false) {
        alert("上传目录没有写权限。");
    }
    // 检查是否已上传
    if (@is_uploaded_file($tmp_name) === false) {
        alert("上传失败。");
    }
    // 检查文件大小
    if ($file_size > $max_size) {
        alert("上传文件大小超过限制。");
    }
    // 检查目录名
    $dir_name = empty($_GET['dir']) ? 'image' : trim($_GET['dir']);
    if (empty($ext_arr[$dir_name])) {
        alert("目录名不正确。");
    }
    // 获得文件扩展名
    $temp_arr = explode(".", $file_name);
    $file_ext = array_pop($temp_arr);
    $file_ext = trim($file_ext);
    $file_ext = strtolower($file_ext);
    // 检查扩展名
    if (in_array($file_ext, $ext_arr[$dir_name]) === false) {
        alert("上传文件扩展名是不允许的扩展名。\n只允许" . implode(",", $ext_arr[$dir_name]) . "格式。");
    }
    // 创建文件夹
    if ($dir_name !== '') {
        $save_path .= $dir_name . "/";
        $save_url .= $dir_name . "/";
        if (!file_exists($save_path)) {
            mkdir($save_path);
        }
    }
    $ymd = date("Ymd");
    $save_path .= $ymd . "/";
    $save_url .= $ymd . "/";
    if (!file_exists($save_path)) {
        mkdir($save_path);
    }
    // 新文件名
    $new_file_name = date("YmdHis") . '_' . rand(10000, 99999) . '.' . $file_ext;
    // 移动文件
    $file_path = $save_path . $new_file_name;
    if (move_uploaded_file($tmp_name, $file_path) === false) {
        alert("上传文件失败。");
    }
    @chmod($file_path, 0644);
	// 水印图片位置
	$src_path = "../../../../theme/school/images/water.png";
	// 添加水印
	img_water_mark($file_path,$src_path,$save_path,$new_file_name,5,50);
    $file_url = $save_url . $new_file_name;
    
    header('Content-type: text/html; charset=UTF-8');
    $json = new Services_JSON();
    echo $json->encode(array (
            'error' => 0,
            'url' => $file_url 
    ));
    exit();
}
function alert($msg) {
    header('Content-type: text/html; charset=UTF-8');
    $json = new Services_JSON();
    echo $json->encode(array (
            'error' => 1,
            'message' => $msg 
    ));
    exit();
}
/**
 * 图片加水印（适用于png/jpg/gif格式）
 * 
 * @author flynetcn
 *
 * @param $srcImg 原图片
 * @param $waterImg 水印图片
 * @param $savepath 保存路径
 * @param $savename 保存名字
 * @param $positon 水印位置 
 * 1:顶部居左, 2:顶部居右, 3:居中, 4:底部局左, 5:底部居右 
 * @param $alpha 透明度 -- 0:完全透明, 100:完全不透明
 * 
 * @return 成功 -- 加水印后的新图片地址
 *          失败 -- -1:原文件不存在, -2:水印图片不存在, -3:原文件图像对象建立失败
 *          -4:水印文件图像对象建立失败 -5:加水印后的新图片保存失败
 */
function img_water_mark($srcImg, $waterImg, $savepath=null, $savename=null, $positon=5, $alpha=30)
{
    $temp = pathinfo($srcImg);
    $name = $temp['basename'];
    $path = $temp['dirname'];
    $exte = $temp['extension'];
    $savename = $savename ? $savename : $name;
    $savepath = $savepath ? $savepath : $path;
    $savefile = $savepath .'/'. $savename;
    $srcinfo = @getimagesize($srcImg);
    if (!$srcinfo) {
        return -1; //原文件不存在
    }
    $waterinfo = @getimagesize($waterImg);
    if (!$waterinfo) {
        return -2; //水印图片不存在
    }
    $srcImgObj = image_create_from_ext($srcImg);
    if (!$srcImgObj) {
        return -3; //原文件图像对象建立失败
    }
    $waterImgObj = image_create_from_ext($waterImg);
    if (!$waterImgObj) {
        return -4; //水印文件图像对象建立失败
    }
    switch ($positon) {
    //1顶部居左
    case 1: $x=$y=0; break;
    //2顶部居右
    case 2: $x = $srcinfo[0]-$waterinfo[0]; $y = 0; break;
    //3居中
    case 3: $x = ($srcinfo[0]-$waterinfo[0])/2; $y = ($srcinfo[1]-$waterinfo[1])/2; break;
    //4底部居左
    case 4: $x = 0; $y = $srcinfo[1]-$waterinfo[1]; break;
    //5底部居右
    case 5: $x = $srcinfo[0]-$waterinfo[0]; $y = $srcinfo[1]-$waterinfo[1]; break;
    default: $x=$y=0;
    }
    //imagecopymerge($srcImgObj, $waterImgObj, $x, $y, 0, 0, $waterinfo[0], $waterinfo[1], $alpha);
	imagecopy($srcImgObj, $waterImgObj, $x, $y, 0, 0, $waterinfo[0], $waterinfo[1]);
    switch ($srcinfo[2]) {
    case 1: imagegif($srcImgObj, $savefile); break;
    case 2: imagejpeg($srcImgObj, $savefile); break;
    case 3: imagepng($srcImgObj, $savefile); break;
    default: return -5; //保存失败
    }
    imagedestroy($srcImgObj);
    imagedestroy($waterImgObj);
    return $savefile;
}
 
 
function image_create_from_ext($imgfile)
{
    $info = getimagesize($imgfile);
    $im = null;
    switch ($info[2]) {
    case 1: $im=imagecreatefromgif($imgfile); break;
    case 2: $im=imagecreatefromjpeg($imgfile); break;
    case 3: $im=imagecreatefrompng($imgfile); break;
    }
    return $im;
}
