<?php
include 'db_connect.php';

// No need to call session_start() here if it's already done in the main script

$sql = "SELECT * FROM patients";
$result = $conn->query($sql);
?>
