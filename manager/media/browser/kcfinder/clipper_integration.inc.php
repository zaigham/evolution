<?php
/** 
 * This file is for the integration of KCFinder with ClipperCMS and must be required at the start of core/autoload.php
 */

// CLIPPERCMS INTEGRATION
list($base_url,) = explode('/manager/', $_SERVER['REQUEST_URI']);
$base_url .= '/';
define('MODX_BASE_URL', $base_url);
require_once('../../../includes/config.inc.php');
startCMSSession(); 
if(!isset($_SESSION['mgrValidated'])) {
        exit();
}

// CLIPPERCMS SETTINGS
if (!defined('IN_MANAGER_MODE')) define('IN_MANAGER_MODE', 'true');
require_once('../../../includes/document.parser.class.inc.php');
$modx = new DocumentParser;
$modx->getSettings();
$modx->getUserSettings();
$settings = &$modx->config;
extract($settings, EXTR_OVERWRITE);

// USE CLIPPERCMS MANAGER LANGUAGE
require_once('../../../includes/get_manager_language.inc.php');
if (isset($modx_lang_attribute) && ctype_alpha($modx_lang_attribute) && strlen($modx_lang_attribute) == 2) {
	$_GET['langCode'] = $_REQUEST['langCode'] = $modx_lang_attribute;
}

