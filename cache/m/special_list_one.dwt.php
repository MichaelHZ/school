<?php /* Smarty version 2.6.26, created on 2017-11-06 22:06:31
         compiled from special_list_one.dwt */ ?>
﻿<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>无标题文档</title>
</head>

<body>


<div data-page-content="1">


    <?php $_from = $this->_tpl_vars['article_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
        <div class="Project">
            <h4><a href="<?php echo $this->_tpl_vars['c']['url']; ?>
"><?php echo $this->_tpl_vars['c']['title']; ?>
 </a></h4>
            <h5><?php echo $this->_tpl_vars['c']['description']; ?>
</h5>
            <?php if ($this->_tpl_vars['c']['child']): ?>
                <ul>
                    <?php $_from = $this->_tpl_vars['c']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sub']):
?>
                        <li><a href="<?php echo $this->_tpl_vars['sub']['url']; ?>
"><?php echo $this->_tpl_vars['sub']['title']; ?>
</a></li>
                    <?php endforeach; endif; unset($_from); ?>

                </ul>
            <?php endif; ?>
        </div>
    <?php endforeach; endif; unset($_from); ?>


</div>


</body>
</html>