<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

include 'db_connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $specialization = $_POST['specialization'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $experience = $_POST['experience'];
    $userId = $_POST['userId'];  // Add userId from the form

    $sql = "INSERT INTO doctors (name, specialization, email, contact, experience, userId) 
            VALUES (?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssi", $name, $specialization, $email, $phone, $experience, $userId);
        
        if ($stmt->execute()) {
            echo "<script>alert('✅ Doctor Added Successfully!'); window.location='doctor_dashboard.php';</script>";
        } else {
            echo "<script>alert('❌ Error adding doctor: " . $stmt->error . "');</script>";
        }
        

        $stmt->close();
    } else {

        echo "<script>alert('❌ Error preparing statement: " . $conn->error . "');</script>";
    }
    $conn->close();
}
?>
