<?php
include "db_connect.php";

$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM staff WHERE name LIKE '%$search%' OR role LIKE '%$search%' OR email LIKE '%$search%' ORDER BY id DESC";
} else {
    $sql = "SELECT * FROM staff ORDER BY id DESC";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Staff Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light" style="background: url('../image/admin.jpg') no-repeat center center/cover;">

<div class="d-flex" style="min-height: 100vh;">
    <!-- Sidebar -->
    <div class="d-flex flex-column p-3 text-white" style="width: 250px; background-color: #052c65; min-height: 100vh;">
        <h4 class="text-center py-4">Admin Dashboard</h4>
        <ul class="nav flex-column">
            <li class="nav-item"><a href="patient_dashboard.php" class="nav-link text-white">Patient Management</a></li>
            <li class="nav-item"><a href="doctor_dashboard.php" class="nav-link text-white">Doctor Management</a></li>
            <li class="nav-item"><a href="staff_dashboard.php" class="nav-link text-white">Staff Management</a></li>
            <li class="nav-item"><a href="billing_management.php" class="nav-link text-white">Billing Management</a></li>
            <li class="nav-item"><a href="Medical_Report_Dashboard.php" class="nav-link text-white">Reports & Results</a></li>
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
            <h2 class="text-center">🏥 Medical Staff Dashboard</h2>

            <!-- Search Bar -->
            <form action="staff_dashboard.php" method="GET" class="mb-3 d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Search by name, role, or email..." value="<?php echo $search; ?>">
                <button type="submit" class="btn btn-primary">🔍 Search</button>
            </form>

            <!-- Add Staff Button -->
            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addStaffModal">➕ Add Staff</button>

            <!-- Staff Table -->
            <table class="table table-bordered mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Salary ($)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['role']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['salary']; ?></td>
                            <td>
                                <a href="delete_staff.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Add Staff Modal -->
        <div class="modal fade" id="addStaffModal" tabindex="-1" aria-labelledby="addStaffModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">📝 Add Staff Member</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="add_staff.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <input type="text" name="role" class="form-control" required>
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
                                <label class="form-label">Salary ($)</label>
                                <input type="number" name="salary" class="form-control" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Add Staff</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </div>
</div>

</body>
</html>

<?php $conn->close(); ?>
