<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <title>Admin Page</title>
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
        <div style="text-align: center; margin-bottom: 30px;">
            <button type="button" onclick="location.href='adduser.php'" class="top-btn">Add User</button>
        </div>
        
        <div style="text-align: center; margin-bottom: 30px;" >
            <form action="search_user_process.php" methord="get">
               <lable>Enter User ID here</lable>
               <input type="text" name="user_ID" class="searchbar" required/>
        
               <button type="submit" name="search" class="top-btn">Search User</button>
               
               <button type="submit" name="delete" formaction="delete_user_process.php" class="top-btn">Delete User</button>
    
               <button type="submit" name="update" formaction="update_user.php" class="top-btn">Update User</button>
            </form>
        </div>
    
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Password</th>
                    <th>Admin</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once 'userDTO.php';
                    $userdto = new userDTO(null,null,null);
                    $info_holder = $userdto->displayall();
    
                    $ID_array = $info_holder[0];
                    $username_array = $info_holder[1];
                    $password_array = $info_holder[2];
                    $admin_array = $info_holder[3];

                    $x = 0;
                    foreach($ID_array as $value)
                    {
                        echo "<tr>
                            <td>{$ID_array[$x]}</td>
                            <td>{$username_array[$x]}</td>
                            <td>{$password_array[$x]}</td>
                            <td>{$admin_array[$x]}</td>
                        </tr>";
    
                        $x++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>