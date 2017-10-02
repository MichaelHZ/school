<?php /* Smarty version 2.6.26, created on 2017-09-28 10:13:14
         compiled from inc/banner.tpl */ ?>
<div id="banner">
		<div class="conbox">
			 <?php $_from = $this->_tpl_vars['show_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['show'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['show']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['show']):
        $this->_foreach['show']['iteration']++;
?>
            <div><a href="<?php echo $this->_tpl_vars['show']['show_link']; ?>
" target="_blank" ><img src="<?php echo $this->_tpl_vars['show']['show_img']; ?>
"></a></div>
			  <?php endforeach; endif; unset($_from); ?>
		</div>
        <span class="pic_zz"></span>
	</div>