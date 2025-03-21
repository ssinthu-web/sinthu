<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCH COLOMBO - About Us</title>
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
                    <li class="nav-item"><a class="nav-link active" href="about.html">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="services.html">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="doctors.html">Doctors</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="./Admin/admin_login.php">Registration</a></li>
                </ul>
            </div>
        </div>
    </nav>
          <!-- Hero Section -->
  <section class="hero-about text-center">
    <div class="container">
      <h1>About Us</h1>
      <p>Discover our journey, mission, and commitment to excellence in healthcare.</p>
    </div>
  </section>

  <!-- About Content Section -->
  <main>
    <section class="about-content py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <img src="./image/about.jpg" alt="Our Hospital" class="img-fluid rounded shadow">
          </div>
          <div class="col-md-6">
            <h2>Our Story</h2>
            <p>Founded with a passion for providing exceptional healthcare services, NCH Jaffna has grown to become a trusted name in the region.
              Our commitment to patient-centered care, innovative treatment, and compassionate service has shaped our legacy.</p>
            <p>From humble beginnings to a state-of-the-art facility, our journey is a testament to the dedication and hard work of our team.
              We continue to embrace advancements in medicine while upholding our core values of integrity, excellence, and empathy.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Mission & Vision Section -->
    <section class="mission-vision py-5 bg-light">
      <div class="container text-center">
        <div class="row">
          <div class="col-md-6 mb-4">
            <h3>Our Mission</h3>
            <p>To deliver high-quality, affordable healthcare with a focus on patient safety and satisfaction.
              We strive to be a leader in medical innovation and compassionate care.</p>
          </div>
          <div class="col-md-6 mb-4">
            <h3>Our Vision</h3>
            <p>To be the healthcare provider of choice in the region by continually improving our services,
              embracing technology, and fostering a culture of excellence and respect.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Team Section -->
    <section class="team py-5">
      <div class="container">
        <h2 class="text-center mb-5">Meet Our Team</h2>
        <div class="row">
          <!-- Team Member -->
          <div class="col-md-4 text-center">
            <div class="team-member">
              <a href="doctors.html"><img src="./image/doctor1.jpg" alt="Dr. A. Kumar" class="img-fluid rounded-circle mb-3"></a>
              <h5>Dr. A. Kumar</h5>
              <p>Chief Medical Officer</p>
            </div>
          </div>
          <!-- Team Member -->
          <div class="col-md-4 text-center">
            <div class="team-member">
              <a href="doctors.html"><img src="./image/doctor2.jpg" alt="Dr. S. Fernando" class="img-fluid rounded-circle mb-3"></a>
              <h5>Dr. S. Fernando</h5>
              <p>Head of Surgery</p>
            </div>
          </div>
          <!-- Team Member -->
          <div class="col-md-4 text-center">
            <div class="team-member">
              <a href="doctors.html"><img src="./image/doctor3.jpg" alt="Dr. M. Perera" class="img-fluid rounded-circle mb-3"></a>
              <h5>Dr. M. Perera</h5>
              <p>Senior Consultant</p>
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