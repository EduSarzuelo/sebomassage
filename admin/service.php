<?php
    include("../config/connectdb.php");

    session_start();
    if (empty($_SESSION['uid'])) {header('location: ../index.php');}
?>
<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <title>Dashboard - Sebo Massage</title>

        <link rel="icon" type="image/ico" href="../Images/logo2.png">

        <!-- CSS -->
        <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="../css/font-awesome/font-awesome.min.css">
        <link rel="stylesheet" href="../css/sweetalert/sweetalert.css"> 
        <link rel="stylesheet" href="../template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="../template/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="../template/dist/css/skins/skin-green.min.css">

        <!-- Custom CSS  -->
        <link rel="stylesheet" href="css/main-admin.css">
        <link rel="stylesheet" href="css/validation.css">

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
                    
    </head>
    <body class="hold-transition skin-green sidebar-mini fixed">

        <div class="wrapper">
            
            <?php
                include("../includes/navbar.php");  //TOP NAVIGATION
                include("../includes/sidebar.php"); //SIDEBAR NAVIGATION
            ?>

            <!-- CONTENT -->
            <div class="content-wrapper">
                <section class="content-header">
                    <h3> Admin Management</h3>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Services</li>
                    </ol>
                </section>
                <!-- MAIN CONTENT -->
                <section class="content">

                    <div class="row">
                        <div class = "col-md-12">
                            <div class="box box-info border-blue">
                                 <div class="box-header with-border">
                                    <h4>User Panel</h4>
                                </div> 
                                <div class="box-body">
                                    <table id="tblService" class="table table-bordered table-hover table-custom">
                                        <thead>
                                            <tr>
                                                <!-- <th width="10%">ID</th> -->
                                                <th width="15%">Service name:</th>
                                                <th width="15%">Service price:</th>
                                                <th width="12%">Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="box-footer">
                                    <!-- <button class="btn btn-success" data-toggle="modal" data-target="#modalAddAdmin"> <span class="fa fa-md fa-plus"></span> Add Admin </button> -->
                                    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalAddService"> <span class="fa fa-md fa-file"></span> Add New Service </button>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </section>
            </div>


            <!-- FOOTER -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <span>Anything you want</span>
                </div>
                <strong>Copyright &copy; 2018 <a href="#">Sebo Massage</a>.</strong> All rights reserved.
            </footer>
        </div>
        
        <!-- ADD SERVICE MODAL -->
        <div class="modal fade" id="modalAddService" role="dialog">
            <div class="modal-dialog modal-md">
                <form id="form-service">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"> &times; </button>
                            <h4 class="modal-title">Add New Service</h4>   
                        </div>
                        <div class = "modal-body">
                            <div class="form-group">            
                                <label>Service name:</label>
                                <input type="text" class="form-control" id="txtSname" placeholder="Enter service name*">
                                <div class="error" id="txtSnameError"></div>
                            </div>
                            <div class="form-group">
                                <label>Price:</label>
                                <input type="text" class="form-control" id="txtSprice" placeholder="Enter price*">
                                <div class="error" id="txtSpriceError"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="btnSubmit">Add</button> 
                            <button type="button" class="btn btn-default" id="btnAddClose" data-dismiss="modal">Close</button>                                             
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- EDIT SERVICE MODAL -->
        <div class="modal fade" id="modalEditService" role="dialog">
            <div class="modal-dialog modal-md">
                <form id="form-service">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"> &times; </button>
                            <h4 class="modal-title">Edit Service</h4>   
                        </div>
                        <div class = "modal-body">
                            <div class="form-group">            
                                <label>Service Name:</label>
                                <input type="text" class="form-control" id="editServicename">
                                <div class="error" id="editServicenameError"></div>
                            </div>
                            <div class="form-group">
                                <label>Price:</label>
                                <input type="text" class="form-control" id="editPrice">
                                <div class="error" id="editPriceError"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" id="btnUpdate">Update</button> 
                            <button type="button" class="btn btn-default" id="btnCancel" data-dismiss="modal">Cancel</button>                                             
                        </div>
                    </div>
                </form>
            </div>
        </div>

        
        <!-- VIEW SERVICE MODAL -->
        <div class="modal fade" id="modalViewService" role="dialog">
            <div class="modal-dialog modal-md">
                <form id="form-service">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"> &times; </button>
                            <h4 class="modal-title">Edit Service</h4>   
                        </div>
                        <div class = "modal-body">
                            <div class="form-group">            
                                <label>Service Name:</label>
                                <input type="text" class="form-control" id="editServicename">
                                <div class="error" id="editServicenameError"></div>
                            </div>
                            <div class="form-group">
                                <label>Price:</label>
                                <input type="text" class="form-control" id="editPrice">
                                <div class="error" id="editPriceError"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" id="btnCancel" data-dismiss="modal">Cancel</button>                                             
                        </div>
                    </div>
                </form>
            </div>
        </div>

        

        
        
    
        <!-- jQuery library -->
        <script src="../js/jquery/jquery.min.js"></script>

        <!-- Bootstrap 3.3.7 -->
        <script src="../js/bootstrap/bootstrap.min.js"></script>

        <!-- Data Table -->
        <script src="../template/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

        <!-- Sweet Alert -->
        <script src="../js/sweetalert/sweetalert.min.js"></script>

         <!-- Custom JS  -->
        <script src="js/service.js"></script>
        <script src="js/datatable.js"></script>

        <!-- AdminLTE App -->
        <script src="../template/dist/js/adminlte.min.js"></script>

    </body>
</html>