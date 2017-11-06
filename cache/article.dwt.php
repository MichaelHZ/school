<?php /* Smarty version 2.6.26, created on 2017-10-13 21:52:14
         compiled from article.dwt */ ?>
﻿<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="keywords" content="<?php echo $this->_tpl_vars['keywords']; ?>
"/>
    <meta name="description" content="<?php echo $this->_tpl_vars['description']; ?>
"/>
    <title><?php echo $this->_tpl_vars['page_title']; ?>
</title>
    <link href="http://www.bc.com/theme/baoci/images/style/reset_css.css" rel="stylesheet"/>
    <link href="http://www.bc.com/theme/baoci/images/style/all.css" rel="stylesheet"/>
    <script src="http://www.bc.com/theme/baoci/images/js/jquery.js"></script>
    <script src="http://www.bc.com/theme/baoci/images/js/load.js"></script>
    <!--[if lt IE 9]>
    <script language="javascript" type="text/javascript" src="js/html5.js"></script>
    <![endif]-->
</head>
	<body class="huibg">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<!-- header结束 -->

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/banner.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- Banner2结束 -->



	<div id="container2">
		<aside id="sidebarFenlei">
            <?php $_from = $this->_tpl_vars['article_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['left_nav']):
?>
            <?php if ($this->_tpl_vars['get_cat']['two'] == $this->_tpl_vars['left_nav']['cat_id']): ?>
                <h4 class="blueTitle"><em><?php echo $this->_tpl_vars['left_nav']['cat_name']; ?>
  </em> <?php echo $this->_tpl_vars['left_nav']['unique_id']; ?>
 </h4>
            <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
					<ul class="SortList3">
                        <?php $_from = $this->_tpl_vars['article_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['left_nav']):
?>
                        <li <?php if ($this->_tpl_vars['get_cat']['two'] == $this->_tpl_vars['left_nav']['cat_id']): ?>class="change"<?php endif; ?>><a
                                    href="<?php if ($this->_tpl_vars['left_nav']['child'] == ''): ?><?php echo $this->_tpl_vars['left_nav']['url']; ?>
<?php else: ?>#<?php endif; ?>"><?php echo $this->_tpl_vars['left_nav']['cat_name']; ?>
</a>
                            <?php if ($this->_tpl_vars['left_nav']['child']): ?>
                                <ol>
                                    <?php $_from = $this->_tpl_vars['left_nav']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child']):
?>
                                    <li <?php if ($this->_tpl_vars['child']['cur']): ?>class="change2"<?php endif; ?> ><a
                                                href="<?php if ($this->_tpl_vars['child']['custom_url']): ?><?php echo $this->_tpl_vars['child']['custom_url']; ?>
?cat_id=<?php echo $this->_tpl_vars['child']['cat_id']; ?>
<?php else: ?><?php echo $this->_tpl_vars['child']['url']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['child']['cat_name']; ?>
</a>
                                    </li>
                                    <?php if ($this->_tpl_vars['child']['cur']): ?>

                                    <?php endif; ?>
                                    <?php endforeach; endif; unset($_from); ?>
                                </ol>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; endif; unset($_from); ?>
					</ul>
		<span class="bombg"></span>
		</aside>
		<!-- sidebarFenlei结束 -->

		<article id="neirong2">

                <div id="Location">
                    <i class="icon_"></i> 您现在的位置：<a href="/">首页</a> &gt; <a
                            href="<?php echo $this->_tpl_vars['cat_root']['url']; ?>
"><?php echo $this->_tpl_vars['cat_root']['cat_name']; ?>
</a> <?php if ($this->_tpl_vars['get_cat']['two'] != $this->_tpl_vars['get_cat']['root']): ?>&gt;<a
                        href="<?php echo $this->_tpl_vars['cat_two']['url']; ?>
"><?php echo $this->_tpl_vars['cat_two']['cat_name']; ?>
</a><?php if ($this->_tpl_vars['get_cat']['two'] != $this->_tpl_vars['get_cat']['child'] && $this->_tpl_vars['get_cat']['two'] != $this->_tpl_vars['get_cat']['root']): ?> &gt; <?php echo $this->_tpl_vars['cat_child']['cat_name']; ?>
<?php endif; ?><?php endif; ?>
                </div>
                <!-- Location结束 -->
                
                
                <section id="docContent">
                        <header class="doc_header">
                            <h1> <?php echo $this->_tpl_vars['article']['title']; ?>
</h1>
                            <div class="values">
                                <span>发布时间：<?php echo $this->_tpl_vars['article']['add_time']; ?>
 </span><span>发布者：<?php echo $this->_tpl_vars['article']['source']; ?>
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
                                <a href="<?php echo $this->_tpl_vars['cat_two']['url']; ?>
" class="btn_more">查看更多 +</a>
                            </nav>
                            <!-- PrevNext结束 -->

                </section>
                <!-- docContent结束 -->
            
     
                
		</article>
		<!-- neirong2结束 -->


		<span class="clear"></span>
		<span class="float_pic9"></span>
		<span class="float_pic10"></span>
	</div>
	<!-- container2结束 -->

	<footer id="footer2">
    	<div class="center">
           	<a href="#" class="bomlogo"><img src="http://www.bc.com/theme/baoci/images/bomlogo.png" > </a>
            <div class="text">
                    <p>Copyright &copy; 2012-2017  常熟市报慈小学  版权所有     地址：江苏省苏州市常熟市湘江西路288号</p>
                    <p>苏ICP备10217989号    技术支持：漫有目的</p>
           
            
            </div>
		</div>
        <span  class="footerbg"></span>
	</footer>
	<!-- footer2结束 -->

</body>
</html>