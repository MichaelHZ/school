<?php /* Smarty version 2.6.26, created on 2017-10-29 13:17:48
         compiled from inc/banner2.tpl */ ?>
<div id="Banner2">
    <img src="<?php echo $this->_tpl_vars['banner']; ?>
" alt="description " />
    <div class="weizi"><div>您现在的位置：<a href="#">首页</a> &gt;
            <a href="<?php echo $this->_tpl_vars['cat_root']['url']; ?>
"><?php echo $this->_tpl_vars['cat_root']['cat_name']; ?>
</a> <?php if ($this->_tpl_vars['get_cat']['two'] != $this->_tpl_vars['get_cat']['root']): ?>&gt;<a
                href="<?php echo $this->_tpl_vars['cat_two']['url']; ?>
"><?php echo $this->_tpl_vars['cat_two']['cat_name']; ?>
</a><?php if ($this->_tpl_vars['get_cat']['two'] != $this->_tpl_vars['get_cat']['child'] && $this->_tpl_vars['get_cat']['two'] != $this->_tpl_vars['get_cat']['root']): ?> &gt; <?php echo $this->_tpl_vars['cat_child']['cat_name']; ?>
<?php endif; ?><?php endif; ?></div></div>

</div>