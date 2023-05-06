<?php
include '../database/connection.php';
if (isset($_POST['decline'])) {
    $res_id = $_POST['decline'];
    $query = "DELETE FROM `reservations` WHERE res_id = '$res_id'";
    $run = mysqli_query($conn, $query);
    if ($run) {
        echo '<script type = "text/javascript">';
        echo 'alert("This reservation was declined succesfully");';
        echo 'window.location.href = "../reserve_req.php"';
        echo '</script>';

    }







} elseif (isset($_POST['accept'])) {

    $res_id = $_POST['accept'];
    $query = "UPDATE reservations SET approved = 2 WHERE res_id = '$res_id'";
    $run = mysqli_query($conn, $query);

    if ($run) {
        echo '<script type = "text/javascript">';
        echo 'alert("This reservation has been approved succesfully");';
        echo 'window.location.href = "../reserve_req.php"';
        echo '</script>';

    }






}


?>