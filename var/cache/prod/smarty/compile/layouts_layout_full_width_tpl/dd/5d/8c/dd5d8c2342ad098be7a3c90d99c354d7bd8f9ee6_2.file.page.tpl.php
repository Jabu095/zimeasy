<?php
/* Smarty version 3.1.32, created on 2018-09-29 23:23:40
  from '/Library/WebServer/Documents/themes/classic/templates/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bafed5c88e5d9_52330572',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd5d8c2342ad098be7a3c90d99c354d7bd8f9ee6' => 
    array (
      0 => '/Library/WebServer/Documents/themes/classic/templates/page.tpl',
      1 => 1538242865,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bafed5c88e5d9_52330572 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2685120125bafed5c887f60_11289157', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, $_smarty_tpl->tpl_vars['layout']->value);
}
/* {block 'page_title'} */
class Block_8723049905bafed5c888bc7_78246606 extends Smarty_Internal_Block
{
public $callsChild = 'true';
public $hide = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <header class="page-header">
          <h1><?php 
$_smarty_tpl->inheritance->callChild($_smarty_tpl, $this);
?>
</h1>
        </header>
      <?php
}
}
/* {/block 'page_title'} */
/* {block 'page_header_container'} */
class Block_3244574065bafed5c8884a9_68023829 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8723049905bafed5c888bc7_78246606', 'page_title', $this->tplIndex);
?>

    <?php
}
}
/* {/block 'page_header_container'} */
/* {block 'page_content_top'} */
class Block_12880537085bafed5c88b330_48385003 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'page_content'} */
class Block_2937298735bafed5c88bce7_45567270 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Page content -->
        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_10506572215bafed5c88a959_96457530 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <section id="content" class="page-content card card-block">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12880537085bafed5c88b330_48385003', 'page_content_top', $this->tplIndex);
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2937298735bafed5c88bce7_45567270', 'page_content', $this->tplIndex);
?>

      </section>
    <?php
}
}
/* {/block 'page_content_container'} */
/* {block 'page_footer'} */
class Block_14861192875bafed5c88d220_17410206 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Footer content -->
        <?php
}
}
/* {/block 'page_footer'} */
/* {block 'page_footer_container'} */
class Block_6431644075bafed5c88cba6_66026981 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <footer class="page-footer">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14861192875bafed5c88d220_17410206', 'page_footer', $this->tplIndex);
?>

      </footer>
    <?php
}
}
/* {/block 'page_footer_container'} */
/* {block 'content'} */
class Block_2685120125bafed5c887f60_11289157 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2685120125bafed5c887f60_11289157',
  ),
  'page_header_container' => 
  array (
    0 => 'Block_3244574065bafed5c8884a9_68023829',
  ),
  'page_title' => 
  array (
    0 => 'Block_8723049905bafed5c888bc7_78246606',
  ),
  'page_content_container' => 
  array (
    0 => 'Block_10506572215bafed5c88a959_96457530',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_12880537085bafed5c88b330_48385003',
  ),
  'page_content' => 
  array (
    0 => 'Block_2937298735bafed5c88bce7_45567270',
  ),
  'page_footer_container' => 
  array (
    0 => 'Block_6431644075bafed5c88cba6_66026981',
  ),
  'page_footer' => 
  array (
    0 => 'Block_14861192875bafed5c88d220_17410206',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


  <section id="main">

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3244574065bafed5c8884a9_68023829', 'page_header_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10506572215bafed5c88a959_96457530', 'page_content_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6431644075bafed5c88cba6_66026981', 'page_footer_container', $this->tplIndex);
?>


  </section>

<?php
}
}
/* {/block 'content'} */
}
