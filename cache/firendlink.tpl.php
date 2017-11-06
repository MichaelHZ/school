<?php /* Smarty version 2.6.26, created on 2017-10-15 15:00:16
         compiled from inc/firendlink.tpl */ ?>
<nav id="Links">
		<h5><?php echo $this->_tpl_vars['lang']['link']; ?>
  link  <a href="#"> 申请友情链接入口&gt;&gt;</a></h5>
		<p><a href="#">友情链接口</a>
			<?php $_from = $this->_tpl_vars['link']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['link'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['link']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['link']):
        $this->_foreach['link']['iteration']++;
?>
			<a href="<?php echo $this->_tpl_vars['link']['link_url']; ?>
" target="_blank" ><?php echo $this->_tpl_vars['link']['link_name']; ?>
</a>
			<?php endforeach; endif; unset($_from); ?>
		 </p>
	<span class="clear"></span>
	</nav>