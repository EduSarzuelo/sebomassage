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
                    <h1> Dashboard </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- MAIN CONTENT -->
                <section class="content">

                    <!-- PANELS -->
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="panel bg-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-home fa-5x fa-icons"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"> <?php require("php/count-frontdesk.php"); ?>  </div>
                                            <div>Frontdesk Registered</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="user.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="panel bg-blue">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-users fa-5x fa-icons"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"> <?php require("php/count-vip.php"); ?>  </div>
                                            <div>VIP Registered</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="user.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>                      
                    </div>
                    <div class="row">
                        <div class = "col-md-6">
                            <div class="box box-info border-blue">
                                 <div class="box-header with-border">
                                    <h4>Branches</h4>
                                </div> 
                                <div class="box-body">
                                    <table id="tblBranch" class="table table-bordered table-hover table-custom">
                                        <thead>
                                            <tr>
                                                <th>Branch Name</th>
                                                <th>Address</th>  
                                                <th>Action</th> 
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="box-footer">
                                    <!-- <button class="btn btn-success" data-toggle="modal" data-target="#modalAddAdmin"> <span class="fa fa-md fa-plus"></span> Add Admin </button> -->
                                    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalAddBranch"> <span class="fa fa-md fa-home"></span> Add New Branch </button>
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

        <!-- ADD BRANCH MODAL -->
        <div class="modal fade" id="modalAddBranch" role="dialog">
            <div class="modal-dialog modal-md">
                <form id="form-branch">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"> &times; </button>
                            <h4 class="modal-title">Add New Branch</h4>   
                        </div>
                        <div class = "modal-body">
                            <div class="form-group">            
                                <label>Branch Name:</label>
                                <input type="text" class="form-control" id="txtBranchname" placeholder="Enter Branch name*">
                                <div class="error" id="txtBranchnameError"></div>
                            </div>
                            <div class="form-group">
                                <label>Branch Address:</label>
                                <input type="text" class="form-control" id="txtBranchaddress" placeholder="Enter Branch address*">
                                <div class="error" id="txtBranchaddressError"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="btnSubmit">Submit</button> 
                            <button type="button" class="btn btn-default" id="btnAddClose" data-dismiss="modal">Close</button>                                             
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- EDIT BRANCH MODAL -->
        <div class="modal fade" id="modalEditBranch" role="dialog">
            <div class="modal-dialog modal-md">
                <form id="form-branch">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"> &times; </button>
                            <h4 class="modal-title">Edit Branch</h4>   
                        </div>
                        <div class = "modal-body">
                            <div class="form-group">            
                                <label>Branch Name:</label>
                                <input type="text" class="form-control" id="editBranchname">
                                <div class="error" id="editBranchnameError"></div>
                            </div>
                            <div class="form-group">
                                <label>Branch Address:</label>
                                <input type="text" class="form-control" id="editBranchaddress">
                                <div class="error" id="editBranchaddressError"></div>
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

        <script src="js/branch.js"></script>
        <script src="js/datatable.js"></script>
        
        <!-- AdminLTE App -->
        <script src="../template/dist/js/adminlte.min.js"></script>    

    </body>
</html>