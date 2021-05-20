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
        <div class="title-row" style="text-align: center;">
            <span class="pg-title">Monthly Records</span>
            <button type="button" onclick="location.href='recordspage.php'">Cancel</button>
            <button type="button" onclick="location.href='sort_month_record.php'">Choose Another Month</button>
        </div>

        <?php
            $Record_month = $_GET['month'];
            
            require_once 'salesRecordDTO.php';
            $recorddto = new recordDTO(null,null,null,null,null,null,null);
            $sort_array = $recorddto->sortbymonth($Record_month);
            
            if($sort_array == null)
            {
                echo "<div style='text-align: center;'>No record in that month</div>";
            }
            else
            {
                $ID_array = $sort_array[0];
                $transnum_array = $sort_array[1];
                $date_array = $sort_array[2];
                $productnumber_array = $sort_array[3];
                $description_array = $sort_array[4];
                $customernumber_array = $sort_array[5];
                $saleamount_array = $sort_array[6];
                $email_array = $sort_array[7];
            
                echo "<table><thead><tr>
                    <th>Record ID</th>
                    <th>Transaction Number</th>
                    <th>Date</th>
                    <th>Product ID</th>
                    <th>Description</th>
                    <th>Customer Number</th>
                    <th>Sale Amount</th>
                    <th>Email</th>
                </tr></thead>";
                
                echo "<tbody>";
                $x = 0;
                foreach($ID_array as $value)
                {
                    echo "<tr>
                        <td>{$ID_array[$x]}</td>
                        <td>{$transnum_array[$x]}</td>
                        <td>{$date_array[$x]}</td>
                        <td>{$productnumber_array[$x]}</td>
                        <td>{$description_array[$x]}</td>
                        <td>{$customernumber_array[$x]}</td>
                        <td>{$saleamount_array[$x]}</td>
                        <td>{$email_array[$x]}</td>
                    </tr>";
                    
                    $x++;
                }
                echo "</tbody></table>";
                
                require_once 'salesRecordDTO.php';
                $recorddto = new recordDTO(null,null,null,null,null,null,null);
                $recorddto->make_csv($sort_array);
                
                echo "<div style='text-align: center;'><a href='file.csv' download>Download as CSV file here</a></div>";
            }
        ?>
    </div>
</body>
</html>