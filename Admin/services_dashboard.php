<?php
include('db_connect.php');

// Fetch all services from the database
$sql = "SELECT * FROM services ORDER BY id ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Management Dashboard</title>
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
            <li class="nav-item"><a href="services_dashboard.php" class="nav-link active">Service Management</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
        </ul>
    </div>

    <div class="main-content">
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
            <div class="container">
                <a class="navbar-brand" href="../index.php">Care Compass Hospital</a>
            </div>
        </nav>

        <div class="container mt-5">
            <h1 class="text-center">Service Management</h1>

            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title text-center">Services</h5>
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Service Name</th>
                                <th>Description</th>
                                <th>Date & Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><?php echo htmlspecialchars($row['name']); ?></td>
                                <td><?php echo htmlspecialchars($row['description']); ?></td>
                                <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                                <td>
                                    <a href="delete_service.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"
                                       onclick="return confirm('Are you sure you want to delete this service?');">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="text-center mt-4">
                        <a href="add_service.php" class="btn btn-success">Add New Service</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer text-center mt-4">
            <p>&copy; 2025 Care Compass Hospital. All rights reserved.</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
