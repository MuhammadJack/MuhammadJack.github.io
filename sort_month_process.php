<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <title>ADD User Page</title>

</head>
<body>

    <?php


if(isset($_SESSION["user_name"]))
{
    $username = $_SESSION['user_name'];

    echo "<h1> Welcome $username </h1>";
}
else
{
    echo "You are not logged in";
    exit;
}

$Record_month = $_GET['month'];

require_once 'salesRecordDTO.php';
$recorddto = new recordDTO(null,null,null,null,null,null,null);
$sort_array = $recorddto->sortbymonth($Record_month);

if(!$sort_array)
{
    echo ("Record could not be Sorted");
}
else
{
        $ID_array = $sort_array[0];
        $transnum_array = $sort_array[1];
        $date_array = $sort_array[2];
        $productnumber_array = $sort_array[3];
        $description_array = $sort_array[4];
        $customernumber_array = $sort_array[5];
        $saleamount_array = $sort_array[6];
        $email_array = $sort_array[7];

    echo "
     <table>
    <tr>
        <th>ID_SALESRECORD</th>
        <th>Trans Action Number</th>
        <th>Date</th>
        <th>Product Number</th>
        <th>Description</th>
        <th>Customer Number</th>
        <th>Sale Amount</th>
        <th>Email</th>
    </tr>
            ";

        $x = 0;
        foreach($ID_array as $value)
        {

         echo "
        <tr>
            <th>{$ID_array[$x]}</th>
            <th>{$transnum_array[$x]}</th>
            <th>{$date_array[$x]}</th>
            <th>{$productnumber_array[$x]}</th>
            <th>{$description_array[$x]}</th>
            <th>{$customernumber_array[$x]}</th>
            <th>{$saleamount_array[$x]}</th>
            <th>{$email_array[$x]}</th>
        </tr>
            ";
            $x++;
       
        }

        


    ?>

     </table>


}


   
</body>
</html>