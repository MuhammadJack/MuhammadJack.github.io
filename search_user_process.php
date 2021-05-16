<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <title>Search User</title>
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
        <div class="title-row" style="text-align: center;">
            <span class="pg-title">Search User</span>
            <button type="button" onclick="location.href='adminpage.php'">Cancel</button>
        </div>

        <?php
            $user_ID = $_GET['user_ID'];
        
            require_once 'userDTO.php';
            $userdto = new userDTO(null,null,null);
            $array = $userdto->displayuser($user_ID);
            
            if($array[0]=="")
            {
                echo "<div style='text-align: center;'>User not found</div>";
            }
            else
            {
                echo "<table><thead><tr>
                    <th>ID_User</th>
                    <th>User Name</th>
                    <th>Password</th>
                    <th>admin</th>
                </tr></thead>
                <tbody><tr>
                    <td>{$array[0]}</td>
                    <td>{$array[1]}</td>
                    <td>{$array[2]}</td>
                    <td>{$array[3]}</td>
                </tr><tbody></table>";
            }
        ?>
    </div>
</body>
</html>