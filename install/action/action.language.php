<?php
$_SESSION = array(); // reset if restarting install

$langs = array();
if( $handle = opendir('lang/') ) {
	while( false !== ( $file = readdir( $handle ) ) ) {
		if (substr($file, -8) == '.inc.php') $langs[] = substr($file, 0, -8);
	}
	closedir( $handle );
}
sort( $langs );
?>
<form name="install" id="install_form" action="index.php?action=mode" method="post">
    <h2>Choose language:&nbsp;&nbsp;
    <select name="language">
<?php
foreach ($langs as $language) {
	echo '<option value="' . $language . '"'. ( ($language == 'english') ? ' selected="selected"' : null ) .'>' . ucwords( $language ). '</option>'."\n";
}
?>
    </select></h2>
        <p class="buttonlinks">
            <a style="display:inline;" href="javascript:document.getElementById('install_form').submit();" title="<?php echo $_lang['begin']?>"><span><?php echo $_lang['btnnext_value']?></span></a>
        </p>
</form>
