<?php


$transactionnum = $_GET['transactionnum'];
$date = $_GET['date'];
$productnumber = $_GET['productnumber'];
$description = $_GET['description'];
$customernumber = $_GET['customernumber'];
$saleamount = $_GET['saleamount'];
$email = $_GET['email'];



require_once 'salesRecordDTO.php';
$recorddto = new recordDTO($transactionnum,$date,$productnumber,$description,$customernumber,$saleamount,$email);
$bool = $recorddto->addrecord();

if(!$bool)
{
    echo("Record could not be added");
}
else
{
    header("Location: recordspage.php", TRUE, 301);
    exit();
}

//comment no
?>