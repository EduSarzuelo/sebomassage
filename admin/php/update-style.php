<?php
	// connection to database
	require("../../config/connectdb.php");

    // get data from ajax
	$stylename = $_POST["stylename"];	
	$styleid = $_POST["styleid"];

	// update data
	$conn = new PDO($dsn, $user, $pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "UPDATE massagestyle SET 
			stylename = :stylename
			WHERE styleid = :styleid";
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(':stylename', $stylename);
	$stmt->bindValue(':styleid', $styleid);

	$stmt->execute();

?>