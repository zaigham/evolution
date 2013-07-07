<?php
$pkg_manager_html['header'] =
'<div class="sectionHeader">'.$_lang['package_manager'].'</div>
<div class="sectionBody">';
	
$pkg_manager_html['form'] =
'<form action="'.$self_href.'" method="post" style="margin: 20px 0" enctype="multipart/form-data">
	<fieldset>
		<label for="pkg_url">'.$_lang['package_manager_upload_byurl_label'].'</label>
		<input type="text" name="pkg_url" id="pkg_url" value="" />
	</fieldset>
	<fieldset>
		<label for="pkg_file">'.$_lang['package_manager_upload_byfile_label'].'</label>
		<input type="file" name="pkg_file" id="pkg_file">
	</fieldset>
	<fieldset>
		<label for="pkg_folder">'.$_lang['package_manager_upload_byfolder_label'].'</label>
		<input type="text" name="pkg_folder" id="pkg_folder">
	</fieldset>
	<fieldset class="submit">
		<input type="submit" name="go" value="'.$_lang['package_manager_upload'].'" />
	</fieldset>
</form>';

$pkg_manager_html['retry_file_form'] =
'<form action="'.$self_href.'" method="post" style="margin: 20px 0" enctype="multipart/form-data">
	<fieldset class="submit">
	    <input type="hidden" name="retry_file" value="1" />
		<input type="submit" name="go" value="'.$_lang['package_manager_retry'].'" />
	</fieldset>
</form>';

$pkg_manager_html['confirm_form'] =
'<form action="'.$self_href.'" method="post" style="margin: 20px 0">
	<fieldset class="submit">
		<input type="submit" name="go" value="'.$_lang['package_manager_install'].'" />
	</fieldset>
</form>';


$pkg_manager_html['footer'] =
'</div>';

