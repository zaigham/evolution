<?php
/*
* @package  Clipper SQL dumper forked from MySQLDumper by Dennis Mozes. 
* @version  1.0
* @license GNU/LGPL License: http://www.gnu.org/copyleft/lgpl.html
*/
class ClipperSqlDumper {

	private $_dbtables;
	private $_isDroptables;
	private $modx;

	function __construct($modx) {
		$this->modx = $modx;
		// Don't drop tables by default.
		$this->setDroptables(false);
	}

	function setDBtables($dbtables) {
		$this->_dbtables = $dbtables;
	}

	// If set to true, it will generate 'DROP TABLE IF EXISTS'-statements for each table.
	function setDroptables($state) {
		$this->_isDroptables = $state;
	}

	function isDroptables() {
		return $this->_isDroptables;
	}

	function createDump() {

		global $site_name,$full_appname;

		// Set line feed
		$lf = "\n";

		$tables = array();
		$createtable = array();
		
		$result = $this->modx->db->query('SHOW TABLES');
		while ($row = $this->modx->db->getRow($result, 'num')) {
			$tables[] = $row[0];
			$result2 = $this->modx->db->query("SHOW CREATE TABLE `{$row[0]}`");
			$row2 = $this->modx->db->getRow($result2);
			$createtable[$row[0]] = $row2['Create Table'];
		}

		// Set header
		$output = "#". $lf;
		$output .= "# ".addslashes($site_name)." Database Dump" . $lf;
		$output .= "# ".$full_appname.$lf;
		$output .= "# ". $lf;
		$output .= "# Host: " . $this->modx->db->getHostname() . $lf;
		$output .= "# Generation Time: " . date("M j, Y at H:i") . $lf;
		$output .= "# Server version: ". $this->modx->db->getVersion() . $lf;
		$output .= "# PHP Version: " . phpversion() . $lf;
		$output .= "# Database : `" . $this->modx->db->getDBname() . "`" . $lf;
		$output .= "#";

		// Generate dumptext for the tables.
		if (isset($this->_dbtables) && count($this->_dbtables)) {
			$this->_dbtables = implode(",",$this->_dbtables);
		} else {
			unset($this->_dbtables);
		}
		foreach ($tables as $tblval) {
			// check for selected table
			if(isset($this->_dbtables)) {
				if (strstr(",".$this->_dbtables.",",",$tblval,")===false) {
					continue;
				}
			}
			$output .= $lf . $lf . "# --------------------------------------------------------" . $lf . $lf;
			$output .= "#". $lf . "# Table structure for table `$tblval`" . $lf;
			$output .= "#" . $lf . $lf;
			// Generate DROP TABLE statement when client wants it to.
			if($this->isDroptables()) {
				$output .= "DROP TABLE IF EXISTS `$tblval`;" . $lf;
			}
			$output .= $createtable[$tblval].";" . $lf;
			$output .= $lf;
			$output .= "#". $lf . "# Dumping data for table `$tblval`". $lf . "#" . $lf;
			$result = $this->modx->db->query("SELECT * FROM `$tblval`");
			$rows = $this->modx->db->makeArray($result);
			foreach($rows as $row) {
				$insertdump = $lf;
				$insertdump .= "INSERT INTO `$tblval` VALUES (";
				foreach($row as $key => $value) {
					$value = addslashes($value);
					$value = str_replace("\n", '\\r\\n', $value);
					$value = str_replace("\r", '', $value);
					$insertdump .= "'$value',";
				}
				$output .= rtrim($insertdump,',') . ");";
			}
		}
	
	return $output;

	}
}

