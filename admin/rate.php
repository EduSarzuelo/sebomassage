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
                        <li class="active">Rate</li>
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
                                    <table id="tblRate" class="table table-bordered table-hover table-custom">
                                        <thead>
                                            <tr>
                                                <!-- <th width="10%">ID</th> -->
                                                <th width="15%">Rate</th>
                                                <th width="15%">Rating</th>
                                                <th width="12%">Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="box-footer">
                                    <!-- <button class="btn btn-success" data-toggle="modal" data-target="#modalAddAdmin"> <span class="fa fa-md fa-plus"></span> Add Admin </button> -->
                                    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalAddRate"> Add Rate </button>
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
        

        <!-- ADD RATE MODAL -->
        <div class="modal fade" id="modalAddRate" role="dialog">
            <div class="modal-dialog modal-md">
                <form id="form-rate">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"> &times; </button>
                            <h4 class="modal-title">Add New Rate</h4>   
                        </div>
                        <div class = "modal-body">
                            <div class="form-group">            
                                <label>Rate Name:</label>
                                <input type="text" class="form-control" id="txtRate" placeholder="Enter rate name*">
                                <div class="error" id="txtRateError"></div>
                            </div>
                            <div class="form-group">
                                <label>Rate Price:</label>
                                <input type="text" class="form-control" id="txtRatep" placeholder="Enter rate price*">
                                <div class="error" id="txtRatepError"></div>
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
        
        <!-- EDIT RATE MODAL -->
        <div class="modal fade" id="modalEditRate" role="dialog">
            <div class="modal-dialog modal-md">
                <form id="form-rate">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"> &times; </button>
                            <h4 class="modal-title">Edit Rate</h4>   
                        </div>
                        <div class = "modal-body">
                            <div class="form-group">            
                                <label>Rate Name:</label>
                                <input type="text" class="form-control" id="editRate">
                                <div class="error" id="editRateError"></div>
                            </div>
                            <div class="form-group">
                                <label>Rate Price:</label>
                                <input type="text" class="form-control" id="editRatep">
                                <div class="error" id="editRatepError"></div>
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
        <script src="js/rate.js"></script>
        <script src="js/datatable.js"></script>

        <!-- AdminLTE App -->
        <script src="../template/dist/js/adminlte.min.js"></script>

    </body>
</html>