<?php /* Smarty version 2.6.26, created on 2017-11-01 22:11:56
         compiled from research_list_sub.dwt */ ?>
﻿<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="keywords" content="<?php echo $this->_tpl_vars['keywords']; ?>
"/>
    <meta name="description" content="<?php echo $this->_tpl_vars['description']; ?>
"/>
    <title><?php echo $this->_tpl_vars['page_title']; ?>
</title>
	<link href="http://www.bc.com/theme/baoci/images/style/reset_css.css" rel="stylesheet" />
	<link href="http://www.bc.com/theme/baoci/images/style/all.css" rel="stylesheet" />
	<script src="http://www.bc.com/theme/baoci/images/js/jquery.js"></script>
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
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/banner2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- Banner2结束 -->



<div id="container2">
    <aside id="sidebarFenlei">
        <?php $_from = $this->_tpl_vars['article_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['left_nav']):
?>
        <?php if ($this->_tpl_vars['get_cat']['two']['cat_id'] == $this->_tpl_vars['left_nav']['cat_id']): ?>
            <h4 class="blueTitle"><em><?php echo $this->_tpl_vars['left_nav']['cat_name']; ?>
  </em> <?php echo $this->_tpl_vars['left_nav']['unique_id']; ?>
 </h4>
        <?php else: ?>
                <?php $_from = $this->_tpl_vars['left_nav']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child']):
?>
            <?php if ($this->_tpl_vars['child']['cur']): ?>
                <h4 class="blueTitle"><em><?php echo $this->_tpl_vars['child']['cat_name']; ?>
  </em> <?php echo $this->_tpl_vars['child']['unique_id']; ?>
 </h4>
            <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>


        <ul class="SortList3">
            <li><a href="/">学校首页</a></li>
            <?php $_from = $this->_tpl_vars['article_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['left_nav']):
?>
            <li>
                <a href="<?php if ($this->_tpl_vars['left_nav']['child'] == ''): ?><?php echo $this->_tpl_vars['left_nav']['url']; ?>
<?php else: ?>#<?php endif; ?>" class="<?php if ($this->_tpl_vars['get_cat']['two']['cat_id'] == $this->_tpl_vars['left_nav']['cat_id']): ?>change<?php elseif ($this->_tpl_vars['get_cat']['root']['cat_id'] == $this->_tpl_vars['left_nav']['cat_id']): ?>change<?php endif; ?>"><?php echo $this->_tpl_vars['left_nav']['cat_name']; ?>
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
</a> <?php if ($this->_tpl_vars['get_cat']['two']['cat_id'] != $this->_tpl_vars['get_cat']['root']['cat_id']): ?>&gt;<a
                href="<?php echo $this->_tpl_vars['cat_two']['url']; ?>
"><?php echo $this->_tpl_vars['cat_two']['cat_name']; ?>
</a><?php if ($this->_tpl_vars['get_cat']['two']['cat_id'] != $this->_tpl_vars['get_cat']['child']['cat_id'] && $this->_tpl_vars['get_cat']['two']['cat_id'] != $this->_tpl_vars['get_cat']['root']['cat_id']): ?> &gt; <?php echo $this->_tpl_vars['cat_child']['cat_name']; ?>
<?php endif; ?><?php endif; ?>
        </div>
        <!-- Location结束 -->
        <section id="columnlist">


            <header class="doc_header">
                <h1> <?php echo $this->_tpl_vars['cat_list']['title']; ?>
</h1>
                <div class="values">
                    <!--<span>发布时间：2013-12-20 20:31:42 </span><span>发布者：李老师 </span><span>阅读量：113 </span>-->
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


            </header>

            <?php if ($this->_tpl_vars['cat_list']['child']): ?>
              <?php $_from = $this->_tpl_vars['cat_list']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
            <div class="columnbox3">

                <h3 class="FenleiTitle"><i class="icons_ icons_1x<?php echo $this->_tpl_vars['list']['index']; ?>
"></i> <?php echo $this->_tpl_vars['list']['title']; ?>
 </h3>

                <?php if ($this->_tpl_vars['article_list_sid'][$this->_tpl_vars['list']['cat_id']]): ?>
                <ul class="doclist3">
                    <?php $_from = $this->_tpl_vars['article_list_sid'][$this->_tpl_vars['list']['cat_id']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
                    <li><time><?php echo $this->_tpl_vars['article']['add_time']; ?>
</time> <span> <?php echo $this->_tpl_vars['article']['cat_name']; ?>
</span> <a href="<?php echo $this->_tpl_vars['article']['url']; ?>
"><?php echo $this->_tpl_vars['article']['title']; ?>
<?php if ($this->_tpl_vars['article']['images']): ?>(图)<?php endif; ?></a></li>
                    <?php endforeach; endif; unset($_from); ?>

                </ul>
                <?php endif; ?>

            </div>
                <?php endforeach; endif; unset($_from); ?>
            <?php endif; ?>



            <a href="<?php echo $this->_tpl_vars['cat_list']['backUrl']; ?>
" class="btn_back">返 回 </a>
        </section>
        <!-- columnlist结束 -->




    </article>
		<!-- neirong2结束 -->


		<span class="clear"></span>
		<span class="float_pic9"></span>
		<span class="float_pic10"></span>
	</div>
	<!-- container2结束 -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/footer2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- footer2结束 -->


</body>
</html>