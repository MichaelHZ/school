<?php /* Smarty version 2.6.26, created on 2017-10-15 12:52:46
         compiled from fragment.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $this->_tpl_vars['lang']['home']; ?>
<?php if ($this->_tpl_vars['ur_here']): ?> - <?php echo $this->_tpl_vars['ur_here']; ?>
 <?php endif; ?></title>
<meta name="Copyright" content="Douco Design." />
<link href="templates/public.css" rel="stylesheet" type="text/css">
<link href="templates/fragment.css" rel="stylesheet" type="text/css">
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
   <div id="fragment" class="mainBox" style="<?php echo $this->_tpl_vars['workspace']['height']; ?>
">
    <h3><a href="<?php echo $this->_tpl_vars['action_link']['href']; ?>
" class="actionBtn"><?php echo $this->_tpl_vars['action_link']['text']; ?>
</a><?php if ($this->_tpl_vars['rec'] == 'edit'): ?><a href="fragment.php?rec=del&id=<?php echo $this->_tpl_vars['fragment']['id']; ?>
" class="delBtn"><?php echo $this->_tpl_vars['lang']['del']; ?>
</a><?php endif; ?><?php echo $this->_tpl_vars['ur_here']; ?>
</h3>
    <?php if ($this->_tpl_vars['rec'] == 'default'): ?>
    <div class="list">
     <?php $_from = $this->_tpl_vars['fragment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['fragment']):
?>
     <dl>
      <dd><?php echo $this->_tpl_vars['fragment']['content']; ?>
<p><em><?php echo $this->_tpl_vars['fragment']['fragment_name']; ?>
</em><a href="fragment.php?rec=edit&id=<?php echo $this->_tpl_vars['fragment']['id']; ?>
"><?php echo $this->_tpl_vars['lang']['edit']; ?>
</a></p></dd>
      <?php $_from = $this->_tpl_vars['fragment']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['child']):
?>
      <dd><?php echo $this->_tpl_vars['child']['content']; ?>
<p><em><?php echo $this->_tpl_vars['child']['fragment_name']; ?>
</em><a href="fragment.php?rec=edit&id=<?php echo $this->_tpl_vars['child']['id']; ?>
"><?php echo $this->_tpl_vars['lang']['edit']; ?>
</a></p></dd>
      <?php endforeach; endif; unset($_from); ?>
     </dl>
     <?php endforeach; endif; unset($_from); ?>
    </div>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['rec'] == 'add' || $this->_tpl_vars['rec'] == 'edit'): ?>
    <form action="fragment.php?rec=<?php echo $this->_tpl_vars['form_action']; ?>
" method="post" enctype="multipart/form-data">
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       <td width="80" align="right"><?php echo $this->_tpl_vars['lang']['fragment_name']; ?>
</td>
       <td colspan="2">
        <input type="text" name="fragment_name" value="<?php echo $this->_tpl_vars['fragment']['fragment_name']; ?>
" size="40" class="inpMain" />
        <p class="cue"><?php echo $this->_tpl_vars['lang']['fragment_name_cue']; ?>
</p>
       </td>
      </tr>
      <tr>
       <td align="right"><?php echo $this->_tpl_vars['lang']['fragment_mark']; ?>
</td>
       <td colspan="2">
        <input type="text" name="mark" value="<?php echo $this->_tpl_vars['fragment']['mark']; ?>
" size="40" class="inpMain" />
        <p class="cue"><?php echo $this->_tpl_vars['lang']['fragment_mark_cue']; ?>
</p>
       </td>
      </tr>
      <tr>
       <td align="right"><?php echo $this->_tpl_vars['lang']['fragment_image']; ?>
</td>
       <td>
        <div class="image">
        <?php if ($this->_tpl_vars['fragment']['image']): ?>
        <a href="../<?php echo $this->_tpl_vars['fragment']['image']; ?>
" target="_blank"><img src="../<?php echo $this->_tpl_vars['fragment']['image']; ?>
" height="100" /></a>
        <?php endif; ?>
        <p><input type="file" name="image" /></p>
        </div>
        <p class="cue"><?php echo $this->_tpl_vars['lang']['fragment_image_cue']; ?>
</p>
       </td>
      </tr>
      <tr>
       <td align="right"><?php echo $this->_tpl_vars['lang']['fragment_text']; ?>
</td>
       <td colspan="2">
        <textarea name="text" cols="92" rows="4" class="textArea"><?php echo $this->_tpl_vars['fragment']['text']; ?>
</textarea>
        <p class="cue"><?php echo $this->_tpl_vars['lang']['fragment_text_cue']; ?>
</p>
       </td>
      </tr>
      <tr>
       <td align="right"><?php echo $this->_tpl_vars['lang']['fragment_link']; ?>
</td>
       <td colspan="2">
        <input type="text" name="link" value="<?php echo $this->_tpl_vars['fragment']['link']; ?>
" size="90" class="inpMain" />
        <p class="cue"><?php echo $this->_tpl_vars['lang']['fragment_link_cue']; ?>
</p>
       </td>
      </tr>
      <tr>
       <td align="right"><?php echo $this->_tpl_vars['lang']['fragment_parent']; ?>
</td>
       <td colspan="2">
        <select name="parent_id">
         <option value="0"><?php echo $this->_tpl_vars['lang']['empty']; ?>
</option>
         <?php $_from = $this->_tpl_vars['fragment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
         <?php if ($this->_tpl_vars['list']['id'] == $this->_tpl_vars['fragment']['parent_id']): ?>
         <option value="<?php echo $this->_tpl_vars['list']['id']; ?>
" selected="selected"><?php echo $this->_tpl_vars['list']['fragment_name']; ?>
</option>
         <?php else: ?>
         <option value="<?php echo $this->_tpl_vars['list']['id']; ?>
"><?php echo $this->_tpl_vars['list']['fragment_name']; ?>
</option>
         <?php endif; ?>
         <?php endforeach; endif; unset($_from); ?>
        </select>
        <span class="cue"><?php echo $this->_tpl_vars['lang']['fragment_parent_cue']; ?>
</span>
       </td>
      </tr>
      <tr>
       <td></td>
       <td colspan="2">
        <input type="hidden" name="token" value="<?php echo $this->_tpl_vars['token']; ?>
" />
        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['fragment']['id']; ?>
">
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
</html>