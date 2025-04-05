<?php
session_start();

if(!isset($_SESSION['user_name'])) {
   header('location: login_form.php');
   exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon Management System</title>

    <style>
        /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

body {
    background-color: #f5f7fa;
    color: #333;
    line-height: 1.6;
}

/* Header */
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 50px;
    background: linear-gradient(to right, #f8a5c2, #f6d365);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.header .logo {
    font-size: 28px;
    font-weight: bold;
    color: #fff;
    text-decoration: none;
}

.header .navbar {
    display: flex;
    list-style: none;
}

.header .nav-item {
    margin: 0 15px;
}

.header .nav-link {
    text-decoration: none;
    color: #fff;
    font-weight: 500;
    font-size: 16px;
    transition: color 0.3s ease;
}

.header .nav-link:hover {
    color: #ffeaa7;
}

#menu-btn {
    display: none; /* Hide the menu icon for now */
}

/* Book Section */
.book {
    padding: 50px;
    background: #fceae8;
    text-align: center;
}

.book h1.heading {
    font-size: 36px;
    color: #e17055;
    margin-bottom: 30px;
    text-transform: capitalize;
}

.book .row {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 40px;
}

.book .form {
    background: #ffffff;
    padding: 20px 30px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
}

.book .form h3 {
    font-size: 24px;
    color: #e17055;
    margin-bottom: 20px;
}

.book .form .inputBox {
    margin-bottom: 15px;
}

.book .form .inputBox input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    outline: none;
    transition: border 0.3s ease;
}

.book .form .inputBox input:focus {
    border-color: #e17055;
}

.book .btn {
    width: 100%;
    background: #e17055;
    color: #fff;
    padding: 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    transition: background 0.3s ease;
}

.book .btn:hover {
    background: #ff7675;
}

.book .image img {
    width: 100%;
    max-width: 350px;
    border-radius: 8px;
}
        /* Footer Styling */
        .footer {
            background-color: #000;
            padding: 40px 20px;
            color: #fff;
            text-align: center;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
        }

        .footer-logo, .footer-links, .footer-contact {
            flex: 1;
            min-width: 250px;
        }

        .footer-logo h2 {
            font-size: 36px;
            font-weight: bold;
            color: #fff;
            margin-bottom: 10px;
        }

        .footer-logo p {
            color: #ff0000;
            font-size: 14px;
            font-weight: bold;
        }

        .footer-social-icons a {
            font-size: 24px;
            color: #fff;
            margin: 0 10px;
            transition: color 0.3s;
        }

        .footer-social-icons a:hover {
            color: #ff0000;
        }

        .footer-links h3, .footer-contact h3 {
            color: #ff0000;
            margin-bottom: 15px;
            font-size: 18px;
        }

        .footer-links a {
            display: block;
            color: #fff;
            font-size: 14px;
            margin-bottom: 10px;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: #ff0000;
        }

        .footer-contact p {
            font-size: 14px;
            margin-bottom: 10px;
            color: #fff;
        }

        .footer-contact .icon-text {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .footer-contact .icon-text i {
            font-size: 18px;
            color: #ff0000;
            margin-right: 8px;
        }

        .footer-credit {
            border-top: 1px solid #333;
            padding-top: 15px;
            margin-top: 20px;
            color: #777;
            font-size: 14px;
        }

        .nav-item-person a {
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #ff416c, #ff4b2b);
            color: #fff;
            padding: 8px 12px;
            border-radius: 50%;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(255, 75, 43, 0.6);
        }

        .nav-item-person a:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 14px rgba(255, 75, 43, 0.8);
            background: linear-gradient(135deg, #ff4b2b, #ff416c);
        }
</style>

</head>
<body>

    <!-- header -->
    <section class="header">
        <a href="#" class="logo">Princess Choice Salon</a>
         <nav class="navbar">
            <li class="nav-item active"><a href="home.php" class="nav-link">home</a></li>
            <li class="nav-item"><a href="booking.php" class="nav-link"><a href="login_form.php"> Book Now</a></li>
            <li class="nav-item "><a href="style.html" class="nav-link">style</a></li>
            <li class="nav-item"><a href="products.php" class="nav-link">shop</a></li>
            <li class="nav-item"><a href="service.html" class="nav-link">service</a></li>
            <li class="nav-item"><a href="donation.html" class="nav-link">donation</a></li>
            <li class="nav-item"><a href="about.php" class="nav-link">about us</a></li>
            <li class="nav-item"><a href="user-profile.html" class="nav-link">profile</a></li>
         </nav>
         <div id="menu-btn" class="fas fa-bars"></div>
      </section>
<!-- header -->

<!-- book -->

<section class="book" id="book">

    <h1 class="heading"> book now </h1>

        <div class="row">
    
                <form action="book-con.php" method="POST" class="form">
                <h3>book your first visit today</h3>
                <div class="inputBox">
                    <input type="text" name = "name" placeholder="Name">
                </div>
                <div class="inputBox">
                    <input type="email" name = "email" placeholder="email">
                </div>
                <div class="inputBox">
                    <input type="text" name = "subject" placeholder="Subject">
                </div>
                <div class="inputBox">
                    <input type="text" name = "message" placeholder="message">
                </div>
                <input type="submit" value="Send A Message" class="btn">
            </form>
    
            <div class="image">
                <img src="images/contact.png" alt="">
            </div>
            
        </div>

</section>

<!-- book end-->
<!-- Footer -->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-logo">
            <h2>Princess Choice Salon</h2>
            <p>Unmatched Beauty Services</p>
        </div>
        <div class="footer-links">
            <h3>Quick Links</h3>
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Contact</a>
        </div>
        <div class="footer-contact">
            <h3>Contact Us</h3>
            <div class="icon-text"><i class="fas fa-map-marker-alt"></i><p>123 Beauty St, City</p></div>
            <div class="icon-text"><i class="fas fa-phone-alt"></i><p>(123) 456-7890</p></div>
            <div class="icon-text"><i class="fas fa-envelope"></i><p>contact@princesschoice.com</p></div>
        </div>
    </div>
    <div class="footer-credit">
        <p>© 2024 Princess Choice Salon. All rights reserved.</p>
    </div>
</footer>

<script src="js/script.js"></script>

</body>
</html>
