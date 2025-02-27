<?php
include "db_connect.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    // Debugging: Print the ID value
    echo "Received ID: " . htmlspecialchars($id) . "<br>";

    $sql = "DELETE FROM reports WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("❌ SQL Error: " . $conn->error); // Check for SQL errors
    }

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('✅ Report Deleted Successfully!'); window.location='Medical Report Dashboard.php';</script>";
    } else {
        echo "❌ Execution Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    die("❌ Error: No ID provided.");
}

?>
