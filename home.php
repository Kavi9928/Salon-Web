<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Princess Choice Salon</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #111;
            color: #fff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header Styling */

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

        .navbar {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .navbar .nav-link {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .navbar .nav-link:hover {
            color: #ff0000;
        }

        .navbar .nav-item-person i {
            color: white;
        }

        /* Home Section */
        .home {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
            color: white;
            text-align: center;
        }

        .carousel {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            animation: slide 15s infinite;
        }

        .carousel img {
            min-width: 100%;
            height: 100%;
            object-fit: cover;
            transition: opacity 1s ease-in-out;
        }

        @keyframes slide {
            0%, 33% { transform: translateX(0); }
            34%, 66% { transform: translateX(-100%); }
            67%, 100% { transform: translateX(-200%); }
        }

        .home .content {
            position: relative;
            z-index: 2;
            max-width: 600px;
            padding: 20px;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            animation: fadeIn 2s ease-in-out;
        }

        .home span {
            display: block;
            font-size: 1.2em;
            color: #ffb703;
            font-weight: bold;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .home h3 {
            font-size: 3em;
            font-weight: 700;
            line-height: 1.2;
            color: #ffffff;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Offer Section */
        .offer {
            padding: 50px 20px;
            background-color: #222;
            text-align: center;
        }

        .offer .heading {
            font-size: 36px;
            color: #f44336;
            margin-bottom: 20px;
        }

        .box-cont {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .box {
            background-color: #333;
            padding: 20px;
            width: 300px;
            border-radius: 10px;
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .box .title {
            font-size: 24px;
            color: #f44336;
            font-weight: bold;
        }

        .box .price {
            font-size: 28px;
            color: #fff;
            margin: 15px 0;
            font-weight: bold;
        }

        .box ul {
            list-style: none;
            padding: 0;
            margin: 20px 0;
            font-size: 16px;
            color: #ddd;
        }

        .box ul li {
            margin: 10px 0;
        }

        .box a button {
            background: linear-gradient(135deg, #f44336, #e91e63);
            border: none;
            color: #fff;
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .box a button:hover {
            background: linear-gradient(135deg, #e91e63, #f44336);
            box-shadow: 0 4px 12px rgba(244, 67, 54, 0.4);
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

        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #D0D0D0;
    color: #ffffff;
}

.blog-section {
    max-width: 1500px;
    margin: 30px auto;
    padding: 20px;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.header h1 {
    font-size: 2em;
}

.view-all {
    color: #ffffff;
    text-decoration: none;
    font-weight: bold;
    border-bottom: 1px solid #ffffff;
}

.blog-posts {
    display: flex;
    gap: 20px;
}

.post {
    background-color: #2a2a2a;
    border-radius: 8px;
    overflow: hidden;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.post img {
    width: 100%;
    height: 180px;
    object-fit: cover;
}

.post-content {
    padding: 20px;
}

.post-content h2 {
    font-size: 1.2em;
    color: #ffffff;
    margin-bottom: 10px;
}

.meta {
    font-size: 0.85em;
    color: #cccccc;
    margin-bottom: 15px;
}

.post-content p {
    font-size: 0.9em;
    color: #dddddd;
}


    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>


<!-- Header -->
<section class="header">
                <a href="#" class="logo">Princess Choice Salon</a>
                <ul class="navbar">
                        <li><a href="home.php">Home</a></li>
                        <li class="nav-item"><a href="booking.php" class="nav-link"><a href="login_form.php"> Book Now</a></li>
                        <li><a href="style.html">Style</a></li>
                        <li><a href="products.php">Shop</a></li>
                        <li><a href="service.html">Service</a></li>
                        <li><a href="donation.html">Donation</a></li>
                        <li><a href="about.php">About Us</a></li>
                    <li class="nav-item-person">
                        <a href="#"><i class="fas fa-user"></i></a>
                    </li>
                </ul>
            </section>

<!-- Home Section with Carousel -->
<section class="home">
    <div class="carousel">
        <img src="h1.jpg" alt="Image 1">
        <img src="h2.jpg" alt="Image 2">
        <img src="h3.jpg" alt="Image 3">
        <img src="h4.jpg" alt="Image 4">
    </div>
    <div class="content">
        <span>Welcome to Princess Choice Salon</span>
        <h3>Your Beauty, Our Duty</h3>
    </div>
</section>

<!-- Offer Section -->
<section class="offer" id="about">
    <h2 class="heading">Our Offers</h2>
    <div class="box-cont">
        <div class="box">
            <div class="title">Basic Package</div>
            <div class="price">$50</div>
            <ul>
                <li>Haircut</li>
                <li>Blowdry</li>
                <li>Facial</li>
            </ul>
            <a href="#"><button>Book Now</button></a>
        </div>
        <div class="box">
            <div class="title">Premium Package</div>
            <div class="price">$100</div>
            <ul>
                <li>Haircut & Styling</li>
                <li>Full Facial</li>
                <li>Manicure & Pedicure</li>
            </ul>
            <a href="#"><button>Book Now</button></a>
        </div>
        <div class="box">
            <div class="title">VIP Package</div>
            <div class="price">$150</div>
            <ul>
                <li>Complete Makeover</li>
                <li>Spa Treatment</li>
                <li>Exclusive Products</li>
            </ul>
            <a href="#"><button>Book Now</button></a>
        </div>
    </div>
</section>

<section class="blog-section">
        <div class="header">
            <h1>The Beauty Blog</h1>
            <a href="#" class="view-all">View all posts</a>
        </div>
        <div class="blog-posts">
            <div class="post">
                <img src="g (3).jpg" alt="Halloween Look">
                <div class="post-content">
                    <h2>Must-Have Makeup and Hair Styling Essentials to Complete Your Halloween Look</h2>
                    <p class="meta">By Essentials Team &nbsp; | &nbsp; Oct 23, 2024</p>
                    <p>There’s something magical about Halloween that invites us to step outside the everyday and embrace a new persona, even if just for a night...</p>
                </div>
            </div>
            <div class="post">
                <img src="g (2).jpg" alt="Glass Skin">
                <div class="post-content">
                    <h2>Your Guide to Achieving "Glass Skin" - Tips, Steps and Our Best K-beauty Products</h2>
                    <p class="meta">By Essentials Team &nbsp; | &nbsp; Oct 22, 2024</p>
                    <p>If you've spent any time scrolling through TikTok or Instagram lately, you have probably seen many creators and beauty influencers showcasing...</p>
                </div>
            </div>
            <div class="post">
                <img src="g (1).jpg" alt="Summer Skincare">
                <div class="post-content">
                    <h2>Top Summer Skincare Essentials for Radiant, Sun-Kissed Skin</h2>
                    <p class="meta">By Essentials Team &nbsp; | &nbsp; Oct 20, 2024</p>
                    <p>Summer can be tough on your skin, with sun, sweat, and pollution taking a toll. Here's our guide to the best summer skincare products and tips...</p>
                </div>
            </div>
        </div>
    </section>

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


<script>
    document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".post").forEach(post => {
        post.addEventListener("click", () => {
            alert("Redirecting to full post...");
            // Replace with actual redirect URL
            window.location.href = "#";
        });
    });
});
</script>

</body>
</html>
