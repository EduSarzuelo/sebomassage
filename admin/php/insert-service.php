<?php
    //CONNECT DATABASE
	require_once("../../config/connectdb.php");

	try {
        //GET DATA FROM AJAX
        $sname = $_POST["sname"];
        $sprice = $_POST["sprice"];
        
       	

        // INSERT DATA QUERY
        $conn = new PDO($dsn, $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO services (service_name, price) VALUES (:sname, :sprice)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':sname', $sname);
        $stmt->bindValue(':sprice', $sprice);
        $stmt->execute();
    }
    catch (PDOException $e) {
        echo 'PDO Exception Caught.';
        echo 'Error with the database: <br />';
        echo 'SQL Query: ', $sql;
    }
?>