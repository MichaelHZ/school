<?php /* Smarty version 2.6.26, created on 2017-09-28 10:09:36
         compiled from blog_category.dwt */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'blog_category.dwt', 79, false),)), $this); ?>
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
   
    <h2 class="maintitle"> </h2>
   
    
    
    
	<div id="blog_header" style="margin-top:-80px;">
    	<div class="center">
                    <div class="blog_headerpic"><img src="http://www.cssmxx.com/theme/school/images/blog/headerbg.jpg" /></div>
                    <div id="blogLogo">
                        <a href="#" class="photo" target="_blank">
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
                            <li style="padding: 0 16px;"><a href="blog_index.php" target="_blank"><span><img src="http://www.cssmxx.com/theme/school/images/blog/icon_home.png"/> </span> 博客首页</a></li>
                            <li style="padding: 0 16px;"><a href="blog_category.php?id=<?php echo $this->_tpl_vars['USER']['user_id']; ?>
" target="_blank"><span><img src="http://www.cssmxx.com/theme/school/images/blog/icon_user.png"/> </span> 个人主页</a></li>
                            <li style="padding: 0 16px;"><ins><?php echo $this->_tpl_vars['article_count']; ?>
</ins> 文章总数</li>
                            <li class="no_bg" style="padding: 0 16px;"><ins><?php echo $this->_tpl_vars['click_count']; ?>
</ins> 文章阅读数</li>
                        </ul>
                    </div>
                    <!-- blog_total结束 -->
            
                    <span class="clear"></span>
                    
                    <div class="weizi">您现在所在的位置:<a href="/" >首页</a> &gt;  <a href="blog_index.php">博客</a> &gt; <?php echo $this->_tpl_vars['USER']['nick_name']; ?>
老师的博客</div>
        </div>
	</div>
	<!-- blog_header结束 -->

	<div id="blog_Content">
		<div id="blog_neirong">
            <?php $_from = $this->_tpl_vars['article_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
			<div class="Docs2">
                        <h5> <a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['article']['title']; ?>
 </a></h5>
                        <ul>
                            <li>作者：<?php echo $this->_tpl_vars['USER']['nick_name']; ?>
</li>
                            <li>日期：<?php echo $this->_tpl_vars['article']['add_time']; ?>
</li>
                            <li>栏目：<?php echo $this->_tpl_vars['article']['cat_name']; ?>
</li>
                        </ul>
                        
                        <p><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['description'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 96, "...") : smarty_modifier_truncate($_tmp, 96, "...")); ?>
 <a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" target="_blank"> 查看全文&raquo;</a>　 </p>
						 <?php if ($this->_tpl_vars['article']['image']): ?>   
                            <ul class="imagesList">
							    <?php if ($this->_tpl_vars['article']['image']): ?> 
                                <li><a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" target="_blank" target="_blank"><img src="<?php echo $this->_tpl_vars['article']['image']; ?>
" alt="图片描述" /></a></li>
								<?php endif; ?>
								<?php if ($this->_tpl_vars['article']['image2']): ?> 
                                <li><a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" target="_blank" target="_blank"><img src="<?php echo $this->_tpl_vars['article']['image2']; ?>
" alt="图片描述" /></a></li>
								<?php endif; ?>
								<?php if ($this->_tpl_vars['article']['image3']): ?> 
                                <li><a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" target="_blank" target="_blank"><img src="<?php echo $this->_tpl_vars['article']['image3']; ?>
" alt="图片描述" /></a></li>
								<?php endif; ?>
                            </ul>
                            <?php endif; ?>
							<span class="clear"></span>
                        <div class="total">阅读（<?php echo $this->_tpl_vars['article']['click']; ?>
）    评论（<span id = "sourceId::<?php echo $this->_tpl_vars['article']['id']; ?>
" class = "cy_cmt_count" ></span>）</div>
						<time><?php echo $this->_tpl_vars['article']['month']; ?>
 <span><?php echo $this->_tpl_vars['article']['day']; ?>
 </span> </time>
			</div>
            <!-- .Docs2结束 -->
            <?php endforeach; endif; unset($_from); ?>
			
                             <span class="clear"></span>
							<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/pager.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
           
		</div>
		<!-- blog_neirong结束 -->

		<div id="blog_sidebar">
			<div id="blog_fenlei">
				<h4 class="SortTitle">栏目 </h4>
				<ul>
					<li <?php if ($this->_tpl_vars['cur_blog_id'] == '-1'): ?>class="change"<?php endif; ?>><a href="blog_category.php?id=<?php echo $this->_tpl_vars['USER']['user_id']; ?>
" target="_blank">全部博文（<?php echo $this->_tpl_vars['article_count']; ?>
）</a></li>
					<?php $_from = $this->_tpl_vars['cate_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
					<li <?php if ($this->_tpl_vars['cur_blog_id'] == $this->_tpl_vars['row']['blog_id']): ?>class="change"<?php endif; ?>><a href="blog_category.php?id=<?php echo $this->_tpl_vars['USER']['user_id']; ?>
&blog_id=<?php echo $this->_tpl_vars['row']['blog_id']; ?>
" target="_blank"><?php echo $this->_tpl_vars['row']['cat_name']; ?>
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
" target="_blank">
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
" target="_blank"><?php echo $this->_tpl_vars['article']['title']; ?>
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
		<script type="text/javascript">
var duoshuoQuery = {short_name:"cssmxx"};
(function() {
    var ds = document.createElement(\'script\');
    ds.type = \'text/javascript\';ds.async = true;
    ds.src = \'http://static.duoshuo.com/embed.js\';
    ds.charset = \'UTF-8\';
    (document.getElementsByTagName(\'head\')[0] || document.getElementsByTagName(\'body\')[0]).appendChild(ds);
})();

</script>
<script id="cy_cmt_num" src="http://changyan.sohu.com/upload/plugins/plugins.list.count.js?clientId=cysUEb6tU"></script>
	'; ?>

</body>
</html>