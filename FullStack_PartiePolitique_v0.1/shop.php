<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - Alliance Démocratique</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style7.css">
</head>
<body class="fade-in">

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

<section class="shop">
    <h1>Our Products</h1>
    <div class="row">
        <div class="shop-item">
            <img src="images/casquette.PNG" alt="Hat">
            <h3>Hat</h3>
            <?php
                $prod=1;
                $con = mysqli_connect("localhost", "root", "", "siphpdb");
                $query = "SELECT price FROM produit WHERE id=1";
                $query_run = mysqli_query($con, $query);

                if ($query_run) {
                    $row = mysqli_fetch_assoc($query_run); 
                    if ($row) {
                        echo '<p>' . $row['price'] . '</p>';
                    }
                } else {
                    echo "Query failed: " . mysqli_error($con);
                }
            
            echo"<a href='proceeding_to_achat.php?i=$prod' class='order-btn'>Order</a>"
            ?>
        </div>
        <div class="shop-item">
            <img src="images/flag.png" alt="Flag">
            <h3>Flag</h3>
            <?php
                $prod=2;
                $query = "SELECT price FROM produit WHERE id=2";
                $query_run = mysqli_query($con, $query);

                if ($query_run) {
                    $row = mysqli_fetch_assoc($query_run);
                    if ($row) {
                        echo '<p>' . $row['price'] . '</p>';
                    }
                } else {
                    echo "Query failed: " . mysqli_error($con);
                }
                echo"<a href='proceeding_to_achat.php?i=$prod' class='order-btn'>Order</a>"
            ?>
            
        </div>
        <div class="shop-item">
            <img src="images/Tshirt.PNG" alt="Tshirt">
            <h3>Tshirt</h3>
            <?php
                $prod=3;
                $query = "SELECT price FROM produit WHERE id=3";
                $query_run = mysqli_query($con, $query);

                if ($query_run) {
                    $row = mysqli_fetch_assoc($query_run); 
                    if ($row) {
                        echo '<p>' . $row['price'] . '</p>';
                    }
                } else {
                    echo "Query failed: " . mysqli_error($con);
                }
                mysqli_close($con);
                echo"<a href='proceeding_to_achat.php?i=$prod' class='order-btn'>Order</a>"
            ?>
            
        </div>
    </div>
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
        const anchors = document.querySelectorAll('a[href^="http"], a[href^="about.html"], a[href^="services.html"], a[href^="blog.html"], a[href^="contact.html"], a[href^="shop.php"]');
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
</script>
</body>
</html>
