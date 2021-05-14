<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<title>Records Page</title>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
</head>
<body>

    <div style="float: right;">

        <?php


        if(isset($_SESSION["user_name"]))
        {
           $username = $_SESSION['user_name'];


           if($_SESSION['admin_check'] == "true")
            {
                echo "<button type=\"button\" onclick=\"location.href='adminpage.php'\">Admin Page</button>
                             <button type=\"button\" onclick=\"location.href='logout.php'\">Logout</button>
                        </div>
                    <h1> Welcome $username </h1>
                    
";
            }
        }
        else
        {
            echo "You are not logged in";
            exit;
        }
        

        ?>

   

    <div>
    <button type="button" onclick="location.href='addrecord.php'">Click Here to add a Record!</button>
        <button type="button" onclick="location.href='sort_month_record.php'">Show Monthly Sales Records!</button>
    <form action="search_record_process.php" methord="get">
        <lable>Enter Record ID here :</lable>
        <input type="text" name="Record_ID"/>

        <button type="submit" name="search">Search Record!</button>
        or
        <button type="submit" name="delete" formaction="delete_record_process.php">Delete Record!</button>
        or
       <button type="submit" name="update" formaction="update_record.php">Update Record!</button>
        or
        
    </form>
    
    </div>



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
    <?php
        require_once 'salesRecordDTO.php';
        $recorddto = new recordDTO(null,null,null,null,null,null,null);
        $info_holder = $recorddto->displayall();

        $ID_array = $info_holder[0];
        $transnum_array = $info_holder[1];
        $date_array = $info_holder[2];
        $productnumber_array = $info_holder[3];
        $description_array = $info_holder[4];
        $customernumber_array = $info_holder[5];
        $saleamount_array = $info_holder[6];
        $email_array = $info_holder[7];
        


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
        </tr>";

            $x++;
        }
    


?>

</table>








</body>
</html>