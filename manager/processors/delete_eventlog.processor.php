<?php
if(!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE != 'true') exit();

if(!$modx->hasPermission('delete_eventlog')) {
	$e->setError(3);
	$e->dumpError();
}
?>
<?php

$id=intval($_GET['id']);

// delete event log
$rs = $modx->db->delete($modx->getFullTableName('event_log'), ($_GET['cls'] == 1) ? '' : "id={$id}");
if(!$rs) {
	echo "Something went wrong while trying to delete the event log...";
	exit;
} else {
	$header="Location: index.php?a=114";
	header($header);
}

?>
