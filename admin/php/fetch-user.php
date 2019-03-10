<?php

	require_once("../../config/connectdb.php");

	//variable
	$row = array();

	try{
		$conn = new PDO($dsn, $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "SELECT U.userid, U.firstname, U.lastname, U.contact, U.username, U.password, U.usertype, U.status, B.branch_name
				FROM users U INNER JOIN branches B ON U.branchid = B.branchid
				INNER JOIN type T ON U.usertype = T.usertype
				WHERE U.usertype != 0 AND flagg = 0";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		foreach ($stmt	as $user)
		{

			$userid = $user["userid"];
			$fname = $user["firstname"];
			$lname = $user["lastname"];
			$contact = $user["contact"];
			$uname = $user["username"];
			$pword = $user["password"];
			$usertype = $user["usertype"];
			$location = $user["branch_name"];
			$status = $user["status"];
			
			
			// $row[0] = $fname ." ". $lname;
			
			$row[0] = $uname;

			if ($usertype == 1 ) {
				$row[1] = "Front Desk";
			} else if ($usertype == 2) {
				$row[1] = "VIP Account";
			}
			
			$row[2] = $location;	
			
			if ($status == 0 ) {
				$row[3] = "<span class='fa fa-circle offline'></span> Offline";
			} else if ($status == 1) {
				$row[3] = "<span class='fa fa-circle online'></span> Online";
			}

			$row[4] =  "<button class='btn btn-xs btn-default btn-table' id='btnView' userid='".$userid."' fname='".$fname."' lname='".$lname."' contact='".$contact."'uname='".$uname."' pword='".$pword."' data-toggle='modal' data-target='#modalViewUser'>View</button>".
						"<button class='btn btn-xs btn-primary btn-table' id='btnEdit' userid='".$userid."' fname='".$fname."' lname='".$lname."'  contact='".$contact."'uname='".$uname."' pword='".$pword."'  data-toggle='modal' data-target='#modalEditUser'>Edit</button>".
						"<button class='btn btn-xs btn-danger btn-table' id='btnDelete' userid='".$userid."' fname='".$fname."' lname='".$lname."' >Delete</button>";
						
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