<?php

	require_once("../../config/connectdb.php");

	//variable
	$row = array();

	try{
		$conn = new PDO($dsn, $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "SELECT rateid, rate, rateprice from rate";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		foreach ($stmt	as $user)
		{

			$rateid = $user["rateid"];
			$rate = $user["rate"];
			$rateprice = $user["rateprice"];
			
			
			$row[0] = $rate;
            $row[1] = "₱ " . $rateprice;
            
							

			$row[2] = "<button class='btn btn-xs btn-primary btn-table' id='btnEdit' rateid='".$rateid."' rate='".$rate."' rateprice='".$rateprice."' data-toggle='modal' data-target='#modalEditRate'>Edit</button>";
					  
                      

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