<?php
if(!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE != 'true') exit();

$user_id = $_SESSION['mgrInternalKey']; // Bypasses the API. Not ideal, but unlikely to be an issue.

if (!empty($user_id)) {

	if (!isset($modx)) {
		// WARNING: This creates a $modx Core object only. If subsequent code needs a DocumentParser object it must test for this specifically.
		// Note that this file is unlikely to need to create an object as settings.inc.php should be included first.
		require_once(dirname(__FILE__).'/core.class.inc.php');
		require_once(dirname(__FILE__).'/extenders/dbapi.'.(isset($database_type) ? $database_type : 'mysql').'.class.inc.php');
		$modx = new Core();
		$modx->db = new DBAPI($modx);
	}

	$sql = "SELECT setting_name, setting_value FROM $dbase.`" . $table_prefix . "user_settings` WHERE user=" . $user_id;
	$rs = $modx->db->query($sql);
	$number_of_settings = $modx->db->getRecordCount($rs);
	while ($row = $modx->db->getRow($rs)) {
		$settings[$row['setting_name']] = $row['setting_value'];
		if (isset($modx->config)) {
			$modx->config[$row['setting_name']] = $row['setting_value'];
		}
	}
	
	extract($settings, EXTR_OVERWRITE);
}

