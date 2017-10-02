<?php /* Smarty version 2.6.26, created on 2017-09-28 10:13:14
         compiled from inc/friendlink.tpl */ ?>
<div id="friendlink">
    	<div class="center">
                    <h5><?php echo $this->_tpl_vars['lang']['link']; ?>
：</h5>
                    <p>
					<?php $_from = $this->_tpl_vars['link']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['link'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['link']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['link']):
        $this->_foreach['link']['iteration']++;
?>
					<a href="<?php echo $this->_tpl_vars['link']['link_url']; ?>
" target="_blank" ><?php echo $this->_tpl_vars['link']['link_name']; ?>
</a><?php if (! ($this->_foreach['link']['iteration'] == $this->_foreach['link']['total'])): ?>|<?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                    </p>
        </div>
	</div>