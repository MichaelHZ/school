<?php /* Smarty version 2.6.26, created on 2017-09-28 10:13:14
         compiled from inc/header.tpl */ ?>
<header id="header" class="floatheader">
		<div id="logo">
			<a href="<?php echo $this->_tpl_vars['site']['root_url']; ?>
" ><img src="http://www.cssmxx.com/theme/school/images/<?php echo $this->_tpl_vars['site']['site_logo']; ?>
" alt="<?php echo $this->_tpl_vars['site']['site_name']; ?>
" title="<?php echo $this->_tpl_vars['site']['site_name']; ?>
" /></a>
		</div>
		<!-- logo结束 -->

		<nav id="menu">
			<ul>
				<li id="txt1" <?php if ($this->_tpl_vars['index']['cur']): ?> class="hover"<?php endif; ?>><span></span><a href="<?php echo $this->_tpl_vars['site']['root_url']; ?>
" ><?php echo $this->_tpl_vars['lang']['home']; ?>
</a></li>
				 <?php $_from = $this->_tpl_vars['nav_middle_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['nav_middle_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_middle_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['nav']):
        $this->_foreach['nav_middle_list']['iteration']++;
?> 
				<li id="txt<?php echo $this->_tpl_vars['nav']['index']; ?>
" <?php if ($this->_tpl_vars['nav']['cur']): ?> class="hover"<?php endif; ?>><span></span><a href="<?php echo $this->_tpl_vars['nav']['url']; ?>
" <?php if ($this->_tpl_vars['nav']['target']): ?> target="_blank"<?php endif; ?>><?php echo $this->_tpl_vars['nav']['nav_name']; ?>
</a></li>
				<?php endforeach; endif; unset($_from); ?>
			</ul>
		</nav>
		<!-- menu结束 -->

		<span class="clear"></span>
		<!-- 清除浮动 -->
	</header>