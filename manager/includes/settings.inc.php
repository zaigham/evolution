<?php
if(!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE != 'true') exit();

// get the settings from the database.
$settings = array();
if ($modx && count($modx->config)>0) $settings = $modx->config;
else {
	// WARNING: This creates a $modx Core object only. If subsequent code needs a DocumentParser object it must test for this specifically.
	require_once(dirname(__FILE__).'/core.class.inc.php');
	require_once(dirname(__FILE__).'/extenders/dbapi.'.(isset($database_type) ? $database_type : 'mysql').'.class.inc.php');
	$modx = new Core();
	$modx->db = new DBAPI($modx);
	$sql = "SELECT setting_name, setting_value FROM $dbase.`".$table_prefix."system_settings`";
	$rs = $modx->db->query($sql);
	$number_of_settings =$modx->db->getRecordCount($rs);
	while ($row = $modx->db->getRow($rs)) {
		$modx->config[$row['setting_name']] = $settings[$row['setting_name']] = $row['setting_value'];
	}
	$modx->dbConfig = &$modx->db->config; // alias for backward compatibility
}

extract($settings, EXTR_OVERWRITE);
// add for backwards compatibility - garryn FS#104
$etomite_charset = & $modx_manager_charset;

// setup default site id - new installation should generate a unique id for the site.
if(!isset($site_id)) $site_id = "MzGeQ2faT4Dw06+U49x3";

