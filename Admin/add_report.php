<?php
include "db_connect.php";

if (isset($_POST["submit"])) {
    $patient_name = $_POST["patient_name"];
    $test_name = $_POST["test_name"];
    $result = $_POST["result"];

    $stmt = $conn->prepare("INSERT INTO reports (patient_name, test_name, result) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $patient_name, $test_name, $result);

    if ($stmt->execute()) {
        echo "<script>alert('✅ Report Added Successfully!'); window.location='Medical Report Dashboard.php';</script>";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Medical Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light" style="background: url('../image/admin.jpg') no-repeat center center/cover;">
    <div class="container mt-5">
        <h2 class="text-center">📝 Add Medical Report</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label">Patient Name</label>
                <input type="text" name="patient_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Test Name</label>
                <input type="text" name="test_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Result</label>
                <input type="text" name="result" class="form-control" required>
            </div>
            <div class="mb-3">
            <label for="date">Date:</label>
            <input type="date" id="date" class="form-control" name="date" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Add Report</button>
            <a href="Medical Report Dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
        </form>
    </div>
</body>
</html>
