<?php /* Smarty version 2.6.26, created on 2017-10-19 21:13:43
         compiled from blog_index.dwt */ ?>
﻿<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="keywords" content="<?php echo $this->_tpl_vars['keywords']; ?>
" />
	<meta name="description" content="<?php echo $this->_tpl_vars['description']; ?>
" />
	<title><?php echo $this->_tpl_vars['page_title']; ?>
</title>
	<link href="http://www.bc.com/theme/baoci/images/style/reset_css.css" rel="stylesheet" />
	<link href="http://www.bc.com/theme/baoci/images/style/all.css" rel="stylesheet" />
	<script src="http://www.bc.com/theme/baoci/images/js/jquery.js"></script>
    <script src="http://www.bc.com/theme/baoci/images/js/jqueryslider.js"></script>
	<script src="http://www.bc.com/theme/baoci/images/js/load.js"></script>
	<!--[if lt IE 9]>  
		<script language="javascript" type="text/javascript" src="http://www.bc.com/theme/baoci/images/js/html5.js"></script>
	<![endif]-->
</head>
<body class="huibg">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- header结束 -->

	<div id="Banner2">
		<img src="http://www.bc.com/theme/baoci/images/banner3.jpg" alt="description " />
		<div class="weizi"><div>您现在的位置：<a href="/">学校首页</a> &gt; <a href="#">校园博客</a></div></div>
    
    </div>
	<!-- Banner2结束 -->

	

	<div id="Location">
		<i class="icon_"></i> 您现在的位置：<a href="/">学校首页 </a> &gt; <a href="#">校园博客 </a>
		<span class="float_pic9"></span>
		<span class="float_pic10"></span>
	</div>
	<!-- Location结束 -->
	<nav id="BlogMenu">
    <div class="center">
		<ul>
			<li class="change"> <a href="#">博客首页</a></li>
			<?php $_from = $this->_tpl_vars['blog_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['blog_category'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['blog_category']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cate']):
        $this->_foreach['blog_category']['iteration']++;
?>
			<li><a href="<?php echo $this->_tpl_vars['cate']['url']; ?>
"><?php echo $this->_tpl_vars['cate']['cat_name']; ?>
</a></li>
			<?php endforeach; endif; unset($_from); ?>

		</ul>
        <span class="clear"></span>
        <i class="icon_ewm"><div class="ewm"><img src="http://www.bc.com/theme/baoci/images/ewm3.jpg"></div></i>
	</div>
    </nav>
	<!-- BlogMenu结束 -->
	<div id="Blog_m1">
		<div id="playBanner">
        	<h4>News</h4>
			<div class="conbox">
				    <?php $_from = $this->_tpl_vars['news_top']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['news_top'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['news_top']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['news']):
        $this->_foreach['news_top']['iteration']++;
?>
                    <div class="Slide_"> <a title="<?php echo $this->_tpl_vars['news']['title']; ?>
" href="<?php echo $this->_tpl_vars['news']['url']; ?>
"> <img src="<?php echo $this->_tpl_vars['news']['image']; ?>
" class="mainpic"><strong><?php echo $this->_tpl_vars['news']['title']; ?>
</strong></a></div>
                    <?php endforeach; endif; unset($_from); ?>

			</div>

		</div>
		<!-- playBanner结束 -->

		<section id="new">
			<h3 class="huiTitle"><i class="icon1"></i>最新资源 </h3> 
            <ul class="doclist2">
                <?php $_from = $this->_tpl_vars['resource_top']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['resource_top'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['resource_top']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['news']):
        $this->_foreach['resource_top']['iteration']++;
?>
				<li><time><?php echo $this->_tpl_vars['news']['add_time']; ?>
</time> <span> <?php echo $this->_tpl_vars['news']['cat_name']; ?>
</span> <a href="<?php echo $this->_tpl_vars['news']['url']; ?>
"><?php echo $this->_tpl_vars['news']['title']; ?>
<?php if ($this->_tpl_vars['new']['images']): ?>(图)<?php endif; ?></a></li>
                <?php endforeach; endif; unset($_from); ?>

			</ul>
		</section>
		<!-- new结束 -->

		<section id="userLogin">
			<h3><i class="icon2"></i> 博客会员登录 </h3>
			<form action="" class="Loginform" method="post">
                    <label> <input name="txt" type="text" class="text username" placeholder="请输入会员名" /></label>
                    <label> <input name="password" type="password" class="text password" placeholder="请输入密码"/></label>
                    <label> <input name="txt" type="text" class="text"  placeholder="请输入验证码"/> <div class="yzm"><img src=""></div></label>
                    <button class="btn_login"  type="submit">登录</button>
			</form>
            <i class="icon"><img src="http://www.bc.com/theme/baoci/images/icon_login.png"> </i>
		</section>
		<!-- userLogin结束 -->


		<span class="clear"></span>
	</div>
	<!-- Blog_m1结束 -->

	<div id="Blog_m2">
		<nav id="SidebarNav">
			<h3 class="SideTitle3"> <span>教师名录 </span> </h3>

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
		</nav>
		<!-- SidebarNav结束 -->

		<section id="column" class="clear_">
					<div class="columnbox">
						<h4 class="SubTitle"><span> 语 文</span></h4>
						<ul class="list">
                            <?php $_from = $this->_tpl_vars['list'][18]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['news_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['news_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['news']):
        $this->_foreach['news_list']['iteration']++;
