<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<title>Search Records Page</title>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
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
?>

<table>
            <tr>
                <th>ID_SALESRECORD</th>
                <th>Transaction Number</th>
                <th>Date</th>
                <th>Product Number</th>
                <th>Description</th>
                <th>Customer Number</th>
                <th>Sale Amount</th>
                <th>Email</th>
            </tr>

   <?php
   
   $Record_ID = $_GET['Record_ID'];

    require_once 'salesRecordDTO.php';
    $recorddto = new recordDTO(null,null,null,null,null,null,null);
    $array = $recorddto->displayrecord($Record_ID);
    
    if(!$array)
    {
        echo ("Record could not be Searched");
    }
    else
    {
       echo "<tr>
                <th>{$array[0]}</th>
                <th>{$array[1]}</th>
                <th>{$array[2]}</th>
                <th>{$array[3]}</th>
                <th>{$array[4]}</th>
                <th>{$array[5]}</th>
                <th>{$array[6]}</th>
                <th>{$array[7]}</th>
            </tr>";
    }
   
   
   ?>
     </table>
    <button type="button" onclick="location.href='recordspage.php'">Go back</button>

</body>
</html>