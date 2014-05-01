$(document).ready(function() {
	$("#stime, #etime").datetimepicker({
		datepicker:false,
		format:'H:i'
	});

	$("#date").datetimepicker({
		timepicker: false,
		format: 'Y-m-d'
	});
})