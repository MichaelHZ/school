<?php /* Smarty version 2.6.26, created on 2017-10-15 15:24:55
         compiled from index.dwt */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'index.dwt', 41, false),)), $this); ?>
﻿<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="keywords" content="<?php echo $this->_tpl_vars['keywords']; ?>
" />
    <meta name="description" content="<?php echo $this->_tpl_vars['description']; ?>
" />
    <title><?php echo $this->_tpl_vars['page_title']; ?>
</title>
	<link href="http://www.bc.com/theme/baoci/images/style/reset_css.css" rel="stylesheet" />
	<link href="http://www.bc.com/theme/baoci/images/style/all.css" rel="stylesheet" />
	<script src="http://www.bc.com/theme/baoci/images/js/jquery.js"></script>
    <script src="http://www.bc.com/theme/baoci/images/js/jqueryslider.js"></script>
    <script src="http://www.bc.com/theme/baoci/images/js/gundong.js"></script>
	<script src="http://www.bc.com/theme/baoci/images/js/load.js"></script>
	<!--[if lt IE 9]>  
		<script language="javascript" type="text/javascript" src="http://www.bc.com/theme/baoci/images/js/html5.js"></script>
	<![endif]-->
</head>
<body>
	 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- header结束 -->
     <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/banner.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- banner结束 -->

	<div id="m1">
    	<div class="center">
    
    
		<section id="News">
        
            <form action="" class="Searchform" method="post">
                <input name="s" type="text" class="text" id="keys" placeholder="请输入关键词" autocomplete="off"/> <button class="btn_send"  type="submit">搜索</button>
                </form>
                        
 			<h3 class="PartTitle"> <em>最新动态 </em> <span>新闻中心</span> <a href="#"> MORE +</a> </h3>
       
  
        		<div class="Tab_nr">
					<div class="FocusNews">
                    	<span class="icon"><img src="http://www.bc.com/theme/baoci/images/icon_topic.png" ></span>
						<a href="<?php echo $this->_tpl_vars['news_top']['url']; ?>
" class="photo"><img src="<?php echo $this->_tpl_vars['news_top']['image']; ?>
" alt="<?php echo $this->_tpl_vars['news_top']['title']; ?>
" /></a>
						<h4><time><?php echo $this->_tpl_vars['news_top']['add_time']; ?>
</time><a href="<?php echo $this->_tpl_vars['news_top']['url']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['news_top']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 16, "...") : smarty_modifier_truncate($_tmp, 16, "...")); ?>
</a></h4>
						<p><?php echo $this->_tpl_vars['news_top']['description']; ?>
<a href="<?php echo $this->_tpl_vars['news_top']['url']; ?>
">【了解详情】</a>
						</p>
					</div>
					<ul class="NewsList">
                        <?php $_from = $this->_tpl_vars['news_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news_list']):
?>
						<li><time><?php echo $this->_tpl_vars['news_list']['add_time']; ?>
