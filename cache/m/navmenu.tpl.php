<?php /* Smarty version 2.6.26, created on 2017-09-28 10:09:30
         compiled from inc/navmenu.tpl */ ?>
<div id="navmenu">
      
    	<h4><span></span><a href="<?php echo $this->_tpl_vars['cat_root']['url']; ?>
" style="color:#fff;">全部</a></h4>
	
        <ul>
             <?php $_from = $this->_tpl_vars['article_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cate']):
?>
            <li> <a href="<?php if ($this->_tpl_vars['cate']['child']): ?>#<?php else: ?><?php if ($this->_tpl_vars['cate']['custom_url']): ?><?php echo $this->_tpl_vars['cate']['custom_url']; ?>
?cat_id=<?php echo $this->_tpl_vars['cate']['cat_id']; ?>
<?php else: ?><?php echo $this->_tpl_vars['cate']['url']; ?>
<?php endif; ?><?php endif; ?>" <?php if ($this->_tpl_vars['cate']['cur']): ?>class="cur"<?php endif; ?>><?php echo $this->_tpl_vars['cate']['cat_name']; ?>
</a>
				<?php if ($this->_tpl_vars['cate']['child']): ?>
					 <ol>
					 <?php $_from = $this->_tpl_vars['cate']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['subcate']):
?>
                     <li><a href="<?php if ($this->_tpl_vars['subcate']['custom_url']): ?><?php echo $this->_tpl_vars['subcate']['custom_url']; ?>
?cat_id=<?php echo $this->_tpl_vars['subcate']['cat_id']; ?>
<?php else: ?><?php echo $this->_tpl_vars['subcate']['url']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['subcate']['cat_name']; ?>
</a></li>
                     <?php endforeach; endif; unset($_from); ?>
                </ol> 
				<?php endif; ?>
			</li>
            <?php endforeach; endif; unset($_from); ?>
        </ul>
 </div>
 
 