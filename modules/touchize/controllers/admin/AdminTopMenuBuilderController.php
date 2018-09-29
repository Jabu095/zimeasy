<?php
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

/**
* Menu builder controller.
*/

class AdminTopMenuBuilderController extends BaseTouchizeController
{
    const INFO_TEMPLATE = 'info/top-menu.tpl';

    /**
     * @var TouchizeTopMenuHelper
     */
    protected $helperMenu;

    /**
     * [__construct description]
     */
    public function __construct()
    {
        $this->bootstrap = true;
        $this->helperMenu = new TouchizeTopMenuHelper();
        parent::__construct();
    }

    /**
     *
     */
    public function ajaxProcessSaveTopMenu()
    {
        $menu_items = Tools::getValue('menu_items', array());
        $error = true;
        $message = $this->l('Something went wrong.');

        if ($menu_items) {
            $result = $this->helperMenu->saveItems($menu_items);
            if ($result) {
                $error = false;
                $message = $this->l('Top Menu was successfully saved.');
            }
        }

        $this->ajaxDie(Tools::jsonEncode(array(
            'error' => $error,
            'message' => $message,
        )));
    }
}
