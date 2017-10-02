<?php /* Smarty version 2.6.26, created on 2017-09-28 23:38:20
         compiled from gallery.dwt */ ?>
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
</head>
<body>
	 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/header2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- header2结束 -->
	<div id="banner2">
		<img src="http://www.cssmxx.com/theme/school/images/ad6.jpg" alt="图片描述" />
	</div>
	<!-- banner2结束 -->
    
    
    <h2 class="maintitle"></h2>
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
                    <div id="weizi">
                       <p> 您现在的位置：<a href="#">首页 </a>&gt; <a href="#">校务公开</a> &gt; 上级通知</p>
                    </div>
                    <!-- weizi结束 -->
                    <div id="DocContent">
                        <h1 class="doc_title"><?php echo $this->_tpl_vars['gallery']['title']; ?>
</h1>
                        <ul class="doc_value">
                            <li>时间：<?php echo $this->_tpl_vars['gallery']['add_time']; ?>
</li>
							<!--
                            <li>来源：云云</li>
							-->
                            <li>点击：<?php echo $this->_tpl_vars['gallery']['click']; ?>
</li>
							
                        </ul>
                        
                        
                                            
                        <div id="pictureBrowse">
                                <ul class="piclists">
								    <?php $_from = $this->_tpl_vars['gallery']['array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['article_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['article_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['article']):
        $this->_foreach['article_list']['iteration']++;
?> 
                                    <li><img src="<?php echo $this->_tpl_vars['article']['image']; ?>
"  data-bigpic="<?php echo $this->_tpl_vars['article']['image']; ?>
" /></li>
									 <?php endforeach; endif; unset($_from); ?> 
                                  
                                </ul>
                        </div>
                        <!-- pictureBrowse结束 -->
                    
                                       
                        
                      
                    <div id="PrevNext">
                        <p>上一篇：<a href="#">市场2012被管委会评为招商引资先进单位</a></p>
                        <p>下一篇：没有了</p>
                
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
                
             
             
             
             
                
		</article>
		<!-- neirong结束 -->

		<span class="clear"></span>
        <span class="icon_hua"></span>
        <span class="icon_hua2"></span>
	</div>
	<!-- container结束 -->


	<span class="container_bg"></span>


	<footer id="footer">
    
    <div class="center">
		<div class="erweima">
            <img src="http://www.cssmxx.com/theme/school/images/erweima.jpg" alt="图片描述" class="ewm" />
            <img src="http://www.cssmxx.com/theme/school/images/school_txt.png" alt="图片描述" class="name" />
            
		</div>
		<dl>
			<dt>学校</dt>
			<dd><a href="#">&gt; 校务公开</a>
		<a href="#">&gt; 管理纪事</a>
		<a href="#">&gt; 校际交流</a>
		<a href="#">&gt; 党建文化</a>
		<a href="#">&gt; 群团工会</a>
		<a href="#">&gt; 学校荣誉</a>
		<a href="#">&gt; 集团办学</a>
		<a href="#">&gt; 留言板</a>
		</dd>
		</dl>
		<dl>
			<dt>学生</dt>
			<dd><a href="#">&gt; 石梅之星</a>
		<a href="#">&gt; 多彩活动</a>
		<a href="#">&gt; 社团动态</a>
		<a href="#">&gt; 学生获奖</a>
		</dd>
		</dl>
		<dl>
			<dt>教师</dt>
			<dd><a href="#">&gt; 教师风采</a>
		<a href="#">&gt; 班主任栏</a>
		<a href="#">&gt; 童化课堂</a>
		<a href="#">&gt; 教育科研</a>
		<a href="#">&gt; 博客空间</a>
		<a href="#">&gt; 大家讲坛</a>
		<a href="#">&gt; 教师获奖</a>
		</dd>
		</dl>
		<dl>
			<dt>回眸</dt>
			<dd><a href="#">&gt; 历史长</a>
		<a href="#">&gt; 风物记</a>
		<a href="#">&gt; 学长团</a>
		<a href="#">&gt; 档案录</a>
		</dd>
		</dl>
		<dl class="margin_left">
			<dt>瞭望</dt>
			<dd><a href="#">&gt; 看教育</a>
		<a href="#">&gt; 谈家教</a>
		<a href="#">&gt; 家委会</a>
		<a href="#">&gt; 爱心团</a>
		</dd>
		</dl>
		<dl>
			<dt>资源</dt>
			<dd><a href="#">&gt; 图片</a>
		<a href="#">&gt; 影音</a>
		</dd>
		</dl>
		<dl>
			<dt>幼教</dt>
			<dd><a href="#">&gt; 动态新闻</a>
		<a href="#">&gt; 通知公告</a>
		<a href="#">&gt; 保育之窗</a>
		<a href="#">&gt; 班级列车</a>
		<a href="#">&gt; 馨香阅读</a>
		<a href="#">&gt; 艺术长廊</a>
		</dd>
		</dl>
		<dl>
			<dt>集团</dt>
			<dd><a href="#">&gt; 管理机制健全有效</a>
		<a href="#">&gt; 师资品质整体提高</a>
		<a href="#">&gt; 教育资源丰富优化</a>
		<a href="#">&gt; 教育质量明显提高</a>
		<a href="#">&gt; 特色创新</a>
		</dd>
		</dl>
		<span class="clear"></span>
    
    
    </div>
    
	</footer>
	<!-- footer结束 -->



	<footer id="copyright">
            <div class="center">
            	<span class="bomlogo"><img src="http://www.cssmxx.com/theme/school/images/1.gif"> <img src="http://www.cssmxx.com/theme/school/images/1.jpg"> </span>
                <p>Copyright &copy; 常熟市石梅小学 All rights reserved. 苏ICP备08004760号</p>
                <span class="icon"></span>
            </div>
	</footer>
	<!-- copyright结束 -->

</body>
</html>