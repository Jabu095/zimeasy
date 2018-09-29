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
var botabPath = "{$link->getPageLink('index')|escape:'htmlall':'UTF-8'}?botab=3";
var QRPath = "{$link->getPageLink('index')|escape:'htmlall':'UTF-8'}?preview=qrp3";
var previewDisplayPath = "{$link->getPageLink('index')|escape:'htmlall':'UTF-8'}?touchize=yes";
</script>
<div class="panel">
    <div class="panel-heading">
        <i class="icon-info"></i>
        {l s='Info' mod='touchize'}
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5" style="text-align:justify;">
                {l s='Touchize Commerce handles menus in a different way to fit mobile devices better.' mod='touchize'}<br><br>
                <strong>{l s='Link Menu' mod='touchize'}</strong><br>
                {l s='The Link menu – content not directly involved in the customers shopping process, such as contact us, language switching etc.' mod='touchize'}<br>
                {l s='The link menu (☰) is the menu shown to the top right, also known as “Hamburgermenu”.' mod='touchize'}<br><br>
                {l s='You can add a new item to the Link menu by pressing the “Add new” button top right.' mod='touchize'}<br>
                {l s='After you have added a link menu item, you can change the order by dragging them up and down (click and drag on the + sign).' mod='touchize'}
                <br><br><strong>
                    {l s='Testview' mod='touchize'}
                </strong><br>
                {l s='While you are configuring you can see how your shop will look in your mobile device to get a testview of how your Touchified shop will look and feel.' mod='touchize'}
                <br><br>
                {l s='To do this visit' mod='touchize'}<br>
                <strong>{$link->getPageLink('index')|escape:'htmlall':'UTF-8'}?touchize=yes</strong>
                &nbsp;&nbsp;&nbsp;(?touchize=no) {l s='to disable' mod='touchize'}<br>
                {l s=' in your mobile/tablet or press the Preview button at the bottom.' mod='touchize'}
                <br><br><br>
                <!-- Preview button -->
                <div class="row">
                    <div class="col-xs-12">
                        <center>
                            <!-- Button trigger modal -->
                            <button 
                                class="btn btn-primary"
                                data-toggle="modal"
                                data-target="#previewModal"
                                type="button"
                            >
                                {l s='Preview' mod='touchize'}
                            </button>
                        </center>
                    </div>
                </div>
                <!-- Modal -->
                <div
                    class="modal fade"
                    id="previewModal"
                    role="dialog"
                    aria-labelledby="myModalLabel"
                    tabindex="-1"
                >
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal" type="button" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">{l s='Preview' mod='touchize'}</h4>
                            </div>
                            <div class="row" style="
                                padding-left: 20px;
                                display:  flex;
                                justify-content: space-evenly;
                            ">
                                <div class="col" style="width: 100%; text-align: center;">
                                    <h2 style="padding-top: 250px;">{l s='Try it on your mobile' mod='touchize'}</h2>
                                    <div id="preview-qrcode" style="padding-top: 20px;">
                                    
                                    </div><br>
                                    <h3 style="text-transform: lowercase; font-size: 1.4em; padding-top: 36px; border-bottom: none;">{$link->getPageLink('index')|escape:'htmlall':'UTF-8'}?touchize=yes</h3>
                                </div>
                                <div class="col">
                                    <div class="modal-body">
                                        <div class="phone-template"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-default" data-dismiss="modal" id="preview-close-btn" type="button">{l s='Close' mod='touchize'}</button>
                            </div>
                        </div>
                    </div>
                    <script>
                        var qrcode = new QRCode(document.getElementById("preview-qrcode"), {
                           text: QRPath,
                           width: 200,
                           height: 200,
                           colorDark : "#000000",
                           colorLight : "#ffffff",
                           correctLevel : QRCode.CorrectLevel.H
                       });
                    </script>
                </div>
                <br><br><br>
            </div>
            <div class="col-md-1">
            </div>
            <div class="col-md-6">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/A0k1MXO5V28?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <br><br>
        <img src="/modules/touchize/views/img/menu-3.png" alt="Top menu" style="width: 350px;">
    </div>
</div>