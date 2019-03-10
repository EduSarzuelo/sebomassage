<?php
    //CONNECT DATABASE
	require_once("../../config/connectdb.php");

	try {
        //GET DATA FROM AJAX
        $style = $_POST["style"];
        
        
       	

        // INSERT DATA QUERY
        $conn = new PDO($dsn, $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO massagestyle (stylename) VALUES (:style)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':style', $style);
        $stmt->execute();
    }
    catch (PDOException $e) {
        echo 'PDO Exception Caught.';
        echo 'Error with the database: <br />';
        echo 'SQL Query: ', $sql;
    }
?>