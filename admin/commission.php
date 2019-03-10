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
        <link rel="stylesheet" href="../css/datatable/jquery.dataTables.min.css">
	    <link rel="stylesheet" href="../css/datatable/buttons.dataTables.min.css">
        <link rel="stylesheet" href="../css/sweetalert/sweetalert.css"> 
        <link rel="stylesheet" href="../template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="../template/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="../template/bower_components/bootstrap-daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="../template/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="../template/dist/css/skins/skin-green.min.css">

        <!-- Custom CSS  -->
        <link rel="stylesheet" href="css/main-admin.css">
        <link rel="stylesheet" href="css/view.css">
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
                    <h1> Reports </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Incomes</li>
                    </ol>
                </section>

                <!-- MAIN CONTENT -->
                <section class="content">
                    <form id="form-tally">
                        <div class="panel panel-default col-md-10 col-md-offset-1">
                            <div class="panel-heading">
                                <h4>Search Branch Incomes</h4>   
                            </div>
                            <div class ="panel-body">
                                <div class ="row">
                                    <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Date:</label> 
                                        <input class="form-control" id="txtDate" placeholder="Enter Date*" data-date-format="MM d, yyyy">
                                        <div class="error" id="txtDateError"></div>
                                    </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success pull-right" id="btnSearch" style="margin-left:10px; width:80px;"> Search </button> 
                                <button type="button" class="btn btn-default pull-right" id="btnClear" > Clear </button> 
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <div class = "col-md-10 col-md-offset-1">
                            <div class="box box-info border-blue">
                                 <div class="box-header with-border">
                                    <h4>Branch Incomes</h4>
                                </div> 
                                <div class="box-body">
                                    <table id="tbltallysheet" class="table table-bordered table-hover table-custom">
                                        <thead>
                                            <tr>
                                                <!-- <th width="10%">ID</th> -->
                                                <th>Branch Name</th>
                                                <th>Date</th>
                                                <th>Total sessions</th>                                              
                                                <th>Branch Income</th>
                                                
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="box-footer">
                                <button type="button" class="btn btn-primary pull-right btnPrint" style="margin:0 10px 10px 0"> <span class='fa fa-md fa-print'></span> Print </button>
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

            <!-- EXTEND MODAL -->
        <!-- <div class="modal fade" id="modalsearch" role="dialog">
            <div class="modal-dialog modal-md">
                <form id="form-search">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"> &times; </button>
                            <h4 class="modal-title">Search Tallysheet</h4>   
                        </div>
                        <div class = "modal-body">    
                            <div class="form-group">
                                <label>Select Branch:</label> 
                            <select class="form-control" id="selectBranch"> 
                                <option value="0" disabled selected hidden>Branch*</option>
                                <?php require("php/fetch-searchbranch-option.php"); ?>
                            </select> 
                            <div class="error" id="selectBranchError"></div>
                            </div>
                            <div class="form-group">
                                <label>Date:</label> 
                                <input class="form-control" id="txtDate" placeholder="Enter Date*" data-date-format="MM d, yyyy">
                                <div class="error" id="txtDateError"></div>
                            </div>               
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" id="btnSearchh">Search</button> 
                            <button type="button" class="btn btn-default" id="btnCancel" data-dismiss="modal">Cancel</button>                                             
                        </div>
                    </div>
                </form>
            </div>
        </div> -->

        <!-- jQuery library -->
        <script src="../js/jquery/jquery.min.js"></script>

        <!-- Bootstrap 3.3.7 -->
        <script src="../js/bootstrap/bootstrap.min.js"></script>

        <!-- Data Table -->
        <script src="../template/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        

        <!-- Date Picker -->
        <script src="../template/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

       <!-- Sweet Alert -->
       <script src="../js/sweetalert/sweetalert.min.js"></script>

       <!-- JQuery Print -->
       <script src="../js/print/jQuery.print.min.js"></script>
        
         <!-- Custom JS  -->
         <script src="js/commission.js"></script>
        <script src="js/datatable.js"></script>

        <!-- AdminLTE App -->
        <script src="../template/dist/js/adminlte.min.js"></script>    
    </body>
</html>

