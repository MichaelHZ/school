<?php /* Smarty version 2.6.26, created on 2017-09-28 16:31:56
         compiled from guestbook.dwt */ ?>
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
		<img src="http://www.cssmxx.com/theme/school/images/ad1.jpg" alt="图片描述" />
	</div>
	<!-- banner2结束 -->
    
    
    <h2 class="maintitle"></h2>
                  <div id="weizi">
                       <p><span> 您现在的位置：</span><a href="/">首页</a> &gt; <a href="<?php echo $this->_tpl_vars['cat_root']['url']; ?>
"><?php echo $this->_tpl_vars['cat_root']['cat_name']; ?>
</a> &gt;<a href="/guestbook.php?cat_id=69"><?php echo $this->_tpl_vars['cat_two']['cat_name']; ?>
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
						<li <?php if ($this->_tpl_vars['get_cat']['two'] == $this->_tpl_vars['left_nav']['cat_id']): ?>class="change"<?php endif; ?>><a href="<?php if ($this->_tpl_vars['left_nav']['child'] == ''): ?><?php echo $this->_tpl_vars['left_nav']['url']; ?>
<?php else: ?>#<?php endif; ?>" target="_blank"><?php echo $this->_tpl_vars['left_nav']['cat_name']; ?>
</a>
						      <?php if ($this->_tpl_vars['left_nav']['child']): ?>
                                <ol>
                                    <?php $_from = $this->_tpl_vars['left_nav']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child']):
?>
                                    <li <?php if ($this->_tpl_vars['child']['cur']): ?>class="hovers"<?php endif; ?> ><a href="<?php if ($this->_tpl_vars['child']['custom_url']): ?><?php echo $this->_tpl_vars['child']['custom_url']; ?>
?cat_id=<?php echo $this->_tpl_vars['child']['cat_id']; ?>
<?php else: ?><?php echo $this->_tpl_vars['child']['url']; ?>
<?php endif; ?>" target="_blank"><?php echo $this->_tpl_vars['child']['cat_name']; ?>
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
             

                <div id="LeaveMessage">
                
                        <h3> 在线留言 <span>/ Online booking</span></h3>
                        <p>注：我们的负责老师会在三个工作日内给你答复，请勿重复提交问题，谢谢！</p>
                        <form action="<?php echo $this->_tpl_vars['insert_url']; ?>
" class="form" method="post">
                            <ul>
                                <li><input name="name" type="text" class="text" id="m_name_"/></li>
                                <li><input name="email" type="text" class="text" id="m_mail_" /></li>
                                <li><input name="tel" type="text" class="text" id="m_tel_" /></li>
                                <li><input name="qq" type="text" class="text" id="m_qq_" /></li>
                            </ul>
                            <span class="clear"></span>
                             <textarea name="content" cols="90" rows="5" class="textArea" /></textarea>
                             <input type="hidden" name="token" value="<?php echo $this->_tpl_vars['token']; ?>
" />
                            <button class="btn_send" type="submit">提交</button>
                            <div class="yzm">
                               
                                <input type="text" name="captcha" class="yzmtext" size="10">
                                <img id="vcode" src="<?php echo $this->_tpl_vars['site']['root_url']; ?>
captcha.php" alt="<?php echo $this->_tpl_vars['lang']['captcha']; ?>
" border="1" onClick="refreshimage()" title="<?php echo $this->_tpl_vars['lang']['captcha_refresh']; ?>
">
       <p id="captcha" class="cue"></p>
                            </div>
                            
                        </form>
            
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