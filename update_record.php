<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <title>Update Record</title>
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
        <div class="title-row">
            <span class="pg-title">Update Record</span>
            <button type="button" onclick="location.href='recordspage.php'">Cancel</button>
        </div>
        
        <?php
            $user_ID = $_GET['Record_ID'];
        
            require_once 'salesRecordDTO.php';
            $recorddto = new recordDTO(null,null,null,null,null,null,null);
            $array = $recorddto->displayrecord($user_ID);
            
            if ($array[0]=="")
            {
                echo "<div>Record not found</div>";
            }
            else
            {
                $_SESSION["temp_ID_r"] = $array[0];
                
                echo "<form action=\"update_record_process.php\" methord=\"get\">
                    <div class='form-row'>
                        <label>Transaction Number</label>
                        <input type=\"text\" name=\"transactionnum\" value=\"$array[1]\" required/>
                    </div>
    
                    <div class='form-row'>
                        <label>Date</label>
                        <input type=\"text\" name=\"date\" value=\"$array[2]\" required/>
                    </div>
    
                    <div class='form-row'>
                        <label>Product ID</label>
                        <input type=\"text\" name=\"productnumber\" value=\"$array[3]\" required/>
                    </div>
    
                    <div class='form-row'>
                        <label>Description</label>
                        <input type=\"text\" name=\"description\" value=\"$array[4]\" required/>
                    </div>
    
                    <div class='form-row'>
                        <label>Customer Number</label>
                        <input type=\"text\" name=\"customernumber\" value=\"$array[5]\" required/>
                    </div>
    
                    <div class='form-row'>
                        <label>Sales Amount</label>
                        <input type=\"text\" name=\"saleamount\" value=\"$array[6]\" required/>
                    </div>
    
                    <div class='form-row'>
                        <label>Email</label>
                        <input type=\"email\" name=\"email\" value=\"$array[7]\" required/>
                    </div>
    
                    <button type=\"submit\" name=\"submit2\">Update</button>
                </form>";
            }
        ?>
    </div>
</body>
</html>