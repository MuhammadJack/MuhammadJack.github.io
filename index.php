<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <title>Home</title>
    <link rel="stylesheet" href="style/styles.css" />
</head>
<body>
    <div class="page">
        <div class="container">
            <div class="left">
                <img src="/images/medicine.png" alt="logo" />
                <div class="login">PHP-SRePS</div>
            </div>
            
            <div class="right">
                <div class="form">
                    <form action="loginprocess.php" method="POST">
                        <label>User Name</label>
                        <input type="text" name="username" class="input-text" />
                        <label>Password</label>
                        <input type="text" name="password" class="input-text" />
                        <div class="button-row"><button type="submit" name="submit" class="submit">Login</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>