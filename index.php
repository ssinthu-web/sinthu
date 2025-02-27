<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "carecompass_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get search value
if (isset($_POST['name'])) {
    $name = $conn->real_escape_string($_POST['name']);
    
    // Query to find doctor
    $sql = "SELECT * FROM doctors WHERE name LIKE '%$name%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='card'>";
            echo "<img src='uploads/" . $row['image'] . "' class='card-img-top' style='width: 200px;'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>" . $row['name'] . "</h5>";
            echo "<p class='card-text'><strong>Specialization:</strong> " . $row['specialization'] . "</p>";
            echo "<p class='card-text'><strong>Experience:</strong> " . $row['experience'] . " years</p>";
            echo "<p class='card-text'><strong>Contact:</strong> " . $row['contact'] . "</p>";
            echo "</div></div>";
        }
    } else {
        echo "<p class='text-danger'>No doctor found.</p>";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCH COLOMBO - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    

    <style>
        /* Ensure images and text scale properly */
        img {
            max-width: 100%;
            height: auto;
        }

        /* Custom styling for navbar */
        .navbar-brand img {
            max-width: 80px;
            height: auto;
        }

        /* Make search input fit well on all screens */
        #searchDoctors {
            width: 100%;
            max-width: 300px;
        }

        /* Quick Links - Make sure they stack correctly */
        .quick-links .col-md-4 {
            margin-bottom: 20px;
        }

        /* Footer adjustments */
        .footer .col-md-4 {
            text-align: center;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 24px;
            }

            .hero-section p {
                font-size: 14px;
            }

            .quick-links .col-md-4 {
                text-align: center;
            }
        }
    </style>
    
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
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
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.html">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="services.html">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="doctors.html">Doctors</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="./Admin/admin_login.php">Registration</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Hero Section -->
    <section class="hero-section py-5 bg-light">
        <div class="container">
            <h1 id="h1">Welcome to Care <br> Compass Hospital</h1>
            <p >Your trusted partner in healthcare.<br> Providing top-quality healthcare services with a patient-centered approach.<br> Our dedicated team ensures the best medical care for you and your loved ones.</p>
            <a href="#services" class="btn btn-primary">Explore Services</a>
        </div>
    </section>

    <!-- Quick Links -->
    <section class="quick-links py-5 big-light">
        <div class="quick-links">
            <div class="row">
                <div class="col-md-4 text-center">
                    <h3>Emergency</h3>
                    <p>24/7 emergency services available.</p>
                    <a href="tel:+94212222222" class="btn btn-primary">Emergency: Call Now</a>
                </div>
                <div class="col-md-4 text-center">
                    <h3>Appointments</h3>
                    <p>Book your appointment online.</p>
                    <a href="Book Appointment.php" class="btn btn-primary">Book an Appointment</a>
                </div>
                <div class="col-md-4 text-center">
                    <h3>Find a Doctor</h3>
                    <p>Search for specialist doctors.</p>
                    <div class="mb-4">
                        <input type="text" id="searchDoctors"  placeholder="Search doctors..." >
                        <button class="btn btn-primary" onclick="searchDoctor()">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- Announcements Section -->
        <section class="announcements py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4 " id="h2">Announcements</h2>
        <div class="row">
            <div class="col-md-4 announcements-r">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">New COVID-19 Guidelines</h5>
                        <p class="card-text">Learn about the latest COVID-19 safety measures at our hospital.</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 announcements-r">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Health Camp in Jaffna</h5>
                        <p class="card-text">Join our free health camp on November 15th, 2023.</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 announcements-r">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Free Eye Checkup</h5>
                        <p class="card-text">Get a free eye checkup at our hospital on December 5th, 2023.</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    
        <!-- Testimonials Section -->
        <section class="testimonials py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4" id="h2">What Our Patients Say</h2>
        <div class="row">
            <div class="col-md-4">
                    <div class="card-body">
                        <blockquote class="blockquote">
                            <p class="mb-3">"Excellent service and caring staff.  Thank you!"</p>
                        </blockquote>
                        <h5 class="card-title">- John Doe</h5>
                        <div class="stars" aria-label="5-star rating">★★★★★</div>
                </div>
            </div>
            <div class="col-md-4">
                    <div class="card-body">
                        <blockquote class="blockquote">
                            <p class="mb-3">"The doctors are very knowledgeable and friendly."</p>
                        </blockquote>
                        <h5 class="card-title">- Jane Smith</h5>
                        <div class="stars" aria-label="5-star rating">★★★★★</div>
                    </div>
            </div>
            <div class="col-md-4">
                    <div class="card-body">
                        <blockquote class="blockquote">
                            <p class="mb-3">"Clean facilities and quick service. Thank you!"</p>
                        </blockquote>
                        <h5 class="card-title">- David Brown</h5>
                        <div class="stars" aria-label="5-star rating">★★★★★</div>
                    </div>
            </div>
        </div>
    </div>
</section>


    
        <!-- Gallery Section -->
        <section class="gallery py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-4" id="h2">Our Facilities</h2>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="gallery-item">
                            <img src=".\image\eye.jpg" alt="Eye Clinic" class="img-fluid">
                            <div class="caption"><a href="#">Eye Clinic</a></div>
                        </div>  
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="gallery-item">
                            <img src=".\image\ent.jpg" alt="ENT Treatment" class="img-fluid">
                            <div class="caption"><a href="ENT.html">ENT Treatment</a></div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="gallery-item">
                            <img src=".\image\Dialysis.jpg" alt="Dialysis" class="img-fluid">
                            <div class="caption"><a href="Dialysis.html">Dialysis</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <hr>
        <section class="">

        </section>
    
        <!-- Call-to-Action Section -->
        <section class="cta-section text-center text-white py-5">
            <div class="container">
                <h2 class="mb-4" id="h2">Need Medical Assistance?</h2>
                <p class="lead">Contact us today to book an appointment or for any inquiries.</p>
                <a href="contact.php" class="btn btn-primary">Contact Us</a>
            </div>
        </section>

        <hr>


    <!-- Footer -->
    <footer class="footer bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-p">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="text-white">Home</a></li>
                        <li><a href="about.html" class="text-white">About Us</a></li>
                        <li><a href="services.html" class="text-white">Services</a></li>
                        <li><a href="doctors.html" class="text-white">Doctors</a></li>
                        <li><a href="contact.php" class="text-white">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-4 footer-p">
                    <h5>Contact Us</h5>
                    <p>
                        CCH Colombo,<br>
                        123 Hospital Road,<br>
                        Colombo, Sri Lanka.<br>
                        Phone: +94 21 222 2222<br>
                        Email: info@cchcolombo.com
                    </p>
                </div>
                <div class="col-md-4 text-center footer-p">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
                    function searchDoctor() {
                        var searchValue = $("#search").val();
                        $.ajax({
                            url: "doctors.html",
                            type: "POST",
                            data: { name: searchValue },
                            success: function(response) {
                                $("#doctorDetails").html(response);
                            }
                        });
                    }
                </script>
</html>