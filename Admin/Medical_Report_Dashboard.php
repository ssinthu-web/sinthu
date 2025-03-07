<?php
include "db_connect.php";

// Fetch all reports
$sql = "SELECT * FROM medicalreports ORDER BY date DESC";
$result = $conn->query($sql);

// Fetch all patients to populate the dropdown
$patients_sql = "SELECT id, Name FROM patients";
$patients_result = $conn->query($patients_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Report Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="Adminstyles.css">
</head>
<body class="bg-light" style="background: url('../image/A.jpg') no-repeat center center/cover;">

        <!-- Sidebar -->
        <div class="sidebar">
            <h4>Admin Dashboard</h4>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="patient_dashboard.php" class="nav-link">Patient Management</a></li>
                <li class="nav-item"><a href="doctor_dashboard.php" class="nav-link">Doctor Management</a></li>
                <li class="nav-item"><a href="staff_dashboard.php" class="nav-link">Staff Management</a></li>
                <li class="nav-item"><a href="billing_management.php" class="nav-link">Billing Management</a></li>
                <li class="nav-item"><a href="medical_report_dashboard.php" class="nav-link">Reports & Results</a></li>
                <li class="nav-item"><a href="service_management.php" class="nav-link">Service Management</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
            </ul>
        </div>
        
        <!-- Main Content -->
        <div class="main-content">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
                <div class="container">
                    <a class="navbar-brand" href="../index.php">Care Compass Hospital</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>

            
    <div class="container mt-5">
        <h2 class="text-center">📊 Medical Reports Dashboard</h2>
        <table class="table table-bordered mt-3">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Patient Name</th>
                    <th>Test Name</th>
                    <th>Result</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['patient_name']; ?></td>
                        <td><?php echo $row['test_name']; ?></td>
                        <td><?php echo $row['result']; ?></td>
                        <td><?php echo $row['date']; ?></td>
              
                        <td>
                            <a href="delete_report.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>

    <!-- Add Report Button -->
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addReportModal">➕ Add Report</button>

    <!-- Add Report Modal -->
    <div class="modal fade" id="addReportModal" tabindex="-1" aria-labelledby="addReportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addReportModalLabel">📝 Add Medical Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="add_report.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Patient</label>
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
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Footer -->
            <footer class="footer">
            <p>&copy; 2025 Care Compass Hospital. All rights reserved.</p>
        </footer>
</html>

<?php $conn->close(); ?>
