<?php /* Smarty version 2.6.26, created on 2017-10-13 21:37:28
         compiled from inc/pager.tpl */ ?>
<div class="pages">
    <?php if ($this->_tpl_vars['pager']['page'] > 1): ?>
    <a href="<?php echo $this->_tpl_vars['pager']['previous']; ?>
" id="btn_prev" class="change">&laquo;<?php echo $this->_tpl_vars['lang']['pager_previous']; ?>
</a>
    <?php else: ?>
    <a href="javascript:void(0)"  id="btn_prev" class="btn unclick">
        &laquo;<?php echo $this->_tpl_vars['lang']['pager_previous']; ?>

    </a>

    <?php endif; ?>
    <?php $_from = $this->_tpl_vars['pager']['cur_paper']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
    <a href="<?php echo $this->_tpl_vars['v']['url']; ?>
" <?php if ($this->_tpl_vars['pager']['page'] == $this->_tpl_vars['v']['index']): ?>class="change" <?php endif; ?>><?php echo $this->_tpl_vars['v']['index']; ?>
</a>
    <?php endforeach; endif; unset($_from); ?>
    <?php if ($this->_tpl_vars['pager']['page'] < $this->_tpl_vars['pager']['page_count']): ?>
    <a href="<?php echo $this->_tpl_vars['pager']['next']; ?>
" id="btn_next" class="change"><?php echo $this->_tpl_vars['lang']['pager_next']; ?>
&raquo; </a>
    <?php else: ?>
    <a href="javascript:void(0)" id="btn_next" class="btn unclick">
        <?php echo $this->_tpl_vars['lang']['pager_next']; ?>
&raquo;
    </a>
    <?php endif; ?>
</div>