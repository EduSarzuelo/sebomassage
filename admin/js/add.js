$(document).ready (function() {

	//Additional Offers
	var txtaddname = $("#txtaddonname");
	var txtaddprice = $("#txtaddonprice");
	var editaddname = $("#editaddonname");
	var editaddprice = $("#editaddonprice");
	
	

	//ADDITIONAL OFFERS
$("#btnSubmitt").click(function(){
    $("#form-adds").on("submit",false);

    var success = 2;

    //validate additional offer name
    if($("#txtaddonname").val()==""){
        $("#txtaddonnameError").html("This field is required");
        $("#txtaddonname").addClass("form-error");

        $("#txtaddonname").focus(function(){
            $("#txtaddonnameError").html("");
            $("#txtaddonname").removeClass("form-error");
        });
        success--;
    }	else {
            $("#txtaddonnameError").html("");
    }

    //validate additional offer price
    if($("#txtaddonprice").val()==""){
        $("#txtaddonpriceError").html("This field is required");
        $("#txtaddonprice").addClass("form-error");

        $("#txtaddonprice").focus(function(){
            $("#txtaddonpriceError").html("");
            $("#txtaddonprice").removeClass("form-error");
        });
        success--;
    }	else {
            $("#txtaddonpriceError").html("");
    }


		

    if(success==2){
        $.ajax({
            type:"POST",
            data:({
                addname: txtaddname.val(),
                addprice: txtaddprice.val(),
                
            }),
            url: "php/insert-addons.php",
            success: function(result){
                $("#modalAddons").modal("hide");
                $("#form-adds")[0].reset();
                swal ({
                    title: "Success", 
                    type:  "success", 
                }, function (){	
                $("#form-adds").hide();
                $("#tblAddons").DataTable().ajax.reload();
                })
            }
        })
    }
	});
	
	
    // DELETE ADD ONS
	$(document).on("click","#btnDelete", function(){
		// get the id of service from button attribute
		var addid = $(this).attr("addid");
		var flag = 1;

		swal({
            title: "Are you sure you want to delete this add ons ?",
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
                    addid: addid
                }),
                url: "php/delete-additional.php",
                success: function(results) {
                    swal({
                        title: "Success",
                        type: "success",
                    }, function () {
                        $("#tblAddons").DataTable().ajax.reload();
                    });					
                }
            });
        });
    });
    

    // EDIT ADDITIONAL OFFERS
    $(document).on("click","#btnEdit", function(){
    
        // GET ATTRIBUTES
        addid=$(this).attr("addid");
        aname=$(this).attr("addname");
        aprice=$(this).attr("addprice");
        
        // SET VALUE
        $("#editaddonname").val(aname);
        $("#editaddonprice").val(aprice);
        // SET ID TO BUTTON UPDATE
        $("#btnUpdate").attr("addid",addid);
    
    });
        
        // UPDATE ADDITONAL OFFERS
    
    $("#btnUpdate").click(function(){
        $("#formupdate").on("submit",false);

        addid = $(this).attr("addid");
    
        var success = 2;
    
        //validate serivce name
        if($("#editaddonname").val()==""){
            $("#editaddonnameError").html("This field is required");
            $("#editaddonname").addClass("form-error");
    
            $("#editaddonname").focus(function(){
                $("#editaddonnameError").html("");
                $("#editaddonname").removeClass("form-error");
            });
            success--;
        }	else {
                $("#editaddonnameError").html("");
        }
    
        //validate price
        if($("#editaddonprice").val()==""){
            $("#editaddonpriceError").html("This field is required");
            $("#editaddonprice").addClass("form-error");
    
            $("#editaddonprice").focus(function(){
                $("#editaddonpriceError").html("");
                $("#editaddonprice").removeClass("form-error");
            });
            success--;
        }	else {
                $("#editaddonpriceError").html("");
        }
    
        if(success==2){
            $.ajax({
                type: "POST",
                data: ({
                    name: editaddname.val(),
                    price: editaddprice.val(),
                    addid: addid
                }),
                url: "php/update-addons.php",
                success: function(result) {
                    
                    $("#modaleditAddons").modal("hide");
                    $("#formupdate")[0].reset();
                    swal ({
                        title: "Success", 
                        type:  "success", 
                    }, function (){	
                        $("modal").hide("#formupdate");
                        $("#tblAddons").DataTable().ajax.reload();
                    });
                }
            });
		}
    });
	
	
});