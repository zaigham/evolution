<?php
if(!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE != 'true') exit();

// Get the manager $_lang array
// ----------------------------

// Check that $manager_language is valid
if(!isset($manager_language) || !ctype_alnum(str_replace('_', '', str_replace('-', '', $manager_language))) || !file_exists(MODX_MANAGER_PATH.'includes/lang/'.$manager_language.'.inc.php')) {
    $manager_language = 'english';
}

// Get the English fallbacks
$_lang = array();
require('lang/english.inc.php');
$length_eng_lang = count($_lang);

// Get non-English text
if ($manager_language != 'english') {
    require('lang/'.$manager_language.'.inc.php');
}

// Convert $_lang to modx_charset
convert_language_array($_lang, 'lang/english.inc.php', '_lang');

// Make manager charset match site charset to avoid editing issues
$modx_manager_charset = $modx->config['modx_charset'];


// include the country list language file
function get_manager_countries($manager_language) {
	// Check that $manager_language is valid (should be superfluous)
	if (empty($manager_language) || !is_string($manager_language) || !ctype_alnum(str_replace('_', '', str_replace('-', '', $manager_language))) || !file_exists(MODX_MANAGER_PATH.'includes/lang/country/'.$manager_language.'_country.inc.php')) {
		$manager_language = 'english';
	}
	$_country_lang = array();
	require('lang/country/english_country.inc.php');
	if ($manager_language != 'english') {
		require('lang/country/'.$manager_language.'_country.inc.php');
	}
	
	convert_language_array($_country_lang, 'lang/country/english_country.inc.php', '_country_lang');
	
	return $_country_lang;
}

// Convert encoding of language array
function convert_language_array(&$lang, $fallback, $fallback_var) {
	global $modx;
	if (isset($modx->config['modx_charset']) &&  $modx->config['modx_charset'] != 'UTF-8') {
		foreach($lang as $__k => $__v) {
		    $tmp = iconv('UTF-8', $modx->config['modx_charset'].'//TRANSLIT', $lang[$__k]);
		    if ($lang[$__k] == iconv($modx->config['modx_charset'], 'UTF-8//TRANSLIT', $tmp)) {
		        // No errors - conversion possible from UTF-8 to selected encoding
		        $lang[$__k] = $tmp;
		    } else {
		        // Errors - language file cannot be converted to selected encoding.
		        // Fallback to English as it can be shown in most character encodings, and thus minimises the risk of an unusable manager.
		        $lang = array();
		        require($fallback);
		        $lang = $$fallback_var;
		        break;
		    }
		}
	}
}

