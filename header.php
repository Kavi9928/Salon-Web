<?php
@include 'config.php';

// Fetch cart count from the database
$cart_count_query = mysqli_query($conn, "SELECT SUM(quantity) AS total_quantity FROM `cart`");
$cart_count = mysqli_fetch_assoc($cart_count_query);
$row_count = $cart_count['total_quantity'] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Beauty Products</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<header class="header">
   <!-- Main Menu Dropdown on Left Side -->
   <div class="main-menu">
      <button class="menu-btn" onclick="toggleMainMenu()">
         <i class="fa-solid fa-bars"></i> <b> MAIN MENU </b>
      </button>
      <div class="main-menu-content" id="mainMenuContent">
         <a href="home.php">Home</a>
         <a href="booking.php">Booking</a></li>
         <a href="style.html">Style</a></li>
         <a href="products.php">Shop</a></li>
         <a href="service.html">Services</a></li>
         <a href="about.php">About Us</a>
         <a href="contactus.php">Contact</a></li>
      </div>
   </div>

   <!-- Centered Logo -->
   <a href="#" class="logo">Beauty Products</a>

   <!-- Nav Links on Right Side -->
   <div class="nav-links">
      <a href="home.php" class="cart"> <i class="fa-solid fa-house"></i> <b> Home </b> </a>

      <!-- Shop Dropdown Menu -->
      <div class="dropdown">
         <a href="#" class="cart"> <i class="fa-solid fa-shop"></i> <b> Shop </b> </a>
         <div class="dropdown-content">
            <a href="#">Women</a>
            <a href="#">Men</a>
            <a href="#">Fragrance</a>
            <a href="#">Color Cosmetics</a>
            <a href="#">Sun Protection</a>
            <a href="#">Vitamin & Supplements</a>
            <a href="#">Tools / Gadgets & Accessories</a>
            <a href="#">Mother & Baby</a>
            <a href="#">Fashion & Style</a>
            <a href="#">Home & Lifestyle</a>
            <a href="#">Gifts</a>
            <a href="#">Offers / Deals</a>
         </div>
      </div>

      <a href="home.php" class="cart"> <i class="fa-solid fa-perfume"></i> <b> Brands </b> </a>
      <a href="cart.php" class="cart">
         <i class="fa-solid fa-cart-shopping"></i> <b> Cart </b>
         <span id="cartCount"><?php echo $row_count; ?></span>
      </a>
   </div>
</header>

<style>
   /* Basic header styles */
   .header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px;
      background-color: #333;
      color: #fff;
      position: relative;
   }

   /* Main menu on the left */
   .main-menu {
      margin-left: 10px;
   }

   .menu-btn {
      background-color: #000;
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      font-size: 16px;
      display: flex;
      align-items: center;
   }

   .menu-btn i {
      margin-right: 8px;
   }

   /* Centered logo */
   .logo {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      font-size: 24px;
      font-weight: bold;
      color: #fff;
      text-decoration: none;
   }

   /* Right-aligned nav links */
   .nav-links {
      display: flex;
      align-items: center;
      margin-left: auto;
      margin-right: 10px;
   }

   .nav-links a {
      color: #fff;
      margin-left: 15px;
      text-decoration: none;
   }

   /* Dropdown Content */
   .main-menu-content, .dropdown-content {
      display: none;
      position: absolute;
      background-color: #333;
      min-width: 200px;
      box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
      z-index: 1;
   }

   .main-menu-content a, .dropdown-content a {
      color: white;
      padding: 10px 15px;
      text-decoration: none;
      display: block;
   }

   .main-menu-content a:hover, .dropdown-content a:hover {
      background-color: #555;
   }

   /* Show dropdown on hover for Shop */
   .dropdown:hover .dropdown-content {
      display: block;
   }
</style>

<script>
   // Toggle Main Menu on Click
   function toggleMainMenu() {
      const menuContent = document.getElementById("mainMenuContent");
      menuContent.style.display = menuContent.style.display === "block" ? "none" : "block";
   }

   // Close the Main Menu if clicked outside
   window.onclick = function(event) {
      if (!event.target.matches('.menu-btn')) {
         const menuContent = document.getElementById("mainMenuContent");
         if (menuContent && menuContent.style.display === "block") {
            menuContent.style.display = "none";
         }
      }
   };

   // Cart count variable
   let cartCount = <?php echo $row_count; ?>;

   // Function to add item to cart and update count
   function addToCart() {
      cartCount++;
      document.getElementById("cartCount").textContent = cartCount;
   }
</script>

</body>
</html>
