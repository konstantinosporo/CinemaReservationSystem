<?php

class User //Δημιουργία κλάσης με όνομα User

{
    //Καθορίσμος public μεταβλητών 
    public $username;
    public $password;
    public $name;
    public $email;
    public $isadm;
    public function login() //Δημιουργία μεθόδου με όνομα login

    {

        include("database\connection.php"); //   Δημιουργία σύνδεσης με βάση δεδομένων
        $sql = "SELECT * FROM users 
        where username='" . $this->username . "' and 
        password='" . md5($this->password) . "'"; //Ερώτημα SQL SELECT DQL (DATA QUERY)
        $result = mysqli_query($conn, $sql); //'Ελεγχος λειτουργίας του ερωτήματος
        if (mysqli_num_rows($result) > 0) { /* 'Ελεγχος πλήθους υπάρχοντων γραμμών 
             που συμβαδίζουν με την παραπάνω συνθήκη του ερωτήματος SQL */

            while ($row = mysqli_fetch_assoc($result)) { //Loop τύπου while με συνθήκη boolean

                // Δίνεται  στις μεταβλητές που δημιουργήθηκαν παραπάνω οι τιμές από την βάση δεδομένων.
                $this->username = $row['username'];
                $this->name = $row['name'];
                $this->email = $row['email'];
                $this->isadm = $row['isadm'];
            }
            mysqli_close($conn); //Τερματισμός σύνδεσης με βάση δεδομένων.

            //Αποθήκευση ,στον πίνακα SESSION, των δεδομένων του χρήστη που συνδέθηκε 
            $_SESSION['email'] = $this->email;
            $_SESSION['name'] = $this->name;
            $_SESSION['username'] = $this->username;
            $_SESSION['isadm'] = $this->isadm;
            //Έλεγχος τύπου εισόδου ADMIN/USER
            if ($_SESSION['isadm'] == 1) {
                Header("Location:admin_menu.php");
            } else {
                Header("Location:menu.php");
            }

        }

        mysqli_close($conn); //Τερματισμός σύνδεσης με βάση δεδομένων.

    }

    public function signup() //Δημιουργία μεθόδου με όνομα signup

    {

        include("database\connection.php"); //   Δημιουργία σύνδεσης με βάση δεδομένων
        $sql = "SELECT * FROM users where username='" . $this->username . "'"; //Ερώτημα SQL SELECT 

        $result = mysqli_query($conn, $sql); //'Ελεγχος λειτουργίας του ερωτήματος

        if (mysqli_num_rows($result) > 0) { /* 'Ελεγχος πλήθους υπάρχοντων γραμμών που 
             συμβαδίζουν με την παραπάνω συνθήκη του ερωτήματος SQL*/
            echo '<script type = "text/javascript">';
            echo 'alert("Account information already exists!");';
            echo 'window.location.href = "signup.php"';
            echo '</script>';
            mysqli_close($conn); //Τερματισμός σύνδεσης με βάση δεδομένων εάν βρεθούν ήδη υπάρχοντα δεδομένα 

        } else {
            $sql = "INSERT INTO users  
            (username,password,name,email,isadm) values ('" //Ερώτημα SQL INSERT DML (DATA MANIPULATION)

                //Εισαγωγή νέου χρήστη στον πίνακα users
                . $this->username . "','"
                . md5($this->password) . "','"
                . $this->name . "','"
                . $this->email . "','"
                . $this->isadm . "')";

            $result = mysqli_query($conn, $sql); //'Ελεγχος λειτουργίας του ερωτήματος

            if ($result) { //Συνθήκη boolean
                echo '<script type = "text/javascript">';
                echo 'alert("Successful registration.");';
                echo 'window.location.href = "index.php"';
                echo '</script>';
                mysqli_close($conn); //Τερματισμός σύνδεσης με βάση δεδομένων.

                //Αποθήκευση ,στον πίνακα SESSION, των δεδομένων του χρήστη που έκανε εγγραφή
                $_SESSION['email'] = $this->email;
                $_SESSION['name'] = $this->name;
                $_SESSION['username'] = $this->username;
                $_SESSION['isadm'] = $this->isadm;
                //Ανακατέθυνση στην σελίδα menu.php 

            }
            mysqli_close($conn); //Τερματισμός σύνδεσης με βάση δεδομένων.

        }
    }
}