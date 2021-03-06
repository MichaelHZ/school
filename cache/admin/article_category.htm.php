<?php /* Smarty version 2.6.26, created on 2017-10-29 12:53:01
         compiled from article_category.htm */ ?>
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
   <div class="mainBox" style="<?php echo $this->_tpl_vars['workspace']['height']; ?>
">
    <?php if ($this->_tpl_vars['rec'] == 'default'): ?>
    <h3><a href="<?php echo $this->_tpl_vars['action_link']['href']; ?>
" class="actionBtn add"><?php echo $this->_tpl_vars['action_link']['text']; ?>
</a><?php echo $this->_tpl_vars['ur_here']; ?>
</h3>
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
     <tr>
        <th width="120" align="left"><?php echo $this->_tpl_vars['lang']['article_category_name']; ?>
</th>
      <th align="left"><?php echo $this->_tpl_vars['lang']['unique']; ?>
</th>
        <th align="left"><?php echo $this->_tpl_vars['lang']['description']; ?>
</th>
       <th width="60" align="center"><?php echo $this->_tpl_vars['lang']['sort']; ?>
</th>
       <th width="60" align="center">口令状态</th>
	   
        <th width="80" align="center"><?php echo $this->_tpl_vars['lang']['handler']; ?>
</th>
      </tr>
      <?php $_from = $this->_tpl_vars['article_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cate']):
?>
      <tr>
        <td align="left"><?php echo $this->_tpl_vars['cate']['mark']; ?>
 <a href="article.php?cat_id=<?php echo $this->_tpl_vars['cate']['cat_id']; ?>
"><?php echo $this->_tpl_vars['cate']['cat_name']; ?>
</a></td>
        <td><?php echo $this->_tpl_vars['cate']['unique_id']; ?>
</td>
        <td><?php echo $this->_tpl_vars['cate']['description']; ?>
</td>
        <td align="center"><?php echo $this->_tpl_vars['cate']['sort']; ?>
</td>
		 <td align="center">
        <?php if ($this->_tpl_vars['cate']['is_password']): ?><img   class="active" data_id = "<?php echo $this->_tpl_vars['cate']['cat_id']; ?>
" data_val="1" src="/admin/images/yes.gif"><?php else: ?><img class="active" data_id = "<?php echo $this->_tpl_vars['cate']['cat_id']; ?>
" data_val="0" src="/admin/images/no.gif"><?php endif; ?>
       </td>
        <td align="center"><a href="article_category.php?rec=edit&cat_id=<?php echo $this->_tpl_vars['cate']['cat_id']; ?>
"><?php echo $this->_tpl_vars['lang']['edit']; ?>
</a> | <a href="article_category.php?rec=del&cat_id=<?php echo $this->_tpl_vars['cate']['cat_id']; ?>
"><?php echo $this->_tpl_vars['lang']['del']; ?>
</a></td>
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
      			$.post("/admin/article_category.php",{rec:\'active\',val:val,id:id},function(data){
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
	 	})
      </script>
    '; ?>

    <?php endif; ?>
    <?php if ($this->_tpl_vars['rec'] == 'add' || $this->_tpl_vars['rec'] == 'edit'): ?>
    <h3><a href="<?php echo $this->_tpl_vars['action_link']['href']; ?>
" class="actionBtn"><?php echo $this->_tpl_vars['action_link']['text']; ?>
</a><?php echo $this->_tpl_vars['ur_here']; ?>
</h3>
    <form action="article_category.php?rec=<?php echo $this->_tpl_vars['form_action']; ?>
" method="post">
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       <td width="80" align="right"><?php echo $this->_tpl_vars['lang']['article_category_name']; ?>
</td>
       <td>
        <input type="text" name="cat_name" value="<?php echo $this->_tpl_vars['cat_info']['cat_name']; ?>
" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right"><?php echo $this->_tpl_vars['lang']['unique']; ?>
</td>
       <td>
        <input type="text" name="unique_id" value="<?php echo $this->_tpl_vars['cat_info']['unique_id']; ?>
" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">自定义链接</td>
       <td>
        <input type="text" name="custom_url" value="<?php echo $this->_tpl_vars['cat_info']['custom_url']; ?>
" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td height="35" align="right">首页位置</td>
       <td>

        <div id="homePosition">
         <?php if ($this->_tpl_vars['cat_info']['home_position'] != ''): ?>

         <?php $_from = $this->_tpl_vars['selectPosition']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['selectPosition']):
?>
         <span style='border:1px solid #c9c9c9;padding: 2px;cursor: pointer;margin-right:1em; '><input type='hidden' value='<?php echo $this->_tpl_vars['selectPosition']; ?>
