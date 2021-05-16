<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <title>Add Record</title>
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
            <span class="pg-title">Add Record</span>
            <button type="button" onclick="location.href='recordspage.php'">Cancel</button>
        </div>
            
        <form action="add_record_process.php" methord="get">
            <div class="form-row">
                <label>Transaction Number</label>
                <input type="text" name="transactionnum" required/>
            </div>
            
            <div class="form-row">
                <label>Date</label>
                <input type="date" name="date" required/>
            </div>
    
            <div class="form-row">
                <label>Product ID</label>
                <input type="text" name="productnumber" required/>
            </div>
    
            <div class="form-row">
                <label>Description</label>
                <input type="text" name="description" required/>
            </div>
    
            <div class="form-row">
                <label>Customer Number</label>
                <input type="text" name="customernumber" required/>
            </div>
    
            <div class="form-row">
                <label>Sales Amount</label>
                <input type="text" name="saleamount" required/>
            </div>
    
            <div class="form-row">
                <label>Email</label>
                <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required/>
            </div>
    
            <div>
                <button type="submit" name="submit">Add</button>
                <button type="reset">Clear</button>
            </div>
        </form>
    </div>
</body>
</html>