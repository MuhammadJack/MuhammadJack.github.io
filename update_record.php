<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<title>update record Page</title>
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

    $user_ID = $_GET['Record_ID'];

    require_once 'salesRecordDTO.php';
    $recorddto = new recordDTO(null,null,null,null,null,null);
    $array = $recorddto->displayrecord($user_ID);


    $_SESSION["temp_ID_r"] = $array[0];

    
echo "
<h1>Update record</h1>
    <form action=\"update_record_process.php\" methord=\"get\">
    <lable>Transaction Number:</lable>
    <input type=\"text\" name=\"transactionnum\" value=\"$array[1]\" required/>
    <br>
    <lable>Date :</lable>
    <input type=\"text\" name=\"date\" value=\"$array[2]\" required/>
    <br>
    <lable>productnumber :</lable>
    <input type=\"text\" name=\"productnumber\" value=\"$array[3]\" required/>
    <br>
    <lable>description :</lable>
    <input type=\"text\" name=\"description\" value=\"$array[4]\" required/>
    <br>
    <lable>customernumber :</lable>
    <input type=\"text\" name=\"customernumber\" value=\"$array[5]\" required/>
    <br>
    <lable>saleamount :</lable>
    <input type=\"text\" name=\"saleamount\" value=\"$array[6]\" required/>
    <br>
    <input type=\"text\" name=\"email\" value=\"$array[7]\" required/>
    <br>

<button type=\"submit\" name=\"submit2\">Update Record!</button>
    </form>

    "

    ?>
    
</body>
</html>