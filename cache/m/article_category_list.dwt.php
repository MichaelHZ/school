<?php /* Smarty version 2.6.26, created on 2017-11-06 20:42:33
         compiled from article_category_list.dwt */ ?>
﻿<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>

                <div data-page-content="1"> 

                         <ul class="PhotoList">
                             <?php $_from = $this->_tpl_vars['article_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['article_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['article_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['list']):
        $this->_foreach['article_list']['iteration']++;
?>
                            <li> <a href="#" class="photo" >
                                    <?php if ($this->_tpl_vars['list']['image']): ?>
                                    <img src="<?php echo $this->_tpl_vars['list']['image']; ?>
 " alt="<?php echo $this->_tpl_vars['list']['title']; ?>
" />
                                    <?php endif; ?>
                                    <strong> <?php echo $this->_tpl_vars['list']['title']; ?>
</strong>
                                </a>
                            </li>
                             <?php endforeach; endif; unset($_from); ?>

                        </ul>
            
            

                </div>

</body>
</html>