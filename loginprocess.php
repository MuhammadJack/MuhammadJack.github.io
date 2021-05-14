<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <title>Login Processing</title>
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
                $username = $_POST['username'];
                $password = $_POST['password'];
                
                require_once ('userDTO.php');
                
                $userdto = new userDTO($username, $password, null);
                $ID = false;
                $ID = $userdto->checkuser();
                $user = $userdto->displayuser($ID);
                
                $_SESSION['user_name'] = $user[1];
                $_SESSION['admin_check'] = $user[3];
                
                if(!$ID)
                {
                    echo "<div class='msg'>Invalid username or password</div>";
                    echo "<div class='button-row'><button type=\"button\" onclick=\"location.href='index.php'\" class='button'>Go Back</button></div>";
                }
                else
                {
                    echo "
                        <div class='msg sucmsg'>Log In Successful</div>
                        <div class='button-row'><button type=\"button\" onclick=\"location.href='recordspage.php'\" class='button btn2'>Access Records</button></div>
                        <div class='button-row next-row'><button type=\"button\" onclick=\"location.href='adminpage.php'\" class='button btn2'>Admin Page</button></div>
                        <div class='button-row next-row'><button type=\"button\" onclick=\"location.href='logout.php'\" class='button btn2'>Logout</button></div>
                    ";
                }
            ?>
            </div>
        </div>
    </div>
</body>
</html>