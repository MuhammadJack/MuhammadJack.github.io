<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<title>update user Page</title>
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

    $user_ID = $_GET['user_ID'];
    require_once 'userDTO.php';
    $userdto = new userDTO(null,null,null);
    $array = $userdto->displayuser($user_ID);


    $_SESSION["temp_ID"] = $array[0];

echo "
    <h1>Update User</h1>
    <form action=\"update_user_process.php\" methord=\"get\">
    <lable>User Name: </lable>
    <input type=\"text\" name=\"username\" value=\"$array[1]\" required>
    <br>
    <lable>Password: </lable>
    <input type=\"text\" name=\"password\"value=\"$array[2]\" required>
    <br>


    ";
if($array[3] == "false")
{
echo "
    <label>Make this user a Admin?</label>
    <br>
    <input type=\"radio\" name=\"admin\" value=\"true\" required>Yes
    <br>
    <input type=\"radio\" name=\"admin\" value=\"false\" required>No
    ";
}
else if($array[3] == "true")
{
    echo "
    <label>Remove as Admin?</label>
    <br>
    <input type=\"radio\" name=\"admin\" value=\"false\" required>Yes
    <br>
    <input type=\"radio\" name=\"admin\" value=\"true\" required>No
    ";
}
?>
<br>
<button type="submit" name="submit2">Update User!</button>
    </form>
    
</body>
</html>