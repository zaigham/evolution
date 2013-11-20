<?php
if(!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE != 'true') exit();

if(!$modx->hasPermission('settings')) {
    $e->setError(3);
    $e->dumpError();
}

// Self-reference this module
$self_href = $_SERVER['PHP_SELF']."?a={$_REQUEST['a']}";

// Check cURL is enabled
if (!in_array('curl', get_loaded_extensions())) {
    $e->setError(120, 'PHP cURL extension is required to use the Package manager');
    $e->dumpError();
}

// Repos - hardcoded for now. Third party repos to be supported later.
$repos = array(array(
                'name'=>'ClipperCMS Extras Repo',
                'tags_feed'=>'http://www.clippercms.com/extras/tags-xml-feed',
                'repo_feed'=>'http://www.clippercms.com/extras/repo-xml-feed'));

if (isset($_POST['verbose']) && $_POST['verbose'] == '1') {
    $_SESSION['PM_settings']['verbose'] = 1;
} elseif (isset($_POST['verbose']) && $_POST['verbose'] == '0') {
    $_SESSION['PM_settings']['verbose'] = 0;
} elseif (!isset($_SESSION['PM_settings']['verbose'])) {
    $_SESSION['PM_settings']['verbose'] = 0;
}

require_once('pm/package_manager.class.php');
require_once('pm/package_manager.html.php');

$refresh_pm_cache = true; // <<<< Set to false after testing

$mode = 'start'; // start, repo-list, summarise, error, install

$output = $pkg_manager_html['header'];

if ((@$_GET['repo'] || $_GET['repo'] === '0') && ctype_digit($_GET['repo']) && $_GET['repo'] < sizeof($repos)) {

    $mode = 'repo-list';
    $repo_tag = (isset($_GET['tag']) && ctype_alpha($_GET['tag'])) ? $_GET['tag'] : null;
    $PM_cache_idx = $repo_tag ? $repo_tag : 0;

} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (@$_POST['pkg_url']) {

        $PM = new PackageManager($modx, $_POST['pkg_url']);
        $mode = 'summarise';

    } elseif (@$_POST['pkg_folder']) {

        $PM = new PackageManager($modx, $_POST['pkg_folder']);
        $mode = 'summarise';

    } elseif (isset($_FILES['pkg_file']) && $_FILES['pkg_file']['error'] != UPLOAD_ERR_NO_FILE) {

        switch($_FILES['pkg_file']['error']) {
            case UPLOAD_ERR_OK:
            
                if (is_uploaded_file($_FILES['pkg_file']['tmp_name'])) {
                    $PM = new PackageManager($modx, $_FILES['pkg_file']['tmp_name'], $_FILES['pkg_file']['name']);
                    $mode = 'summarise';
                } else {
                    $errmsg = $_lang['package_manager_error_internal'];
                }
                
                break;

            case UPLOAD_ERR_INI_SIZE:
                $errmsg = $_lang['package_manager_error_filesize'];
                break;

            default:
                $errmsg = $_lang['package_manager_error_internal'];
                break;
    
        }

    }  elseif (@$_POST['retry_file']) {
        
        $PM = unserialize($_SESSION['PM']);
        $PM = new $PM($modx, $PM->file, $PM->name); // 'reset' $PM and start again
        $mode = 'summarise';
        
    } elseif ($_POST['go'] == 'Install' || $_POST['go'] == 'Retry') {

        $PM = unserialize($_SESSION['PM']);
        $mode = 'install';
    }
}

if (@$errmsg) {
    $mode = 'error';
}

