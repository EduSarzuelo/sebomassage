<?php

	require_once("../../config/connectdb.php");

	//variable
	$row = array();

	try{
		$conn = new PDO($dsn, $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "SELECT styleid, stylename from massagestyle";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		foreach ($stmt	as $user)
		{

			$styleid = $user["styleid"];
			$stylename = $user["stylename"];
			
			
			
			$row[0] = $stylename;
            
            
							

			$row[1] = "<button class='btn btn-xs btn-primary btn-table' id='btnEditt' styleid='".$styleid."' stylename='".$stylename."' data-toggle='modal' data-target='#modalEditStyle'>Edit</button>"." ".
			"<button class='btn btn-xs btn-danger btn-table' id='btnDelete' styleid='".$styleid."'>Delete</button>";
			
					  
                      

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