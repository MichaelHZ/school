<?php
if (!defined('IN_DOUCO')) {
    die('Hacking attempt');
}

require_once(ROOT_PATH . 'include/' . 'common.func.php');
require_once(ROOT_PATH . 'include/' . 'httpdown.class.php');
class Tool
{
     //缩图片自动生成函数，来源支持bmp、gif、jpg、png
    //但生成的小图只用jpg或png格式
    function ImageResize($srcFile, $toW, $toH, $toFile = "")
    {
        global $cfg_photo_type;
        if ($toFile == '') $toFile = $srcFile;
        $info = '';
        $srcInfo = GetImageSize($srcFile, $info);


        switch ($srcInfo[2]) {
            case 1:
                if (!$cfg_photo_type['gif']) return false;
                $im = imagecreatefromgif($srcFile);
                break;
            case 2:
                if (!$cfg_photo_type['jpeg']) return false;
                $im = imagecreatefromjpeg($srcFile);
                break;
            case 3:
                if (!$cfg_photo_type['png']) return false;
                $im = imagecreatefrompng($srcFile);
                break;
            case 6:
                if (!$cfg_photo_type['bmp']) return false;
                $im = imagecreatefromwbmp($srcFile);
                break;
        }


        $srcW = ImageSX($im);
        $srcH = ImageSY($im);
        if ($srcW <= $toW && $srcH <= $toH) return true;
        $toWH = $toW / $toH;
        $srcWH = $srcW / $srcH;
        if ($toWH <= $srcWH) {
            $ftoW = $toW;
            $ftoH = $ftoW * ($srcH / $srcW);
        } else {
            $ftoH = $toH;
            $ftoW = $ftoH * ($srcW / $srcH);
        }
        if ($srcW > $toW || $srcH > $toH) {
            if (function_exists("imagecreatetruecolor")) {
                @$ni = imagecreatetruecolor($ftoW, $ftoH);
                if ($ni) {
                    imagecopyresampled($ni, $im, 0, 0, 0, 0, $ftoW, $ftoH, $srcW, $srcH);
                } else {
                    $ni = imagecreate($ftoW, $ftoH);
                    imagecopyresized($ni, $im, 0, 0, 0, 0, $ftoW, $ftoH, $srcW, $srcH);
                }
            } else {
                $ni = imagecreate($ftoW, $ftoH);
                imagecopyresized($ni, $im, 0, 0, 0, 0, $ftoW, $ftoH, $srcW, $srcH);
            }
            switch ($srcInfo[2]) {
                case 1:
                    imagegif($ni, $toFile);
                    break;
                case 2:
                    imagejpeg($ni, $toFile, 85);
                    break;
                case 3:
                    imagepng($ni, $toFile);
                    break;
                case 6:
                    imagebmp($ni, $toFile);
                    break;
                default:
                    return false;
            }
            imagedestroy($ni);
        }
        imagedestroy($im);
        return true;
    }

