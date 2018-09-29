<?php
/* Smarty version 3.1.32, created on 2018-09-29 23:23:27
  from '/Library/WebServer/Documents/modules/cartsguru/views/templates/hook/tracking.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bafed4f7bee77_82566089',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3177bdfeb5b65403c29171fd588e0fd37dba79d6' => 
    array (
      0 => '/Library/WebServer/Documents/modules/cartsguru/views/templates/hook/tracking.tpl',
      1 => 1538247324,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bafed4f7bee77_82566089 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
    cg_onJQueryReady(function (){
        cgjQuery(document).ready(function() {
            if (!Array.isArray) {
                Array.isArray = function(arg) {
                    return Object.prototype.toString.call(arg) === '[object Array]';
                };
            }

            var fieldNames = {
                email: ['guest_email', 'email'],
                homePhoneNumber: ['phone'],
                mobilePhoneNumber: ['phone_mobile'],
                firstname: ['firstname', 'customer_firstname'],
                lastname: ['lastname', 'customer_lastname'],
                countryCode: ['id_country']
            };

            var fields = {
                    email: [],
                    homePhoneNumber: [],
                    mobilePhoneNumber: [],
                    firstname: [],
                    lastname: [],
                    countryCode: []
            };

            var remainingLRequest = 10;

            function setupTracking () {
                for (var item in fieldNames) {
                    if (fieldNames.hasOwnProperty(item)) {
                        for (var i = 0; i < fieldNames[item].length; i++) {
                            //Get by name
                            var els = document.getElementsByName(fieldNames[item][i]);
                            for (var j = 0; j < els.length; j++) {
                                fields[item].push(els[j]);
                            }

                            //Get by ID
                            var el = document.getElementById(fieldNames[item][i]);
                            if (el &&  el.name !== fieldNames[item][i]){
                                fields[item].push(el);
                            }
                        }
                    }
                }
                if (fields.email.length > 0 && fields.firstname.length > 0) {
                    for (var item in fields) {
                        if (fields.hasOwnProperty(item)) {
                            for (var i = 0; i < fields[item].length; i++) {
                                cgjQuery(fields[item][i]).bind('blur', trackData);
                            }

                        }
                    }
                }
            }

            function collectData () {
                var data = {};
                for (var item in fields) {
                    if (fields.hasOwnProperty(item)) {
                        for (var i = 0; i < fields[item].length; i++) {
                            data[item] =  cgjQuery(fields[item][i]).val();
                            if (data[item] && data[item].trim){
                                data[item].trim();
                            }
                            if (data[item] !== ''){
                                break;
                            }
                        }
                    }
                }
                return data;
            }

            function trackData () {
                var data = collectData();
                if (data.email && remainingLRequest > 0) {
                    cgjQuery.ajax({
                        url: "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['trackingUrl']->value,'javascript','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
",
                        type: "POST",
                        data: data
                    });
                    remainingLRequest =- 1;
                }
            }

            setupTracking();
        });
    });
<?php echo '</script'; ?>
>
<?php }
}