</time><a href="<?php echo $this->_tpl_vars['news_list']['url']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['news_list']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 26, "...") : smarty_modifier_truncate($_tmp, 26, "...")); ?>
</a></li>
                        <?php endforeach; endif; unset($_from); ?>
					</ul>
                
                </div>
                <!-- .Tab_nr结束 -->
		</section>
		<!-- News结束 -->

		<section id="Gonggao">
			<h3 class="PartTitle"> <em>校园公告 </em> <a href="#"> MORE +</a> </h3>
            <div id="GonggaoGundong">
                <?php $_from = $this->_tpl_vars['notice_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['notice_list']):
?>
                    <div class="gonggaoList">
                            <h5><a href="<?php echo $this->_tpl_vars['notice_list']['url']; ?>
"><?php echo $this->_tpl_vars['notice_list']['title']; ?>
 </a> </h5>
                            <p><?php echo $this->_tpl_vars['notice_list']['description']; ?>
<a href="<?php echo $this->_tpl_vars['notice_list']['url']; ?>
">【了解详情】 </a> </p>
                            <time><?php echo $this->_tpl_vars['notice_list']['add_time_ym']; ?>
 <em> <?php echo $this->_tpl_vars['notice_list']['add_time_d']; ?>
</em></time>
                    </div>
                <?php endforeach; endif; unset($_from); ?>

            </div>
            
		</section>
		<!-- Gonggao结束 -->

		<span class="clear"></span>
        
        </div>
		<span class="line_x_bai"></span>
        <span class="left_top_pic"><img src="http://www.bc.com/theme/baoci/images/float_pic7.png" ></span>
	</div>
	<!-- m1结束 -->

	<section id="Cheerforyou">
    	<div class="center">
			<h3 class="MainTitle"><span>Cheer for you</span><em>为您喝彩 </em></h3>
            
            
			<div class="FocusColumn">
				<a href="<?php echo $this->_tpl_vars['fragment']['tstyle']['link']; ?>
" class="photo" > <img src="<?php echo $this->_tpl_vars['fragment']['tstyle']['image']; ?>
" alt="<?php echo $this->_tpl_vars['fragment']['tstyle']['text']; ?>
 " /><i class="icon_fdj"></i></a>
				<div class="text">
                    <h5><?php echo $this->_tpl_vars['fragment']['tstyle']['name']; ?>
</h5>

                    <p><?php echo $this->_tpl_vars['fragment']['tstyle']['text']; ?>
</p><i class="arrow"></i>
                </div>
			</div>
            
            
			<div class="FocusColumn">
				<div class="text"><i class="arrow2"></i>
                    <h5><?php echo $this->_tpl_vars['fragment']['taward']['name']; ?>
</h5>
                    <p><?php echo $this->_tpl_vars['fragment']['taward']['text']; ?>
</p>
                </div>
				<a href="<?php echo $this->_tpl_vars['fragment']['taward']['link']; ?>
" class="photo" > <img src="<?php echo $this->_tpl_vars['fragment']['taward']['image']; ?>
" alt="<?php echo $this->_tpl_vars['fragment']['taward']['text']; ?>
 " /><i class="icon_fdj"></i></a>
			</div>


            <div class="FocusColumn">
                <a href="<?php echo $this->_tpl_vars['fragment']['sstyle']['link']; ?>
" class="photo" > <img src="<?php echo $this->_tpl_vars['fragment']['sstyle']['image']; ?>
" alt="<?php echo $this->_tpl_vars['fragment']['sstyle']['text']; ?>
 " /><i class="icon_fdj"></i></a>
                <div class="text">
                    <h5><?php echo $this->_tpl_vars['fragment']['sstyle']['name']; ?>
</h5>

                    <p><?php echo $this->_tpl_vars['fragment']['sstyle']['text']; ?>
</p><i class="arrow"></i>
                </div>
            </div>


            <div class="FocusColumn">
                <div class="text"><i class="arrow2"></i>
                    <h5><?php echo $this->_tpl_vars['fragment']['saward']['name']; ?>
</h5>
                    <p><?php echo $this->_tpl_vars['fragment']['saward']['text']; ?>
</p>
                </div>
                <a href="<?php echo $this->_tpl_vars['fragment']['saward']['link']; ?>
" class="photo" > <img src="<?php echo $this->_tpl_vars['fragment']['saward']['image']; ?>
" alt="<?php echo $this->_tpl_vars['fragment']['saward']['text']; ?>
 " /><i class="icon_fdj"></i></a>
            </div>
            
            
          <span class="clear"></span>  
		<span class="line_x_hui"></span>
		</div>
        <span class="right_top_pic"><img src="http://www.bc.com/theme/baoci/images/float_pic8.png"></span>
	</section>
	<!-- Cheerforyou结束 -->

	<section id="Interest">
    	<div class="center">
                <h3 class="MainTitle"> <span> your interest</span><em>请您关注  </em></h3>
                <div id="InterestBanner">
                    <div class="conbox">

                        <?php $_from = $this->_tpl_vars['school_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['school_list']):
?>
                            <div class="Slide_"> <a title="<?php echo $this->_tpl_vars['school_list']['title']; ?>
" href="<?php echo $this->_tpl_vars['school_list']['url']; ?>
"> <img src="<?php echo $this->_tpl_vars['school_list']['image']; ?>
" class="mainpic"></a></div>
                        <?php endforeach; endif; unset($_from); ?>

                        <?php $_from = $this->_tpl_vars['teacher_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['teacher_list']):
?>
                        <div class="Slide_"> <a title="<?php echo $this->_tpl_vars['teacher_list']['title']; ?>
" href="<?php echo $this->_tpl_vars['teacher_list']['url']; ?>
"> <img src="<?php echo $this->_tpl_vars['teacher_list']['image']; ?>
" class="mainpic"></a></div>
                        <?php endforeach; endif; unset($_from); ?>

                        <?php $_from = $this->_tpl_vars['team_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['team_list']):
?>
                        <div class="Slide_"> <a title="<?php echo $this->_tpl_vars['team_list']['title']; ?>
" href="<?php echo $this->_tpl_vars['team_list']['url']; ?>
"> <img src="<?php echo $this->_tpl_vars['team_list']['image']; ?>
" class="mainpic"></a></div>
                        <?php endforeach; endif; unset($_from); ?>

                        <?php $_from = $this->_tpl_vars['genearch_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['genearch_list']):
?>
                        <div class="Slide_"> <a title="<?php echo $this->_tpl_vars['genearch_list']['title']; ?>
" href="<?php echo $this->_tpl_vars['genearch_list']['url']; ?>
"> <img src="<?php echo $this->_tpl_vars['genearch_list']['image']; ?>
" class="mainpic"></a></div>
                        <?php endforeach; endif; unset($_from); ?>

                    </div>
                    
                    <ul class="nav_text">
                    	<li class="change">美丽校园</li>
                    	<li>教师团队</li>
                    	<li>社团掠影</li>
                    	<li>家长园地</li>
                    </ul>
                </div>
        
        
                 <div id="InterestDoc">
                        <ul class="InterestTab">
                            <li class="change"><a href="#">校务文件</a></li>
                            <li><a href="#">校务公开</a></li>
                        </ul>         	    	
                        <span class="clear"></span>  
                        <div class="Tab_nr">
                            <ul class="NewsList">
                                <?php $_from = $this->_tpl_vars['file_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['file_list']):
?>
                                <li> <time><?php echo $this->_tpl_vars['file_list']['add_time']; ?>
</time><a href="#"><?php echo ((is_array($_tmp=$this->_tpl_vars['file_list']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 26, "...") : smarty_modifier_truncate($_tmp, 26, "...")); ?>
</a></li>
                                <?php endforeach; endif; unset($_from); ?>

                            </ul>   
                        </div>
                        <!-- .Tab_nr结束 -->
                        
                     
                        <div class="Tab_nr">
                            <ul class="NewsList">
                                <?php $_from = $this->_tpl_vars['public_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['public_list']):
?>
                                <li> <time><?php echo $this->_tpl_vars['public_list']['add_time']; ?>
</time><a href="#"><?php echo ((is_array($_tmp=$this->_tpl_vars['public_list']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 26, "...") : smarty_modifier_truncate($_tmp, 26, "...")); ?>
</a></li>
                                <?php endforeach; endif; unset($_from); ?>

                            </ul>   
                        </div>
                        <!-- .Tab_nr结束 -->
                        
                      <a href="#" class="btn_more">more+</a>
                </div>
                <!-- InterestDoc结束 -->
                
                <span class="clear"></span>
		<span class="line_x_bai"></span>
		</div>
        <span class="left_bom_pic"><img src="http://www.bc.com/theme/baoci/images/float_pic5.png"></span>
        <span class="right_bom_pic"><img src="http://www.bc.com/theme/baoci/images/float_pic6.png"></span>
	</section>
	<!-- Interest结束 -->

	<nav id="quicklink">
    	<div class="center">
            <?php $_from = $this->_tpl_vars['nav_top_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['nav_top_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_top_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['nav']):
        $this->_foreach['nav_top_list']['iteration']++;
?>
            <?php $this->assign('index', ($this->_foreach['nav_top_list']['iteration']-1)+1); ?>
                <dl>
                    <dt><span class="icon"><i class="icons_ icons_<?php echo $this->_tpl_vars['index']; ?>
x1"></i></span> <?php echo $this->_tpl_vars['nav']['nav_name']; ?>
</dt>
                    <dd> <?php echo $this->_tpl_vars['nav']['nav_alias']; ?>

                </dd>
                </dl>
            <?php endforeach; endif; unset($_from); ?>

        
       
        <span class="clear"></span>
        </div>
        
	</nav>
	<!-- quicklink结束 -->

	<div id="SpecialtyCourses">
    	<div class="center">
                
                <h3 class="MainTitle"> <span> Speclalty courses</span><em>特色课程  </em></h3>
                        <ul class="fenlei">
                            <li class="change"> <a href="javascript:;">木子版画</a></li>
                            <li><a href="javascript:;">预留栏目</a></li>
                            <li><a href="javascript:;">木子版画</a></li>
                            <li><a href="javascript:;">预留栏目</a></li>
                            <li><a href="javascript:;">木子版画</a></li>
                            <li><a href="javascript:;">预留栏目</a></li>
                        </ul>
                
                	<div class="Intr_nr">
                            <div class="Intr_fenlei">
                                <h5 class="Title">木子版画 </h5>
                                <ul class="SortList2">
                                    <li class="change"><a href="#">&bull; 木子简介</a></li>
                                    <li><a href="#">&bull; 木子作品</a></li>
                                    <li><a href="#">&bull; 木子大师</a></li>
                                    <li><a href="#">&bull; 木子画家</a></li>
                                    <li><a href="#">&bull; 木子课程</a></li>
                                    <li><a href="#">&bull; 木子技法</a></li>
                                </ul>
                            </div>
                            
                            <div class="conbox">
                                    <div class="Slide_"> <a title="图片展示" href="#"> <img src="http://www.bc.com/theme/baoci/images/banner.jpg" class="mainpic"></a></div>
                                    <div class="Slide_"> <a title="图片展示" href="#"><img src="http://www.bc.com/theme/baoci/images/banner.jpg" class="mainpic"></a></div>
                                    <div class="Slide_"> <a title="图片展示" href="#"><img src="http://www.bc.com/theme/baoci/images/banner.jpg" class="mainpic"></a></div>
                            </div>
                    
                    </div>
                    <!-- .Intr_nr结束 -->


                	<div class="Intr_nr">
                            <div class="Intr_fenlei">
                                <h5 class="Title">2木子版画 </h5>
                                <ul class="SortList2">
                                    <li class="change"><a href="#">&bull; 木子简介</a></li>
                                    <li><a href="#">&bull; 木子作品</a></li>
                                    <li><a href="#">&bull; 木子大师</a></li>
                                    <li><a href="#">&bull; 木子画家</a></li>
                                    <li><a href="#">&bull; 木子课程</a></li>
                                    <li><a href="#">&bull; 木子技法</a></li>
                                </ul>
                            </div>
                            
                            <div class="conbox">
                                    <div class="Slide_"> <a title="图片展示" href="#"> <img src="http://www.bc.com/theme/baoci/images/banner.jpg" class="mainpic"></a></div>
                                    <div class="Slide_"> <a title="图片展示" href="#"><img src="http://www.bc.com/theme/baoci/images/banner.jpg" class="mainpic"></a></div>
                                    <div class="Slide_"> <a title="图片展示" href="#"><img src="http://www.bc.com/theme/baoci/images/banner.jpg" class="mainpic"></a></div>
                            </div>
                    
                    </div>
                    <!-- .Intr_nr结束 -->


                	<div class="Intr_nr">
                            <div class="Intr_fenlei">
                                <h5 class="Title">3木子版画 </h5>
                                <ul class="SortList2">
                                    <li class="change"><a href="#">&bull; 木子简介</a></li>
                                    <li><a href="#">&bull; 木子作品</a></li>
                                    <li><a href="#">&bull; 木子大师</a></li>
                                    <li><a href="#">&bull; 木子画家</a></li>
                                    <li><a href="#">&bull; 木子课程</a></li>
                                    <li><a href="#">&bull; 木子技法</a></li>
                                </ul>
                            </div>
                            
                            <div class="conbox">
                                    <div class="Slide_"> <a title="图片展示" href="#"> <img src="http://www.bc.com/theme/baoci/images/banner.jpg" class="mainpic"></a></div>
                                    <div class="Slide_"> <a title="图片展示" href="#"><img src="http://www.bc.com/theme/baoci/images/banner.jpg" class="mainpic"></a></div>
                                    <div class="Slide_"> <a title="图片展示" href="#"><img src="http://www.bc.com/theme/baoci/images/banner.jpg" class="mainpic"></a></div>
                            </div>
                    
                    </div>
                    <!-- .Intr_nr结束 -->

                	<div class="Intr_nr">
                            <div class="Intr_fenlei">
                                <h5 class="Title">4木子版画 </h5>
                                <ul class="SortList2">
                                    <li class="change"><a href="#">&bull; 木子简介</a></li>
                                    <li><a href="#">&bull; 木子作品</a></li>
                                    <li><a href="#">&bull; 木子大师</a></li>
                                    <li><a href="#">&bull; 木子画家</a></li>
                                    <li><a href="#">&bull; 木子课程</a></li>
                                    <li><a href="#">&bull; 木子技法</a></li>
                                </ul>
                            </div>
                            
                            <div class="conbox">
                                    <div class="Slide_"> <a title="图片展示" href="#"> <img src="http://www.bc.com/theme/baoci/images/banner.jpg" class="mainpic"></a></div>
                                    <div class="Slide_"> <a title="图片展示" href="#"><img src="http://www.bc.com/theme/baoci/images/banner.jpg" class="mainpic"></a></div>
                                    <div class="Slide_"> <a title="图片展示" href="#"><img src="http://www.bc.com/theme/baoci/images/banner.jpg" class="mainpic"></a></div>
                            </div>
                    
                    </div>
                    <!-- .Intr_nr结束 -->

                	<div class="Intr_nr">
                            <div class="Intr_fenlei">
                                <h5 class="Title">5木子版画 </h5>
                                <ul class="SortList2">
                                    <li class="change"><a href="#">&bull; 木子简介</a></li>
                                    <li><a href="#">&bull; 木子作品</a></li>
                                    <li><a href="#">&bull; 木子大师</a></li>
                                    <li><a href="#">&bull; 木子画家</a></li>
                                    <li><a href="#">&bull; 木子课程</a></li>
                                    <li><a href="#">&bull; 木子技法</a></li>
                                </ul>
                            </div>
                            
                            <div class="conbox">
                                    <div class="Slide_"> <a title="图片展示" href="#"> <img src="http://www.bc.com/theme/baoci/images/banner.jpg" class="mainpic"></a></div>
                                    <div class="Slide_"> <a title="图片展示" href="#"><img src="http://www.bc.com/theme/baoci/images/banner.jpg" class="mainpic"></a></div>
                                    <div class="Slide_"> <a title="图片展示" href="#"><img src="http://www.bc.com/theme/baoci/images/banner.jpg" class="mainpic"></a></div>
                            </div>
                    
                    </div>
                    <!-- .Intr_nr结束 -->

                	<div class="Intr_nr">
                            <div class="Intr_fenlei">
                                <h5 class="Title">木子版画 </h5>
                                <ul class="SortList2">
                                    <li class="change"><a href="#">&bull; 木子简介</a></li>
                                    <li><a href="#">&bull; 木子作品</a></li>
                                    <li><a href="#">&bull; 木子大师</a></li>
                                    <li><a href="#">&bull; 木子画家</a></li>
                                    <li><a href="#">&bull; 木子课程</a></li>
                                    <li><a href="#">&bull; 木子技法</a></li>
                                </ul>
                            </div>
                            
                            <div class="conbox">
                                    <div class="Slide_"> <a title="图片展示" href="#"> <img src="http://www.bc.com/theme/baoci/images/banner.jpg" class="mainpic"></a></div>
                                    <div class="Slide_"> <a title="图片展示" href="#"><img src="http://www.bc.com/theme/baoci/images/banner.jpg" class="mainpic"></a></div>
                                    <div class="Slide_"> <a title="图片展示" href="#"><img src="http://www.bc.com/theme/baoci/images/banner.jpg" class="mainpic"></a></div>
                            </div>
                    
                    </div>
                    <!-- .Intr_nr结束 -->

                <span class="clear"></span>
                <!-- 清除浮动 -->
        
        </div>
       <span class="line"></span> 
       <span class="jiao_left"></span> 
       <span class="jiao_right"></span> 
       <span class="yezi_left"></span>
       <span class="yezi_right"></span>
	</div>
	<!-- SpecialtyCourses结束 -->

	<section id="PhotoCenter">
    	<div class="center">
			<h3 class="MainTitle"><span>photo center</span><em>图片中心 </em></h3>
			<ul class="PicList">
                <?php $_from = $this->_tpl_vars['image_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['image_list']):
?>
                <li><a href="#" class="photo"><img src="<?php echo $this->_tpl_vars['image_list']['image']; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['image_list']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 26, "...") : smarty_modifier_truncate($_tmp, 26, "...")); ?>
 " /><em><?php echo ((is_array($_tmp=$this->_tpl_vars['image_list']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 26, "...") : smarty_modifier_truncate($_tmp, 26, "...")); ?>
</em></a></li>
                <?php endforeach; endif; unset($_from); ?>

			</ul>
		<span class="clear"></span>
		</div>
        <span class="line_x_hui"></span>
	</section>
	<!-- PhotoCenter结束 -->

	<section id="AboutUs">
    	<div class="center">
                
                <div class="jieshao">
                        <div class="school_logo"><img src="http://www.bc.com/theme/baoci/images/logo2.png"></div>
                        
                        <h4>常熟市报慈小学 </h4>
                        <p> 常熟市报慈小学是一所教育局的直属学校，建于1989年，当时为九年一贯制学校，
                        学校处于虞山镇的菱塘和林场的张坝、丁坝三个村之间。学校初建时，只有5个班级，小
                        学1-3年级各1个班，初一年级2个班，全校共有208名学生，其中小学生112名，中学生96名
                        ，共有教职工18名，中学编制的7名，小学编制的11......<a href="#">【查看详情】 </a></p>
                        
                <span class="clear"></span>
                </div>
                
                
                
                <div class="about_us_nav">
                <h5>走进我们 <span>About us </span> </h5>
                <ul class="SortList">
                    <?php $_from = $this->_tpl_vars['nav_bottom_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['bnav'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['bnav']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['bnav']):
        $this->_foreach['bnav']['iteration']++;
?>
                    <li> <a href="<?php echo $this->_tpl_vars['bnav']['url']; ?>
"><?php echo $this->_tpl_vars['bnav']['nav_name']; ?>
</a></li>
                    <?php endforeach; endif; unset($_from); ?>
                </ul>
                </div>
                
                
                <div id="AboutUsBanner">

                    <div class="conbox">
                        <?php $_from = $this->_tpl_vars['show_list_bottom']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['show'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['show']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['show']):
        $this->_foreach['show']['iteration']++;
?>
                        <div class="Slide_"> <a title="<?php echo $this->_tpl_vars['show']['show_name']; ?>
" href="<?php echo $this->_tpl_vars['show']['show_link']; ?>
" target="_blank"> <img src="<?php echo $this->_tpl_vars['show']['show_img']; ?>
" class="mainpic"></a></div>
                        <?php endforeach; endif; unset($_from); ?>
                    </div>
               
                
                </div>
                
        </div>
        
                <span class="line_x_bai"></span>
	</section>
	<!-- AboutUs结束 -->
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/firendlink.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- firendlink结束 -->

	 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- footer结束 -->

</body>
</html>






