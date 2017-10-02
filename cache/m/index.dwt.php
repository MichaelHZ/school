<?php /* Smarty version 2.6.26, created on 2017-09-28 10:24:29
         compiled from index.dwt */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'index.dwt', 76, false),)), $this); ?>
﻿<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title><?php echo $this->_tpl_vars['page_title']; ?>
</title>
	<meta name="keywords" content="<?php echo $this->_tpl_vars['keywords']; ?>
" />
	<meta name="description" content="<?php echo $this->_tpl_vars['description']; ?>
" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="blank" />
    <meta name="format-detection" content="telephone=no" />  
    <link href="http://www.cssmxx.com/m/theme/school/images/style/reset_css.css" rel="stylesheet" />
    <link href="http://www.cssmxx.com/m/theme/school/images/style/jquery.bxslider.css" rel="stylesheet" />
	<link href="http://www.cssmxx.com/m/theme/school/images/style/swiper.min.css" rel="stylesheet" />
	<link href="http://www.cssmxx.com/m/theme/school/images/style/all.css" rel="stylesheet" />  
    <script src="http://www.cssmxx.com/m/theme/school/images/js/jquery.js"></script>
    <script src="http://www.cssmxx.com/m/theme/school/images/js/jquery.bxslider.js"></script>
	<script src="http://www.cssmxx.com/m/theme/school/images/js/swiper.min.js"></script>
    <script src="http://www.cssmxx.com/m/theme/school/images/js/load.js" defer></script>
</head>
<body>
	<div id="banner">
    	<div class="banner_nr">
           <?php $_from = $this->_tpl_vars['show_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['show'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['show']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['show']):
        $this->_foreach['show']['iteration']++;
?>
			<div class="slide_"><a href="<?php echo $this->_tpl_vars['show']['show_link']; ?>
"><img src="<?php echo $this->_tpl_vars['show']['show_img']; ?>
"/></a></div>
			<?php endforeach; endif; unset($_from); ?>
        </div>
	</div>
	<!-- banner结束 -->

	<div id="nav">
		<ul>
		   <?php $_from = $this->_tpl_vars['nav_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['nav'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['nav']):
        $this->_foreach['nav']['iteration']++;
?> 
			<li><a href="<?php echo $this->_tpl_vars['nav']['url']; ?>
"<?php if ($this->_tpl_vars['nav']['target']): ?> target="_blank"<?php endif; ?>><span></span><?php echo $this->_tpl_vars['nav']['nav_name']; ?>
</a></li>
			 <?php endforeach; endif; unset($_from); ?>
			
			
		</ul>
        <span class="clear"></span>
	</div>
	<!-- nav结束 -->

	<div id="GongGao">
		<strong>公告</strong>
        <div id="scrollDiv">
            <ul class="gonggaolist">
                <?php $_from = $this->_tpl_vars['play_article']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
                <li><a href="<?php echo $this->_tpl_vars['article']['url']; ?>
"><?php echo $this->_tpl_vars['article']['title']; ?>
</a></li>
                <?php endforeach; endif; unset($_from); ?>
               
            </ul>
         </div>        
		<span class="clear"></span>
	</div>
	<!-- GongGao结束 -->

	<div id="AD">
		<a href="<?php echo $this->_tpl_vars['fragment']['homead']['url']; ?>
" ><img src="<?php echo $this->_tpl_vars['fragment']['homead']['image']; ?>
" alt="图片描述" /></a>
	</div>
	<!-- AD结束 -->

	<div id="news">
			<h3 class="SubTitle">新闻速递 <a href="/m/news_category.php">更多 </a></h3>
             <?php $_from = $this->_tpl_vars['cat_3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>

			<div class="FocusNews">
            	<a href="<?php echo $this->_tpl_vars['article']['url']; ?>
">
                        <div class="photo">
                           <?php if ($this->_tpl_vars['article']['image']): ?>
                             <img src="<?php echo $this->_tpl_vars['article']['image']; ?>
" alt="图片描述" />
                            <?php else: ?>
                              <img src="<?php echo $this->_tpl_vars['fragment']['none']['image']; ?>
" alt="图片描述" />
                            <?php endif; ?>
                        </div>
                        <h5> <?php echo $this->_tpl_vars['article']['title']; ?>
</h5>
                        <p><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['description'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 26, "...") : smarty_modifier_truncate($_tmp, 26, "...")); ?>
 </p>
                        <span> 时间：<?php echo $this->_tpl_vars['article']['add_time']; ?>
 <?php if ($this->_tpl_vars['article']['source']): ?>作者：<?php echo $this->_tpl_vars['article']['source']; ?>
<?php endif; ?></span>
                </a>
			</div>
            <?php endforeach; endif; unset($_from); ?>
            
            
			
            
            
            
            
	</div>
	<!-- news结束 -->

	<div id="Teacher">
			<h3 class="SubTitle">我们的老师 <a href="/m/article_category.php?id=3">更多 </a></h3>
			<div class="swiper-container">
               <div class="swiper-wrapper">
			    <?php $_from = $this->_tpl_vars['teacher']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
			     <div class="swiper-slide">
					<div class="Teacher">
						<a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" class="pic">
						<?php if ($this->_tpl_vars['article']['image']): ?>
							<img src="<?php echo $this->_tpl_vars['article']['image']; ?>
" alt="图片描述" />
							<?php else: ?>
								<img src="<?php echo $this->_tpl_vars['fragment']['none']['image']; ?>
" alt="图片描述" class="photo"/>
							<?php endif; ?>
						</a>
						<strong><?php echo $this->_tpl_vars['article']['title']; ?>
</strong>
					</div>
				 </div>
			     <?php endforeach; endif; unset($_from); ?>
		      </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
            </div>  
		<span class="clear"></span>
	</div>
	<!-- Teacher结束 -->
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- footer结束 -->
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- menu结束 -->
</body>
</html>