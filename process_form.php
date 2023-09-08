<?php
include_once "./db.php";
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $hobbies = isset($_POST['hobbies']) ? implode(', ', $_POST['hobbies']) : '';

    // Handle file uploads
    $imageFileName = '';
    $excelFileName = '';

    if ($_FILES['image']['error'] === 0) {
        $imageFileName = 'uploads/' . uniqid() . '_' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $imageFileName);
    }

    if ($_FILES['excel']['error'] === 0) {
        $excelFileName = 'uploads/' . uniqid() . '_' . $_FILES['excel']['name'];
        move_uploaded_file($_FILES['excel']['tmp_name'], $excelFileName);
    }

    

    // Create an INSERT query
    $sql = "INSERT INTO user_data (name, email, city, hobbies, image_path, excel_path) 
            VALUES (?, ?, ?, ?, ?, ?)";

    // Create a prepared statement
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind the parameters with the actual data
        mysqli_stmt_bind_param($stmt, "ssssss", $name, $email, $city, $hobbies, $imageFileName, $excelFileName);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            $success = true;
        } else {
            $success = false;
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    }

    // Close the database connection
    mysqli_close($conn);

    // Prepare the response
    $response = ["success" => $success];
    echo json_encode($response);
}
?>
