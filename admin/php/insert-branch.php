<?php
    //CONNECT DATABASE
	require_once("../../config/connectdb.php");

	try {
        //GET DATA FROM AJAX
        $bname = $_POST["bname"];
        $badd = $_POST["badd"];
        
       	

        // INSERT DATA QUERY
        $conn = new PDO($dsn, $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO branches (branch_name, branch_address) VALUES (:bname, :badd)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':bname', $bname);
        $stmt->bindValue(':badd', $badd);
        $stmt->execute();
    }
    catch (PDOException $e) {
        echo 'PDO Exception Caught.';
        echo 'Error with the database: <br />';
        echo 'SQL Query: ', $sql;
    }
?>