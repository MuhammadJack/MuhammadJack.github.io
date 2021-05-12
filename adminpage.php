<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Page</title>
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
    

    <div>
    <button type="button" onclick="location.href='adduser.php'">Click Here to add a User!</button>
    
   <form action="search_user_process.php" methord="get">
       <lable>Enter User ID here :</lable>
       <input type="text" name="user_ID"/>

       <button type="submit" name="search">Search User!</button>
       or
       <button type="submit" name="delete" formaction="delete_user_process.php">Delete User!</button>
       or
       <button type="submit" name="update" formaction="update_user.php">Update User!</button>
   </form>
   
   </div>



    <table style="width:100%" >
    <tr>
        <th>idUSERS</th>
        <th>User Name</th>
        <th>Password</th>
        <th>admin</th>
    </tr>
    <?php
        require_once 'userDTO.php';
        $userdto = new userDTO(null,null,null);
        $info_holder = $userdto->displayall();

        $ID_array = $info_holder[0];
        $username_array = $info_holder[1];
        $password_array = $info_holder[2];
        $admin_array = $info_holder[3];
        


        $x = 0;
        foreach($ID_array as $value)
        {
            echo "<tr>

            <th>{$ID_array[$x]}</th>
            <th>{$username_array[$x]}</th>
            <th>{$password_array[$x]}</th>
            <th>{$admin_array[$x]}</th>

            </tr>";

            $x++;
        }
    


?>

</table>








</body>
</html>