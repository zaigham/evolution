<?php
if(IN_MANAGER_MODE!='true') exit();

if ($_SESSION['mgrRole'] == 1) {
	?>
	<div><p>See the <a target="_blank" href="help/api/index.html">API reference</a>.</p></div>
	<?php
}

