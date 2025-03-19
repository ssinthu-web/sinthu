<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "carecompass_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $doctor = $_POST['doctor'];

    // Insert into database
    $sql = "INSERT INTO appointments (name, email, phone, date, time, doctor) 
    VALUES ('$name', '$email', '$phone', '$date', '$time', '$doctor')";

    if ($conn->query($sql) === TRUE) {
    echo "Appointment booked successfully!";
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
            <a class="navbar-brand" href="index.php">
                <img src="./image/logo.png" alt="Hospital Logo" width="150" height="120" >
                Care Compass Hospital</a>

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

    <!-- Contact Section -->
    <section class="BA py-5 text-center">
        <div class="container">
            <h2 id="h2">Book Appointment</h2>
        </div>
    </section>
<main>
    <section class="contact-section py-5 B-A">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form method="POST">
                        <label for="name">Name:</label>
                        <input type="text" id="name" class="form-control" name="name" placeholder="Enter your name" required><br>
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email" required><br>
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your Phone number" required><br>
                        <label for="date">Date:</label>
                        <input type="date" id="date" class="form-control" name="date" required><br>
                        <label for="time">Time:</label>
                        <input type="time" id="time" class="form-control" name="time" required><br>
                        <label for="doctor">Select Doctor:</label>
                        <select id="doctor" name="doctor" class="form-control" required>
                        <option value="Dr. John Doe">Dr. John Doe</option>
                        <option value="Dr.Sabarathnam Jeyakumar">Dr.Sabarathnam Jeyakumar</option>
                        <option value="Dr.M.I.K Naeem">Dr.M.I.K Naeem</option>
                        <option value="Dr.Athula Feranado">Dr.Athula Feranado</option>
                        <option value="Dr.A. Lakkumar Fernando">Dr.A. Lakkumar Fernando</option>
                        <option value="Dr.Himali Wijesinghe">Dr.Himali Wijesinghe</option>
                        <option value="Dr.Sandaya Doluweera">Dr.Sandaya Doluweera</option>
                        <option value="	Dr.Ananda Piyatissa">	Dr.Ananda Piyatissa</option>
                        <option value="Dr.A. Windsor">Dr.A. Windsor</option>
                        <option value="Dr.N. Sritharan">Dr.N. Sritharan</option>
                        <option value="Dr.Champa Jayamanna">Dr.Champa Jayamanna</option>
                        <option value="Dr.Himali Wijesinghe">Dr.Himali Wijesinghe</option>
                        <option value="Dr.Sandaya Doluweera">Dr.Sandaya Doluweera</option>
                        <option value="Dr.Ananda Piyatissa">Dr.Ananda Piyatissa</option>
                        <option value="Dr.A. Windsor">	Dr.A. Windsor</option>
                        <option value="Dr. E. Rajasekaran">Dr. E. Rajasekaran</option>
                        <option value="Dr.Asoka Wijemanna">Dr.Asoka Wijemanna</option>
                        <option value="Dr.Saman Wijetunge">Dr.Saman Wijetunge</option>
                        </select>
                        <br>
                        <button type="submit" name="submit" class="btn btn-danger btn-lg mt-3">Book Appointment</button>
                    </form>
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
                        Email: info@nchjaffna.com
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
</body>
</html>