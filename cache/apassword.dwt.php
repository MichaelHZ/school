<?php /* Smarty version 2.6.26, created on 2017-09-28 11:06:30
         compiled from apassword.dwt */ ?>
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
	<script src="http://www.cssmxx.com/theme/school/images/js/jquery.enplaceholder.js"></script>
	<script src="http://www.cssmxx.com/theme/school/images/js/apassword.js"></script>
    <script src="http://www.cssmxx.com/theme/school/images/js/load.js"></script>
    
    
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
</a> &gt;<a href="<?php echo $this->_tpl_vars['cat_two']['url']; ?>
"><?php echo $this->_tpl_vars['cat_two']['cat_name']; ?>
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
<?php else: ?>#<?php endif; ?>"><?php echo $this->_tpl_vars['left_nav']['cat_name']; ?>
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
                    <div id="DocContent">
                        <h1 class="doc_title"><?php echo $this->_tpl_vars['article']['title']; ?>
</h1>
                        <ul class="doc_value">
                            <li><?php echo $this->_tpl_vars['lang']['add_time']; ?>
：<?php echo $this->_tpl_vars['article']['add_time']; ?>
</li>
                            <li>来源：<?php echo $this->_tpl_vars['article']['source']; ?>
</li>
                            <li><?php echo $this->_tpl_vars['lang']['click']; ?>
：<?php echo $this->_tpl_vars['article']['click']; ?>
 </li>
                        </ul>
                        <div class="content">
                        <!-- 文章内容开始 -->
                        <?php echo $this->_tpl_vars['article']['content']; ?>

                        <!-- 文章内容结束 -->
                        </div>
                
                    </div>
                    <!-- DocContent结束 -->
                
                    <div id="PrevNext">
                    <p><?php echo $this->_tpl_vars['lang']['article_previous']; ?>
：<?php if ($this->_tpl_vars['lift']['previous']): ?><a href="<?php echo $this->_tpl_vars['lift']['previous']['url']; ?>
"><?php echo $this->_tpl_vars['lift']['previous']['title']; ?>
</a><?php else: ?>没有了<?php endif; ?></p>
                    <p><?php echo $this->_tpl_vars['lang']['article_next']; ?>
：<?php if ($this->_tpl_vars['lift']['next']): ?><a href="<?php echo $this->_tpl_vars['lift']['next']['url']; ?>
"><?php echo $this->_tpl_vars['lift']['next']['title']; ?>
</a><?php else: ?>没有了<?php endif; ?></p>
                
                    </div>
                    <!-- PrevNext结束 -->
                
                    <div id="Share">
                                <!-- Baidu Button BEGIN -->
                                <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
                                <span class="bds_more">分享到：</span>
                                <a class="bds_qzone"></a>
                                <a class="bds_tsina"></a>
                                <a class="bds_tqq"></a>
                                <a class="bds_renren"></a>
                                <a class="bds_t163"></a>
                                <a class="shareCount"></a>
                                </div>
                                <script type="text/javascript" id="bdshare_js" data="type=tools&uid=627946" ></script>
                                <script type="text/javascript" id="bdshell_js"></script>
                                <script type="text/javascript">
                                document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
                                </script>
                                <!-- Baidu Button END -->                    
                    
                        <a href="<?php echo $this->_tpl_vars['cat_two']['url']; ?>
" class="btn_more">更多动态&gt;</a>
                    </div>
                    <!-- Share结束 -->
                
             
             
             
             
                
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
	<div id="boke_pw" >
            <form action="" class="form" method="post">
                <input name="password" type="password" class="password" placeholder="请输入访问密码" id="password"/>
				 <input name="blog_id" type="hidden" value="<?php echo $this->_tpl_vars['cur_blog_id']; ?>
" id="blog_id">
                 <button class="btn_send"  type="submit" id="submit">查看</button>
            </form>    
    </div>
    <!-- boke_pw结束 -->
<div id="boke_pw_zz"></div>
<?php echo '

'; ?>


</body>
</html>