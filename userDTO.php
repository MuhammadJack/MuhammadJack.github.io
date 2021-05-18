<?php

class user {
    public $username;
    public $password;
    public $admin;

    public function __construct($username, $password, $admin) {
        $this->username = $username;
        $this->password = $password;
        $this->admin = $admin;
    }

    public function get_username()
    {
        return $this->username;
    }

    public function get_password()
    {
        return $this->password;
    }

    public function get_admin()
    {
        return $this->admin;
    }

}


class userDTO extends User {

    public function getdatabase()
    {
        $fp = fopen('database_info.txt','r');

        $x = 0;
        while(!feof($fp))
        {
            $databaseinfo[$x] = fgets($fp);
            $x++;
        }

        fclose($fp);

        return $databaseinfo;

    }

    public function checkuser()
    {
        $databaseinfo = $this->getdatabase();

        $servername = $databaseinfo[0];
        $user = $databaseinfo[1];
        $pass = $databaseinfo[2];
        $dbname = $databaseinfo[3];

        $tablename = $databaseinfo[4];


        $conn = mysqli_connect($servername,$user,$pass,$dbname);

        $username_temp = $this->get_username();
        $password_temp = $this->get_password();

        $sql = "SELECT * FROM $tablename WHERE username='$username_temp' AND password='$password_temp';";
        $result = mysqli_query($conn, $sql);

        $holder = mysqli_fetch_assoc($result);

        $ID_hold = $holder["idUSERS"];
        $username_checker = $holder["username"];
        $password_checker = $holder["password"];


        if(($username_temp == $username_checker)and($password_temp == $password_checker))
        {
            return $ID_hold;
        }

        return false;
    }

    public function displayuser($idUSERS_temp)
    {
        $databaseinfo = $this->getdatabase();

        $servername = $databaseinfo[0];
        $user = $databaseinfo[1];
        $pass = $databaseinfo[2];
        $dbname = $databaseinfo[3];

        $tablename = $databaseinfo[4];


        $conn = mysqli_connect($servername,$user,$pass,$dbname);

        $sql = "SELECT * FROM $tablename WHERE idUSERS='$idUSERS_temp';";
        $result = mysqli_query($conn, $sql);
        if(!$result)
        {
            return false;
        }

        $holder = mysqli_fetch_assoc($result);
        $ID_hold = $holder["idUSERS"];
        $username_hold = $holder["username"];
        $password_hold = $holder["password"];
        $admin = $holder["admin"];

        $info_holder = array($ID_hold,$username_hold,$password_hold,$admin);

        return $info_holder;
    }

    public function displayall()
    {
        $databaseinfo = $this->getdatabase();

        $servername = $databaseinfo[0];
        $user = $databaseinfo[1];
        $pass = $databaseinfo[2];
        $dbname = $databaseinfo[3];

        $tablename = $databaseinfo[4];


        $conn = mysqli_connect($servername,$user,$pass,$dbname);

        $sql = "SELECT * FROM $tablename;";
        $result = mysqli_query($conn, $sql);
        if(!$result)
        {
            return false;
        }

        $x = 0;
        if(mysqli_num_rows($result) > 0)
        {
            while($holder = mysqli_fetch_assoc($result))
            {
                $ID_hold[$x] = $holder["idUSERS"];
                $username_hold[$x] = $holder["username"];
                $password_hold[$x] = $holder["password"];
                $admin_hold[$x] = $holder["admin"];

                $x++;
            }
        }
        else
        {
            return false;
        }

        $info_holder = array($ID_hold,$username_hold,$password_hold,$admin_hold);

        return $info_holder;
    }

    public function adduser()
    {
        $databaseinfo = $this->getdatabase();

        $servername = $databaseinfo[0];
        $user = $databaseinfo[1];
        $pass = $databaseinfo[2];
        $dbname = $databaseinfo[3];

        $tablename = $databaseinfo[4];


        $conn = mysqli_connect($servername,$user,$pass,$dbname);

        $username_temp = $this->get_username();
        $password_temp = $this->get_password();
        $admin_temp = $this->get_admin();

        $sql = "INSERT INTO $tablename (`username`, `password`, `admin`) VALUES ('$username_temp', '$password_temp', '$admin_temp');";
        $result = mysqli_query($conn, $sql);
        if(!$result)
        {
            return false;
        }

        return true;
    }

    public function deleteuser($idUSERS_temp)
    {
        $databaseinfo = $this->getdatabase();

        $servername = $databaseinfo[0];
        $user = $databaseinfo[1];
        $pass = $databaseinfo[2];
        $dbname = $databaseinfo[3];

        $tablename = $databaseinfo[4];


        $conn = mysqli_connect($servername,$user,$pass,$dbname);

        $sql = "DELETE FROM $tablename WHERE idUSERS='$idUSERS_temp';";
        $result = mysqli_query($conn, $sql);
        if(!$result)
        {
            return false;
        }
        return true;
    }

    public function updateuser($idUSERS_temp)
    {
        $databaseinfo = $this->getdatabase();

        $servername = $databaseinfo[0];
        $user = $databaseinfo[1];
        $pass = $databaseinfo[2];
        $dbname = $databaseinfo[3];

        $tablename = $databaseinfo[4];


        $conn = mysqli_connect($servername,$user,$pass,$dbname);

        $username_temp = $this->get_username();
        $password_temp = $this->get_password();
        $admin_temp = $this->get_admin();

        $sql = "UPDATE $tablename SET username='$username_temp', password='$password_temp', admin='$admin_temp' WHERE idUSERS='$idUSERS_temp';";
        $result = mysqli_query($conn, $sql);
        if(!$result)
        {
            return false;
        }

        return true;
    }



}

?>