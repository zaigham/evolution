<?php
/**
 * Core class
 * 
 * Contains everything required to run a db object
 */
class Core {

    public $queryTime = 0, $executedQueries = 0, $dumpSQL = false, $queryCode = '';
    public $db;
    public $config;

    /**
     * Returns the current micro time
     *
     * @return float
     */
    function getMicroTime() {
        list ($usec, $sec)= explode(' ', microtime());
        return ((float) $usec + (float) $sec);
    }

    /**
     * Exits with error message
     * 
     * @param string $msg Default: unspecified error
     * @param string $query Default: Empty string
     * @param boolean $is_error Default: true
     * @param string $nr Default: Empty string
     * @param string $file Default: Empty string
     * @param string $source Default: Empty string
     * @param string $text Default: Empty string
     * @param string $line Default: Empty string
     * @return void
     */
    function messageQuit($msg= 'unspecified error', $query= '', $is_error= true, $nr= '', $file= '', $source= '', $text= '', $line= '') {
        exit("\n\n$msg\n\n$query");
    }
    
    /**
     * Returns the full table name based on db settings
     *
     * @param string $tbl Table name
     * @return string Table name with prefix and including db name
     */
    function getFullTableName($tbl) {
        return $this->db->config['dbase'] . ".`" . $this->db->config['table_prefix'] . $tbl . "`";
    }

    /**
     * Returns the table name based on db settings
     *
     * @param string $tbl Table name
     * @return string Table name with prefix
     */
    function getTableName($tbl) {
        return $this->db->config['table_prefix'].$tbl;
    }

    /**
     * Get system settings and user settings
     * 
     * @return void
     */
    function getSettings() {

        if (!is_array($this->config) || !sizeof($this->config)) {
        
            // System settings
            $rs = $this->db->select('setting_name, setting_value', $this->getFullTableName('system_settings'));
            while ($row = $this->db->getRow($rs)) {
                $this->config[$row['setting_name']] = $row['setting_value'];
            }

        $this->getUserSettings();            
            
        }
    }
    
    /**
     * Get user settings
     *
     * @return void
     */
    function getUserSettings() {
    
        // User settings
        $user_id = @$_SESSION['mgrInternalKey']; // Bypasses the normal API method. Not ideal, but unlikely to be an issue.
        if ($user_id) {
            $rs = $this->db->select('setting_name, setting_value', $this->getFullTableName('user_settings'), 'user='.$user_id);
            while ($row = $this->db->getRow($rs)) {
                $this->config[$row['setting_name']] = $row['setting_value'];
            }
        }
    }

}

