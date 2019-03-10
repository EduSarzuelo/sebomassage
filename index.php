<?php
    include("config/connectdb.php");
    session_start()
?>

<!DOCTYPE html>
<html lang = "en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name ="viewport" content="width=device-width, initial-scale=1">

        <title> Sebo Massage </title> 

            

        <!-- CSS  -->
        <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap/bootstrap-social.css">
        <link rel="stylesheet" href="css/font-awesome/font-awesome.min.css">
        <link rel="stylesheet" href="css/sweetalert/sweetalert.css"> 
        <link rel="stylesheet" href="css/animate/animate.css">
        <link rel="stylesheet" href="template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="css/scrollspy/scrolling-nav.css">
        <link rel="stylesheet" href="css/bootstrap-datepicker/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="css/bootstrap-timepicker/bootstrap-timepicker.min.css">

        <!-- CUSTOM CSS  -->
        <link href="css/main.css" rel="stylesheet">
        <link href="css/validation.css" rel="stylesheet">

        <!-- COOGLE FONTS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
            
    </head>
    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
        <!-- NAVIGATION  -->
        <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-toggle">
                        <span class="sr-only">Toggle navigation</span> 
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" style="margin-top: -28px; margin-left: -150px;" href="#page-top"><img src = "Images/Sebok.png" style="width: 280px; height: 125px;" alt="SEBO"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="nav-toggle">
                    <ul class="nav navbar-nav navbar-right">
                        <li class = "hidden"> <a class = "page-scroll" href="#page-top"></a>
                        <li> <a class = "page-scroll" href="#services">SERVICES</a></li>
                        <li> <a class = "page-scroll" href="#about">ABOUT US</a> </li>
                        <!-- <li> <a class = "page-scroll" href="#rate">RATES</a> </li> -->
                        <li> <a data-toggle="modal" data-target="#ModalLReserve">RESERVE NOW</a> </li>  
                        <!-- <li> <a class="btn btn-login" data-toggle="modal" data-target="#login-form">LOGIN</a> </li>   -->

                        <?php if (empty($_SESSION['uname']) && empty($_SESSION['pword'])) { ?> 
                                <li> <a class="btn btn-login" href="#" data-toggle="modal" data-target="#login-form">LOGIN</a> </li>
                        <?php } else if ($_SESSION['utype'] == 0) { ?>
                                <li> <a class="profile" href="admin/index.php"> <?php echo $_SESSION['uname'] ?> </a> </li>
                        <?php } else if ($_SESSION['utype'] == 1) { ?>
                                <li> <a class="profile" href="frontdesk/index.php"> <?php echo $_SESSION['uname'] ?> </a> </li>
                        <?php } else if ($_SESSION['utype'] == 2) { ?>
                                <li> <a class="profile" href="vip/index.php"> <?php echo $_SESSION['uname'] ?> </a> </li>
                        <?php }  ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>   
            <!-- /.container-fluid -->
        </nav>

        <!-- HEADER -->
        <header>
            <div class="head-parallax" data-parallax="scroll" data-image-src="Images/Bg.jpg" style="margin-top: 90px;" ></div>
            
        </header>

        <!-- SERVICES SECTION -->
        <section id="services">
            <div class="container-fluid container-light">
                <div class = "container">
                    <div class="row row-spacer">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading">SERVICES</h2>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-4">
                            <div class = "img-wrap wow zoomIn" data-wow-offset="100" data-wow-delay="0.5s">
                                <img style = "margin-left:-60px" src = "Images/FootMassage.jpg" >
                            </div>
                            <h4 class="section-title">Foot Massage</h4>
                            <p class="section-content">A regular foot massage along with reflexology helps in promoting physiological as well as physical health.</p>
                        </div>
                        <div class="col-md-4">
                            <div class = "img-wrap wow zoomIn" data-wow-offset="100" data-wow-delay="0.5s">
                                <img style = "margin-left:-120px" src = "Images/HeadMassage.jpg" >
                            </div>
                            <h4 class="section-title">Head Massage</h4>
                            <p class="section-content">To relax the mind and encourage circulation. Many times, tension is felt within the head and neck.</p>
                        </div>
                        <div class="col-md-4">
                            <div class = "img-wrap wow zoomIn" data-wow-offset="100" data-wow-delay="0.5s">
                                <img src = "Images/WBMassage.jpg">
                            </div>
                            <h4 class="section-title">Whole Body Massage</h4>
                            <p class="section-content">Usually includes your arms, legs, hands and feet, your neck and back, your stomach and buttocks.</p>
                        </div>
                    </div>
                </div>
            </div>
                <div class="container-fluid container-dark">
                <div class = "container">
                    <div class="row row-spacer">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading">MASSAGE STYLE</h2>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-4">
                            <div class = "img-wrap wow zoomIn" data-wow-offset="100" data-wow-delay="0.5s">
                                <img style = "margin-left:-60px" src = "Images/shiatsu.jpg" >
                            </div>
                            <h4 class="section-title">Shiatsu Massage</h4>
                            <p class="section-content">A regular foot massage along with reflexology helps in promoting physiological as well as physical health.</p>
                        </div>
                        <div class="col-md-4">
                            <div class = "img-wrap wow zoomIn" data-wow-offset="100" data-wow-delay="0.5s">
                                <img style = "margin-left:-120px" src = "Images/thai.jpg" >
                            </div>
                            <h4 class="section-title">Thai Massage</h4>
                            <p class="section-content">To relax the mind and encourage circulation. Many times, tension is felt within the head and neck.</p>
                        </div>
                        <div class="col-md-4">
                            <div class = "img-wrap wow zoomIn" data-wow-offset="100" data-wow-delay="0.5s">
                                <img src = "Images/swedish.jpg">
                            </div>
                            <h4 class="section-title">Swedish Massage</h4>
                            <p class="section-content">Usually includes your arms, legs, hands and feet, your neck and back, your stomach and buttocks.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid container-light">
                <div class = "container">
                    <div class="row row-spacer">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading">Specialty</h2>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class = "img-wrap wow zoomIn" data-wow-offset="100" data-wow-delay="0.5s">
                                <img style = "margin-left:-60px" src = "Images/Hot.jpg" >
                            </div>
                            <h4 class="section-title">Hot Stone</h4>
                            <p class="section-content">A stone massage is a massage that uses smooth, flat, and heated rocks placed at key points on the body.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- ABOUT SECTION -->
        <section id="about">
            <div class="container-fluid container-dark">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading">ABOUT US</h2>
                            <p>SEBO Massage started as a passion, a habit to get a massage every time the owners felt 
                            tired and stressed from work. It made them feel relaxed, they also believed that getting a 
                            massage has many benefits like lowers your blood pressure and promotes excellent blood flow. 
                            The owners being frequent travelers love to get massages everywhere they go thus collected 
                            bad and good experiences from different spas they went. The owners noticed that pampering 
                            themselves with massages has a huge impact in their budget, because of this they thought of 
                            opening their own massage spa to sustain their personal needs as well as for their friends 
                            needs who wants to mimic their lifestyle.</p>
                            <p>On June 28, 2010 at Matina Balusong, Mc Arthur Highway, Davao City, SEBO Massage opened
                             their first outlet with only 3 therapists, 5 beds and massage rates same with other spas.
                              The owners observed that the luxury of their massage serves only to the affluent market 
                              for the reason of excessive prices and because of this they overhauled everything from 
                              their pricing to operating hours.</p>
                              <p>Today, SEBO Massage now has 12 outlets in Davao City and Tagum City with more than a
                               hundred massage therapists from different background serving an average of no less than 
                               500 clients per day from all walks of life. SEBO Massage aims to be the fastest massage 
                               spa in the Philippines.</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>

        
        <!-- FOOTER -->
        <footer>
            <div class="container-fluid container-dark">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <ul class="list-inline social-buttons">
                                <li>
                                    <a href="https://www.facebook.com/"><i class="fa fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid container-foot">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h6 class="content">Anything you want</h6>
                            <h6 class="content">Copyright © 2018 Sebo Massage</h6>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        

        <!-- JQUERY -->
        <script src="js/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap/bootstrap.min.js"></script>

        <!-- PARALLAX -->
        <script src="js/parallax/parallax.min.js"></script>

        <!-- Bootstrap Datetimepicker-->
        <script src="js/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="js/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>

        <!-- Sweet Alert -->
        <script src="js/sweetalert/sweetalert.min.js"></script>
        
        <!-- DATATABLES -->
        <script src="template/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        
        <!-- <script src="js/landing-reservation.js"></script> -->

        <!-- JAVASCRIPTS -->
        <script src="js/login.js"></script>
        <script src="js/wow/wow.min.js"></script>
        <script> new WOW().init(); </script> 
        
        <!-- Scrolling Nav JavaScript -->
        <script src="js/scrollspy/jquery.easing.min.js"></script>
        <script src="js/scrollspy/scrolling-nav.js"></script>
    </body>
