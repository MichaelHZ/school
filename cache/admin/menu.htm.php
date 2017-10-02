<?php /* Smarty version 2.6.26, created on 2017-09-28 10:09:30
         compiled from menu.htm */ ?>
<?php if (NEWTEMP != true): ?>
<div id="menu">
	<ul class="top">
		<li><a href="index.php"><i class="home"></i><em><?php echo $this->_tpl_vars['lang']['menu_home']; ?>
<?php if ($this->_tpl_vars['unum']['system']): ?>
				
				<?php endif; ?></em></a></li>
	</ul>
	<ul>
		<li <?php if ($this->_tpl_vars['cur'] == 'system'): ?> class="cur"<?php endif; ?>><a href="system.php"><i
				class="system"></i><em><?php echo $this->_tpl_vars['lang']['system']; ?>
</em></a></li>
		<li <?php if ($this->_tpl_vars['cur'] == 'nav'): ?> class="cur"<?php endif; ?>><a href="nav.php"><i
				class="nav"></i><em><?php echo $this->_tpl_vars['lang']['nav']; ?>
</em></a></li>
		<li <?php if ($this->_tpl_vars['cur'] == 'show'): ?> class="cur"<?php endif; ?>><a href="show.php"><i
				class="show"></i><em><?php echo $this->_tpl_vars['lang']['show']; ?>
</em></a></li>
		<li <?php if ($this->_tpl_vars['cur'] == 'page'): ?> class="cur"<?php endif; ?>><a href="page.php"><i
				class="page"></i><em><?php echo $this->_tpl_vars['lang']['menu_page']; ?>
</em></a></li>
	</ul>
	<?php if (! $this->_tpl_vars['workspace']['menu_column'] && ! $this->_tpl_vars['workspace']['menu_single']): ?>
	<?php $_from = $this->_tpl_vars['workspace']['menu_simple']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['menu']):
?>
	<ul>

		<li <?php if ($this->_tpl_vars['cur'] == $this->_tpl_vars['menu']['unique_id']): ?> class="cur"<?php endif; ?>><a
			href="page.php?rec=edit&id=<?php echo $this->_tpl_vars['menu']['id']; ?>
"><i></i><em><?php echo $this->_tpl_vars['menu']['page_name']; ?>
</em></a></li>
		<?php $_from = $this->_tpl_vars['menu']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child']):
?>
		<li <?php if ($this->_tpl_vars['cur'] == $this->_tpl_vars['child']['unique_id']): ?> class="cur"<?php endif; ?>><a
			href="page.php?rec=edit&id=<?php echo $this->_tpl_vars['child']['id']; ?>
"><i class="menuPage"></i><em><?php echo $this->_tpl_vars['child']['page_name']; ?>
</em></a></li>
		<?php endforeach; endif; unset($_from); ?>
	</ul>
	<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>
	<?php $_from = $this->_tpl_vars['workspace']['menu_column']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['menu']):
?>
	<ul>

		<li <?php if ($this->_tpl_vars['cur'] == $this->_tpl_vars['menu']['name_category']): ?> class="cur"<?php endif; ?>><a
			href="<?php echo $this->_tpl_vars['menu']['name_category']; ?>
.php"><i class="<?php echo $this->_tpl_vars['menu']['name']; ?>
Cat"></i><em><?php echo $this->_tpl_vars['menu']['lang_category']; ?>
</em></a></li>
		<li <?php if ($this->_tpl_vars['cur'] == $this->_tpl_vars['menu']['name']): ?> class="cur"<?php endif; ?>><a
			href="<?php echo $this->_tpl_vars['menu']['name']; ?>
.php"><i class="<?php echo $this->_tpl_vars['menu']['name']; ?>
"></i><em><?php echo $this->_tpl_vars['menu']['lang']; ?>
</em></a></li>
	</ul>
	<?php endforeach; endif; unset($_from); ?>
	<!-- 
	<ul >
		<li <?php if ($this->_tpl_vars['cur'] == 'music_category'): ?> class="cur"<?php endif; ?>><a href="music_category.php"><i class="musicCat"></i><em>音乐分类</em></a></li>
        <li <?php if ($this->_tpl_vars['cur'] == 'music'): ?>class="cur"<?php endif; ?>><a href="music.php"><i class="music"></i><em>音乐列表</em></a></li>
    </ul>
     -->
	<?php if ($this->_tpl_vars['workspace']['menu_single']): ?>
	<ul>
		<?php $_from = $this->_tpl_vars['workspace']['menu_single']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['menu']):
?>
		<li <?php if ($this->_tpl_vars['cur'] == $this->_tpl_vars['menu']['name']): ?> class="cur"<?php endif; ?>><a
			href="<?php echo $this->_tpl_vars['menu']['name']; ?>
.php"><i class="<?php echo $this->_tpl_vars['menu']['name']; ?>
"></i><em><?php echo $this->_tpl_vars['menu']['lang']; ?>
<?php if ($this->_tpl_vars['menu']['name'] == 'plugin'): ?><?php if ($this->_tpl_vars['unum']['plugin']): ?><span class="unum"><span><?php echo $this->_tpl_vars['unum']['plugin']; ?>
</span></span><?php endif; ?><?php endif; ?></em></a></li>
		<?php endforeach; endif; unset($_from); ?>
	</ul>
	<?php endif; ?>
	
	<ul class="bot">
		<li <?php if ($this->_tpl_vars['cur'] == 'blog_list'): ?> class="cur"<?php endif; ?>><a href="blog_list.php"><i
				class="blog_list"></i><em>博客推荐</em></a></li>
		<li <?php if ($this->_tpl_vars['cur'] == 'backup'): ?> class="cur"<?php endif; ?>><a href="backup.php"><i
				class="backup"></i><em><?php echo $this->_tpl_vars['lang']['backup']; ?>
