$(document).ready (function() {
    
	//DATA TABLE   
	$("#tblUser").DataTable({
		'paging'      : true,
		'lengthChange': false,
		'searching'   : true,
		'ordering'    : true,
		'info'        : false,
		'autoWidth'   : false,
		'responsive'  : true,
		"processing"  : true,
		"ajax"        : "php/fetch-user.php",
	});

	//DATA TABLE   
	$("#tblBranch").DataTable({
		'paging'      : true,
		'lengthChange': false,
		'searching'   : true,
		'ordering'    : true,
		'info'        : false,
		'autoWidth'   : false,
		'responsive'  : true,
		"processing"  : true,
		"ajax"        : "php/fetch-branch.php",
	});

	//DATA TABLE   
	$("#tblService").DataTable({
		'paging'      : true,
		'lengthChange': false,
		'searching'   : true,
		'ordering'    : true,
		'info'        : false,
		'autoWidth'   : false,
		'responsive'  : true,
		"processing"  : true,
		"ajax"        : "php/fetch-service.php",
	});

	//DATA TABLE   
	$("#tblAddons").DataTable({
		'paging'      : true,
		'lengthChange': false,
		'searching'   : true,
		'ordering'    : true,
		'info'        : false,
		'autoWidth'   : false,
		'responsive'  : true,
		"processing"  : true,
		"ajax"        : "php/fetch-addons.php",
	});

	//DATA TABLE   
	$("#tblRate").DataTable({
		'paging'      : true,
		'lengthChange': false,
		'searching'   : true,
		'ordering'    : true,
		'info'        : false,
		'autoWidth'   : false,
		'responsive'  : true,
		"processing"  : true,
		"ajax"        : "php/fetch-rate.php",
	});

	//DATA TABLE   
	$("#tblStyle").DataTable({
		'paging'      : true,
		'lengthChange': false,
		'searching'   : true,
		'ordering'    : true,
		'info'        : false,
		'autoWidth'   : false,
		'responsive'  : true,
		"processing"  : true,
		"ajax"        : "php/fetch-style.php",
	});
	
	

	




	
});