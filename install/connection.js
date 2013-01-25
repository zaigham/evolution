jQuery(document).ready(function(){

    // get collation from the database server
    jQuery('#servertest').click(function(e) {

        var url = "connection.collation.php";

        jQuery('#collation').load(
        	url,
        	{
        		q:      url,
        		host:   document.getElementById('databasehost').value, 
            	uid:    document.getElementById('databaseloginname').value,
           	    pwd:    document.getElementById('databaseloginpassword').value,
            	database_collation: document.getElementById('database_collation').value,
                database_connection_method: document.getElementById('database_connection_method').value,
                language: language
            },
            function () {
				// get the server test status as soon as collation received
				var url = "connection.servertest.php";

				jQuery('#serverstatus').load(
					url,
					{
						q: url,
						host: document.getElementById('databasehost').value,
						uid: document.getElementById('databaseloginname').value,
						pwd: document.getElementById('databaseloginpassword').value,
						language: language
					},
					function () {
			 			if (!document.getElementById('server_fail')) jQuery('#setCollation').slideDown();
			 		}
				);
			});
            
        return false;
    });

    // database test
    jQuery('#databasetest').click(function() {

        var url = "connection.databasetest.php";

        host = document.getElementById('databasehost').value;
        uid = document.getElementById('databaseloginname').value;
        pwd = document.getElementById('databaseloginpassword').value;
        database_name = document.getElementById('database_name').value;
        tableprefix = document.getElementById('tableprefix').value;
        database_collation = document.getElementById('database_collation').value;
        database_connection_method = document.getElementById('database_connection_method').value;

		jQuery('#databasestatus').load(
			url,
			{
		        q: url,
		        host: host,
		        uid: uid,
		        pwd: pwd,
		        database_name: database_name,
		        tableprefix: tableprefix,
		        database_collation: database_collation,
		        database_connection_method: database_connection_method,
		        language: language,
		        installMode: installMode
		    },
		    function () {
				if(document.getElementById('database_pass') !== null && document.getElementById('AUH')) jQuery('#AUH').slideDown();
			}
		);
        
        return false;
    });

   
	jQuery('#setCollation').css('display', 'none');
	jQuery('#AUH').css('display', 'none');

});