</em></a></li>
		<li <?php if ($this->_tpl_vars['cur'] == 'mobile'): ?> class="cur"<?php endif; ?>><a href="mobile.php"><i
				class="mobile"></i><em><?php echo $this->_tpl_vars['lang']['mobile']; ?>
</em></a></li>
		<li <?php if ($this->_tpl_vars['cur'] == 'theme'): ?> class="cur"<?php endif; ?>><a href="theme.php"><i
				class="theme"></i><em><?php echo $this->_tpl_vars['lang']['theme']; ?>
<?php if ($this->_tpl_vars['unum']['theme']): ?>
					<span class="unum"><span><?php echo $this->_tpl_vars['unum']['theme']; ?>
</span></span>
				<?php endif; ?></em></a></li>
		<li <?php if ($this->_tpl_vars['cur'] == 'manager'): ?> class="cur"<?php endif; ?>><a href="manager.php"><i
				class="manager"></i><em><?php echo $this->_tpl_vars['lang']['manager']; ?>
</em></a></li>
		<li <?php if ($this->_tpl_vars['cur2'] == 'managergrouplist'): ?> class="cur"<?php endif; ?>><a
			href="managergrouplist.php"><i class="managergrouplist"></i><em>权限设置</em></a></li>
		 
  <li<?php if ($this->_tpl_vars['cur'] == 'managergroup'): ?> class="cur"<?php endif; ?>><a href="managergroup.php"><i class="managergroup"></i><em>权限组</em></a></li>
   
		<li <?php if ($this->_tpl_vars['cur'] == 'manager_log'): ?> class="cur"<?php endif; ?>><a
			href="manager.php?rec=manager_log"><i class="managerLog"></i><em><?php echo $this->_tpl_vars['lang']['manager_log']; ?>
</em></a></li>
	</ul>
</div>
<?php else: ?>
<nav id="nav">
	<a href="http://www.cssmxx.com" class="logo"><img src="images/logo.png" /> </a>

    
	<ul>
	    <?php $_from = $this->_tpl_vars['left_auth']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['left_nav']):
?>
		
		 
		
		<li><a <?php if ($this->_tpl_vars['cat_group']['one'] == $this->_tpl_vars['left_nav']['cat_id']): ?>class="change btn_openmenu"<?php endif; ?> href="<?php if ($this->_tpl_vars['left_nav']['c']): ?>#<?php else: ?>/admin/article.php?cat_id=<?php echo $this->_tpl_vars['left_nav']['cat_id']; ?>
<?php endif; ?>">
         <span class="navicon navicon1x<?php echo $this->_tpl_vars['k']+1; ?>
"></span><?php echo $this->_tpl_vars['left_nav']['cat_name']; ?>
</a>
		    <?php if ($this->_tpl_vars['left_nav']['c']): ?>		
			<ol>
			    <?php $_from = $this->_tpl_vars['left_nav']['c']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child']):
?>
			    <?php if ($this->_tpl_vars['child']['cat_id'] != '68'): ?> 
				<li <?php if ($this->_tpl_vars['cat_group']['two'] == $this->_tpl_vars['child']['cat_id']): ?>class="hover"<?php endif; ?>><a href="<?php if ($this->_tpl_vars['child']['child']): ?>#<?php else: ?><?php if ($this->_tpl_vars['child']['cat_id'] == 74): ?>/admin/gallery.php?cat_id=<?php echo $this->_tpl_vars['child']['cat_id']; ?>
<?php else: ?>/admin/article.php?cat_id=<?php echo $this->_tpl_vars['child']['cat_id']; ?>
<?php endif; ?><?php endif; ?>"><?php echo $this->_tpl_vars['child']['cat_name']; ?>
</a>
				<?php if ($this->_tpl_vars['child']['child']): ?>
				<div class="threelevelmenu">
				    <?php $_from = $this->_tpl_vars['child']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sub']):
?>
					<a href="/admin/article.php?cat_id=<?php echo $this->_tpl_vars['sub']['cat_id']; ?>
"><?php echo $this->_tpl_vars['sub']['cat_name']; ?>
</a> 
					<?php endforeach; endif; unset($_from); ?>
				</div>
				<?php endif; ?>
				</li>	
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			</ol>	
			<?php endif; ?>
			</li>
		
		<?php endforeach; endif; unset($_from); ?>
		<!-- 博客 -->
		<?php if ($this->_tpl_vars['process_auth']['ckboxBlok_open']): ?>
		  <li><a href="/admin/blog.php" style="color:#fff;" class="btn_openmenu">
		  <span class="navicon navicon1x10" ></span>博客</a>
		  </li>
		<?php endif; ?>
		<!-- 博客 -->
		<?php if ($this->_tpl_vars['IS_ADMIN']): ?>
		  <li><a href="/admin/blog_list.php" style="color:#fff;" class="btn_openmenu">
		  <span class="navicon navicon1x10" ></span>推荐</a>
		  </li>
		<?php endif; ?>
		  <li><a href="/admin/manager.php?rec=edit&id=<?php echo $this->_tpl_vars['_USER_']['user_id']; ?>
" style="color:#fff;" class="btn_openmenu">
		  <span class="navicon navicon1x2" ></span>个人</a>
		  </li>
		
	</ul>

</nav>
<!-- nav结束 -->
<?php endif; ?>