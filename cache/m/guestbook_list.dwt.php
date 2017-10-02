<?php /* Smarty version 2.6.26, created on 2017-09-28 13:49:45
         compiled from guestbook_list.dwt */ ?>
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
    <script src="http://www.cssmxx.com/m/theme/school/images/js/easyscroll.js"></script>
    <script src="http://www.cssmxx.com/m/theme/school/images/js/pullToRefresh.min.js"></script>
    <script src="http://www.cssmxx.com/m/theme/school/images/js/iscroll.js"></script>
    <script src="http://www.cssmxx.com/m/theme/school/images/js/load.js" defer></script>
    <script>var page = 1;</script>
</head>
<body>
	<div id="top">
		<h3>留言板</h3>
		<a href="guestbook.php?cat_id=70" class="top_btn btn_write"></a>
		<a href="/" class="top_btn btn_home"></a>
	</div>
	<!-- top结束 -->
    <div id="topSpaces"></div>
    
    
    

	<div id="banner2">
		<img src="http://www.cssmxx.com/m/theme/school/images/banner2.jpg" alt="图片描述" />
		<p><a href="/">首页</a> &gt; <a href="<?php echo $this->_tpl_vars['cat_root']['url']; ?>
"><?php echo $this->_tpl_vars['cat_root']['cat_name']; ?>
</a><?php if ($this->_tpl_vars['get_cat']['two'] != $this->_tpl_vars['get_cat']['root']): ?>  &gt;<a href="<?php echo $this->_tpl_vars['cat_two']['url']; ?>
"><?php echo $this->_tpl_vars['cat_two']['cat_name']; ?>
</a><?php if ($this->_tpl_vars['get_cat']['two'] != $this->_tpl_vars['get_cat']['child'] && $this->_tpl_vars['get_cat']['two'] != $this->_tpl_vars['get_cat']['root']): ?> &gt; <?php echo $this->_tpl_vars['cat_child']['cat_name']; ?>
<?php endif; ?><?php endif; ?></p>

	</div>
	<!-- banner2结束 -->
	<div id="MessageList">
    
    
           <?php $_from = $this->_tpl_vars['guestbook']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['guestbook']):
?>
    		<div class="problembox">
            
                    <div class="problem">
                        <h5><?php echo $this->_tpl_vars['guestbook']['name']; ?>
 </h5>
                        <p><?php echo $this->_tpl_vars['guestbook']['content']; ?>
</p>
                        <time> <?php echo $this->_tpl_vars['guestbook']['add_time']; ?>
</time>
                    
                    </div>
                    
                     <?php if ($this->_tpl_vars['guestbook']['reply']): ?>
                    <div class="huifu">
                        <span>校长回复 </span>
                        <p>  <?php echo $this->_tpl_vars['guestbook']['reply']; ?>
</p>
                    </div>
					 <?php endif; ?>
            
            </div>
            <?php endforeach; endif; unset($_from); ?> 
            <!-- .problembox结束 -->
            
            
    	
            
            
    
	</div>
	<!-- MessageList结束 -->


	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- menu结束 -->
    




</body>
</html>