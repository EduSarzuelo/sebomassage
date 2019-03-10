$(document).ready (function() {

	
	var txtrate = $("#txtRate");
    var txtratep= $("#txtRatep");

    var editrate = $("#editRate");
	var editratep = $("#editRatep");
    
    // add rate
	$("#btnSubmit").click(function(){
		$("#form-rate").on("submit",false);

		var success = 2;

		//validate rate 
		if($("#txtRate").val()==""){
			$("#txtRateError").html("This field is required");
			$("#txtRate").addClass("form-error");

			$("#txtRate").focus(function(){
				$("#txtRateError").html("");
				$("#txtRate").removeClass("form-error");
			});
			success--;
		}	else {
				$("#txtRateError").html("");
		}

		//validate rate price
		if($("#txtRatep").val()==""){
			$("#txtRatepError").html("This field is required");
			$("#txtRatep").addClass("form-error");

			$("#txtRatep").focus(function(){
				$("#txtRatepError").html("");
				$("#txtRatep").removeClass("form-error");
			});
			success--;
		}	else {
				$("#txtRatepError").html("");
		}

		

		if(success==2){
			$.ajax({
				type:"POST",
				data:({
					rate: txtrate.val(),
					rateprice: txtratep.val(),
					
				}),
				url: "php/insert-rate.php",
				success: function(result){
					$("#modalAddRate").modal("hide");
					$("#form-rate")[0].reset();
					swal ({
						title: "Success", 
						type:  "success", 
					}, function (){	
					$("#form-rate").hide();
					$("#tblRate").DataTable().ajax.reload();
					})
				}
			})
		}
    });
    
    // EDIT RATE
    $(document).on("click","#btnEdit", function(){
		
        // GET ATTRIBUTES
        rateid=$(this).attr("rateid");
        rate=$(this).attr("rate");
        rateprice=$(this).attr("rateprice");
		
        // SET VALUE
        $("#editRate").val(rate);
        $("#editRatep").val(rateprice);
        // SET ID TO BUTTON UPDATE
        $("#btnUpdate").attr("rateid",rateid);
    
    });

    // UPDATE RATE

    $("#btnUpdate").click(function(){
        
        rateid=$(this).attr("rateid");

		var success = 2;

		//validate rate name
		if($("#editRate").val()==""){
			$("#editRateError").html("This field is required");
			$("#editRate").addClass("form-error");

			$("#editRate").focus(function(){
				$("#editRateError").html("");
				$("#editRate").removeClass("form-error");
			});
			success--;
		}	else {
				$("#editRateError").html("");
		}

		//validate price
		if($("#editRatep").val()==""){
			$("#editRatepError").html("This field is required");
			$("#editRatep").addClass("form-error");

			$("#editRatep").focus(function(){
				$("#editRatepError").html("");
				$("#editRatep").removeClass("form-error");
			});
			success--;
		}	else {
				$("#editRatepError").html("");
		}

        if(success==2){
			$.ajax({
				type:"POST",
				data:({
					rate: editrate.val(),
                    ratep: editratep.val(),
                    rateid: rateid
				}),          
                url: "php/update-rate.php",
                success: function(result){
						
                    $("#modalEditRate").modal("hide");
                    $("#form-rate")[0].reset();
                    swal ({
                        title: "Success", 
                        type:  "success", 
                    }, function (){	
                    $("#form-rate").hide();
                    $("#tblRate").DataTable().ajax.reload();
					})
				}

			})
		}
	});
});