<?php
session_start();
$conn = new mysqli("localhost", "root", "", "carecompass_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM doctors";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body class="bg-light" style="background: url('../image/admin.jpg') no-repeat center center/cover;">

    <div class="d-flex" style="min-height: 100vh;">
        <!-- Sidebar -->
        <div class="d-flex flex-column p-3 text-white" style="width: 250px; background-color: #052c65; min-height: 100vh;">
            <h4 class="text-center py-4">Admin Dashboard</h4>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="patient_dashboard.php" class="nav-link text-white">Patient Management</a></li>
                <li class="nav-item"><a href="doctor dashboard.php" class="nav-link text-white">Doctor Management</a></li>
                <li class="nav-item"><a href="staff_management.php" class="nav-link text-white">Staff Management</a></li>
                <li class="nav-item"><a href="billing_management.php" class="nav-link text-white">Billing Management</a></li>
                <li class="nav-item"><a href="report_results.php" class="nav-link text-white">Reports & Results</a></li>
                <li class="nav-item"><a href="service_management.php" class="nav-link text-white">Service Management</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>
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
            
    <div class="container mt-5">
        <h2 class="text-center">Doctor Dashboard</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Specialization</th>
                    <th>Experience</th>
                    <th>Contact</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['specialization']; ?></td>
                    <td><?= $row['experience']; ?> years</td>
                    <td><?= $row['contact']; ?></td>
                    <td><img src="uploads/<?= $row['image']; ?>" width="50" height="50"></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
