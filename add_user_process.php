<?php
    $username = $_GET['username'];
    $password = $_GET['password'];
    $admin = $_GET['admin'];

    if($admin == null)
    {
        $admin == "false";
    }

    require_once 'userDTO.php';
    $userdto = new userDTO($username,$password,$admin);
    $bool = $userdto->adduser();

    if(!$bool)
    {
        echo("User could not be added");
    }
    else
    {
        header("Location: adminpage.php", TRUE, 301);
        exit();
    }
?>