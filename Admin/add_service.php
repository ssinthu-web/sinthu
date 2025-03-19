<?php
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);

    if (!empty($name) && !empty($description)) {
        $sql = "INSERT INTO services (name, description, created_at) VALUES (?, ?, NOW())";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ss", $name, $description);
            if ($stmt->execute()) {
                header("Location: services_dashboard.php?success=Service added successfully");
                exit();
            } else {
                $error = "Error adding service.";
            }
            $stmt->close();
        } else {
            $error = "Database error.";
        }
    } else {
        $error = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center">Add New Service</h2>

        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>

        <form method="POST" action="add_service.php">
            <div class="mb-3">
                <label for="name" class="form-label">Service Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Service Description</label>
                <textarea id="description" name="description" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Add Service</button>
        </form>
    </div>
</body>
</html>
