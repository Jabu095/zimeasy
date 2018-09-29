<?php
/* Smarty version 3.1.32, created on 2018-09-29 23:26:13
  from '/Library/WebServer/Documents/admin845dnetcy/themes/default/template/controllers/order_preferences/helpers/options/options.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bafedf5548161_39493709',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eccc09e64b67f763f393b6a6f10dc68125372637' => 
    array (
      0 => '/Library/WebServer/Documents/admin845dnetcy/themes/default/template/controllers/order_preferences/helpers/options/options.tpl',
      1 => 1538242860,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bafedf5548161_39493709 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9914833775bafedf55476c2_95692749', "after");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "helpers/options/options.tpl");
}
/* {block "after"} */
class Block_9914833775bafedf55476c2_95692749 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'after' => 
  array (
    0 => 'Block_9914833775bafedf55476c2_95692749',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">changeCMSActivationAuthorization();<?php echo '</script'; ?>
><?php
}
}
/* {/block "after"} */
}
