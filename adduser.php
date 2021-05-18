<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <title>Add User</title>
    <link rel="stylesheet" href="style/styles.css" />
</head>
<body>
    <?php
        if(!isset($_SESSION["user_name"]))
        {
            echo "<div class='page'>
                <div class='container'>
                    <div class='left'>
                        <img src='/images/medicine.png' alt='logo' />
                        <div class='login'>PHP-SRePS</div>
                    </div>
                    
                    <div class='right'>
                        <div class='msg'>Not Logged In Yet</div>
                        <div class='button-row'><button type=\"button\" onclick=\"location.href='index.php'\" class='button'>Log In</button></div>
                    </div>
                </div>
            </div>";
            exit;
        }
        else
        {
            if($_SESSION['admin_check'] != "true")
            {
                echo "<div class='page'>
                    <div class='container'>
                        <div class='left'>
                            <img src='/images/medicine.png' alt='logo' />
                            <div class='login'>PHP-SRePS</div>
                        </div>
                        
                        <div class='right'>
                            <div class='msg'>You do not have permission to access this page</div>
                            <div class='button-row'><button type=\"button\" onclick=\"location.href='index.php'\" class='button'>Home</button></div>
                        </div>
                    </div>
                </div>";
                exit;
            }
        }
    ?>
    
    <div class="side-bar">
        <img src="/images/medicine.png" alt="logo" />
        <div class="side-title">PHP-SRePS</div>
        <?php
            $username = $_SESSION['user_name'];
            echo "<div class='side-msg'>Login as: $username</div>";
        ?>
        <div><button type="button" onclick="location.href='recordspage.php'" class="side-btn side-btn2">Records</button></div>
        <div><button type="button" onclick="location.href='logout.php'" class="side-btn side-btn2">Log Out</button></div>
    </div>

    <div class="main">
        <div class="title-row">
            <span class="pg-title">Add User</span>
            <button type="button" onclick="location.href='adminpage.php'">Cancel</button>
        </div>
        
        <form action="add_user_process.php" methord="get">
            <div class="form-row">
                <label>User Name</label>
                <input type="text" name="username" required>
            </div>

            <div class="form-row">
                <label>Password</label>
                <input type="text" name="password" required>
            </div>

            <div class="form-row">
                <label>Provide Admin Access?</label>
                <input type="radio" name="admin" value="true" required>Yes
                <input type="radio" name="admin" value="false" required>No
            </div>
            
            <button type="submit" name="submit2">Add</button>
            <button type="reset">Clear</button>
        </form>
    </div>
</body>
</html>