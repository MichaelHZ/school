<?php /* Smarty version 2.6.26, created on 2017-10-01 07:30:52
         compiled from guestbook.dwt */ ?>
﻿<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title><?php echo $this->_tpl_vars['page_title']; ?>
</title>
	<meta name="keywords" content="<?php echo $this->_tpl_vars['keywords']; ?>
" />
	<meta name="description" content="<?php echo $this->_tpl_vars['description']; ?>
" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="blank" />
    <meta name="format-detection" content="telephone=no" /> 
    <meta name="format-detection" content="telephone=no" />    
    <link href="http://www.cssmxx.com/m/theme/school/images/style/reset_css.css" rel="stylesheet" />
	<link href="http://www.cssmxx.com/m/theme/school/images/style/all.css" rel="stylesheet" />   
    <script src="http://www.cssmxx.com/m/theme/school/images/js/jquery.js"></script>
    <script src="http://www.cssmxx.com/m/theme/school/images/js/load.js" defer></script>
</head>
<body>
	<div id="top">
		<h3>留言板</h3>
		<a href="javascript:history.go(-1)" class="top_btn btn_back"></a>
		<a href="/" class="top_btn btn_home"></a>
	</div>
	<!-- top结束 -->
    <div id="topSpaces"></div>
    
    
    

	<div id="banner2">
		<img src="http://www.cssmxx.com/m/theme/school/images/banner2.jpg" alt="图片描述" />
		<p><a href="/">首页</a> &gt; <a href="<?php echo $this->_tpl_vars['cat_root']['url']; ?>
"><?php echo $this->_tpl_vars['cat_root']['cat_name']; ?>
</a> &gt;<a href="<?php echo $this->_tpl_vars['cat_two']['url']; ?>
"><?php echo $this->_tpl_vars['cat_two']['cat_name']; ?>
</a><?php if ($this->_tpl_vars['get_cat']['two'] != $this->_tpl_vars['get_cat']['child'] && $this->_tpl_vars['get_cat']['two'] != $this->_tpl_vars['get_cat']['root']): ?> &gt; <?php echo $this->_tpl_vars['cat_child']['cat_name']; ?>
<?php endif; ?></p>

	</div>
	<!-- banner2结束 -->
    
    
    <div class="main_content">
            
            <div id="LeaveMessage">
                <form action="<?php echo $this->_tpl_vars['insert_url']; ?>
" class="form" method="post">
               <div class="option" style="position:relative;">
                    <span class="icon_user">*</span><div style="position:absolute;font-size:5em;color:red;left:1em;">*</div>
                    <input name="name" type="text" class="text" placeholder="请输入您的称呼" />
                </div>
                <div class="option">
                    <span class="icon_mail"></span>
                    <input name="email" type="text" class="text" placeholder="请输入您的邮箱"/>
                </div>
                <div class="option">
                    <span class="icon_tel"></span>
                    <input name="tel" type="text" class="text" placeholder="请输入您的手机号"/>
                </div>
               <div class="option" style="position:relative;">
                    <span class="icon_yzm">*</span><div style="position:absolute;font-size:5em;color:red;left:1em;">*</div>
                    <input name="captcha" type="text" class="text" placeholder="请输入验证码"/> <img id="vcode" src="<?php echo $this->_tpl_vars['site']['root_url']; ?>
captcha.php" alt="<?php echo $this->_tpl_vars['lang']['captcha']; ?>
" border="1" onClick="refreshimage()" title="<?php echo $this->_tpl_vars['lang']['captcha_refresh']; ?>
" class="pic_yzms" />
                </div>
                <div class="option" style="position:relative;">
                    <span class="icon_write"></span><div style="position:absolute;font-size:5em;color:red;left:1em;">*</div>
                    <textarea name="content" cols="" rows="5" placeholder="请输入留言"></textarea>
                </div>
                 <input type="hidden" name="token" value="<?php echo $this->_tpl_vars['token']; ?>
" />
                 <button class="btn_send"  type="submit">马上咨询</button>
                </form>
            </div>
            <!-- LeaveMessage结束 -->
        
    
    
    </div>
    <!-- .main_content结束 -->


	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- menu结束 -->
    

</body>
</html>