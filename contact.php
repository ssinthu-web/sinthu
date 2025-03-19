<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Database connection
    $conn = new mysqli("localhost", "root", "", "carecompass_db");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert into database
    $sql = "INSERT INTO contact_messages (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Thank you for contacting us! We will get back to you soon.";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCH COLOMBO - Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
        <!-- Logo and Brand Name -->
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="./image/logo.png" alt="Care Compass Hospital Logo" width="100" height="80" class="me-2">
            <span class="fw-bold">Care Compass Hospital</span>
        </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about.html">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="services.html">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="doctors.html">Doctors</a></li>
                <li class="nav-item"><a class="nav-link active" href="contact.php">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="./Admin/admin_login.php">Registration</a></li>
            </ul>
        </div>
    </div>
    </nav>

    <!-- Contact Section -->
    <section class="CS py-5 text-center">
        <div class="container">
            <h2 id="h2">Contact Us</h2>
        </div>
    </section>
    <main>
    <section class="contact-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" Name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="5" name="message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
               <!-- Contact Details and Map -->
               <div class="col-md-6">
                <h3>Contact Details</h3>
                <p><strong>Address:</strong><br>CCH Colombo,<br>123 Hospital Road,<br>Colombo, Sri Lanka.</p>
                <p><strong>Phone:</strong><br>+94 21 222 2222</p>
                <p><strong>Email:</strong><br>info@cchcolombo.com</p>

                <h3 class="mt-4">Location</h3>
                <!-- Google Maps Embed -->
                <div class="map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.8354345093747!2d80.0244153153166!3d9.661758293153934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afe547f5f5f5f5f%3A0x5f5f5f5f5f5f5f5f!2sNCH%20Jaffna!5e0!3m2!1sen!2slk!4v1631234567890!5m2!1sen!2slk"
                        width="100%"
                        height="300"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
                </div>
             </div>
            </div>
        </div>
    </section>
</main>

    <!-- Footer -->
    <footer class="footer bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="Home.html" class="text-white">Home</a></li>
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
                        <li><a href="#" class="text-white">Facebook</a></li>
                        <li><a href="#" class="text-white">Twitter</a></li>
                        <li><a href="#" class="text-white">Instagram</a></li>
                        <li><a href="#" class="text-white">Youtube</a></li>
                        <li><a href="#" class="text-white">Linkedin</a></li>
                    </ul>
                </div>
            </div>
            <div class="text-center mt-3">
                <p>&copy; 2025 CCH Colombo. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>