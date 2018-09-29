<?php
/* Smarty version 3.1.32, created on 2018-09-29 23:23:40
  from '/Library/WebServer/Documents/modules/ps_legalcompliance/views/templates/hook/hookDisplayFooterAfter.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bafed5c977026_33661334',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '722e818ae115d38aa47b22a7d6c9c471b5f6aaec' => 
    array (
      0 => '/Library/WebServer/Documents/modules/ps_legalcompliance/views/templates/hook/hookDisplayFooterAfter.tpl',
      1 => 1538247484,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bafed5c977026_33661334 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="aeuc_footer_info">
	<?php if (isset($_smarty_tpl->tpl_vars['delivery_additional_information']->value)) {?>
		* <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['delivery_additional_information']->value, ENT_QUOTES, 'UTF-8');?>

		<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link_shipping']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Shipping and payment','d'=>'Modules.Legalcompliance.Shop'),$_smarty_tpl ) );?>
</a>
	<?php } else { ?>
		<?php if ($_smarty_tpl->tpl_vars['tax_included']->value) {?>
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'All prices are mentioned tax included','d'=>'Modules.Legalcompliance.Shop'),$_smarty_tpl ) );?>

		<?php } else { ?>
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'All prices are mentioned tax excluded','d'=>'Modules.Legalcompliance.Shop'),$_smarty_tpl ) );?>

		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['show_shipping']->value) {?>
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'and','d'=>'Modules.Legalcompliance.Shop'),$_smarty_tpl ) );?>

			<?php if ($_smarty_tpl->tpl_vars['link_shipping']->value) {?>
				<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link_shipping']->value, ENT_QUOTES, 'UTF-8');?>
">
			<?php }?>
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'shipping excluded','d'=>'Modules.Legalcompliance.Shop'),$_smarty_tpl ) );?>

			<?php if ($_smarty_tpl->tpl_vars['link_shipping']->value) {?>
				</a>
			<?php }?>
		<?php }?>
	<?php }?>
</div>
<?php }
}
