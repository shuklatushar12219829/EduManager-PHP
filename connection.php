<?php
$servername = "localhost";
$username = "root"; // default username for XAMPP/WAMP
$password = ""; // default password for XAMPP/WAMP
$dbname = "id16300291_project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>