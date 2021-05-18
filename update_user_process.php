<?php
    session_start();

    $ID = $_SESSION["temp_ID"];
    $username = $_GET['username'];
    $password = $_GET['password'];
    $admin = $_GET['admin'];
    
    if($admin == null)
    {
        $admin == "false";
    }
    
    require_once 'userDTO.php';
    $userdto = new userDTO($username,$password,$admin);
    $bool = $userdto->updateuser("$ID");
    
    if(!$bool)
    {
        echo("User could not be updated");
    }
    else
    {
        header("Location: adminpage.php", TRUE, 301);
        exit();
    }
?>