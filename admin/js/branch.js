$(document).ready (function() {

	var txtbname = $("#txtBranchname");
    var txtbadd= $("#txtBranchaddress");
    var editbname = $("#editBranchname");
    var editbadd = $("#editBranchaddress");

	$("#btnSubmit").click(function(){
		$("#form-branch").on("submit",false);

		var success = 2;

		//validate branch name
		if($("#txtBranchname").val()==""){
			$("#txtBranchnameError").html("This field is required");
			$("#txtBranchname").addClass("form-error");

			$("#txtBranchname").focus(function(){
				$("#txtBranchnameError").html("");
				$("#txtBranchname").removeClass("form-error");
			});
			success--;
		}	else {
				$("#txtBranchnameError").html("");
		}

		//validate branch address
		if($("#txtBranchaddress").val()==""){
			$("#txtBranchaddressError").html("This field is required");
			$("#txtBranchaddress").addClass("form-error");

			$("#txtBranchaddress").focus(function(){
				$("#txtBranchaddressError").html("");
				$("#txtBranchaddress").removeClass("form-error");
			});
			success--;
		}	else {
				$("#txtBranchaddressError").html("");
		}

		

		if(success==2){
			$.ajax({
				type:"POST",
				data:({
					bname: txtbname.val(),
					badd: txtbadd.val(),
					
				}),
				url: "php/insert-branch.php",
				success: function(result){
					$("#modalAddBranch").modal("hide");
					$("#form-branch")[0].reset();
					swal ({
						title: "Success", 
						type:  "success", 
					}, function (){	
					$("#form-branch").hide();
					$("#tblBranch").DataTable().ajax.reload();
					});
				}
			});
		}
    });
    
    // EDIT BRANCH

    $(document).on("click","#btnEdit", function(){

        // GET ATTRIBUTES
        bid=$(this).attr("bid");
        bname=$(this).attr("bname");
        badd=$(this).attr("badd");

        // SET VALUE
        $("#editBranchname").val(bname);
        $("#editBranchaddress").val(badd);

        // SET ID TO BUTTON UPDATE
        $("#btnUpdate").attr("bid",bid);
    
    });

    // UPDATE BRANCH
	$("#btnUpdate").click(function(){
        
        bid=$(this).attr("bid");

		var success = 2;

		//validate branch name
		if($("#editBranchname").val()==""){
			$("#editBranchnameError").html("This field is required");
			$("#editBranchname").addClass("form-error");

			$("#editBranchname").focus(function(){
				$("#editBranchnameError").html("");
				$("#editBranchname").removeClass("form-error");
			});
			success--;
		}	else {
				$("#editBranchnameError").html("");
		}

		//validate branch address
		if($("#editBranchaddress").val()==""){
			$("#editBranchaddressError").html("This field is required");
			$("#editBranchaddress").addClass("form-error");

			$("#editBranchaddress").focus(function(){
				$("#editBranchaddressError").html("");
				$("#editBranchaddress").removeClass("form-error");
			});
			success--;
		}	else {
				$("#editBranchaddressError").html("");
		}

        if(success==2){
			$.ajax({
				type:"POST",
				data:({
					bname: editbname.val(),
                    badd: editbadd.val(),
                    bid: bid
				}),          
                url: "php/update-branch.php",
                success: function(result){
                    $("#modalEditBranch").modal("hide");
                    // $("#form-branch")[0].reset();
                    swal({
                        title: "Success", 
                        type:  "success", 
                    }, function () {	
                    // $("#form-branch").hide();
                    $("#tblBranch").DataTable().ajax.reload();
					});
				}
			});
		}
    });
    
});
