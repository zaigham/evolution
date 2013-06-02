<?php
class DbInfo {

    private $dbase;

    private function nicesize($size) {

	    $a = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');

	    $pos = 0;
	    while ($size >= 1024) {
		    $size /= 1024;
		    $pos++;
	    }
	    
	    if ($size==0) {
            return '-';
        } else {
            return round($size,2).' '.$a[$pos];
        }
    }

    function __construct($dbase) {
        $this->dbase = $dbase;
    }

    function output($a, $backup_form)
        {
        global $modx, $_lang;
        ?>
        <div class="sectionBody" id="lyr4">
        <?php
        if ($backup_form) {
            ?>
	        <form name="frmdb" method="post">
	            <fieldset><input type="hidden" name="mode" value="" /></fieldset>
	            <p><?php echo $_lang['table_hoverinfo']?></p>

	            <p><a href="#" onclick="submitForm();return false;"><img src="media/style/<?php echo $modx->config['manager_theme']; ?>/images/misc/ed_save.gif" alt="" /><?php echo $_lang['database_table_clickhere']?></a> <?php echo $_lang['database_table_clickbackup']?></p>
	            <p><input type="checkbox" name="droptables"><?php echo $_lang['database_table_droptablestatements']?></p>
	            <?php
	            }
	            ?>
	            <table class="db-list table">
		            <thead><tr>
			            <th class="table-name"><?php if ($backup_form) echo '<input type="checkbox" name="chkselall" onclick="selectAll()" title="Select All Tables" />'; echo $_lang['database_table_tablename']?></th>
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
                        $sql = 'SHOW TABLE STATUS FROM '.$this->dbase. ' LIKE \''.$modx->config['table_prefix'].'%\'';
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
	                             <td>
	                                '.($backup_form ? '<input type="checkbox" name="chk[]" value="'.$db_status['Name'].'"'.(strstr($table_string,$db_status['Name']) === false ? '' : ' checked="checked"').' />' : '').'
	                                <b style="color:#009933">'.$db_status['Name'].'</b>
	                             </td>
	                             <td class="table-data">'.$db_status['Rows'].'</td>
	                             <td class="table-data">'.$db_status['Engine'].'</td>';

	                        // Enable record deletion for certain tables (TRUNCATE TABLE) if they're not already empty
	                        $truncateable = array(
		                        $modx->getFullTableName('event_log'),
		                        $modx->getFullTableName('log_access'),   // should these three
		                        $modx->getFullTableName('log_hosts'),    // be deleted? - sirlancelot (2008-02-26)
		                        $modx->getFullTableName('log_visitors'), //
		                        $modx->getFullTableName('manager_log'),
	                            );
	                        if($modx->hasPermission('settings') && in_array($db_status['Name'], $truncateable) && $db_status['Rows'] > 0) {
		                        echo "\t\t\t\t".'<td dir="ltr" class="table-data">'.
		                             '<a href="index.php?a=54&amp;mode='.$a.'&amp;u='.$db_status['Name'].'" title="'.$_lang['truncate_table'].'">'.$this->nicesize($db_status['Data_length']+$db_status['Data_free']).'</a>'.
		                             '</td>'."\n";
	                        } else {
		                        echo "\t\t\t\t".'<td dir="ltr" class="table-data">'.$this->nicesize($db_status['Data_length']+$db_status['Data_free']).'</td>'."\n";
	                        }

	                        if($modx->hasPermission('settings')) {
		                        echo "\t\t\t\t".'<td class="table-data">'.($db_status['Data_free'] > 0 ?
		                             '<a href="index.php?a=54&amp;mode='.$a.'&amp;t='.$db_status['Name'].'" title="'.$_lang['optimize_table'].'">'.$this->nicesize($db_status['Data_free']).'</a>' :
		                             '-').
		                             '</td>'."\n";
	                        } else {
		                        echo '<td class="table-data">'.($db_status['Data_free'] > 0 ? $this->nicesize($db_status['Data_free']) : '-').'</td>'."\n";
	                        }

	                        echo "\t\t\t\t".'<td dir="ltr" class="table-data">'.$this->nicesize($db_status['Data_length']-$db_status['Data_free']).'</td>'."\n".
	                             "\t\t\t\t".'<td dir="ltr" class="table-data">'.$this->nicesize($db_status['Index_length']).'</td>'."\n".
	                             "\t\t\t\t".'<td dir="ltr" class="table-data">'.$this->nicesize($db_status['Index_length']+$db_status['Data_length']+$db_status['Data_free']).'</td>'."\n".
	                             "\t\t\t</tr>";

	                        $total = $total+$db_status['Index_length']+$db_status['Data_length'];
	                        $totaloverhead = $totaloverhead+$db_status['Data_free'];
                        }
                        ?>

                        <tr class="db-totals">
	                        <td><b><?php echo $_lang['database_table_totals']?></b></td>
	                        <td colspan="3">&nbsp;</td>
	                        <td dir="ltr" class="table-data"><?php echo $totaloverhead>0 ? '<b style="color:#990033">'.$this->nicesize($totaloverhead).'</b><br />('.number_format($totaloverhead).' B)' : '-'?></td>
	                        <td colspan="2">&nbsp;</td>
	                        <td dir="ltr" class="table-data"><?php echo "<b>".$this->nicesize($total)."</b><br />(".number_format($total)." B)"?></td>
                        </tr>
                    </tbody>
                </table>
                <?php
                if ($totaloverhead > 0) {
                    echo '<p>'.$_lang['database_overhead'].'</p>';
                }
                
            if ($backup_form) echo
            '</form>';
            ?>
        </div>
        <?php
        }
    }
