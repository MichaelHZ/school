<?php /* Smarty version 2.6.26, created on 2017-09-28 10:25:54
         compiled from blog_index.dwt */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'blog_index.dwt', 124, false),)), $this); ?>
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
    <script src="http://www.cssmxx.com/theme/school/images/js/jqueryXslider.js"></script>
    <script src="http://www.cssmxx.com/theme/school/images/js/jquery.easing.1.3.js"></script>
    <script src="http://www.cssmxx.com/theme/school/images/js/gundong.js"></script>
    <script src="http://www.cssmxx.com/theme/school/images/js/load.js?3"></script>
    
    
	<!--[if IE]>
	<script src="http://www.cssmxx.com/theme/school/images/js/html5.js"></script>
	<![endif]-->
</head>
<body>
	 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/header3.tpl", 'smarty_include_vars' => array()));
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

	<div id="blog_hot">
		<div id="blog_left">
			<div id="NewsPlay">
				<div class="conbox">
				        <?php $_from = $this->_tpl_vars['new_blog_img']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['blog']):
?>
                        <div><a title="图片展示" href="<?php echo $this->_tpl_vars['blog']['url']; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['blog']['image']; ?>
"><strong><a href="<?php echo $this->_tpl_vars['blog']['url']; ?>
" target="_blank" style="color: #d60c5e;">[<?php echo $this->_tpl_vars['blog']['cat_name']; ?>
]</a> <?php echo $this->_tpl_vars['blog']['title']; ?>
</strong></a></div>
                        <?php endforeach; endif; unset($_from); ?>
				</div>
			</div>
			<!-- NewsPlay结束 -->

			<div id="HOTblog">
							<h3 class="PartTitle"><span>最热博文 </span></h3>
							<ul class="DocList">
							     <?php $_from = $this->_tpl_vars['new_blog_8']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['blog']):
?>
                        			<li><em><a href="<?php echo $this->_tpl_vars['blog']['url']; ?>
" target="_blank">[<?php echo $this->_tpl_vars['blog']['cat_name']; ?>
]</a> </em><a href="<?php echo $this->_tpl_vars['blog']['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['blog']['title']; ?>
<?php if ($this->_tpl_vars['blog']['image']): ?>[图]<?php endif; ?></a></li>
                       			 <?php endforeach; endif; unset($_from); ?>
								
							</ul>

			</div>
			<!-- HOTblog结束 -->

		</div>
		<!-- blog_left结束 -->

		<div id="blog_center">
		<!--
			<div id="FocusBlog">
							<h3 class="PartTitle">
							<span>博文头条 </span></h3>
							<div class="focusDoc">
							 <?php $_from = $this->_tpl_vars['new_blog_1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['blog']):
?>
								<h5><a href="<?php echo $this->_tpl_vars['blog']['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['blog']['title']; ?>
 </a></h5>
								<p><?php echo $this->_tpl_vars['blog']['description']; ?>
</p>
							 <?php endforeach; endif; unset($_from); ?>
							</div>
			</div>
			-->
				<div id="FocusBlog">
							<h3 class="PartTitle">
							<span>每周星博文 </span></h3>
                        <div id="FocusBlog_group" data-group-sl="1" data-group-name=".focusDoc">
						<?php $_from = $this->_tpl_vars['new_blog_1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['blog']):
?>
                                    <div class="focusDoc">
                                        <h5><a href="<?php echo $this->_tpl_vars['blog']['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['blog']['title']; ?>
 </a></h5>
                                        <p><a href="<?php echo $this->_tpl_vars['blog']['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['blog']['description']; ?>
 </a></p>
                                    </div>
                         <?php endforeach; endif; unset($_from); ?>    
                                   
                            
                        
                        </div>
                         <!-- FocusBlog_group结束 --> 
     
			</div>
			
			<!-- FocusBlog结束 -->

			<div id="NewBlogDoc">
							<h3 class="PartTitle" style="margin-top:0.7em;"><span>最新博文 </span></h3>
							<ul class="DocList">
							    <?php $_from = $this->_tpl_vars['new_blog_12']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['blog']):
?>
							    <?php if ($this->_tpl_vars['index'] % 4 != 0): ?>
									<li><span><?php echo $this->_tpl_vars['blog']['user_name']; ?>
</span><em><a href="<?php echo $this->_tpl_vars['blog']['url']; ?>
" target="_blank" >[<?php echo $this->_tpl_vars['blog']['cat_name']; ?>
]</a> </em><a href="<?php echo $this->_tpl_vars['blog']['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['blog']['title']; ?>
<?php if ($this->_tpl_vars['blog']['img']): ?>[图]<?php endif; ?></a></li>
							  
								<?php else: ?>
								  <li><em><a href="<?php echo $this->_tpl_vars['blog']['url']; ?>
