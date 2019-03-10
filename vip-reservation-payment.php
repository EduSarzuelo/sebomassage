<?php

    //CONNECT DATABASE
	include("config/connectdb.php");
    use PayPal\Api\Payer;
    use PayPal\Api\Item;
    use PayPal\Api\ItemList;
    use PayPal\Api\Details;
    use PayPal\Api\Amount;
    use PayPal\Api\Transaction;
    use PayPal\Api\RedirectUrls;
    use PayPal\Api\Payment;

    require 'app/start.php';

   


        $fname = $_GET["fname"];
        $lname = $_GET["lname"];
        $contact = $_GET["contact"];
        $date = $_GET["date"];
        $time = $_GET["time"];
        $hour = $_GET["hour"];
        $therapist = $_GET["therapist"];
        $room = $_GET["room"];
        $service = $_GET["service"];
        $style = $_GET["style"];
        $add = $_GET["add"];
        $branch = $_GET["branch"];
        $type = $_GET["type"];
        
        // $sql= "INSERT INTO reservations (firstname, lastname, number, 
        //     date, time, numberofhours, therapistid, roomid, serviceid, 
        //     massagestyle, addid, branchid, type) 
        //     VALUES 
        //     ('".$fname."', '".$lname."', '".$contact."', 
        //     '".$date."', '".$time."', '".$time."', '".$therapist."', :'".$room."',
        //     '".$service."', '".$style."', '".$add."', '".$branch."', '".$type."')";

  


    // $sql1 = "SELECT * FROM reservations";
    // $result1 = mysqli_query($con, $sql1);
    // $row1 = mysqli_fetch_assoc($result1);
    // var_dump ($row1['fname']);
    // $fname = $_POST["fname"];
    // $lname = $_POST["lname"];
    
    $product = 'Reservation Fee';
    $price = 100;
    $shipping = 0;

    $total = $price + $shipping;

    $payer = new Payer ();
    $payer->setPaymentMethod('paypal');

    $item = new Item();
    $item->setName($product)
        ->setCurrency('PHP')
        ->setQuantity(1)
        ->setPrice($price);
        
    $itemList = new ItemList();
    $itemList->setItems([$item]);

    $details = new Details();
    $details->setShipping($shipping)
        ->setSubTotal($price);

    $amount = new Amount();
    $amount->setCurrency('PHP')
        ->setTotal($total)
        ->setDetails($details);

    $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setItemList($itemList)
        ->setDescription('PayForReservation Payment')
        ->setInvoiceNumber(uniqid());

    $redirectUrls = new RedirectUrls();
    $redirectUrls->setReturnUrl(SITE_URL . '/save-payment.php?success=true&fname='. $fname .'&lname='. $lname .'&contact='. $contact .
            '&date='. $date .'&time='. $time .'&hour='. $hour .'&therapist='. $therapist .'&room='. $room  .'&service='. $service .
            '&style='. $style .'&add='. $add .'&branch='. $branch .'&type='. $type .'')
        ->setCancelUrl(SITE_URL . '/save-payment.php?success=false');

    $payment = new Payment();
    $payment->setIntent('sale')
        ->setPayer($payer)
        ->setRedirectUrls($redirectUrls)
        ->setTransactions([$transaction]);

    try {
        $payment->create($paypal);
    } catch (Exception $e) {
        die($e);
    }

    $approvalUrl = $payment->getApprovalLink();

    header("Location: {$approvalUrl}");

?>