<?php /* Smarty version 2.6.26, created on 2017-11-06 22:47:03
         compiled from special_list_two.dwt */ ?>
﻿<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
                <div data-page-content="1"> 

								<ul class="DocList">
                                    <?php $_from = $this->_tpl_vars['article_list_sid']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
									<li><a href="<?php echo $this->_tpl_vars['article']['url']; ?>
"><?php echo $this->_tpl_vars['article']['title']; ?>
</a></li>
                                    <?php endforeach; endif; unset($_from); ?>

								</ul>

                </div>

</body>
</html>