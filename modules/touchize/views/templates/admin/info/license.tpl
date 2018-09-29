{*
 * 2018 Touchize Sweden AB.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to prestashop@touchize.com so we can send you a copy immediately.
 *
 *  @author    Touchize Sweden AB <prestashop@touchize.com>
 *  @copyright 2018 Touchize Sweden AB
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of Touchize Sweden AB
 *}
<script type="text/javascript">
var ajaxurl = "{$link->getAdminLink('AdminLicense')|escape:'htmlall':'UTF-8'}";
</script>
<div class="panel">
    <div class="panel-heading">
        <i class="icon-info"></i>
        {l s='1. Touchize Commerce Licensing' mod='touchize'}
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-5" style="text-align:justify;">
                <div>{l s='-Start 30 days free trial' mod='touchize'}</div>
                <div>{l s='-Trial will end after 30 days and automatically disable Touchize Commerce' mod='touchize'}</div>
                <div>{l s='-To continue service - sign-up for a license' mod='touchize'}</div>
            </div>
            <div class="col-md-5">
                {if (Configuration::get('TOUCHIZE_TRIAL_ACTIVE'))}
                    <button id="start-trial" class="btn btn-primary btn-lg btn-block" style="width: 100%; background-color:#999">
                        {l s='Trial ends in ' mod='touchize'}
                        {round(((Configuration::get('TOUCHIZE_WHEN_TRIAL_WAS_ACTIVATED')+(2592000)-time())/86400), 0)|escape:'htmlall':'UTF-8'}
                        {l s='days' mod='touchize'}
                    </button>
                {else}
                    {if (Configuration::get('TOUCHIZE_TRIAL_HAS_BEEN_ACTIVATED'))}
                        <button id="start-trial" class="btn btn-primary btn-lg btn-block" style="width: 100%; background-color:#999">
                            {l s='Trial has been used' mod='touchize'}
                        </button>
                    {else}
                        <button id="start-trial" class="btn btn-primary btn-lg btn-block" style="width: 100%;">
                            {l s='Start 30 days free trial' mod='touchize'}
                        </button>
                    {/if}
                {/if}
                <script>
                    document.getElementById("start-trial").addEventListener('click', function(){
                        var data = {
                            is_ajax: true,
                            id: "start-trial"
                        };
                        $.ajax({
                            url: ajaxurl,
                            data: data,
                            type: "POST",
                            dataType: 'json',
                            beforeSend: function () {
                            },
                            error: function(xhr, status, error) {
                            },
                            success: function (data) {
                            },
                            complete: function () {
                                location.reload();
                            }
                        });
                    });
                </script>
            </div>
            <div class="col-md-1">
            </div>
        </div>
    </div>
</div>