<?php
	// connection to database
	require("../../config/connectdb.php");

	try {
        
        //get data froma ajax
		$userid = $_POST["userid"];
		$flag = $_POST["flag"];

        //update flag 
		$conn = new PDO($dsn, $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE users SET flag = :flag WHERE userid = :userid";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':flag', $flag);
        $stmt->bindValue(':userid', $userid);
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