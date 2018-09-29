<?php
/* Smarty version 3.1.32, created on 2018-09-29 23:23:27
  from '/Library/WebServer/Documents/modules/ps_legalcompliance/views/templates/hook/hookDisplayOverrideTemplateFooter.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bafed4f7d8a75_96232181',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '131f00861e1950c2957c2371fd2d14178854d557' => 
    array (
      0 => '/Library/WebServer/Documents/modules/ps_legalcompliance/views/templates/hook/hookDisplayOverrideTemplateFooter.tpl',
      1 => 1538247484,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bafed4f7d8a75_96232181 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6263376435bafed4f7d6ed5_81887799', 'footer');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'checkout/checkout.tpl');
}
/* {block 'footer'} */
class Block_6263376435bafed4f7d6ed5_81887799 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_6263376435bafed4f7d6ed5_81887799',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="footer-container">
  <div class="container">
    <div class="row">
      <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayFooter'),$_smarty_tpl ) );?>

    </div>
  </div>
</div>
<?php
}
}
/* {/block 'footer'} */
}
