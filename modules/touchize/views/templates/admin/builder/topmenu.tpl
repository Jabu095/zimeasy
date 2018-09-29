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

<div id="wizardWrap">
    <div class="panel">
        <div class="row">
            <div class="col-lg-6">
                <div id="selected-block" class = "navigation-top-container">
                    <h4 style="margin-top:5px;">{l s='Selected categories' mod='touchize'}</h4>
                    <div id="selected-items"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class = "navigation-top-container">
                    <h4 style="margin-top:5px;">{l s='Available categories' mod='touchize'}</h4>
                    <div id="allowed-items"></div>
                </div>
            </div>
        </div>

        <div class="panel-footer">
            <button id="top-menu-save" type="button" class="btn btn-default pull-right">
                <i class="process-icon-save-and-stay"></i>{l s='Save' mod='touchize'}
            </button>
        </div>
    </div>
</div>


<script type="text/javascript">
    {literal}
        $(document).ready(function() {
            $.fn.topMenuBuilder.init({/literal}{$js_config|escape:'quotes':'UTF-8'}{literal});
        });
    {/literal}
</script>