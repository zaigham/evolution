<?php
// Get the manager $_lang array
// ----------------------------

// Check that $manager_language is valid
if(!isset($manager_language) || !ctype_alnum(str_replace('_', '', str_replace('-', '', $manager_language))) || !file_exists(MODX_MANAGER_PATH."includes/lang/".$manager_language.".inc.php")) {
    $manager_language = 'english';
}

// Get the English fallbacks
$_lang = array();
require_once('lang/english.inc.php');

$length_eng_lang = count($_lang);

// Get non-English text
if($manager_language!='english' && file_exists(MODX_MANAGER_PATH.'includes/lang/'.$manager_language.'.inc.php')) {
    include_once 'lang/'.$manager_language.'.inc.php';
}

