<?php /* Smarty version 2.6.26, created on 2017-11-06 20:53:42
         compiled from article.dwt */ ?>
﻿<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="keywords" content="<?php echo $this->_tpl_vars['keywords']; ?>
"/>
	<meta name="description" content="<?php echo $this->_tpl_vars['description']; ?>
"/>
	<title><?php echo $this->_tpl_vars['page_title']; ?>
</title>
	<link href="http://www.bc.com/m/theme/baoci/images/style/reset_css.css" rel="stylesheet" />
	<link href="http://www.bc.com/m/theme/baoci/images/style/all.css" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="blank" />
	<meta name="format-detection" content="telephone=no" />
	
	
	

</head>
<body>
	<section id="docContent">
		<header class="docHeader"> 
        		<h1><?php echo $this->_tpl_vars['article']['title']; ?>
</h1>
                <div class="values">
                    <time><?php echo $this->_tpl_vars['article']['add_time']; ?>
 </time> <span><?php echo $this->_tpl_vars['userList'][$this->_tpl_vars['article']['user_id']]; ?>
 </span> <a href="/">常熟市报慈小学 </a>
                </div>
		</header> 
        <div class="content_">
            <?php echo $this->_tpl_vars['article']['content']; ?>

		</div>
        
        <div class="tongji"><span>阅读<ins><?php echo $this->_tpl_vars['article']['click']; ?>
</ins></span>  <!--<span><i class="icon_zan"></i> <ins>5</ins></span>--> </div>
	</section>
	<!-- docContent结束 -->

	<script src="http://www.bc.com/m/theme/baoci/images/js/jquery.js"></script>
	<script src="http://www.bc.com/m/theme/baoci/images/js/load.js"></script>
</body>
</html>