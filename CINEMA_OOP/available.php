<?php

session_start();
if (!isset($_SESSION['username'])) {
      Header("Location:index.php");
}
include("functions\Venue.php");
$username = $_SESSION['username'];

$what_show = $_GET['s'];
$what_date = $_GET['d'];




$what_venue = new Venue();
$what_venue->show_venue($what_date, $what_show);
$seats_json = json_encode($what_venue->venue_seats);
echo $seats_json;

?>