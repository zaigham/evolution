<?php
$pkg_manager_html['header'] =
'<div class="sectionHeader">'.$_lang['package_manager'].'</div>
<div class="sectionBody">
    <div class="tab-pane" id="packagePane">
        <div id="package-tabs" class="js-tabs">
';

$pkg_manager_html['tabs_search_upload'] =
'<ul>
    <li><a href="#tabSearch">'.$_lang['package_manager_search'].'</a></li>
    <li><a href="#tabUpload">'.$_lang['package_manager_upload'].'</a></li>
</ul>';

$pkg_manager_html['tabs_install'] =
'<ul>
    <li><a href="#tabInstall">'.$_lang['package_manager_install'].'</a></li>
</ul>';
    
$pkg_manager_html['form'] =
'<form action="'.$self_href.'" method="post" style="margin: 20px 0" enctype="multipart/form-data">
        <table width="100%" border="0" >
            <tr>
                <th width="200"><label for="pkg_url">Upload from URL</label></th>
                <td align="left">
                    <input type="text" name="pkg_url" id="pkg_url" value="" />
                </td>
            </tr>
            <tr><td width="200"></td><td class="comment">'.$_lang['package_manager_upload_byurl_label'].'</td></tr>
            <tr><td colspan="2"><div class="split"></div></td></tr>
            
            <tr>
                <th width="200"><label for="pkg_file">Upload from localhost</label></th>
                <td align="left">
                    <input type="file" name="pkg_file" id="pkg_file">
                </td>
            </tr>
            <tr><td width="200"></td><td class="comment">'.$_lang['package_manager_upload_byfile_label'].'</td></tr>
            <tr><td colspan="2"><div class="split"></div></td></tr>

            <tr>
                <th width="200"><label for="pkg_folder">Upload from server</label></th>
                <td align="left">
                    <input type="text" name="pkg_folder" id="pkg_folder">
                </td>
            </tr>
            <tr><td width="200"></td><td class="comment">'.$_lang['package_manager_upload_byfolder_label'].'</td></tr>
            <tr><td colspan="2"><div class="split"></div></td></tr>

            <tr>
                <th width="200"><label>Upload mode</label></th>
                <td>
                    <fieldset class="settings">
                        <div>
                            <label><input type="radio" name="verbose" value="0"'.((!isset($_SESSION['PM_settings']['verbose']) || !$_SESSION['PM_settings']['verbose']) ? ' checked="checked"' : '').'>Quiet</label><br />
                            <label><input type="radio" name="verbose" value="1"'.((isset($_SESSION['PM_settings']['verbose']) && $_SESSION['PM_settings']['verbose']) ?' checked="checked"' : '').'>Verbose</label>
                        </div>
                    </fieldset>
                </td>
            </tr>
            <tr><td colspan="2"><div class="split"></div></td></tr>
            
            <tr>
                <td width="200"></td>
                <td>
                    <fieldset class="submit">
                        <input type="submit" name="go" value="'.$_lang['package_manager_upload'].'" />
                    </fieldset>
                </td>
            </tr>
        </table>
</form>';

$pkg_manager_html['package_form'] =
'<form action="'.$self_href.'" method="post">
    <fieldset>
        <div>
            <label><input type="radio" name="verbose" value="0"'.(!$_SESSION['PM_settings']['verbose'] ? ' checked="checked"' : '').'>Quiet</label>
            <label><input type="radio" name="verbose" value="1"'.($_SESSION['PM_settings']['verbose'] ?' checked="checked"' : '').'>Verbose</label>
        </div>
    </fieldset>
    <fieldset>
        <input type="hidden" name="pkg_url" value="[+link+]" />
        <input type="submit" value="'.$_lang['package_manager_fetchpackage'].'" />
    </fieldset>
</form>';

$pkg_manager_html['all_packages_form'] =
'<form action="'.$self_href.'" method="post">
    <fieldset>
        <ul id="repo-full-list">[+lis+]</ul>
    </fieldset>
    <fieldset class="submit">
        <input type="submit" name="go" value="'.$_lang['package_manager_install'].'" />
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
'</div><!-- close upload tab --></div> <!-- close tabs --></div><!-- tab-pane --></div>';