?>
								<li><time><?php echo $this->_tpl_vars['news']['add_time']; ?>
</time><a href="<?php echo $this->_tpl_vars['news']['url']; ?>
"><?php echo $this->_tpl_vars['news']['title']; ?>
<?php if ($this->_tpl_vars['new']['images']): ?>(图)<?php endif; ?></a></li>
                            <?php endforeach; endif; unset($_from); ?>

						</ul>
					</div>
                    
                    
					<div class="columnbox">
						<h4 class="SubTitle"><span> 数学</span></h4>
						<ul class="list">
                            <?php $_from = $this->_tpl_vars['list'][19]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['news_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['news_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['news']):
        $this->_foreach['news_list']['iteration']++;
?>
								<li><time><?php echo $this->_tpl_vars['news']['add_time']; ?>
</time><a href="<?php echo $this->_tpl_vars['news']['url']; ?>
"><?php echo $this->_tpl_vars['news']['title']; ?>
<?php if ($this->_tpl_vars['new']['images']): ?>(图)<?php endif; ?></a></li>
                            <?php endforeach; endif; unset($_from); ?>
						</ul>
					</div>
                    
                    
                    
					<div class="columnbox">
						<h4 class="SubTitle"><span> 英语</span></h4>
						<ul class="list">
                            <?php $_from = $this->_tpl_vars['list'][20]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['news_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['news_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['news']):
        $this->_foreach['news_list']['iteration']++;
?>
								<li><time><?php echo $this->_tpl_vars['news']['add_time']; ?>
</time><a href="<?php echo $this->_tpl_vars['news']['url']; ?>
"><?php echo $this->_tpl_vars['news']['title']; ?>
<?php if ($this->_tpl_vars['new']['images']): ?>(图)<?php endif; ?></a></li>
                            <?php endforeach; endif; unset($_from); ?>
						</ul>
					</div>
                    
                    
					<div class="columnbox">
						<h4 class="SubTitle"><span> 艺术</span></h4>
						<ul class="list">
                            <?php $_from = $this->_tpl_vars['list'][21]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['news_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['news_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['news']):
        $this->_foreach['news_list']['iteration']++;
?>
								<li><time><?php echo $this->_tpl_vars['news']['add_time']; ?>
</time><a href="<?php echo $this->_tpl_vars['news']['url']; ?>
"><?php echo $this->_tpl_vars['news']['title']; ?>
<?php if ($this->_tpl_vars['new']['images']): ?>(图)<?php endif; ?></a></li>
                            <?php endforeach; endif; unset($_from); ?>

						</ul>
					</div>
                    
                    
                    
					<div class="columnbox">
						<h4 class="SubTitle"><span> 体育</span></h4>
						<ul class="list">
                            <?php $_from = $this->_tpl_vars['list'][22]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['news_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['news_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['news']):
        $this->_foreach['news_list']['iteration']++;
?>
								<li><time><?php echo $this->_tpl_vars['news']['add_time']; ?>
</time><a href="<?php echo $this->_tpl_vars['news']['url']; ?>
"><?php echo $this->_tpl_vars['news']['title']; ?>
<?php if ($this->_tpl_vars['new']['images']): ?>(图)<?php endif; ?></a></li>
                            <?php endforeach; endif; unset($_from); ?>
						</ul>
					</div>
                    
                    
					<div class="columnbox">
						<h4 class="SubTitle"><span> 思品</span></h4>
						<ul class="list">
                            <?php $_from = $this->_tpl_vars['list'][23]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['news_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['news_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['news']):
        $this->_foreach['news_list']['iteration']++;
?>
								<li><time><?php echo $this->_tpl_vars['news']['add_time']; ?>
</time><a href="<?php echo $this->_tpl_vars['news']['url']; ?>
"><?php echo $this->_tpl_vars['news']['title']; ?>
<?php if ($this->_tpl_vars['new']['images']): ?>(图)<?php endif; ?></a></li>
                            <?php endforeach; endif; unset($_from); ?>
						</ul>
					</div>
                    
                    
                    
				
                    
					<div class="columnbox2">
						<h4 class="SubTitle"><span> 综合</span></h4>
						<ul class="list row2">
                            <?php $_from = $this->_tpl_vars['list'][24]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['news_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['news_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['news']):
        $this->_foreach['news_list']['iteration']++;
?>
								<li><time><?php echo $this->_tpl_vars['news']['add_time']; ?>
</time><a href="<?php echo $this->_tpl_vars['news']['url']; ?>
"><?php echo $this->_tpl_vars['news']['title']; ?>
<?php if ($this->_tpl_vars['new']['images']): ?>(图)<?php endif; ?></a></li>
                            <?php endforeach; endif; unset($_from); ?>
						</ul>
					</div>

		</section>
		<!-- column结束 -->

		<span class="clear"></span>
		<!-- 清除浮动 -->
	</div>
	<!-- Blog_m2结束 -->

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/footer2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- footer2结束 -->

</body>
</html>