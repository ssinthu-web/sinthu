<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
</head>
<body class="bg-light" style="background: url('../image/admin.jpg') no-repeat center center/cover;">

    <div class="d-flex" style="min-height: 100vh;">
        <!-- Sidebar -->
        <div class="d-flex flex-column p-3 text-white" style="width: 250px; background-color: #052c65; min-height: 100vh;">
            <h4 class="text-center py-4">Admin Dashboard</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="patient dashboard.html" class="nav-link text-white">Patient Management</a>
                </li>
                <li class="nav-item">
                    <a href="doctor dashboard.php" class="nav-link text-white">Doctor Management</a>
                </li>
                <li class="nav-item">
                    <a href="staff_management.php" class="nav-link text-white">Staff Management</a>
                </li>
                <li class="nav-item">
                    <a href="billing_management.php" class="nav-link text-white">Billing Management</a>
                </li>
                <li class="nav-item">
                    <a href="report_results.php" class="nav-link text-white">Reports & Results</a>
                </li>
                <li class="nav-item">
                    <a href="service_management.php" class="nav-link text-white">Service Management</a>
                </li>
                <li class="nav-item">
                    <a href="booking_management.php" class="nav-link text-white">Booking Management</a>
                </li>
                <li class="nav-item">
                    <a href="logout.php"class="nav-link text-white">Logout</a>
                </li>
            </ul>
        </div>
        
        <!-- Main Content -->
        <div class="flex-grow-1">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #052c65;">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="loginDropdown" role="button" data-bs-toggle="dropdown">Registration</a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="doctor_registration.php">Register Doctor</a></li>
                                    <li><a class="dropdown-item" href="staff_registration.php">Register Staff</a></li>
                                    <li><a class="dropdown-item" href="patient_registration.php">Register Patient</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Welcome Section -->
            <div class="container mt-5 text-center text-white">
                <h1 id="h2">Welcome, Admin</h1>
                <p class="text-muted">Manage hospital operations efficiently.</p>
            </div>

            <!-- Quick Actions -->
            
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>