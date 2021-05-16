<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <title>Search Record</title>
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
    ?>
    
    <div class="side-bar">
        <img src="/images/medicine.png" alt="logo" />
        <div class="side-title">PHP-SRePS</div>
        <?php
                $username = $_SESSION['user_name'];
    
                if($_SESSION['admin_check'] == "true")
                {
                    echo "<div class='side-msg'>Login as: $username</div>";
                    
                    echo "<div><button type=\"button\" onclick=\"location.href='adminpage.php'\" class='side-btn'>Admin Page</button></div>";
                }
                else
                {
                    echo "<div class='side-msg'>Guest Login</div>";
                }
        ?>
        <div><button type="button" onclick="location.href='logout.php'" class="side-btn">Log Out</button></div>
    </div>

    <div class="main">
        <div class="title-row" style="text-align: center;">
            <span class="pg-title">Search Record</span>
            <button type="button" onclick="location.href='recordspage.php'">Cancel</button>
        </div>
    
        <?php
            $Record_ID = $_GET['Record_ID'];
        
            require_once 'salesRecordDTO.php';
            $recorddto = new recordDTO(null,null,null,null,null,null,null);
            $array = $recorddto->displayrecord($Record_ID);
            
            if($array[0]=="")
            {
                echo "<div style='text-align: center;'>Record not found</div>";
            }
            else
            {
                echo "<table><thead><tr>
                    <th>Record ID</th>
                    <th>Transaction Number</th>
                    <th>Date</th>
                    <th>Product ID</th>
                    <th>Description</th>
                    <th>Customer Number</th>
                    <th>Sale Amount</th>
                    <th>Email</th>
                </tr></thead>
                <tbody><tr>
                    <td>{$array[0]}</td>
                    <td>{$array[1]}</td>
                    <td>{$array[2]}</td>
                    <td>{$array[3]}</td>
                    <td>{$array[4]}</td>
                    <td>{$array[5]}</td>
                    <td>{$array[6]}</td>
                    <td>{$array[7]}</td>
                </tr></tbody></table>";
            }
        ?>
    </div>
</body>
</html>