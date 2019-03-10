<?php
    //CONNECT DATABASE
	require_once("../../config/connectdb.php");

	try {
        //GET DATA FROM AJAX
        $addname = $_POST["addname"];
        $addprice = $_POST["addprice"];
        
       	

        // INSERT DATA QUERY
        $conn = new PDO($dsn, $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO additionals (addname, price) VALUES (:addname, :addprice)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':addname', $addname);
        $stmt->bindValue(':addprice', $addprice);
        $stmt->execute();
    }
    catch (PDOException $e) {
        echo 'PDO Exception Caught.';
        echo 'Error with the database: <br />';
        echo 'SQL Query: ', $sql;
    }
?>