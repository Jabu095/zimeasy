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
 * License controller.
 */

class AdminGetStartedController extends BaseTouchizeController
{
    const INFO_TEMPLATE = 'info/get-started.tpl';

    /**
     * AdminGetStartedController constructor.
     */
    public function __construct()
    {
        $this->bootstrap = true;
        parent::__construct();
    }
    
    /**
     * AdminController::setMedia() override
     *
     * @see AdminController::setMedia()
     */
    public function setMedia($isNewTheme = false)
    {
        parent::setMedia();
        $this->context->controller->addCSS(
            array(
                _MODULE_DIR_.'touchize/views/css/embedbootstrap.css',
                _MODULE_DIR_.'touchize/views/css/octicons.min.css',
                _MODULE_DIR_.'touchize/views/css/cpicker.min.css',
                _MODULE_DIR_.'touchize/views/css/wizard.css'
            )
        );
        $this->context->controller->addJS(
            array(
                _MODULE_DIR_.'touchize/views/js/botab.js',
                _MODULE_DIR_.'touchize/views/js/qrcode.js'
            )
        );
    }
}
