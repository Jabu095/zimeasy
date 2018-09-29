<?php
/* Smarty version 3.1.32, created on 2018-09-29 23:24:11
  from '/Library/WebServer/Documents/themes/classic/templates/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bafed7b2d3df2_33243579',
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
function content_5bafed7b2d3df2_33243579 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2088641405bafed7b2ce603_46189714', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, $_smarty_tpl->tpl_vars['layout']->value);
}
/* {block 'page_title'} */
class Block_2808362975bafed7b2cf214_41333378 extends Smarty_Internal_Block
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
class Block_18170869595bafed7b2ceb23_62794681 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2808362975bafed7b2cf214_41333378', 'page_title', $this->tplIndex);
?>

    <?php
}
}
/* {/block 'page_header_container'} */
/* {block 'page_content_top'} */
class Block_5392461095bafed7b2d1105_73282482 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'page_content'} */
class Block_12503709245bafed7b2d17f2_34141306 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Page content -->
        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_5922527495bafed7b2d0b70_32248212 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <section id="content" class="page-content card card-block">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5392461095bafed7b2d1105_73282482', 'page_content_top', $this->tplIndex);
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12503709245bafed7b2d17f2_34141306', 'page_content', $this->tplIndex);
?>

      </section>
    <?php
}
}
/* {/block 'page_content_container'} */
/* {block 'page_footer'} */
class Block_10262343855bafed7b2d2cd5_68248502 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Footer content -->
        <?php
}
}
/* {/block 'page_footer'} */
/* {block 'page_footer_container'} */
class Block_15591176595bafed7b2d2647_79663119 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <footer class="page-footer">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10262343855bafed7b2d2cd5_68248502', 'page_footer', $this->tplIndex);
?>

      </footer>
    <?php
}
}
/* {/block 'page_footer_container'} */
/* {block 'content'} */
class Block_2088641405bafed7b2ce603_46189714 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2088641405bafed7b2ce603_46189714',
  ),
  'page_header_container' => 
  array (
    0 => 'Block_18170869595bafed7b2ceb23_62794681',
  ),
  'page_title' => 
  array (
    0 => 'Block_2808362975bafed7b2cf214_41333378',
  ),
  'page_content_container' => 
  array (
    0 => 'Block_5922527495bafed7b2d0b70_32248212',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_5392461095bafed7b2d1105_73282482',
  ),
  'page_content' => 
  array (
    0 => 'Block_12503709245bafed7b2d17f2_34141306',
  ),
  'page_footer_container' => 
  array (
    0 => 'Block_15591176595bafed7b2d2647_79663119',
  ),
  'page_footer' => 
  array (
    0 => 'Block_10262343855bafed7b2d2cd5_68248502',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


  <section id="main">

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18170869595bafed7b2ceb23_62794681', 'page_header_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5922527495bafed7b2d0b70_32248212', 'page_content_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15591176595bafed7b2d2647_79663119', 'page_footer_container', $this->tplIndex);
?>


  </section>

<?php
}
}
/* {/block 'content'} */
}
