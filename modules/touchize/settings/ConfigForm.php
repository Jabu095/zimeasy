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

class ConfigForm extends TouchizeBaseHelper
{
    public function generateHtml()
    {
        $defaultLang = (int)Configuration::get('PS_LANG_DEFAULT');

        $fieldsForm = array();

        # Init Fields form array
        $adminHelper = new TouchizeAdminHelper();
        $adminHelper->assignMenuVars();

        $fieldsForm[0]['form'] = array(
            'legend' => array(
                'title' => $this->l('Touchize Commerce Advanced Settings').
                    $adminHelper->getTemplate('partials/menu.tpl'),
                'icon' => 'icon-cogs'
            ),
            'input'  => array(
                array(
                    'type' => 'text',
                    'label' => $this->l('Homepage Products'),
                    'name' => 'TOUCHIZE_START_CATEGORY_ID',
                    'size' => 100,
                    'hint' => $this->l('Select which categories you want to display products from on your homepage. Enter either a single category id or a comma separated list of category ids'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('CDN path'),
                    'name' => 'TOUCHIZE_CDN_PATH',
                    'size' => 100,
                    'required' => true,
                    'hint' => $this->l('Path to CDN for Touchize Commerce client, leave as is unless you know what you are doing.'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('CDN code'),
                    'name' => 'TOUCHIZE_CDN_CODE',
                    'size' => 100,
                    'required' => true,
                    'hint' => $this->l('Code for CDN for Touchize Commerce client, leave as is unless you know what you are doing.'),
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('Head HTML'),
                    'name' => 'TOUCHIZE_HEAD_HTML',
                    'hint' => $this->l('HTML to be placed in the HEAD element of the page.'),
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('Body HTML'),
                    'name' => 'TOUCHIZE_BODY_HTML',
                    'hint' => $this->l('HTML to be placed in the BODY element of the page.'),
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('SEO ´sameAs´'),
                    'name' => 'TOUCHIZE_SEO_SAME_AS',
                    'hint' => $this->l('Input for SEO ´sameAS´ field, enter as commaseparated URLs'),
                ),
                /*
                Commented out since in first version slider will not be used
                array(
                    'type' => 'text',
                    'label' => $this->l('TouchMap slider interval (millis)'),
                    'name' => 'TOUCHIZE_TOUCHMAP_SLIDER_INTERVAL',
                    'size' => 100,
                    'required' => true,
                ),
                */
                /*
                array(
                    'type' => 'checkbox',
                    'name' => 'TOUCHIZE_DEBUG',
                    'values' => array(
                        'query' => array(
                            array(
                                'id' => 'on',
                                'name' => $this->l('Debug client'),
                                'val' => '1',
                            ),
                        ),
                        'id' => 'id',
                        'name' => 'name',
                    ),
                ),
                */
                array(
                    'type' => 'checkbox',
                    'name' => 'TOUCHIZE_GENERATE_STARTUP_MODULES',
                    'values' => array(
                        'query' => array(
                            array(
                                'id' => 'on',
                                'name' => $this->l('Optimize'),
                                'val' => '1',
                            ),
                        ),
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'label' => $this->l('Optimize web requests'),
                    'hint' => $this->l('Bundles ajax requests together when possible. Minimizes number of total requests.')
                ),
            ),
            'submit' => array(
                'title' => $this->l('Save'),
                'class' => 'btn btn-default pull-right',
            ),
        );

        $helper = new HelperForm();

        # Module, token and currentIndex
        $helper->module = $this;
        $helper->name_controller = $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex
            .'&configure='.$this->name;

        # Language
        $helper->default_form_language = $defaultLang;
        $helper->allow_employee_form_lang = $defaultLang;

        # Title and toolbar
        $helper->title = $this->displayName;
        # false -> remove toolbar
        $helper->show_toolbar = true;
        # yes - > Toolbar is always visible on the top of the screen.
        $helper->toolbar_scroll = true;
        $helper->submit_action = 'submit'.$this->name;
        $helper->toolbar_btn = array(
            'save' => array(
                'desc' => $this->l('Save'),
                'href' => AdminController::$currentIndex
                    .'&configure='.$this->name.'&save'.$this->name
                    .'&token='.Tools::getAdminTokenLite('AdminModules'),
            ),
            'back' => array(
                'href' => AdminController::$currentIndex
                    .'&token='.Tools::getAdminTokenLite('AdminModules'),
                'desc' => $this->l('Back to list'),
            ),
        );

        # Load current value
        $helper
            ->fields_value[
        'TOUCHIZE_GENERATE_STARTUP_MODULES_on'
        ] = (int)Configuration::get(
            'TOUCHIZE_GENERATE_STARTUP_MODULES'
        );
        $helper
            ->fields_value[
        'TOUCHIZE_START_CATEGORY_ID'
        ] = Configuration::get(
            'TOUCHIZE_START_CATEGORY_ID'
        );
        $helper
            ->fields_value[
        'TOUCHIZE_CDN_PATH'
        ] = Configuration::get(
            'TOUCHIZE_CDN_PATH'
        );
        $helper->fields_value[
        'TOUCHIZE_CDN_CODE'
        ] = Configuration::get(
            'TOUCHIZE_CDN_CODE'
        );
        $headHtml = Configuration::get(
            'TOUCHIZE_HEAD_HTML'
        );
        if (Validate::isString($headHtml)) {
            $headHtml = html_entity_decode($headHtml);
        }
        $helper
            ->fields_value[
        'TOUCHIZE_HEAD_HTML'
        ] = $headHtml;

        $bodyHtml = Configuration::get(
            'TOUCHIZE_BODY_HTML'
        );
        if (Validate::isString($bodyHtml)) {
            $bodyHtml = html_entity_decode($bodyHtml);
        }
        $helper
            ->fields_value[
        'TOUCHIZE_BODY_HTML'
        ] = $bodyHtml;
        $helper
            ->fields_value[
        'TOUCHIZE_SEO_SAME_AS'
        ] = Configuration::get(
            'TOUCHIZE_SEO_SAME_AS'
        );
        $helper
            ->fields_value[
        'TOUCHIZE_TOUCHMAP_SLIDER_INTERVAL'
        ] = (int)Configuration::get(
            'TOUCHIZE_TOUCHMAP_SLIDER_INTERVAL'
        );
        $helper
            ->fields_value[
        'TOUCHIZE_DEBUG_on'
        ] = (int)Configuration::get(
            'TOUCHIZE_DEBUG'
        );

        return $helper->generateForm($fieldsForm);
    }
}
