<?php
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "carecompass_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $specialization = $_POST['specialization'];
    $experience = $_POST['experience'];
    $contact = $_POST['contact'];

    // Image upload
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);
    $target_dir = "uploads/"; 

// Ensure the directory exists
    if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true); // Create directory with full permissions
    }

    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "<p style='color:green;'>Doctor registered successfully!</p>";
    } else {
    echo "<p style='color:red;'>Error uploading the file.</p>";
    }



    // Insert data into the database
    $sql = "INSERT INTO doctors (name, email, specialization, experience, contact, image) 
            VALUES ('$name', '$email', '$specialization', '$experience', '$contact', '$image)";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>Doctor registered successfully!</p>";
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="admin_dashboard.html">Admin Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="doctor_registration.html">Register Doctor</a></li>
                        <li class="nav-item"><a class="nav-link" href="staff_registration.html">Register Staff</a></li>
                        <li class="nav-item"><a class="nav-link" href="patient_registration.html">Register Patient</a></li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="loginDropdown" role="button" data-bs-toggle="dropdown">
                                Login
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="doctor_login.html">Doctor Login</a></li>
                                <li><a class="dropdown-item" href="staff_login.html">Staff Login</a></li>
                                <li><a class="dropdown-item" href="patient_login.html">Patient Login</a></li>
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body p-4">
                        <h3 class="text-center mb-3">Doctor Registration</h3>

                        <!-- Registration Form -->
                        <form method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                    <input type="text" name="name" class="form-control" placeholder="Enter doctor's full name" required>
                                    <div class="invalid-feedback">Please enter the doctor's full name.</div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                    <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                                    <div class="invalid-feedback">Please enter a valid email.</div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Specialization</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-hospital"></i></span>
                                    <input type="text" name="specialization" class="form-control" placeholder="Enter specialization" required>
                                    <div class="invalid-feedback">Please enter specialization.</div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Experience (Years)</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-award-fill"></i></span>
                                    <input type="number" name="experience" class="form-control" placeholder="Enter years of experience" required>
                                    <div class="invalid-feedback">Please enter experience in years.</div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Contact Number</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                    <input type="tel" name="contact" class="form-control" placeholder="Enter contact number" required>
                                    <div class="invalid-feedback">Please enter a valid contact number.</div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Upload Image</label>
                                <div class="input-group">
                                    <input type="file" name="image" class="form-control" required>
                                    <div class="invalid-feedback">Please upload a profile image.</div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </form>

                        <p class="text-center mt-3">Already registered? <a href="doctor_login.html">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Bootstrap Form Validation
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })();
    </script>
</body>
</html>
