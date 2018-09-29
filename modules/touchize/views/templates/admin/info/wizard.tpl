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

<div class="panel">
    <div class="panel-heading">
        <i class="icon-info"></i>
        {l s='Info' mod='touchize'}
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5" style="text-align:justify;">
                {l s='To quickly get started with Touchize Commerce just:' mod='touchize'}
                <ul>
                    <li>{l s='Upload your company logo' mod='touchize'}</li>
                    <li>{l s='Choose from the ready to use themes' mod='touchize'}</li>
                    <li>{l s='Pick your colors' mod='touchize'}</li>
                </ul>
                <br><strong>
                    {l s='Testview' mod='touchize'}
                </strong><br>
                {l s='While you are configuring you can see how your shop will look in your mobile device to get a testview of how your Touchified shop will look and feel.' mod='touchize'}
                <br><br>
                {l s='To do this visit' mod='touchize'}<br>
                <strong>{$link->getPageLink('index')|escape:'htmlall':'UTF-8'}?touchize=yes</strong>
                &nbsp;&nbsp;&nbsp;(?touchize=no) {l s='to disable' mod='touchize'}<br>
                {l s=' in your mobile/tablet or press the Preview button at the bottom.' mod='touchize'}
                <br><br><br><br>
            </div>
            <div class="col-md-1">
            </div>
            <div class="col-md-6">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/XENdhvUk_VM?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>