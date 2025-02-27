<?php
include 'db_connect.php';

session_start();

$sql = "SELECT * FROM patients";
$result = $conn->query($sql);
?>
