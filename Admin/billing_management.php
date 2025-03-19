<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

include 'db_connect.php';

// Get report_id and patient_id from URL if available
$selected_report_id = isset($_GET['report_id']) ? $_GET['report_id'] : "";
$selected_patient_id = isset($_GET['patient_id']) ? $_GET['patient_id'] : "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_id = $_POST['patient_id'];
    $report_id = $_POST['report_id'];
    $amount = $_POST['amount'];
    $payment_method = $_POST['payment_method'];
    $payment_status = $_POST['payment_status'];

    $sql = "INSERT INTO billing (patient_id, report_id, amount, payment_method, payment_status) 
            VALUES (?, ?, ?, ?, ?)";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("iidss", $patient_id, $report_id, $amount, $payment_method, $payment_status);
        
        if ($stmt->execute()) {
            echo "<script>alert('✅ Billing information added successfully!'); window.location='billing_management.php';</script>";
        } else {
            $error_message = "Error adding billing information: " . $conn->error;
        }
        
        $stmt->close();
    } else {
        $error_message = "Error preparing statement: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="Adminstyles.css">
</head>
<body class="bg-light" style="background: url('../image/A.jpg') no-repeat center center/cover;">

    <div class="sidebar">
        <h4>Admin Dashboard</h4>
        <ul class="nav flex-column">
            <li class="nav-item"><a href="patient_dashboard.php" class="nav-link">Patient Management</a></li>
            <li class="nav-item"><a href="doctor_dashboard.php" class="nav-link">Doctor Management</a></li>
            <li class="nav-item"><a href="staff_dashboard.php" class="nav-link">Staff Management</a></li>
            <li class="nav-item"><a href="billing_management.php" class="nav-link">Billing Management</a></li>
            <li class="nav-item"><a href="medical_report_dashboard.php" class="nav-link">Reports & Results</a></li>
            <li class="nav-item"><a href="services_dashboard.php" class="nav-link">Service Management</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
        </ul>
    </div>

    <div class="main-content">
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
            <div class="container">
                <a class="navbar-brand" href="../index.php">Care Compass Hospital</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-lg">
                        <div class="card-body p-4">
                            <h3 class="text-center mb-3">Patient Billing</h3>

                            <?php if (isset($error_message)): ?>
                                <div class="alert alert-danger text-center"><?php echo $error_message; ?></div>
                            <?php endif; ?>

                            <form method="POST">
                                <div class="mb-3">
                                    <label class="form-label">Select Patient</label>
                                    <select name="patient_id" class="form-select" required>
                                        <option value="">Select a Patient</option>
                                        <?php
                                        $sql = "SELECT id, Name FROM patients";
                                        $result = $conn->query($sql);
                                        while ($row = $result->fetch_assoc()) {
                                            $selected = ($row['id'] == $selected_patient_id) ? "selected" : "";
                                            echo "<option value='{$row['id']}' $selected>{$row['Name']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Select Report</label>
                                    <select name="report_id" class="form-select" required>
                                        <option value="">Select a Report</option>
                                        <?php
                                        $sql = "SELECT report_id, test_name FROM medicalreports WHERE patient_id = ?";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->bind_param("i", $selected_patient_id);
                                        $stmt->execute();
                                        $stmt_result = $stmt->get_result();
                                        while ($row = $stmt_result->fetch_assoc()) {
                                            $selected = ($row['report_id'] == $selected_report_id) ? "selected" : "";
                                            echo "<option value='{$row['report_id']}' $selected>{$row['test_name']}</option>";
                                        }
                                        $stmt->close();
                                        ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Amount</label>
                                    <input type="number" step="0.01" name="amount" class="form-control" placeholder="Enter bill amount" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Payment Method</label>
                                    <select name="payment_method" class="form-select" required>
                                        <option value="">Select Payment Method</option>
                                        <option value="cash">Cash</option>
                                        <option value="card">Card</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Payment Status</label>
                                    <select name="payment_status" class="form-select" required>
                                        <option value="">Select Payment Status</option>
                                        <option value="paid">Paid</option>
                                        <option value="pending">Pending</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Add Billing Information</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <footer class="footer">
            <p>&copy; 2025 Care Compass Hospital. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
