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

    public function checkuser()
    {
        $servername = "localhost";
        $user = "id16814382_root";
        $pass = "1HdY(F\/kX%&^*sf";
        $dbname = "id16814382_peopleshealthpharmacy";

        $tablename = "USERS";


        $conn = mysqli_connect($servername,$user,$pass,$dbname);

        $username_temp = $this->get_username();
        $password_temp = $this->get_password();

        $sql = "SELECT * FROM $tablename WHERE username='$username_temp' AND password='$password_temp';";
        $result = mysqli_query($conn, $sql);

        $holder = mysqli_fetch_assoc($result);

        $ID_hold = $holder["idUSERS"];
        $username_checker = $holder["username"];
        $password_checker = $holder["password"];

        $bool = false;
        if(($username_temp == $username_checker)and($password_temp == $password_checker))
        {
            return $ID_hold;
        }

        return false;
    }

    public function displayuser($idUSERS_temp)
    {
        $servername = "localhost";
        $user = "id16814382_root";
        $pass = "1HdY(F\/kX%&^*sf";
        $dbname = "id16814382_peopleshealthpharmacy";

        $tablename = "USERS";


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
        $servername = "localhost";
        $user = "id16814382_root";
        $pass = "1HdY(F\/kX%&^*sf";
        $dbname = "id16814382_peopleshealthpharmacy";

        $tablename = "USERS";


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
        $servername = "localhost";
        $user = "id16814382_root";
        $pass = "1HdY(F\/kX%&^*sf";
        $dbname = "id16814382_peopleshealthpharmacy";

        $tablename = "USERS";


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
        $servername = "localhost";
        $user = "id16814382_root";
        $pass = "1HdY(F\/kX%&^*sf";
        $dbname = "id16814382_peopleshealthpharmacy";

        $tablename = "USERS";


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
        $servername = "35.184.171.26";
        $user = "root";
        $pass = "1234";
        $dbname = "PeoplesHealthPharmacy";

        $tablename = "USERS";


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