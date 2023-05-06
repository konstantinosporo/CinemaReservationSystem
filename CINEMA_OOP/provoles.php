<?php



session_start();
if (!isset($_SESSION['username'])) {
      Header("Location:index.php");
}
include("headers\header_logged_in.php");
?>