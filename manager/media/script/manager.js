$(document).ready(function($) {
	
	$('#dob').datepicker({
		changeMonth: true,
		changeYear: true,
		yearRangeType: 'c-90:c+90',
		dateFormat: config.date_format
	});
	
	if($('#blockeduntil').length) {
		$( '#blockeduntil, #blockedafter').datetimepicker({
			changeMonth: true,
			changeYear: true,
			yearRangeType: 'c-'+config.datepicker_year_range+':c+'+config.datepicker_year_range,
			dateFormat: config.date_format,
			timeFormat: config.time_format
		});
	}
	
	$( '#pub_date, #unpub_date, input[id^="tv"].DatePicker').datetimepicker({
		changeMonth: true,
		changeYear: true,
		yearRangeType: 'c-'+config.datepicker_year_range+':c+'+config.datepicker_year_range,
		dateFormat: config.date_format,
		timeFormat: config.time_format
	});
	
	$("#tabs" ).tabs({
		collapsible: true
	});

});