<?php
/**

* NOTICE OF LICENSE

*

* This file is licenced under the Software License Agreement.

* With the purchase or the installation of the software in your application

* you accept the licence agreement.

*

* You must not modify, adapt or create derivative works of this source code

*

*  @author    Carlos García Vega

*  @copyright 2010-2018 CleverPPC

*  @license   LICENSE.txt

*/

if (!defined('_PS_VERSION_')) {
    exit;
}

class Cleverppc extends Module
{

    const CLEVERPPC_BASE_URL = 'https://prestashop.cleverecommerce.com/api/prestashop/';

    public function __construct()
    {
        $this->name = 'cleverppc';
        $this->tab = 'advertising_marketing';
        $this->version = '1.1.2';
        $this->author = 'Clever Ecommerce';
        $this->ps_version_compliancy = array('min'=> '1.5.3.0', 'max' => _PS_VERSION_);

        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = 'Clever Google Adwords';
        $this->confirmUninstall = $this->l('Are you sure you want to uninstall? 
            You will lose all your Clever Google Adwords campaigns.');
        $this->description = 'Get your ad on Google with a Premium Google Partner.
        With just 5 simple steps your campaigns will be on the Adwords search network, 
        thanks to the technology of Clever. No work from your side. We will upload all campaigns for you.';
        $this->module_key = '4cef3cb22b145038002cd58d5e709840';
    }

    public function install()
    {
        if (!parent::install() ||
            !Configuration::updateValue('PS_WEBSERVICE', true) || !$this->genAccessToken(64) ||
            !$this->generateHmac() || !$this->createWebserviceKey() || !$this-> sendInstallRequest()) {
            return false;
        }
        return true;
    }

    public function uninstall()
    {
        $obj = new WebserviceKey(Configuration::get('CLEVERPPC_WEBSERVICE_ACCOUNT_ID'));
        if (!parent::uninstall() ||
            !$this->cancelSubscription() || !Configuration::deleteByName('CLEVERPPC_SHOP_REFERENCE') ||
            !Configuration::deleteByName('CLEVERPPC_WEBSERVICE_ACCOUNT_ID') ||
            !Configuration::deleteByName('CLEVERPPC_SHOP_REFERENCE') ||
            !Configuration::deleteByName('CLEVERPPC_HMAC') || !$obj->delete()) {
            return false;
        }
        return true;
    }

    private function cancelSubscription()
    {
// Create the access token that will be used to validate the subscription cancellation
// Set the request params
        $data = $this->getInformation();
// Init and configure curl
        try {
// Getting auth header
            $auth =  $this->getAuthenticationToken();
            $_headers = array("Authorization: {$auth}");
// Perform request
            $_response = $this->request('uninstall_shop', $data, $_headers);
            $_decoded_data = $this->decodeResponse($_response);
            array('result' => $_decoded_data, 'code' => $_response);
        } catch (RequestException $e) {
// Call to Roll-bar, later on
            array('result' => 'error', 'code' => $e->getCode(), 'message' => $e->getMessage() );
            return false;
        }
        return true;
    }

    private function sendInstallRequest()
    {
// Create the access token that will be used to validate the subscription cancellation
// Set the request params
        $data = $this->getInformation();
// Init and configure curl
        try {
// Getting auth header
            $auth = $this->getAuthenticationToken();
            $_headers = array("Authorization: {$auth}");
// Perform request
            $_response = $this->request('create_shop', $data, $_headers);
            $_decoded_data = $this->decodeResponse($_response);
            array('result' => $_decoded_data, 'code' => $_response);
        } catch (RequestException $e) {
// Call to Roll-bar, later on
            array('result' => 'error', 'code' => $e->getCode(), 'message' => $e->getMessage() );
            return false;
        }
        return true;
    }

    private function createShopReference()
    {
        return md5(uniqid(rand(), true));
    }

    protected function decodeResponse($response)
    {
        return json_decode($response, false);
    }

    private function createWebserviceKey()
    {
// Instantiate the WebserviceKey object
        $obj = new WebserviceKey();
// Generate an unique webservice key
        $key =  Tools::passwdGen(32);
        while ($obj->keyExists($key)) {
            $key = Tools::passwdGen(32);
        }
// Set the WebserviceKey object properties
        $obj->key = $key;
        $obj->description = 'CleverPPC webservice key';
// Save the webservice key

        if (!$obj->add() ||
            !Configuration::updateValue('CLEVERPPC_WEBSERVICE_ACCOUNT_ID', $obj->id) ||
            !Configuration::updateValue('CLEVERPPC_WEBSERVICE_ACCOUNT', $obj->key) ) {
            $this->context->controller->errors[] =
            $this->l('It was not possible to install the CleverPPC module: webservice key creation error.');
            return false;
        }
        Tools::generateHtaccess();
// Set the webservice key permissions
        if (!$obj->setPermissionForAccount($obj->id, $this->getWebservicePermissions())) {
            $this->context->controller->errors[] =
            $this->l('It was not possible to install the CleverPPC module: webservice key permissions setup error.');
            return false;
        }
        return true;
    }

    private function genAccessToken($size)
    {
        if (!Configuration::get('CLEVERPPC_ACCESS_CODE')) {
            Configuration::updateValue('CLEVERPPC_ACCESS_CODE', Tools::passwdGen($size));
        }
        return true;
    }

    public function getAuthData()
    {
        return array('email' => 'prestashop@cleverppc.com', 'password' => 'cleverppc');
    }

    public function getAuthenticationToken()
    {
        try {
// Prepare auth data
            $_data = $this->getAuthData();
// Perform request and get raw response object
            $_response = $this->request('authenticate', $_data);
// Decoding response data
            $_decoded_data = $this->decodeResponse($_response);
// Setting result
            $_result = $_decoded_data->auth_token;
        } catch (RequestException $e) {
// Call to Roll-bar, later on
            $_result = 'error';
        }
        return $_result;
    }

    protected function request($endPoint, $data, $headers = array())
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://prestashop.cleverecommerce.com/api/prestashop/{$endPoint}");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        
        var_dump($response);
        return $response;
    }


