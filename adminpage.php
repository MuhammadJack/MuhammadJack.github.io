<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Page</title>
<link rel="stylesheet" href="style/styles.css" />
</head>
<body>

    <div class="side-bar">
    <?php
    
        
    if(isset($_SESSION["user_name"]))
    {
       $username = $_SESSION['user_name'];

        echo "<h1> Welcome $username </h1>";
    }
    else
    {
        echo "You are not logged in";
        exit;
    }
    ?>

        <img src="/images/medicine.png" alt="logo" />
        <div class="side-title">PHP-SRePS</div>
        <button type="button" onclick="location.href='adduser.php'">Click Here to add a User!</button>
        <button type="button" onclick="location.href='logout.php'">Logout</button>
    </div>


    <div class="main">
    <form action="search_user_process.php" methord="get">
       <lable>Enter User ID here :</lable>
       <input type="text" name="user_ID"/>

       <button type="submit" name="search">Search User!</button>
       or
       <button type="submit" name="delete" formaction="delete_user_process.php">Delete User!</button>
       or
       <button type="submit" name="update" formaction="update_user.php">Update User!</button>
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

                    <th>{$ID_array[$x]}</th>
                    <th>{$username_array[$x]}</th>
                    <th>{$password_array[$x]}</th>
                    <th>{$admin_array[$x]}</th>

                    </tr>";

                    $x++;
                }
            


            ?>
        </tbody>

    </table>

    <button type="button" onclick="location.href='recordspage.php'">Go back</button>
    </div>





</body>
</html>