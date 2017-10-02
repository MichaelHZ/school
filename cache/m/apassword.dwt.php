<?php /* Smarty version 2.6.26, created on 2017-09-29 00:48:16
         compiled from apassword.dwt */ ?>
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
    <link href="http://www.cssmxx.com/m/theme/school/images/style/reset_css.css" rel="stylesheet" />
	<link href="http://www.cssmxx.com/m/theme/school/images/style/all.css" rel="stylesheet" />   
    <script src="http://www.cssmxx.com/m/theme/school/images/js/jquery.js"></script>
	<script src="http://www.cssmxx.com/m/theme/school/images/js/easyscroll.js"></script>
	<script src="http://www.cssmxx.com/m/theme/school/images/js/pullToRefresh.min.js"></script>
	<script src="http://www.cssmxx.com/m/theme/school/images/js/jquery.enplaceholder.js"></script>
	<script src="http://www.cssmxx.com/m/theme/school/images/js/apassword.js"></script>
    <script src="http://www.cssmxx.com/m/theme/school/images/js/load.js" defer></script>
</head>
<body>
	<div id="top">
		<h3><?php echo $this->_tpl_vars['cat_root']['cat_name']; ?>
</h3>
		<a href="#" class="top_btn btn_menu"></a>
		<a href="/" class="top_btn btn_home"></a>
	</div>
	
	<!-- top结束 -->
    <div id="topSpaces"></div>
    
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/navmenu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div id="navmenu_zz"></div>
    <div class="main_content">
                
                <div id="DocContent">
                    <h1 class="doc_title"><?php echo $this->_tpl_vars['article']['title']; ?>
</h1>
                    <span class="doc_value"><time><?php echo $this->_tpl_vars['article']['add_time']; ?>
</time> <a href="<?php echo $this->_tpl_vars['article']['custom_url']; ?>
"><?php echo $this->_tpl_vars['article']['source']; ?>
</a></span>
                    <div class="content">
                    <!-- 文章内容开始 -->
                    <?php echo $this->_tpl_vars['article']['content']; ?>

                    <!-- 文章内容结束 -->
                    </div>
            		<ins class="read_sl">阅读数：<?php echo $this->_tpl_vars['article']['click']; ?>
</ins>
                </div>
                <!-- DocContent结束 -->
    </div>
    <!-- .main_content结束 -->
    
    
    
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- menu结束 -->
     
    <div id="boke_pw">
            <form action="" class="form" method="post">
                <input name="password" id="password" type="password" class="password" placeholder="请输入访问密码" />
				<input name="blog_id" type="hidden" value="<?php echo $this->_tpl_vars['cur_blog_id']; ?>
" id="blog_id">
                 <button class="btn_send"  id="submit">查看</button>
            </form>    
    </div>
    <!-- boke_pw结束 -->
    <div id="boke_pw_zz"></div>
</body>
</html>