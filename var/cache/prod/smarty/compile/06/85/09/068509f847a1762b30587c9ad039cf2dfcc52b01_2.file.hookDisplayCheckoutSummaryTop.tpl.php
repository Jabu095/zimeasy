<?php
/* Smarty version 3.1.32, created on 2018-09-29 23:23:27
  from '/Library/WebServer/Documents/modules/ps_legalcompliance/views/templates/hook/hookDisplayCheckoutSummaryTop.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bafed4fa13fd0_70641026',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '068509f847a1762b30587c9ad039cf2dfcc52b01' => 
    array (
      0 => '/Library/WebServer/Documents/modules/ps_legalcompliance/views/templates/hook/hookDisplayCheckoutSummaryTop.tpl',
      1 => 1538247484,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bafed4fa13fd0_70641026 (Smarty_Internal_Template $_smarty_tpl) {
?>
 <h5 class="aeuc_scart"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link_shopping_cart']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'My shopping cart','d'=>'Modules.Legalcompliance.Shop'),$_smarty_tpl ) );?>
</a></h5>
<?php }
}
