<?php
	// connection to database
	require("../../config/connectdb.php");

	try {
        
        //get data froma ajax
		$addid = $_POST["addid"];
		$flag = $_POST["flag"];

        //update flag 
		$conn = new PDO($dsn, $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE additionals SET flag = :flag WHERE addid = :addid";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':flag', $flag);
        $stmt->bindValue(':addid', $addid);
        $stmt->execute();
	
	}
	catch (PDOException $e)
	{
		echo 'PDO Exception Caught.';
		echo 'Error with the database: <br />';
		echo 'SQL Query: ', $sql;
		echo 'Error: ' . $e->getMessage();
	}
?>