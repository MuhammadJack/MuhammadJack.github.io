<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<title>Search User Page</title>
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

<table style="width:100%" >
            <tr>
                <th>ID_User</th>
                <th>User Name</th>
                <th>Password</th>
                <th>admin</th>
            </tr>

   <?php
   
   $user_ID = $_GET['user_ID'];

   require_once 'userDTO.php';
   $userdto = new userDTO(null,null,null);
    $array = $userdto->displayuser($user_ID);
    
    if(!$array)
    {
        echo ("User could not be Searched");
    }
    else
    {
       echo "<tr>
                <th>{$array[0]}</th>
                <th>{$array[1]}</th>
                <th>{$array[2]}</th>
                <th>{$array[3]}</th>
            </tr>";
    }
   
   
   ?>
     </table>


</body>
</html>