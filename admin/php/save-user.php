<?php
    //CONNECT DATABASE
	require_once("../../config/connectdb.php");

	try {
        //GET DATA FROM AJAX
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $uname = strtolower($_POST["uname"]);
        $pword = md5($_POST["pword"]);
        $roleid = $_POST["roleid"];
        $minid = $_POST["minid"];	

        // INSERT DATA QUERY
        $conn = new PDO($dsn, $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO users (firstname, lastname, username, password, roleid, ministryid) VALUES (:fname, :lname, :uname, :pword, :roleid, :minid)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':fname', $fname);
        $stmt->bindValue(':lname', $lname);
        $stmt->bindValue(':uname', $uname);
        $stmt->bindValue(':pword', $pword);
        $stmt->bindValue(':roleid', $roleid);
        $stmt->bindValue(':minid', $minid);
        $stmt->execute();
    }
    catch (PDOException $e) {
        echo 'PDO Exception Caught.';
        echo 'Error with the database: <br />';
        echo 'SQL Query: ', $sql;
    }
?>