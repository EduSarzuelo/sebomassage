<?php

	require_once("../../config/connectdb.php");

	//variable
    $row = array();

    //Get from ajax data
    // if (isset($_POST["branch"])){
    //     $branch = $_POST["branch"];
    // } else {
    //     $branch = 0;
    // }
    
    if (isset($_POST["date"])){
        $date = $_POST["date"];
    } else {
        $date = "0000-00-00";
    }
    

    $get_date = date_create($date);
    $set_date = date_format($get_date, "Y-m-d"); 
    

	try {
    
		$conn = new PDO($dsn, $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
        $sql = "SELECT COUNT(a.customerid) as customerid, a.firstname as Fname, a.lastname as Lname, a.date, a.timestarted, a.numberofhours, a.massagestyle, a.rate, SUM(a.total) as ttotal, a.therapistid, a.type, a.status, a.flag, b.service_name, b.price as Sprice, c.firstname, c.lastname, d.roomname, e.addname, e.price as Aprice, f.branch_name
        from temptally a 
        inner join services b on a.serviceid = b.serviceid 
        inner join therapists c on a.therapistid = c.therapistid 
        inner join rooms d on a.roomid = d.roomid 
        inner join additionals e on a.addid = e.addid
        inner join branches f on a.branchid = f.branchid
        where a.date = :set_date group by branch_name";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':set_date', $set_date);
		$stmt->execute();
        $rowCount = $stmt->rowCount();
        
        if ($rowCount >= 1) {
            foreach ($stmt	as $user)
            {
                $customerid = $user["customerid"];
                $cfname = $user["Fname"];
                $clname = $user["Lname"];
                $date = $user["date"];
                $time = $user["timestarted"];
                $type = $user["type"];
                $noh = $user["numberofhours"];
                $therapistfname = $user["firstname"];
                $therapistlname = $user["lastname"];
                $servicename = $user["service_name"];
                $style = $user["massagestyle"];
                $roomname = $user["roomname"];
                $Sprice = $user["Sprice"];
                $rate = $user["rate"];
                $therapistid = $user["therapistid"];
                $Aprice = $user["Aprice"];
                $addname = $user["addname"];
                $status = $user["status"];
                $ttotal = $user["ttotal"];
                $branchname = $user["branch_name"];
                
                $row[0] = $branchname;
                $row[1] = $date;
                $row[2] = $customerid;      
                $row[3] = $ttotal *.60;
                
                
                            

                $output['data'][] = $row;

            }
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