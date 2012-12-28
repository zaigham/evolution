<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>[+lang.RM_module_title+]</title>
		<link rel="stylesheet" type="text/css" href="media/style[+theme+]/style.css" />
		<link rel="stylesheet" type="text/css" href="media/style/[+theme+]/jquery-ui/jquery-ui-1.9.2.custom.min.css" />
		<script type="text/javascript" src="media/script/mootools/mootools.js"></script>
		<script type="text/javascript" src="media/script/mootools/moodx.js"></script>
		<script type="text/javascript" src="../assets/modules/resmanager/js/resmanager.js"></script>
		<script type="text/javascript">
			function loadTemplateVars(tplId) {
				$('tvloading').style.display = 'block';
				new Ajax('[+ajax.endpoint+]', {
					update: 'results',
					method: 'post',
					postBody: 'theme=[+theme+]&tplID=' + tplId,
					evalScripts: true,
					onComplete: function(r) {
						$('tvloading').style.display = 'none';
					}
				
				}).request();
			}
			
			function save() {
				document.newdocumentparent.submit();
			}	

			function setMoveValue(pId, pName) {
			  if (pId==0 || checkParentChildRelation(pId, pName)) {
				document.newdocumentparent.new_parent.value=pId;
				$('parentName').innerHTML = "Parent: <strong>" + pId + "</strong> (" + pName + ")";
			  }
			}

			function checkParentChildRelation(pId, pName) {
				var sp;
				var id = document.newdocumentparent.id.value;
				var tdoc = parent.tree.document;
				var pn = (tdoc.getElementById) ? tdoc.getElementById("node"+pId) : tdoc.all["node"+pId];
				if (!pn) return;
					while (pn.p>0) {
						pn = (tdoc.getElementById) ? tdoc.getElementById("node"+pn.p) : tdoc.all["node"+pn.p];
						if (pn.id.substr(4)==id) {
							alert("Illegal Parent");
							return;
						}
					}
				
				return true;
			}
		</script>
		
		<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="../assets/js/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script>
		<script src="../assets/js/jquery-ui-timepicker-addon.js" type="text/javascript"></script>
		
		<script type="text/javascript">
	
			$.noConflict();
			jQuery(document).ready(function($) {
			
				$('#date_pubdate, #date_unpubdate, #date_createdon, #date_editedon, input.DatePicker').datetimepicker({
					changeMonth: true,
					changeYear: true,
					yearRangeType: 'c-'+[+datepicker.year_range+]+':c+'+[+datepicker.year_range+],
					dateFormat: '[+date.format+]',
					timeFormat: '[+time.format+]'
				});
				
				$('input[id^=tv].DatePicker').live('focus', function(){
					$(this).datetimepicker({
						changeMonth: true,
						changeYear: true,
						yearRangeType: 'c-'+[+datepicker.year_range+]+':c+'+[+datepicker.year_range+],
						dateFormat: '[+date.format+]',
						timeFormat: '[+time.format+]'
					});
				});	
				
				$("#tabs").tabs();
			});
			
		</script>

	</head>
	<body>
		<h1>[+lang.RM_module_title+]</h1>
		<div id="actions">
			<ul class="actionButtons">
				<li id="Button1"><a href="#" onclick="document.location.href='index.php?a=106';"><img src="media/style[+theme+]/images/icons/stop.png" /> [+lang.RM_close+]</a></li>
			</ul>
		</div>		
		<div class="sectionHeader">[+lang.RM_action_title+]</div>
		<div class="sectionBody"> 
		
		<div id="tabs">
		
			<ul>
				<li><a href="#tabTemplates">[+lang.RM_change_template+]</a></li>
				<li><a href="#tabTemplateVariables">[+lang.RM_template_variables+]</a></li>
				<li><a href="#tabDocPermissions">[+lang.RM_doc_permissions+]</a></li>
				<li><a href="#tabSortMenu">[+lang.RM_sort_menu+]</a></li>
				<li><a href="#tabOther">[+lang.RM_other+]</a></li>
			</ul>
			
			<div id="tabTemplates">
				[+view.templates+]
			</div>
			
			<div id="tabTemplateVariables">
				[+view.templatevars+]
			</div>
			
			<div id="tabDocPermissions">
				[+view.documentgroups+]
			</div>
			
			<div id="tabSortMenu">
				[+view.sort+]
			</div>
			
			<div id="tabOther">
				[+view.misc+]
				[+view.changeauthors+]
			</div>
		</div>
		
	</div>
	[+view.documents+]
	</body>
</html>