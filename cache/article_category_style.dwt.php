<?php /* Smarty version 2.6.26, created on 2017-09-28 14:03:03
         compiled from article_category_style.dwt */ ?>
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
    <script type="text/javascript" src="http://www.cssmxx.com/theme/school/images/js/global.js"></script>
    
    
	<!--[if IE]>
	<script src="http://www.cssmxx.com/theme/school/images/js/html5.js"></script>
	<![endif]-->
</head>
<body>
	 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/header2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- header2结束 -->
	<div id="banner2">
		<img src="<?php echo $this->_tpl_vars['banner_info']['banner']; ?>
" alt="图片描述" />
	</div>
	<!-- banner2结束 -->
    
    
    <h2 class="maintitle"><?php echo $this->_tpl_vars['banner_info']['words']; ?>
 </h2>
                  <div id="weizi">
                        <p><span> 您现在的位置：</span><a href="/">首页</a> &gt; <a href="<?php echo $this->_tpl_vars['cat_root']['url']; ?>
"><?php echo $this->_tpl_vars['cat_root']['cat_name']; ?>
</a> <?php if ($this->_tpl_vars['get_cat']['two'] != $this->_tpl_vars['get_cat']['root']): ?>&gt;<a href="<?php echo $this->_tpl_vars['cat_two']['url']; ?>
"><?php echo $this->_tpl_vars['cat_two']['cat_name']; ?>
</a><?php if ($this->_tpl_vars['get_cat']['two'] != $this->_tpl_vars['get_cat']['child'] && $this->_tpl_vars['get_cat']['two'] != $this->_tpl_vars['get_cat']['root']): ?> &gt; <?php echo $this->_tpl_vars['cat_child']['cat_name']; ?>
<?php endif; ?><?php endif; ?></p>
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
						<li <?php if ($this->_tpl_vars['get_cat']['two'] == $this->_tpl_vars['left_nav']['cat_id']): ?>class="change"<?php endif; ?>><a href="<?php if ($this->_tpl_vars['left_nav']['child'] == ''): ?><?php echo $this->_tpl_vars['left_nav']['url']; ?>
<?php else: ?>#<?php endif; ?>" ><?php echo $this->_tpl_vars['left_nav']['cat_name']; ?>
</a>
						      <?php if ($this->_tpl_vars['left_nav']['child']): ?>
                                <ol>
                                    <?php $_from = $this->_tpl_vars['left_nav']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child']):
?>
                                    <li <?php if ($this->_tpl_vars['child']['cur']): ?>class="hovers"<?php endif; ?> ><a href="<?php if ($this->_tpl_vars['child']['custom_url']): ?><?php echo $this->_tpl_vars['child']['custom_url']; ?>
?cat_id=<?php echo $this->_tpl_vars['child']['cat_id']; ?>
<?php else: ?><?php echo $this->_tpl_vars['child']['url']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['child']['cat_name']; ?>
</a></li>
                                    <?php if ($this->_tpl_vars['child']['cur']): ?>
                                   
                                    <?php endif; ?>
                                	<?php endforeach; endif; unset($_from); ?>
                                </ol>  
                                <?php endif; ?>                      
                        </li>
                        <?php endforeach; endif; unset($_from); ?>
                       
					</ul>
			
                    <span class="topbg"></span>
                    <span class="bompic"><img src="http://www.cssmxx.com/theme/school/images/nav_bom1.png"></span>

		</aside>
		<!-- sidebar结束 -->	

		<article id="neirong">
 			<div id="TeacherList">
							<ul class="TeacherList">
							                <?php $_from = $this->_tpl_vars['article_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['article_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['article_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['article']):
        $this->_foreach['article_list']['iteration']++;
?> 
                                            <li>
                                            <a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" class="photo" target="_blank">
                                            
                                           <?php if ($this->_tpl_vars['article']['image']): ?>
                                				<img src="<?php echo $this->_tpl_vars['article']['image']; ?>
" alt="图片描述" />
                                			<?php else: ?>
                                			     <img src="<?php echo $this->_tpl_vars['fragment']['none']['image']; ?>
" alt="图片描述" />
                                 			<?php endif; ?>
                                            </a>
                                            <div class="txt">
                                                <strong><?php echo $this->_tpl_vars['article']['title']; ?>
</strong><em> <?php echo $this->_tpl_vars['article']['description']; ?>
</em>
                                            </div>
                                            
                                            </li>
                                             <?php endforeach; endif; unset($_from); ?> 
                                            

								</ul>
                            
                            <span class="clear"></span>
							<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/pager.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</div>
			<!-- TeacherList结束 -->

		</article>
		<!-- neirong结束 -->

		<span class="clear"></span>
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







