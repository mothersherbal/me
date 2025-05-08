<?php
include 'db.php'; // Database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL to prevent SQL injection
    $query = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $query->bind_param("ss", $username, $hashed_password);

    if ($query->execute()) {
        echo "User registered successfully!";
    } else {
        echo "Error: " . $query->error;
    }
    
    $query->close();
    $conn->close();
}
?>
