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
 * Touchize TouchFront
 *
 * Redirects to TouchFront cloud based on what controller that is active.
 *
 * TODO: Better to have a Redirect to a Touchize
 * controller and that handles the redirect as a post?
 *
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

include_once 'helpers/Autoloader.php';
require_once 'lib/lessphp/lessc.inc.php';

class Touchize extends Module
{
    const CDN_PATH = 'https://d2kt9xhiosnf0k.cloudfront.net/';
    const CDN_CODE = 'classic/latest';
  
    /**
     * @var number
     **/
    protected static $accessRights = 0775;

    /**
     * @var array
     */
    public $tabs = array(
        array(
            'name' => array(
                'en' => 'Touchize Commerce',
            ),
            'class_name' => 'AdminGetStarted',
            'icon' => 'phone_iphone',
            'parent_class_name' => 'CONFIGURE'
        ));

    /**
     * @var array
     **/
    private $templates = array(
        'classic/latest',
        'lines/latest',
        'clean/latest'
    );

    private $adminControllers = array(
        'AdminGetStarted',
        'AdminTouchmaps',
        'AdminWizard',
        'AdminMenuBuilder',
        'AdminTopMenuBuilder',
        'AdminSettings',
        'AdminVariable',
        'AdminLicense',
        'AdminContactUs',
        'AdminTrial'
    );
    private $adminControllersHaveInfo = array(
        'AdminGetStarted',
        'AdminWizard',
        'AdminTouchmaps',
        'AdminMenuBuilder',
        'AdminTopMenuBuilder',
        'AdminSettings',
        'AdminLicense',
        'AdminContactUs'
    );

    public function __construct()
    {
        $this->name = 'touchize';
        $this->tab = 'mobile';
        $this->version = '1.1.3';
        $this->author = $this->l('Touchize Sweden AB');
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array(
          'min' => '1.6',
          'max' => _PS_VERSION_
        );
        $this->bootstrap = true;

        parent::__construct();
        $this->module_key = 'f19cf81a3cdcf7aa959b1fa69c6fbc6f';

        $this->displayName = $this->l('Touchize Commerce');
        $this->description = $this->l('Drag and drop on mobile.');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
        $this->licenseHelper = new TouchizeLicenseHelper();
        $this->revalidate = false;
    }

    public function install()
    {
        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }

        $res = true;
        $options = require dirname(__FILE__).'/install/option_install.php';
        foreach ($options as $_option) {
            $res &= Configuration::updateValue(
                $_option['name'],
                $_option['value']
            );
        }

        if (!parent::install() ||
            !$this->registerHook('header') ||
            !$this->registerHook('ModuleRoutes') ||
            !$this->registerHook('displayAdminAfterHeader') ||
            !$this->registerHook('displayBackOfficeHeader') ||
            !$res
        ) {
            return false;
        }

        $this->setModuleTabs();
        $this->createImageDirectory();

        $this->createTables();
        $this->setTableDefaultData();
        $this->setStylingVariables();

