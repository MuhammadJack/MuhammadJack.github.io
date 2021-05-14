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
?>

    <h1>ADD a User</h1>
    <form action="add_user_process.php" methord="get">
    <lable>User Name: </lable>
    <input type="text" name="username" required>
    <br>
    <lable>Password: </lable>
    <input type="text" name="password" required>
    <br>
    <label>Is this user a Admin?</label>
    <br>
    <input type="radio" name="admin" value="true" required>Yes
    <br>
    <input type="radio" name="admin" value="false" required>No


    <br>
    <button type="submit" name="submit2">Add User!</button>
    </form>

    <button type="button" onclick="location.href='adminpage.php'">Go back</button>
</body>
</html>