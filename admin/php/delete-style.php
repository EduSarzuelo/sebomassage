<?php
	// connection to database
	require("../../config/connectdb.php");

	try {
        
        //get data froma ajax
		$styleid = $_POST["styleid"];
		

        //update flag 
		$conn = new PDO($dsn, $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM massagestyle WHERE styleid = :styleid";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':styleid', $styleid);
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