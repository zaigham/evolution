<?php
if(!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE != 'true') exit();

if(!$modx->hasPermission('bk_manager')) {
	$e->setError(3);
	$e->dumpError();
}

// Get table names (alphabetical)
$tbl_event_log    = $modx->getFullTableName('event_log');

// Backup Manager by Raymond:

$mode = isset($_POST['mode']) ? $_POST['mode'] : '';

function nicesize($size) {
	$a = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');

	$pos = 0;
	while ($size >= 1024) {
		$size /= 1024;
		$pos++;
	}
	if ($size==0)
	        return '-';
	else    return round($size,2).' '.$a[$pos];
}

if ($mode=='backup') {
	$tables = isset($_POST['chk']) ? $_POST['chk'] : '';
	if (!is_array($tables)) {
		echo '<html><body>'.
		     '<script>alert(\'Please select a valid table from the list below\');</script>'.
		     '</body></html>';
		exit;
	}

	/*
	 * Code taken from Ralph A. Dahlgren MySQLdumper Snippet - Etomite 0.6 - 2004-09-27
	 * Modified by Raymond 3-Jan-2005
	 * Modified by TimGS for Clipper Dec 2012
	 */
	require_once('clipper_sql_dumper.inc.php');
	@set_time_limit(120); // set timeout limit to 2 minutes
	$dumper = new ClipperSqlDumper($modx);
	$dumper->setDBtables($tables);
	$dumper->setDroptables((isset($_POST['droptables']) ? true : false));
	$dump_output = $dumper->createDump();
	if($dump_output) {
		$today = date("d_M_y");
		$today = strtolower($today);
		if(!headers_sent()) {
			header('Expires: 0');
		    header('Cache-Control: private');
		    header('Pragma: cache');
			header('Content-type: application/download');
			header('Content-Disposition: attachment; filename='.$today.'_database_backup.sql');
		}
		echo $dump_output;
		exit;
	} else {
		$e->setError(1, 'Unable to Backup Database');
		$e->dumpError();
		exit;
	}

} else {
	require('header.inc.php');  // start normal header
}

?>
<script>
	function selectAll() {
		var f = document.forms['frmdb'];
		var c = f.elements['chk[]'];
		for(i=0;i<c.length;i++){
			c[i].checked=f.chkselall.checked;
		}
	}
	function submitForm(){
		var f = document.forms['frmdb'];
		f.mode.value='backup';
		f.target='fileDownloader';
		f.submit();
		return false;
	}

</script>
<h1><?php echo $_lang['bk_manager']?></h1>

<div class="sectionHeader"><?php echo $_lang['database_tables']?></div>
<div class="sectionBody" id="lyr4">
	<form name="frmdb" method="post">
	<input type="hidden" name="mode" value="" />
	<p><?php echo $_lang['table_hoverinfo']?></p>

	<p><a href="#" onclick="submitForm();return false;"><img src="media/style/<?php echo $manager_theme?>/images/misc/ed_save.gif" alt="" /><?php echo $_lang['database_table_clickhere']?></a> <?php echo $_lang['database_table_clickbackup']?></p>
	<p><input type="checkbox" name="droptables"><?php echo $_lang['database_table_droptablestatements']?></p>
	<table class="db-list table">
		<thead><tr>
			<th class="table-name"><input type="checkbox" name="chkselall" onclick="selectAll()" title="Select All Tables" /><?php echo $_lang['database_table_tablename']?></th>
			<th class="table-data"><?php echo $_lang['database_table_records']?></th>
			<th class="table-data"><?php echo $_lang['database_table_engine']?></th>
			<th class="table-data"><?php echo $_lang['database_table_datasize']?></th>
			<th class="table-data"><?php echo $_lang['database_table_overhead']?></th>
			<th class="table-data"><?php echo $_lang['database_table_effectivesize']?></th>
			<th class="table-data"><?php echo $_lang['database_table_indexsize']?></th>
			<th class="table-data"><?php echo $_lang['database_table_totalsize']?></th>
		</tr></thead>
		<tbody>
			<?php