" target="_blank">[<?php echo $this->_tpl_vars['blog']['cat_name']; ?>
]</a> </em><a href="<?php echo $this->_tpl_vars['blog']['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['blog']['title']; ?>
<?php if ($this->_tpl_vars['blog']['image']): ?>[图]<?php endif; ?></a></li>
							
								<?php endif; ?>
								<?php endforeach; endif; unset($_from); ?>
							</ul>

			</div>
			<!-- NewBlogDoc结束 -->

		</div>
		<!-- blog_center结束 -->

		<div id="blog_right">
			<div id="Search3">
							<form action="" class="Searchform_" method="post">
								<select class="select" name="select">
									<option value="1">博文</option>
								</select>
								 <input name="s" type="text" id="keys" class="text" title="<?php echo $this->_tpl_vars['lang']['search_product_cue']; ?>
" autocomplete="off" onclick="formClick(this,'文章搜索')" value="<?php if ($this->_tpl_vars['keyword']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['keyword'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php else: ?>请输入要搜索的关键字<?php endif; ?>" size="32" maxlength="128">
								<!--
								<input name="txt" type="text" id="key2" class="text" />
								-->
								<button class="btn_send" type="submit">搜索</button>
							</form>

			</div>
			<!-- Search2结束 -->

			<div id="blogStar">
							<h4 class="SubTitle"><span>博客之星 </span></h4>
							<ul class="starList">
							     <?php $_from = $this->_tpl_vars['blog_star']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user']):
?>
								<li><a href="blog_category.php?id=<?php echo $this->_tpl_vars['user']['user_id']; ?>
" target="_blank">
								 <?php if ($this->_tpl_vars['user']['face']): ?>
                                <img src=" <?php echo $this->_tpl_vars['user']['face']; ?>
" alt="图片描述" /> 
                                <?php else: ?>
                                <img src="<?php echo $this->_tpl_vars['fragment']['dface']['image']; ?>
" alt="图片描述" />
                                 			
                                 <?php endif; ?>
								<strong><?php echo $this->_tpl_vars['user']['nick_name']; ?>
</strong></a></li>
								<?php endforeach; endif; unset($_from); ?>
							</ul>
							<span class="clear"></span>
			</div>
			<!-- blogStar结束 -->

			<div id="blogRanking">
            		<ul class="RankingTab" id="blogRankingTab">
                    	<li class="change"><a href="#">排行榜</a></li>
                    	<li><a href="#">最近更新</a></li>
                    </ul>
                    <span class="clear"></span>
                    <div class="Tab_nr">
                            <ol class="RankingList">
                                <?php $_from = $this->_tpl_vars['blog_much']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user']):
?>
                                <li><a href="blog_category.php?id=<?php echo $this->_tpl_vars['user']['user_id']; ?>
" target="_blank"> <ins> 博文数：<?php echo $this->_tpl_vars['user']['count']; ?>
</ins><span> <?php echo $this->_tpl_vars['user']['index']; ?>
</span>
								 <?php if ($this->_tpl_vars['user']['face']): ?>
                                <img src=" <?php echo $this->_tpl_vars['user']['face']; ?>
" alt="图片描述" /> 
                                <?php else: ?>
                                <img src="<?php echo $this->_tpl_vars['fragment']['dface']['image']; ?>
" alt="图片描述" />
                                 			
                                 <?php endif; ?>
								
								
								<?php echo $this->_tpl_vars['user']['nick_name']; ?>
</a></li>
                              
                                <?php endforeach; endif; unset($_from); ?>
                             
                            </ol>
                            <a href="#" class="more" target="_blank">更多</a>
                    </div>
                    <!-- .Tab_nr结束 -->
            		
                    <div class="Tab_nr">
                            <ol class="RankingList">
                               
                                 <?php $_from = $this->_tpl_vars['blog_update']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user']):
?>
                                <li><a href="blog_category.php?id=<?php echo $this->_tpl_vars['user']['user_id']; ?>
" target="_blank"> <ins> 博文数：<?php echo $this->_tpl_vars['user']['count']; ?>
</ins><span> <?php echo $this->_tpl_vars['user']['index']; ?>
</span>
								
								 <?php if ($this->_tpl_vars['user']['face']): ?>
                                <img src=" <?php echo $this->_tpl_vars['user']['face']; ?>
" alt="图片描述" /> 
                                <?php else: ?>
                                <img src="<?php echo $this->_tpl_vars['fragment']['dface']['image']; ?>
" alt="图片描述" />
                                 			
                                 <?php endif; ?>
								<?php echo $this->_tpl_vars['user']['nick_name']; ?>
</a></li>
                              
                                <?php endforeach; endif; unset($_from); ?>
                            </ol>
                            <a href="#" class="more" target="_blank">更多</a>
                    </div>
                    <!-- .Tab_nr结束 -->

			</div>
			<!-- blogRanking结束 -->

		</div>
		<!-- blog_right结束 -->

		<span class="clear"></span>

        <span class="icon_hua"></span>
        <span class="icon_hua2"></span>
        
	</div>
	<!-- blog_hot结束 -->

	<div id="blog_photoShow">
            <div class="scrollleft">
                    <ul class="PicList">
                         <?php $_from = $this->_tpl_vars['blog_active']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['img']):
?>
                            <li><a href="<?php echo $this->_tpl_vars['img']['url']; ?>
"><img src="<?php echo $this->_tpl_vars['img']['image']; ?>
" alt="<?php echo $this->_tpl_vars['img']['title']; ?>
" /></a></li>
                        <?php endforeach; endif; unset($_from); ?>
                       
                    </ul>
                    <span class="clear"></span>
            </div>    
	</div>
	<!-- blog_photoShow结束 -->

	<div id="DocFenlei">
    	<div class="center">
        
                <ul>
                    <li class="change"><a href="#">全部日志</a></li>
                    <?php $_from = $this->_tpl_vars['cate_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat']):
