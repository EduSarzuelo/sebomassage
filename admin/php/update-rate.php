<?php
	// connection to database
	require("../../config/connectdb.php");

    // get data from ajax
	$rate = $_POST["rate"];
	$rateprice = $_POST["ratep"];	
	$rateid = $_POST["rateid"];

	// update data
	$conn = new PDO($dsn, $user, $pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "UPDATE rate SET 
			rate = :rate,
			rateprice = :rateprice
			WHERE rateid = :rateid";
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(':rate', $rate);
	$stmt->bindValue(':rateprice', $rateprice);
	$stmt->bindValue(':rateid', $rateid);

	$stmt->execute();

?>