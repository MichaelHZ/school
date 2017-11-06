<?php /* Smarty version 2.6.26, created on 2017-11-06 20:23:28
         compiled from index.dwt */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'index.dwt', 49, false),)), $this); ?>
﻿<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="keywords" content="<?php echo $this->_tpl_vars['keywords']; ?>
" />
    <meta name="description" content="<?php echo $this->_tpl_vars['description']; ?>
" />
    <title><?php echo $this->_tpl_vars['page_title']; ?>
</title>
    <link href="http://www.bc.com/m/theme/baoci/images/style/reset_css.css" rel="stylesheet"/>
    <link href="http://www.bc.com/m/theme/baoci/images/style/swiper.min.css" rel="stylesheet"/>
    <link href="http://www.bc.com/m/theme/baoci/images/style/all.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="blank"/>
    <meta name="format-detection" content="telephone=no"/>


</head>
<body>
<div id="banner">
    <ul>
        <?php $_from = $this->_tpl_vars['show_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['show'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['show']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['show']):
        $this->_foreach['show']['iteration']++;
?>
        <li><a href="<?php echo $this->_tpl_vars['show']['show_link']; ?>
"><img src="<?php echo $this->_tpl_vars['show']['show_img']; ?>
" alt="description "/></a></li>
        <?php endforeach; endif; unset($_from); ?>
    </ul>

</div>
<!-- banner结束 -->


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/navmenu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- menu结束 -->
<div id="menu_zz"></div>
<nav id="quicklink">
    <ul class="NavList">
        <?php $_from = $this->_tpl_vars['nav_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['nav'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['nav']):
        $this->_foreach['nav']['iteration']++;
?>
        <li><a href="<?php echo $this->_tpl_vars['nav']['url']; ?>
"<?php if ($this->_tpl_vars['nav']['target']): ?> target="_blank"<?php endif; ?>><i
                        class="icon_nav_ icon_nav_1x<?php echo $this->_tpl_vars['nav']['index']; ?>
"></i><?php echo $this->_tpl_vars['nav']['nav_name']; ?>
</a></li>
        <?php endforeach; endif; unset($_from); ?>
    </ul>
</nav>
<!-- quicklink结束 -->

<section id="News">
    <h4>校园动态 </h4>
    <ul class="NewsList">
        <?php $_from = $this->_tpl_vars['dynamic_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
        <li>
            <time><?php echo $this->_tpl_vars['article']['add_time']; ?>
     </time>
            <a href="<?php echo $this->_tpl_vars['article']['url']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 20, "...") : smarty_modifier_truncate($_tmp, 20, "...")); ?>
 </a></li>
        <?php endforeach; endif; unset($_from); ?>


    </ul>
</section>
<!-- News结束 -->

<section id="Column">
    <ul class="Tab">
        <li class="change"><a href="#">校园公告</a></li>
        <li><a href="#">学校管理</a></li>
        <li><a href="#">教育科研</a></li>
        <li><a href="#">常规评比</a></li>
    </ul>

    <div class="Tab_nr">
        <div class="pagenav" style="display: none">
            <?php $_from = $this->_tpl_vars['pager1']['cur_paper']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
            <a href="<?php echo $this->_tpl_vars['v']['url']; ?>
"><?php echo $this->_tpl_vars['v']['index']; ?>
</a>
            <?php endforeach; endif; unset($_from); ?>
        </div>
        <a href="javascript:void(0)" class="btn_more">更多 </a>

    </div>
    <!-- .Tab_nr结束 -->


    <div class="Tab_nr">
        <div class="pagenav" style="display: none">
            <?php $_from = $this->_tpl_vars['pager2']['cur_paper']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
            <a href="<?php echo $this->_tpl_vars['v']['url']; ?>
"><?php echo $this->_tpl_vars['v']['index']; ?>
</a>
            <?php endforeach; endif; unset($_from); ?>
        </div>
        <a href="javascript:void(0)" class="btn_more">更多 </a>

    </div>
    <!-- .Tab_nr结束 -->


    <div class="Tab_nr">
        <div class="pagenav" style="display: none">
            <?php $_from = $this->_tpl_vars['pager3']['cur_paper']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
            <a href="<?php echo $this->_tpl_vars['v']['url']; ?>
"><?php echo $this->_tpl_vars['v']['index']; ?>
</a>
            <?php endforeach; endif; unset($_from); ?>
        </div>
        <a href="javascript:void(0)" class="btn_more">更多 </a>

    </div>
    <!-- .Tab_nr结束 -->


    <div class="Tab_nr">
        <div class="pagenav" style="display: none">
            <?php $_from = $this->_tpl_vars['pager4']['cur_paper']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
            <a href="<?php echo $this->_tpl_vars['v']['url']; ?>
"><?php echo $this->_tpl_vars['v']['index']; ?>
</a>
            <?php endforeach; endif; unset($_from); ?>
        </div>
        <a href="javascript:void(0)" class="btn_more">更多 </a>

    </div>
    <!-- .Tab_nr结束 -->


</section>
<!-- Column结束 -->

<script src="http://www.bc.com/m/theme/baoci/images/js/jquery.js"></script>
<script src="http://www.bc.com/m/theme/baoci/images/js/swiper.min.js"></script>
<script src="http://www.bc.com/m/theme/baoci/images/js/load.js"></script>
</body>
</html>