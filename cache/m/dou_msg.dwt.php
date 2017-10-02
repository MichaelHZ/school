<?php /* Smarty version 2.6.26, created on 2017-09-28 10:59:42
         compiled from dou_msg.dwt */ ?>
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
    <script src="http://www.cssmxx.com/m/theme/school/images/js/iscroll.js"></script>
    <script src="http://www.cssmxx.com/m/theme/school/images/js/load.js" defer></script>
    <script>var cat_id = <?php echo $this->_tpl_vars['cat_id']; ?>
;page = 1;</script>
</head>
<body>
	<div id="top">
		<h3>信息提示</h3>
		<a href="#" class="top_btn btn_menu"></a>
		<a href="/" class="top_btn btn_home"></a>
	</div>
	<!-- top结束 -->
    <div id="topSpaces"></div>
    
    
    

	<div id="banner2">
		<img src="http://www.cssmxx.com/m/theme/school/images/banner2.jpg" alt="图片描述" />
		<p><a href="#">首页</a> &gt; <a href="#">学生</a> &gt; 石梅之星</p>

	</div>
	<!-- banner2结束 -->
    
    <div class="main_content">
    
            
                      
            <div id="Success">
			    <!--
                <h4><span></span>留言成功</h4>
				-->
                <p><div id="douMsg" class="wrap">
						<dl>
						<dt><?php echo $this->_tpl_vars['text']; ?>
</dt>
						<dd><?php echo $this->_tpl_vars['cue']; ?>
<a href="<?php if ($this->_tpl_vars['url']): ?><?php echo $this->_tpl_vars['url']; ?>
<?php else: ?>javascript:history.go(-1);<?php endif; ?>"><?php echo $this->_tpl_vars['lang']['dou_msg_back']; ?>
</a></dd>
						</dl>
						</div>
				</p>
        
            </div>
            <!-- Success结束 -->
    
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