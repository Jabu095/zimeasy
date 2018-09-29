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

class AdminLicenseController extends BaseTouchizeController
{
    const INFO_TEMPLATE = 'info/license.tpl';

    /**
     * ~ constructor.
     */
    public function __construct()
    {
        $this->bootstrap = true;
        parent::__construct();
        $this->context->smarty->assign(array(
            'iso_code' => $this->context->language->iso_code
        ));
        $helper = new TouchizeAdminHelper();
        $this->licenseHelper = new TouchizeLicenseHelper();
        $helper->assignMenuVars();
        $this->fields_options = array(
            'enable' => array(
                'title' => $this->l('2. Enable Touchize Commerce'),
                'icon' => 'icon-power-off',
                'fields' => array(
                    'TOUCHIZE_ENABLED' => array(
                        'hint' => $this->l('Choose which devices Touchize Commerce should be enabled on.'),
                        'title' => $this->l('Choose devices to display Touchize Commerce'),
                        'validation' => 'isGenericName',
                        'type' => 'radio',
                        'choices' => array(
                            3 => $this->l('I`d like to enable it on both smartphones and tablets.'),
                            2 => $this->l('I`d like to enable it only on tablets.'),
                            1 => $this->l('I`d like to enable it only on smartphones.'),
                            0 => $this->l('I`d like to disable it.'),
                        ),
                    )
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                    'name' => 'SubmitEnabling'
                )
            ),
            'account' => array(
                'title' => $this->l('3. Touchize Commerce Account'),
                'info' => '',
                'icon' => 'icon-user',
            ),
            'key' => array(
                'title' => $this->l('4. Enter the license key (code)'),
                'info' => '',
                'icon' => 'icon-key',
                'fields' => array(
                    'TOUCHIZE_LICENSE_KEY' => array(
                        'hint' => $this->l('Enter the Touchize license key you received in your email'),
                        'title' => $this->l('Touchize license key'),
                        'desc' => $this->l('Enter the Touchize license key you received in your email'),
                        'validation' => 'isGenericName',
                        'type' => 'text',
                    )
                ),
                'submit' => array(
                    'title' => $this->l('Verify'),
                    'name' => 'ValidateKey'
                )
            ),
        );
        if (Tools::getValue('is_ajax') == "true") {
            if (Tools::getValue('id') == 'start-trial') {
                if ($this->validateTrial()) {
                    Configuration::updateValue(
                        'TOUCHIZE_TRIAL_HAS_BEEN_ACTIVATED',
                        '1'
                    );
                    Configuration::updateValue(
                        'TOUCHIZE_TRIAL_ACTIVE',
                        '1'
                    );
                    //Using unix timestamp
                    Configuration::updateValue(
                        'TOUCHIZE_WHEN_TRIAL_WAS_ACTIVATED',
                        time()
                    );
                }
            }
        }
        $this->setAccountButton();
    }


    private function setAccountButton()
    {
        $response = '';
        $response .= '<div class="row"><div class="col-md-1"></div><div class="col-md-5">';
        $response .= $this->l('After you sign up you will receive a license key (code) in your mail.');
        $response .= '</div><div class="col-md-5"></div><div class="col-md-1"></div></div><br>';
        $response .= '<div class="row"><div class="col-md-1"></div>';
        $response .= '<div class="col-md-5">';
        $response .= '<a class="btn btn-primary btn-lg btn-block" target="_blank" ';
        $response .= 'href="https://subscription.touchize.com/prestashop?lang='.$this->context->language->iso_code.'">';
        $response .= $this->l('Sign up');
        $response .= '</a>';
        $response .= '</div>';
        $response .= '<div class="col-md-5">';
        $response .= '<a class="btn btn-primary btn-lg btn-block" target="_blank" ';
        $response .= 'href="https://account.touchize.com?lang='.$this->context->language->iso_code.'">';
        $response .= $this->l('My Touchize Commerce account').'</a></div><div class="col-md-1">';
        $response .= '</div></div>';

        $this->fields_options['account']['info'] .= $response;
    }

    /**
     * @return bool|ObjectModel
     */
    public function postProcess()
    {
        if (Tools::isSubmit('ValidateKey')) {
            $key = Tools::getValue('TOUCHIZE_LICENSE_KEY');
            Configuration::updateValue(
                'TOUCHIZE_LICENSE_KEY',
                $key
            );

            if (Validate::isString($key) && !empty($key)) {
                $serverResponse = $this->licenseHelper->getKeyFromServer(trim($key));
                if (!$serverResponse['success']) {
                    $this->errors = array_merge($this->errors, $serverResponse['errors']);
                }
            } else {
                Configuration::updateValue(
                    'TOUCHIZE_LICENSE_KEY_VALIDATED',
                    ''
                );
            }
            $ok = $this->validateKey();
        }
        if (Tools::isSubmit('SubmitEnabling')) {
            $option = (int)Tools::getValue('TOUCHIZE_ENABLED');
            $silent = false;
        } else {
            $option = Configuration::get('TOUCHIZE_ENABLED');
            $silent = true;
        }

        $ok = $this->validateKey($silent);
        if ($option == 0) { //Disabling always allowed
            $ok = true;
        }
        if (Configuration::get('TOUCHIZE_TRIAL_ACTIVE') == '1') {
            $ok = true;
        }
        if (Tools::getIsset('TOUCHIZE_ENABLED')) {
            $_POST['TOUCHIZE_ENABLED'] =  $ok ? $option : 0;
        }
        Configuration::updateValue(
            'TOUCHIZE_ENABLED',
            $ok ? $option : 0
        );
        return parent::postProcess();
    }

    /**
     * Validates the license from database
     */
    private function validateKey($silent = false)
    {
        $result = $this->licenseHelper->validateLicense($silent);

        if (isset($result['info_description'])) {
            $this->fields_options['info']['description'] = $result['info_description'];
        }
        if (isset($result['key_description'])) {
            $this->fields_options['key']['description'] = $result['key_description'];
        }
        if (isset($result['enable_description'])) {
            $this->fields_options['enable']['description'] = $result['enable_description'];
        }
        if (isset($result['confirmation'])) {
            $this->confirmations[] = $result['confirmation'];
        }
        if (isset($result['errors'])) {
            $this->errors[] = $result['errors'];
        }
        return $result['ok'];
    }
    
    /**
    * Validates if trial has already been activated
    */
    private function validateTrial()
    {
        //if trial previously has been activated return false else true
        if (Configuration::get('TOUCHIZE_TRIAL_HAS_BEEN_ACTIVATED', '')) {
            return false;
        }
        return true;
    }
}
