<?php
session_start();

include("..\database\connection.php");

if (isset($_POST['save_date'])) {
    $date = date('Y-m-d', strtotime($_POST['active_days']));
    if ($date == '1970-01-01') {
        $_SESSION['status'] = "Empty submition not accepted, enter another date!";
        header("Location:../add_day.php");
    } else {


        $sql = "UPDATE settings
        SET date_limit='$date'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $_SESSION['status'] = "Date values updated succesfully!";
            header("Location:../add_day.php");

        } else {
            $_SESSION['status'] = "Date values were not updated, try again!";
            header("Location:../add_day.php");
        }

    }
}