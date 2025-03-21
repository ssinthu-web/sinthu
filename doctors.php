<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCH COLOMBO - Doctors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">

        <!-- DataTables CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
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
                <li class="nav-item"><a class="nav-link" href="about.php">About Us</a>
                </li><li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                <li class="nav-item"><a class="nav-link active" href="doctors.php">Doctors</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="./Admin/admin_login.php">Registration</a></li>
            </ul>
        </div>
    </div>
    </nav>

    <!-- Doctors Section -->
    <section class="doctors-section py-5">
        <div class="container">
            <h2 class="text-center mb-4">Our Doctors</h2>
            </div>
    </section>

    <div class="container my-5">
        <div class="row align-items-center">
            <!-- Image Section -->
            <div class="col-md-7">
                <img src="./image/122.png" class="img-fluid rounded" alt="Office Desk">
            </div>
            
            <!-- Text Section -->
            <div class="col-md-5">
                <h2 class="fw-bold" id="hm">Provide Your Information Securely</h2>
                <p>
                    Use our user-friendly calendar to choose a date and time that aligns with your schedule. 
                    We understand the value of your time, and our flexible scheduling options aim to accommodate 
                    your needs seamlessly. Review your selected doctor, time slot, and personal information before 
                    confirming your appointment.
                </p>
                <a href="Book Appointment.php" class="btn booking-btn">Book Appointment</a>
            </div>
        </div>
    </div>

    <main>
        <section class="doctor-content">
            <div class="row lign-items-center">
           <!-- Doctor Listings -->
<div class="container mt-4">
    <div class="row">
        <!-- Doctor 1 -->
        <div class="col-md-4 doctor-row">
            <div class="card doctor-card">
                <img src="./image/doctor1.jpg" class="card-img-top" alt="Doctor">
                <div class="card-body text-center">
                    <h5 class="card-title">Dr. John Doe</h5>
                    <p class="card-text">Cardiologist | MBBS, MD</p>
                    <p><i class="fas fa-calendar"></i> Available: Mon - Fri</p>
                    <a href="Book Appointment.php" class="btn booking-btn">Book Appointment</a>
                </div>
            </div>
        </div>
        <!-- Doctor 2 -->
        <div class="col-md-4 doctor-row">
            <div class="card doctor-card">
                <img src="./image/doctor2.jpg" class="card-img-top" alt="Doctor">
                <div class="card-body text-center">
                    <h5 class="card-title">Dr. Sarah Wilson</h5>
                    <p class="card-text">Neurologist | MBBS, DM</p>
                    <p><i class="fas fa-calendar"></i> Available: Wed - Sat</p>
                    <a href="Book Appointment.php" class="btn booking-btn">Book Appointment</a>
                </div>
            </div>
        </div>
        <!-- Doctor 3 -->
        <div class="col-md-4 doctor-row">
            <div class="card doctor-card">
                <img src="./image/doctor3.jpg" class="card-img-top" alt="Doctor">
                <div class="card-body text-center">
                    <h5 class="card-title">Dr. Emily Carter</h5>
                    <p class="card-text">Pediatrician | MBBS, DCH</p>
                    <p><i class="fas fa-calendar"></i> Available: Tue - Sun</p>
                    <a href="Book Appointment.php" class="btn booking-btn">Book Appointment</a>
                </div>
            </div>
        </div>
    </div>
