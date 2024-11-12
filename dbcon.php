<?php
// Database connection settings
$host = "localhost";
$user = "root";
$password = "";
$dbname = "simplepharmacy";

// Create a connection
$con = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>