        return true;
    }

    public function uninstall()
    {
        $res = true;
        $options = require dirname(__FILE__).'/install/option_install.php';
        foreach ($options as $_option) {
            $res &= Configuration::deleteByName($_option['name']);
        }

        if (!parent::uninstall() ||
            !$this->unregisterHook('header') ||
            !$this->unregisterHook('ModuleRoutes') ||
            !$this->unregisterHook('displayBackOfficeHeader') ||
            !$this->unregisterHook('displayAdminAfterHeader') ||
            !$res
        ) {
            return false;
        }

        $this->deleteModuleTabs();
        $this->deleteImageDirectory();

        return $this->deleteTables();
    }

    public function getReroute()
    {
        return $this->context->link->getModuleLink($this->name, 'touchize');
    }

    public function hookHeader($params)
    {
        $enableValue = $this->licenseHelper->isTouchizeEnabled($this->revalidate);
        if ($enableValue > 0) {
            $overriddenControllers = array(
                'index',
                'product',
                'category',
                'new-products',
                'best-sales',
                'prices-drop',
                'cms',
                'search'
            );
            if (in_array($this->context->controller->php_self, $overriddenControllers)) {
                header('Vary: User-Agent');
            }
        }
        $isMobile = $this->context->mobile_detect->isMobile();
        $isTablet = $this->context->mobile_detect->isTablet();

        switch ($enableValue) {
            case 0:
                # Disabled
                $enable = false;
                break;
            case 1:
                # Disable if not mobile
                $enable = ($isMobile && !$isTablet) ? true : false;
                break;
            case 2:
                # Disable if not table
                $enable = $isTablet ? true : false;
                break;
            case 3:
                $enable = ($isMobile || $isTablet) ? true : false;
                break;
            default:
                # Disabled by default
                $enable = false;
                break;
        }
        $botab = TouchizeControllerHelper::getParam('botab', false);
        if (!$botab) {
            if (isset($_SERVER['HTTP_REFERER'])) {
                if (strpos($_SERVER['HTTP_REFERER'], 'botab=') !== false) {
                    $botab = true;
                }
            }
        }
        $preview = TouchizeControllerHelper::getParam('preview', false);
        $testTouchize = Tools::getValue('touchize');
        if ($testTouchize == 'yes') {
            $this->context->cookie->__set('touchizetest', 'yes');
            $this->context->cookie->write();
        } elseif ($testTouchize == 'no') {
            $this->context->cookie->__unset('touchizetest');
            $this->context->cookie->write();
        }
        if (isset($this->context->cookie->touchizetest)) {
            $enable = ($isMobile || $isTablet) ? true : false;
        }
    
        if ($enable || $preview || $botab) {
            if (Module::isInstalled('blocknewsletter') &&
                Module::isEnabled('blocknewsletter')
            ) {
                if (Tools::isSubmit('submitNewsletter')) {
                    # If we get a POST with submitNewsletter, run hook
                    require_once _PS_MODULE_DIR_.
                        'blocknewsletter/blocknewsletter.php';
          
                    $newsletter = new Blocknewsletter();
                    $newsletter->hookDisplayLeftColumn();
                }
            }

            $pid = $tid = $query = $page = null;
            $url = $this->getReroute();
            if (!empty($url)) {
                $controller = $this->context->controller->php_self;
                switch ($controller) {
                    case 'index':
                        $tid = Configuration::get(
                            'TOUCHIZE_START_CATEGORY_ID'
                        );
                        break;
                    case 'product':
                        $pid = $this->context->controller->getProduct()->id;
                        $tid = $this->context
                                    ->controller
                                    ->getProduct()
                                    ->id_category_default;
                        break;
                    case 'category':
                        $tid = $this->context->controller->getCategory()->id;
                        break;
                    case 'new-products':
                    case 'best-sales':
                    case 'prices-drop':
                        $tid = $controller;
                        break;
                    case 'cms':
                        $tid  = Configuration::get(
                            'TOUCHIZE_START_CATEGORY_ID'
                        );
                        $page = $this->context->controller->cms->id;
                        break;
                    case 'search':
                        $query = Tools::getValue('search_query');
                        break;
                    default:
                        return false;
                }
                if ($preview) {
                    $this->context->cookie->__set(
                        'router',
                        json_encode(
                            array(
                                'SiteUrl' => $this->context->link->getPageLink('index', true),
                                'tid' => $tid,
                                'pid' => $pid,
                                'page' => $page,
                                'qs' => $_SERVER['REQUEST_URI'],
                                'search' => $query,
                                'queryString' => $_SERVER['QUERY_STRING'],
                                'requestURI' => $_SERVER['REQUEST_URI'],
                                'PreviewUrl' => $this->context->link->getPageLink('index', true)."?preview=1"
                            )
                        )
                    );
                } elseif ($botab) {
                    $this->context->cookie->__set(
                        'router',
                        json_encode(
                            array(
                                'SiteUrl' => $this->context->link->getPageLink('index', true),
                                'tid' => $tid,
                                'pid' => $pid,
                                'page' => $page,
                                'qs' => $_SERVER['REQUEST_URI'],
                                'search' => $query,
                                'queryString' => $_SERVER['QUERY_STRING'],
                                'requestURI' => $_SERVER['REQUEST_URI'],
                                'PreviewUrl' => $this->context->link->getPageLink('index', true)."?botab=1"
                            )
                        )
                    );
                } else {
                    $this->context->cookie->__set(
                        'router',
                        json_encode(
                            array(
                                'SiteUrl' => $this->context->link->getPageLink('index', true),
                                'tid' => $tid,
                                'pid' => $pid,
                                'page' => $page,
                                'qs' => $_SERVER['REQUEST_URI'],
                                'search' => $query,
                                'queryString' => $_SERVER['QUERY_STRING'],
                                'requestURI' => $_SERVER['REQUEST_URI'],
                            )
                        )
                    );
                }
                
                include(_PS_MODULE_DIR_.'touchize'.DIRECTORY_SEPARATOR.'controllers'.
                DIRECTORY_SEPARATOR.'front'.DIRECTORY_SEPARATOR.'touchize.php');
                $_POST['module'] = $this->name;
                $frontController = new TouchizeTouchizeModuleFrontController();
                $frontController->setPreview($preview);
                $frontController->init();

                # $frontController->getLayout() returns different path
                # to template file while changing _PS_MODE_DEV_ value.
                $layout = is_file($frontController->getLayout())
                    ? $frontController->getLayout()
                    : _PS_MODULE_DIR_.$this->name.'/views/templates/front/touchize.tpl';

                $this->context->smarty->assign(array(
                    'display_header' => true,
                    'display_footer' => true,
                ));

                $this->context->smarty->display($layout);
                ob_flush();
                flush();
                if ($this->revalidate) {
                    $this->licenseHelper->revalidate();
                }
                die();
            }
        }

        return false;
    }

    public function hookModuleRoutes()
    {
        $moduleRoutes = array();
        # Cart
        $moduleRoutes['module-touchize-cart'] = array(
            'controller' => 'cart',
            'rule' => 'modules/touchize/cart{/:module_action}',
            'keywords' => array(
                'module_action' => array(
                    'regexp' => '[\w]+',
                    'param' => 'module_action',
                ),
            ),
            'params' => array(
                'fc' => 'module',
                'module' => 'touchize',
                'controller' => 'cart',
            ),
        );
        # Endpoints

        return $moduleRoutes;
    }

    public function hookDisplayBackOfficeHeader()
    {
        $this->context->controller->addCss($this->_path.'views/css/tab.css');
    }

    public function hookDisplayAdminAfterHeader()
    {
        $result = '';
        
        if (in_array($this->context->controller->controller_name, $this->adminControllers)) {
            $helper = new TouchizeAdminHelper();
            $helper->assignMenuVars();
            $result .= $helper->getTemplate('partials/menu.tpl');
            if (in_array($this->context->controller->controller_name, $this->adminControllersHaveInfo)) {
                if (method_exists($this->context->controller, 'getInfoTemplate')) {
                    $info_template = $this->context->controller->getInfoTemplate();
                    $result .= $helper->getTemplate($info_template);
                }
            }
        }
        return $result;
    }
    
    public function getContent()
    {
        $output = null;

        if (Tools::isSubmit('submit'.$this->name)) {
            $touchizeGenerateStartupModules = (int)Tools::getValue(
                'TOUCHIZE_GENERATE_STARTUP_MODULES_on'
            );
            if (!Validate::isBool($touchizeGenerateStartupModules)) {
                $output .= $this->displayError(
                    $this->l('Generate startup modules failed')
                );
                $success = false;
            } else {
                Configuration::updateValue(
                    'TOUCHIZE_GENERATE_STARTUP_MODULES',
                    $touchizeGenerateStartupModules
                );
            }

            $touchizeStartCategoryId = (string)Tools::getValue(
                'TOUCHIZE_START_CATEGORY_ID'
            );
            # Check if multiple and check each category id
            $allowedControllers = array('prices-drop', 'best-sales', 'new-products');
            $multiCategory = $touchizeStartCategoryId && strpos($touchizeStartCategoryId, ',') !== false;
            $validMultiCategory = true;
            if ($multiCategory) {
                $categoryIds = array_map(
                    'trim',
                    explode(',', $touchizeStartCategoryId)
                );
                foreach ($categoryIds as $catId) {
                    $validMultiCategory = $validMultiCategory &&
                                          (Category::categoryExists($catId) ||
                                          in_array($catId, $allowedControllers));
                }
            }

            //Since categoryExists uses cast to int, we need a complex check...
            // to avoid true for multicategories as "2, some_nonexisting_cat"
            $valid = $touchizeStartCategoryId &&
                     ($multiCategory && $validMultiCategory ||
                     !$multiCategory && Category::categoryExists($touchizeStartCategoryId) ||
                     in_array($touchizeStartCategoryId, $allowedControllers));

            if (!$valid) {
                Configuration::updateValue(
                    'TOUCHIZE_START_CATEGORY_ID',
                    'best-sales'//Category::getRootCategory()->id
                );
                $output .= $this->displayError(
                    $this->l('One or more invalid start category, reset to best sellers.')
                );
                $success = false;
            } else {
                Configuration::updateValue(
                    'TOUCHIZE_START_CATEGORY_ID',
                    $touchizeStartCategoryId
                );
            }

            $touchizeCdnPath = (string)Tools::getValue('TOUCHIZE_CDN_PATH');
            if (!$touchizeCdnPath ||
                empty($touchizeCdnPath) ||
                !Validate::isUrl($touchizeCdnPath)
            ) {
                Configuration::updateValue(
                    'TOUCHIZE_CDN_PATH',
                    'https://d2kt9xhiosnf0k.cloudfront.net/'
                );
                $output .= $this->displayError(
                    $this->l('CDN path failed, reset to default')
                );
                $success = false;
            } else {
                Configuration::updateValue(
                    'TOUCHIZE_CDN_PATH',
                    $touchizeCdnPath
                );
            }

            $touchizeCdnCode = (string)Tools::getValue('TOUCHIZE_CDN_CODE');
            if (!$touchizeCdnCode ||
                empty($touchizeCdnCode) ||
                !Validate::isUrl($touchizeCdnCode)
            ) {
                Configuration::updateValue(
                    'TOUCHIZE_CDN_CODE',
                    'classic/latest'
                );
                $output .= $this->displayError(
                    $this->l('CDN code failed, reset to default')
                );
                $success = false;
            } else {
                Configuration::updateValue(
                    'TOUCHIZE_CDN_CODE',
                    $touchizeCdnCode
                );
            }

            $touchizeHeadHtml = (string)Tools::getValue(
                'TOUCHIZE_HEAD_HTML'
            );
            if (!Validate::isString($touchizeHeadHtml)) {
                Configuration::updateValue(
                    'TOUCHIZE_HEAD_HTML',
                    ''
                );
                $output .= $this->displayError(
                    $this->l('Entered HTML was not valid, modified.')
                );
            } else {
                Configuration::updateValue(
                    'TOUCHIZE_HEAD_HTML',
                    htmlentities($touchizeHeadHtml)
                );
            }

            $touchizeBodyHtml = (string)Tools::getValue(
                'TOUCHIZE_BODY_HTML'
            );
            if (!Validate::isString($touchizeBodyHtml)) {
                Configuration::updateValue(
                    'TOUCHIZE_BODY_HTML',
                    ''
                );
                $output .= $this->displayError(
                    $this->l('Entered HTML was not valid, modified.')
                );
            } else {
                Configuration::updateValue(
                    'TOUCHIZE_BODY_HTML',
                    htmlentities($touchizeBodyHtml)
                );
            }

            $touchizeSeoSameAs = (string)Tools::getValue(
                'TOUCHIZE_SEO_SAME_AS'
            );
            if (!Validate::isString($touchizeSeoSameAs)) {
                Configuration::updateValue(
                    'TOUCHIZE_SEO_SAME_AS',
                    ''
                );
                $output .= $this->displayError(
                    $this->l('SEO ´same as´ must be string.')
                );
            } else {
                Configuration::updateValue(
                    'TOUCHIZE_SEO_SAME_AS',
                    $touchizeSeoSameAs
                );
            }

            $touchizeTouchmapSliderInterval = (int)Tools::getValue(
                'TOUCHIZE_TOUCHMAP_SLIDER_INTERVAL'
            );
            if (!$touchizeTouchmapSliderInterval ||
                !Validate::isInt($touchizeTouchmapSliderInterval) ||
                empty($touchizeTouchmapSliderInterval)
            ) {
                Configuration::updateValue(
                    'TOUCHIZE_TOUCHMAP_SLIDER_INTERVAL',
                    7000
                );
                /*
                Commented out since in first version slider will not be used
                $output .= $this->displayError(
                    $this->l(
                        'TouchMap slider interval failed, reset to default'
                    )
                );
                $success = false;
                */
                $success = true;
            } else {
                Configuration::updateValue(
                    'TOUCHIZE_TOUCHMAP_SLIDER_INTERVAL',
                    $touchizeTouchmapSliderInterval
                );
            }

            $touchizeDebug = (int) Tools::getValue('TOUCHIZE_DEBUG_on');
            if (!Validate::isBool($touchizeDebug)) {
                $output .= $this->displayError($this->l('Error...'));
                $success = false;
            } else {
                Configuration::updateValue('TOUCHIZE_DEBUG', $touchizeDebug);
            }

            if ($success) {
                $output .= $this->displayConfirmation(
                    $this->l('Settings updated')
                );
            }
        } elseif (Tools::getValue('configure') == 'touchize' && !Tools::getValue('config_tab', false)) {
            Tools::redirectAdmin(
                $this->context->link->getAdminLink('AdminGetStarted').'&configure='.
                Tools::safeOutput($this->module->name)
            );
        }
        return $output . $this->displayForm();
    }

    public function displayForm()
    {
        $config_form = new ConfigForm();
        return $config_form->generateHtml();
    }

    protected function createTables()
    {
        $res = true;
        $sql = require dirname(__FILE__).'/install/sql_install.php';
        foreach ($sql as $table_query) {
            $res &= Db::getInstance()->execute($table_query);
        }

        return $res;
    }
    
    protected function setTableDefaultData()
    {
        $res = (bool) Db::getInstance()->execute('
            INSERT INTO `'._DB_PREFIX_.'touchize_main_menu` 
            (`id_menu_item`, `type`, `action`, `page`, `cms_page`, `url`,
            `external`, `event`, `event_input`, `page_url`, `position`)
            VALUES
            (null, \'menu-item\', \'page\', \'3\', null, null, null, null, null, null, 0);
        ');
        $languages = Language::getLanguages(true);
        foreach ($languages as $lang) {
            $res &= (bool) Db::getInstance()->execute('
                INSERT INTO `'._DB_PREFIX_.'touchize_main_menu_lang` 
                (`id`, `id_lang`, `id_menu_item`, `title`)
                VALUES
                (null, \''.$lang['id_lang'].'\', \''.Db::getInstance()->Insert_ID().'\', null);
            ');
        }
        $menuBuilder = new TouchizeMenuBuilder();
        $menuBuilder->generateJson();
        
        return $res;
    }

    protected function deleteTables()
    {
        $res = true;
        $sql = require dirname(__FILE__).'/install/sql_install.php';
        foreach ($sql as $table_name => $query) {
            $res &= Db::getInstance()->execute('DROP TABLE IF EXISTS ' . $table_name);
        }

        return $res;
    }

    private function setModuleTabs()
    {
        $langs = Language::getLanguages();

        $tabs_data = require dirname(__FILE__).'/install/tabs_install.php';
        foreach ($tabs_data as $tab) {
            $install_tab = new Tab();
            foreach ($langs as $lang) {
                $tab_label = isset($tab['label'][$lang['iso_code']])?
                    $tab['label'][$lang['iso_code']]:$tab['label']['en'] ;
                $install_tab->name[$lang['id_lang']] = $tab_label;
            }
            $install_tab->class_name = $tab['class_name'];
            $install_tab->id_parent = $tab['id_parent'];
            $install_tab->module = $this->name;
            $install_tab->add();
            if (isset($tab['config_name'])) {
                Configuration::updateValue(
                    $tab['config_name'],
                    $install_tab->id
                );
            }
        }


        return true;
    }

    private function deleteModuleTabs()
    {
        $moduleTabs = Tab::getCollectionFromModule($this->name);
        if (!empty($moduleTabs)) {
            foreach ($moduleTabs as $moduleTab) {
                $moduleTab->delete();
            }
        }

        $tabs_data = require dirname(__FILE__).'/install/tabs_install.php';
        foreach ($tabs_data as $tab) {
            if (isset($tab['config_name'])) {
                Configuration::deleteByName($tab['config_name']);
            }
        }

        return true;
    }

    public function getImgFolder()
    {
        return 'touchmaps/';
    }

    public function createImageDirectory()
    {
        if (!file_exists(_PS_IMG_DIR_.$this->getImgFolder())) {
            # Apparently sometimes mkdir cannot set the rights,
            # and sometimes chmod can't. Trying both.
            $success = @mkdir(
                _PS_IMG_DIR_.$this->getImgFolder(),
                self::$accessRights,
                true
            );
            $chmod = @chmod(
                _PS_IMG_DIR_.$this->getImgFolder(),
                self::$accessRights
            );

            # Create an index.php file in the new folder
            if (($success || $chmod) &&
                !file_exists(_PS_IMG_DIR_.$this->getImgFolder().'index.php') &&
                file_exists(_PS_IMG_DIR_.'index.php')
            ) {
                return @copy(
                    _PS_IMG_DIR_.'index.php',
                    _PS_IMG_DIR_.$this->getImgFolder().'index.php'
                );
            }
        }

        return true;
    }

    public function deleteImageDirectory()
    {
        @rmdir(_PS_IMG_DIR_.$this->getImgFolder());

        return true;
    }

    public function setStylingVariables($data = null, $template = null)
    {
        if (!$data) {
            foreach ($this->templates as $cdnCode) {
                $json = @Tools::file_get_contents(
                    self::CDN_PATH.$cdnCode.'/css/simplestyle/defs.json'
                );

                if ($json) {
                    self::setStylingVariables(
                        json_decode($json),
                        $cdnCode
                    );
                }
            }

            $link = new Link();

            # Create .css files with logo class inside for further using.
            file_put_contents(
                _PS_MODULE_DIR_.'touchize/views/css/override' . TouchizeBaseHelper::getCSSFileAddition() . '.css',
                '.tz-brand__logo {'
                    .'background: url('
                        .'"//'.$link->getMediaLink(
                            _PS_IMG_.Configuration::get('PS_LOGO')
                        ).'"'
                    .') no-repeat center center;'
                    .'background-size: contain;'.
                '}'
            );

            file_put_contents(
                _PS_MODULE_DIR_.'touchize/views/css/override_preview.css',
                '.tz-brand__logo {'
                    .'background: url('
                        .'"//'.$link->getMediaLink(
                            _PS_IMG_.Configuration::get('PS_LOGO')
                        ).'"'
                    .') no-repeat center center;'
                    .'background-size: contain;'.
                '}'
            );
        } else {
            $currentDate = new DateTime();
            foreach ($data as $el) {
                $isColor = (int)$el->Color ? 1 : 0;

                Db::getInstance()->insert(
                    'touchize_variables_preview',
                    array(
                        'name' => pSQL($el->Variable),
                        'description' => '',
                        'value' => pSQL($el->Value),
                        'is_color' => pSQL($isColor),
                        'template' => pSQL($template),
                        'date_add' => pSQL($currentDate->format('Y-m-d H:i:s')),
                        'date_upd' => pSQL($currentDate->format('Y-m-d H:i:s')),
                    )
                );

                Db::getInstance()->insert(
                    'touchize_variables',
                    array(
                        'name' => pSQL($el->Variable),
                        'description' => '',
                        'value' => pSQL($el->Value),
                        'is_color' => pSQL($isColor),
                        'template' => pSQL($template),
                        'date_add' => pSQL($currentDate->format('Y-m-d H:i:s')),
                        'date_upd' => pSQL($currentDate->format('Y-m-d H:i:s')),
                    )
                );
            }
        }
    }
}
