<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<?php

$username = $_GET['username'];
$password = $_GET['password'];

require_once 'userDTO.php';

$userdto = new userDTO($username,$password,null);
$ID = false;
$ID = $userdto->checkuser();
$user = $userdto->displayuser($ID);

$_SESSION['user_name'] = $user[1];
$_SESSION['admin_check'] = $user[3];


if(!$ID)
{
    echo "invalid username or password";
    echo "<button type=\"button\" onclick=\"location.href='index.php'\">Go Back!</button>";
}
else
{

    echo "
    <h1>You are now logged in</h1>
    <button type=\"button\" onclick=\"location.href='recordspage.php'\">Access Records</button>
    ";
}
?>
</body>
</html>