$innodb_file_per_table = ($modx->db->getValue('SHOW GLOBAL VARIABLES LIKE \'innodb_file_per_table\'') == 'ON');
$sql = 'SHOW TABLE STATUS FROM '.$dbase. ' LIKE \''.$table_prefix.'%\'';
$rs = $modx->db->query($sql);
$limit = $modx->db->getRecordCount($rs);
for ($i = 0; $i < $limit; $i++) {
	$db_status = $modx->db->getRow($rs);

    if ($db_status['Engine'] == 'InnoDB') {
        if (!$innodb_file_per_table) {
            $db_status['Data_free'] = 0;
        }
        $db_status['Rows'] = $modx->db->getValue('SELECT COUNT(*) FROM '.$db_status['Name']);
    }

    $alt_class = ($i % 2) ? 'odd' : 'even';

	if (isset($tables))
		$table_string = implode(',', $table);
	else    $table_string = '';

	echo '<tr class="'.$alt_class.'" title="'.$db_status['Comment'].'">
	     <td><input type="checkbox" name="chk[]" value="'.$db_status['Name'].'"'.(strstr($table_string,$db_status['Name']) === false ? '' : ' checked="checked"').' /><b style="color:#009933">'.$db_status['Name'].'</b></td>
	     <td class="table-data">'.$db_status['Rows'].'</td>
	     <td class="table-data">'.$db_status['Engine'].'</td>';

	// Enable record deletion for certain tables (TRUNCATE TABLE) if they're not already empty
	$truncateable = array(
		$table_prefix.'event_log',
		$table_prefix.'log_access',   // should these three
		$table_prefix.'log_hosts',    // be deleted? - sirlancelot (2008-02-26)
		$table_prefix.'log_visitors', //
		$table_prefix.'manager_log',
	);
	if($modx->hasPermission('settings') && in_array($db_status['Name'], $truncateable) && $db_status['Rows'] > 0) {
		echo "\t\t\t\t".'<td dir="ltr" class="table-data">'.
		     '<a href="index.php?a=54&amp;mode='.$action.'&amp;u='.$db_status['Name'].'" title="'.$_lang['truncate_table'].'">'.nicesize($db_status['Data_length']+$db_status['Data_free']).'</a>'.
		     '</td>'."\n";
	} else {
		echo "\t\t\t\t".'<td dir="ltr" class="table-data">'.nicesize($db_status['Data_length']+$db_status['Data_free']).'</td>'."\n";
	}

	if($modx->hasPermission('settings')) {
		echo "\t\t\t\t".'<td class="table-data">'.($db_status['Data_free'] > 0 ?
		     '<a href="index.php?a=54&amp;mode='.$action.'&amp;t='.$db_status['Name'].'" title="'.$_lang['optimize_table'].'">'.nicesize($db_status['Data_free']).'</a>' :
		     '-').
		     '</td>'."\n";
	} else {
		echo '<td class="table-data">'.($db_status['Data_free'] > 0 ? nicesize($db_status['Data_free']) : '-').'</td>'."\n";
	}

	echo "\t\t\t\t".'<td dir="ltr" class="table-data">'.nicesize($db_status['Data_length']-$db_status['Data_free']).'</td>'."\n".
	     "\t\t\t\t".'<td dir="ltr" class="table-data">'.nicesize($db_status['Index_length']).'</td>'."\n".
	     "\t\t\t\t".'<td dir="ltr" class="table-data">'.nicesize($db_status['Index_length']+$db_status['Data_length']+$db_status['Data_free']).'</td>'."\n".
	     "\t\t\t</tr>";

	$total = $total+$db_status['Index_length']+$db_status['Data_length'];
	$totaloverhead = $totaloverhead+$db_status['Data_free'];
}
?>

			<tr class="db-totals">
				<td><b><?php echo $_lang['database_table_totals']?></b></td>
				<td colspan="3">&nbsp;</td>
				<td dir="ltr" class="table-data"><?php echo $totaloverhead>0 ? '<b style="color:#990033">'.nicesize($totaloverhead).'</b><br />('.number_format($totaloverhead).' B)' : '-'?></td>
				<td colspan="2">&nbsp;</td>
				<td dir="ltr" class="table-data"><?php echo "<b>".nicesize($total)."</b><br />(".number_format($total)." B)"?></td>
			</tr>
		</tbody>
	</table>
<?php
if ($totaloverhead > 0) {
	echo '<p>'.$_lang['database_overhead'].'</p>';
}
?>
</form>
</div>
<!-- This iframe is used when downloading file backup file -->
<iframe name="fileDownloader" width="1" height="1" style="display:none; width:1px; height:1px;"></iframe>

<?php include_once "footer.inc.php"; // send footer ?>


