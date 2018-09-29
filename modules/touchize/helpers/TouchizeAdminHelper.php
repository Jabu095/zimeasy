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
 * Admin helper.
 */

class TouchizeAdminHelper extends TouchizeBaseHelper
{
    /**
     * [assignMenuVars description]
     *
     * @return string
     */
    public function assignMenuVars()
    {
        $key = Configuration::get('TOUCHIZE_LICENSE_KEY');
        //right aligned menus has to be entered in revese order due to css (float: right;)
        $this->context->smarty->assign(array(
            'items' => array(array(
                'text' => '1. '.$this->l('Introduction'),
                'link' => $this->context->link->getAdminLink('AdminGetStarted'),
                'current' => $this->context->controller->controller_name == 'AdminGetStarted' ? true : false,
                'right' => false,
                'license' => false
            ),
            array(
                'text' => '2. '.$this->l('Choose Your Look'),
                'link' => $this->context->link->getAdminLink('AdminWizard'),
                'current' => $this->context->controller->controller_name == 'AdminWizard' ? true : false,
                'right' => false,
                'license' => false
            ),
            array(
                'text' => '3. '.$this->l('Setup Menus'),
                'link' => $this->context->link->getAdminLink('AdminMenuBuilder'),
                'current' => $this->context->controller->controller_name == 'AdminMenuBuilder' ? true : false,
                'right' => false,
                'license' => false
            ),
            array(
                'text' => (!$key) ? '4. '.$this->l('Activate') : '4. '.$this->l('Manage Subscription'),
                'link' => $this->context->link->getAdminLink('AdminLicense'),
                'current' => $this->context->controller->controller_name == 'AdminLicense' ? true : false,
                'right' => false,
                'license' => true
            ),
            array(
                'text' => '7. '.$this->l('Contact Us'),
                'link' => $this->context->link->getAdminLink('AdminContactUs'),
                'current' => $this->context->controller->controller_name == 'AdminContactUs' ? true : false,
                'right' => true,
                'license' => false
            ),
            array(
                'text' => '6. '.$this->l('Advanced Settings'),
                'link' => $this->context->link->getAdminLink('AdminModules').'&configure='.$this->name.'&config_tab=1',
                'current' => ($this->context->controller->controller_name == 'AdminSettings' ||
                    $this->context->controller->controller_name == 'AdminModules') ? true : false,
                'right' => true,
                'license' => false
            ),
            array(
                'text' => '5. '.$this->l('Create Banners'),
                'link' => $this->context->link->getAdminLink('AdminTouchmaps'),
                'current' => $this->context->controller->controller_name == 'AdminTouchmaps' ? true : false,
                'right' => true,
                'license' => false
            ))
        ));
    }

    /**
     * [getTemplate description]
     *
     * @return string
     */
    public function getTemplate($tplName)
    {
        if ($this->getTemplatePath($tplName)) {
            return $this->context->smarty->createTemplate(
                $this->getTemplatePath($tplName),
                $this->context->smarty
            )->fetch();
        }

        return '';
    }

    /**
     * To return the path to the folder with admin templates.
     *
     * @return string
     */
    public function getTemplatePath($tplName)
    {
        return parent::getTemplatePath('views/templates/admin/'.$tplName);
    }
}
