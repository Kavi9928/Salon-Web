<?php

@include 'config.php';

if (isset($_POST['add_to_cart'])) {

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   // Always insert a new row for each product added to the cart
   mysqli_query($conn, "INSERT INTO `cart` (name, price, image, quantity) VALUES ('$product_name', '$product_price', '$product_image', '$product_quantity')");
   $message[] = 'Product added to cart!';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shop</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


   <style>
      /* Inline CSS for promotional banner */
      .promo-banner {
         width: 100%;
         height: 400px;
         overflow: hidden;
         margin: 20px 0;
         display: flex;
         justify-content: center;
         align-items: center;
      }

      .promo-banner img {
         width: 100%;
         height: 100%;
         object-fit: cover;
      }

      /* Cart count badge */
      .cart-icon {
         position: relative;
         display: inline-block;
      }

      .cart-count {
         position: absolute;
         top: -10px;
         right: -10px;
         background: red;
         color: white;
         border-radius: 50%;
         padding: 4px 8px;
         font-size: 12px;
      }

      /* Product box styling */
      .box-container {
         display: grid;
         grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
         gap: 20px;
         margin: 20px 0;
      }

      .box {
         background-color: #1e1e2f;
         color: #fff;
         border-radius: 10px;
         padding: 20px;
         text-align: center;
         box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
         transition: transform 0.3s, box-shadow 0.3s;
      }

      .box:hover {
         transform: scale(1.05);
         box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.3);
      }

      .box img {
         width: 100px;
         height: 100px;
         object-fit: cover;
         margin-bottom: 10px;
         border-radius: 50%;
         border: 2px solid #fff;
      }

      .btn {
         background: linear-gradient(45deg, #00c6ff, #0072ff);
         color: white;
         border: none;
         padding: 10px 20px;
         border-radius: 5px;
         font-size: 16px;
         cursor: pointer;
         transition: background 0.3s, transform 0.3s;
      }

      .btn:hover {
         background: linear-gradient(45deg, #0072ff, #00c6ff);
         transform: translateY(-3px);
      }

      .price {
         font-size: 18px;
         color: #ffda79;
         margin: 10px 0;
      }

      .heading {
         font-size: 24px;
         color: #fff;
         text-align: center;
         margin: 20px 0;
         letter-spacing: 1px;
      }
      footer {
  background-color: #1e1e1e;
  color: #ffffff;
  padding: 40px 20px;
  font-family: Arial, sans-serif;
}

.newsletter {
  text-align: center;
  margin-bottom: 30px;
}

.newsletter p {
  font-size: 20px;
  font-weight: bold;
}

.newsletter span {
  display: block;
  margin-bottom: 10px;
  font-size: 14px;
}

.newsletter form {
  display: flex;
  justify-content: center;
  gap: 10px;
  flex-wrap: wrap;
}

.newsletter input {
  padding: 10px;
  border: none;
  border-radius: 4px;
  outline: none;
}

.newsletter button {
  padding: 10px 20px;
  background-color: #000000;
  color: #ffffff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-weight: bold;
}

.footer-sections {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  margin-top: 30px;
}

.section h3 {
  font-size: 16px;
  font-weight: bold;
}

.section ul {
  list-style: none;
  padding: 0;
}

.section ul li {
  margin: 8px 0;
}

.section ul li a {
  color: #ffffff;
  text-decoration: none;
  font-size: 14px;
}

.payment-icons img,
.social-icons a {
  margin: 5px;
  width: 30px;
  height: auto;
}

.social-icons a i {
  color: #ffffff;
  font-size: 20px;
}


   </style>
</head>
<body>

<?php
if (isset($message)) {
   foreach ($message as $message) {
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i></div>';
   }
}
?>

<?php include 'header.php'; ?>

<div class="promo-banner">
   <img src="images/banners/banner1.jpg" alt="Promo Banner" id="promoImage">
</div>

<div class="container">

<section class="products">

   <h1 class="heading">Latest Products</h1>

   <div class="box-container">

      <?php
      $select_products = mysqli_query($conn, "SELECT * FROM `products`");
      if (mysqli_num_rows($select_products) > 0) {
         while ($fetch_product = mysqli_fetch_assoc($select_products)) {
      ?>

      <form action="" method="post" onsubmit="updateCartCount(); return true;">
         <div class="box">
            <img src="images/shop/<?php echo $fetch_product['image']; ?>" alt="">
            <h3><?php echo $fetch_product['name']; ?></h3>
            <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" class="btn" value="Add to Cart" name="add_to_cart">
         </div>
      </form>

      <?php
         }
      }
      ?>

   </div>

</section>

</div>

<script src="js/script.js"></script>
<script>
   const images = ['ppp1.jpg', 'p2.jpg', 'p3.jpg', 'p4.jpg'];
   let currentIndex = 0;
   const promoImage = document.getElementById('promoImage');
   function changeBanner() {
      currentIndex = (currentIndex + 1) % images.length;
      promoImage.src = images[currentIndex];
   }
   setInterval(changeBanner, 5000);
</script>

<script>
   function updateCartCount() {
       fetch('update_cart_count.php')
           .then(response => response.text())
           .then(count => {
               document.querySelector('.cart-count').textContent = count;
           })
           .catch(error => console.error('Error updating cart count:', error));
   }
</script>

<footer>
  <div class="newsletter">
    <p>Subscribe To Our Newsletter</p>
    <span>Get all the latest information on Events, Sales and Offers.</span>
    <form>
      <input type="email" placeholder="Your E-mail Address">
      <input type="text" placeholder="Your Name">
      <input type="tel" placeholder="Your Tel No">
      <button type="submit">SUBSCRIBE NOW!</button>
    </form>
  </div>
  <div class="footer-sections">
    <div class="section">
      <h3>Customer Service</h3>
      <ul>
        <li><a href="#">Video Gallery</a></li>
        <li><a href="#">Catalogues</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Login</a></li>
        <li><a href="#">Orders History</a></li>
      </ul>
    </div>
    <div class="section">
      <h3>More Information</h3>
      <ul>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">Return Policy</a></li>
        <li><a href="#">Deliveries</a></li>
        <li><a href="#">Content Policy & Privacy Statement</a></li>
      </ul>
    </div>
    <div class="section">
      <h3>Payment Methods</h3>
      <div class="payment-icons">
        <img src="visa.png" alt="Visa">
        <img src="paypal.png" alt="PayPal">
        <img src="american.jpeg" alt="Stripe">
        <img src="mastercard.jpeg" alt="VeriSign">
      </div>
    </div>
    <div class="section social">
      <h3>Social Media</h3>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
        <a href="#"><i class="fab fa-linkedin"></i></a>
        <a href="#"><i class="fab fa-pinterest"></i></a>
      </div>
    </div>
  </div>
</footer>



</body>
</html>
