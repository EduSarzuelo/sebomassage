<?php
	// connection to database
	require("../../config/connectdb.php");

    // get data from ajax
	$addname = $_POST["name"];
	$addprice = $_POST["price"];	
	$addid = $_POST["addid"];	

	// update data
	$conn = new PDO($dsn, $user, $pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "UPDATE additionals SET 
			addname = :addname,
			price = :addprice
			WHERE addid = :addid";
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(':addname', $addname);
	$stmt->bindValue(':addprice', $addprice);
	$stmt->bindValue(':addid', $addid);
	$stmt->execute();

?>