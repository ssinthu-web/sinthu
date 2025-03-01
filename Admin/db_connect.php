<?php
// Database connection settings for XAMPP
$host = "localhost";  // XAMPP uses localhost for MySQL
$user = "root";       // Default username for MySQL in XAMPP
$password = "";       // Default password for MySQL in XAMPP
$dbname = "carecompass_db";  // Name of your database

// Create a connection to the database
$conn = new mysqli($host, $user, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
