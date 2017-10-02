<?php /* Smarty version 2.6.26, created on 2017-09-28 10:09:30
         compiled from inc/menu.tpl */ ?>
<span class="menu_space"></span>
	<nav id="menu">
		<ul>
			<li <?php if ($this->_tpl_vars['_current'] == 1): ?>class="change"<?php endif; ?>><a href="/m/"><span class="icon1"></span> 首页</a></li>
			<li <?php if ($this->_tpl_vars['_current'] == 2): ?>class="change"<?php endif; ?>><a href="/m/news_category.php"><span class="icon2"></span> 新闻速递</a></li>
			<li <?php if ($this->_tpl_vars['_current'] == 3): ?>class="change"<?php endif; ?>><a href="/m/article_category.php?id=4"><span class="icon3"></span> 回眸</a></li>
			<li <?php if ($this->_tpl_vars['_current'] == 4): ?>class="change"<?php endif; ?>><a href="/m/guestbook.php?cat_id=69"><span class="icon4"></span> 留言板</a></li>
		</ul>
	</nav>
<!-- menu结束 -->