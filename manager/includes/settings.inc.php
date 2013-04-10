<?php
if(!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE != 'true') exit();

if (!$modx) {
	// WARNING: This creates a $modx Core object only. If subsequent code needs a DocumentParser object it must test for this specifically.
	require_once(dirname(__FILE__).'/core.class.inc.php');
	require_once(dirname(__FILE__).'/extenders/dbapi.'.$database_type.'.class.inc.php');
	$modx = new Core();
	$modx->db = new DBAPI($modx);
}

$modx->getSettings();
$modx->getUserSettings();
$settings = &$modx->config;
extract($settings, EXTR_OVERWRITE);

// setup default site id - new installation should generate a unique id for the site.
if(!isset($site_id)) $site_id = "MzGeQ2faT4Dw06+U49x3";

