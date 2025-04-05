<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1c1c1c;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
            text-align: center;
        }

        h1 {
            font-size: 2.5em;
            color: #f5f5f5;
            margin: 0;
        }

        p {
            font-size: 1.2em;
            color: #b3b3b3;
            margin-top: 5px;
        }

        h2 {
            font-size: 1.8em;
            margin: 30px 0 10px;
            color: #f5f5f5;
        }
        
        /* Payment Options Styling */
        .payment-options {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin: 20px 0;
        }

        .payment-button {
            padding: 12px 24px;
            font-size: 1em;
            cursor: pointer;
            border: none;
            border-radius: 8px;
            color: #fff;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        /* Button colors */
        #card-payment-btn {
            background-color: #4CAF50;
        }
        
        #paypal-payment-btn {
            background-color: #0070BA;
        }
        
        #applepay-payment-btn {
            background-color: #A3AAAE;
        }

        #googlepay-payment-btn {
            background-color: #4285F4;
        }

        /* Hover Effect */
        .payment-button:hover {
            opacity: 0.8;
        }

        /* Modal Styling */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            overflow: auto;
        }

        .modal-content {
            background-color: #333;
            margin: 10% auto;
            padding: 20px;
            width: 90%;
            max-width: 500px;
            border-radius: 12px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            color: #fff;
        }

        .close-btn {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close-btn:hover {
            color: #f5f5f5;
        }

        /* Payment Form Styling */
        .payment-form__header h2 {
            font-size: 1.5em;
            color: #f5f5f5;
        }

        .cc-logos i {
            margin: 0 10px;
            color: #f5f5f5;
        }

        .payment_form__item, .payment-form__container {
            margin-top: 15px;
            text-align: left;
            color: #f5f5f5;
        }

        .payment_form__input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #555;
            border-radius: 8px;
            background-color: #444;
            color: #f5f5f5;
            font-size: 1em;
        }

        .button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            border: none;
            color: #fff;
            font-size: 1em;
            font-weight: bold;
            cursor: pointer;
            border-radius: 8px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h1>Salon Payment Portal</h1>
<p>Please select a payment option to proceed with your transaction.</p>

<div class="payment-options">
    <button id="card-payment-btn" class="payment-button">Card Payment</button>
    <button id="paypal-payment-btn" class="payment-button">PayPal</button>
    <button id="applepay-payment-btn" class="payment-button">Apple Pay</button>
    <button onclick="window.location.href='home.php'">Back</button>

</div>

<!-- Modal for Card Payment Form -->
<div id="paymentModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" id="closeModal">&times;</span>
        <div class="payment-form__header"><h2>Secure Payment Details</h2></div>
        <hr>
        <div class="cc-logos">
            <i class="fa fa-cc-visa fa-2x" aria-hidden="true"></i>
            <i class="fa fa-cc-mastercard fa-2x" aria-hidden="true"></i>
            <i class="fa fa-cc-amex fa-2x" aria-hidden="true"></i>
            <i class="fa fa-cc-discover fa-2x" aria-hidden="true"></i>
        </div>
        <form id="payment-form" action="userdashboard.php">
            <div class="payment_form__item">
                <label for="card-name">Name on Card</label>
                <input type="text" class="payment_form__input" id="card-name" title="Provide your first and last name">
            </div>
            <div class="payment-form__container">
                <label for="card-number">Card Number</label>
                <input type="text" class="payment_form__input" id="card-number" maxlength="19">
            </div>
            <div class="payment_form__item" id="card-expiration__month">
                <label for="card-expiration-month">Month</label>
                <select name="card-expiration-month" id="card-expiration-month">
                    <option value="">MM</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>
            <div class="payment_form__item" id="card-expiration__year">
                <label for="card-expiration-year">Year</label>
                <select name="card-expiration-year" id="card-expiration-year">
                    <option value="">YY</option>
                    <option value="2024">24</option>
                    <option value="2025">25</option>
                    <option value="2026">26</option>
                    <option value="2027">27</option>
                    <option value="2028">28</option>
                    <option value="2029">29</option>
                    <option value="2030">30</option>
                    <option value="2031">31</option>
                </select>
            </div>
            <div class="payment_form__item" id="cvc-container">
                <label for="security-code">Security Code</label>
                <input type="password" class="payment_form__input" id="security-code" maxlength="4">
            </div>
            <input type="submit" class="button" value="Pay Now">
        </form>
    </div>
</div>

<script>
    const paymentModal = document.getElementById("paymentModal");
    const openModalBtn = document.getElementById("card-payment-btn");
    const closeModalBtn = document.getElementById("closeModal");

    openModalBtn.onclick = function() {
        paymentModal.style.display = "block";
    }
    closeModalBtn.onclick = function() {
        paymentModal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target === paymentModal) {
            paymentModal.style.display = "none";
        }
    }
    document.getElementById("paypal-payment-btn").onclick = function() {
        alert("Redirecting to PayPal payment page...");
    }
    document.getElementById("applepay-payment-btn").onclick = function() {
        alert("Redirecting to Apple Pay...");
    }

    <button onclick="goHome()">Back to Home</button>


  function goHome() {
    window.location.href = '/'; // Redirects to the root URL (home)
  }

</script>

</body>
</html>
