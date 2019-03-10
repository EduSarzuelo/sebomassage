<?php

	require_once("../../config/connectdb.php");

	//variable
    $row = array();

    //Get from ajax data
    if (isset($_POST["branch"])){
        $branch = $_POST["branch"];
    } else {
        $branch = 0;
    }
    
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
		
        $sql = "SELECT a.customerid, a.firstname as Fname, a.lastname as Lname,  a.date, a.timestarted, a.numberofhours, a.massagestyle, a.branchid, a.rate, a.therapistid, a.type, a.status, a.flag, b.service_name, b.price as Sprice, c.firstname, c.lastname, d.roomname, e.addname, e.price as Aprice
        from temptally a 
        inner join services b on a.serviceid = b.serviceid 
        inner join therapists c on a.therapistid = c.therapistid 
        inner join rooms d on a.roomid = d.roomid 
        inner join additionals e on a.addid = e.addid
        where a.branchid = :branch and a.date = :set_date";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':branch', $branch);
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

                // get total price
                $total = 0;
                $subtotal = 0;
                $price = 0;
                
                
                if ($rate==1) {
                    $price = $Sprice * $noh;
                    $total = $price + $Aprice;
                } else if ($rate==2) {
                    $price = $Sprice * $noh;
                    $subtotal = 50 * $noh;
                    $total = $price + $subtotal + $Aprice;
                } else if ($rate==3) {
                    $price = $Sprice * $noh;
                    $subtotal = 100 * $noh;
                    $total = $price + $subtotal + $Aprice;
                }
                
                $row[0] = $cfname ." ". $clname;
                $row[1] = $date;
                $row[2] = $noh;
                $row[3] = $total;
                $row[4] = $total * 0.40;
                $row[5] = $total * 0.60;
                // $row[6] ="<button class='btn btn-xs btn-primary btn-table' id='btnEdit' data-toggle='modal' data-target='#modalEditService'>Details</button>";
                            

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