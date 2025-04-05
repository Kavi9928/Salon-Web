<?php
$host = "localhost"; // Change this to your database host
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "salon_princess"; // Change this to your database name

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize user input
function sanitize_input($input) {
    global $conn;
    return mysqli_real_escape_string($conn, $input);
}

// Register user function
function register_user($username, $password) {
    global $conn;

    // Sanitize input
    $username = sanitize_input($username);
    $password = sanitize_input($password);

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the 'login' table
    $sql = "INSERT INTO login (username, password) VALUES ('$username', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        // Registration success, now redirect to booking.html
        header("Location: booking.html");
        exit(); // Ensure no further code is executed after the redirection
    } else {
        return "Error: " . $sql . "<br>" . $conn->error; // Registration failed with error message
    }
}
