<?php
    session_start();

    $ID = $_SESSION["temp_ID_r"];
    $transactionnum = $_GET['transactionnum'];
    $date = $_GET['date'];
    $productnumber = $_GET['productnumber'];
    $description = $_GET['description'];
    $customernumber = $_GET['customernumber'];
    $saleamount = $_GET['saleamount'];
    $email = $_GET['email'];
    
    require_once 'salesRecordDTO.php';
    $recorddto = new recordDTO($transactionnum,$date,$productnumber,$description,$customernumber,$saleamount,$email);
    $bool = $recorddto->updaterecord($ID);
    
    if(!$bool)
    {
        echo("Record could not be updated");
    }
    else
    {
        header("Location: recordspage.php", TRUE, 301);
        exit();
    }
?>