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
   <style>
      body {
         font-family: Arial, sans-serif;
         background: linear-gradient(to right, #6a11cb, #2575fc);
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
         padding: 20px 30px;
         max-width: 400px;
         width: 100%;
         color: #333;
      }
      .form-container h3 {
         text-align: center;
         margin-bottom: 20px;
         color: #6a11cb;
      }
      .form-container input[type="email"],
      .form-container input[type="password"] {
         width: 100%;
         padding: 10px;
         margin: 10px 0;
         border: 1px solid #ddd;
         border-radius: 5px;
         outline: none;
         transition: border-color 0.3s;
      }
      .form-container input[type="email"]:focus,
      .form-container input[type="password"]:focus {
         border-color: #6a11cb;
      }
      .form-container div {
         margin: 10px 0;
         display: flex;
         justify-content: space-between;
      }
      .form-container label {
         margin-left: 5px;
         color: #555;
      }
      .form-container input[type="submit"] {
         width: 100%;
         padding: 10px;
         border: none;
         border-radius: 5px;
         background: #6a11cb;
         color: #fff;
         font-weight: bold;
         cursor: pointer;
         transition: background 0.3s;
      }
      .form-container input[type="submit"]:hover {
         background: #2575fc;
      }
      .form-container p {
         text-align: center;
         margin-top: 10px;
         color: #666;
      }
      .form-container a {
         color: #6a11cb;
         text-decoration: none;
         font-weight: bold;
      }
      .form-container a:hover {
         text-decoration: underline;
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
      <input type="submit" name="submit" value="Login Now">
      <p>Don't have an account? <a href="register_form.php">Register here</a></p>
   </form>
</div>

</body>
</html>
