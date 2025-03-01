<?php
include "db_connect.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO staff (name, role, email, phone, salary) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssd", $name, $role, $email, $phone, $salary);

    if ($stmt->execute()) {
        echo "<script>alert('✅ Staff Added Successfully!'); window.location='staff_dashboard.php';</script>";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
