<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f0f4ff;
            color: #333;
            overflow-x: hidden;
        }

        .header {
            background-color: #ff85a2;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header .logo {
            font-size: 28px;
            color: #fff;
            font-weight: bold;
            text-decoration: none;
        }

        .header .navbar {
            list-style: none;
            display: flex;
        }

        .header .navbar li {
            margin: 0 10px;
        }

        .header .navbar a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            padding: 8px 16px;
            border-radius: 20px;
            transition: 0.3s;
        }

        .header .navbar a:hover {
            background-color: #ffa5b5;
            color: #fff;
            transition: 0.3s;
        }

        .heading {
            text-align: center;
            font-size: 42px;
            color: #ff5673;
            margin: 20px 0;
            font-weight: bold;
        }

        .about, .staff, .review, .footer, .ufive-feedback {
            padding: 40px;
            background-color: #ffffff;
            margin: 20px;
            border-radius: 15px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        .about .row, .staff .box-container, .review .box-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .about .row .image img, .staff .box .image img, .review .box img.user {
            width: 100%;
            border-radius: 10px;
        }

        .about .content, .staff .content, .review .box {
            max-width: 600px;
            padding: 20px;
        }

        .about .content h3, .staff .content h3, .review .box h3 {
            font-size: 26px;
            color: #ff5673;
            margin-bottom: 10px;
        }

        .about .icons-container {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        .about .icons {
            text-align: center;
        }

        .about .icons img {
            width: 50px;
        }

        .about .icons h3 {
            margin-top: 10px;
            font-size: 16px;
            color: #444;
        }

        .staff .box {
            max-width: 300px;
            background-color: #ffe8ef;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
        }

        .staff .box:hover {
            transform: translateY(-10px);
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.15);
        }

        .review .box {
            max-width: 300px;
            background-color: #ffe8ef;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
        }

        .review .stars i {
            color: #ffd700;
        }

        .ufive-feedback form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .ufive-feedback .field {
            position: relative;
        }

        .ufive-feedback input, .ufive-feedback textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: 0.3s;
        }

        .ufive-feedback input:focus, .ufive-feedback textarea:focus {
            border-color: #ff85a2;
            outline: none;
            box-shadow: 0 0 5px rgba(255, 133, 162, 0.5);
        }

        .ufive-feedback .button {
            background-color: #ff85a2;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
        }

        .ufive-feedback .button:hover {
            background-color: #ff5673;
        }

        .footer {
            background-color: #ff5673;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .footer .box-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .footer .box h3 {
            color: #fff;
            font-size: 20px;
        }

        .footer .share a {
            color: #fff;
            margin-right: 10px;
            font-size: 20px;
            transition: 0.3s;
        }

        .footer .share a:hover {
            color: #ffd1d9;
        }
    </style>
</head>
<body>
    <!-- header -->
    <section class="header">
        <a href="#" class="logo">Princess Choice Salon</a>
        <nav class="navbar">
            <li><a href="home.php">Home</a></li>
            <li><a href="booking.php">Book Now</a></li>
            <li><a href="style.html">Style</a></li>
            <li><a href="products.php">Shop</a></li>
            <li><a href="service.html">Service</a></li>
            <li><a href="donation.html">Donation</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="user-profile.html">Profile</a></li>
        </nav>
    </section>
    <!-- other sections (about, staff, review, feedback, footer) remain the same -->
</body>
</html>


<!-- about us -->

<!-- About Us Section -->
<section class="about" id="about">
    <h1 class="heading">About Us</h1>
    <div class="row">
        <div class="image">
            <img src="images/about.jpg" alt="Salon image showcasing services">
        </div>
        <div class="content">
            <h3>Your Style, Our Passion</h3>
            <p>Welcome to Princess Choice Salon, where beauty and elegance meet expertise. Our team of skilled stylists and therapists brings passion and precision to every service, ensuring you look and feel your best.</p>
            <p>From cutting-edge haircuts to rejuvenating spa treatments, we offer a personalized, luxurious experience that caters to your unique style.</p>
            <div class="icons-container">
                <div class="icons">
                    <img src="images/about-icon-1.png" alt="Icon of professional tools">
                    <h3>Professional Tools</h3>
                </div>
                <div class="icons">
                    <img src="images/about-icon-2.png" alt="Icon of high-quality products">
                    <h3>Quality Products</h3>
                </div>
                <div class="icons">
                    <img src="images/about-icon-3.png" alt="Icon of hair washing services">
                    <h3>Exceptional Care</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- about us end -->
