<?php /* Smarty version 2.6.26, created on 2017-09-28 13:40:52
         compiled from search.dwt */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'search.dwt', 31, false),)), $this); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>搜索结果列表页</title>
	<link href="http://www.cssmxx.com/theme/school/images/style/reset_css.css" rel="stylesheet" />
	<link href="http://www.cssmxx.com/theme/school/images/style/all.css" rel="stylesheet" />
	<!--[if IE]>
	<script src="js/html5.js"></script>
	<![endif]-->
</head>
<body style="background:#fff url(images/searchpage_pic.png) no-repeat right top;">
	<div id="SearchHeader">
		<div class="logos">
		<img src="http://www.cssmxx.com/theme/school/images/logo.gif" alt="图片描述" />
		</div>
		<form action="<?php echo $this->_tpl_vars['site']['root_url']; ?>
" class="form" method="post">
		<p><a href="/">返回首页</a>/<a href="/">BACK TO HOME</a></p>
		<input  name="s" type="text" class="text" /> 
		 <button class="btn_send"  type="submit">提交</button>
		</form>
        <span class="clear"></span>
	</div>
	<!-- SearchHeader结束 -->

	<div id="SearchContent">
	      <?php if ($this->_tpl_vars['search_list']): ?>
          <?php $_from = $this->_tpl_vars['search_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['article_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['article_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['article']):
        $this->_foreach['article_list']['iteration']++;
?> 
		<div class="docs">
                <h5> <a href="<?php if ($this->_tpl_vars['article']['ctype']): ?>/article_category.php?id=<?php echo $this->_tpl_vars['get_cat']['child']; ?>
&ctype=create_<?php echo $this->_tpl_vars['article']['id']; ?>
<?php else: ?><?php echo $this->_tpl_vars['article']['url']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['article']['title']; ?>
 </a></h5>
                <p><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['description'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 96, "...") : smarty_modifier_truncate($_tmp, 96, "...")); ?>
 </p>
                <div class="docValue">
                        <a href="<?php if ($this->_tpl_vars['article']['ctype']): ?>/article_category.php?id=<?php echo $this->_tpl_vars['get_cat']['child']; ?>
&ctype=create_<?php echo $this->_tpl_vars['article']['id']; ?>
<?php else: ?><?php echo $this->_tpl_vars['article']['url']; ?>
<?php endif; ?>" target="_blank"><?php if ($this->_tpl_vars['article']['ctype']): ?>/article_category.php?id=<?php echo $this->_tpl_vars['get_cat']['child']; ?>
&ctype=create_<?php echo $this->_tpl_vars['article']['id']; ?>
<?php else: ?><?php echo $this->_tpl_vars['article']['url']; ?>
<?php endif; ?>  </a>
                        <span>分类：<a href="<?php echo $this->_tpl_vars['article']['cat_url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['article']['cat_name_1']; ?>
</a> </span>
                        <span>点击：<ins><?php echo $this->_tpl_vars['article']['click']; ?>
</ins> </span><span>日期：<time><?php echo $this->_tpl_vars['article']['add_time']; ?>
</time> </span>
                </div>
		</div>
        <!-- .docs结束 -->
  		<span class="clear"></span>
       
         <?php endforeach; endif; unset($_from); ?> 
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/pager.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
         <?php else: ?>
          <div class="docs"> <h5 style="text-align:center">对不起！没有您要搜索的内容</h5></div>
         <?php endif; ?>
        
        
	</div>
	<!-- SearchContent结束 -->

	<div id="daohang">
		<h4><span>daohang</span>导航</h4>
		<ul>
		   <?php $_from = $this->_tpl_vars['nav_middle_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['nav_middle_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_middle_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['nav']):
        $this->_foreach['nav_middle_list']['iteration']++;
?>
			<li><a href="<?php echo $this->_tpl_vars['nav']['url']; ?>
" <?php if ($this->_tpl_vars['nav']['target']): ?> target="_blank"<?php endif; ?>><?php echo $this->_tpl_vars['nav']['nav_name']; ?>
</a></li>
			<?php endforeach; endif; unset($_from); ?>
		</ul>
	</div>
	<!-- daohang结束 -->

	<div id="weixin">
		<img src="http://www.cssmxx.com/theme/school/images/weixin.jpg" alt="图片描述" />
	</div>
	<!-- weixin结束 -->

	<div id="copyright2">
		Copyright &copy; 常熟市石梅小学 All rights reserved. 苏ICP备08004760号
	</div>
	<!-- copyright2结束 -->
</body>
</html>