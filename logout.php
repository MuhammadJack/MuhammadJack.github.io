<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
<title>Records Page</title>
</head>
<body>

    <?php
    
        
        if(isset($_SESSION["user_name"]))
        {
           session_destroy();
           echo "You have been logged out"; 
        }
        else
        {
            echo "You are not logged in";
            exit;
        }
        
        
    ?>
</body>
</html>