<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
?>
<?php if (isset($_GET['status']) && $_GET['status'] == 'patient_added'): ?>
    <div class="alert alert-success text-center">
        Patient added successfully.
    </div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
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

            <!-- Patient Dashboard -->
            <div class="container mt-5">
                <h2 class="text-center">Patient Dashboard</h2>

                <!-- Success Message -->
                <?php if (isset($_GET['status']) && $_GET['status'] == 'deleted'): ?>
                    <div class="alert alert-success text-center">
                        Patient deleted successfully.
                    </div>
                <?php endif; ?>

                <?php 
                include 'fetch_patient.php'; 
                ?>

                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title text-center">Patient Information</h5>
                        <table class="table table-bordered">
                        <thead class="table-dark">
                             <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>DOB</th>
                                <th>Gender</th>
                                <th>Medical History</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <td>{$row['Name']}</td>
                                        <td>{$row['Email']}</td>
                                        <td>{$row['Phone']}</td>
                                        <td>{$row['DOB']}</td>
                                        <td>{$row['Gender']}</td>
                                        <td>{$row['Medical_History']}</td>
                                        <td>
                                            <a href='delete_patient.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                                        </td>
                                    </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7' class='text-center'>No records found</td></tr>";
                            }
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="billing.php" class="btn btn-warning">Billing & Payments</a>
                    <a href="add_patient.php" class="btn btn-success">Add New Patient</a>
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                </div>

            </div>
        </div>
    </div>

            <!-- Footer -->
            <footer class="footer">
            <p>&copy; 2025 Care Compass Hospital. All rights reserved.</p>
        </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
