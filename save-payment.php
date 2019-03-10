<?php 
include("config/connectdb.php");

require 'app/start.php';

// get info padulong sa payments
$token = $_GET['token'];
$paymentId = $_GET['paymentId'];
$payerId = $_GET['PayerID'];

// get info padulong sa reservations
$fname = $_GET["fname"];
$lname = $_GET["lname"];
$contact = $_GET["contact"];
$date = $_GET["date"];
$time = $_GET["time"];
$hour = $_GET["hour"];
$therapist = $_GET["therapist"];
$room = $_GET["room"];
$service = $_GET["service"];
$style = $_GET["style"];
$add = $_GET["add"];
$branch = $_GET["branch"];
$type = $_GET["type"];

// reservation insert
$sql= "INSERT INTO reservations (firstname, lastname, number, 
        date, time, numberofhours, therapistid, roomid, serviceid, 
        massagestyle, addid, branchid, type) 
        VALUES 
        ('".$fname."', '".$lname."', ".$contact.", 
        '".$date."', '".$time."', ".$hour.", ".$therapist.", ".$room.",
        ".$service.", ".$style.", ".$add.", ".$branch.", ".$type.")";
    if (mysqli_query($con, $sql)) {

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }  

// payments insert
$name = $fname . " " . $lname;

$sql1= "INSERT INTO payments (name, paymentid, payerid, token) 
        VALUES 
        ('".$name."', '".$paymentId."', '".$payerId."', '".$token."')";
    if (mysqli_query($con, $sql1)) {
        $message = "Thank You, Your payment has been processed successfully. REMINDER!!!! Please come 15 minutes before your reservation.";
        echo "<script type='text/javascript'>alert('$message');window.location.href = 'index.php';</script>";
        // header("Location: index.php");
    } else {
        echo "Error: " . $sql1 . "<br>" . mysqli_error($con);
    }  
// $sql= "UPDATE reservations SET reservation_status = 1 where firstname = '$fname'
//     and lastname = '$lname' ";
// 


