<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

include 'db_connect.php';  // Include the connection to your database

// Process form submission when the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST['name'];
    $specialization = $_POST['specialization'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $experience = $_POST['experience'];
    $userId = $_POST['userId'];  // Add userId from the form

    // SQL query to insert data into doctors table, including userId
    $sql = "INSERT INTO doctors (name, specialization, email, contact, experience, userId) 
            VALUES (?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters and execute the query
        $stmt->bind_param("sssssi", $name, $specialization, $email, $phone, $experience, $userId);
        
        if ($stmt->execute()) {
            // Redirect to doctor dashboard with success message after insertion
            echo "<script>alert('✅ Doctor Added Successfully!'); window.location='doctor_dashboard.php';</script>";
        } else {
            // Display error if execution fails
            echo "<script>alert('❌ Error adding doctor: " . $stmt->error . "');</script>";
        }
        
        // Close the prepared statement
        $stmt->close();
    } else {
        // Display error if statement preparation fails
        echo "<script>alert('❌ Error preparing statement: " . $conn->error . "');</script>";
    }

    // Close the database connection
    $conn->close();
}
?>
