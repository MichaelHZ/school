<?php /* Smarty version 2.6.26, created on 2017-09-28 10:13:14
         compiled from index.dwt */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'index.dwt', 31, false),)), $this); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="keywords" content="<?php echo $this->_tpl_vars['keywords']; ?>
" />
	<meta name="description" content="<?php echo $this->_tpl_vars['description']; ?>
" />
	<title><?php echo $this->_tpl_vars['page_title']; ?>
</title>
	<link href="http://www.cssmxx.com/theme/school/images/style/reset_css.css" rel="stylesheet" />
	<link href="http://www.cssmxx.com/theme/school/images/style/all.css" rel="stylesheet" />
    <script src="http://www.cssmxx.com/theme/school/images/js/jquery.js"></script>
    <script src="http://www.cssmxx.com/theme/school/images/js/jqueryXslider.js"></script>
    <script src="http://www.cssmxx.com/theme/school/images/js/jquery.easing.1.3.js"></script>
    <script src="http://www.cssmxx.com/theme/school/images/js/jcarousellite.js"></script>
    <script src="http://www.cssmxx.com/theme/school/images/js/gundongnew.js"></script>
    <script src="http://www.cssmxx.com/theme/school/images/js/load.js"></script>
    <script type="text/javascript" src="http://www.cssmxx.com/theme/school/images/js/global.js"></script>
	<!--[if IE]>
	<script src="http://www.cssmxx.com/theme/school/images/js/html5.js"></script>
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
    
    
    
  
     <form name="search" id="search" class="Searchform" method="get" action="<?php echo $this->_tpl_vars['site']['root_url']; ?>
">
        <input name="s" type="text" id="keys" class="text" title="<?php echo $this->_tpl_vars['lang']['search_product_cue']; ?>
