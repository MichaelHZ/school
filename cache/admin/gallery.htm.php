<?php /* Smarty version 2.6.26, created on 2017-10-15 12:48:00
         compiled from gallery.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $this->_tpl_vars['lang']['home']; ?>
<?php if ($this->_tpl_vars['ur_here']): ?> - <?php echo $this->_tpl_vars['ur_here']; ?>
 <?php endif; ?></title>
<meta name="Copyright" content="Douco Design." />
<link href="templates/public.css" rel="stylesheet" type="text/css">
<link href="templates/gallery.css" rel="stylesheet" type="text/css">
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
    <?php if ($this->_tpl_vars['rec'] == 'default'): ?>
    <h3><a href="<?php echo $this->_tpl_vars['action_link']['href']; ?>
" class="actionBtn add"><?php echo $this->_tpl_vars['action_link']['text']; ?>
</a><?php echo $this->_tpl_vars['ur_here']; ?>
</h3>
    <div class="filter">
    <form action="gallery.php" method="post">
     <select name="cat_id">
      <option value="0"><?php echo $this->_tpl_vars['lang']['uncategorized']; ?>
</option>
      <?php $_from = $this->_tpl_vars['gallery_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
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
     <input name="keyword" type="text" class="inpMain" value="<?php echo $this->_tpl_vars['keyword']; ?>
" size="20" />
     <input name="submit" class="btnGray" type="submit" value="<?php echo $this->_tpl_vars['lang']['btn_filter']; ?>
" />
    </form>
    <span>
    <?php if ($this->_tpl_vars['if_sort']): ?>
	<!--
    <a class="btnGray" href="gallery.php?rec=sort"><?php echo $this->_tpl_vars['lang']['sort_close']; ?>
</a>
	-->
    <?php else: ?>
	<!--
    <a class="btnGray" href="gallery.php?rec=sort"><?php echo $this->_tpl_vars['lang']['sort_gallery']; ?>
</a>
	-->
    <?php endif; ?>
    </span>
    </div>
    <?php if ($this->_tpl_vars['if_sort']): ?>
    <div class="homeSortRight">
     <ul class="homeSortBg">
      <?php echo $this->_tpl_vars['sort_bg']; ?>

     </ul>
     <ul class="homeSortList">
      <?php $_from = $this->_tpl_vars['sort']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sort'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sort']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['gallery']):
        $this->_foreach['sort']['iteration']++;
?>
      <li>
       <em><?php echo $this->_tpl_vars['gallery']['title']; ?>
</em>
       <a href="gallery.php?rec=del_sort&id=<?php echo $this->_tpl_vars['gallery']['id']; ?>
" title="<?php echo $this->_tpl_vars['lang']['sort_cancel']; ?>
">X</a>
      </li>
      <?php endforeach; endif; unset($_from); ?>
     </ul>
    </div>
    <?php endif; ?>
    <div id="list"<?php if ($this->_tpl_vars['if_sort']): ?> class="homeSortLeft"<?php endif; ?>>
    <form name="action" method="post" action="gallery.php?rec=action">
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
     <tr>
      <th width="22" align="center"><input name='chkall' type='checkbox' id='chkall' onclick='selectcheckbox(this.form)' value='check'></th>
      <th width="40" align="center"><?php echo $this->_tpl_vars['lang']['record_id']; ?>
</th>
      <th align="left"><?php echo $this->_tpl_vars['lang']['gallery_name']; ?>
</th>
      <th width="150" align="center"><?php echo $this->_tpl_vars['lang']['gallery_category']; ?>
</th>
	  <th width="150" align="center">所属</th>
      <th width="80" align="center"><?php echo $this->_tpl_vars['lang']['add_time']; ?>
</th>
      <th width="80" align="center">显示</th>
      <th width="80" align="center"><?php echo $this->_tpl_vars['lang']['handler']; ?>
</th>
     </tr>
     <?php $_from = $this->_tpl_vars['gallery_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['gallery']):
?>
     <tr>
      <td align="center"><input type="checkbox" name="checkbox[]" value="<?php echo $this->_tpl_vars['gallery']['id']; ?>
" /></td>
      <td align="center"><?php echo $this->_tpl_vars['gallery']['id']; ?>
</td>
      <td><a href="gallery.php?rec=edit&id=<?php echo $this->_tpl_vars['gallery']['id']; ?>
"><?php echo $this->_tpl_vars['gallery']['title']; ?>
</a><?php if ($this->_tpl_vars['gallery']['image']): ?> <a href="../<?php echo $this->_tpl_vars['gallery']['image']; ?>
" target="_blank"><img src="images/icon_picture.png" width="16" height="16" align="absMiddle"></a><?php endif; ?></td>
      <td align="center"><?php if ($this->_tpl_vars['gallery']['cat_name']): ?><a href="gallery.php?cat_id=<?php echo $this->_tpl_vars['gallery']['cat_id']; ?>
"><?php echo $this->_tpl_vars['gallery']['cat_name']; ?>
</a><?php else: ?><?php echo $this->_tpl_vars['lang']['uncategorized']; ?>
<?php endif; ?></td>
	 <td align="center"><?php echo $this->_tpl_vars['gallery']['own']; ?>
</td>
      <td align="center"><?php echo $this->_tpl_vars['gallery']['add_time']; ?>
</td>
       <td align="center">
      	<?php if ($this->_tpl_vars['gallery']['show']): ?><img   class="active" data_id = "<?php echo $this->_tpl_vars['gallery']['id']; ?>
" data_val="1" src="/admin/images/yes.gif"><?php else: ?><img class="active" data_id = "<?php echo $this->_tpl_vars['gallery']['id']; ?>
" data_val="0" src="/admin/images/no.gif"><?php endif; ?>
      </td>
      <td align="center">
       <?php if ($this->_tpl_vars['if_sort']): ?>
       <a href="gallery.php?rec=set_sort&id=<?php echo $this->_tpl_vars['gallery']['id']; ?>
"><?php echo $this->_tpl_vars['lang']['sort_btn']; ?>
</a>
       <?php else: ?>
       <a href="gallery.php?rec=edit&id=<?php echo $this->_tpl_vars['gallery']['id']; ?>
"><?php echo $this->_tpl_vars['lang']['edit']; ?>
</a> | <a href="gallery.php?rec=del&id=<?php echo $this->_tpl_vars['gallery']['id']; ?>
"><?php echo $this->_tpl_vars['lang']['del']; ?>
</a>
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
      <option value="category_move"><?php echo $this->_tpl_vars['lang']['category_move']; ?>
</option>
     </select>
     <select name="new_cat_id" style="display:none">
      <option value="0"><?php echo $this->_tpl_vars['lang']['uncategorized']; ?>
</option>
      <?php $_from = $this->_tpl_vars['gallery_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
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
      			$.post("/admin/gallery.php",{rec:\'active\',val:val,id:id},function(data){
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
    <form action="gallery.php?rec=<?php echo $this->_tpl_vars['form_action']; ?>
" method="post" enctype="multipart/form-data">
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       <td width="90" align="right"><?php echo $this->_tpl_vars['lang']['gallery_name']; ?>
</td>
       <td>
        <input type="text" name="title" value="<?php echo $this->_tpl_vars['gallery']['title']; ?>
" size="80" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right"><?php echo $this->_tpl_vars['lang']['gallery_category']; ?>
</td>
       <td>
        <select name="cat_id">
         <option value="0"><?php echo $this->_tpl_vars['lang']['uncategorized']; ?>
</option>
         <?php $_from = $this->_tpl_vars['gallery_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cate']):
?>
         <?php if ($this->_tpl_vars['cate']['cat_id'] == $this->_tpl_vars['gallery']['cat_id']): ?>
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
       <td align="right"><?php echo $this->_tpl_vars['lang']['thumb']; ?>
</td>
       <td>
        <input type="file" name="image" size="38" class="inpFlie" />
        <?php if ($this->_tpl_vars['gallery']['image']): ?><a href="../<?php echo $this->_tpl_vars['gallery']['image']; ?>
" target="_blank"><img src="images/icon_yes.png"></a><?php else: ?><img src="images/icon_no.png"><?php endif; ?></td>
      </tr>
      <tr>
       <td align="right"><?php echo $this->_tpl_vars['lang']['gallery_gallery']; ?>
</td>
       <td>
        <div id="gallery">
         <ul class="addBox">
          <li class="btnGallery" onclick="btn_gallery();"><?php echo $this->_tpl_vars['lang']['gallery_gallery_add']; ?>
</li>
          <li class="status" style="display:none"><img src="images/loader.gif" alt="uploading"/></li>
         </ul>
         <ul class="list">
          <?php $_from = $this->_tpl_vars['gallery_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?>
          <li><img src="<?php echo $this->_tpl_vars['site']['root_url']; ?>
images/gallery/<?php echo $this->_tpl_vars['value']; ?>
"><input type="hidden" name="gallery[]" value="images/gallery/<?php echo $this->_tpl_vars['value']; ?>
"><span id="<?php echo $this->_tpl_vars['value']; ?>
" class="del">X</span></li>
          <?php endforeach; endif; unset($_from); ?>
         </ul>
        </div>
       </td>
      </tr>
      <tr>
       <td align="right"><?php echo $this->_tpl_vars['lang']['keywords']; ?>
</td>
       <td>
        <input type="text" name="keywords" value="<?php echo $this->_tpl_vars['gallery']['keywords']; ?>
" size="114" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right"><?php echo $this->_tpl_vars['lang']['description']; ?>
</td>
       <td>
        <textarea name="description" cols="115" rows="3" class="textArea" /><?php echo $this->_tpl_vars['gallery']['description']; ?>
</textarea>
       </td>
      </tr>
      <tr>
       <td></td>
       <td>
        <input type="hidden" name="token" value="<?php echo $this->_tpl_vars['token']; ?>
" />
        <input type="hidden" name="image" value="<?php echo $this->_tpl_vars['gallery']['image']; ?>
">
        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['gallery']['id']; ?>
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
<?php else: ?>
<script type="text/javascript" src="images/jquery.form.js"></script>
<script type="text/javascript">
<?php echo '
$(function() {
    $(document).on("change", \'#galleryAjax\',
    function() {
        if ($("#galleryAjax").val() != \'\') {
            var status = $("#gallery .status");
            var btn = $("#gallery .btnGallery");
            $("#galleryForm").ajaxForm({
                target: \'#gallery .list\',
                url: \'gallery.php?rec=gallery\',
                dataType: \'html\',
                type: \'POST\',
                beforeSubmit: function() {
                    status.show();
                    btn.hide();
                },
                success: function() {
                    status.hide();
                    btn.show();
                },
                error: function() {
                    status.hide();
                    btn.show();
                }
            }).submit();
        }
    });
    $("body").on("click", "#gallery .del",
    function(e) {
        $(this).parent(\'li\').remove();
        var img_name = $(this).attr("id");
        $.ajax({
            url: \'gallery.php?rec=gallery_del\',
            data: {
                \'img_name\': img_name
            }
        });
    })

});
function btn_gallery() {
    $("#galleryAjax").click();
}
'; ?>

</script>
<form id="galleryForm" enctype="multipart/form-data" style="display:none"><input id="galleryAjax" type="file" name="gallery_file[]" multiple="true"><input type="hidden" name="id" value="<?php echo $this->_tpl_vars['gallery']['id']; ?>
"></form>
<?php endif; ?>
</body>
</html>