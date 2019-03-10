<?php

	require_once("../../config/connectdb.php");

	//variable
	$row = array();

	try{
		$conn = new PDO($dsn, $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "SELECT * from branches";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		foreach ($stmt	as $user)
		{

			$bid = $user["branchid"];
			$bname = $user["branch_name"];
			$badd = $user["branch_address"];
			
			
			$row[0] = $bname;
            $row[1] = $badd;

			$row[2] = "<button class='btn btn-xs btn-primary btn-table' id='btnEdit' bid='".$bid."' bname='".$bname."' badd='".$badd."' data-toggle='modal' data-target='#modalEditBranch'>Edit</button>";
						

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