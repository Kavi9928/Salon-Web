<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo '<script>alert("Please fill in all the fields."); window.location.href = "#book";</script>';
    } else {
        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "salon_princess";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get form data
        $name = $conn->real_escape_string($name);
        $email = $conn->real_escape_string($email);
        $subject = $conn->real_escape_string($subject);
        $message = $conn->real_escape_string($message);

        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("INSERT INTO appointment (name, email, subject, message) VALUES (?, ?, ?, ?)");
        
        $stmt->bind_param("ssss", $name, $email, $subject, $message);

        // Execute the statement
        if ($stmt->execute()) {
            echo '<script>alert("Booking Successful"); window.location.href = "payment-method.php";</script>';
        } else {
            echo '<script>alert("Error: ' . $stmt->error . ' (' . $stmt->errno . ')"); window.location.href = "#book";</script>';
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
}
?>
