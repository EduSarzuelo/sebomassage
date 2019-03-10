$(document).ready (function() {

	// Services
	var txtsname = $("#txtSname");
    var txtsprice= $("#txtSprice");
    var editsname = $("#editServicename");
	var editsprice = $("#editPrice");
	
	

	//SERVICES

	$("#btnSubmit").click(function(){
		$("#form-service").on("submit",false);

		var success = 2;

		//validate service name
		if($("#txtSname").val()==""){
			$("#txtSnameError").html("This field is required");
			$("#txtSname").addClass("form-error");

			$("#txtSname").focus(function(){
				$("#txtSnameError").html("");
				$("#txtSname").removeClass("form-error");
			});
			success--;
		}	else {
				$("#txtSnameError").html("");
		}

		//validate service price
		if($("#txtSprice").val()==""){
			$("#txtSpriceError").html("This field is required");
			$("#txtSprice").addClass("form-error");

			$("#txtSprice").focus(function(){
				$("#txtSpriceError").html("");
				$("#txtSprice").removeClass("form-error");
			});
			success--;
		}	else {
				$("#txtSpriceError").html("");
		}

		

		if(success==2){
			$.ajax({
				type:"POST",
				data:({
					sname: txtsname.val(),
					sprice: txtsprice.val(),
					
				}),
				url: "php/insert-service.php",
				success: function(result){
					
					$("#modalAddService").modal("hide");
					$("#form-service")[0].reset();
					swal ({
						title: "Success", 
						type:  "success", 
					}, function (){	
					$("#form-service").hide();
					$("#tblService").DataTable().ajax.reload();
					})
				}
			})
		}
	});
	
	// EDIT SERVICE
    $(document).on("click","#btnEdit", function(){
		
        // GET ATTRIBUTES
        serviceid=$(this).attr("serviceid");
        sname=$(this).attr("sname");
        sprice=$(this).attr("sprice");
		
        // SET VALUE
        $("#editServicename").val(sname);
        $("#editPrice").val(sprice);
        // SET ID TO BUTTON UPDATE
        $("#btnUpdate").attr("serviceid",serviceid);
    
    });
	
    // UPDATE SERVICE

    $("#btnUpdate").click(function(){
        
        bid=$(this).attr("bid");

		var success = 2;

		//validate serivce name
		if($("#editServicename").val()==""){
			$("#editServicenameError").html("This field is required");
			$("#editServicename").addClass("form-error");

			$("#editServicename").focus(function(){
				$("#editServicenameError").html("");
				$("#editServicename").removeClass("form-error");
			});
			success--;
		}	else {
				$("#editServicenameError").html("");
		}

		//validate price
		if($("#editPrice").val()==""){
			$("#editPriceError").html("This field is required");
			$("#editPrice").addClass("form-error");

			$("#editPrice").focus(function(){
				$("#editPriceError").html("");
				$("#editPrice").removeClass("form-error");
			});
			success--;
		}	else {
				$("#editPriceError").html("");
		}

        if(success==2){
			$.ajax({
				type:"POST",
				data:({
					sname: editsname.val(),
                    sprice: editsprice.val(),
                    serviceid: serviceid
				}),          
                url: "php/update-service.php",
                success: function(result){
						
                    $("#modalEditService").modal("hide");
                    $("#form-service")[0].reset();
                    swal ({
                        title: "Success", 
                        type:  "success", 
                    }, function (){	
                    $("#form-service").hide();
                    $("#tblService").DataTable().ajax.reload();
					})
				}

			})
		}
	});
	
	// DELETE SERVICE
	$(document).on("click","#btnDelete", function(){
		// get the id of service from button attribute
		var serviceid = $(this).attr("serviceid");
		var flag = 1;

		swal({
            title: "Are you sure you want to delete this service ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-warning",
            confirmButtonText: "Confirm",
            closeOnConfirm: false
        }, function () {
            $.ajax({
                type: "POST",
                data: ({
					flag: flag,
                    serviceid: serviceid
                }),
                url: "php/delete-service.php",
                success: function(results) {
                    swal({
                        title: "Success",
                        type: "success",
                    }, function () {
                        $("#tblService").DataTable().ajax.reload();
                    });					
                }
            });
        });
	});
	
});