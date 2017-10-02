<?php /* Smarty version 2.6.26, created on 2017-09-28 10:09:30
         compiled from inc/footer.tpl */ ?>

	<footer id="footer">
    
    <div class="center">
	   <?php $_from = $this->_tpl_vars['nav_bottom_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['nav_bottom_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_bottom_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['nav']):
        $this->_foreach['nav_bottom_list']['iteration']++;
?>
		<dl <?php if ($this->_tpl_vars['nav']['index'] == 6): ?>class="margin_left"<?php endif; ?> >
			<dt><?php echo $this->_tpl_vars['nav']['nav_name']; ?>
</dt>
			<dd>
			<?php $_from = $this->_tpl_vars['nav']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child']):
?>
			<a href="<?php echo $this->_tpl_vars['child']['url']; ?>
">&gt;<?php echo $this->_tpl_vars['child']['nav_name']; ?>
</a> 
			<?php endforeach; endif; unset($_from); ?>
		</dd>
		</dl>
		<?php endforeach; endif; unset($_from); ?>
		<span class="clear"></span>
    
		<div class="erweima">
		    <a href="http://www.cssmxx.com/admin/" class="ewm_link"> </a>
            <img src="http://www.cssmxx.com/theme/school/images/erweima.jpg" alt="图片描述" class="ewm" />
            <img src="http://www.cssmxx.com/theme/school/images/school_txt.png" alt="图片描述" class="name" />
            
		</div>
    </div>
    
	</footer>
	<!-- footer结束 -->



	<footer id="copyright">
            <div class="center">
            	<span class="bomlogo"><a href="http://www.manyoo.net/" target="_blank"><img src="http://www.cssmxx.com/theme/school/images/1.gif"></a> <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1259598198'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/z_stat.php%3Fid%3D1259598198%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script> 
				<span class=""><a href="http://www.cssmxx.com/index.php" target="_blank">回到怀旧版“石梅网”</a></span>
				</span>
                <p>Copyright &copy; 常熟市石梅小学 All rights reserved. <a href="http://www.miitbeian.gov.cn" target="_blank">苏ICP备08004760号</a> <a href="http://bszs.conac.cn/sitename?method=show&id=20CAC33A69E823FBE053022819AC6F7E" target="_blank"><img src="http://www.cssmxx.com/theme/school/images/shiyedanwei.png" alt="事业单位" class="name" /></a></p>
                <span class="icon"><a href="/article.php?id=528"></a></span>
				 
            </div>
	</footer>
	