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
        <style>
            /* Custom styles */
            body {
                font-family: Arial, sans-serif;
            }

            .bg-primary-custom {
                background-color: #052c65 !important;
            }

            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                bottom: 0;
                width: 250px;
                background-color: #052c65;
                padding-top: 20px;
            }

            .sidebar h4 {
                color: #fff;
                text-align: center;
            }

            .sidebar a {
                color: #fff;
                text-decoration: none;
                padding: 10px 15px;
                display: block;
                margin: 10px 0;
            }

            .sidebar a:hover {
                background-color: #03477b;
                border-radius: 5px;
            }

            .main-content {
                margin-left: 250px;
                padding: 20px;
            }

            .navbar-custom {
                background-color: #052c65;
            }

            .navbar-custom .navbar-nav .nav-link {
                color: #fff;
            }

            .navbar-custom .navbar-nav .nav-link:hover {
                color: #e1e1e1;
            }

            .container-custom {
                margin-top: 50px;
            }

            .footer {
                position: fixed;
                bottom: 0;
                width: 100%;
                background-color: #052c65;
                color: white;
                padding: 10px;
                text-align: center;
            }
        </style>
    </head>
    <body class="bg-light">

        <!-- Sidebar -->
        <div class="sidebar">
            <h4>Admin Dashboard</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="patient_dashboard.php" class="nav-link">Patient Management</a>
                </li>
                <li class="nav-item">
                    <a href="doctor_dashboard.php" class="nav-link">Doctor Management</a>
                </li>
                <li class="nav-item">
                    <a href="staff_dashboard.php" class="nav-link">Staff Management</a>
                </li>
                <li class="nav-item">
                    <a href="billing_management.php" class="nav-link">Billing Management</a>
                </li>
                <li class="nav-item">
                    <a href="medical_report_dashboard.php" class="nav-link">Reports & Results</a>
                </li>
                <li class="nav-item">
                    <a href="service_management.php" class="nav-link">Service Management</a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">Logout</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
                <div class="container">
                    <a class="navbar-brand" href="#">Care Compass Hospital</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>

            <!-- Welcome Section -->
            <div class="container container-custom">
                <h1 class="text-center text-primary-custom">Welcome, Admin</h1>
                <p class="text-center text-muted">Manage hospital operations efficiently.</p>

                <!-- Quick Actions Section -->
                <div class="row mt-5">
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Patient Management</h5>
                                <p class="card-text">Manage patient records, appointments, and history.</p>
                                <a href="patient_dashboard.php" class="btn btn-primary">Go to Patient Dashboard</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Doctor Management</h5>
                                <p class="card-text">Manage doctor schedules, profiles, and departments.</p>
                                <a href="doctor_dashboard.php" class="btn btn-primary">Go to Doctor Dashboard</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Staff Management</h5>
                                <p class="card-text">Oversee staff schedules, payroll, and roles.</p>
                                <a href="staff_dashboard.php" class="btn btn-primary">Go to Staff Dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <p>&copy; 2025 Care Compass Hospital. All rights reserved.</p>
        </footer>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
