<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <title>Logout</title>
    <link rel="stylesheet" href="style/styles.css" />
</head>
<body>
    <div class="page">
        <div class="container">
            <div class="left">
                <img src="/images/medicine.png" alt="logo" style="" />
                <div class="login">PHP-SRePS</div>
            </div>
            
            <div class="right">
            <?php
                if(isset($_SESSION["user_name"]))
                {
                    session_destroy();
                   
                    echo "<div class='msg'>Log Out Successful</div>";
                }
                else
                {
                    echo "<div class='msg'>Not Logged In Yet</div>";
                }
                
                echo "<div class='button-row'><button type=\"button\" onclick=\"location.href='index.php'\" class='button'>Log In</button></div>";
            ?>
            </div>
        </div>
    </div>
</body>
</html>