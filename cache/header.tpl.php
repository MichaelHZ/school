<?php /* Smarty version 2.6.26, created on 2017-10-12 22:57:45
         compiled from inc/header.tpl */ ?>
<header id="header">
    	<div class="center">
                <div id="logo">
                    <a href="#" > <img src="http://www.bc.com/theme/baoci/images/<?php echo $this->_tpl_vars['_CFG']['site_logo']; ?>
" alt="description " /></a>
                </div>
                <!-- logo结束 -->
                <nav id="menu">
                            <ul>
                                <li <?php if ($this->_tpl_vars['index']['cur']): ?> class="hover"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['site']['root_url']; ?>
" ><?php echo $this->_tpl_vars['lang']['home']; ?>
</a></li>
                                <?php $_from = $this->_tpl_vars['nav_middle_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['nav_middle_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_middle_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['nav']):
        $this->_foreach['nav_middle_list']['iteration']++;
?>
                                <li <?php if ($this->_tpl_vars['nav']['cur']): ?> class="hover"<?php endif; ?> ><a href="<?php echo $this->_tpl_vars['nav']['url']; ?>
" <?php if ($this->_tpl_vars['nav']['target']): ?> target="_blank"<?php endif; ?>><?php echo $this->_tpl_vars['nav']['nav_name']; ?>
</a>
                                    <?php if ($this->_tpl_vars['nav']['child']): ?>
                                <ol>
                                    <?php $_from = $this->_tpl_vars['nav']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['nav_middle_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_middle_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['child']):
        $this->_foreach['nav_middle_list']['iteration']++;
?>
                                    <li <?php if ($this->_tpl_vars['child']['cur']): ?> class="hover"<?php endif; ?> ><a href="<?php echo $this->_tpl_vars['child']['url']; ?>
"><?php echo $this->_tpl_vars['child']['nav_name']; ?>
</a></li>
                                    <?php endforeach; endif; unset($_from); ?>

                                    <span class="arrow_bom"></span>
                                </ol>
                                    <?php endif; ?>
                                </li>
                                <?php endforeach; endif; unset($_from); ?>

                            </ul>
        
                </nav>
                <!-- menu结束 -->
        </div>
    <span class="line"></span>
</header>