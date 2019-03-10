<?php
	// connection to database
	require("../../config/connectdb.php");

    // get data from ajax
	$bname = $_POST["bname"];
	$badd = $_POST["badd"];	
	$bid = $_POST["bid"];

	// update data
	$conn = new PDO($dsn, $user, $pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "UPDATE branches SET 
			branch_name = :bname,
			branch_address = :badd
			WHERE branchid = :bid";
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(':bname', $bname);
	$stmt->bindValue(':badd', $badd);
	$stmt->bindValue(':bid', $bid);

	$stmt->execute();

?>