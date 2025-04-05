<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <!-- Link to your help.css file -->
    <link rel="stylesheet" href="css/help.css">
</head>
<body>

<div class="contact-us">
  <div class="title">
    <h1>Contact us</h1>
  </div>
  <div class="form">
  <form method="post" action="help-con.php">
    <div class="form-items">
      <input type="text" class="input" name="username" placeholder="Username"> <!-- Added name attribute -->
      <i class="fas fa-user"></i>
    </div>
    <div class="form-items">
      <input type="text" class="input" name="email" placeholder="Email"> <!-- Added name attribute -->
      <i class="fas fa-envelope"></i>
    </div>
    <div class="form-items">
      <textarea class="input message" name="message" cols="30" rows="10" placeholder="Message....."></textarea> <!-- Added name attribute -->
    </div>
    <button type="submit" class="btn">Submit <i class="fas fa-arrow-right"></i></button>
  </form>
  </div>
  
  <div class="social-icons">
    <div class="facebook">
      <i class="home-outline"></i>
    </div>
    <div class="twitter">
      <i class="fab fa-twitter"></i>
    </div>
    <div class="google">
      <i class="fab fa-google-plus-g"></i>
    </div>
  </div>
  
</div>
<script src="js/help.js"></script>
</body>
</html>
