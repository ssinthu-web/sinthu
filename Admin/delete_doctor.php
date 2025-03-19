<?php
include 'db_connect.php'; 

if (isset($_GET['id'])) {
    $doctor_id = $_GET['id'];

    $sql = "DELETE FROM doctors WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $doctor_id);

    if ($stmt->execute()) {
        echo "Doctor deleted successfully.";
    } else {
        echo "Error deleting doctor: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "No doctor ID provided.";
}
?>
