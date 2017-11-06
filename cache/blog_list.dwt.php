<?php /* Smarty version 2.6.26, created on 2017-10-23 22:20:12
         compiled from blog_list.dwt */ ?>
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
                            <h5><a href="<?php echo $this->_tpl_vars['list']['url']; ?>
" class="lx"><?php echo $this->_tpl_vars['list']['cat_name']; ?>
 </a> <a href="<?php echo $this->_tpl_vars['list']['url']; ?>
"><?php echo $this->_tpl_vars['list']['title']; ?>
 </a> </h5>
                            <?php if ($this->_tpl_vars['list']['image']): ?>
                                <div class="photo" > <img src="<?php echo $this->_tpl_vars['list']['image']; ?>
 " alt="<?php echo $this->_tpl_vars['list']['title']; ?>
" /> </div>
                            <?php endif; ?>
                            <p> <?php echo $this->_tpl_vars['list']['description']; ?>
 </p>
                            <a href="<?php echo $this->_tpl_vars['list']['url']; ?>
" class="read_all">阅读全文</a>
                            <div class="values">
                                <em><i class="icon_vals_ icon_vals_1x1"></i><?php echo $this->_tpl_vars['list']['user_name']; ?>
 </em>
                                <time><i class="icon_vals_ icon_vals_2x1"></i><?php echo $this->_tpl_vars['list']['add_time']; ?>
</time>
                                <ins><i class="icon_vals_ icon_vals_3x1"></i> <?php echo $this->_tpl_vars['list']['view']; ?>
</ins>
                            </div>

                        </div>
                    <?php endforeach; endif; unset($_from); ?>
           


                </div>
</body>
</html>