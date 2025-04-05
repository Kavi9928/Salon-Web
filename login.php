<?php
@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $action = $_POST['action'];

   $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) == 1){

      $row = mysqli_fetch_array($result);
      
      if($row['user_type'] == 'user') {
         $_SESSION['user_name'] = $row['name'];
         if($action == "shop") {
            header('location: products.php');
         } elseif($action == "booking") {
            header('location: booking.php');
         } else {
            $error = "Invalid action for the user type!";
         }
      } elseif($row['user_type'] == 'admin') {
         $_SESSION['user_name'] = $row['name'];
         header('location: admin-dashboard.php');
      } else {
         $error = "Invalid user type!";
      }

   } else {
      $error = 'Incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <!-- custom css file link  -->
   <style>
      /* Reset */
      * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
         font-family: Arial, sans-serif;
      }
      
      /* Body and Container */
      body {
         background-color: #f0f4f8;
         display: flex;
         align-items: center;
         justify-content: center;
         min-height: 100vh;
         color: #333;
      }

      .form-container {
         background-color: #ffffff;
         border-radius: 10px;
         box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
         padding: 30px;
         width: 350px;
         text-align: center;
      }

      /* Form */
      form h3 {
         font-size: 24px;
         color: #333;
         margin-bottom: 20px;
      }

      .error-msg {
         color: #d9534f;
         font-size: 14px;
         margin-bottom: 10px;
         display: block;
      }

      /* Input Fields */
      input[type="email"],
      input[type="password"] {
         width: 100%;
         padding: 10px;
         margin: 10px 0;
         border: 1px solid #ddd;
         border-radius: 5px;
         font-size: 16px;
         transition: border 0.3s;
      }

      input[type="email"]:focus,
      input[type="password"]:focus {
         border: 1px solid #007bff;
      }

      /* Radio Buttons */
      .form-container div {
         display: flex;
         justify-content: center;
         align-items: center;
         margin: 15px 0;
      }

      input[type="radio"] {
         margin: 0 5px 0 0;
      }

      label {
         font-size: 16px;
         margin-right: 20px;
         cursor: pointer;
         color: #555;
      }

      /* Submit Button */
      .form-btn {
         width: 100%;
         background-color: #007bff;
         color: #ffffff;
         padding: 10px;
         border: none;
         border-radius: 5px;
         font-size: 18px;
         cursor: pointer;
         transition: background-color 0.3s;
      }

      .form-btn:hover {
         background-color: #0056b3;
      }

      /* Additional Text */
      p {
         font-size: 14px;
         margin-top: 15px;
         color: #777;
      }

      p a {
         color: #007bff;
         text-decoration: none;
      }

      p a:hover {
         text-decoration: underline;
      }
   </style>
</head>
<body>
   
<div class="form-container">
   <form action="" method="post">
      <h3>Login</h3>
      <?php if(isset($error)) { ?>
         <span class="error-msg"><?php echo $error; ?></span>
      <?php } ?>
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="password" required placeholder="Enter your password">
      <div>
         <input type="radio" name="action" value="shop" checked>
         <label for="shop">Shop</label>
         <input type="radio" name="action" value="booking">
         <label for="booking">Booking</label>
      </div>
      <input type="submit" name="submit" value="Login Now" class="form-btn">
      <p>Don't have an account? <a href="register.php">Register here</a></p>
   </form>
</div>

</body>
</html>
