<?php
include('db_connect.php');

if (isset($_GET['id'])) {
    $service_id = intval($_GET['id']);
    $sql = "DELETE FROM services WHERE id = ?";

    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("i", $service_id);
        if ($stmt->execute()) {
            header("Location: services_dashboard.php?success=Service deleted successfully");
            exit();
        } else {
            header("Location: services_dashboard.php?error=Error deleting service");
            exit();
        }
    } else {
        header("Location: services_dashboard.php?error=Database error");
        exit();
    }
}
?>
