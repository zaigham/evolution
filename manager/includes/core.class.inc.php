<?php
/**
 * Core class
 * 
 * Contains everything required to run a db object
 */
class Core {

	public $queryTime = 0, $executedQueries = 0, $dumpSQL = false, $queryCode = '';
	public $db;

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
}
