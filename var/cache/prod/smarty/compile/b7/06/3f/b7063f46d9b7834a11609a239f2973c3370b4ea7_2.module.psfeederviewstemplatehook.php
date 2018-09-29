<?php
/* Smarty version 3.1.32, created on 2018-09-29 23:23:27
  from 'module:psfeederviewstemplatehook' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bafed4f757161_21970685',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b7063f46d9b7834a11609a239f2973c3370b4ea7' => 
    array (
      0 => 'module:psfeederviewstemplatehook',
      1 => 1538246986,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bafed4f757161_21970685 (Smarty_Internal_Template $_smarty_tpl) {
?><link rel="alternate" type="application/rss+xml" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['meta']['title'], ENT_QUOTES, 'UTF-8');?>
" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('entity'=>'module','name'=>'ps_feeder','controller'=>'rss','params'=>array('id_category'=>$_smarty_tpl->tpl_vars['id_category']->value,'orderby'=>$_smarty_tpl->tpl_vars['orderBy']->value,'orderway'=>$_smarty_tpl->tpl_vars['orderWay']->value)),$_smarty_tpl ) );?>
">
<?php }
}
