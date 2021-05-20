<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <title>Update User</title>
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
                            <div class='msg'>You do not have permission to access this page.</div>
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
            <span class="pg-title">Update User</span>
            <button type="button" onclick="location.href='adminpage.php'">Cancel</button>
        </div>
    
        <?php
            $user_ID = $_GET['user_ID'];
            
            require_once 'userDTO.php';
            $userdto = new userDTO(null,null,null);
            $array = $userdto->displayuser($user_ID);
            
            if ($array[0]=="")
            {
                echo "<div>User not found</div>";
            }
            else
            {
                $_SESSION["temp_ID"] = $array[0];
                
                echo "<form action=\"update_user_process.php\" methord=\"get\">
                    <div class='form-row'>
                        <label>User Name</label>
                        <input type=\"text\" name=\"username\" value=\"$array[1]\" required>
                    </div>
    
                    <div class='form-row'>
                        <label>Password</label>
                        <input type=\"text\" name=\"password\"value=\"$array[2]\" required>
                    </div>
                ";
                
                if($array[3] == "false")
                {
                    echo "<div class='form-row'>
                        <label>Provide Admin Access?</label>
                        <input type=\"radio\" name=\"admin\" value=\"true\" required>Yes
                        <input type=\"radio\" name=\"admin\" value=\"false\" required>No
                    </div>";
                }
                else if($array[3] == "true")
                {
                    echo "<div class='form-row'>
                        <label>Remove Admin Access?</label>
                        <input type=\"radio\" name=\"admin\" value=\"false\" required>Yes
                        <input type=\"radio\" name=\"admin\" value=\"true\" required>No
                    </div>";
                }
                
                echo "<button type='submit' name='submit2'>Update</button>";
                echo "</form>";
            }
        ?>
    </div>    
</body>
</html>