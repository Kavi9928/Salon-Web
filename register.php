<?php
include 'config.php';

$registration_success = false; // Flag to check successful registration

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'User already exists!';
   } else {
      mysqli_query($conn, "INSERT INTO `user_form`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
      $registration_success = true;
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <style>
      /* CSS Styles */

      /* General reset */
      * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
         font-family: Arial, sans-serif;
      }

      body {
         display: flex;
         justify-content: center;
         align-items: center;
         min-height: 100vh;
         background: linear-gradient(135deg, #89f7fe, #66a6ff);
         color: #333;
      }

      .form-container {
         background: #fff;
         padding: 20px;
         width: 100%;
         max-width: 400px;
         border-radius: 10px;
         box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
      }

      .form-container h3 {
         text-align: center;
         color: #555;
         margin-bottom: 20px;
         font-size: 24px;
      }

      .form-container .box {
         width: 100%;
         padding: 10px;
         margin: 10px 0;
         border: 1px solid #ddd;
         border-radius: 5px;
         background-color: #f9f9f9;
      }

      .form-container .btn {
         width: 100%;
         padding: 10px;
         border: none;
         border-radius: 5px;
         background-color: #66a6ff;
         color: #fff;
         font-size: 16px;
         cursor: pointer;
         transition: background 0.3s;
      }

      .form-container .btn:hover {
         background-color: #4a89dc;
      }

      .form-container p {
         text-align: center;
         margin-top: 10px;
         font-size: 14px;
         color: #555;
      }

      .form-container p a {
         color: #66a6ff;
         text-decoration: none;
         font-weight: bold;
      }

      .form-container p a:hover {
         text-decoration: underline;
      }

      /* Message styling */
      .message {
         text-align: center;
         padding: 10px;
         margin-bottom: 10px;
         background: #ffdbdb;
         color: #c00;
         border-radius: 5px;
         cursor: pointer;
         transition: background 0.3s;
      }

      .message:hover {
         background: #ffcccc;
      }

      /* Popup notification */
      .popup-notification {
         position: fixed;
         top: 20%;
         left: 50%;
         transform: translate(-50%, -50%);
         background-color: #4caf50;
         color: #fff;
         padding: 15px 30px;
         border-radius: 8px;
         box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
         font-size: 18px;
         opacity: 0;
         visibility: hidden;
         transition: opacity 0.4s ease, visibility 0.4s;
      }

      .popup-notification.show {
         opacity: 1;
         visibility: visible;
      }

   </style>

   <script>
      function showPopup() {
         const popup = document.getElementById("popup");
         popup.classList.add("show");

         // Redirect to login page after 3 seconds
         setTimeout(() => {
            window.location.href = "login.php";
         }, 3000);
      }
   </script>
</head>
<body>

<?php if($registration_success): ?>
   <div id="popup" class="popup-notification">Registered successfully! Redirecting to login...</div>
   <script>showPopup();</script>
<?php endif; ?>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>

<div class="form-container">
   <form action="" method="post">
      <h3>Register Now</h3>
      <input type="text" name="name" required placeholder="Enter username" class="box">
      <input type="email" name="email" required placeholder="Enter email" class="box">
      <input type="password" name="password" required placeholder="Enter password" class="box">
      <input type="password" name="cpassword" required placeholder="Confirm password" class="box">
      <input type="submit" name="submit" class="btn" value="Register Now">
      <p>Already have an account? <a href="login.php">Login Now</a></p>
   </form>
</div>

</body>
</html>
