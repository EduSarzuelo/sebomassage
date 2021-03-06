<?php

	require_once("../../config/connectdb.php");

	//variable
	$row = array();

	try{
		$conn = new PDO($dsn, $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "SELECT * from services where flag = 0";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		foreach ($stmt	as $user)
		{

			$serviceid = $user["serviceid"];
			$sname = $user["service_name"];
			$sprice = $user["price"];
			
			
			$row[0] = $sname;
            $row[1] = "₱ " . $sprice;
            
							

			$row[2] = "<button class='btn btn-xs btn-primary btn-table' id='btnEdit' serviceid='".$serviceid."' sname='".$sname."' sprice='".$sprice."' data-toggle='modal' data-target='#modalEditService'>Edit</button>" .
					  "<button class='btn btn-xs btn-danger btn-table' id='btnDelete' serviceid='".$serviceid."' sname='".$sname."' sprice='".$sprice."' >Delete</button>";
                      

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