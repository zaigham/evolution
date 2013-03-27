<?php
require_once('dbapi.abstract.class.inc.php');

class DBAPI extends DBAPI_abstract {

    public $conn;
    public $config;
    public $isConnected;
    
    protected $parent; // Usually the $modx global
    
    protected $host, $dbase; // Holds host and db name if connected.

	// -----
	// SETUP 
	// -----

    protected function initDataTypes() {
        $this->dataTypes['numeric'] = array (
            'INT',
            'INTEGER',
            'TINYINT',
            'BOOLEAN',
            'DECIMAL',
            'DEC',
            'NUMERIC',
            'FLOAT',
            'DOUBLE PRECISION',
            'REAL',
            'SMALLINT',
            'MEDIUMINT',
            'BIGINT',
            'BIT'
        );
        $this->dataTypes['string'] = array (
            'CHAR',
            'VARCHAR',
            'BINARY',
            'VARBINARY',
            'TINYBLOB',
            'BLOB',
            'MEDIUMBLOB',
            'LONGBLOB',
            'TINYTEXT',
            'TEXT',
            'MEDIUMTEXT',
            'LONGTEXT',
            'ENUM',
            'SET'
        );
        $this->dataTypes['date'] = array (
            'DATE',
            'DATETIME',
            'TIMESTAMP',
            'TIME',
            'YEAR'
        );
    }

	// -------
	// CONNECT
	// -------

    protected function make_connection($host, $uid, $pwd) {
          return $this->conn = mysqli_connect($host, $uid, $pwd);
    }

    protected function make_persistent_connection($host, $uid, $pwd) {
          return $this->conn = mysqli_connect('p:'.$host, $uid, $pwd);
    }

    protected function set_charset($charset) {
        return mysqli_set_charset($this->conn, $charset);
    }

    protected function select_db($dbname) {
          return mysqli_select_db($this->conn, $dbname);
    }

	// ----------
	// DISCONNECT
	// ----------

    public function disconnect() {
          @mysqli_close($this->conn);
    }

	// ----------------
	// CLIPPERCMS DBAPI
	// ----------------

    public function getAffectedRows() {
        return mysqli_affected_rows($this->conn);
    }

    public function getLastError($return_number = false) {
		if ($return_number) {
		  	$err = mysqli_errno($this->conn);
		} else {
		  	$err = mysqli_error($this->conn);
		}
        return $err;
    }

    public function getTableMetaData($table) {
        $metadata = false;
        if (!empty ($table)) {
            $sql = "SHOW FIELDS FROM $table";
            if ($ds = $this->query($sql)) {
                while ($row = $this->getRow($ds)) {
                    $fieldName = $row['Field'];
                    $metadata[$fieldName] = $row;
                }
            }
        }
        return $metadata;
    }

    public function getVersion() {
         return mysqli_get_server_info($this->conn);
    }
    
    public function is_handle($var) {
    	return is_object($var);
    }
    
    public function freeResult($rs) {
        mysqli_free_result($rs);
    }
    
    public function tables_present($prefix) {
    	return (bool)$this->getValue("SELECT COUNT(*) FROM information_schema.tables
                                 WHERE `table_schema` = '{$this->dbase}' AND `table_name` = '{$prefix}site_content'");
    }

    public function table_engine($table) {
    	return $this->getValue('SELECT ENGINE FROM information_schema.TABLES where TABLE_SCHEMA = \''.$this->dbase.'\'');
    }

	// -------------------------------------------
	// LOW LEVEL RBDMS-SPECIFIC INTERNAL FUNCTIONS
	// -------------------------------------------

    protected function _escape($s) {
          return mysqli_real_escape_string($this->conn, $s);
    }

    protected function _query($sql) {
        return mysqli_query($this->conn, $sql);
    }

    protected function _recordcount($rs) {
        return mysqli_num_rows($rs);
    }

    protected function _getRowAssoc($rs) {
          return mysqli_fetch_assoc($rs);
    }

    protected function _getRowNumeric($rs) {
          return mysqli_fetch_row($rs);
    }

    protected function _getRowBoth($rs) {
          return mysqli_fetch_array($rs, MYSQLI_BOTH);
    }

    protected function _getColumnNames($rs) {
        if ($rs) {
        	$fields = mysqli_fetch_fields($rs);
            $names = array ();
            foreach($fields as $field) {
            	$names[] = $field->name;
            }
            return $names;
        }
    }

    protected function _getInsertId() {
        return mysqli_insert_id($this->conn);
    }

}

