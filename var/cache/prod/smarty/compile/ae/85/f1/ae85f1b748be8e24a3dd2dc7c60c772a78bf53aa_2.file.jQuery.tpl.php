<?php
/* Smarty version 3.1.32, created on 2018-09-29 23:23:27
  from '/Library/WebServer/Documents/modules/cartsguru/views/templates/hook/jQuery.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bafed4f7b3b61_39202810',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ae85f1b748be8e24a3dd2dc7c60c772a78bf53aa' => 
    array (
      0 => '/Library/WebServer/Documents/modules/cartsguru/views/templates/hook/jQuery.tpl',
      1 => 1538247324,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bafed4f7b3b61_39202810 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
  window.cg_waitingJQuery = [];
  function cg_onJQueryReady (fn) {
    if (window.cgjQuery) {
      fn();
    } else {
      window.cg_waitingJQuery.push(fn);
    }
  }

  function cg_onJQueryLoaded () {
    while (window.cg_waitingJQuery.length > 0) {
      var fn = window.cg_waitingJQuery.shift();
      setTimeout(function () {
        fn();
      }, 500);
    }
  }

  function cg_onReady(callback){
    // in case the document is already rendered
    if (document.readyState!='loading') {
      callback();
    }
    // modern browsers
    else if (document.addEventListener) {
      document.addEventListener('DOMContentLoaded', callback);
    }
    // IE <= 8
    else {
      document.attachEvent('onreadystatechange', function(){
          if (document.readyState=='complete') callback();
      });
    }
  }

  cg_onReady(function(){
    if (window.jQuery) {
      window.cgjQuery = window.jQuery;
      cg_onJQueryLoaded();
    } else {
      var script = document.createElement('script');
      document.head.appendChild(script);
      script.type = 'text/javascript';
      script.src = "//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js";
      script.onload = function() {
        window.cgjQuery = jQuery.noConflict(true);
        cg_onJQueryLoaded();
      };
    }
  });
<?php echo '</script'; ?>
>
<?php }
}