    //会对空白地方填充满
    function ImageResizeNew($srcFile, $toW, $toH, $toFile = '', $issave = true)
    {
        global $cfg_photo_type, $cfg_ddimg_bgcolor;
        if ($toFile == '') $toFile = $srcFile;
        $info = '';
        $srcInfo = GetImageSize($srcFile, $info);
        switch ($srcInfo[2]) {
            case 1:
                if (!$cfg_photo_type['gif']) return false;
                $img = imagecreatefromgif($srcFile);
                break;
            case 2:
                if (!$cfg_photo_type['jpeg']) return false;
                $img = imagecreatefromjpeg($srcFile);
                break;
            case 3:
                if (!$cfg_photo_type['png']) return false;
                $img = imagecreatefrompng($srcFile);
                break;
            case 6:
                if (!$cfg_photo_type['bmp']) return false;
                $img = imagecreatefromwbmp($srcFile);
                break;
        }

        $width = imageSX($img);
        $height = imageSY($img);

        if (!$width || !$height) {
            return false;
        }

        $target_width = $toW;
        $target_height = $toH;
        $target_ratio = $target_width / $target_height;

        $img_ratio = $width / $height;

        if ($target_ratio > $img_ratio) {
            $new_height = $target_height;
            $new_width = $img_ratio * $target_height;
        } else {
            $new_height = $target_width / $img_ratio;
            $new_width = $target_width;
        }

        if ($new_height > $target_height) {
            $new_height = $target_height;
        }
        if ($new_width > $target_width) {
            $new_height = $target_width;
        }

        $new_img = ImageCreateTrueColor($target_width, $target_height);

        if ($cfg_ddimg_bgcolor == 0) $bgcolor = ImageColorAllocate($new_img, 0xff, 0xff, 0xff);
        else $bgcolor = 0;

        if (!@imagefilledrectangle($new_img, 0, 0, $target_width - 1, $target_height - 1, $bgcolor)) {
            return false;
        }

        if (!@imagecopyresampled($new_img, $img, ($target_width - $new_width) / 2, ($target_height - $new_height) / 2, 0, 0, $new_width, $new_height, $width, $height)) {
            return false;
        }

        //保存为目标文件
        if ($issave) {
            switch ($srcInfo[2]) {
                case 1:
                    imagegif($new_img, $toFile);
                    break;
                case 2:
                    imagejpeg($new_img, $toFile, 100);
                    break;
                case 3:
                    imagepng($new_img, $toFile);
                    break;
                case 6:
                    imagebmp($new_img, $toFile);
                    break;
                default:
                    return false;
            }
        } //不保存
        else {
            switch ($srcInfo[2]) {
                case 1:
                    imagegif($new_img);
                    break;
                case 2:
                    imagejpeg($new_img);
                    break;
                case 3:
                    imagepng($new_img);
                    break;
                case 6:
                    imagebmp($new_img);
                    break;
                default:
                    return false;
            }
        }
        imagedestroy($new_img);
        imagedestroy($img);
        return true;
    }

    //处理HTML文本
    //删除非站外链接、自动摘要、自动获取缩略图
    function AnalyseHtmlBody($body, &$description, &$litpic, &$keywords, $dtype = '')
    {
        global $cfg_basehost, $cfg_auot_description, $id, $title, $cfg_soft_lang;
        $autokey = $remote = $dellink = $autolitpic = 0;
        $autolitpic = (empty($autolitpic) ? '' : $autolitpic);
        $body = stripslashes($body);

        //远程图片本地化
        if ($remote == 1) {
            $body = self::GetCurContent($body);
        }

        //删除非站内链接
        if (1) {
            $basehost = "http://" . $_SERVER['HTTP_HOST'];
            $body = str_replace($cfg_basehost, '#basehost#', $body);
            $body = str_replace($basehost, '#2basehost2#', $body);
            $body = preg_replace("/(<a[ \t\r\n]{1,}href=[\"']{0,}http:\/\/[^\/]([^>]*)>)|(<\/a>)/isU", "", $body);
            $body = str_replace('#basehost#', $cfg_basehost, $body);
            $body = str_replace('#2basehost2#', $basehost, $body);
        }

        //自动摘要
        if ($description == '') {
            $description = cn_substr(html2text($body), $cfg_auot_description);
            $description = trim(preg_replace('/#p#|#e#/', '', $description));
            $description = addslashes($description);
        }

        //自动获取缩略图
        if ( $litpic == '') {
            $litpic = self::GetDDImgFromBody($body);
        }

        //自动获取关键字
        if ( $keywords == '') {

            $subject = $title;
            $message = $body;
            include_once(ROOT_PATH . 'include/splitword.class.php');
            $keywords = '';
            $sp = new SplitWord($cfg_soft_lang, $cfg_soft_lang);
            $sp->SetSource($subject, $cfg_soft_lang, $cfg_soft_lang);
            $sp->StartAnalysis();
            $titleindexs = preg_replace("/#p#|#e#/", '', $sp->GetFinallyIndex());
            $sp->SetSource(Html2Text($message), $cfg_soft_lang, $cfg_soft_lang);
            $allindexs = preg_replace("/#p#|#e#/", '', $sp->GetFinallyIndex());
            if (is_array($allindexs) && is_array($titleindexs)) {
                foreach ($titleindexs as $k => $v) {
                    if (strlen($keywords . $k) >= 60) {
                        break;
                    } else {
                        $keywords .= $k . ',';
                    }
                }
                foreach ($allindexs as $k => $v) {
                    if (strlen($keywords . $k) >= 60) {
                        break;
                    } else if (!in_array($k, $titleindexs)) {
                        $keywords .= $k . ',';
                    }
                }
            }
            $sp = null;
            $keywords = addslashes($keywords);
        }

        //$body = self::GetFieldValueA($body, $dtype, $id);
        $body = addslashes($body);
        return $body;
    }

