<?php
if(IN_MANAGER_MODE!='true') exit();

if ($_SESSION['mgrRole'] == 1) {
	include(dirname(__FILE__).'/../includes/tag_syntax.inc.php');
}

