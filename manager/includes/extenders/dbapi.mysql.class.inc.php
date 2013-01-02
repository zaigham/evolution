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
          return $this->conn = mysql_connect($host, $uid, $pwd);
    }

    protected function make_persistent_connection($host, $uid, $pwd) {
          return $this->conn = mysql_pconnect($host, $uid, $pwd, true);
    }

    protected function select_db($dbname) {
          return mysql_select_db($dbname, $this->conn);
    }

	// ----------
	// DISCONNECT
	// ----------

    public function disconnect() {
          @mysql_close($this->conn);
    }

	// ----------------
	// CLIPPERCMS DBAPI
	// ----------------

    public function getAffectedRows() {
        return mysql_affected_rows($this->conn);
    }

    public function getLastError() {
        return mysql_error($this->conn);
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
         return mysql_get_server_info();
    }
    
	// -------------------------------------------
	// LOW LEVEL RBDMS-SPECIFIC INTERNAL FUNCTIONS
	// -------------------------------------------

    protected function _escape($s) {
          return mysql_real_escape_string($s, $this->conn);
    }

    protected function _query($sql) {
        return mysql_query($sql, $this->conn);
    }

    protected function _recordcount($rs) {
        return mysql_num_rows($rs);
    }

    protected function _getRowAssoc($rs) {
          return mysql_fetch_assoc($rs);
    }

    protected function _getRowNumeric($rs) {
          return mysql_fetch_row($rs);
    }

    protected function _getRowBoth($rs) {
          return mysql_fetch_array($rs, MYSQL_BOTH);
    }

    protected function _getColumnNames($rs) {
        if ($rs) {
            $names = array ();
            $limit = mysql_num_fields($rs);
            for ($i = 0; $i < $limit; $i++) {
                $names[] = mysql_field_name($rs, $i);
            }
            return $names;
        }
    }

    protected function _getInsertId() {
        return mysql_insert_id($this->conn);
    }

}

