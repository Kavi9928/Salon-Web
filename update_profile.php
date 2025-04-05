<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $bio = mysqli_real_escape_string($conn, $_POST['bio']);
    $avatar = $_POST['avatar']; // Assuming you have a file upload field for avatar

    // Your SQL query and database interaction code here

    // Assuming profile update is successful
    $update_success = true;

    if ($update_success) {
        echo "<script>
            alert('Profile updated successfully!');
            window.location.href = 'profile.php';
        </script>";
        exit();
    } else {
        echo "<script>
            alert('Profile update failed. Please try again.');
            window.location.href = 'profile.php';
        </script>";
        exit();
    }
}
?>
