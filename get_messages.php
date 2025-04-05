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

// Retrieve messages
$sql = "SELECT * FROM user_messages ORDER BY timestamp DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Output message details
        echo "<p><strong>Sender ID:</strong> " . $row["sender_id"] . "<br>";
        echo "<strong>Message:</strong> " . $row["message"] . "<br>";
        echo "<strong>Timestamp:</strong> " . $row["timestamp"] . "</p>";
        
        // Form for replying to the message
        echo "<form action='send_message.php' method='post'>";
        echo "<input type='hidden' name='recipient_id' value='" . $row["sender_id"] . "'>";
        echo "<textarea name='message' placeholder='Reply to this message...'></textarea>";
        echo "<input type='submit' value='Reply'>";
        echo "</form>";
    }
} else {
    echo "No messages yet";
}

// Close connection
$conn->close();
?>
