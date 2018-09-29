<?php
/* Smarty version 3.1.32, created on 2018-09-29 23:23:27
  from '/Library/WebServer/Documents/modules/ns8csp/views/templates/admin/script.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bafed4f7cd686_04183991',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9553902aa643ef12e4835598552828189f6378d8' => 
    array (
      0 => '/Library/WebServer/Documents/modules/ns8csp/views/templates/admin/script.tpl',
      1 => 1538247349,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bafed4f7cd686_04183991 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
>
  if (!Aggregator){var Aggregator=function(o){
    var d=document,p=Aggregator.prototype;this.options=o;this.q=[];d.cookie='__na_c=1';p.p=function(c){return function(){
    this.q.push([c,arguments])}};p.setPerson=p.p(4,arguments);p.logEvent=p.p(0,arguments);p.logPageview=p.p(1,arguments);
    p.ready=p.p(2,arguments);p.logOutbound=p.p(3,arguments);p.updatePerson=p.p(5,arguments);p.updateSession=p.p(6,arguments);
    p.updateEvent=p.p(7,arguments);p.push=p.p(8,arguments);var s=d.createElement('script');s.type='text/javascript';
    s.async=true;(function(i){s.onreadystatechange=function(){if(s.readyState=='loaded'||s.readyState=='complete'){i.run();}};
    s.onload=function(){i.run();}})(this);e=location.protocol=='https:';s.src='http'+(e?'s://':'://')+
    (e&&navigator.userAgent.indexOf('MSIE')>-1?'a-{0}.ns8ds.com':'a-{0}.cdn.ns8ds.com').replace('{0}',o.projectId)+
    '/web?t='+Math.floor((new Date()*.00001)/36);var e=d.getElementsByTagName('script')[0];e.parentNode.insertBefore(s,e);
}}


  var ns8protect = new Aggregator({
    "timing": true,
    "protect": true,
    "projectId": "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectId']->value,'quotes','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
",
    "hostId": "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['shopId']->value,'quotes','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
"
    });
  ns8protect.logPageview();
<?php echo '</script'; ?>
><?php }
}
