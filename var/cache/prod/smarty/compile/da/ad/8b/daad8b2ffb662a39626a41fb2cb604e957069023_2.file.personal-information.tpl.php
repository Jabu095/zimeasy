<?php
/* Smarty version 3.1.32, created on 2018-09-29 23:23:27
  from '/Library/WebServer/Documents/themes/classic/templates/checkout/_partials/steps/personal-information.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bafed4f8d2c17_69119308',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'daad8b2ffb662a39626a41fb2cb604e957069023' => 
    array (
      0 => '/Library/WebServer/Documents/themes/classic/templates/checkout/_partials/steps/personal-information.tpl',
      1 => 1538242865,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bafed4f8d2c17_69119308 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9401383875bafed4f8bd0a9_14201197', 'step_content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'checkout/_partials/steps/checkout-step.tpl');
}
/* {block 'step_content'} */
class Block_9401383875bafed4f8bd0a9_14201197 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'step_content' => 
  array (
    0 => 'Block_9401383875bafed4f8bd0a9_14201197',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <?php if ($_smarty_tpl->tpl_vars['customer']->value['is_logged'] && !$_smarty_tpl->tpl_vars['customer']->value['is_guest']) {?>

    <p class="identity">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Connected as [1]%firstname% %lastname%[/1].','d'=>'Shop.Theme.Customeraccount','sprintf'=>array('[1]'=>"<a href='".((string)$_smarty_tpl->tpl_vars['urls']->value['pages']['identity'])."'>",'[/1]'=>"</a>",'%firstname%'=>$_smarty_tpl->tpl_vars['customer']->value['firstname'],'%lastname%'=>$_smarty_tpl->tpl_vars['customer']->value['lastname'])),$_smarty_tpl ) );?>

    </p>
    <p>
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Not you? [1]Log out[/1]','d'=>'Shop.Theme.Customeraccount','sprintf'=>array('[1]'=>"<a href='".((string)$_smarty_tpl->tpl_vars['urls']->value['actions']['logout'])."'>",'[/1]'=>"</a>")),$_smarty_tpl ) );?>

    </p>
    <?php if (!isset($_smarty_tpl->tpl_vars['empty_cart_on_logout']->value) || $_smarty_tpl->tpl_vars['empty_cart_on_logout']->value) {?>
      <p><small><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'If you sign out now, your cart will be emptied.','d'=>'Shop.Theme.Checkout'),$_smarty_tpl ) );?>
</small></p>
    <?php }?>

  <?php } else { ?>

    <ul class="nav nav-inline my-2" role="tablist">
      <li class="nav-item">
        <a
          class="nav-link <?php if (!$_smarty_tpl->tpl_vars['show_login_form']->value) {?>active<?php }?>"
          data-toggle="tab"
          href="#checkout-guest-form"
          role="tab"
          aria-controls="checkout-guest-form"
          <?php if (!$_smarty_tpl->tpl_vars['show_login_form']->value) {?> aria-selected="true"<?php }?>
          >
          <?php if ($_smarty_tpl->tpl_vars['guest_allowed']->value) {?>
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Order as a guest','d'=>'Shop.Theme.Checkout'),$_smarty_tpl ) );?>

          <?php } else { ?>
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Create an account','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl ) );?>

          <?php }?>
        </a>
      </li>

      <li class="nav-item">
        <span href="nav-separator"> | </span>
      </li>

      <li class="nav-item">
        <a
          class="nav-link <?php if ($_smarty_tpl->tpl_vars['show_login_form']->value) {?>active<?php }?>"
          data-link-action="show-login-form"
          data-toggle="tab"
          href="#checkout-login-form"
          role="tab"
          aria-controls="checkout-login-form"
          <?php if ($_smarty_tpl->tpl_vars['show_login_form']->value) {?> aria-selected="true"<?php }?>
        >
          <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Sign in','d'=>'Shop.Theme.Actions'),$_smarty_tpl ) );?>

        </a>
      </li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane <?php if (!$_smarty_tpl->tpl_vars['show_login_form']->value) {?>active<?php }?>" id="checkout-guest-form" role="tabpanel" <?php if ($_smarty_tpl->tpl_vars['show_login_form']->value) {?>aria-hidden="true"<?php }?>>
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['render'][0], array( array('file'=>'checkout/_partials/customer-form.tpl','ui'=>$_smarty_tpl->tpl_vars['register_form']->value,'guest_allowed'=>$_smarty_tpl->tpl_vars['guest_allowed']->value),$_smarty_tpl ) );?>

      </div>
      <div class="tab-pane <?php if ($_smarty_tpl->tpl_vars['show_login_form']->value) {?>active<?php }?>" id="checkout-login-form" role="tabpanel" <?php if (!$_smarty_tpl->tpl_vars['show_login_form']->value) {?>aria-hidden="true"<?php }?>>
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['render'][0], array( array('file'=>'checkout/_partials/login-form.tpl','ui'=>$_smarty_tpl->tpl_vars['login_form']->value),$_smarty_tpl ) );?>

      </div>
    </div>


  <?php }
}
}
/* {/block 'step_content'} */
}