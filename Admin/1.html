<?php
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password (empty)
$dbname = "carecompass_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Add & Update Doctor
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $d_id = $_POST['d_id'] ?? null;
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $qualification = $_POST['qualification'];
    $contact_no = $_POST['contact_no'];
    $email = $_POST['email'];
    $specialization = $_POST['specialization'];

    if ($d_id) {
        // Update doctor
        $sql = "UPDATE doctors SET name=?, NIC=?, address=?, age=?, qualification=?, contact_no=?, email=?, specialization=? WHERE D_ID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssisissi", $name, $nic, $address, $age, $qualification, $contact_no, $email, $specialization, $d_id);
    } else {
        // Insert new doctor
        $sql = "INSERT INTO doctors (name, NIC, address, age, qualification, contact_no, email, specialization) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssisiss", $name, $nic, $address, $age, $qualification, $contact_no, $email, $specialization);
    }

    if ($stmt->execute()) {
        header("Location: manage_doctor.php?success=1");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
}

// Handle Delete
if (isset($_GET['delete'])) {
    $d_id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM doctors WHERE D_ID = ?");
    $stmt->bind_param("i", $d_id);
    if ($stmt->execute()) {
        header("Location: manage_doctor.php?deleted=1");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
}

// Fetch all doctors
$doctors = $conn->query("SELECT * FROM doctors");

// Fetch all specializations
$specializations = $conn->query("SELECT * FROM specializations");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Doctors</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <h2 class="text-center">Manage Doctors</h2>
        
        <form method="POST" class="card p-4">
            <input type="hidden" name="d_id" id="d_id">
            <div class="mb-2">
                <label>Name:</label>
                <input type="text" name="name" id="name" required class="form-control">
            </div>
            <div class="mb-2">
                <label>NIC:</label>
                <input type="text" name="nic" id="nic" required class="form-control">
            </div>
            <div class="mb-2">
                <label>Address:</label>
                <input type="text" name="address" id="address" required class="form-control">
            </div>
            <div class="mb-2">
                <label>Age:</label>
                <input type="number" name="age" id="age" required class="form-control">
            </div>
            <div class="mb-2">
                <label>Qualification:</label>
                <input type="text" name="qualification" id="qualification" required class="form-control">
            </div>
            <div class="mb-2">
                <label>Contact No:</label>
                <input type="text" name="contact_no" id="contact_no" required class="form-control">
            </div>
            <div class="mb-2">
                <label>Email:</label>
                <input type="email" name="email" id="email" required class="form-control">
            </div>
            <div class="mb-2">
                <label>Specialization:</label>
                <select name="specialization" id="specialization" required class="form-control">
                    <option value="">Select Specialization</option>
                    <?php while ($row = $specializations->fetch_assoc()) { ?>
                        <option value="<?= $row['spe_id'] ?>"><?= $row['title'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-100">Save</button>
        </form>

        <h3 class="mt-4">Doctors List</h3>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>NIC</th>
                    <th>Address</th>
                    <th>Age</th>
                    <th>Qualification</th>
                    <th>Contact No</th>
                    <th>Email</th>
                    <th>Specialization</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $doctors->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['D_ID'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['NIC'] ?></td>
                        <td><?= $row['address'] ?></td>
                        <td><?= $row['age'] ?></td>
                        <td><?= $row['qualification'] ?></td>
                        <td><?= $row['contact_no'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td>
                            <?php
                            $spe_id = $row['specialization'];
                            $spe_query = $conn->query("SELECT title FROM specializations WHERE spe_id=$spe_id");
                            echo ($spe_query->num_rows > 0) ? $spe_query->fetch_assoc()['title'] : "N/A";
                            ?>
                        </td>
                        <td>
                            <a href="?delete=<?= $row['D_ID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this doctor?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