    public function getContent()
    {
// If the CleverPPC webservice key was deleted for any reason, create a new one
        $web_service_key = new WebserviceKey(Configuration::get('CLEVERPPC_WEBSERVICE_ACCOUNT_ID'));
        if (!$web_service_key->key) {
            $this->createWebserviceKey();
        }
        $lang = new Language(Configuration::get('PS_LANG_DEFAULT'));

// Set the smarty context variables
        $iframe = "https://prestashop.cleverecommerce.com/?hmac=".Configuration::get('CLEVERPPC_HMAC');
        $this->context->smarty->assign('mod_dir', $this->_path);
        $this->context->smarty->assign('cleverppc_url', Cleverppc::CLEVERPPC_BASE_URL);
        $this->context->smarty->assign('shop_email', Configuration::get('PS_SHOP_EMAIL'));
        $this->context->smarty->assign('shop_name', Configuration::get('PS_SHOP_NAME'));
        $this->context->smarty->assign('shop_reference', Configuration::get('CLEVERPPC_SHOP_REFERENCE'));
        $this->context->smarty->assign('shop_url', _PS_BASE_URL_.__PS_BASE_URI__);
        $this->context->smarty->assign('shop_code', Configuration::get('CLEVERPPC_ACCESS_CODE'));
        $this->context->smarty->assign('shop_ws_key', $web_service_key->key);
        $this->context->smarty->assign('shop_lang', $lang->language_code);
        $this->context->smarty->assign('iframe_url', $iframe);

        return $this->display(__FILE__, 'configure.tpl');
    }

    private function getWebservicePermissions()
    {
        $webservice_permissions = array(
            'cart_rules' => array('GET' => 'on'),
            'categories' => array('GET' => 'on'),
            'configurations' => array('GET' => 'on'),
            'content_management_system' => array('GET' => 'on'),
            'countries' => array('GET' => 'on'),
            'currencies' => array('GET' => 'on'),
            'customizations' => array('GET' => 'on'),
            'deliveries' => array('GET' => 'on'),
            'employees' => array('GET' => 'on'),
            'groups' => array('GET' => 'on'),
            'guests' => array('GET' => 'on'),
            'image_types' => array('GET' => 'on'),
            'images' => array('GET' => 'on'),
            'languages' => array('GET' => 'on'),
            'order_carriers' => array('GET' => 'on'),
            'order_details' => array('GET' => 'on'),
            'order_discounts' => array('GET' => 'on'),
            'order_histories' => array('GET' => 'on'),
            'orders' => array('GET' => 'on'),
            'price_ranges' => array('GET' => 'on'),
            'product_customization_fields' => array('GET' => 'on'),
            'product_feature_values' => array('GET' => 'on'),
            'product_features' => array('GET' => 'on'),
            'product_option_values' => array('GET' => 'on'),
            'product_options' => array('GET' => 'on'),
            'product_suppliers' => array('GET' => 'on'),
            'products' => array('GET' => 'on'),
            'shop_groups' => array('GET' => 'on'),
            'shop_urls' => array('GET' => 'on'),
            'shops' => array('GET' => 'on'),
            'specific_price_rules' => array('GET' => 'on'),
            'specific_prices' => array('GET' => 'on'),
            'states' => array('GET' => 'on'),
            'stock_availables' => array('GET' => 'on'),
            'stock_movement_reasons' => array('GET' => 'on'),
            'stock_movements' => array('GET' => 'on'),
            'stocks' => array('GET' => 'on'),
            'stores' => array('GET' => 'on'),
            'suppliers' => array('GET' => 'on'),
            'supply_order_histories' => array('GET' => 'on'),
            'tags' => array('GET' => 'on'),
            'translated_configurations' => array('GET' => 'on'),
            'weight_ranges' => array('GET' => 'on'),
            'zones' => array('GET' => 'on')
        );
        return $webservice_permissions;
    }

//This function will display the admin module configuration pannel
    private function showConfig()
    {
        $this->_html .= "
        <button class='btn btn-success' onclick='window.open('http://google.com','_blank')'> Google</button>";
    }

