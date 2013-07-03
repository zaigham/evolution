<?php
$pkg_manager_html['header'] =
'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="content-type" content="text/html;charset='.$modx->config['modx_charset'].'" />
	<meta name="language" content="en" />
	<title>Package Manager</title>
	<link rel="stylesheet" type="text/css" href="media/style/'.$manager_theme_subpath.'style.css" />
</head>
<body>
	<div class="sectionHeader">Package Manager</div>
	<div class="sectionBody">';
	
$pkg_manager_html['form'] =
'<form action="'.$self_href.'" method="post" style="margin: 20px 0" enctype="multipart/form-data">
	<fieldset>
		<label for="pkg_url">Upload a package by manually entering the URL</label>
		<input type="text" name="pkg_url" id="pkg_url" value="" />
	</fieldset>
	<fieldset>
		<label for="pkg_file">Manually upload a package file from your local machine</label>
		<input type="file" name="pkg_file" id="pkg_file">
	</fieldset>
	<fieldset>
		<label for="pkg_folder">Manually specify a package folder on the web server</label>
		<input type="text" name="pkg_folder" id="pkg_folder">
	</fieldset>
	<fieldset class="submit">
		<input type="submit" name="go" value="Upload" />
	</fieldset>
</form>';

$pkg_manager_html['retry_file_form'] =
'<form action="'.$self_href.'" method="post" style="margin: 20px 0" enctype="multipart/form-data">
	<fieldset class="submit">
	    <input type="hidden" name="retry_file" value="1" />
		<input type="submit" name="go" value="Retry" />
	</fieldset>
</form>';

$pkg_manager_html['confirm_form'] =
'<form action="'.$self_href.'" method="post" style="margin: 20px 0">
	<fieldset class="submit">
		<input type="submit" name="go" value="Install" />
	</fieldset>
</form>';


$pkg_manager_html['footer'] =
    '</div>
</body>
</html>';
