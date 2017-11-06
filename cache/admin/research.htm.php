<?php /* Smarty version 2.6.26, created on 2017-11-02 22:28:37
         compiled from research.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'ltrim', 'research.htm', 351, false),array('modifier', 'date_format', 'research.htm', 376, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta  <?php echo $this->_tpl_vars['IS_CREATE']; ?>
http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
<script type="text/javascript" src="images/jquery.autotextarea.js"></script>
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
   <?php if ($this->_tpl_vars['rec'] == 'auditing'): ?>
    <?php if ($this->_tpl_vars['if_sort']): ?>
    <div class="homeSortRight">
     <ul class="homeSortBg">
      <?php echo $this->_tpl_vars['sort_bg']; ?>

     </ul>
     <ul class="homeSortList">
      <?php $_from = $this->_tpl_vars['sort']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sort'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sort']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['article']):
        $this->_foreach['sort']['iteration']++;
?>
      <li>
       <em><?php echo $this->_tpl_vars['article']['title']; ?>
</em>
       <a href="article.php?rec=del_sort&id=<?php echo $this->_tpl_vars['article']['id']; ?>
" title="<?php echo $this->_tpl_vars['lang']['sort_cancel']; ?>
">X</a>
      </li>
      <?php endforeach; endif; unset($_from); ?>
     </ul>
    </div>
    <?php endif; ?>
    <div id="list"<?php if ($this->_tpl_vars['if_sort']): ?> class="homeSortLeft"<?php endif; ?>>
    <form name="action" method="post" action="research.php?rec=action">
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
     <tr>
      <th width="22" align="center"><input name='chkall' type='checkbox' id='chkall' onclick='selectcheckbox(this.form)' value='check'></th>
      <th width="40" align="center"><?php echo $this->_tpl_vars['lang']['record_id']; ?>
</th>
      <th align="left"><?php echo $this->_tpl_vars['lang']['article_name']; ?>
</th>
      <th width="150" align="center"><?php echo $this->_tpl_vars['lang']['article_category']; ?>
</th>
      <th width="80" align="center"><?php echo $this->_tpl_vars['lang']['add_time']; ?>
</th>
      <th width="120" align="center">审核状态</th>
     </tr>
     <?php $_from = $this->_tpl_vars['article_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
     <tr>
      <td align="center"><input type="checkbox" name="checkbox[]" value="<?php echo $this->_tpl_vars['article']['id']; ?>
" /></td>
      <td align="center"><?php echo $this->_tpl_vars['article']['id']; ?>
</td>
      <td><a href="article.php?rec=edit&id=<?php echo $this->_tpl_vars['article']['id']; ?>
"><?php echo $this->_tpl_vars['article']['title']; ?>
</a><?php if ($this->_tpl_vars['article']['image']): ?> <a href="../<?php echo $this->_tpl_vars['article']['image']; ?>
" target="_blank"><img src="images/icon_picture.png" width="16" height="16" align="absMiddle"></a><?php endif; ?></td>
      <td align="center"><?php if ($this->_tpl_vars['article']['cat_name']): ?><a href="research.php?cat_id=<?php echo $this->_tpl_vars['article']['cat_id']; ?>
"><?php echo $this->_tpl_vars['article']['cat_name']; ?>
</a><?php else: ?><?php echo $this->_tpl_vars['lang']['uncategorized']; ?>
<?php endif; ?></td>
      
      <td align="center"><?php echo $this->_tpl_vars['article']['add_time']; ?>
</td>
      <td align="center">
       <?php if ($this->_tpl_vars['article']['auditing']): ?>已审核<?php else: ?>未审核<?php endif; ?>
      </td>
     </tr>
     <?php endforeach; endif; unset($_from); ?>
    </table>
    <div class="action">
     <select name="action" onchange="douAction()">
      <option value="auditing_all" selected>审核</option>
     </select>
     <input name="submit" class="btn" type="submit" value="<?php echo $this->_tpl_vars['lang']['btn_execute']; ?>
" />
    </div>
    </form>
    </div>
    <div class="clear"></div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pager.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['rec'] == 'default'): ?>
	
    <?php if ($this->_tpl_vars['IS_CREATE']): ?>  
    	<?php if ($this->_tpl_vars['process_auth']['ckboxCreate_add']): ?>
    	<h3><a href="<?php echo $this->_tpl_vars['action_link']['href']; ?>
" class="actionBtn add"><?php echo $this->_tpl_vars['action_link']['text']; ?>
</a><?php echo $this->_tpl_vars['ur_here']; ?>
</h3>
    	<?php endif; ?>
    <?php elseif ($this->_tpl_vars['IS_GROUP']): ?>
     	<?php if ($this->_tpl_vars['process_auth']['ckboxGroup_add']): ?>
    	<h3><a href="<?php echo $this->_tpl_vars['action_link']['href']; ?>
" class="actionBtn add"><?php echo $this->_tpl_vars['action_link']['text']; ?>
</a><?php echo $this->_tpl_vars['ur_here']; ?>
</h3>
    	<?php endif; ?>
    <?php else: ?>
     	<?php if ($this->_tpl_vars['process_auth']['ckboxCatAuth_add']): ?>
    	<h3><a href="<?php echo $this->_tpl_vars['action_link']['href']; ?>
" class="actionBtn add"><?php echo $this->_tpl_vars['action_link']['text']; ?>
</a><?php echo $this->_tpl_vars['ur_here']; ?>
</h3>
    	<?php elseif ($this->_tpl_vars['IS_ADMIN']): ?>
    	<h3><a href="<?php echo $this->_tpl_vars['action_link']['href']; ?>
" class="actionBtn add"><?php echo $this->_tpl_vars['action_link']['text']; ?>
</a><?php echo $this->_tpl_vars['ur_here']; ?>
</h3>
    	<?php endif; ?>
    <?php endif; ?>
    <div class="filter">
    <form action="research.php" method="post">
	 <?php if ($this->_tpl_vars['IS_ADMIN']): ?>
     <select name="cat_id" >
      <option value="0"><?php echo $this->_tpl_vars['lang']['uncategorized']; ?>
</option>
      <?php $_from = $this->_tpl_vars['article_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cate']):
?>
      <?php if ($this->_tpl_vars['cate']['cat_id'] == $this->_tpl_vars['cat_id']): ?>
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
	 <?php else: ?>
	   <?php $_from = $this->_tpl_vars['article_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cate']):
?>
	  <?php if ($this->_tpl_vars['cate']['cat_id'] == $this->_tpl_vars['cat_id']): ?>
	  <!-- 
	  <?php echo $this->_tpl_vars['cate']['cat_name']; ?>
 
	  -->
	  <input name="cat_id" type="text" class="inpMain" value="<?php echo $this->_tpl_vars['cate']['cat_id']; ?>
" size="20" hidden />
	  <?php endif; ?>
	  <?php endforeach; endif; unset($_from); ?>
	 <?php endif; ?>
     <input name="keyword" type="text" class="inpMain" value="<?php echo $this->_tpl_vars['keyword']; ?>
" size="20" />
	 
     <input name="submit" class="btnGray" type="submit" value="<?php echo $this->_tpl_vars['lang']['btn_filter']; ?>
" />
    </form>
    <span>
	<?php if ($this->_tpl_vars['IS_ADMIN']): ?>
    <?php if ($this->_tpl_vars['if_sort']): ?>
	
    <a class="btnGray" href="research.php?rec=sort"><?php echo $this->_tpl_vars['lang']['sort_close']; ?>
</a>
	
    <?php else: ?>
	
    <a class="btnGray" href="research.php?rec=sort"><?php echo $this->_tpl_vars['lang']['sort_article']; ?>
</a>

    <?php endif; ?>
	<?php endif; ?>
    </span>
    </div>
	<?php if ($this->_tpl_vars['IS_ADMIN']): ?>
    <?php if ($this->_tpl_vars['if_sort']): ?>
	
    <div class="homeSortRight">
     <ul class="homeSortBg">
      <?php echo $this->_tpl_vars['sort_bg']; ?>

     </ul>
     <ul class="homeSortList">
      <?php $_from = $this->_tpl_vars['sort']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sort'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sort']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['article']):
        $this->_foreach['sort']['iteration']++;
?>
      <li>
       <em><?php echo $this->_tpl_vars['article']['title']; ?>
</em>
       <a href="research.php?rec=del_sort&id=<?php echo $this->_tpl_vars['article']['id']; ?>
" title="<?php echo $this->_tpl_vars['lang']['sort_cancel']; ?>
">X</a>
      </li>
      <?php endforeach; endif; unset($_from); ?>
     </ul>
    </div>
    <?php endif; ?>
	<?php endif; ?>
    <div id="list"<?php if ($this->_tpl_vars['if_sort']): ?> class="homeSortLeft"<?php endif; ?>>
    <form name="action" method="post" action="research.php?rec=action">
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
     <tr>
      <th width="22" align="center"><input name='chkall' type='checkbox' id='chkall' onclick='selectcheckbox(this.form)' value='check'></th>
      <th width="40" align="center"><?php echo $this->_tpl_vars['lang']['record_id']; ?>
</th>
      <th align="left"><?php echo $this->_tpl_vars['lang']['article_name']; ?>
</th>
      <th width="150" align="center"><?php echo $this->_tpl_vars['lang']['article_category']; ?>
</th>
	  <th width="150" align="center">所属</th>
      <th width="80" align="center"><?php echo $this->_tpl_vars['lang']['add_time']; ?>
</th>
	   <th width="80" align="center">口令状态</th>
      <th width="120" align="center"><?php echo $this->_tpl_vars['lang']['handler']; ?>
</th>
     </tr>
     <?php $_from = $this->_tpl_vars['article_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
     <tr>
      <td align="center"><input type="checkbox" name="checkbox[]" value="<?php echo $this->_tpl_vars['article']['id']; ?>
" /></td>
      <td align="center"><?php echo $this->_tpl_vars['article']['id']; ?>
</td>
      <td><a href="research.php?rec=edit&id=<?php echo $this->_tpl_vars['article']['id']; ?>
"><?php echo $this->_tpl_vars['article']['title']; ?>
</a><?php if ($this->_tpl_vars['article']['image']): ?> <a href="../<?php echo $this->_tpl_vars['article']['image']; ?>
" target="_blank"><img src="images/icon_picture.png" width="16" height="16" align="absMiddle"></a><?php endif; ?></td>
      <td align="center"><?php if ($this->_tpl_vars['article']['cat_name']): ?><a href="research.php?cat_id=<?php echo $this->_tpl_vars['article']['cat_id']; ?>
"><?php echo $this->_tpl_vars['article']['cat_name']; ?>
</a><?php else: ?><?php echo $this->_tpl_vars['lang']['uncategorized']; ?>
<?php endif; ?></td>
	  <td align="center"><?php echo $this->_tpl_vars['article']['own']; ?>
</td>
      <td align="center"><?php echo $this->_tpl_vars['article']['add_time']; ?>
</td>
	   <td align="center">
        <?php if ($this->_tpl_vars['article']['is_password']): ?><img   class="active" data_id = "<?php echo $this->_tpl_vars['article']['cat_id']; ?>
" data_val="1" src="/admin/images/yes.gif"><?php else: ?><img class="active" data_id = "<?php echo $this->_tpl_vars['article']['cat_id']; ?>
" data_val="0" src="/admin/images/no.gif"><?php endif; ?>
       </td>
      <td align="center">
       <?php if ($this->_tpl_vars['if_sort']): ?>
       <a href="research.php?rec=set_sort&id=<?php echo $this->_tpl_vars['article']['id']; ?>
 "><?php echo $this->_tpl_vars['lang']['sort_btn']; ?>
</a>
       <?php else: ?>
       <?php if ($this->_tpl_vars['IS_ADMIN']): ?>
       		<a href="research.php?rec=edit&id=<?php echo $this->_tpl_vars['article']['id']; ?>
"><?php echo $this->_tpl_vars['lang']['edit']; ?>
</a>
       		| 
       			<a href="research.php?rec=del&id=<?php echo $this->_tpl_vars['article']['id']; ?>
"><?php echo $this->_tpl_vars['lang']['del']; ?>
</a>
       			 <?php if ($this->_tpl_vars['IS_CREATE']): ?>
       		|
        		<a href="create.php?cid=<?php echo $this->_tpl_vars['article']['id']; ?>
">创建</a> 	
        		<?php endif; ?>
       <?php elseif ($this->_tpl_vars['IS_CREATE']): ?>
       		<?php if ($this->_tpl_vars['process_auth']['ckboxCreate_edit']): ?>
       			<a href="research.php?rec=edit&id=<?php echo $this->_tpl_vars['article']['id']; ?>
"><?php echo $this->_tpl_vars['lang']['edit']; ?>
</a>
       		<?php endif; ?>
       		<?php if ($this->_tpl_vars['process_auth']['ckboxCreate_del']): ?>
       			| 
       			<a href="research.php?rec=del&id=<?php echo $this->_tpl_vars['article']['id']; ?>
"><?php echo $this->_tpl_vars['lang']['del']; ?>
</a>
       		<?php endif; ?>
        	<?php if ($this->_tpl_vars['process_auth']['ckboxCreate_add']): ?>
        		|
        		<a href="create.php?cid=<?php echo $this->_tpl_vars['article']['id']; ?>
">创建</a>
        	<?php endif; ?>
    
       <?php else: ?>
       		<?php if ($this->_tpl_vars['process_auth']['ckboxCat_edit']): ?>
       			<a href="research.php?rec=edit&id=<?php echo $this->_tpl_vars['article']['id']; ?>
"><?php echo $this->_tpl_vars['lang']['edit']; ?>
</a>
       		<?php endif; ?>
       		<?php if ($this->_tpl_vars['process_auth']['ckboxCat_del']): ?>
       			| 
       			<a href="research.php?rec=del&id=<?php echo $this->_tpl_vars['article']['id']; ?>
"><?php echo $this->_tpl_vars['lang']['del']; ?>
</a>
       		<?php endif; ?>
       
        <?php endif; ?>
       <?php endif; ?>
      </td>
     </tr>
     <?php endforeach; endif; unset($_from); ?>
    </table>
    <div class="action">
     <select name="action" onchange="douAction()">
      <option value="0"><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
      <option value="del_all"><?php echo $this->_tpl_vars['lang']['del']; ?>
</option>
	  <?php if ($this->_tpl_vars['IS_ADMIN']): ?>}
      <option value="category_move"><?php echo $this->_tpl_vars['lang']['category_move']; ?>
</option>
	  <?php endif; ?>
     </select>
     <select name="new_cat_id" style="display:none">
      <option value="0"><?php echo $this->_tpl_vars['lang']['uncategorized']; ?>
</option>
      <?php $_from = $this->_tpl_vars['article_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cate']):
?>
      <?php if ($this->_tpl_vars['cate']['cat_id'] == $this->_tpl_vars['cat_id']): ?>
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
     <input name="submit" class="btn" type="submit" value="<?php echo $this->_tpl_vars['lang']['btn_execute']; ?>
" />
    </div>
    </form>
    </div>
    <div class="clear"></div>
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
      			$.post("/admin/research_category.php",{rec:\'active\',val:val,id:id},function(data){
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

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pager.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['rec'] == 'add' || $this->_tpl_vars['rec'] == 'edit'): ?>
    <h3><a href="<?php echo $this->_tpl_vars['action_link']['href']; ?>
" class="actionBtn"><?php echo $this->_tpl_vars['action_link']['text']; ?>
</a><?php echo $this->_tpl_vars['ur_here']; ?>
</h3>
    <form action="research.php?rec=<?php echo $this->_tpl_vars['form_action']; ?>
" method="post" enctype="multipart/form-data">
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       <td width="90" align="right"><?php echo $this->_tpl_vars['lang']['article_name']; ?>
</td>
       <td>
        <input type="text" name="title" value="<?php echo $this->_tpl_vars['article']['title']; ?>
" size="80" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right"><?php echo $this->_tpl_vars['lang']['article_category']; ?>
</td>
       <td>
	    <?php if ($this->_tpl_vars['IS_ADMIN']): ?>
        <select name="cat_id" >
         <option value="0"><?php echo $this->_tpl_vars['lang']['uncategorized']; ?>
</option>
         <?php $_from = $this->_tpl_vars['article_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cate']):
?>
         <?php if ($this->_tpl_vars['cate']['cat_id'] == $this->_tpl_vars['article']['cat_id']): ?>
         <option value="<?php echo $this->_tpl_vars['cate']['cat_id']; ?>
" selected="selected"><?php echo $this->_tpl_vars['cate']['mark']; ?>
 <?php echo $this->_tpl_vars['cate']['cat_name']; ?>
</option>
         <?php elseif ($this->_tpl_vars['cat_id'] == $this->_tpl_vars['cate']['cat_id']): ?>

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
		<?php else: ?>
		 <?php $_from = $this->_tpl_vars['article_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cate']):
?>
         <?php if ($this->_tpl_vars['cate']['cat_id'] == $this->_tpl_vars['article']['cat_id']): ?>
		 <input type="text" name="" value="<?php echo $this->_tpl_vars['cate']['cat_name']; ?>
" size="80" class="inpFlie" readonly />
		 <input type="text" name="cat_id" value="<?php echo $this->_tpl_vars['cate']['cat_id']; ?>
" hidden /> 
		 <?php elseif ($this->_tpl_vars['cat_id'] == $this->_tpl_vars['cate']['cat_id']): ?>
		 <input type="text" name="" value="<?php echo $this->_tpl_vars['cate']['cat_name']; ?>
" size="80" class="inpFlie" readonly />
		 <input type="text" name="cat_id" value="<?php echo $this->_tpl_vars['cate']['cat_id']; ?>
" hidden /> 
		 <?php endif; ?>
		  <?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>
       </td>
      </tr>
      <tr>
       <td width="90" align="right"><?php echo $this->_tpl_vars['lang']['article_source']; ?>
</td>
       <td>
        <input type="text" name="source" value="<?php echo $this->_tpl_vars['article']['source']; ?>
" size="80" class="inpFlie" /> 
        <span><?php echo $this->_tpl_vars['lang']['article_micromail']; ?>
</span>
        <span><input name='micromail' type='checkbox' id='micromail'   
        <?php if ($this->_tpl_vars['article']['micromail']): ?> checked='true' <?php endif; ?>  value='1' <?php if ($this->_tpl_vars['rec'] == 'add'): ?>checked='true'  <?php endif; ?> /> </span>
         <span>创建</span>
        <span><input name='ctype' type='checkbox' id='ctype'   
        <?php if ($this->_tpl_vars['article']['ctype']): ?> checked='true' <?php endif; ?>  value='1' <?php if ($this->_tpl_vars['rec'] == 'add'): ?>  <?php endif; ?> /> </span>
       </td>
      </tr>
      <?php if ($this->_tpl_vars['article']['defined']): ?>
      
      <tr>
       <td align="right" valign="top"><?php echo $this->_tpl_vars['lang']['article_defined']; ?>
</td>
       <td>
        <textarea name="defined" id="defined" cols="50" class="textAreaAuto" style="height:<?php echo $this->_tpl_vars['article']['defined_count']; ?>
0px"><?php echo $this->_tpl_vars['article']['defined']; ?>
</textarea>
        <script type="text/javascript">
         <?php echo '
          $("#defined").autoTextarea({maxHeight:300});
         '; ?>

        </script>
        </td>
      </tr>
      <?php endif; ?>
      <tr>
       <td align="right" valign="top"><?php echo $this->_tpl_vars['lang']['article_content']; ?>
</td>
       <td>
        <!-- UEditor -->
       <script type="text/javascript" charset="utf-8" src="include/ueditor/ueditor.config.js"></script>
       <script type="text/javascript" charset="utf-8" src="include/ueditor/ueditor.all.js"></script>
       <link rel="stylesheet" type="text/css" href="include/ueditor/themes/default/css/ueditor.css"/>


        <script>
        <?php echo '
        $(function(){
            var ue = new baidu.editor.ui.Editor();
            ue.render("content");
        })


        '; ?>

        </script>
        <!-- /UEditor -->

        <textarea id="content" name="content" style="width:820px;height:400px;" class="textArea"><?php echo $this->_tpl_vars['article']['content']; ?>
</textarea><?php if ($this->_tpl_vars['article']['image']): ?><a href="../<?php echo ((is_array($_tmp=$this->_tpl_vars['article']['image'])) ? $this->_run_mod_handler('ltrim', true, $_tmp, '/') : ltrim($_tmp, '/')); ?>
" target="_blank"><img src="/<?php echo ((is_array($_tmp=$this->_tpl_vars['article']['image'])) ? $this->_run_mod_handler('ltrim', true, $_tmp, '/') : ltrim($_tmp, '/')); ?>
" width="150px;" ></a><?php else: ?><img src="images/icon_no.png"><?php endif; ?>
       </td>
      </tr>
      <tr>
       <td align="right"><?php echo $this->_tpl_vars['lang']['thumb']; ?>
</td>
       <td>
	   
        <input type="file" name="image" size="38" class="inpFlie" /> <input  id="thumbimg" type="text"  size="80" name="file" class="inpFlie"<?php if ($this->_tpl_vars['article']['image']): ?>  value="<?php echo $this->_tpl_vars['article']['image']; ?>
" <?php endif; ?>/>
        </td>
      </tr>
      <tr>
       <td align="right"><?php echo $this->_tpl_vars['lang']['keywords']; ?>
</td>
       <td>
        <input type="text" name="keywords" value="<?php echo $this->_tpl_vars['article']['keywords']; ?>
" size="114" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">自定义链接</td>
       <td>
        <input type="text" name="custom_url" value="<?php echo $this->_tpl_vars['article']['custom_url']; ?>
" size="114" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">自定义时间</td>
       <td>
        <input type="text" name="add_time" value="<?php if ($this->_tpl_vars['article']['add_time']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['add_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M:%S') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M:%S')); ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['cur_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d %H:%M:%S') : smarty_modifier_date_format($_tmp, '%Y-%m-%d %H:%M:%S')); ?>
<?php endif; ?>" size="114" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right"><?php echo $this->_tpl_vars['lang']['description']; ?>
</td>
       <td>
        <textarea name="description" cols="115" rows="3" class="textArea" /><?php echo $this->_tpl_vars['article']['description']; ?>
</textarea>
       </td>
      </tr>
	  <tr>
       <td align="right">口令</td>
       <td>
         <input type="text" name="password" value="<?php if ($this->_tpl_vars['article']['password']): ?><?php echo $this->_tpl_vars['article']['password']; ?>
<?php else: ?>cssm<?php endif; ?>" size="114" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td></td>
       <td>
        <input type="hidden" name="token" value="<?php echo $this->_tpl_vars['token']; ?>
" />
        <input type="hidden" name="image" value="<?php echo $this->_tpl_vars['article']['image']; ?>
">
        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['article']['id']; ?>
">
		<?php if ($this->_tpl_vars['IS_SELF'] || $this->_tpl_vars['IS_ADMIN']): ?>
        <input name="submit" class="btn" type="submit" value="<?php echo $this->_tpl_vars['lang']['btn_submit']; ?>
" />
		<?php endif; ?>
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
<?php if ($this->_tpl_vars['rec'] == 'default'): ?>
<script type="text/javascript">
<?php echo '
onload = function()
{
  document.forms[\'action\'].reset();
}

function douAction()
{
    var frm = document.forms[\'action\'];

    frm.elements[\'new_cat_id\'].style.display = frm.elements[\'action\'].value == \'category_move\' ? \'\' : \'none\';
}
'; ?>

</script>
<?php endif; ?>
<?php if ($this->_tpl_vars['rec'] == 'auditing'): ?>
<script type="text/javascript">
<?php echo '
onload = function()
{
  document.forms[\'action\'].reset();
}

function douAction()
{
    var frm = document.forms[\'action\'];

    frm.elements[\'new_cat_id\'].style.display = frm.elements[\'action\'].value == \'category_move\' ? \'\' : \'none\';
}
'; ?>

</script>
<?php endif; ?>
</body>
</html>