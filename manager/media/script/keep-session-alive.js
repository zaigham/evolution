/*
 * Small script to keep session alive in MODx
 */
function keepMeAlive(imgName) {

	jQuery.ajax({
		url: 'includes/session_keepalive.php?tok=' + document.getElementById('sessTokenInput').value + '&o=' + Math.random(),
		type: 'get',
		success: function(sessionResponse){
			//TODO: {status:"ok"} is not valid json so we check for full string
			//TODO: update session_keepalive to return {"status":"ok"} once mootols is removed
			if(sessionResponse != '{status:"ok"}') {
                window.location.href = 'index.php?a=8';
            }
        }
	});
	
}
window.setInterval("keepMeAlive()", 1000 * 60);