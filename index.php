<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <title>Home</title>
    <link rel="stylesheet" href="style/styles.css" />
</head>
<body>
    <div class="page">
        <div class="container">
            <div class="left">
                <img src="/images/medicine.png" alt="logo" />
                <div class="login">PHP-SRePS</div>
            </div>
            
            <div class="right">
                <?php
                    if(isset($_SESSION["user_name"]))
                    {
                        $user = $_SESSION["user_name"];
                        if($_SESSION['admin_check'] == "true")
                            echo "<div class='msg sucmsg'>Welcome $user</div>";
                        else
                            echo "<div class='msg sucmsg'>Guest Login</div>";
                        
                        echo "<div class='button-row'><button type=\"button\" onclick=\"location.href='recordspage.php'\" class='button btn2'>Records</button></div>";
                            
                        if($_SESSION['admin_check'] == "true")
                        {
                            echo "<div class='button-row next-row'><button type=\"button\" onclick=\"location.href='adminpage.php'\" class='button btn2'>Admin Page</button></div>";
                        }
                            
                        echo "<div class='button-row next-row'><button type=\"button\" onclick=\"location.href='logout.php'\" class='button btn2'>Log Out</button></div>";
                    }
                    else
                    {
                        echo "<div class='form'>
                            <form action='loginprocess.php' method='POST'>
                                <label class='label'>User Name</label>
                                <input type='text' name='username' class='input-text' />
                                <label class='label'>Password</label>
                                <input type='password' name='password' class='input-text' />
                                <div class='button-row'><button type='submit' name='submit' class='submit'>Login</button></div>
                            </form>
                        </div>";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>