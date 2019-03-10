<?php
    //CONNECT DATABASE
	require_once("../../config/connectdb.php");

	try {
        //GET DATA FROM AJAX
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $contact = $_POST["contact"];
        $uname = $_POST["uname"];
        $pword = $_POST["pword"];
        $utype = 1;
        $location = $_POST["location"];
       	

        // INSERT DATA QUERY
        $conn = new PDO($dsn, $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO users (firstname, lastname, contact, username, password, usertype, branchid) VALUES (:fname, :lname, :contact, :uname, :pword, :utype, :location)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':fname', $fname);
        $stmt->bindValue(':lname', $lname);
        $stmt->bindValue(':contact', $contact);
        $stmt->bindValue(':uname', $uname);
        $stmt->bindValue(':pword', $pword);
        $stmt->bindValue(':utype', $utype);
        $stmt->bindValue(':location', $location);
        $stmt->execute();
    }
    catch (PDOException $e) {
        echo 'PDO Exception Caught.';
        echo 'Error with the database: <br />';
        echo 'SQL Query: ', $sql;
    }
?>