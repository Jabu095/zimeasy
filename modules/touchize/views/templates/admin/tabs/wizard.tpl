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

<div class="loader" id="loadScreen">
  <div class="box-l loading-l"></div>
</div>
<script type="text/javascript">
var botabPath = "{$link->getPageLink('index')|escape:'htmlall':'UTF-8'}?botab=2";
var previewPath = "{$link->getPageLink('index')|escape:'htmlall':'UTF-8'}?preview=1";
</script>
<!-- Wizard wrapper -->
<div id="wizardWrap">

    <!-- Template panel -->
  <div class="panel">
    <div class="panel-heading">
      <i class="icon-th-large"></i>
      {l s='Choose theme' mod='touchize'}
    </div>
    <div class="form-wrapper">
      <div class="row">
        <!-- Set thumbnail for each template from the list -->
        {foreach from=$templates key=key item=element}
          <div class="col-xs-4">
            <div class="thumbnail">
              <img
                class="pointed"
                data-template="{$element['value']|escape:'htmlall':'UTF-8'}"
                src="{$element['src']|escape:'htmlall':'UTF-8'}"
              >
              <div class="caption">
                <center>
                  <input
                    name="template"
                    type="radio"
                    value="{$element['value']|escape:'htmlall':'UTF-8'}"
                    {$element['checked']|escape:'htmlall':'UTF-8'}
                  >
                </center>
              </div>
            </div>
          </div>
        {/foreach}
      </div>
    </div>
    {*<div class="panel-footer">
      <button id="template-save" type="button" class="btn btn-default pull-right">
        <i class="process-icon-save-and-stay"></i>{l s='Save' mod='touchize'}
      </button>
    </div>*}
  </div>

  <!-- Logo widget -->
  <div class="panel">
    <div class="panel-heading">
      <i class="icon-picture"></i>
      {l s='LOGO' mod='touchize'}
    </div>
    <div class="form-wrapper">
    <!-- logo sync alert -->
    <div class="row">
      <div class="alert alert-warning" role="alert" style="{$logoAlertStyle|escape:'htmlall':'UTF-8'}">
        {l s='The web-site logo was changed. If you want to apply changes, please push the button.' mod='touchize'}
        <button id="logoSync" class="btn btn-warning">{l s='Apply changes.' mod='touchize'}</button>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-3"></div>
      <div class="col-xs-6">
        <center>
          <img class="pointed logo-img" id="preview-img-logo" src="{$logo|escape:'htmlall':'UTF-8'}">
        </center>
      </div>
      <div class="col-xs-3"></div>
    </div>
    <div class="row">
      <div class="col-xs-3"></div>
      <div class="col-lg-6 col-sm-6 col-xs-12">
        <h4>{l s='Upload company logo:' mod='touchize'}</h4>
        <div class="input-group">
          <label class="input-group-btn">
            <span class="btn btn-primary">
              <i class="icon-search"></i> {l s='Browse' mod='touchize'}
              <input class="hidden" id="logo-file-input" type="file" multiple>
            </span>
            <button class="btn btn-primary" id="save-logo" style="{$removeBtnStyle|escape:'htmlall':'UTF-8'}">
              <i class="icon-save"></i> {l s='Save logo' mod='touchize'}
            </button>
            <button class="btn btn-primary" id="remove-logo" style="{$removeBtnStyle|escape:'htmlall':'UTF-8'}">
              <i class="icon-remove"></i> {l s='Remove logo' mod='touchize'}
            </button>
          </label>
          <input class="form-control" id="logo-name-input" type="text" readonly>
        </div>
        <span class="help-block">
          {l s='Will appear on main page. Recommended height: 52px. Maximum height on default theme: 65px.' mod='touchize'}
        </span>
      </div>
      <div class="col-xs-3"></div>
      <div class="clearfix"></div>
    </div>
    </div>
  </div>

  

  <!-- Styling -->
  <div class="panel">
    <div class="panel-heading">
      <i class="icon-cogs"></i>
      {l s='Styling' mod='touchize'}
    </div>
    <div class="form-wrapper" id="styling-wrapper">
      <!-- If styling variables were setted -->
      {if !empty($stylingVariables)}
        <!-- Set info block for each styling variable from the list -->
        {foreach from=$stylingVariables key=myId item=i}
          {if $i['is_color'] eq 1}
          <div class="row" style="margin-bottom: 10px;">
            <div class="col-xs-12">
              <div class="col-xs-6 text-right">
                <label class="control-label" for="{$i['id_variable']|escape:'htmlall':'UTF-8'}">
                  <span
                    class="label-tooltip"
                    data-toggle="tooltip"
                    data-original-title="{$i['description']|escape:'htmlall':'UTF-8'}"
                    title=""
                  >
                  {$i['name']|escape:'htmlall':'UTF-8'} : 
                  </span>
                </label>
              </div>
              <div class="col-xs-6">
                <div class="row">
                  <div class="col-xs-4">
                    <input
                      class="form-control"
                      id="picker_{$i['id_variable']|escape:'htmlall':'UTF-8'}"
                      data-picker="true"
                      data-is-color="{if $i['is_color'] eq 1}true{else}false{/if}"
                      type="text"
                      value="{$i['value']|escape:'htmlall':'UTF-8'}"
                    >
                  </div>
                  <!-- Check if variable belong to the colored ones -->
                  {if $i['is_color'] eq 1}
                    <div class="col-xs-2" style="height: 31px;">
                      <div 
                        class="color-preview"
                        id="picker_preview_{$i['id_variable']|escape:'htmlall':'UTF-8'}"
                        style="background-color: {$i['value']|escape:'htmlall':'UTF-8'};"
                      ></div>
                    </div>
                  {/if}
                </div>
              </div>
            </div>
          </div>
          {/if}
        {/foreach}
        {else}
        <!-- Alert-info -->
        <div class="alert alert-info" role="alert">
          {l s='There are no styling variables.' mod='touchize'}
        </div>
      {/if}
    </div>
    <div class="panel-footer">
      <button id="styling-reset" type="button" class="btn btn-default pull-right">
        <i class="process-icon-reset"></i>{l s='Restore defaults' mod='touchize'}
      </button>
      <button id="styling-save" type="button" class="btn btn-default pull-right">
        <i class="process-icon-save-and-stay"></i>{l s='Save' mod='touchize'}
      </button>
    </div>
  </div>

  <!-- Preview button -->
  <div class="row">
    <div class="col-xs-12">
      <center>
        <!-- Button trigger modal -->
        <button 
          class="btn btn-primary"
          data-toggle="modal"
          data-target="#previewChangesModal"
          type="button"
        >
          {l s='Preview' mod='touchize'}
        </button>
        <button class="btn btn-primary" id="apply" type="button">{l s='Apply Changes' mod='touchize'}</button>
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
        <div class="modal-body">
          <div class="phone-template"></div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" data-dismiss="modal" type="button">{l s='Close' mod='touchize'}</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Changes Modal -->
  <div
    class="modal fade"
    id="previewChangesModal"
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
          <h4 class="modal-title" id="myModalLabel">{l s='Preview changes' mod='touchize'}</h4>
        </div>
        <div class="modal-body">
          <div class="phone-template"></div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" data-dismiss="modal" type="button">{l s='Close' mod='touchize'}</button>
        </div>
      </div>
    </div>
  </div>
</div>