/**
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
 */

(function ( $ ) {
    $.fn.topMenuBuilder = {
        init:function(options){
            mbthis = this;
            var settings = $.extend({
                saveButton:'#top-menu-save',
                allowed_items:[],
                selected_items:[],
                allowedContainer:'#allowed-items',
                selectedContainer:'#selected-items',
                selectedBlock:'#selected-block',
                url:'#'
            }, options );
            mbthis.config = settings;
            mbthis.allowedTree = $(mbthis.config.allowedContainer);
            mbthis.selectedTree = $(mbthis.config.selectedContainer);
            mbthis.selectedBlock = $(mbthis.config.selectedBlock);
            mbthis.initAllowedTree();
            mbthis.initSelectedTree();
            mbthis.initSaveItems();
            return this;
        },
        initAllowedTree: function() {
            mbthis.allowedTree.tree({
                data: mbthis.config.allowed_items,
                dragAndDrop: true,
                autoOpen: true,
                onDragStop: mbthis.addProcess,
                onCanMoveTo: function(moved_node, target_node, position) {
                    return false;
                }
            });
        },
        initSelectedTree: function() {
            mbthis.selectedTree.tree({
                data: mbthis.config.selected_items,
                dragAndDrop: true,
                onDragStop: mbthis.removeProcess
            });
        },
        addProcess: function(node, event) {
            if(mbthis.elementInSelectedBlock(event)) {
                mbthis.selectedTree.tree('appendNode',node);
            }
        },
        removeProcess: function(node,event) {
            if(!mbthis.elementInSelectedBlock(event)) {
                mbthis.selectedTree.tree('removeNode', node);
            }
        },
        elementInSelectedBlock: function(event) {
            var ofset = mbthis.selectedBlock.offset(),
            selectedWidth = mbthis.selectedBlock.width(),
            selectedHeight = mbthis.selectedBlock.height(),
            topPos = ofset.top,
            leftPos = ofset.left,
            pageX = event.pageX,
            pageY = event.pageY;
            return ((leftPos < pageX && pageX < leftPos+selectedWidth)
                && (topPos < pageY && pageY < topPos + selectedHeight));
        },
        initSaveItems: function() {
            $(mbthis.config.saveButton).click(function(){
                var data = {
                    ajax:true,
                    menu_items: mbthis.collectData(),
                    action: 'saveTopMenu',
                };
                mbthis.sendRequest(mbthis.config.url, data);
            });
        },
        sendRequest: function (url, data) {
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: data,
            }).done(function (data) {
                if (!data.error) {
                    showSuccessMessage(data.message);
                } else {
                    showErrorMessage(data.message);
                }

            });
        },
        collectData: function () {
            var menuItems = mbthis.selectedTree.tree('toJson')
            return menuItems;
        }
    };
}( jQuery ));
