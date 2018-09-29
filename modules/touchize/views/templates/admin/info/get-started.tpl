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
var botabPath = "{$link->getPageLink('index')|escape:'htmlall':'UTF-8'}?botab=1";
var QRPath = "{$link->getPageLink('index')|escape:'htmlall':'UTF-8'}?preview=qrp1";
var previewDisplayPath = "{$link->getPageLink('index')|escape:'htmlall':'UTF-8'}?touchize=yes";
var demoPath = "https://prestashop.touchize.com/en/?preview=demo1";
var demoQRPath = "https://prestashop.touchize.com/en/?preview=qrd1";
var demoDisplayPath = "prestashop.touchize.com";
</script>
<div class="panel">
    <div class="tmp-img"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5" style="text-align:justify;">
                {l s='Thank you very much for downloading Touchize Commerce, a simpler faster and more enjoyable mobile shopping experience!' mod='touchize'}
                </br>
                </br>
                {l s='Touchize Commerce can help you:' mod='touchize'}
                <ul>
                    <li>{l s='Increase your conversion rates' mod='touchize'}</li>
                    <li>{l s='Get more products in the shopping cart' mod='touchize'}</li>
                    <li>{l s='Improve customer loyalty' mod='touchize'}</li>
                </ul>
                {l s='Simply follow these 3 steps to get started with Touchize Commerce    and get an instant view of your Touchified shop. And if you like it, please don’t hesistate to sign up for your 30 day free trial.' mod='touchize'}
                <br>
                <br>
                <ul>
                    <li>{l s='Choose your template' mod='touchize'}</li>
                    <li>{l s='Choose your banners' mod='touchize'}</li>
                    <li>{l s='Setup your link menu' mod='touchize'}</li>
                </ul>
                <strong>{l s='Important note' mod='touchize'}</strong><br>
                {l s='Touchize Commerce is for mobiles, tablets and other types of touchscreen devices, and does not in any way affect your desktop users shopping experience.' mod='touchize'}
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
                
                
                <br>
                <!-- Preview button -->
                <div class="row">
                    <div class="col-xs-12">
                        <center>
                            <!-- Button trigger modal -->
                            <button 
                                class="btn btn-primary"
                                data-toggle="modal"
                                data-target="#demoModal"
                                type="button"
                            >
                                {l s='Demo' mod='touchize'}
                            </button>
                        </center>
                    </div>
                </div>
                <!-- Modal -->
                <div
                    class="modal fade"
                    id="demoModal"
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
                                <h4 class="modal-title" id="myModalLabel">{l s='Demo' mod='touchize'}</h4>
                            </div>
                            <div class="row" style="
                                padding-left: 20px;
                                display:  flex;
                                justify-content: space-evenly;
                            ">
                                <div class="col">
                                    <h2 style="padding-left: 49px; padding-top: 250px;">{l s='Try it on your mobile' mod='touchize'}</h2>
                                    <div id="demo-qrcode" style="padding-top: 20px; padding-left: 43px;">
                                    
                                    </div><br>
                                    <h3 style="padding-left: 77px; padding-top: 36px; border-bottom: none;">prestashop.touchize.com</h3>
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
                        var qrcode = new QRCode(document.getElementById("demo-qrcode"), {
                           text: demoQRPath,
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
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/cnI0kgjyH2Q" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div>
         </div>
     </div>
</div>