?>
                    <li><a href="javascript:void(0)" ><?php echo $this->_tpl_vars['cat']['cat_name']; ?>
</a></li>
                    <?php endforeach; endif; unset($_from); ?>
                </ul>
        <span class="clear"></span>
        </div>
	</div>
	<!-- DocFenlei结束 -->

	<div id="blog_doc">
		<div id="docList">
		           <?php $_from = $this->_tpl_vars['blog_all']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['blog_all'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['blog_all']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['row']):
        $this->_foreach['blog_all']['iteration']++;
?>
		           <div class="docTypeBox" <?php if ($this->_foreach['blog_all']['iteration'] == 0): ?>style="display:block"<?php endif; ?>>
		            <?php $_from = $this->_tpl_vars['row']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
                     <div class="Docs">
                         
                                <div class="docheader">
                                    <a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" class="photo" target="_blank">
									
							    <?php if ($this->_tpl_vars['article']['user_face']): ?>
                                <img src=" <?php echo $this->_tpl_vars['article']['user_face']; ?>
" alt="图片描述" /> 
                                <?php else: ?>
                                <img src="<?php echo $this->_tpl_vars['fragment']['dface']['image']; ?>
" alt="图片描述" />
                                 			
                                 <?php endif; ?>
									</a>
                                    <h5><a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['article']['title']; ?>
</a></h5>
                                    <ul>
                                        <li>作者：<?php echo $this->_tpl_vars['article']['user_name']; ?>
</li>
                                        <li>日期：<?php echo $this->_tpl_vars['article']['add_time']; ?>
</li>
                                        <li>栏目：<?php echo $this->_tpl_vars['article']['cat_name']; ?>
</li>
                                    </ul>
                                </div>
                                <p><?php echo $this->_tpl_vars['article']['description']; ?>
　<a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" class="btn_more" target="_blank">查看全文&raquo; </a></p>
                             <?php if ($this->_tpl_vars['article']['image']): ?>   
                            <ul class="imagesList">
							    <?php if ($this->_tpl_vars['article']['image']): ?> 
                                <li><a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['article']['image']; ?>
" alt="图片描述" /></a></li>
								<?php endif; ?>
								<?php if ($this->_tpl_vars['article']['image2']): ?> 
                                <li><a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['article']['image2']; ?>
" alt="图片描述" /></a></li>
								<?php endif; ?>
								<?php if ($this->_tpl_vars['article']['image3']): ?> 
                                <li><a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['article']['image3']; ?>
" alt="图片描述" /></a></li>
								<?php endif; ?>
                            </ul>
                            <?php endif; ?>
                        <span class="clear"></span>
                        
                        	<div class="total">阅读（<?php echo $this->_tpl_vars['article']['click']; ?>
） 评论（<span id = "sourceId::<?php echo $this->_tpl_vars['article']['id']; ?>
" class = "cy_cmt_count" ></span>）</div>
					</div>
					<?php endforeach; endif; unset($_from); ?>
					</div>
					<?php endforeach; endif; unset($_from); ?>
					
                    <!-- .Docs结束 -->
			<span class="clear"></span>
		</div>
		<!-- docList结束 -->

		<div id="Teachers">
			<h4 class="SubTitle"><span>博客之星 </span> </h4>
			
			<dl>
			<?php $_from = $this->_tpl_vars['member_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
				<dt><?php echo $this->_tpl_vars['row']['job_name']; ?>
</dt>
			<dd>
			    <?php $_from = $this->_tpl_vars['row']['member']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['member']):
?>
				<a href="blog_category.php?id=<?php echo $this->_tpl_vars['member']['user_id']; ?>
" style="display:inline-block;" target="_blank"><?php echo $this->_tpl_vars['member']['nick_name']; ?>
 |</a>  
				<?php endforeach; endif; unset($_from); ?>
			</dd>
			<?php endforeach; endif; unset($_from); ?>
			</dl>
		</div>
		<!-- Teachers结束 -->

		<span class="clear"></span>
		<!-- 清除浮动 -->
        
        
	</div>
	<!-- blog_doc结束 -->





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




