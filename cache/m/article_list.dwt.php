<?php /* Smarty version 2.6.26, created on 2017-11-06 00:11:12
         compiled from article_list.dwt */ ?>
﻿<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>无标题文档</title>
</head>

<body>


<div data-page-content="1">
    <?php $_from = $this->_tpl_vars['article_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['article_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['article_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['list']):
        $this->_foreach['article_list']['iteration']++;
?>
        <div class="docs">
            <a href="<?php echo $this->_tpl_vars['list']['url']; ?>
">
                <?php if ($this->_tpl_vars['list']['image']): ?>
                    <div class="photo"><img src="<?php echo $this->_tpl_vars['list']['image']; ?>
 " alt="<?php echo $this->_tpl_vars['list']['title']; ?>
"/></div>
                <?php endif; ?>
                <h4><?php echo $this->_tpl_vars['list']['title']; ?>
 </h4>
                <p><?php echo $this->_tpl_vars['list']['description']; ?>
 </p>
                <time> <?php echo $this->_tpl_vars['list']['add_time']; ?>
</time>

            </a>
        </div>
    <?php endforeach; endif; unset($_from); ?>


</div>


</body>
</html>