    //获得文章body里的外部资源
    function GetCurContent($body)
    {
        global $cfg_multi_site, $cfg_basehost, $cfg_basedir, $cfg_image_dir;



        $cfg_uploaddir = $cfg_image_dir;
        $htd = new HttpDown();

        $basehost = "http://" . $_SERVER["HTTP_HOST"];
        $img_array = array();
        preg_match_all("/src=[\"|'|\s]{0,}(http:\/\/([^>]*)\.(gif|jpg|png))/isU", $body, $img_array);
        $img_array = array_unique($img_array[1]);
        $imgUrl = $cfg_uploaddir . '/' . MyDate("ymd", time());
        $imgPath = $cfg_basedir . $imgUrl;
        if (!is_dir($imgPath . '/')) {
            MkdirAll($imgPath, '0755');
            CloseFtp();
        }
        $milliSecond = MyDate('His', time());
        foreach ($img_array as $key => $value) {
            if (eregi($basehost, $value)) {
                continue;
            }
            if ($cfg_basehost != $basehost && eregi($cfg_basehost, $value)) {
                continue;
            }
            if (!eregi("^http://", $value)) {
                continue;
            }
            $htd->OpenUrl($value);
            $itype = $htd->GetHead("content-type");
            $itype = substr($value, -4, 4);
            if (!eregi("\.(jpg|gif|png)", $itype)) {
                if ($itype == 'image/gif') {
                    $itype = ".gif";
                } else if ($itype == 'image/png') {
                    $itype = ".png";
                } else {
                    $itype = '.jpg';
                }
            }
            $milliSecondN = dd2char($milliSecond . mt_rand(1000, 8000));
            $value = trim($value);
            $rndFileName = $imgPath . '/' . $milliSecondN . '-' . $key . $itype;
            $fileurl = $imgUrl . '/' . $milliSecondN . '-' . $key . $itype;
            $rs = $htd->SaveToBin($rndFileName);
            if ($rs) {
                if ($cfg_multi_site == 'Y') {
                    $fileurl = $cfg_basehost . $fileurl;
                }
                $body = str_replace($value, $fileurl, $body);
                //@WaterImg($rndFileName, 'down');
            }
        }
        $htd->Close();
        return $body;
    }

    //取第一个图片为缩略图
    function GetDDImgFromBody(&$body)
    {
        $litpic = '';
        preg_match_all("/(src)=[\"|'| ]{0,}([^>]*\.(gif|jpg|bmp|png))/isU", $body, $img_array);
        $img_array = array_unique($img_array[2]);
        if (count($img_array) > 0) {
            $picname = preg_replace("/[\"|'| ]{1,}/", '', $img_array[0]);
            if (ereg("_lit\.", $picname)) {
                $litpic = $picname;
            } else {

                $litpic = self::GetDDImage('ddfirst', $picname, 1);
            }
        }
        return $litpic;
    }

