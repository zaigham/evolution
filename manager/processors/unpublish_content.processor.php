<?php
if(!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE != 'true') exit();

if(!$modx->hasPermission('save_document')||!$modx->hasPermission('publish_document')) {
	$e->setError(3);
	$e->dumpError();
}

$id = $_REQUEST['id'];

// check permissions on the document
include_once "./processors/user_documents_permissions.class.php";
$udperms = new udperms();
$udperms->user = $modx->getLoginUserID();
$udperms->document = $id;
$udperms->role = $_SESSION['mgrRole'];

if(!$udperms->checkPermissions()) {
	require ('header.inc.php');
	?><div class="sectionHeader"><?php echo $_lang['access_permissions']; ?></div>
	<div class="sectionBody">
	<p><?php echo $_lang['access_permission_denied']; ?></p>
	<?php
	include "footer.inc.php";
	exit;
}

// update the document
$sql = "UPDATE " . $modx->getFullTableName('site_content') . " 
SET published=0, pub_date=0, unpub_date=0, editedby=" . $modx->getLoginUserID() . ", 
editedon=" . time() . ", publishedby=0, publishedon=0 WHERE id=$id";

$modx->db->query($sql);

$modx->invokeEvent("OnDocUnPublished",array("docid"=>$id));

include_once "cache_sync.class.processor.php";
$sync = new synccache();
$sync->setCachepath("../assets/cache/");
$sync->setReport(false);
$sync->emptyCache(); // first empty the cache

$header="Location: index.php?r=1&id=$id&a=7";
header($header);
?>
