<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["fname"];
    $mail = $_POST["mail"];
    $message = $_POST["msg"];

    // Connect to the database
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "salon_princess";
    
            // Create a new mysqli connection
            $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
    
    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO feedbacks (fname, mail, msg) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $mail, $message);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo '<script>
                alert("Your feedback has been successfully submitted!");
                window.location.href = "about.html"; 
              </script>';
    } else {
        echo '<script>alert("Error: ' . $stmt->error . '");</script>';
    }
}