    //获得缩略图
    function GetDDImage($litpic, $picname, $isremote)
    {

        global $cfg_ddimg_height, $cfg_ddimg_width, $cfg_basedir, $ddcfg_image_dir, $cfg_addon_savetype, $_USER;
        $ntime = time();
        if (($litpic != 'none' || $litpic != 'ddfirst') &&
            !empty($_FILES[$litpic]['tmp_name']) && is_uploaded_file($_FILES[$litpic]['tmp_name'])
        ) {
            //如果用户自行上传缩略图
            $istype = 0;
            $sparr = Array("image/pjpeg", "image/jpeg", "image/gif", "image/png");
            $_FILES[$litpic]['type'] = strtolower(trim($_FILES[$litpic]['type']));
            if (!in_array($_FILES[$litpic]['type'], $sparr)) {
                ShowMsg("上传的图片格式错误，请使用JPEG、GIF、PNG格式的其中一种！", "-1");
                exit();
            }
            $savepath = $ddcfg_image_dir . '/' . MyDate($cfg_addon_savetype, $ntime);

            CreateDir($savepath);
            $fullUrl = $savepath . '/' . dd2char(MyDate('mdHis', $ntime) . $_USER['use_id'] . mt_rand(1000, 9999));
            if (strtolower($_FILES[$litpic]['type']) == "image/gif") {
                $fullUrl = $fullUrl . ".gif";
            } else if (strtolower($_FILES[$litpic]['type']) == "image/png") {
                $fullUrl = $fullUrl . ".png";
            } else {
                $fullUrl = $fullUrl . ".jpg";
            }

            @move_uploaded_file($_FILES[$litpic]['tmp_name'], $cfg_basedir . $fullUrl);
            $litpic = $fullUrl;

            if ($GLOBALS['cfg_ddimg_full'] == 'Y') @self::ImageResizeNew($cfg_basedir . $fullUrl, $cfg_ddimg_width, $cfg_ddimg_height);
            else @self::ImageResize($cfg_basedir . $fullUrl, $cfg_ddimg_width, $cfg_ddimg_height);

            $img = $cfg_basedir . $litpic;

        } else {

            $picname = trim($picname);
            if ($isremote == 1 && eregi("^http://", $picname)) {
                $litpic = $picname;

                $ddinfos = self::GetRemoteImage($litpic, $_USER['use_id']);

                if (!is_array($ddinfos)) {
                    $litpic = '';
                } else {
                    $litpic = $ddinfos[0];
                    if ($ddinfos[1] > $cfg_ddimg_width || $ddinfos[2] > $cfg_ddimg_height) {
                        if ($GLOBALS['cfg_ddimg_full'] == 'Y') @self::ImageResizeNew($cfg_basedir . $litpic, $cfg_ddimg_width, $cfg_ddimg_height);
                        else @self::ImageResize($cfg_basedir . $litpic, $cfg_ddimg_width, $cfg_ddimg_height);
                    }
                }
            } else {

                if ($litpic == 'ddfirst' && !eregi("^http://", $picname)) {
                    $oldpic = $cfg_basedir . $picname;

                    $litpic = str_replace('.', '-lp.', $picname);

                    if ($GLOBALS['cfg_ddimg_full'] == 'Y'){
                        @self::ImageResizeNew($oldpic, $cfg_ddimg_width, $cfg_ddimg_height, $cfg_basedir . $litpic);
                    }
                    else{
                        @self::ImageResize($oldpic, $cfg_ddimg_width, $cfg_ddimg_height, $cfg_basedir . $litpic);
//
//                        var_dump($litpic);
//                        exit;
                    }
                    if (!is_file($cfg_basedir . $litpic)) $litpic = '';
                } else {
                    $litpic = $picname;
                    return $litpic;
                }
            }
        }
//        if ($litpic == 'litpic' || $litpic == 'ddfirst') {
//            $litpic = '';
//        }
        return $litpic;
    }

    //获取一个远程图片
    function GetRemoteImage($url,$uid=0)
    {
        global $cfg_basedir, $cfg_image_dir, $cfg_addon_savetype;
        $cfg_uploaddir = $cfg_image_dir;
        $revalues = Array();
        $ok = false;
        $htd = new HttpDown();
        $htd->OpenUrl($url);
        $sparr = Array("image/pjpeg", "image/jpeg", "image/gif", "image/png", "image/xpng", "image/wbmp");
        if(!in_array($htd->GetHead("content-type"),$sparr))
        {
            return '';
        }
        else
        {
            $imgUrl = $cfg_uploaddir.'/'.MyDate($cfg_addon_savetype, time());
            $imgPath = $cfg_basedir.$imgUrl;
            CreateDir($imgUrl);
            $itype = $htd->GetHead("content-type");
            if($itype=="image/gif")
            {
                $itype = '.gif';
            }
            else if($itype=="image/png")
            {
                $itype = '.png';
            }
            else if($itype=="image/wbmp")
            {
                $itype = '.bmp';
            }
            else
            {
                $itype = '.jpg';
            }
            $rndname = dd2char($uid.'_'.MyDate('mdHis',time()).mt_rand(1000,9999));
            $rndtrueName = $imgPath.'/'.$rndname.$itype;
            $fileurl = $imgUrl.'/'.$rndname.$itype;
            $ok = $htd->SaveToBin($rndtrueName);
            //@WaterImg($rndtrueName, 'down');
            if($ok)
            {
                $data = GetImageSize($rndtrueName);
                $revalues[0] = $fileurl;
                $revalues[1] = $data[0];
                $revalues[2] = $data[1];
            }
        }
        $htd->Close();
        return ($ok ? $revalues : '');
    }


}