' name='homePosition[]'><?php echo $this->_tpl_vars['homePosition'][$this->_tpl_vars['selectPosition']]['position_name']; ?>
</span>
         <?php endforeach; endif; unset($_from); ?>
         <?php endif; ?>
        </div>
       </td>
      </tr>
      <tr>
       <td height="35" align="right">位置选择</td>
       <td>


        <div id="selectPosition">
         <?php $_from = $this->_tpl_vars['homePosition']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['homePosition']):
?>
         <span id="<?php echo $this->_tpl_vars['homePosition']['id']; ?>
p" style="border:1px solid #c9c9c9;padding: 2px;cursor: pointer;"><?php echo $this->_tpl_vars['homePosition']['position_name']; ?>
</span>&nbsp;&nbsp;
         <?php endforeach; endif; unset($_from); ?>
        </div>
       </td>
      </tr>
      <tr>
       <td align="right"><?php echo $this->_tpl_vars['lang']['parent']; ?>
</td>
       <td>
        <select name="parent_id">
         <option value="0"><?php echo $this->_tpl_vars['lang']['empty']; ?>
</option>
         <?php $_from = $this->_tpl_vars['article_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cate']):
?>
         <?php if ($this->_tpl_vars['cate']['cat_id'] == $this->_tpl_vars['cat_info']['parent_id']): ?>
         <option value="<?php echo $this->_tpl_vars['cate']['cat_id']; ?>
" selected="selected"><?php echo $this->_tpl_vars['cate']['mark']; ?>
 <?php echo $this->_tpl_vars['cate']['cat_name']; ?>
</option>
         <?php else: ?>
         <option value="<?php echo $this->_tpl_vars['cate']['cat_id']; ?>
"><?php echo $this->_tpl_vars['cate']['mark']; ?>
 <?php echo $this->_tpl_vars['cate']['cat_name']; ?>
</option>
         <?php endif; ?>
         <?php endforeach; endif; unset($_from); ?>
        </select>
       </td>
      </tr>
      <tr>
       <td align="right"><?php echo $this->_tpl_vars['lang']['keywords']; ?>
</td>
       <td>
        <input type="text" name="keywords" value="<?php echo $this->_tpl_vars['cat_info']['keywords']; ?>
" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right"><?php echo $this->_tpl_vars['lang']['description']; ?>
</td>
       <td>
        <textarea name="description" cols="60" rows="4" class="textArea"><?php echo $this->_tpl_vars['cat_info']['description']; ?>
</textarea>
       </td>
      </tr>
      <tr>
       <td align="right"><?php echo $this->_tpl_vars['lang']['sort']; ?>
</td>
       <td>
        <input type="text" name="sort" value="<?php if ($this->_tpl_vars['cat_info']['sort']): ?><?php echo $this->_tpl_vars['cat_info']['sort']; ?>
<?php else: ?>50<?php endif; ?>" size="5" class="inpMain" />
       </td>
      </tr>
	 
      
	  <tr>
       <td align="right">口令</td>
       <td>
        <input type="text" name="password" value="<?php echo $this->_tpl_vars['cat_info']['password']; ?>
" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">模版</td>
       <td>
        <input type="text" name="template" value="<?php echo $this->_tpl_vars['cat_info']['template']; ?>
" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td></td>
       <td>
        <input type="hidden" name="token" value="<?php echo $this->_tpl_vars['token']; ?>
" />
        <input type="hidden" name="cat_id" value="<?php echo $this->_tpl_vars['cat_info']['cat_id']; ?>
" />
        <input name="submit" class="btn" type="submit" value="<?php echo $this->_tpl_vars['lang']['btn_submit']; ?>
" />
       </td>
      </tr>
     </table>
    </form>
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
<script type="text/javascript">
    <?php echo '
    $(function(){
        $(\'#selectPosition span\').click(function(){
            var sid = parseInt($(this).attr(\'id\'));

            if(\'undefined\' != typeof($(\'#\'+sid+\'s\').val()) &&  $(\'#\'+sid+\'s\').val() != \'\'){
                return false;
            }
            var sname = $(this).html();
            $(\'#homePosition\').append("<span style=\'border:1px solid #c9c9c9;padding: 2px;cursor: pointer;margin-right:1em; \'><input type=\'hidden\' value=\'"+sid+"\' id=\'"+sid+"s\' name=\'homePosition[]\'>"+sname+"</span>");
        });

        $(\'#homePosition\').on(\'click\',\'span\',function(){
            $(this).remove();
        })
    })
    '; ?>

</script>
</html>