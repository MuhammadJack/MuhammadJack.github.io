<?php
    $user_ID = $_GET['user_ID'];
    
    require_once 'userDTO.php';
    $userdto = new userDTO(null,null,null);
    $bool = $userdto->deleteuser($user_ID);
    
    if(!$bool)
    {
        echo ("User could not be deleted");
    }
    else
    {
        header("Location: adminpage.php", TRUE, 301);
        exit();
    }
?>