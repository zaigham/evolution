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

// USE CLIPPERCMS MANAGER LANGUAGE
if (!defined('IN_MANAGER_MODE')) define('IN_MANAGER_MODE', 'true');
require_once('../../../includes/document.parser.class.inc.php');
$modx = new DocumentParser;
$modx->getSettings();
if (!$modx->config['manager_language'] || !file_exists(MODX_MANAGER_PATH.'includes/lang/'.$modx->config['manager_language'].'.inc.php')) {
	include_once('../../../includes/lang/english.inc.php'); // Default
} else {
	include_once('../../../includes/lang/'.$modx->config['manager_language'].'.inc.php');
}
if (isset($modx_lang_attribute) && ctype_alpha($modx_lang_attribute) && strlen($modx_lang_attribute) == 2) {
	$_GET['langCode'] = $_REQUEST['langCode'] = $modx_lang_attribute;
}

