<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

include 'fetch_patient.php';

if (isset($_GET['id'])) {
    $patient_id = $_GET['id'];

    $sql = "DELETE FROM patients WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $patient_id); 
        if ($stmt->execute()) {
            header("Location: patient_dashboard.php?status=deleted");
            exit();
        } else {
            echo "Error deleting patient: " . $conn->error;
        }
    }
    $stmt->close();
}

$conn->close();
?>
