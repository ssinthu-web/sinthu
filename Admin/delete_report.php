<?php
include "db_connect.php";

if (isset($_GET["report_id"])) {
    $report_id = $_GET["report_id"];

    // Debugging: Print the report_id value
    echo "Received report_id: " . htmlspecialchars($report_id) . "<br>";

    $sql = "DELETE FROM medicalreports WHERE report_id = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("❌ SQL Error: " . $conn->error); // Check for SQL errors
    }

    $stmt->bind_param("i", $report_id);

    if ($stmt->execute()) {
        echo "<script>alert('✅ Report Deleted Successfully!'); window.location='Medical_Report_Dashboard.php';</script>";
    } else {
        echo "❌ Execution Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    die("❌ Error: No report_id provided.");
}
?>
