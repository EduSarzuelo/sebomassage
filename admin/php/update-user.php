<?php
	// connection to database
	require("../../config/connectdb.php");

    // get data from ajax
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$contact = $_POST["contact"];
	$uname = $_POST["uname"];
	$pword = ["pword"];	
	$userid = $_POST["userid"];

	// update data
	$conn = new PDO($dsn, $user, $pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "UPDATE users SET 
			firstname = :fname,
			lastname = :lname,
			contact = :contact,
			username = :uname,
			password = :pword
			WHERE userid = :userid";
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(':fname', $fname);
	$stmt->bindValue(':lname', $lname);
	$stmt->bindValue(':contact', $contact);
	$stmt->bindValue(':uname', $uname);
	$stmt->bindValue(':pword', $pword);
	$stmt->bindValue(':userid', $userid);
	$stmt->execute();

?>