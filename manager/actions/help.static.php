<?php
if(!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE != 'true') exit();

?>
<script type="text/javascript" src="media/script/tabpane.js"></script>

<h1><?php echo $_lang['help']; ?></h1>

<div class="sectionBody">
    <div class="tab-pane" id="resourcesPane">
        <script type="text/javascript">
            tpResources = new WebFXTabPane( document.getElementById( "resourcesPane" ), <?php echo $modx->config['remember_last_tab'] == 1 ? 'true' : 'false'; ?> );
        </script>
<?php
$help = array();
if ($handle = opendir(dirname(__FILE__).'/../help/templates')) {
    while (false !== ($file = readdir($handle))) {
        if ($file[0] != '.' && substr($file, -1) != '~') {
            $help[] = $file;
        }
    }
    closedir($handle);
}


natcasesort($help);

foreach($help as $k=>$v) {

    $helpname =  substr($v, 0, strrpos($v, '.'));

    $prefix = substr($helpname, 0, 2);
    if(is_numeric($prefix)) {
        $helpname =  substr($helpname, 2, strlen($helpname)-1 );
    }

    $helpname = str_replace('_', ' ', $helpname);
    
    // Get each template in turn
    // Note that if a template returns an empty string or just whitespace, it will be omitted and it's tab will not appear.
    // 		This means that if conditionals in the template result in no output, the template will be omitted entirely and
    //		provides a mechanism whereby, for example, only admins can get to see certain help files.
    ob_start();
    include(dirname(__FILE__)."/../help/templates/$v");
    $help_content = ob_get_clean();
    
    if (trim($help_content)) {
		echo '<div class="tab-page" id="tab'.$v.'Help">';
		echo '<h2 class="tab">'.$helpname.'</h2>';
		echo '<script type="text/javascript">tpResources.addTabPage( document.getElementById( "tab'.$v.'Help" ) );</script>';
		echo $help_content;
		echo '</div>';
	}
}
?>
    </div>
</div>

