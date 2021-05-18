<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <title>Monthly Records</title>
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
            <span class="pg-title">Monthly Records</span>
            <button type="button" onclick="location.href='recordspage.php'">Cancel</button>
        </div>

        <form action="sort_month_process.php" methord="get">
            <div class="form-row">Choose a month</div>
            
            <div class="form-row">
                <input type="radio" name="month" value="01" required />
                <label for="01">January</label>
            </div>
            
            <div class="form-row">
                <input type="radio" name="month" value="02" required />
                <label for="02">February</label>
            </div>

            <div class="form-row">
                <input type="radio" name="month" value="03" required />
                <label for="03">March</label>
            </div>

            <div class="form-row">
                <input type="radio" name="month" value="04" required />
                <label for="04">April</label>
            </div>
            
            <div class="form-row">
                <input type="radio" name="month" value="05" required />
                <label for="05">May</label>
            </div>

            <div class="form-row">
                <input type="radio" name="month" value="06" required />
                <label for="06">June</label>
            </div>

            <div class="form-row">
                <input type="radio" name="month" value="07" required />
                <label for="07">July</label>
            </div>

            <div class="form-row">
                <input type="radio" name="month" value="08" required />
                <label for="08">August</label>
            </div>

            <div class="form-row">
                <input type="radio" name="month" value="09" required />
                <label for="09">September</label>
            </div>

            <div class="form-row">
                <input type="radio" name="month" value="10" required />
                <label for="10">October</label>
            </div>

            <div class="form-row">
                <input type="radio" name="month" value="11" required />
                <label for="11">November</label>
            </div>

            <div class="form-row">
                <input type="radio" name="month" value="12" required />
                <label for="12">December</label>
            </div>

            <button type="submit" name="submit2">Select</button>
        </form>
    </div>
</body>
</html>