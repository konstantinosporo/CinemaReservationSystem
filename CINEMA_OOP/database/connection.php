<?php
$servername = "localhost";
$passname = "root";
$password = "";
$database = "cinema_system";


// Δημιουργία σύνδεσης 
$conn = new mysqli($servername, $passname, $password, $database, );

// Έλεγχος σύνδεσης 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