</html>

<!-- Login Modal -->
<div id="login-form" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <form>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Sign in to continue</h4>
                </div>
                <div class="modal-body">
                    <div class="login-form">
                        <div class="form-group">
                            <label for="txtUname"> Username:</label> 
                            <input type="email" class="form-control" id="txtUname" placeholder="Enter username">
                            <div class="error" id="txtUnameError"></div>
                        </div>
                        <div class="form-group">
                            <label for="txtPword">Password:</label>
                            <input type="password" class="form-control" id="txtPword" placeholder="Enter password">
                            <div class="error" id="txtPwordError"></div>
                        </div>
                        <div class="error" id="formError"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <buton type="submit" class="btn btn-login" id="btnLogin">log in</button>
                </div>
            </div>
        </form>

    </div>
</div>

<!-- Reservation MODAL -->
<div id="ModalLReserve" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content id="reserveForm"-->
        <form action="reservation-payment.php" method="POST" autocomplete="off">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Reservation</h4>
                </div>
                <div class="modal-body">
                    <div class="login-form">
                        <div class="form-group">
                            <label>First name:</label>
                            <input type="text" class="form-control" id="txtFirstname" name="fname" placeholder="Enter your first name*"required >
                            <div class="error" id="txtFirstnameError"></div>
                        </div>
                        <div class="form-group">
                            <label>Last name:</label>
                            <input type="text" class="form-control" id="txtLastname" name="lname" placeholder="Enter your last name*" required>
                            <div class="error" id="txtLastnameError"></div>
                        </div>
                        <div class="form-group">
                            <label>Contact Number:</label> 
                            <input type="number" class="form-control" id="txtContact" name="contact" placeholder="Enter Contact number*" required>
                            <div class="error" id="txtContactError"></div>
                        </div>
                        <div class="form-group">
                            <label>Date:</label> 
                            <input type="date" class="form-control" id="txtDate" name="date" placeholder="Enter Date*" data-date-format="MM d, yyyy" style="padding: 0px 5px 0px 5px !important;" required>
                            <div class="error" id="txtDateError"></div>
                        </div>
                        <div class="form-group">
                            <label>Time:</label> 
                            <input type="time" class="form-control" id="txtTime" name="time" placeholder="Enter Time*" style="padding: 0px 5px 0px 5px !important;" required>
                            <div class="error" id="txtTimeError"></div>
                        </div>
                        <div class="form-group">
                            <label>Number of Hour:</label> 
                            <select class="form-control" name="hour" id="selectHour" style="padding: 0px 5px 0px 5px !important;"> 
                                
                                 <?php
                                    for ($i=1;$i<=24;$i++){
                                        echo "<option value= '".$i."' > ".$i." </option>";
                                    }
                                ?>            
                            </select> 
                            <div class="error" id="selectHourError"></div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="txtTherapist" name="therapist" value="0">
                            <div class="error" id="txtTherapistError"></div>
                        </div>
                        <div class="form-group">
                            
                            <input type="hidden" class="form-control" id="txtRoom" name="room" value="0">
                            <div class="error" id="txtRoomError"></div>
                        </div>
                        <div class="form-group">
                            <label>Service:</label> 
                            <select class="form-control" id="selectService" name="service" style="padding: 0px 5px 0px 5px !important;"> 
                                
                                <?php require("php/fetch-rservice-option.php"); ?>
                            </select> 
                            <div class="error" id="selectServiceError"></div>
                        </div>
                        <div class="form-group">
                            <label>Service Style:</label> 
                            <select class="form-control" id="selectStyle" name="style" style="padding: 0px 5px 0px 5px !important;"> 
                                
                                <?php require("php/fetch-rstyle-option.php"); ?>
                            </select> 
                            <div class="error" id="selectStyleError"></div>
                        </div>   
                        <div class="form-group">
                            <label>Additional Offer:</label> 
                            <select class="form-control" id="selectAdd" name="add" style="padding: 0px 5px 0px 5px !important;" > 
                                
                                <?php require("php/fetch-radditional-option.php"); ?>
                            </select> 
                            <div class="error" id="selectAddError"></div>
                        </div>
                        <div class="form-group">
                            <label>Branch:</label>
                            <select class="form-control" id="selectBranch" name="branch" style="padding: 0px 5px 0px 5px !important;"> 
                            
                            <?php require("php/fetch-rbranch-option.php"); ?>
                            </select>
                            <div class="error" id="selectBranchError"></div>
                        </div>
                        <div class="form-group"> 
                            <input type="hidden" class="form-control" id="txtType" name="type" value="0">
                            <div class="error" id="txtTypeError"></div>
                        </div>
                        <div class="error" id="formError"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-reserve" data-toggle="modal" id="btnReserve" name="reserve">Reserve</button>
                </div>
            </div>
        </form>

    </div>
</div>
