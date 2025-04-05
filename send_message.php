<?php
// Database connection
$servername = "localhost"; // Replace with your MySQL server address
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$database = "salon_princess"; // Replace with your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Send message
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["message"]) && isset($_POST["recipient_id"])) {
    // Sanitize input
    $message = $conn->real_escape_string($_POST["message"]);
    $recipient_id = $conn->real_escape_string($_POST["recipient_id"]);

    // Get sender information (you need to implement this part based on your authentication system)
    $sender_id = 1; // Example: ID of the logged-in user (replace with actual sender's ID)

    // Insert message into database
    $sql = "INSERT INTO user_messages (sender_id, recipient_id, message) VALUES ('$sender_id', '$recipient_id', '$message')";
    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error: Invalid request";
}

// Close connection
$conn->close();
?>