" autocomplete="off" onclick="formClick(this,'文章搜索')" value="<?php if ($this->_tpl_vars['keyword']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['keyword'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php else: ?>请输入要搜索的关键字<?php endif; ?>" size="32" maxlength="128">
       <button class="btn_send"  type="submit">搜索</button>
    </form>    
        
    
        <div class="bgpic">
        
            <div id="quicklink">
                <ul>
                  <?php $_from = $this->_tpl_vars['nav_top_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['top']):
?>
                    <li  <?php if ($this->_tpl_vars['top']['index'] == 6): ?>class="no_bg"<?php endif; ?> ><a href="<?php echo $this->_tpl_vars['top']['url']; ?>
" target="_blank"><span id="btn0<?php echo $this->_tpl_vars['top']['sort']; ?>
"><i></i></span><?php echo $this->_tpl_vars['top']['nav_name']; ?>
</a></li>
                    <?php endforeach; endif; unset($_from); ?>
                </ul>
                <span class="clear"></span>
            </div>
            <!-- quicklink结束 -->
            
            
        
            <div id="Hot">
                <h3 class="MainTitle"> <strong>新闻速递</strong> <img src="http://www.cssmxx.com/theme/school/images/txt.png"></h3>
                
               
           
                <!-- playBanner结束 -->
                   
                
                <div id="playBanner">
                    <div class="conbox">
                             <?php $_from = $this->_tpl_vars['play_article']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
                             	
                            <div><a title="图片展示" href="<?php echo $this->_tpl_vars['article']['url']; ?>
" target="_blank">
                            <?php if ($this->_tpl_vars['article']['image']): ?>
                                <img src="<?php echo $this->_tpl_vars['article']['image']; ?>
" alt="石梅小学" />
                            <?php else: ?>
                                <img src="<?php echo $this->_tpl_vars['fragment']['none']['image']; ?>
" alt="石梅小学" />
                            <?php endif; ?>
                            <strong><?php echo $this->_tpl_vars['article']['title']; ?>
</strong>
                            </a>
                            </div>
                             <?php endforeach; endif; unset($_from); ?>
          
                    </div>
                    
                </div>
                <!-- playBanner结束 -->
        
               
				<div id="News">
                		<ul class="NewsTab">
                        	
                        	<li class="change" >新闻</li>
							<li style="background-position:left top;">公告</li>
                        </ul>
                        
                        
                        <div class="NewsTab_nr" style="background:#2c838b;">
                            <ul class="TextList">
							 <?php $_from = $this->_tpl_vars['play_article_words']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
								  
										 <li><time><?php echo $this->_tpl_vars['article']['add_time']; ?>
</time><a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" target="_blank">&bull; <?php echo $this->_tpl_vars['article']['title']; ?>
</a></li>
									
								    <?php endforeach; endif; unset($_from); ?>  
							
                              
                            </ul>
                        
                        
                        </div>
                        <!-- .NewsTab_nr结束 -->
                            
        				
                     
                        
						<div class="NewsTab_nr" style="background:#ad0046;display:none;">
                            <ul class="TextList">
                                    <?php $_from = $this->_tpl_vars['public_notice']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['notice']):
?>
										
										<li><time><?php echo $this->_tpl_vars['notice']['add_time']; ?>
</time><a href="<?php echo $this->_tpl_vars['notice']['url']; ?>
" target="_blank">&bull; <?php echo $this->_tpl_vars['notice']['title']; ?>
</a></li>
										
										  <?php endforeach; endif; unset($_from); ?>
                                
                            </ul>
                        
                        
                        </div>
                        <!-- .NewsTab_nr结束 -->
                            
        				
        
                </div>
                <!-- News结束 -->
        
                <span class="clear"></span>
                <!-- 清除浮动 -->
            </div>
            <!-- Hot结束 -->
        
        
        </div>
        <!-- .bgpic结束 -->
        
        

	<div id="History">
		<h3>石梅小学发展历史</h3>
		<h4>since 1720</h4>
		<p>石梅小学坐落于虞山东南麓，梁昭明太子读书台旁。其前身是清雍正三年（1725年），粮储道杨本植所建的&ldquo;游文书院&rdquo;。两代帝师翁同和曾就读于此。光绪二十八年（1902年），邑人庞鸿文、
邵松年修建斋舍，将游文书院改办为常昭学堂。是当时常熟较早创办的新学之一。一百多年来学校历经社会变迁、校名更改、人事更迭，而优良的办学传统、良好的校风、教风、学风则一脉相承代代相传且不断发扬光大。</p>

		<ol>
			<li><strong>1720 </strong><span></span><div class="txt">康熙五十九年（1720年）邑人陶贞一、言德坚等集资契买蹑云山房，经修缮后作为邑人子弟读书场舍。<i class="arrow"></i></div></li>
			<li style="margin-left:48px;"><strong>1725 </strong><span></span><div class="txt">雍正三年（1725年），粮储道杨本值捐银五百两作修缮蹑云山房和课士之费，并将山房正式命名为“游文书院”。<i class="arrow"></i></div></li>
			<li style="margin-left:100px;"><strong>1902 </strong><span></span><div class="txt">光绪二十八年（1902年），“游文书院”改名为“常昭学堂”。<i class="arrow"></i></div></li>
			<li style="margin-left:45px;"><strong>1909 </strong><span></span><div class="txt">宣统元年（1909年），石梅高等小学堂改名为“常昭公立高等小学堂细校”，统称“石梅公校”<i class="arrow"></i></div></li>
			<li style="margin-left:100px;"><strong>1928 </strong><span></span><div class="txt">民国17年（1928年），学校更名为“常熟县立石梅小学”。<i class="arrow"></i></div></li>
			<li style="margin-left:105px;"><strong>1949 </strong><span></span><div class="txt">新中国建立后，石梅小学的历史揭开了新的一页。<i class="arrow"></i></div></li>
			<li style="margin-left:125px;"><strong>1967  </strong><span></span><div class="txt">学校更名为“常熟县红梅小学”。<i class="arrow"></i></div></li>
			<li style="margin-left:125px;"><strong>1983  </strong><span></span><div class="txt">学校更名为“常熟市石梅小学”<i class="arrow"></i></div></li>
			<li style="margin-left:165px;"><strong>2007  </strong><span></span><div class="txt">学校进行就地改扩建工程，确立了“营造诗化校园”的目标，力求从生态和文化的角度进行环境建设，凸显学校内涵。<i class="arrow"></i></div></li>
		</ol>
		<span class="clear"></span>
	</div>
	<!-- History结束 -->

	<div id="SchoolPhoto">
    

            <div id="Faq">
    				<div class="ad">
                    <img src="http://www.cssmxx.com/theme/school/images/ad.jpg">
                    </div>
                    
                    
                    <div class="center">
                            
                            <h4>留言板</h4>
                            <p>/ 我们的负责老师会在三个工作日内给你答复，请勿重复提交问题，谢谢！</p>
                            <form  class="form"  id="form1">
                                <ul>
                                    <li><span>*</span><input name="name" type="text" class="text"  id="name_" value=""/></li>
                                    <li><input name="email" type="text" class="text"  id="mail_"  value=""/></li>
                                    <li><span></span><input name="tel" type="text" id="tel_" class="text"  value=""/></li>
                                    <li><span>*</span>
                                     <input type="text" name="captcha" class="text" size="10" id="yzm_" value="">
                                <img id="vcode"  class="yzm_pic" src="<?php echo $this->_tpl_vars['site']['root_url']; ?>
captcha.php" alt="<?php echo $this->_tpl_vars['lang']['captcha']; ?>
" border="1" onClick="refreshimage()" title="<?php echo $this->_tpl_vars['lang']['captcha_refresh']; ?>
">
      
                                  
                                    </li>
                                </ul>
                                <span>*</span><textarea name="content" cols="" rows="" id="problem_"  value=""></textarea>
                                <input type="hidden" name="token" value="<?php echo $this->_tpl_vars['token']; ?>
" id="token_" />
                                <input class="btn_send" type="submit" value="提交">
                            </form>
                            <script>
                            <?php echo '
                            $(function(){
                                
                            	$("#form1").submit(function(){
                            	    name = $("#name_").val();
                            	    if(name == \'称呼\' || name == \'\'){
                            	    	alert(\'称呼不能为空\');
                            	    	return false;
                            	    }
                            	    
                            	    email = $("#mail_").val();
                            	    if(email == \'邮箱\' || email == \'\'){
                            	    	email = \'\';
                            	    }
                            	    tel = $("#tel_").val();
                            	    if(tel == \'手机\' || tel == \'\'){
                            	    	tel = \'\';
                            	    }
                             		captcha = $("#yzm_").val();
                             		if(captcha == \'验证码\' || captcha == \'\'){
                            	    	alert(\'验证码不能为空\');
                            	    	return false;
                            	    }
                             		content = $("#problem_").val();
                             		if( content == \'\'){
                            	    	alert(\'内容不能为空\');
                            	    	return false;
                            	    }
                             		token = $("#token_").val();
                            		$.post(
                             		\'/guestbook.php?rec=ajax_insert\',{
                             			name:name,
                             			email: email,
                             			tel: tel,
                             			captcha: captcha,
                             			content: $("#problem_").val(),
                             			token : token
                             			},function(data){
                             			alert(data);
                             		},\'json\')
                            		return false;
                            	})
                            })
                             
                             '; ?>

                            </script>
                    
                            
                            <div id="float_menu">
                                <img src="http://www.cssmxx.com/theme/school/images/logo2.png">
                                <h5>创建中心</h5>
                                <div class="float_menu">
                                        <ul>
                                        
                                             <?php $_from = $this->_tpl_vars['create']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
                                 				<li><a href="<?php if ($this->_tpl_vars['article']['ctype']): ?>/article_category.php?id=<?php echo $this->_tpl_vars['get_cat']['child']; ?>
&ctype=create_<?php echo $this->_tpl_vars['article']['id']; ?>
<?php else: ?><?php echo $this->_tpl_vars['article']['url']; ?>
<?php endif; ?>" target="_blank"><?php echo $this->_tpl_vars['article']['title']; ?>
</a></li>
                                 			<?php endforeach; endif; unset($_from); ?>
                                           
                                        </ul>
                                </div>
                                
                                
                                <a href="#" class="btn_more" target="_blank"></a>                    
                            </div>
                             <!-- float_menu结束 -->
                            
                    
                    </div>
                    <!-- .center结束 -->
                    
                    
                    
            </div>
            <!-- Faq结束 -->
            
            
    
            <div class="center">
                        <h3 class="MainTitle"> <strong>校园剪影</strong>  <img src="http://www.cssmxx.com/theme/school/images/txt.png"></h3>
                        <ul class="Tab" id="SchoolPhotoTab">
                            <li class="change"><a href="#">所有</a></li>
                            <li><a href="#">管理纪事</a></li>
                            <li><a href="#">多彩活动</a></li>
                            <li><a href="#">社团动态</a></li>
                            <li><a href="#">童化课堂</a></li>
                        </ul>
                        <span class="clear"></span>
                        
                        <div class="Tab_nr">
                        
                                <ul class="PictureList">
                                     <?php $_from = $this->_tpl_vars['all']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
                                    <li><a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" class="photo" target="_blank">
                                      <?php if ($this->_tpl_vars['article']['image']): ?>
                                      <img src="<?php echo $this->_tpl_vars['article']['image']; ?>
" alt="石梅小学" />
                                       <?php else: ?>
                                		<img src="<?php echo $this->_tpl_vars['fragment']['none']['image']; ?>
" alt="石梅小学" />
                                   <?php endif; ?>
                                    
                                    <strong>
                                    <?php echo $this->_tpl_vars['article']['title']; ?>

                                    </strong>
									</a>
                                    <a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" class="btn_browse" target="_blank"><span></span></a></li>
                                    <?php endforeach; endif; unset($_from); ?>
                                     </ul>
                                
                                <span class="clear"></span>
                                <!--
                                <a href="/article_category.php?id=32" class="btn_more">浏览更多</a>
								-->
                        </div>
                        <!-- .Tab_nr结束 -->
                        
                        <div class="Tab_nr">
                        
                                <ul class="PictureList">
                                    <?php $_from = $this->_tpl_vars['manage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
                                    <li><a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" class="photo" target="_blank">
                                      <?php if ($this->_tpl_vars['article']['image']): ?>
                                      <img src="<?php echo $this->_tpl_vars['article']['image']; ?>
" alt="石梅小学" />
                                       <?php else: ?>
                                		<img src="<?php echo $this->_tpl_vars['fragment']['none']['image']; ?>
" alt="石梅小学" />
                                   		<?php endif; ?>
                                   
                                    <strong>
                                     <?php echo $this->_tpl_vars['article']['title']; ?>

                                    </strong>
									 </a>
                                    <a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" class="btn_browse" target="_blank"><span></span></a></li>
                                    <?php endforeach; endif; unset($_from); ?>
                                    </ul>
                                
                                <span class="clear"></span>
                                
                                <a href="/article_category.php?id=19" class="btn_more" target="_blank">浏览更多</a>
                        </div>
                        <!-- .Tab_nr结束 -->
                        
                        <div class="Tab_nr">
                        
                                <ul class="PictureList">
                                     <?php $_from = $this->_tpl_vars['active']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
                                    <li><a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" class="photo" target="_blank">
                                      <?php if ($this->_tpl_vars['article']['image']): ?>
                                      <img src="<?php echo $this->_tpl_vars['article']['image']; ?>
" alt="石梅小学" />
                                       <?php else: ?>
                                		<img src="<?php echo $this->_tpl_vars['fragment']['none']['image']; ?>
" alt="石梅小学" />
                                   		<?php endif; ?>
                                   
                                    <strong>
                                     <?php echo $this->_tpl_vars['article']['title']; ?>

                                    </strong>
									 </a>
                                    <a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" class="btn_browse" target="_blank"><span></span></a></li>
                                    <?php endforeach; endif; unset($_from); ?>
                                </ul>
                                
                                <span class="clear"></span>
                                
                                <a href="/article_category.php?id=33" class="btn_more" target="_blank">浏览更多</a>
                        </div>
                        <!-- .Tab_nr结束 -->
                        
                        <div class="Tab_nr">
                        
                                <ul class="PictureList">
                                       <?php $_from = $this->_tpl_vars['dynamic']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
                                    <li><a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" class="photo" target="_blank">
                                      <?php if ($this->_tpl_vars['article']['image']): ?>
                                      <img src="<?php echo $this->_tpl_vars['article']['image']; ?>
" alt="石梅小学" />
                                       <?php else: ?>
                                		<img src="<?php echo $this->_tpl_vars['fragment']['none']['image']; ?>
" alt="石梅小学" />
                                   		<?php endif; ?>
                      
                                    <strong>
                                     <?php echo $this->_tpl_vars['article']['title']; ?>

                                    </strong>
									 </a>
                                    <a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" class="btn_browse" target="_blank"><span></span></a></li>
                                    <?php endforeach; endif; unset($_from); ?>
                                    </ul>
                                
                                <span class="clear"></span>
                                
                                <a href="/article_category.php?id=34" class="btn_more" target="_blank">浏览更多</a>
                        </div>
                        <!-- .Tab_nr结束 -->
                        
                        <div class="Tab_nr">
                        
                                <ul class="PictureList">
                                     <?php $_from = $this->_tpl_vars['class']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
                                    <li><a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" class="photo" target="_blank">
                                      <?php if ($this->_tpl_vars['article']['image']): ?>
                                      <img src="<?php echo $this->_tpl_vars['article']['image']; ?>
" alt="石梅小学" />
                                       <?php else: ?>
                                		<img src="<?php echo $this->_tpl_vars['fragment']['none']['image']; ?>
" alt="石梅小学" />
                                   		<?php endif; ?>
                                  
                                    <strong>
                                     <?php echo $this->_tpl_vars['article']['title']; ?>

                                    </strong>
									 </a>
                                    <a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" class="btn_browse" target="_blank"><span></span></a></li>
                                    <?php endforeach; endif; unset($_from); ?>
                                    
                                 </ul>
                                
                                <span class="clear"></span>
                                
                                <a href="/article_category.php?id=43" class="btn_more" target="_blank">浏览更多</a>
                        </div>
                        <!-- .Tab_nr结束 -->
                        
            </div>
            <!-- .center结束 -->

	</div>
	<!-- SchoolPhoto结束 -->

	<div id="Teacher">
			<h3 class="MainTitle"><strong>教师风采</strong><img src="http://www.cssmxx.com/theme/school/images/txt.png"></h3>
            
            
                 <div class="scrollleft">
                    <ul class="PhotoList">
                        <?php $_from = $this->_tpl_vars['teacher']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
                        <li>
                        <?php if ($this->_tpl_vars['article']['image']): ?>
                                      <img src="<?php echo $this->_tpl_vars['article']['image']; ?>
" alt="石梅小学" class="photo"/>
                                       <?php else: ?>
                                		<img src="<?php echo $this->_tpl_vars['fragment']['none']['image']; ?>
" alt="石梅小学" class="photo" />
                                   <?php endif; ?>
                       
                            <div class="txt">
                                <strong>  <?php echo $this->_tpl_vars['article']['title']; ?>
</strong><span><?php if ($this->_tpl_vars['article']['keywords']): ?>（<?php echo $this->_tpl_vars['article']['keywords']; ?>
）<?php endif; ?> </span>
                                <p>  <?php echo $this->_tpl_vars['article']['description']; ?>
</p>
                                <a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" class="more" target="_blank">更多 </a>
                            </div>
                        </li>
                         <?php endforeach; endif; unset($_from); ?>
                        
        
                    </ul>
                <span class="clear"></span>
                </div>            
        
                
         <a href="javascript:;" class="move_left"><span></span></a> 
         <a href="javascript:;" class="move_right"><span></span></a>                    
         <a href="/article_category.php?id=41" class="btn_more">浏览更多</a>                       

        
        <span class="line"></span>
	</div>
	<!-- Teacher结束 -->

	<div id="Column">
    	<div class="center">
        
              <div class="gundong">
                            <div class="jCarouselLite">
                                <!-- 滚动开始 -->
                        
                                        
                                        <div class="column_show">
                                            <div class="pic"><img src="<?php echo $this->_tpl_vars['fragment']['homeschool']['image']; ?>
" alt="石梅小学"/></div>
                                            <h5>学校</h5>
                                              
                                                <?php $_from = $this->_tpl_vars['cat_1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
                                               <p><a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['article']['title']; ?>
</a></p>
                                               <?php endforeach; endif; unset($_from); ?>
											  
                                            <a href="/article_category.php?id=1" class="btn_browsemore" target="_blank"> 浏览更多 </a>
                                        </div>
                                        <!-- .column_show结束 -->
                                        
                                         <div class="column_show">
                                            <div class="pic"><img src="<?php echo $this->_tpl_vars['fragment']['homecreate']['image']; ?>
" alt="石梅小学"/></div>
                                            <h5>党建</h5>
                                              
                                                <?php $_from = $this->_tpl_vars['cat_2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
                                               <p><a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['article']['title']; ?>
</a></p>
                                               <?php endforeach; endif; unset($_from); ?>
											  
                                            <a href="/article_category.php?id=1" class="btn_browsemore" target="_blank"> 浏览更多 </a>
                                        </div>
                                        <!-- .column_show结束 -->
                                        
                                        <div class="column_show">
                                            <div class="pic"><img src="<?php echo $this->_tpl_vars['fragment']['homestudent']['image']; ?>
" alt="石梅小学"/></div>
                                            <h5>学生</h5>
                                                
                                                <?php $_from = $this->_tpl_vars['cat_3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
                                               <p><a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['article']['title']; ?>
</a></p>
                                               <?php endforeach; endif; unset($_from); ?>
                                            <a href="/article_category.php?id=2" class="btn_browsemore" target="_blank"> 浏览更多 </a>
                                        </div>
                                        <!-- .column_show结束 -->
                                        
                                        
                                        
                                        <div class="column_show">
                                            <div class="pic"><img src="<?php echo $this->_tpl_vars['fragment']['hometeacher']['image']; ?>
" alt="石梅小学"/></div>
                                            <h5>教师</h5>
                                                <?php $_from = $this->_tpl_vars['cat_4']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
                                               <p><a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['article']['title']; ?>
</a></p>
                                               <?php endforeach; endif; unset($_from); ?>
                                            <a href="/article_category.php?id=3" class="btn_browsemore" target="_blank"> 浏览更多 </a>
                                        </div>
                                        <!-- .column_show结束 -->
                                        
                                        
                                        
                                        <div class="column_show">
                                            <div class="pic"><img src="<?php echo $this->_tpl_vars['fragment']['homehistoy']['image']; ?>
" alt="石梅小学"/></div>
                                            <h5>回眸</h5>
                                               <?php $_from = $this->_tpl_vars['cat_6']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
                                               <p><a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['article']['title']; ?>
</a></p>
                                               <?php endforeach; endif; unset($_from); ?>
                                            <a href="/article_category.php?id=4" class="btn_browsemore" target="_blank"> 浏览更多 </a>
                                        </div>
                                        <!-- .column_show结束 -->
                                        
										<div class="column_show">
                                            <div class="pic"><img src="<?php echo $this->_tpl_vars['fragment']['homehope']['image']; ?>
" alt="石梅小学"/></div>
                                            <h5>家长</h5>
                                               <?php $_from = $this->_tpl_vars['cat_5']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
                                               <p><a href="<?php echo $this->_tpl_vars['article']['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['article']['title']; ?>
</a></p>
                                               <?php endforeach; endif; unset($_from); ?>
                                            <a href="/article_category.php?id=5" class="btn_browsemore" target="_blank"> 浏览更多 </a>
                                        </div>
                                        <!-- .column_show结束 -->
                                       
                               <!-- 滚动结束 -->
                            </div>
                <span class="clear"></span>
            	</div>
                <!-- .gundong结束 -->        
                         <a href="javascript:;"  class="move_right"><span></span></a>
                        <a href="javascript:;" class="move_left"><span></span></a>
          <span class="clear"></span> 
        </div>
	</div>
	<!-- Column结束 -->
	 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/friendlink.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- friendlink结束 -->
     <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	 <!-- copyright结束 -->
	 <div id="float_bar">
    	<div class="box">
                <ul>
                    <?php $_from = $this->_tpl_vars['nav_right_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['right']):
?>
                    <li><a href="<?php echo $this->_tpl_vars['right']['guide']; ?>
" ><?php echo $this->_tpl_vars['right']['nav_name']; ?>
</a></li>
				  <?php endforeach; endif; unset($_from); ?>
                
                </ul>
                <div class="erweima"><img src="http://www.cssmxx.com/theme/school/images/erweima.png" /></div>
                <a href="#" class="backtop">返回顶部</a>
               <span class="close"><span></span></span> 
               
               <span class="bom_yuanbg"></span>
        </div>
        <!-- .box结束 -->
        
    </div>
	
    <!-- float_bar结束 -->
</body>
</html>