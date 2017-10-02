<?php /* Smarty version 2.6.26, created on 2017-09-28 13:01:35
         compiled from dou_msg.dwt */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title><?php echo $this->_tpl_vars['page_title']; ?>
</title>
	<meta name="keywords" content="<?php echo $this->_tpl_vars['keywords']; ?>
" />
	<meta name="description" content="<?php echo $this->_tpl_vars['description']; ?>
" />
	<link href="http://www.cssmxx.com/theme/school/images/style/reset_css.css" rel="stylesheet" />
	<link href="http://www.cssmxx.com/theme/school/images/style/all.css" rel="stylesheet" />
    <script src="http://www.cssmxx.com/theme/school/images/js/jquery.js"></script>
    <script src="http://www.cssmxx.com/theme/school/images/js/jquery.easing.1.3.js"></script>
    <script src="http://www.cssmxx.com/theme/school/images/js/jquerycookie.js"></script>
    <script src="http://www.cssmxx.com/theme/school/images/js/load.js"></script>
    
    
	<!--[if IE]>
	<script src="http://www.cssmxx.com/theme/school/images/js/html5.js"></script>
	<![endif]-->
	<?php if (! $this->_tpl_vars['url']): ?>
<script type="text/javascript">
<?php echo '
function go() {
    window.history.go( - 1);
}
setTimeout("go()", 3000);
'; ?>

</script>
<?php endif; ?>
</head>
<body>
	 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/header2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- header2结束 -->
	<div id="banner2">
		<img src="http://www.cssmxx.com/theme/school/images/ad2.jpg" alt="图片描述" />
	</div>
	<!-- banner2结束 -->
    
    
    <h2 class="maintitle">润泽生命 开启智慧 以人育人 共同成长 </h2>
                    <div id="weizi">
                      <p><span> 您现在的位置：</span><a href="/">首页 </a>&gt; <a href="#"><?php echo $this->_tpl_vars['cat_two']['cat_name']; ?>
</a><?php if ($this->_tpl_vars['get_cat']['two'] != $this->_tpl_vars['get_cat']['child'] && $this->_tpl_vars['get_cat']['two'] != $this->_tpl_vars['get_cat']['root']): ?> &gt; <?php echo $this->_tpl_vars['cat_child']['cat_name']; ?>
<?php endif; ?></p>
                    </div>
                    <!-- weizi结束 -->
    
	<div id="container">
		<aside id="sidebar">
					<?php $_from = $this->_tpl_vars['article_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['left_nav']):
?>
		            <?php if ($this->_tpl_vars['get_cat']['two'] == $this->_tpl_vars['left_nav']['cat_id']): ?>
					<h3 class="SideTitle"><span><?php echo $this->_tpl_vars['left_nav']['unique_id']; ?>
</span><strong><?php echo $this->_tpl_vars['left_nav']['cat_name']; ?>
 </strong></h3>
					<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
					<ul class="NavList">
					<?php $_from = $this->_tpl_vars['article_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['left_nav']):
?>
					<?php if ($this->_tpl_vars['left_nav']['child']): ?>
		            <?php if ($this->_tpl_vars['get_cat']['two'] == $this->_tpl_vars['left_nav']['cat_id']): ?>
		                <?php $_from = $this->_tpl_vars['left_nav']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child']):
?>
						<li <?php if ($this->_tpl_vars['get_cat']['child'] == $this->_tpl_vars['child']['cat_id']): ?>class="change"<?php endif; ?>><a href="<?php if ($this->_tpl_vars['child']['custom_url']): ?><?php echo $this->_tpl_vars['child']['custom_url']; ?>
<?php else: ?><?php echo $this->_tpl_vars['child']['url']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['child']['cat_name']; ?>
</a></li>
						<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
					<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
					</ul>
                    
                    
                    
                    <span class="topbg"></span>
                    <span class="bompic"><img src="http://www.cssmxx.com/theme/school/images/nav_bom1.png"></span>

		</aside>
		<!-- sidebar结束 -->

	
             

                <div id="LeaveMessage">
                
                      <div id="douMsg" class="wrap">
						<dl>
						<dt><?php echo $this->_tpl_vars['text']; ?>
</dt>
						<dd><?php echo $this->_tpl_vars['cue']; ?>
<a href="<?php if ($this->_tpl_vars['url']): ?><?php echo $this->_tpl_vars['url']; ?>
<?php else: ?>javascript:history.go(-1);<?php endif; ?>"><?php echo $this->_tpl_vars['lang']['dou_msg_back']; ?>
</a></dd>
						</dl>
						</div>
            
                </div>
                <!-- LeaveMessage结束 -->
                         
                         
    
		<span class="clear"></span>
		<!-- 清除浮动 -->
        <span class="icon_hua"></span>
        <span class="icon_hua2"></span>
	</div>
	<!-- container结束 -->

	<span class="container_bg"></span>


	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</body>
</html>