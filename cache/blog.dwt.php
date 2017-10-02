<?php /* Smarty version 2.6.26, created on 2017-09-28 10:55:15
         compiled from blog.dwt */ ?>
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
	<link href="http://www.cssmxx.com/theme/school/images/style/blog.css" rel="stylesheet" />
    <script src="http://www.cssmxx.com/theme/school/images/js/jquery.js"></script>
    <script src="http://www.cssmxx.com/theme/school/images/js/jquery.easing.1.3.js"></script>
    <script src="http://www.cssmxx.com/theme/school/images/js/jquerycookie.js"></script>
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
		<img src="http://www.cssmxx.com/theme/school/images/ad10.jpg" alt="图片描述" />
	</div>
	<!-- banner2结束 -->
    
   
    <h2 class="maintitle"></h2>
    <!--
       <div id="weizi">
       <p> 您现在的位置：<a href="#">首页 </a>&gt; <a href="#">校务公开</a> &gt; 上级通知</p>
    </div>
    -->
    <!-- weizi结束 -->
    
    
    
	<div id="blog_header" style="margin-top:-80px;">
    	<div class="center">
                    <div class="blog_headerpic"><img src="http://www.cssmxx.com/theme/school/images/blog/headerbg.jpg" /></div>
                    <div id="blogLogo">
                        <a href="#" class="photo" >
						<?php if ($this->_tpl_vars['USER']['face']): ?>
                            <img src=" <?php echo $this->_tpl_vars['USER']['face']; ?>
" alt="图片描述" /> 
                        <?php else: ?>
                            <img src="<?php echo $this->_tpl_vars['fragment']['dface']['image']; ?>
" alt="图片描述" />
                          <?php endif; ?>
						</a>
                        <strong><?php echo $this->_tpl_vars['USER']['nick_name']; ?>
老师的博客</strong>
            
                    </div>
                    <!-- blogLogo结束 -->
            
                    <div id="blog_total">
                        <ul>
                            <li style="padding: 0 16px;"><a href="blog_index.php"><span><img src="http://www.cssmxx.com/theme/school/images/blog/icon_home.png"/> </span> 博客首页</a></li>
                             <li style="padding: 0 16px;"><a href="blog_category.php?id=<?php echo $this->_tpl_vars['USER']['user_id']; ?>
"><span><img src="http://www.cssmxx.com/theme/school/images/blog/icon_user.png"/> </span> 个人主页</a></li>
                            <li style="padding: 0 16px;"><ins><?php echo $this->_tpl_vars['article_count']; ?>
</ins> 文章总数</li>
                            <li class="no_bg" style="padding: 0 16px;"><ins><?php echo $this->_tpl_vars['click_count']; ?>
</ins> 文章阅读数</li>
                        </ul>
                    </div>
                    <!-- blog_total结束 -->
            
                    <span class="clear"></span>
                    
                    <div class="weizi">您现在所在的位置:<a href="/">首页</a> &gt;  <a href="blog_index.php">博客</a> &gt; <?php echo $this->_tpl_vars['USER']['nick_name']; ?>
老师的博客</div>
        </div>
	</div>
	<!-- blog_header结束 -->


	<div id="blog_Content">
		<div id="blog_neirong">
        
            <div id="DocContent">
                <h1 class="DocmainTitle"><?php echo $this->_tpl_vars['article']['title']; ?>
</h1>
                <ul class="Doc_value">
                    <li>作者：<?php echo $this->_tpl_vars['USER']['nick_name']; ?>
</li>
                    <li>日期：<?php echo $this->_tpl_vars['article']['add_time']; ?>
</li>
                    <li>栏目：<?php echo $this->_tpl_vars['article']['cat_name']; ?>
</li>
                </ul>
                <div class="content">
                <!-- 文章内容开始 -->
                    <?php echo $this->_tpl_vars['article']['content']; ?>

                 <!-- 文章内容结束 -->
                </div>
                
                
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
                    
                        <a href="#" class="btn_more">更多动态&gt;</a>
                    </div>
                    <!-- Share结束 -->
                
            </div>
            <!-- DocContent结束 -->
			<!-- 畅言评论框 start -->
			<div id="SOHUCS" sid="<?php echo $this->_tpl_vars['article']['id']; ?>
"></div>	
			<!-- 畅言评论框 end -->
           
            <!-- Docpinlun结束 -->
            
		</div>
		<!-- blog_neirong结束 -->

		<div id="blog_sidebar">
			<div id="blog_fenlei">
				<h4 class="SortTitle">栏目 </h4>
				<ul>
					<li <?php if ($this->_tpl_vars['cur_blog_id'] == '-1'): ?>class="change"<?php endif; ?>><a href="blog_category.php?id=<?php echo $this->_tpl_vars['USER']['user_id']; ?>
">全部博文（<?php echo $this->_tpl_vars['article_count']; ?>
）</a></li>
					<?php $_from = $this->_tpl_vars['cate_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
					<li <?php if ($this->_tpl_vars['cur_blog_id'] == $this->_tpl_vars['row']['blog_id']): ?>class="change"<?php endif; ?>><a href="blog_category.php?id=<?php echo $this->_tpl_vars['USER']['user_id']; ?>
&blog_id=<?php echo $this->_tpl_vars['row']['blog_id']; ?>
"><?php echo $this->_tpl_vars['row']['cat_name']; ?>
（<?php echo $this->_tpl_vars['row']['article_count']; ?>
）</a></li>
					<?php endforeach; endif; unset($_from); ?>
				</ul>
			</div>
			<!-- blog_fenlei结束 -->

			<div id="friend">
					<h4 class="SortTitle">同系老师 </h4>
					<ul class="friendlist">
						 <?php $_from = $this->_tpl_vars['teachers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['teacher']):
?>
							<li><a href="/blog_category.php?id=<?php echo $this->_tpl_vars['teacher']['user_id']; ?>
">
							<?php if ($this->_tpl_vars['teacher']['face']): ?>
                            <img src=" <?php echo $this->_tpl_vars['teacher']['face']; ?>
" alt="图片描述" /> 
							<?php else: ?>
                            <img src="<?php echo $this->_tpl_vars['fragment']['dface']['image']; ?>
" alt="图片描述" />
                          <?php endif; ?>
							</a></li>
						 <?php endforeach; endif; unset($_from); ?>
					</ul>
					<span class="clear"></span>

			</div>
			<!-- friend结束 -->

			<div id="DocRanking">
				<h4 class="SortTitle">个人排行 </h4>
				<ol class="rankinglist">
				     <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
					<li><span><?php echo $this->_tpl_vars['article']['click']; ?>
</span> <a href="<?php echo $this->_tpl_vars['article']['url']; ?>
"><?php echo $this->_tpl_vars['article']['title']; ?>
</a></li>
					 <?php endforeach; endif; unset($_from); ?>
				
				
				</ol>
			</div>
			<!-- DocRanking结束 -->

		</div>
		<!-- blog_sidebar结束 -->

		<span class="clear"></span>
        <span class="icon_hua"></span>
        <span class="icon_hua2"></span>
	</div>
	<!-- blog_Content结束 -->


	<span class="container_bg"></span>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
		
		<script charset="utf-8" type="text/javascript" src="https://changyan.sohu.com/upload/changyan.js" ></script>
		<script type="text/javascript">
			window.changyan.api.config({
			appid: \'cysUEb6tU\',
			conf: \'prod_9546aefae1f16aad68200c218fdd89e4\'
			});
		</script>
		
'; ?>


</body>
</html>










