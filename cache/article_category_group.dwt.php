<?php /* Smarty version 2.6.26, created on 2017-09-28 14:32:22
         compiled from article_category_group.dwt */ ?>
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
    <script src="http://www.cssmxx.com/theme/school/images/js/jquery.maximage.js"></script>
    <script src="http://www.cssmxx.com/theme/school/images/js/load.js"></script>
  
    
	<!--[if IE]>
	<script src="http://www.cssmxx.com/theme/school/images/js/html5.js"></script>
	<![endif]-->
</head>
<body>

<div id="maximage"><img src="http://www.cssmxx.com/theme/school/images/group/bodybg.jpg"></div>

<div id="main_content">
	<div id="GroupHeader">
		<a href="<?php echo $this->_tpl_vars['site']['root_url']; ?>
" class="grouplogo" ><img src="http://www.cssmxx.com/theme/school/images/logoGroup.png" alt="图片描述" /></a>
		<ul class="menu">
			<li><a href="/"  target="_blank">首页</a> | </li>
			<?php $_from = $this->_tpl_vars['nav_group_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['nav']):
?>
			<li><a href="<?php echo $this->_tpl_vars['nav']['url']; ?>
"  target="_blank"><?php echo $this->_tpl_vars['nav']['nav_name']; ?>
</a> <?php if ($this->_tpl_vars['nav']['index'] != 7): ?>|<?php endif; ?> </li>
			<?php endforeach; endif; unset($_from); ?>
		</ul>
	</div>
	<!-- GroupHeader结束 -->

	<div id="GroupContent">
		<div id="GroupSchool" style="height:auto;padding-top:0px;">
					<ul class="SchoolList">
					   <ul class="SchoolList">
						<li><a href="http://www.csints.org.cn"><img src="http://www.cssmxx.com/theme/school/images/group/school_logo1.jpg" alt="图片描述" />常熟国际学校</a></li>
						<li><a href="http://www.yyxxedu.com"><img src="http://www.cssmxx.com/theme/school/images/group/school_logo2.jpg" alt="图片描述" />杨园中心小学</a></li>
						<li><a href="http://www.cszqxx.com">张桥中心小学</a></li>
						<li><a href="http://www.csxzxx.cn"><img src="http://www.cssmxx.com/theme/school/images/group/school_logo3.jpg" alt="图片描述" />辛庄中心小学</a></li>

						<li><a href="http://www.cslx.com"><img src="http://www.cssmxx.com/theme/school/images/group/school_logo4.jpg" alt="图片描述" />练塘中心小学</a></li>
						<li><a href="http://www.csytxx.net"><img src="http://www.cssmxx.com/theme/school/images/group/school_logo5.jpg" alt="图片描述" />尚湖中心小学</a></li>
						<li><a href="http://www.cswzxx.com"><img src="http://www.cssmxx.com/theme/school/images/group/school_logo6.jpg" alt="图片描述" />王庄中心小学</a></li>
						<li><a href="http://www.csywxx.com"><img src="http://www.cssmxx.com/theme/school/images/group/school_logo7.jpg" alt="图片描述" />游文小学</a></li>

						<li><a href="http://www.5aschool.com"><img src="http://www.cssmxx.com/theme/school/images/group/school_logo8.jpg" alt="图片描述" />五爱小学</a></li>
						<li><a href="http://www.yhxx.com"><img src="http://www.cssmxx.com/theme/school/images/group/school_logo9.jpg" alt="图片描述" />元和小学</a></li>
						<li><a href="#">浙浦中心学校</a></li>
						<li><a href="http://www.cssmxx.com"><img src="http://www.cssmxx.com/theme/school/images/group/school_logo10.jpg" alt="图片描述" />石梅小学</a></li>

					</ul>

					</ul>


					<span class="clear"></span>
		</div>
		<!-- GroupSchool结束 -->

		<div id="GroupNews">
					<ul class="newsTab" id="GroupNewsTab">
						<li class="change"><a href="#">总校动态</a></li>
						<li><a href="#">集团动态</a></li>
					</ul>
					<span class="clear"></span>
                    
                    <div class="Tab_nr">
                             <ul class="groupNewslist">
                                <?php $_from = $this->_tpl_vars['play_article']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
                                <li><a href="<?php echo $this->_tpl_vars['article']['url']; ?>
 " target="_blank">&gt;<?php echo $this->_tpl_vars['article']['title']; ?>
</a></li>
                               <?php endforeach; endif; unset($_from); ?>
                               
                            </ul>
                     </div>
					<!-- .Tab_nr结束 -->



                    <div class="Tab_nr">
                             <ul class="groupNewslist">
                             
                                <ul class="groupNewslist">
                                <?php $_from = $this->_tpl_vars['group_article']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
                                <li><a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" target="_blank">&gt;<?php echo $this->_tpl_vars['article']['title']; ?>
</a></li>
                               <?php endforeach; endif; unset($_from); ?>
                               
                            </ul>
                     </div>
					<!-- .Tab_nr结束 -->


		</div>
		<!-- GroupNews结束 -->

		<span class="clear"></span>
		<!-- 清除浮动 -->
	</div>
	<!-- GroupContent结束 -->

	<div id="CroupCopyright" style="clear:both;">
		<p>Copyright &copy; 常熟市石梅小学 All rights reserved. 苏ICP备08004760号</p>
		<p><img src="http://www.cssmxx.com/theme/school/images/1.gif" />  <img src="http://www.cssmxx.com/theme/school/images/1.jpg" /></p>
	</div>
	<!-- CroupCopyright结束 -->



</div>
<!-- main_content结束 -->

</body>
</html>