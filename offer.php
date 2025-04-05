<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Now</title>
    
    <!-- Link to offer.css -->
    <link rel="stylesheet" href="css/offer.css">
</head>
<body>
    <div class="container">
        <div class="centered-form">
            <!-- login form -->
            <form action="offer-con.php" method="POST" class="form" id="confirmationForm">
                <h2>Confirm Now</h2>
                
                <div class="input-group">
                    <label for="fullName">Full Name</label>
                    <input type="text" name="fullName" id="fullName" required/>
                </div>
</p>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required/>
                </div>
                </p>
                <div class="input-group">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="tel" name="phoneNumber" id="phoneNumber" required/>
                </div>
                </p>
                <div class="input-group">
                    <label for="time">Time</label>
                    <input type="time" name="time" id="time" required/>
                </div>
                </p>
                <div class="input-group">
                    <label for="pack">Pack Category</label>
                    <input type="text" name="packCategory" id="packCategory" required/>
                </div>
                </p>
                <button type="submit" class="btn primary">Confirm</button>

            </form>
        </div>
    </div>

    <script src="js/offer.js"></script>
</body>
</html>