switch ($mode) {

    case 'repo-list':

        $output .= $pkg_manager_html['tabs_search_upload'].'<div id="tabSearch">';
        
        if ($refresh_pm_cache || !isset($_SESSION['PM_CACHE'][$_GET['repo']]['xml'][$PM_cache_idx])) {
            $cr = curl_init($repos[$_GET['repo']]['repo_feed'].(strpos($repos[$_GET['repo']]['repo_feed'], '?') === false ? '?' : '&').'cms='.CMS_NAME.'&cms_ver='.CMS_RELEASE_VERSION.($repo_tag ? '&tags='.$repo_tag : ''));
            curl_setopt($cr, CURLOPT_TIMEOUT, 4);
            curl_setopt($cr, CURLOPT_RETURNTRANSFER, true);
            $repo_xml = curl_exec($cr);
            if ($repo_xml) {
                $_SESSION['PM_CACHE'][$_GET['repo']]['xml'][$PM_cache_idx] = $repo_xml;
            } else {
                $output .= '<p class="error">'.htmlentities(curl_error($cr), ENT_QUOTES, $modx->config['charset']).'</p>';
            }
        }
        
        $doc = new DOMDocument();
        $doc->loadXML($_SESSION['PM_CACHE'][$_GET['repo']]['xml'][$PM_cache_idx]);
        $output_lis = '';
        foreach($doc->getElementsByTagName('item') as $item) {
            $name = $item->getElementsByTagName('name')->item(0)->nodeValue;
            $version = $item->getElementsByTagName('version')->item(0)->nodeValue;
            $link = $item->getElementsByTagName('link')->item(0)->nodeValue;
            $desc = $item->getElementsByTagName('desc')->item(0)->nodeValue;
            
            if ($repo_tag) {
                $output .= "<h3>$name $version</h3><p>Link: $link</p><p>$desc</p>";
                $output .= str_replace('[+link+]', $link, $pkg_manager_html['package_form']);
            } else {
                $output_lis .= '<li><label><input type="checkbox" name="package_url[]" value="'.htmlentities($link, ENT_QUOTES, $modx->config['charset'])."\">$name $version</label></li>";
            }
        }
        
        if (!$repo_tag) {
            $output .= str_replace('[+repo+]', $_GET['repo'], str_replace('[+lis+]', $output_lis, $pkg_manager_html['all_packages_form']));
        }
        
        $output .= '<p><a href="'.$self_href.'">'.$_lang['package_manager_restart'].'</a></p>';
        
        $output .= '</div>';
        $output .= $pkg_manager_html['form'];
        
        break;

    case 'start':
    case 'error':
    
        $output .= $pkg_manager_html['tabs_search_upload'].'<div id="tabSearch">';
        
        if ($mode == 'error') {
            $output .= $errmsg;
        }
        
        foreach($repos as $idx => $repo) {
        
            if ($refresh_pm_cache || !isset($_SESSION['PM_CACHE'][$idx]['tags'])) {
                $cr = curl_init($repo['tags_feed'].(strpos($repo['tags_feed'], '?') === false ? '?' : '&').'cms='.CMS_NAME.'&cms_ver='.CMS_RELEASE_VERSION);
                curl_setopt($cr, CURLOPT_TIMEOUT, 4);
                curl_setopt($cr, CURLOPT_RETURNTRANSFER, true);
                $tags_xml = curl_exec($cr);
                if ($tags_xml) {
                    $_SESSION['PM_CACHE'][$idx]['tags'] = $tags_xml;
                } else {
                    $output .= '<p class="error">Error fetching repo '.$repo['name'].'; '.htmlentities(curl_error($cr), ENT_QUOTES, $modx->config['charset']).'</p>';
                }
            }
            
            $doc = new DOMDocument();
            $doc->loadXML($_SESSION['PM_CACHE'][$idx]['tags']);
            $tags = $doc->getElementsByTagName('tag');
            
            if (sizeof($tags)) {
            
                $output .= '<h3>'.htmlentities($repo['name'], ENT_QUOTES, $modx->config['charset']).'</h3>';
                $output .= '<h4>'.$_lang['package_manager_tagsinrepo'].':</h4><ul id="pm-tag-list">';
                
                foreach($tags as $tag) {
                    $tagname = $tag->getElementsByTagName('name')->item(0)->nodeValue;
                    $output .= "<li><a href=\"{$self_href}&amp;repo={$idx}&amp;tag={$tagname}\">{$tagname}</a> (".$tag->getElementsByTagName('count')->item(0)->nodeValue.')</li>';
                }
                
                $output .= "<li><a href=\"{$self_href}&amp;repo={$idx}\">List all</a></li>";
                
                $output .= '</ul>';
            }
                
        }
        
        $output .= '</div>';
        $output .= $pkg_manager_html['form'];
        break;

    case 'summarise':
        $output .= $pkg_manager_html['tabs_install'].'<div id="tabInstall">';
        
        if (isset($PM) && $PM->haspackage && !$PM->is_error()) {
            $PM->summarise();
            if (!$PM->is_error()) {
                $output .= '<pre>'.htmlentities($PM->README, ENT_QUOTES, $modx->config['charset']).'</pre>';
                if ($_SESSION['PM_settings']['verbose']) {
                    $output .= $PM->summary;
                } else {
                    if (!$PM->README) $output .= 'Packaged retrieved.';
                }
                if ($PM->auto_install_code) {
                    $output .= $_lang['package_manager_autoinstall_html0'].$PM->auto_install_code.$_lang['package_manager_autoinstall_html1'];
                }
                $output .= $pkg_manager_html['confirm_form'];
            } else {
                if ($_SESSION['PM_settings']['verbose']) {
                    $output .= $PM->summary;
                }
                $errmsg = $PM->is_error() ? implode(', ', $PM->errors()) : 'Error during fetch process';
            }
        } else {
            $errmsg = $PM->is_error() ? implode(', ', $PM->errors()) : 'Error fetching, locating, or unzipping package file';
        }

        if ($errmsg) {
            $output .= '<p class="error">'.$PM->name.': '.$errmsg.'</p>';
            if ($PM->haspackage && $PM->perms_error()) {
                if (!$_SESSION['PM_settings']['verbose']) {
                    $output .= '<p>'.$_lang['package_manager_check_perms'].': '.implode(',', $PM->not_writables()).'</p>';
                }
                $output .= $pkg_manager_html['retry_file_form'];
            }
            $modx->logEvent(29,3,'Package Manager: '.$errmsg);
        }
        
        $output .= '</div>';
        
        $_SESSION['PM'] = serialize($PM);
        break;

    case 'install':
        $output .= $pkg_manager_html['tabs_install'].'<div id="tabInstall">';

        require_once($modx->config['base_path'].'manager/includes/log.class.inc.php');
        $lh = new logHandler();

        if (is_array($_POST['package_url'])) {
            // Quick-install of multiple packages.
            $to_install = $_POST['package_url'];
            $errs = false;
            foreach($_POST['package_url'] as $key=>$link) {
                $PM = new PackageManager($modx, $link);
                $PM->summarise();
                if ($PM->haspackage && !$PM->is_error()) {
                    $PM->install();
                    if (!$PM->is_error()) {
                        $output .= '<p>Success installing '.$PM->name.'!</p>';
                        $lh->initAndWriteLog('Installed Package', $modx->getLoginUserID(), $modx->getLoginUserName(), 76, null, $PM->name);
                        $to_install[$key] = null;
                    } else {
                        if ($_SESSION['PM_settings']['verbose']) {
                            $output .= $PM->install_summary;
                        }
                        $output .= '<p class="error">'.$link.': '.implode(', ', $PM->errors()).'</p>';
                        $errs = true;
                    }
                } else {
                    if ($_SESSION['PM_settings']['verbose']) {
                        $output .= $PM->summary;
                    }
                    $output .= '<p class="error">'.$link.': '.implode(', ', $PM->errors()).'</p>';
                    if (!$_SESSION['PM_settings']['verbose'] && $PM->perms_error()) {
                        $output .= '<p>'.$_lang['package_manager_check_perms'].': '.implode(',', $PM->not_writables()).'</p>';
                    }
                    $errs = true;
                }
            }

            $doc = new DOMDocument();
            $doc->loadXML($_SESSION['PM_CACHE'][$_POST['repo']]['xml'][0]);
            $output_lis = '';
            foreach($doc->getElementsByTagName('item') as $item) {
                $name = $item->getElementsByTagName('name')->item(0)->nodeValue;
                $version = $item->getElementsByTagName('version')->item(0)->nodeValue;
                $link = $item->getElementsByTagName('link')->item(0)->nodeValue;
                $desc = $item->getElementsByTagName('desc')->item(0)->nodeValue;
                $output_lis .= '<li><label><input type="checkbox" name="package_url[]" value="'.htmlentities($link, ENT_QUOTES, $modx->config['charset']).'"'.(in_array($link, $to_install) ? ' checked="checked"' : '')." />$name $version</label></li>";
            }
            $output .= str_replace('[+repo+]', $_POST['repo'], str_replace('[+lis+]', $output_lis, $pkg_manager_html[$errs ? 'retry_all_packages_form' : 'all_packages_form']));
        
        } else {
            // One package, already summarised.
            $PM->install();
            if ($_SESSION['PM_settings']['verbose']) {
                $output .= $PM->install_summary;
            }
            if (!$PM->is_error()) {
                $output .= '<p>Success installing '.$PM->name.'!</p>';
                $lh->initAndWriteLog('Installed Package', $modx->getLoginUserID(), $modx->getLoginUserName(), 76, null, $PM->name);
            } else {
                $output .= '<p class="error">'.implode(', ', $PM->errors()).'</p>';
            }
        }
        
        $output .= '</div>';

        break;

}

$output .= $pkg_manager_html['footer'];

echo $output;

