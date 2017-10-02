<?php /* Smarty version 2.6.26, created on 2017-09-28 10:09:30
         compiled from header.htm */ ?>
<?php if (NEWTEMP != true): ?>
<div id="dcHead">
 <div id="head">
  <div class="logo"><a href="http://www.cssmxx.com"><img src="images/dclogo.gif" alt="logo"></a></div>
  <div class="nav">
   <ul>
    <li class="M"><a href="JavaScript:void(0);" class="topAdd"><?php echo $this->_tpl_vars['lang']['top_add']; ?>
</a>
     <div class="drop mTopad"><?php if ($this->_tpl_vars['lang']['top_add_product']): ?><a href="product.php?rec=add"><?php echo $this->_tpl_vars['lang']['top_add_product']; ?>
</a><?php endif; ?> <?php if ($this->_tpl_vars['lang']['top_add_article']): ?><a href="article.php?rec=add"><?php echo $this->_tpl_vars['lang']['top_add_article']; ?>
</a><?php endif; ?> <a href="nav.php?rec=add"><?php echo $this->_tpl_vars['lang']['top_add_nav']; ?>
</a> <a href="show.php"><?php echo $this->_tpl_vars['lang']['top_add_show']; ?>
</a> <a href="page.php?rec=add"><?php echo $this->_tpl_vars['lang']['top_add_page']; ?>
</a> <a href="manager.php?rec=add"><?php echo $this->_tpl_vars['lang']['top_add_manager']; ?>
</a> <a href="link.php"><?php echo $this->_tpl_vars['lang']['top_add_link']; ?>
</a> </div>
    </li>
    <li><a href="../index.php" target="_blank"><?php echo $this->_tpl_vars['lang']['top_go_site']; ?>
</a></li>
    <li><a href="index.php?rec=clear_cache"><?php echo $this->_tpl_vars['lang']['clear_cache']; ?>
</a></li>
     <!-- 
    <li><a href="http://help.douco.com" target="_blank"><?php echo $this->_tpl_vars['lang']['top_help']; ?>
</a></li>
    <li class="noRight"><a href="module.php"<?php if ($this->_tpl_vars['cur'] == 'module'): ?> class="cur"<?php endif; ?>><?php echo $this->_tpl_vars['lang']['top_module']; ?>
<?php if ($this->_tpl_vars['unum']['module']): ?><span class="unum"><span><?php echo $this->_tpl_vars['unum']['module']; ?>
</span></span><?php endif; ?></a></li>
       -->
   </ul>
   <ul class="navRight">
    <li class="M noLeft"><a href="JavaScript:void(0);"><?php echo $this->_tpl_vars['lang']['top_welcome']; ?>
<?php echo $this->_tpl_vars['user']['user_name']; ?>
</a>
     <div class="drop mUser">
      <a href="manager.php?rec=edit&id=<?php echo $this->_tpl_vars['user']['user_id']; ?>
"><?php echo $this->_tpl_vars['lang']['top_manager_edit']; ?>
</a>
      <a href="cloud.php?rec=account"><?php echo $this->_tpl_vars['lang']['cloud_account']; ?>
</a>
     </div>
    </li>
    <li class="noRight"><a href="login.php?rec=logout"><?php echo $this->_tpl_vars['lang']['top_logout']; ?>
</a></li>
   </ul>
  </div>
 </div>
</div>
<!-- dcHead 结束 -->
<?php else: ?>
<link href="templates/style/all.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="templates/js/easyscroll.js"></script>
<script type="text/javascript" src="templates/js/load.js"></script>
	<header id="header">
		<div id="msg">
                <a href="/admin/"><span class="msgicon_ msgicon_1x1"></span></a>
                <?php if ($this->_tpl_vars['process_auth']['ckboxCatAuth_adt']): ?>
               <a href="/admin/article.php?rec=auditing"><span class="msgicon_ msgicon_2x1"></span><ins><?php if ($this->_tpl_vars['auditing_count']): ?><?php echo $this->_tpl_vars['auditing_count']; ?>
<?php else: ?>0<?php endif; ?></ins></a>
                <?php endif; ?>
				<?php if ($this->_tpl_vars['process_auth']['ckboxMsg_look']): ?>
                <a href="/admin/guestbook.php"><span class="msgicon_ msgicon_3x1"></span><ins><?php if ($this->_tpl_vars['guest_count']): ?><?php echo $this->_tpl_vars['guest_count']; ?>
<?php else: ?>0<?php endif; ?></ins></a>
				 <?php endif; ?>
        </div>
		<!-- msg结束 -->

		<nav id="menu_new">
			<ul>
			    <?php if ($this->_tpl_vars['process_auth']['ckboxSys_nav']): ?>
				<li <?php if ($this->_tpl_vars['cur'] == 'system'): ?>class="change"<?php endif; ?>><a href="/admin/system.php" >系统设置</a></li>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['process_auth']['ckboxSys_banner']): ?>
				<li <?php if ($this->_tpl_vars['cur'] == 'show'): ?>class="change"<?php endif; ?>><a href="/admin/show.php">幻灯片管理</a></li>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['process_auth']['ckboxSys_single']): ?>
				<li <?php if ($this->_tpl_vars['cur'] == 'manager'): ?>class="change"<?php endif; ?>><a href="/admin/manager.php">网站成员管理</a></li>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['process_auth']['ckboxSys_dbbackup']): ?>
				<li <?php if ($this->_tpl_vars['cur'] == 'backup'): ?>class="change"<?php endif; ?>><a href="/admin/backup.php">数据库备份</a></li>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['process_auth']['ckboxSys_cleancache']): ?>
				<li <?php if ($this->_tpl_vars['cur'] == 'clear_cache'): ?>class="change"<?php endif; ?>><a href="/admin/index.php?rec=clear_cache">清除缓存</a></li>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['process_auth']['ckboxSys_record']): ?>
				<li <?php if ($this->_tpl_vars['cur'] == 'manager_log'): ?>class="change"<?php endif; ?>><a href="/admin/manager.php?rec=manager_log">操作记录</a></li>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['IS_ADMIN']): ?>
				<li <?php if ($this->_tpl_vars['cur'] == 'nav'): ?>class="change"<?php endif; ?>><a href="/admin/nav.php?type=index">自定义导航</a></li>
				<li <?php if ($this->_tpl_vars['cur'] == 'article_category'): ?>class="change"<?php endif; ?>><a href="/admin/article_category.php">栏目管理</a></li>
				<li <?php if ($this->_tpl_vars['cur'] == 'managergroup'): ?>class="change"<?php endif; ?>><a href="/admin/managergroup.php?type=index">权限组</a></li>
				<li <?php if ($this->_tpl_vars['cur2'] == 'managergrouplist'): ?>class="change"<?php endif; ?>><a href="/admin/managergrouplist.php">权限设置</a></li>
				
				<?php endif; ?>
			</ul>
		</nav>
		<!-- menu结束 -->

		<div id="usernav">
        
        <a href="login.php?rec=logout" class="btn_exit">退出</a>			<span class="welcome">你好：<?php echo $this->_tpl_vars['_USER_']['nick_name']; ?>
</span> 
             <!-- 
			<form action="" class="Searchform" method="post">
			<input name="txt" type="text" class="text"/><button class="btn_send"  type="submit">搜索</button>
			</form>
			 -->
		</div>
		<!-- usernav结束 -->

		<span class="clear"></span>
		<!-- 清除浮动 -->
	</header>
	<!-- header结束 -->
<?php endif; ?>