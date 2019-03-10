<?php
	// connection to database
	require("config/connectdb.php");
	session_start();
	try {
		
		$userid = $_POST["userid"];

		$conn = new PDO($dsn, $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = "SELECT * FROM users";
		$stmt = $conn->prepare($sql);
		$stmt->execute();

		foreach ($stmt as $row) {
			$status = 0;

			$sql = "UPDATE users SET status = :status WHERE userid = :userid";
			$stmt = $conn->prepare($sql);
			$stmt->bindValue(':status', $status);
			$stmt->bindValue(':userid', $userid);
			$stmt->execute();
		}
		session_destroy();
	} 
	catch (PDOException $e)
	{
		echo 'PDO Exception Caught.';
		echo 'Error with the database: <br />';
		echo 'SQL Query: ', $sql;
		echo 'Error: ' . $e->getMessage();
	}
?>