<!-- staff -->

<section class="staff" id="staff">

    <h1 class="heading"> Our Team </h1>

    <div class="box-container">

        <div class="box">
            <div class="image">
                <img src="images/owner (1).jpg" alt="">
            </div>
            <div class="content">
                <a href="#" class="title">Owner-Jenny</a>
                <span>by Owner / 19th july, 2021</span>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Hic aut eligendi, doloremque nihil sapiente fugit aliquam? Error nisi velit, a atque fugit laborum.</p>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/owner (2).jpg" alt="">
            </div>
            <div class="content">
                <a href="#" class="title">Employee-anna</a>
                <span>by Employee / 19th july, 2021</span>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Hic aut eligendi, doloremque nihil sapiente fugit aliquam? Error nisi velit, a atque fugit laborum.</p>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/owner (3).jpg" alt="">
            </div>
            <div class="content">
                <a href="#" class="title">Emmy</a>
                <span>by Employee / 28th August, 2021</span>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Hic aut eligendi, doloremque nihil sapiente fugit aliquam? Error nisi velit, a atque fugit laborum.</p>
                
            </div>
        </div>

    </div>

</section>

<!-- staff end-->

<!-- review -->

<section class="review" id="review">

   <h1 class="heading">Customer's Review</h1>

   <div class="box-container">

       <div class="box">
           <img src="images/quote-img.png" alt="" class="quote">
           <p>"Amazing experience at this salon! The staff is friendly, and my haircut turned out exactly as I wanted. Will definitely be coming back!"</p>
           <img src="images/review-1.png" class="user" alt="">
           <h3>anna rude</h3>
           <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
           </div>
       </div>

       <div class="box">
           <img src="images/quote-img.png" alt="" class="quote">
           <p>"Visited for a spa day and it was pure bliss. The massage was heavenly, and the facial left my skin glowing. A must-visit!"</p>
           <img src="images/review-2.png" class="user" alt="">
           <h3>jenny white</h3>
           <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
           </div>
       </div>
       
       <div class="box">
           <img src="images/quote-img.png" alt="" class="quote">
           <p>"I'm in love with my new hair color! The stylist's expertise and the quality products used made all the difference above."</p>
           <img src="images/review-1.png" class="user" alt="">
           <h3>emma mudton</h3>
           <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
           </div>
       </div>

   </div>

</section>

<!-- review end -->
<!-- send feedback -->
<div class="ufive-feedback">
    <section id="feedback">
        <h1>Tell Us What You Feel..!</h1>
        <form method="post" action="about-con.php"> 
            <div class="field name-box">
                <input type="text" id="name" name="fname" placeholder="write your name" />
                <label for="name">Name</label>
            </div>

            <div class="field email-box">
                <input type="text" id="email" name="mail" placeholder="enter your mail" />
                <label for="email">E-mail</label>
            </div>

            <div class="field msg-box">
                <textarea id="msg" name="msg" rows="4" placeholder="Tell us what you think.."></textarea>
                <label for="msg">Message</label>
            </div>

            <input class="button" type="submit" value="submit">
        </form>
    </section>
</div>
  
 
<!-- end -->
<!-- footer -->

<section class="footer">

    <div class="box-container">
 
       <div class="box">
          <h3> Find us here </h3>
          <div class="share">
             <a href="#" class="fab fa-facebook-f"></a>
             <a href="#" class="fab fa-twitter"></a>
             <a href="#" class="fab fa-instagram"></a>
             <a href="#" class="fab fa-linkedin"></a>
          </div>
       </div>
 
       <div class="box">
          <h3>contact us</h3>
          <p>+94 (0) 411 222 333 </p>
          <a href="#" class="link">princesscs@gmail.com</a>
       </div>
 
       <div class="box">
          <h3>location</h3>
          <p> Matara Rd, <br>
            Urubokka </p>
       </div>
 
    </div>
 
    <div class="credit"> Princess Choice Salon </span> | Sri Lanka </div>
 
 </section>
<!-- footer end-->

<script src="js/script.js"></script>
<link rel="stylesheet" href="js/feedback.js">
</body>
</html>