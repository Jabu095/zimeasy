<?php
/* Smarty version 3.1.32, created on 2018-09-29 23:09:11
  from '/Library/WebServer/Documents/admin845dnetcy/themes/default/template/content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bafe9f78bff86_86036913',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ad61cd2f70ca045dbdf521df12adc9704812227' => 
    array (
      0 => '/Library/WebServer/Documents/admin845dnetcy/themes/default/template/content.tpl',
      1 => 1538242859,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bafe9f78bff86_86036913 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="ajax_confirmation" class="alert alert-success hide"></div>
<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div>
<?php }
}