</div>
                    </div>
            </section>
        </main>
        <div class="container">
            <h2 class="text-primary text-center">Our Doctors</h2>
    
            <!-- Doctor Table -->
            <table id="doctorTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>DOCTOR ID</th>
                        <th>NAME</th>
                        <th>SPECIALTY</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>1</td><td>Dr.Sabarathnam Jeyakumar</td><td>Consultant Gynaecologist</td></tr>
                    <tr><td>2</td><td>Dr.M.I.K Naeem</td><td>Consultant Gynaecologist</td></tr>
                    <tr><td>3</td><td>Dr.Athula Feranado</td><td>Consultant Gynaecologist</td></tr>
                    <tr><td>4</td><td>Dr.A. Lakkumar Fernando</td><td>Consultant Pediatrician</td></tr>
                    <tr><td>5</td><td>Dr.Himali Wijesinghe</td><td>Consultant Pediatrician</td></tr>
                    <tr><td>6</td><td>Dr.Sandaya Doluweera</td><td>Consultant Pediatrician</td></tr>
                    <tr><td>7</td><td>Dr.Ananda Piyatissa</td><td>Consultant Pediatrician</td></tr>
                    <tr><td>8</td><td>Dr.A. Windsor</td><td>Consultant Pediatrician</td></tr>
                    <tr><td>9</td><td>Dr.N. Sritharan</td><td>Consultant Physician</td></tr>
                    <tr><td>10</td><td>Dr.Champa Jayamanna</td><td>Consultant Physician</td></tr>
                    <tr><td>11</td><td>Dr.Himali Wijesinghe</td><td>Consultant Pediatrician</td></tr>
                    <tr><td>12</td><td>Dr.Sandaya Doluweera</td><td>Consultant Pediatrician</td></tr>
                    <tr><td>13</td><td>Dr.Ananda Piyatissa</td><td>Consultant Pediatrician</td></tr>
                    <tr><td>14</td><td>Dr.A. Windsor</td><td>Consultant Pediatrician</td></tr>
                    <tr><td>15</td><td>Dr.N. Sritharan</td><td>Consultant Physician</td></tr>
                    <tr><td>17</td><td>Dr.Raja Hettiarachchi</td><td>Consultant Physician</td></tr>
                    <tr><td>18</td><td>Dr.Thusith Gunawardhana</td><td>Consultant Physician</td></tr>
                    <tr><td>19</td><td>Dr.Saman Wijetunge</td><td>Consultant Physician</td></tr>
                    <tr><td>20</td><td>Dr.Asoka Wijemanna</td><td>Consultant Surgeon</td></tr>
                    <tr><td>21</td><td>Dr. E. Rajasekaran</td><td>Consultant Surgeon</td></tr>
                    <tr><td>22</td><td>Dr. Ranjith Perera</td><td>Consultant Surgeon </td></tr>
                    <tr><td>23</td><td>Dr. Kailanathan</td><td>Consultant Surgeon</td></tr>
                    <tr><td>24</td><td>Dr. M.R.M Ziyard</td><td>Consultant Surgeon</td></tr>
                    <tr><td>25</td><td>Dr. R.D. Yapa</td><td>Consultant Surgeon</td></tr>
                    <tr><td>26</td><td>Dr.Roshan Dassanayake</td><td>Consultant Surgeon</td></tr>
                    <tr><td>27</td><td>Dr.Tharanga Samarasekara	</td><td>Consultant Endocrinologist & Diadetologist</td></tr>
                    <tr><td>28</td><td>Dr.Rushantha Premadasa</td><td>Consultant Orthopadeic Surgeon</td></tr>
                    <tr><td>29</td><td>Dr.Thushara Almedha</td><td>Consultant Orthopadeic Surgeon</td></tr>
                    <tr><td>30</td><td>Dr.Sandani Wijeweera</td><td>Consultant Rheumatology & Rehabilation</td></tr>
                    <tr><td>31</td><td>Dr.Dilrukshi Thennakoon</td><td>Consultant Rheumatology & Rehabilation</td></tr>
                    <tr><td>32</td><td>Dr.Lalith S. Wijerathne</td><td>Consultant Rheumatology & Rehabilation</td></tr>
                    <tr><td>33</td><td>Dr.Disna Amaratunga</td><td>Consultant Cardiologist</td></tr>
                    <tr><td>34</td><td>Dr.Nimali Fernando</td><td>Consultant Cardiologist</td></tr>
                    <tr><td>35</td><td>Dr.Sandamali Premarathne</td><td>Consultant Cardiologist</td></tr>
                    <tr><td>36</td><td>Dr.Pradeepa K. Siriwardana</td><td>Consultant Eye Surgeon</td></tr>
                    <tr><td>37</td><td>Dr. Nihal Ganegoda</td><td>Consultant Eye Surgeon</td></tr>
                    <tr><td>38</td><td>Dr. Nayana Perera</td><td>Consultant Dermatology</td></tr>
                    <tr><td>39</td><td>Dr. Dulcy Tissera</td><td>Consultant Dermatology</td></tr>
                    <tr><td>40</td><td>Dr. Ahamed Uwyes</td><td>Consultant Dermatology</td></tr>
                </tbody>
            </table>
        </div>
    
        <!-- jQuery and DataTables JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    
        <script>
            $(document).ready(function () {
                $('#doctorTable').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "lengthMenu": [5, 10, 15, 20],  // Set page length options
                    "pageLength": 10, // Default records per page
                    "language": {
                        "paginate": {
                            "previous": "&laquo;", // Unicode for left arrow
                            "next": "&raquo;" // Unicode for right arrow
                        }
                    }
                });
            });
        </script>

                
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