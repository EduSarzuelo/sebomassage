<?php
    //CONNECT DATABASE
	require_once("../../config/connectdb.php");

	try {
        //GET DATA FROM AJAX
        $rate = $_POST["rate"];
        $rateprice = $_POST["rateprice"];
        
       	

        // INSERT DATA QUERY
        $conn = new PDO($dsn, $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO rate (rate, rateprice) VALUES (:rate, :rateprice)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':rate', $rate);
        $stmt->bindValue(':rateprice', $rateprice);
        $stmt->execute();
    }
    catch (PDOException $e) {
        echo 'PDO Exception Caught.';
        echo 'Error with the database: <br />';
        echo 'SQL Query: ', $sql;
    }
?>