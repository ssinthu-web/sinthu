<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

include 'fetch_patient.php'; // Include the connection file to the database

if (isset($_GET['id'])) {
    // Get the patient ID from the URL
    $patient_id = $_GET['id'];

    // SQL query to delete the patient based on the ID
    $sql = "DELETE FROM patients WHERE id = ?";

    // Prepare and execute the statement
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $patient_id); // 'i' indicates an integer parameter
        if ($stmt->execute()) {
            // Redirect back to the patient dashboard after deletion
            header("Location: patient_dashboard.php?status=deleted");
            exit();
        } else {
            // If there is an error in the deletion
            echo "Error deleting patient: " . $conn->error;
        }
    }
    $stmt->close();
}

$conn->close();
?>
