<?php
include "db_connect.php";

$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM doctors WHERE name LIKE '%$search%' OR specialization LIKE '%$search%' OR email LIKE '%$search%' ORDER BY id ASC";
} else {
    $sql = "SELECT * FROM doctors ORDER BY id ASC";
}

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
    <link rel="stylesheet" href="Adminstyles.css">

</head>
<body class="bg-light" style="background: url('../image/A.jpg') no-repeat center center/cover;">

        <!-- Sidebar -->
        <div class="sidebar">
            <h4>Admin Dashboard</h4>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="patient_dashboard.php" class="nav-link">Patient Management</a></li>
                <li class="nav-item"><a href="doctor_dashboard.php" class="nav-link">Doctor Management</a></li>
                <li class="nav-item"><a href="staff_dashboard.php" class="nav-link">Staff Management</a></li>
                <li class="nav-item"><a href="billing_management.php" class="nav-link">Billing Management</a></li>
                <li class="nav-item"><a href="medical_report_dashboard.php" class="nav-link">Reports & Results</a></li>
                <li class="nav-item"><a href="service_management.php" class="nav-link">Service Management</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
            </ul>
        </div>
        
        <!-- Main Content -->
        <div class="main-content">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
                <div class="container">
                    <a class="navbar-brand" href="../index.php">Care Compass Hospital</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>

        <div class="container mt-5">
            <h2 class="text-center">🏥 Doctor Dashboard</h2>

            <!-- Search Bar -->
            <form action="doctor_dashboard.php" method="GET" class="mb-3 d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Search by name, specialization, or email..." value="<?php echo $search; ?>">
                <button type="submit" class="btn btn-primary">🔍 Search</button>
            </form>

            <!-- Add Doctor Button -->
            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addDoctorModal">➕ Add Doctor</button>

            <!-- Doctor Table -->
        <table class="table table-bordered mt-3">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Specialization</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Experience (Years)</th>
                    <th>User ID</th> <!-- Display userId -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['specialization']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
                        <td><?php echo $row['experience']; ?></td>
                        <td><?php echo $row['userId']; ?></td> <!-- Show userId -->
                        <td>
                            <a href="delete_doctor.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        </div>

        <!-- Add Doctor Modal -->
<!-- Add Doctor Modal -->
<div class="modal fade" id="addDoctorModal" tabindex="-1" aria-labelledby="addDoctorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">📝 Add Doctor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="add_doctor.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Specialization</label>
                        <input type="text" name="specialization" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Experience (Years)</label>
                        <input type="number" name="experience" class="form-control" required>
                    </div>

                    <!-- Add User ID Selection -->
                    <div class="mb-3">
                        <label class="form-label">Assign User</label>
                        <select name="userId" class="form-control" required>
                            <?php
                            // Fetch all users from the `user` table
                            include 'db_connect.php'; 
                            $query = "SELECT id, username FROM user";
                            $result = $conn->query($query);
                            
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['id'] . "'>" . $row['username'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Add Doctor</button>
                </form>
            </div>
        </div>
    </div>
</div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </div>
</div>

            <!-- Footer -->
            <footer class="footer">
            <p>&copy; 2025 Care Compass Hospital. All rights reserved.</p>
        </footer>

</body>
</html>

<?php $conn->close(); ?>
