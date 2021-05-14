<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Records Page</title>
    <style>
table, th, td {
  border: 1px solid black;
}
    </style>
</head>
<body>
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

    <form action="sort_month_process.php" methord="get">
        <p>Which Month would you like a sales report from?</p>
        <input type="radio" name="month" value="01" required />January
        <br />
        <input type="radio" name="month" value="02" required />February
        <br />
        <input type="radio" name="month" value="03" required />March
        <br />
        <input type="radio" name="month" value="04" required />April
        <br />
        <input type="radio" name="month" value="05" required />May
        <br />
        <input type="radio" name="month" value="06" required />June
        <br />
        <input type="radio" name="month" value="07" required />July
        <br />
        <input type="radio" name="month" value="08" required />August
        <br />
        <input type="radio" name="month" value="09" required />September
        <br />
        <input type="radio" name="month" value="10" required />October
        <br />
        <input type="radio" name="month" value="11" required />November
        <br />
        <input type="radio" name="month" value="12" required />December
        <button type="submit" name="submit2">Sort!</button>
    </form>
    <button type="button" onclick="location.href='recordspage.php'">Go back</button>
</body>
</html>