$(document).ready (function() {


	var txtstyle = $("#txtStyle");
	var editstyle = $("#editStyle");


    // add style
	$("#btnSubmit").click(function(){
		$("#form-style").on("submit",false);

		var success = 1;

		//validate style 
		if($("#txtStyle").val()==""){
			$("#txtStyleError").html("This field is required");
			$("#txtStyle").addClass("form-error");

			$("#txtStyle").focus(function(){
				$("#txtStyleError").html("");
				$("#txtStyle").removeClass("form-error");
			});
			success--;
		}	else {
				$("#txtStyleError").html("");
        }
        
        if(success==1){
			$.ajax({
				type:"POST",
				data:({
					style: txtstyle.val()
					
					
				}),
				url: "php/insert-style.php",
				success: function(result){
					$("#modalAddStyle").modal("hide");
					$("#form-style")[0].reset();
					swal ({
						title: "Success", 
						type:  "success", 
					}, function (){	
					$("#form-style").hide();
					$("#tblStyle").DataTable().ajax.reload();
					})
				}
			})
		}
    });

    // EDIT STYLE
    $(document).on("click","#btnEditt", function(){
		
        // GET ATTRIBUTES
        styleid=$(this).attr("styleid");
        stylename=$(this).attr("stylename");
        
		
        // SET VALUE
        $("#editStyle").val(stylename);
        // SET ID TO BUTTON UPDATE
        $("#btnUpdate").attr("styleid",styleid);
    
    });

    // UPDATE STYLE

    $("#btnUpdate").click(function(){
        
        styleid=$(this).attr("styleid");

		var success = 1;

		//validate rate name
		if($("#editStyle").val()==""){
			$("#editStyleError").html("This field is required");
			$("#editStyle").addClass("form-error");

			$("#editStyle").focus(function(){
				$("#editStyleError").html("");
				$("#editStyle").removeClass("form-error");
			});
			success--;
		}	else {
				$("#editStyleError").html("");
        }
        
        if(success==1){
			$.ajax({
				type:"POST",
				data:({
                    stylename: editstyle.val(),
                    styleid: styleid
				}),          
                url: "php/update-style.php",
                success: function(result){
						
                    $("#modalEditStyle").modal("hide");
                    $("#form-stylee")[0].reset();
                    swal ({
                        title: "Success", 
                        type:  "success", 
                    }, function (){	
                    $("#form-stylee").hide();
                    $("#tblStyle").DataTable().ajax.reload();
					})
				}

			})
		}
	});

	$(document).on("click","#btnDelete", function(){
		// get the id of service from button attribute
		var styleid = $(this).attr("styleid");
		

		swal({
            title: "Delete Massage Style?",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-warning",
            confirmButtonText: "Confirm",
            closeOnConfirm: false
        }, function () {
            $.ajax({
                type: "POST",
                data: ({
                    styleid: styleid
                }),
                url: "php/delete-style.php",
                success: function(results) {
                    swal({
                        title: "Success",
                        type: "success",
                    }, function () {
                        $("#tblStyle").DataTable().ajax.reload();
                    });					
                }
            });
        });
	});
});