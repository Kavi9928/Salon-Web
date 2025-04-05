<?php

@include 'config.php';

session_start(); // Start the session to use session variables

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'User already exists!';
   } else {
      if($pass != $cpass) {
         $error[] = 'Password not matched!';
      } else {
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         $_SESSION['success'] = "Registration successful! You can now log in.";
         header('location: register_form.php');
         exit;
      }
   }

};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Form</title>
   <style>
      body {
         font-family: Arial, sans-serif;
         background: linear-gradient(to right, #ff7e5f, #feb47b);
         display: flex;
         justify-content: center;
         align-items: center;
         height: 100vh;
         margin: 0;
         color: #fff;
      }
      .form-container {
         background: #fff;
         border-radius: 10px;
         box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
         padding: 30px;
         max-width: 400px;
         width: 100%;
         color: #333;
      }
      .form-container h3 {
         text-align: center;
         margin-bottom: 20px;
         color: #ff7e5f;
      }
      .form-container input[type="text"],
      .form-container input[type="email"],
      .form-container input[type="password"],
      .form-container select {
         width: 100%;
         padding: 10px;
         margin: 10px 0;
         border: 1px solid #ddd;
         border-radius: 5px;
         outline: none;
         transition: border-color 0.3s;
      }
      .form-container input[type="text"]:focus,
      .form-container input[type="email"]:focus,
      .form-container input[type="password"]:focus,
      .form-container select:focus {
         border-color: #ff7e5f;
      }
      .form-container select {
         appearance: none;
         background: #f9f9f9;
      }
      .form-container input[type="submit"] {
         width: 100%;
         padding: 10px;
         border: none;
         border-radius: 5px;
         background: #ff7e5f;
         color: #fff;
         font-weight: bold;
         cursor: pointer;
         transition: background 0.3s;
      }
      .form-container input[type="submit"]:hover {
         background: #feb47b;
      }
      .form-container p {
         text-align: center;
         margin-top: 10px;
         color: #666;
      }
      .form-container a {
         color: #ff7e5f;
         text-decoration: none;
         font-weight: bold;
      }
      .form-container a:hover {
         text-decoration: underline;
      }
      .success-msg {
         display: block;
         margin-bottom: 10px;
         color: green;
         text-align: center;
         font-weight: bold;
      }
      .error-msg {
         display: block;
         margin-bottom: 10px;
         color: red;
         text-align: center;
         font-weight: bold;
      }
   </style>
</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Register Now</h3>
      <?php
      if(isset($_SESSION['success'])){
         echo '<span class="success-msg">'.$_SESSION['success'].'</span>';
         unset($_SESSION['success']);
      }
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="Enter your name">
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="password" name="cpassword" required placeholder="Confirm your password">
      <select name="user_type">
         <option value="user">User</option>
         <option value="admin">Admin</option>
      </select>
      <input type="submit" name="submit" value="Register Now" class="form-btn">
      <p>Already have an account? <a href="login_form.php">Login now</a></p>
   </form>

</div>

</body>
</html>
