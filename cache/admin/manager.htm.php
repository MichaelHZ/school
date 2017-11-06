<?php /* Smarty version 2.6.26, created on 2017-10-10 21:41:40
         compiled from manager.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $this->_tpl_vars['lang']['home']; ?>
<?php if ($this->_tpl_vars['ur_here']): ?> - <?php echo $this->_tpl_vars['ur_here']; ?>
 <?php endif; ?></title>
<meta name="Copyright" content="Douco Design." />
<link href="templates/public.css" rel="stylesheet" type="text/css">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "javascript.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</head>
<body>
<div id="dcWrap">
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 <div id="dcLeft"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
 <div id="dcMain">
   <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ur_here.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
   <div id="manager" class="mainBox" style="<?php echo $this->_tpl_vars['workspace']['height']; ?>
">
    <h3><?php if ($this->_tpl_vars['rec'] != 'manager_log'): ?><a href="<?php echo $this->_tpl_vars['action_link']['href']; ?>
" class="actionBtn"><?php echo $this->_tpl_vars['action_link']['text']; ?>
</a><?php endif; ?><?php echo $this->_tpl_vars['ur_here']; ?>
</h3>
    <?php if ($this->_tpl_vars['rec'] == 'default'): ?>
	<div class="filter">
    <form action="manager.php" method="post">
     <input name="keyword" type="text" class="inpMain" value="<?php echo $this->_tpl_vars['keyword']; ?>
" size="20" />
     <input name="submit" class="btnGray" type="submit" value="<?php echo $this->_tpl_vars['lang']['btn_filter']; ?>
" />
    </form>
    <span>
    <?php if ($this->_tpl_vars['if_sort']): ?>
	<!--
    <a class="btnGray" href="article.php?rec=sort"><?php echo $this->_tpl_vars['lang']['sort_close']; ?>
</a>
	-->
    <?php else: ?>
	<!--
    <a class="btnGray" href="article.php?rec=sort"><?php echo $this->_tpl_vars['lang']['sort_article']; ?>
</a>
	-->
    <?php endif; ?>
    </span>
    </div>
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
     <tr>
      <th width="30" align="center"><?php echo $this->_tpl_vars['lang']['record_id']; ?>
</th>
      <th align="center">姓名</th>
      <th align="center">账号</th>
      <th align="center">教学职务</th>
      <th align="center">网站权限</th>
      <th align="center">电话</th>
      <th align="center"><?php echo $this->_tpl_vars['lang']['manager_email']; ?>
</th>
      <th align="center"><?php echo $this->_tpl_vars['lang']['manager_add_time']; ?>
</th>
      <th align="center"><?php echo $this->_tpl_vars['lang']['manager_last_login']; ?>
</th>
	  <th align="center" width="100">排序|<a href="manager.php?sort=sort">排序(升)</a></th>
      <th align="center">状态</th>
	  
      <th align="center"><?php echo $this->_tpl_vars['lang']['handler']; ?>
</th>
     </tr>
     <?php $_from = $this->_tpl_vars['manager_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['manager_list']):
?>
     <tr>
     <td align="center"><?php echo $this->_tpl_vars['manager_list']['user_id']; ?>
</td>
      <td align="center"><?php echo $this->_tpl_vars['manager_list']['nick_name']; ?>
</td>
       <td align="center"><?php echo $this->_tpl_vars['manager_list']['user_name']; ?>
</td>
       <td align="center"><?php echo $this->_tpl_vars['manager_list']['job_name']; ?>
</td>
      <td align="center"><?php echo $this->_tpl_vars['manager_list']['group_name']; ?>
</td>
      <td align="center"><?php echo $this->_tpl_vars['manager_list']['mobile']; ?>
</td>
     
      <td align="center"><?php echo $this->_tpl_vars['manager_list']['email']; ?>
</td>
      <td align="center"><?php echo $this->_tpl_vars['manager_list']['add_time']; ?>
</td>
      <td align="center"><?php echo $this->_tpl_vars['manager_list']['last_login']; ?>
</td>
	  <td align="center"><input type="text" value="<?php echo $this->_tpl_vars['manager_list']['sort']; ?>
" style="width:100%;height:100%;" data="<?php echo $this->_tpl_vars['manager_list']['user_id']; ?>
" class="sort"/></td>
      <td align="center"><?php if ($this->_tpl_vars['manager_list']['status']): ?><img   class="active" data_id = "<?php echo $this->_tpl_vars['manager_list']['user_id']; ?>
" data_val="1" src="/admin/images/yes.gif"><?php else: ?><img class="active" data_id = "<?php echo $this->_tpl_vars['manager_list']['user_id']; ?>
" data_val="0" src="/admin/images/no.gif"><?php endif; ?></td>
      <td align="center"><a href="manager.php?rec=edit&id=<?php echo $this->_tpl_vars['manager_list']['user_id']; ?>
"><?php echo $this->_tpl_vars['lang']['edit']; ?>
</a> 
      | <a href="manager.php?rec=del&id=<?php echo $this->_tpl_vars['manager_list']['user_id']; ?>
"><?php echo $this->_tpl_vars['lang']['del']; ?>
</a>
  
      </td>
     </tr>
     
     <?php endforeach; endif; unset($_from); ?>
    </table>
    <?php echo '
      <style>
      	.active{cursor:pointer;}
      </style>
      <script>
      	$(function(){
      		yes = \'/admin/images/yes.gif\';
      		no = \'/admin/images/no.gif\';
      		$(".active").click(function(){
      			val = $(this).attr("data_val");
      			id = $(this).attr("data_id");
      			obj = $(this);
      			$.post("/admin/manager.php",{rec:\'active\',val:val,id:id},function(data){
      				   if(data == \'success\'){
      					   if(val == 1){
      						 obj.attr("src",no).attr(\'data_val\',0);
      					   }else{
      						 obj.attr("src",yes).attr(\'data_val\',1);
      					   }
      				   }else{
      					 alert(data); 
      				   }
      				   
      				
      			});
      		});
      	    $(".sort").blur(function(){
			    uid = $(this).attr(\'data\');
				sort = $(this).val();
				obj = $(this);
				$.post("/admin/manager.php",{rec:\'sort\',uid:uid,sort:sort},function(data){
      				   if(data == \'success\'){
      					  obj.val(sort);
      				   }else{
      					 alert(data); 
      				   }
      				   
      				
      			});
			});
      	})
      </script>
    '; ?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pager.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['rec'] == 'add'): ?>
    <form action="manager.php?rec=insert" method="post" enctype="multipart/form-data">
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       <td width="100" align="right">* 姓名</td>
       <td>
        <input type="text" name="nick_name" size="40" class="inpMain" />
       </td>
      </tr>
       <tr>
       <td align="right">头像</td>
       <td>
        <input type="file" name="image" size="38" class="inpFlie" />
        <?php if ($this->_tpl_vars['article']['image']): ?><a href="../<?php echo $this->_tpl_vars['article']['image']; ?>
" target="_blank"><img src="images/icon_yes.png"></a><?php else: ?><img src="images/icon_no.png"><?php endif; ?></td>
      </tr>
      <tr>
       <td width="100" align="right">性别</td>
       <td>
        <input type="radio" name="sex"   value="1" checked/>男 
        <input type="radio" name="sex"  value="2"/>女
       </td>
      </tr>
      <tr>
       <td width="100" align="right">* 账号</td>
       <td>
        <input type="text" name="user_name" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">* 密码</td>
       <td>
        <input type="password" name="password" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">* 教学职务</td>
       <td>
        <select name="job_id">
       <?php $_from = $this->_tpl_vars['job_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['job']):
?>
        <option value="<?php echo $this->_tpl_vars['job']['jid']; ?>
"><?php echo $this->_tpl_vars['job']['job_name']; ?>
</option>
        <?php endforeach; endif; unset($_from); ?>
        
        </select>
       </td>
      </tr>
      <tr>
       <td align="right">电话</td>
       <td>
        <input type="number" name="mobile" size="40" class="inpMain" />
       </td>
      </tr>
      
      <tr>
       <td width="100" align="right"><?php echo $this->_tpl_vars['lang']['manager_email']; ?>
</td>
       <td>
        <input type="text" name="email" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">简介链接</td>
       <td>
        <input type="text" name="about" size="80" class="inpMain" />
       </td>
      </tr>
      
       <tr>
       <td align="right">* 网站权限</td>
       <td>
        <select name="group_id">
        <?php $_from = $this->_tpl_vars['group_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?>
        <option value="<?php echo $this->_tpl_vars['group']['gid']; ?>
"><?php echo $this->_tpl_vars['group']['groupname']; ?>
</option>
         <?php endforeach; endif; unset($_from); ?>
        </select>
       </td>
      </tr>
      <tr>
       <td></td>
       <td>
        <input type="hidden" name="token" value="<?php echo $this->_tpl_vars['token']; ?>
" />
        <input type="submit" name="submit" class="btn" value="<?php echo $this->_tpl_vars['lang']['btn_submit']; ?>
" />
       </td>
      </tr>
     </table>
    </form>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['rec'] == 'edit'): ?>
    <form action="manager.php?rec=update" method="post" enctype="multipart/form-data">
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       <td width="100" align="right">姓名</td>
       <td>
        <input type="text" name="nick_name" value="<?php echo $this->_tpl_vars['manager_info']['nick_name']; ?>
" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">头像</td>
       <td>
        <input type="file" name="image" size="38" class="inpFlie" value="<?php echo $this->_tpl_vars['manager_info']['face']; ?>
"/>
        <?php if ($this->_tpl_vars['manager_info']['face']): ?><a href="../<?php echo $this->_tpl_vars['manager_info']['face']; ?>
" target="_blank"><img src="images/icon_yes.png"></a><?php else: ?><img src="images/icon_no.png"><?php endif; ?></td>
      </tr>
       <tr>
       <td width="100" align="right">性别</td>
       <td>
        <input type="radio" name="sex"   value="1" <?php if ($this->_tpl_vars['manager_info']['sex'] == 1): ?>checked <?php endif; ?>/>男 
        <input type="radio" name="sex"  value="2" <?php if ($this->_tpl_vars['manager_info']['sex'] == 2): ?>checked <?php endif; ?> />女
       </td>
      </tr>
       <td width="100" align="right">账号</td>
       <td>
        <input type="text" name="user_name" value="<?php echo $this->_tpl_vars['manager_info']['user_name']; ?>
" size="40" class="inpMain" <?php if ($this->_tpl_vars['user']['action_list'] != 'ALL'): ?>readonly="true"<?php endif; ?>/>
       </td>
      </tr>
       <?php if ($this->_tpl_vars['if_check']): ?>
      <tr>
       <td align="right">* <?php echo $this->_tpl_vars['lang']['manager_old_password']; ?>
</td>
       <td>
        <input type="password" name="old_password" size="40" class="inpMain" /> 修改请填写密码
       </td>
      </tr>
      <?php endif; ?>
      <tr>
       <td align="right">密码</td>
       <td>
        <input type="password" name="password" size="40" class="inpMain" /> 无需修改请留空
       </td>
      </tr>
      <tr>
       <td align="right">* 教学职务</td>
       <td>
        <select name="job_id">
       <?php $_from = $this->_tpl_vars['job_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['job']):
?>
        <option value="<?php echo $this->_tpl_vars['job']['jid']; ?>
" <?php if ($this->_tpl_vars['manager_info']['job_id'] == $this->_tpl_vars['job']['jid']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['job']['job_name']; ?>
</option>
        <?php endforeach; endif; unset($_from); ?>
        
        </select>
       </td>
      </tr>
      <tr>
       <td align="right">电话</td>
       <td>
        <input type="number" name="mobile" size="40" class="inpMain"  value="<?php echo $this->_tpl_vars['manager_info']['mobile']; ?>
"/>
       </td>
      </tr>
      <tr>
       <td width="100" align="right"><?php echo $this->_tpl_vars['lang']['manager_email']; ?>
</td>
       <td>
        <input type="text" name="email" size="40" class="inpMain" value="<?php echo $this->_tpl_vars['manager_info']['email']; ?>
"/>
       </td>
      </tr>
      <tr>
       <td align="right">简介链接</td>
       <td>
        <input type="text" name="about" size="80" value="<?php echo $this->_tpl_vars['manager_info']['about']; ?>
" class="inpMain" />
       </td>
      </tr>
      <?php if (! $this->_tpl_vars['if_check']): ?>
       <tr>
       <td align="right">* 网站权限</td>
       <td>
        <select name="group_id">
        <?php $_from = $this->_tpl_vars['group_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?>
        <option value="<?php echo $this->_tpl_vars['group']['gid']; ?>
" <?php if ($this->_tpl_vars['manager_info']['group_id'] == $this->_tpl_vars['group']['gid']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['group']['groupname']; ?>
</option>
         <?php endforeach; endif; unset($_from); ?>
        </select>
       </td>
      </tr>
       <?php endif; ?>
      <tr>
       <td></td>
       <td>
        <input type="hidden" name="token" value="<?php echo $this->_tpl_vars['token']; ?>
" />
		<input type="hidden" name="image" value="<?php echo $this->_tpl_vars['manager_info']['face']; ?>
" />
        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['manager_info']['user_id']; ?>
" />
        <input type="submit" name="submit" class="btn" value="<?php echo $this->_tpl_vars['lang']['btn_submit']; ?>
" />
       </td>
      </tr>
     </table>
    </form>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['rec'] == 'manager_log'): ?>
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
     <tr>
      <th width="30" align="center"><?php echo $this->_tpl_vars['lang']['record_id']; ?>
</th>
      <th width="150" align="left"><?php echo $this->_tpl_vars['lang']['manager_log_create_time']; ?>
</th>
      <th width="100" align="center"><?php echo $this->_tpl_vars['lang']['manager_log_user_id']; ?>
</th>
      <th align="left"><?php echo $this->_tpl_vars['lang']['manager_log_action']; ?>
</th>
      <th width="100" align="center"><?php echo $this->_tpl_vars['lang']['manager_log_ip']; ?>
</th>
     </tr>
     <?php $_from = $this->_tpl_vars['log_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['log_list']):
?>
     <tr>
      <td align="center"><?php echo $this->_tpl_vars['log_list']['id']; ?>
</td>
      <td><?php echo $this->_tpl_vars['log_list']['create_time']; ?>
</td>
      <td align="center"><?php echo $this->_tpl_vars['log_list']['user_name']; ?>
</td>
      <td align="left"><?php echo $this->_tpl_vars['log_list']['action']; ?>
</td>
      <td align="center"><?php echo $this->_tpl_vars['log_list']['ip']; ?>
</td>
     </tr>
     <?php endforeach; endif; unset($_from); ?>
    </table>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pager.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>
   </div>
 </div>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 </div>
</body>
</html>