<!DOCTYPE html>
<html>
<head>
<title>WELCOME</title>
</head>
<body>
<?php
session_start();

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
    header('Location: index.php');
}
else
{
   header('Location: recordspage.php');  
}

?>
<button type="button" onclick="location.href='index.php'">Go Back!</button>
</body>
</html>