<?php /* Smarty version 2.6.26, created on 2017-10-24 21:45:31
         compiled from blog.dwt */ ?>
﻿<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Blog-内容页</title>
	<link href="http://www.bc.com/theme/baoci/images/style/reset_css.css" rel="stylesheet" />
	<link href="http://www.bc.com/theme/baoci/images/style/all.css" rel="stylesheet" />
	<script src="http://www.bc.com/theme/baoci/images/js/jquery.js"></script>
    <script src="http://www.bc.com/theme/baoci/images/js/jquery.jcarousellite.js"></script>
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
		<div class="weizi"><div>您现在的位置：<a href="/">学校首页 </a> &gt; <a href="/blog_index.php">校园博客 </a>  &gt; <a href="<?php echo $this->_tpl_vars['cat_one']['url']; ?>
"><?php echo $this->_tpl_vars['cat_one']['cat_name']; ?>
 </a></div></div>
    
    </div>
	<!-- Banner2结束 -->

	

	<div id="Location">
		<i class="icon_"></i> 您现在的位置：<a href="/">学校首页 </a> &gt; <a href="/blog_index.php">校园博客 </a>  &gt; <a href="<?php echo $this->_tpl_vars['cat_one']['url']; ?>
"><?php echo $this->_tpl_vars['cat_one']['cat_name']; ?>
 </a>
		<span class="float_pic9"></span>
		<span class="float_pic10"></span>
	</div>
	<!-- Location结束 -->

	<nav id="BlogMenu">
    <div class="center">
		<ul>
            <li> <a href="/blog_index.php">博客首页</a></li>
            <?php $_from = $this->_tpl_vars['blog_category_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['blog_category_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['blog_category_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['category']):
        $this->_foreach['blog_category_list']['iteration']++;
?>
                <li <?php if ($this->_tpl_vars['category']['cat_id'] == $this->_tpl_vars['cat_one']['cat_id']): ?> class="change"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['category']['url']; ?>
"><?php echo $this->_tpl_vars['category']['cat_name']; ?>
</a></li>
            <?php endforeach; endif; unset($_from); ?>
		</ul>
        <span class="clear"></span>
        <i class="icon_ewm"><div class="ewm"><img src="http://www.bc.com/theme/baoci/images/ewm3.jpg"></div></i>
	</div>
    </nav>
	<!-- BlogMenu结束 -->

	<section id="Recommend" class="clear_">
    	<div id="RecommendGundong">
                <ul class="PictureList">
                    <?php $_from = $this->_tpl_vars['top_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['top_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['top_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['list']):
        $this->_foreach['top_list']['iteration']++;
?>
                        <li><a href="<?php echo $this->_tpl_vars['list']['url']; ?>
" class="photo"><img src="<?php echo $this->_tpl_vars['list']['image']; ?>
" alt="description " /><i class="icon_fdj"></i> </a><em><?php echo $this->_tpl_vars['list']['title']; ?>
</em></li>
                    <?php endforeach; endif; unset($_from); ?>
                </ul>
    
        
        </div>
        
	</section>
	<!-- Recommend结束 -->

	<div id="container">
		<article id="neirong">
  
                <section id="docContent">
                        <header class="doc_header">


                            <h1> <?php echo $this->_tpl_vars['article']['title']; ?>
</h1>
                            <div class="values">
                                <span>发布时间：<?php echo $this->_tpl_vars['article']['add_time']; ?>
 </span><span>发布者：<?php echo $this->_tpl_vars['nick_name']['nick_name']; ?>
 </span><span>阅读量：<?php echo $this->_tpl_vars['article']['click']; ?>
 </span>
                            </div>
                            
                            <div class="share">
                            <div class="bdsharebuttonbox">
                                <a class="bds_more" href="#" data-cmd="more"></a>
                                <a title="分享到QQ空间" class="bds_qzone" href="#" data-cmd="qzone"></a>
                                <a title="分享到新浪微博" class="bds_tsina" href="#" data-cmd="tsina"></a>
                                <a title="分享到腾讯微博" class="bds_tqq" href="#" data-cmd="tqq"></a>
                                <a title="分享到人人网" class="bds_renren" href="#" data-cmd="renren"></a>
                                <a title="分享到微信" class="bds_weixin" href="#" data-cmd="weixin"></a>
                            </div>
                        
                        <script>
                        <?php echo '
                        window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};
                        with(document)0[(getElementsByTagName(\'head\')[0]||body).appendChild(createElement(\'script\')).src=\'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=\'+~(-new Date()/36e5)];
                        '; ?>

                        </script>                            </div>
                            
                            
                            </header><div class="content">
                        <!-- 文章内容开始 -->
                        <?php echo $this->_tpl_vars['article']['content']; ?>

                        <!-- 文章内容结束 -->
                            </div>
                           <nav id="PrevNext">

                               <p><?php echo $this->_tpl_vars['lang']['article_previous']; ?>
：<?php if ($this->_tpl_vars['lift']['previous']): ?><a href="<?php echo $this->_tpl_vars['lift']['previous']['url']; ?>
"><?php echo $this->_tpl_vars['lift']['previous']['title']; ?>
</a><?php else: ?>没有了<?php endif; ?></p>
                               <p><?php echo $this->_tpl_vars['lang']['article_next']; ?>
：<?php if ($this->_tpl_vars['lift']['next']): ?><a href="<?php echo $this->_tpl_vars['lift']['next']['url']; ?>
"><?php echo $this->_tpl_vars['lift']['next']['title']; ?>
</a><?php else: ?>没有了<?php endif; ?></p>
                                <a href="/blog_category.php?id=<?php echo $this->_tpl_vars['cat_two']['cat_id']; ?>
" class="btn_more">查看更多 +</a>
                            </nav>
                            <!-- PrevNext结束 -->

                </section>
                <!-- docContent结束 -->
  
  
            
            <a href="#" class="btn_backtop"></a>
            
		</article>
		<!-- neirong结束 -->

		<aside id="sidebar">
			<nav id="Course">
                <?php $_from = $this->_tpl_vars['blog_category_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['blog_category_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['blog_category_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['category']):
        $this->_foreach['blog_category_list']['iteration']++;
?>

                <?php if ($this->_tpl_vars['category']['cat_id'] == $this->_tpl_vars['cat_one']['cat_id']): ?>
                    <h4 class="SldeTitle2"><span><?php echo $this->_tpl_vars['category']['cat_name']; ?>
 </span></h4>
                    <ul class="Course">

                        <?php $_from = $this->_tpl_vars['category']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child']):
?>

                        <li <?php if ($this->_tpl_vars['child']['cat_id'] == $this->_tpl_vars['cat_two']['cat_id']): ?>class="change"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['child']['url']; ?>
"><?php echo $this->_tpl_vars['child']['cat_name']; ?>
</a></li>

                        <?php endforeach; endif; unset($_from); ?>
                    </ul>
                <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
							<span class="clear"></span>
			</nav>
			<!-- Course结束 -->

			<section id="blogDoc">
							<h4 class="SideTitle"><span>热门博文 </span></h4>
							<ul class="DocList">
                                <?php $_from = $this->_tpl_vars['view_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['view_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['view_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['list']):
        $this->_foreach['view_list']['iteration']++;
?>
                                    <li><a href="<?php echo $this->_tpl_vars['list']['url']; ?>
"><?php echo $this->_tpl_vars['list']['title']; ?>
</a><?php if ($this->_tpl_vars['list']['image']): ?>[图]<?php endif; ?></li>
                                <?php endforeach; endif; unset($_from); ?>
							</ul>

			</section>
			<!-- blogDoc结束 -->

			<div id="EWM">
				<img src="http://www.bc.com/theme/baoci/images/0.jpg" alt="description " class="bgpic" />
				<div class="erweima">
				<img src="http://www.bc.com/theme/baoci/images/ewm3.jpg" alt="description " /> <span> 关注我们</span>
				</div>
			</div>
			<!-- EWM结束 -->

		</aside>
		<!-- sidebar结束 -->

		<span class="clear"></span>
	</div>
	<!-- container结束 -->
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/footer2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- footer2结束 -->

</body>
</html>









