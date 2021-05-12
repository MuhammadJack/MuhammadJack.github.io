<?php





class record {
    public $transactionnum;
    public $date;
    public $productnumber;
    public $Description;
    public $customernumber;
    public $saleamount;
    


    public function __construct($transactionnum,$date,$productnumber,$description,$customernumber,$saleamount)
    {
        $this->transactionnum =$transactionnum;
        $this->date = $date;
        $this->productnumber = $productnumber;
        $this->description = $description;
        $this->customernumber = $customernumber;
        $this->saleamount = $saleamount;
    
    }

    public function get_transactionnum()
    {
        return $this->transactionnum;
    }

    public function get_date()
    {
        return $this->date;
    }

    public function get_productnumber()
    {
        return $this->productnumber;
    }

    public function get_description()
    {
        return $this->description;
    }

    public function get_customernumber()
    {
        return $this->customernumber;
    }

    public function get_saleamount()
    {
        return $this->saleamount;
    }
}


class recordDTO extends record {


    public function displayrecord($idSALESRECORD)
    {
        $servername = "35.184.171.26";
        $user = "root";
        $pass = "1234";
        $dbname = "PeoplesHealthPharmacy";

        $tablename = "SALESRECORD";

        $conn = mysqli_connect($servername,$user,$pass,$dbname);

        $sql = "SELECT * FROM $tablename WHERE idSALESRECORD='$idSALESRECORD';";
        $result = mysqli_query($conn, $sql);
        if(!$result)
        {
            return false;
        }

        $holder = mysqli_fetch_assoc($result);
        $ID_hold = $holder["idSALESRECORD"];
        $transactionnum_hold = $holder["transactionnum"];
        $date_hold = $holder["date"];
        $productnumber_hold = $holder["productnumber"];
        $description_hold = $holder["description"];
        $customernumber_hold = $holder["customernumber"];
        $saleamount_hold = $holder["saleamount"];

        $info_holder = array($ID_hold,$transactionnum_hold,$date_hold,$productnumber_hold,$description_hold,$customernumber_hold,$saleamount_hold);

        return $info_holder;
    }

    public function displayall()
    {
        $servername = "35.184.171.26";
        $user = "root";
        $pass = "1234";
        $dbname = "PeoplesHealthPharmacy";

        $tablename = "SALESRECORD";


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
                $ID_hold[$x] = $holder["idSALESRECORD"];
                $transactionnum_hold[$x] = $holder["transactionnum"];
                $date_hold[$x] = $holder["date"];
                $productnumber_hold[$x] = $holder["productnumber"];
                $description_hold[$x] = $holder["description"];
                $customernumber_hold[$x] = $holder["customernumber"];
                $saleamount_hold[$x] = $holder["saleamount"];

                $x++;
            }
        }
        else
        {
            return false;
        }

        $info_holder = array($ID_hold,$transactionnum_hold,$date_hold,$productnumber_hold,$description_hold,$customernumber_hold,$saleamount_hold);

        return $info_holder;
    }

    public function addrecord()
    {
        $servername = "35.184.171.26";
        $user = "root";
        $pass = "1234";
        $dbname = "PeoplesHealthPharmacy";

        $tablename = "SALESRECORD";


        $conn = mysqli_connect($servername,$user,$pass,$dbname);


        $transactionnum_temp = $this->get_transactionnum();
        $date_temp = $this->get_date();
        $productnumber_temp = $this->get_productnumber();
        $description_temp = $this->get_description();
        $customernumber_temp = $this->get_customernumber();
        $saleamount_temp = $this->get_saleamount();


        $sql = "INSERT INTO $tablename (`transactionnum`, `date`, `productnumber`, `description`, `customernumber`, `saleamount`) VALUES ('$transactionnum_temp', '$date_temp', '$productnumber_temp', '$description_temp', '$customernumber_temp', '$saleamount_temp');";
        $result = mysqli_query($conn, $sql);
        if(!$result)
        {
            return false;
        }

        return true;
    }

    public function deleterecord($idSALESRECORD)
    {
        $servername = "35.184.171.26";
        $user = "root";
        $pass = "1234";
        $dbname = "PeoplesHealthPharmacy";

        $tablename = "SALESRECORD";


        $conn = mysqli_connect($servername,$user,$pass,$dbname);

        $transactionnum_temp = $this->get_transactionnum();
        $date_temp = $this->get_date();
        $productnumber_temp = $this->get_productnumber();
        $description_temp = $this->get_description();
        $customernumber_temp = $this->get_customernumber();
        $saleamount_temp = $this->get_saleamount();

        $sql = "DELETE FROM $tablename WHERE idSALESRECORD='$idSALESRECORD';";
        $result = mysqli_query($conn, $sql);
        if(!$result)
        {
            return false;
        }
        return true;
    }

    public function updaterecord($idSALESRECORD)
    {
        $servername = "35.184.171.26";
        $user = "root";
        $pass = "1234";
        $dbname = "PeoplesHealthPharmacy";

        $tablename = "SALESRECORD";


        $conn = mysqli_connect($servername,$user,$pass,$dbname);

        $transactionnum_temp = $this->get_transactionnum();
        $date_temp = $this->get_date();
        $productnumber_temp = $this->get_productnumber();
        $description_temp = $this->get_description();
        $customernumber_temp = $this->get_customernumber();
        $saleamount_temp = $this->get_saleamount();

        $sql = "UPDATE $tablename SET transactionnum='$transactionnum_temp', date='$date_temp', productnumber='$productnumber_temp', description='$description_temp', customernumber='$customernumber_temp', saleamount='$saleamount_temp' WHERE idSALESRECORD='$idSALESRECORD';";
        $result = mysqli_query($conn, $sql);
        if(!$result)
        {
            return false;
        }

        return true;
    }

}

?>