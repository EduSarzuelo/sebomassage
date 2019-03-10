$(document).ready (function() {

	var txtfname = $("#txtFirstname");
	var txtlname = $("#txtLastname");
	var txtcontact = $("#txtContact");
	var txtuname = $("#txtUsername");
	var txtpword = $("#txtPassword");
	var txtlocation = $("#selectLocation");
	var location;

	var editFirstname = $("#editFirstname");
	var editLastname = $("#editLastname");
	var editContact = $("#editContact");
	var editUsername = $("#editUsername");
	var editPassword = $("#editPassword");
	var editLocation = $("#editLocation");

	

	$("#selectLocation").change(function(){
		location = $("#selectLocation option:selected").attr("value");
		
	});
	
	$("#btnSubmit").click(function(){
		$("#form-user").on("submit",false);

		var success = 6;

		//validate first name
		if($("#txtFirstname").val()==""){
			$("#txtFirstnameError").html("This field is required");
			$("#txtFirstname").addClass("form-error");

			$("#txtFirstname").focus(function(){
				$("#txtFirstnameError").html("");
				$("#txtFirstname").removeClass("form-error");
			});
			success--;
		}	else {
				$("#txtFirstnameError").html("");
		}

		//validate last name
		if($("#txtLastname").val()==""){
			$("#txtLastError").html("This field is required");
			$("#txtLastname").addClass("form-error");

			$("#txtLastname").focus(function(){
				$("#txtLastError").html("");
				$("#txtLastname").removeClass("form-error");
			});
			success--;
		}	else {
				$("#txtLastError").html("");
		}

		//validate contact
		if($("#txtContact").val()==""){
			$("#txtContactError").html("This field is required");
			$("#txtContact").addClass("form-error");

			$("#txtContact").focus(function(){
				$("#txtContactError").html("");
				$("#txtContact").removeClass("form-error");
			});
			success--;
		}	else {
				$("#txtContactError").html("");
		}

		//validate username
		if($("#txtUsername").val()==""){
			$("#txtUsernameError").html("This field is required");
			$("#txtUsername").addClass("form-error");

			$("#txtUsername").focus(function(){
				$("#UsernameError").html("");
				$("#txtUsername").removeClass("form-error");
			});
			success--;
		}	else {
				$("#UsernameError").html("");
		}

		//validate password
		if($("#txtPassword").val()==""){
			$("#txtPasswordError").html("This field is required");
			$("#txtPassword").addClass("form-error");

			$("#txtPassword").focus(function(){
				$("#txtPasswordError").html("");
				$("#txtPassword").removeClass("form-error");
			});
			success--;
		}	else {
				$("#txtPasswordError").html("");
		}

		//validate location
		if($("#selectLocation option:selected").attr("value")=="0"){
			$("#selectLocationError").html("This field is required");
			$("#selectLocation").addClass("form-error");

			$("#selectLocation").focus(function(){
				$("#selectLocationError").html("");
				$("#selectLocation").removeClass("form-error");
			});
			success--;
		}	else {
				$("#selectLocationError").html("");
		}

		if(success==6){
			$.ajax({
				type:"POST",
				data:({
					fname: txtfname.val(),
					lname: txtlname.val(),
					contact: txtcontact.val(),
					uname: txtuname.val(),
					pword: txtpword.val(),
					location: location
				}),
				url: "php/insert-user.php",
				success: function(result){
					$("#modalAddUser").modal("hide");
					$("#form-user")[0].reset();
					swal ({
						title: "Success", 
						type:  "success", 
					}, function (){	
					$("#form-user").hide();
					$("#tblUser").DataTable().ajax.reload();
					})
				}
			})
		}
	});

	// DELETE USER
	$(document).on("click","#btnDelete", function(){
		// get the id of user from button attribute
		var userid = $(this).attr("userid");
		var flag = 1;

		swal({
            title: "Are you sure you want to delete this user ?",
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
                    userid: userid
                }),
                url: "php/delete-user.php",
                success: function(results) {
                    swal({
                        title: "Success",
                        type: "success",
                    }, function () {
                        $("#tblUser").DataTable().ajax.reload();
                    });					
                }
            });
        });
	});

	// EDIT USEr
    $(document).on("click","#btnEdit", function(){
		
        // GET ATTRIBUTES
        userid=$(this).attr("userid");
        fname=$(this).attr("fname");
		lname=$(this).attr("lname");
		contact=$(this).attr("contact");
		uname=$(this).attr("uname");
		pword=$(this).attr("pword");

		
        // SET VALUE
        $("#editFirstname").val(fname);
		$("#editLastname").val(lname);
		$("#editContact").val(contact);
		$("#editUsername").val(uname);
		$("#editPassword").val(pword);
		
        // SET ID TO BUTTON UPDATE
        $("#btnUpdate").attr("userid",userid);
    
	});
	
	 // UPDATE SERVICE

	 $("#btnUpdate").click(function(){
        
        userid=$(this).attr("userid");

		var success = 5;

		//validate first name
		if($("#editFirstname").val()==""){
			$("#editFirstnameError").html("This field is required");
			$("#editFirstname").addClass("form-error");

			$("#editFirstname").focus(function(){
				$("#editFirstnameError").html("");
				$("#editFirstname").removeClass("form-error");
			});
			success--;
		}	else {
				$("#editFirstnameError").html("");
		}

		//validate last name
		if($("#editLastname").val()==""){
			$("#editLastnameError").html("This field is required");
			$("#editLastname").addClass("form-error");

			$("#editLastname").focus(function(){
				$("#editLastnameError").html("");
				$("#editLastname").removeClass("form-error");
			});
			success--;
		}	else {
				$("#editLastname").html("");
		}
		
		//validate contact
		if($("#editContact").val()==""){
			$("#editContactError").html("This field is required");
			$("#editContact").addClass("form-error");

			$("#editContact").focus(function(){
				$("#editContactError").html("");
				$("#editContact").removeClass("form-error");
			});
			success--;
		}	else {
				$("#editContact").html("");
		}

		//validate username
		if($("#editUsername").val()==""){
			$("#editUsernameError").html("This field is required");
			$("#editUsername").addClass("form-error");

			$("#editUsername").focus(function(){
				$("#editUsernameError").html("");
				$("#editUsername").removeClass("form-error");
			});
			success--;
		}	else {
				$("#editUsername").html("");
		}

		//validate password
		if($("#editPassword").val()==""){
			$("#editPasswordError").html("This field is required");
			$("#editPassword").addClass("form-error");

			$("#editPassword").focus(function(){
				$("#editPasswordError").html("");
				$("#editPassword").removeClass("form-error");
			});
			success--;
		}	else {
				$("#editPassword").html("");
		}

        if(success==5){
			$.ajax({
				type:"POST",
				data:({
					fname: editFirstname.val(),
					lname: editLastname.val(),
					contact: editContact.val(),
					uname: editUsername.val(),
					pword: editPassword.val(),
                    userid: userid
				}),          
                url: "php/update-user.php",
                success: function(result){
						
                    $("#modalEditUser").modal("hide");
                    $("#form-user")[0].reset();
                    swal ({
                        title: "Success", 
                        type:  "success", 
                    }, function (){	
                    $("#form-user").hide();
                    $("#tblUser").DataTable().ajax.reload();
					})
				}

			})
		}
	});

	// EDIT USEr
    $(document).on("click","#btnView", function(){
		
        // GET ATTRIBUTES
        userid=$(this).attr("userid");
        fname=$(this).attr("fname");
		lname=$(this).attr("lname");
		contact=$(this).attr("contact");
		uname=$(this).attr("uname");
		pword=$(this).attr("pword");
		
		
		
		// SET VALUE

        $("#ViewFirst").val(fname);
		$("#ViewLast").val(lname);
		$("#ViewContact").val(contact);
		$("#ViewUname").val(uname);
		$("#ViewPword").val(pword);
		
       
    
	});

});
