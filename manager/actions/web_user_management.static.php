<?php
if(!defined('IN_MANAGER_MODE') || IN_MANAGER_MODE != 'true') exit();

if(!$modx->hasPermission('edit_web_user')) {
	$e->setError(3);
	$e->dumpError();
}

// initialize page view state - the $_PAGE object
$modx->manager->initPageViewState();

// get and save search string
if($_REQUEST['op']=='reset') {
	$query = '';
	$_PAGE['vs']['search']='';
}
else {
	$query = isset($_REQUEST['search'])? $_REQUEST['search']:$_PAGE['vs']['search'];
	$sqlQuery = $modx->db->escape($query);
	$_PAGE['vs']['search'] = $query;
}

// get & save listmode
$listmode = isset($_REQUEST['listmode']) ? $_REQUEST['listmode']:$_PAGE['vs']['lm'];
$_PAGE['vs']['lm'] = $listmode;

?>
<script>
  	function searchResource(){
		document.resource.op.value="srch";
		document.resource.submit();
	};

	function resetSearch(){
		document.resource.search.value = ''
		document.resource.op.value="reset";
		document.resource.submit();
	};

	function changeListMode(){
		var m = parseInt(document.resource.listmode.value) ? 1:0;
		if (m) document.resource.listmode.value=0;
		else document.resource.listmode.value=1;
		document.resource.submit();
	};
	
	
	var temp_lang = {
		//setup temp generic values used in js e.g. confirm_delete_user -> confirm_delete so we can use only one js function
		confirm_delete: '<?php echo $_lang['confirm_delete_user']; ?>'
	}
	
</script>
<form name="resource" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<input type="hidden" name="listmode" value="<?php echo $listmode; ?>" />
<input type="hidden" name="op" value="" />

<h1><?php echo $_lang['web_user_management_title']; ?></h1>

<div class="sectionBody">
	<p><?php echo $_lang['web_user_management_msg']; ?></p>
	<div class="searchbar">
		<table border="0" style="width:100%">
			<tr>
			<td><a class="searchtoolbarbtn" href="index.php?a=87"><img src="<?php echo $_style["icons_save"] ?>" /> <?php echo $_lang['new_web_user']; ?></a></td>
			<td nowrap="nowrap">
				<table border="0" style="float:right"><tr><td><?php echo $_lang["search"]; ?></td><td><input class="searchtext" name="search" type="text" size="15" value="<?php echo $query; ?>" /></td>
				<td><a href="#" class="searchbutton" title="<?php echo $_lang["search"];?>" onclick="searchResource();return false;"><?php echo $_lang["go"]; ?></a></td>
				<td><a href="#" class="searchbutton" title="<?php echo $_lang["reset"];?>" onclick="resetSearch();return false;"><img src="media/style/<?php echo $manager_theme ? "$manager_theme/":""; ?>images/icons/refresh.gif" width="16" height="16"/></a></td>
				<td><a href="#" class="searchbutton" title="<?php echo $_lang["list_mode"];?>" onclick="changeListMode();return false;"><img src="media/style/<?php echo $manager_theme ? "$manager_theme/":""; ?>images/icons/table.gif" width="16" height="16"/></a></td>
				</tr>
				</table>
			</td>
			</tr>
		</table>
	</div>

	<div>
	<?php
	
	if($modx->hasPermission('edit_user')){
		$usernameCol = "<a href='index.php?a=88&id=[+id+]' title='".$_lang["click_to_edit_title"]."'>[+username+]</a>";
	}else{
		$usernameCol = "[+value+]";
	}
	
	
	if($modx->hasPermission('delete_user')){
		$actionCol = "<a href='index.php?a=90&id=[+id+]' title='".$_lang['delete']."' class='js-confirm-delete'><img width='16' align='absmiddle' height='16' src='media/style/$manager_theme/images/icons/delete.png'></a>";
	}else{
		$actionCol = "<img width='16' align='absmiddle' height='16' src='media/style/$manager_theme/images/icons/delete.png' class='disabled-action'>";
	}
	

	$sql = "SELECT wu.id,wu.username,wua.fullname,wua.email,IF(wua.gender=1,'".$_lang['user_male']."',IF(wua.gender=2,'".$_lang['user_female']."','-')) as 'gender',IF(wua.blocked,'".$_lang['yes']."','-') as 'blocked'" .
			"FROM ".$modx->getFullTableName("web_users")." wu ".
			"INNER JOIN ".$modx->getFullTableName("web_user_attributes")." wua ON wua.internalKey=wu.id ".
			($sqlQuery ? " WHERE (wu.username LIKE '$sqlQuery%') OR (wua.fullname LIKE '%$sqlQuery%') OR (wua.email LIKE '$sqlQuery%')":"")." ".
			"ORDER BY username";
	$ds = $modx->db->query($sql);
	include_once $base_path."manager/includes/controls/datagrid.class.php";
	$grd = new DataGrid('',$ds,$number_of_results); // set page size to 0 t show all items
	$grd->noRecordMsg = $_lang["no_records_found"];
	$grd->cssClass="grid";
	$grd->columnHeaderClass="gridHeader";
	$grd->itemClass="gridItem";
	$grd->altItemClass="gridAltItem";
	$grd->fields="id,username,fullname,email,gender,blocked";
	$grd->columns=$_lang["icon"]." ,".$_lang["name"]." ,".$_lang["user_full_name"]." ,".$_lang["email"]." ,".$_lang["user_gender"]." ,".$_lang["user_block"].','. $_lang['actions'];
	$grd->colWidths="34,,,,40,34,100";
	$grd->colAligns="center,,,,center,center,left";
	$grd->colTypes="template:<img src='media/style/$manager_theme/images/icons/user.gif' width='18' height='18' />||template:".$usernameCol."||template:[+fullname+]||template:[+email+]||template:[+gender+]||template:[+blocked+]||template:". $actionCol;
	if($listmode=='1') $grd->pageSize=0;
	if($_REQUEST['op']=='reset') $grd->pageNumber = 1;
	// render grid
	echo $grd->render();
	?>
	</div>
</div>
</form>
