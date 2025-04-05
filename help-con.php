<?php
// Database credentials
$servername = "localhost"; // Change this to your database server address
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "salon_princess"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Insert data into database
    $sql = "INSERT INTO help (username, email, message) VALUES ('$username', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
