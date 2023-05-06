<?php

class Settings
{

    public $name;
    public $date_now;
    public $date_limit;
    public $seats_limit;


    public function read_settings()
    {

        //Προκαθορισμός τιμών μεταβλητών     
        $this->name = "NO NAME";
        $date = date('Y-m-d');
        $this->date_now = $date;
        

        $this->date_limit = $date;
        $this->seats_limit = 10;


        include("database\connection.php"); //   Δημιουργία σύνδεσης με βάση δεδομένων
        $sql = "SELECT * FROM settings";
        
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);
            $this->name = $row['name'];
            $this->date_limit = $row['date_limit'];
            $this->seats_limit = $row['seats_limit'];
        }
        mysqli_close($conn);

        $_SESSION['cinema_name'] = $this->name;
        $_SESSION['date_now'] = $this->date_now;
        $_SESSION['date_limit'] = $this->date_limit;
        $_SESSION['seats_limit'] = $this->seats_limit;

    }

}