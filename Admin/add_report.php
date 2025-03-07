<?php
include "db_connect.php";

// Fetch all patients to populate the dropdown
$patients_sql = "SELECT id, Name FROM patients";
$patients_result = $conn->query($patients_sql);

if (isset($_POST["submit"])) {
    $patient_id = $_POST["patient_id"];  // Get the selected patient ID from the form
    $test_name = $_POST["test_name"];
    $result = $_POST["result"];
    $date = $_POST["date"];

    // Insert report with selected patient
    $stmt = $conn->prepare("INSERT INTO medicalreports (patient_id, test_name, result, date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $patient_id, $test_name, $result, $date);

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
                <label class="form-label">Select Patient</label>
                <select name="patient_id" class="form-select" required>
                    <option value="">Select a Patient</option>
                    <?php while ($patient = $patients_result->fetch_assoc()) { ?>
                        <option value="<?php echo $patient['id']; ?>"><?php echo $patient['Name']; ?></option>
                    <?php } ?>
                </select>
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
