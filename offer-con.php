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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = sanitize_input($_POST['fullName']);
    $email = sanitize_input($_POST['email']);
    $phoneNumber = sanitize_input($_POST['phoneNumber']);
    $time = sanitize_input($_POST['time']);
    $packCategory = sanitize_input($_POST['packCategory']);

    // Insert form data into the 'offer' table
    $sql = "INSERT INTO offer (fullname, phonenumber, email, time, packcategory) 
            VALUES ('$fullName', '$phoneNumber', '$email', '$time', '$packCategory')";

    if ($conn->query($sql) === TRUE) {
        // Offer creation success
        echo json_encode(["success" => true, "redirect" => "home.php"]);
    } else {
        echo json_encode(["success" => false, "error" => "Error: " . $sql . "<br>" . $conn->error]);
    }
}

// Close the database connection
$conn->close();
?>
