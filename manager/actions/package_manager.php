<?php
if(!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE != 'true') exit();
    
// Current MODx manager theme
$manager_theme_subpath = $modx->config['manager_theme'] ? $modx->config['manager_theme'].'/': '';

// Self-reference this module
$self_href = $_SERVER['PHP_SELF']."?a={$_REQUEST['a']}";

// Repos - hardcoded for now. Third party repos to be supported later.
$repos = array(array(
                'name'=>'ClipperCMS Extras Repo',
                'tags_feed'=>'http://www.clippercms.com/extras/tags-xml-feed',
                'repo_feed'=>'http://www.clippercms.com/extras/repo-xml-feed'));

require_once('pm/package_manager.class.php');
require_once('pm/package_manager.html.php');

$refresh_pm_cache = true; // <<<< Set to false after testing

$mode = 'start'; // start, repo-list, summarise, error, install

$output = $pkg_manager_html['header'];

if ((@$_GET['repo'] || $_GET['repo'] === '0') && ctype_digit($_GET['repo']) && $_GET['repo'] < sizeof($repos) && @$_GET['tag'] && ctype_alpha($_GET['tag'])) {

    $mode = 'repo-list';
    
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (@$_POST['pkg_url']) {

        $PM = new PackageManager($modx, $_POST['pkg_url']);
        $mode = 'summarise';

    } elseif (@$_POST['pkg_folder']) {
    
        $PM = new PackageManager($modx, $modx->config['base_path'].$_POST['pkg_folder']);
        $mode = 'summarise';
    
    } elseif (isset($_FILES['pkg_file']) && $_FILES['pkg_file']['error'] != UPLOAD_ERR_NO_FILE) {
    
        switch($_FILES['pkg_file']['error']) {
            case UPLOAD_ERR_OK:
            
                if (is_uploaded_file($_FILES['pkg_file']['tmp_name'])) {
                    $PM = new PackageManager($modx, $_FILES['pkg_file']['tmp_name'], $_FILES['pkg_file']['name']);
                    $mode = 'summarise';
                } else {
                    $errmsg = 'Internal error uploading. Please try again.';
                }
                
                break;

            case UPLOAD_ERR_INI_SIZE:
                $errmsg = 'Your server is not configured to accept files of this size. Contact your server administrator and ask for the maximum post and upload file sizes to be increased.';
                break;

            default:
                $errmsg = 'Internal error uploading. Please try again.';
                break;
    
        }

    }  elseif (@$_POST['retry_file']) {
        
        $PM = unserialize($_SESSION['PM']);
        $PM = new $PM($modx, $PM->file, $PM->name); // 'reset' $PM and start again
        $mode = 'summarise';
        
    } elseif ($_POST['go'] == 'Install') {

        $PM = unserialize($_SESSION['PM']);
        $mode = 'install';
    }
}

if (@$errmsg) {
    $output .= $errmsg;
    $mode = 'error';
}

switch ($mode) {

    case 'repo-list':
        if ($refresh_pm_cache || !isset($_SESSION['PM_CACHE'][$_GET['repo']]['xml'][$_GET['tag']])) {
            $cr = curl_init($repos[$_GET['repo']]['repo_feed'].(strpos($repos[$_GET['repo']]['repo_feed'], '?') === false ? '?' : '&').'tags='.$_GET['tag'].'&cms='.CMS_NAME.'&cms_ver='.CMS_RELEASE_VERSION);
            curl_setopt($cr, CURLOPT_TIMEOUT, 4);
            curl_setopt($cr, CURLOPT_RETURNTRANSFER, true);
            $repo_xml = curl_exec($cr);
            if ($repo_xml) {
                $_SESSION['PM_CACHE'][$_GET['repo']]['xml'][$tag] = $repo_xml;
            } else {
                $output .= '<p class="error">'.htmlentities(curl_error($cr), ENT_QUOTES, $modx->config['charset']).'</p>';
            }
        }
        
        $doc = new DOMDocument();
        $doc->loadXML($_SESSION['PM_CACHE'][$_GET['repo']]['xml'][$tag]);
        foreach($doc->getElementsByTagName('item') as $item) {
            $name = $item->getElementsByTagName('name')->item(0)->nodeValue;
            $link = $item->getElementsByTagName('link')->item(0)->nodeValue;
            $desc = $item->getElementsByTagName('desc')->item(0)->nodeValue;
            $output .= "<h3>$name</h3><p>Link: $link</p><p>$desc</p>";
            $output .= '<form action="'.$self_href.'" method="post"><fieldset><input type="hidden" name="pkg_url" value="'.$link.'" /><input type="submit" value="Get Package" /></fieldset></form>';
        }
        
        $output .= '<p><a href="'.$self_href.'">Return to Package Manager start</a></p>';
        
        break;

    case 'start':
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
                $output .= '<h4>Tags used in this repo:</h4><ul id="pm-tag-list">';
                
                foreach($tags as $tag) {
                    $tagname = $tag->getElementsByTagName('name')->item(0)->nodeValue;
                    $output .= "<li><a href=\"{$self_href}&amp;repo={$idx}&amp;tag={$tagname}\">{$tagname}</a> (".$tag->getElementsByTagName('count')->item(0)->nodeValue.')</li>';
                }
                
                $output .= '</ul>';
            }
                
        }
        
    case 'error':
        $output .= $pkg_manager_html['form'];
        break;

    case 'summarise':
        if (isset($PM) && $PM->haspackage && !$PM->is_error()) {
            $PM->summarise();
            if (!$PM->is_error()) {
                $output .= '<pre>'.htmlentities($PM->README, ENT_QUOTES, $modx->config['charset']).'</pre>';
                $output .= $PM->summary;
                if ($PM->auto_install_code) {
                    $output .= '<div><p><strong>Use the following plugin code for auto-installation during development.</strong> Attach to OnWebPageInit.</p><pre>'.$PM->auto_install_code.'</pre></div>';
                }
                $output .= $pkg_manager_html['confirm_form'];
            } else {
                $output .= $PM->summary;
                $errmsg = $PM->is_error() ? implode(', ', $PM->errors()) : 'Error during fetch process';
            }
        } else {
            $errmsg = $PM->is_error() ? implode(', ', $PM->errors()) : 'Error fetching, locating, or unzipping package file';
        }

        if ($errmsg) {
            $output .= '<p class="error">'.$errmsg.'</p>';
            if ($PM->haspackage && $PM->perms_error()) {
                $output .= $pkg_manager_html['retry_file_form'];
            }
            $modx->logEvent(29,3,'Package Manager: '.$errmsg);
        }
        
        $_SESSION['PM'] = serialize($PM);
        break;

    case 'install':
        require_once($modx->config['base_path'].'manager/includes/log.class.inc.php');
        $lh = new logHandler();
        $PM->install();
        $output .= $PM->install_summary;
        if (!$PM->is_error()) {
            $output .= '<p>Success installing '.$PM->name.'!</p>';
            $lh->initAndWriteLog('Installed Package', $modx->getLoginUserID(), $modx->getLoginUserName(), 76, null, $PM->name);
        } else {
            $output .= '<p class="error">'.implode(', ', $PM->errors()).'</p>';
        }
        break;
}

$output .= $pkg_manager_html['footer'];

echo $output;

