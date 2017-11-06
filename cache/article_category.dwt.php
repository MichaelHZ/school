<?php /* Smarty version 2.6.26, created on 2017-10-29 13:17:48
         compiled from article_category.dwt */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'article_category.dwt', 84, false),)), $this); ?>
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
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/banner2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- banner结束 -->

<div id="container2">
    <aside id="sidebarFenlei">
        <?php $_from = $this->_tpl_vars['article_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['left_nav']):
?>
        <?php if ($this->_tpl_vars['get_cat']['two'] == $this->_tpl_vars['left_nav']['cat_id']): ?>
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
<?php else: ?>#<?php endif; ?>" class="<?php if ($this->_tpl_vars['get_cat']['two'] == $this->_tpl_vars['left_nav']['cat_id']): ?>change<?php elseif ($this->_tpl_vars['get_cat']['root'] == $this->_tpl_vars['left_nav']['cat_id']): ?>change<?php endif; ?>"><?php echo $this->_tpl_vars['left_nav']['cat_name']; ?>
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
</a> <?php if ($this->_tpl_vars['get_cat']['two'] != $this->_tpl_vars['get_cat']['root']): ?>&gt;<a
                href="<?php echo $this->_tpl_vars['cat_two']['url']; ?>
"><?php echo $this->_tpl_vars['cat_two']['cat_name']; ?>
</a><?php if ($this->_tpl_vars['get_cat']['two'] != $this->_tpl_vars['get_cat']['child'] && $this->_tpl_vars['get_cat']['two'] != $this->_tpl_vars['get_cat']['root']): ?> &gt; <?php echo $this->_tpl_vars['cat_child']['cat_name']; ?>
<?php endif; ?><?php endif; ?>
        </div>
        <!-- Location结束 -->

        <div id="NewsList">
            <?php $_from = $this->_tpl_vars['article_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['article_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['article_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['article']):
        $this->_foreach['article_list']['iteration']++;
?>
            <div class="doc">
                <a href="<?php if ($this->_tpl_vars['article']['ctype']): ?>/article_category.php?id=<?php echo $this->_tpl_vars['get_cat']['child']; ?>
&ctype=create_<?php echo $this->_tpl_vars['article']['id']; ?>
<?php else: ?><?php echo $this->_tpl_vars['article']['url']; ?>
<?php endif; ?>"
                   class="photo" target="_blank">
                    <?php if ($this->_tpl_vars['article']['image']): ?>
                    <img src="<?php echo $this->_tpl_vars['article']['image']; ?>
" alt="图片描述"/>
                    <?php else: ?>
                    <img src="<?php echo $this->_tpl_vars['fragment']['none']['image']; ?>
" alt="图片描述"/>

                    <?php endif; ?>
                    <img src="temp_img/416.jpg" alt="description "/>
                </a>
                <h5><a href="<?php if ($this->_tpl_vars['article']['ctype']): ?>/article_category.php?id=<?php echo $this->_tpl_vars['get_cat']['child']; ?>
&ctype=create_<?php echo $this->_tpl_vars['article']['id']; ?>
<?php else: ?><?php echo $this->_tpl_vars['article']['url']; ?>
<?php endif; ?>"><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30, "...") : smarty_modifier_truncate($_tmp, 30, "...")); ?>
</a></h5>
                <div class="values">
                    <?php echo $this->_tpl_vars['article']['add_time_short']; ?>
  &nbsp; &nbsp; 来源<?php echo $this->_tpl_vars['article']['source']; ?>
 &nbsp; &nbsp; 点击：<?php echo $this->_tpl_vars['article']['click']; ?>

                </div>
                <p> <?php echo ((is_array($_tmp=$this->_tpl_vars['article']['description'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 96, "...") : smarty_modifier_truncate($_tmp, 96, "...")); ?>

                </p>
                <a href="<?php if ($this->_tpl_vars['article']['ctype']): ?>/article_category.php?id=<?php echo $this->_tpl_vars['get_cat']['child']; ?>
&ctype=create_<?php echo $this->_tpl_vars['article']['id']; ?>
<?php else: ?><?php echo $this->_tpl_vars['article']['url']; ?>
<?php endif; ?>" class="more" target="_blank">more </a>
            </div>
            <?php endforeach; endif; unset($_from); ?>
            <!-- .doc结束 -->

            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/pager.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>




        </div>

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








