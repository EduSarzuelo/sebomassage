$(document).ready (function() {

	searchtallysheet("0000-00-00");
	//Additional Offers
	var txtdate = $("#txtDate");
	
	
	$(".btnPrint").hide();
	$("#btnClear").hide();
    
    $("#txtDate").datepicker();


    // $("#selectBranch").change(function(){
    //     branch = $("#selectBranch option:selected").attr("value");
        
    // });
    
    $("#btnSearch").click(function(){
		var success = 1;

		//validate date
		if($("#txtDate").val()==""){
			$("#txtDateError").html("This field is required");
			$("#txtDate").addClass("form-error");

			$("#txtDate").focus(function(){
				$("#txtDateError").html("");
				$("#txtDate").removeClass("form-error");
			});
			success--;
		}	else {
				$("#txtDateError").html("");
		}
    
        //validate branch
		// if($("#selectBranch option:selected").attr("value")=="0"){
		// 	$("#selectBranchError").html("This field is required");
		// 	$("#selectBranch").addClass("form-error");

		// 	$("#selectBranch").focus(function(){
		// 		$("#selectBranchError").html("");
		// 		$("#selectBranch").removeClass("form-error");
		// 	});
		// 	success--;
		// }	else {
		// 		$("#selectBranchError").html("");
        // }

        
        if(success==1) {
			
			searchtallysheet(txtdate.val());
			
			
		}
	});

	function searchtallysheet(txtdate) {
		
		// Datatable -> tblBlockedCandidates
		$('#tbltallysheet').DataTable().destroy();
		$(".btnPrint").slideDown();
		$("#btnClear").slideDown();
		$('#tbltallysheet').DataTable({
			// rowReorder: {
			// 	selector: 'td:nth-child(2)'
			// },
			"language": {
		        "emptyTable": "No data available"
		    },
			responsive: true,
			"processing": false,
			// "serverSide": true,
			"ajax": {
				"url": "php/search-commission.php",
				"data": {
					
					"date" : txtdate
				},
				"type": 'POST',
				error: function(error){
					console.log(error);
				}
			}

		});
	}

	$("#btnClear").click(function () {
       
        searchtallysheet("0000-00-00");
        $("#btnClear").hide();
		$(".btnPrint").slideUp();
		$("#form-tally")[0].reset();
		
       
	});
	
	$(".btnPrint").click(function () {
        $("#tbltallysheet").print({
            addGlobalStyles : true,
            stylesheet : null,
            rejectWindow : true,
            noPrintSelector : ".no-print",
            iframe : true,
            append : null,
            prepend : null,
            title: null,
        });
    });
});