    public function generateHmac()
    {
        $this->generatePayload();
        $_encoded = json_encode($this->_payload);
        $_encoded_payload = base64_encode($_encoded);
        $_hash_mac = hash_hmac($this->getHashMacAlgorithm(), $_encoded, $this->getHashSecret());
        $_payload_signature = base64_encode($_hash_mac);
        $this->_hmac = "{$_encoded_payload}.{$_payload_signature}";
        Configuration::updateValue('CLEVERPPC_HMAC', $this->_hmac);
        return true;
    }

    public static function getHashMacAlgorithm()
    {
        return 'sha256';
    }

    public static function getHashSecret()
    {
        return '4n7fdidvdrzvwe5hb0i4blohf4d8crc';
    }

    public function generatePayload()
    {
        $this->_payload = array('store_hash' => Configuration::get('CLEVERPPC_ACCESS_CODE'),
            'timestamp' => time(),
            'email' => Configuration::get('PS_SHOP_EMAIL'));
    }

    private function getInformation()
    {
        $languages = Language::getLanguages(true, $this->context->shop->id);
        $shop_languages = array();
        foreach ($languages as $lang) {
//$values[] = Tools::getValue('SOMETEXT_TEXT_'.$lang['id_lang']);
            array_push($shop_languages, "{".$lang['id_lang']."=>".$lang['iso_code']."}");
        }
        $_store = array(
            'name' => Configuration::get('PS_SHOP_NAME'),
            'domain' => Configuration::get('PS_SHOP_DOMAIN'),
            'email' => Configuration::get('PS_SHOP_EMAIL'),
            'countries' => Configuration::get('PS_ALLOWED_COUNTRIES'),
            'logo_url' => Configuration::get('PS_LOGO'),
            'platform' => 'prestashop',
            'currency' => Currency::getCurrencyInstance((int)(Configuration::get('PS_CURRENCY_DEFAULT')))->iso_code,
            'language' => implode(',', $shop_languages),
            'access_token' => Configuration::get('CLEVERPPC_WEBSERVICE_ACCOUNT'),
            'client_id' => Configuration::get('CLEVERPPC_ACCESS_CODE'),
            'address' => Configuration::get('BLOCKCONTACTINFOS_ADDRESS'),
            'timezone' => Configuration::get('PS_TIMEZONE'),
            'phone' => Configuration::get('BLOCKCONTACTINFOS_PHONE'),
            'shop_country' => Configuration::get('PS_LOCALE_COUNTRY')
        );
        return $_store;
    }


    public static function errorHandler($code, $message, $err_file, $err_line)
    {
// Set the request params
        $params = array(
            'code' => $code,
            'message' => $message,
            'errFile' => $err_file,
            'errLine' => $err_line,
            'url' => _PS_BASE_URL_.__PS_BASE_URI__
        );
// Init and configure curl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, Cleverppc::CLEVERPPC_BASE_URL.'log');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Make the request
        curl_exec($ch);
        curl_getinfo($ch, CURLINFO_HTTP_CODE);
    }

    public static function fatalErrorShutdownHandler()
    {
        $last_error = error_get_last();
        if ($last_error['type'] === E_ERROR) {
            return Cleverppc::errorHandler(E_ERROR, $last_error['message'], $last_error['file'], $last_error['line']);
        }
    }
}
