<?php
	// connection to database
	require("../../config/connectdb.php");

    // get data from ajax
	$sname = $_POST["sname"];
	$sprice = $_POST["sprice"];	
	$serviceid = $_POST["serviceid"];

	// update data
	$conn = new PDO($dsn, $user, $pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "UPDATE services SET 
			service_name = :sname,
			price = :sprice
			WHERE serviceid = :serviceid";
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(':sname', $sname);
	$stmt->bindValue(':sprice', $sprice);
	$stmt->bindValue(':serviceid', $serviceid);

	$stmt->execute();

?>