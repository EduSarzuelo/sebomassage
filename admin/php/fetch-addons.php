<?php

	require_once("../../config/connectdb.php");

	//variable
	$row = array();

	try{
		$conn = new PDO($dsn, $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "SELECT * from additionals WHERE flag = 0 and price > 0";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		foreach ($stmt	as $user)
		{

			$addid = $user["addid"];
			$addname = $user["addname"];
			$addprice = $user["price"];
			
			
			$row[0] = $addname;
            $row[1] ="₱ " .  $addprice;
            

			$row[2] = "<button class='btn btn-xs btn-primary btn-table' id='btnEdit' addid='".$addid."' addname='".$addname."' addprice='".$addprice."' data-toggle='modal' data-target='#modaleditAddons'>Edit</button>".
					  "<button class='btn btn-xs btn-danger btn-table' id='btnDelete' addid='".$addid."' addname='".$addname."' addprice='".$addprice	."' >Delete</button>";

			$output['data'][] = $row;

		}

		echo json_encode($output);
	} 
	catch (PDOException $e)
	{
		echo 'PDO Exception Caught.';
		echo 'Error with the database: <br />';
		echo 'SQL Query: ', $sql;
		echo 'Error: ' . $e->getMessage();
	}
?>