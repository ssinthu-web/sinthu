<?php
session_start();
$conn = new mysqli("localhost", "root", "", "carecompass_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM administrators WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify hashed password
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin'] = $username;
            header("Location: admin_dashboard.php");
            exit();
        } else {
            echo "<p style='color:red;'>Invalid credentials</p>";
        }
    } else {
        echo "<p style='color:red;'>Invalid credentials</p>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCH COLOMBO - Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
    
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <!-- Logo and Brand Name -->
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="../image/logo.png" alt="Care Compass Hospital Logo" width="100" height="80" class="me-2">
            <span class="fw-bold">Care Compass Hospital</span>
        </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../about.html">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../services.html">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../doctors.html">Doctors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./Admin/admin_login.php">Registration</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    
    <section class="admin-login-section">
    <div class="card shadow-lg">
        <h3 class="text-center mb-3 bold">Admin Login</h3>
        
        <!-- Display error message if login fails -->
        <?php if (isset($error)): ?>
            <div class="alert alert-danger text-center"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-label">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-label">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</section>


        <!-- Footer -->
        <footer class="footer bg-dark text-white py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h5>Quick Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="index.php" class="text-white">Home</a></li>
                            <li><a href="about.html" class="text-white">About Us</a></li>
                            <li><a href="services.html" class="text-white">Services</a></li>
                            <li><a href="doctors.html" class="text-white">Doctors</a></li>
                            <li><a href="contact.php" class="text-white">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h5>Contact Us</h5>
                        <p>
                            CCH Colombo,<br>
                            123 Hospital Road,<br>
                            Colombo, Sri Lanka.<br>
                            Phone: +94 21 222 2222<br>
                            Email: info@cchcolombo.com
                        </p>
                    </div>
                    <div class="col-md-4 text-center">
                        <h5>Follow Us</h5>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white"><i class="fab fa-facebook"></i> Facebook</a></li>
                            <li><a href="#" class="text-white"><i class="fab fa-twitter"></i> Twitter</a></li>
                            <li><a href="#" class="text-white"><i class="fab fa-instagram"></i> Instagram</a></li>
                            <li><a href="#" class="text-white"><i class="fab fa-youtube"></i> Youtube</a></li>
                            <li><a href="#" class="text-white"><i class="fab fa-linkedin"></i> Linkedin</a></li>
                        </ul>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <p>&copy; 2025 CCH Colombo. All rights reserved.</p>
                </div>
            </div>
        </footer>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>