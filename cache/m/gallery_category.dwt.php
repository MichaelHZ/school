<?php /* Smarty version 2.6.26, created on 2017-09-29 07:18:51
         compiled from gallery_category.dwt */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'gallery_category.dwt', 56, false),)), $this); ?>
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
    <!-- navmenu结束 -->
    <div id="navmenu_zz"></div>
    

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

	<div id="NewsList">
	         <?php $_from = $this->_tpl_vars['gallery_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['gallery_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['gallery_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['gallery']):
        $this->_foreach['gallery_list']['iteration']++;
?>
			<div class="docs">
            	<a href="<?php echo $this->_tpl_vars['gallery']['url']; ?>
">
                        <div class="photo">
                             <?php if ($this->_tpl_vars['gallery']['image']): ?>
                             <img src="<?php echo $this->_tpl_vars['gallery']['image']; ?>
" alt="图片描述" />
                             <?php else: ?>
                             <img src="<?php echo $this->_tpl_vars['fragment']['none']['image']; ?>
" alt="图片描述" />
                             <?php endif; ?>
                        </div>
                        <h5><?php echo $this->_tpl_vars['gallery']['title']; ?>
</h5>
                        <time><?php echo $this->_tpl_vars['gallery']['add_time']; ?>
</time><em> <?php echo $this->_tpl_vars['gallery']['source']; ?>
</em>
                        <p><?php echo ((is_array($_tmp=$this->_tpl_vars['gallery']['description'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 38, "...") : smarty_modifier_truncate($_tmp, 38, "...")); ?>
 </p>
                </a>
			</div>
			<?php endforeach; endif; unset($_from); ?>
	</div>
	<!-- NewsList结束 -->
    
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- menu结束 -->
</body>
</html>