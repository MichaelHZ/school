<?php /* Smarty version 2.6.26, created on 2017-11-06 22:04:53
         compiled from research_list.dwt */ ?>
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
	<div id="banner2">
		<img src="http://www.bc.com/m/theme/baoci/images/banner2.jpg" alt="description " />
	</div>
	<!-- banner2结束 -->
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/navmenu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- menu结束 -->
	<!-- menu结束 -->
	<div id="menu_zz"></div>
	<div id="Location">
		所在位置：<a href="/">学校首页  </a>&gt;  <a
				href="<?php echo $this->_tpl_vars['cat_root']['url']; ?>
"><?php echo $this->_tpl_vars['cat_root']['cat_name']; ?>
</a><?php if ($this->_tpl_vars['get_cat']['two'] != $this->_tpl_vars['get_cat']['root']): ?> &gt;<a
		href="<?php echo $this->_tpl_vars['cat_two']['url']; ?>
"><?php echo $this->_tpl_vars['cat_two']['cat_name']; ?>
</a><?php if ($this->_tpl_vars['get_cat']['two'] != $this->_tpl_vars['get_cat']['child'] && $this->_tpl_vars['get_cat']['two'] != $this->_tpl_vars['get_cat']['root']): ?> &gt; <?php echo $this->_tpl_vars['cat_child']['cat_name']; ?>
<?php endif; ?><?php endif; ?>
	</div>
	<!-- Location结束 -->
	
	
	<section id="Project">


		<div class="pagenav" style="display: none">
			<?php $_from = $this->_tpl_vars['pager']['cur_paper']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
			<a href="<?php echo $this->_tpl_vars['v']['url']; ?>
"><?php echo $this->_tpl_vars['v']['index']; ?>
</a>
			<?php endforeach; endif; unset($_from); ?>
		</div>
			<a href="javascript:void(0)" class="btn_more">更多 </a>
		
	</section>
	<!-- Project结束 -->

	<script src="http://www.bc.com/m/theme/baoci/images/js/jquery.js"></script>
	<script src="http://www.bc.com/m/theme/baoci/images/js/load.js"></script>
</body>
</html>