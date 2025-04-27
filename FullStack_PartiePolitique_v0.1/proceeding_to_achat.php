<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proceeding to Achat - Alliance Démocratique</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style8.css">
</head>
<body class="fade-in">
<?php
    if(isset($_GET['i'])){
        $prod=$_GET['i'];
    }
?>
<section class="header">
    <nav>
        <a href="index.php"><img src="images/Capture2.png" alt="Alliance Démocratique Logo"></a>
        <div class="nav-links" id="navLinks">
            <i class="fa fa-times" onclick="hideMenu()"></i>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="About.html">ABOUT</a></li>
                <li><a href="Services.html">SERVICES</a></li>
                <li><a href="Blog.php">BLOG</a></li>
                <li><a href="contact.html">CONTACT</a></li>
                <li><a href="shop.php">SHOP</a></li>
            </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>
</section>

<section class="order-process">
    <h1>Proceeding to Achat</h1>
    <p>Thank you for your order! Please fill out the form below to complete your purchase.</p>
    <form action="includes/checkout.php" method="post">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="fullname" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="payment-method">Payment Method:</label>
        <div class="payment-method">
            <div class="payment-option">
                <input type="radio" id="credit-card" name="payment-method" value="credit-card" checked>
                <label for="credit-card">
                    <img src="images/visa.png" alt="Credit Card">
                </label>
            </div>
            <div class="payment-option">
                <input type="radio" id="paypal" name="payment-method" value="paypal">
                <label for="paypal">
                    <img src="images/paypal.png" alt="PayPal">
                </label>
            </div>
            <div class="payment-option">
                <input type="radio" id="masterpass" name="payment-method" value="masterpass">
                <label for="masterpass">
                    <img src="images/masterpass.png" alt="Masterpass">
                </label>
            </div>
        </div>

        <label for="card-number">Credit Card Number:</label>
        <input type="text" id="card-number" name="card-number" placeholder="XXXX-XXXX-XXXX-XXXX" required>

        <label for="security-code">Security Code:</label>
        <input type="text" id="security-code" name="security-code" placeholder="CVV" required>

        <label for="expiration-date">Expiration Date:</label>
        <div class="expiration-date">
            <select id="exp-month" name="exp-month" required>
                <option value="" disabled selected>Month</option>
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
            <select id="exp-year" name="exp-year" required>
                <option value="" disabled selected>Year</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="2029">2029</option>
                <option value="2030">2030</option>
                <option value="2031">2031</option>
                <option value="2032">2032</option>
                <option value="2033">2033</option>
                <option value="2034">2034</option>
                <option value="2035">2035</option>
            </select>
        </div>
        <input type="hidden" name="idprod" value="<?php echo htmlspecialchars($prod); ?>">
        <button type="submit">Submit Order</button>
    </form>
</section>

<section class="footer">
    <p>Alliance Démocratique : Unir les citoyens pour construire un avenir juste et inclusif.</p>
    <div class="icons">
        <a href="https://web.facebook.com/profile.php?id=61560315111584" class="fa fa-facebook"></a>
        <a href="https://www.linkedin.com/in/alliance-d%C3%A9mocratique-16579a30b/" class="fa fa-linkedin"></a>
        <a href="https://x.com/A_Democratique" class="fa fa-twitter"></a>
    </div>
    <p>Made with <i class="fa fa-heart-o"></i> by Miahi Othmane, Saad Ilias, Chaffaa Mohammed</p>
</section>

<script>
    var navLinks = document.getElementById("navLinks");
    function showMenu(){
        navLinks.style.right = "0";
    }
    function hideMenu(){
        navLinks.style.right = "-200px";
    }

    document.addEventListener("DOMContentLoaded", function() {
        const anchors = document.querySelectorAll('a[href^="http"], a[href^="about.html"], a[href^="services.html"], a[href^="blog.html"], a[href^="contact.html"]');
        const body = document.body;

        anchors.forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetUrl = this.getAttribute('href');

                body.classList.add('fade-out');

                setTimeout(() => {
                    window.location.href = targetUrl;
                }, 500);
            });
        });

        body.classList.add('fade-in');
    });

    document.getElementById('security-code').addEventListener('input', function (e) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    document.getElementById('card-number').addEventListener('input', function (e) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
</script>
</body>
</html>
