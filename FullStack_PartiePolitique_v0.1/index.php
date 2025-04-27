<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alliance Démocratique</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="fade-in">

<section class="header">
    <nav>
        <a href="index.php"><img src="images/Capture2.png"></a>
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
            <!-- ******************** -->
            <?php
            if (isset($_SESSION['firstname'])) {
                echo "<p>Welcome, " . htmlspecialchars($_SESSION['firstname']) . "!</p>";
                echo '<div class="pa_parent"><ul><li><a class="pa" href="includes/logout.php">LOGOUT</a><li><ul></div>';

            }
            ?>
            <!-- ******************** -->
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>
    <div class="text-box">
        <h1>Pour Une Démocratie Forte Et Inclusive</h1>
        <p>Unis pour une gouvernance équitable et transparente,<br> où chaque voix compte et chaque citoyen a un rôle à jouer.</p>
        <a href="./About.html" class="hero-btn">Visit us to know more</a>
    </div>
</section>

<section class="services">
    <h1>Services we offer</h1>
    <p>Alliance Démocratique s'engage à renforcer la démocratie et l'unité à travers une gamme de services essentiels...</p>
    <div class="row">
        <div class="services-col">
            <h3>Engagement Communautaire</h3>
            <p>Nous croyons fermement à la puissance de la communauté...</p>
        </div>
        <div class="services-col">
            <h3>Soutien aux Initiatives Citoyennes</h3>
            <p>Nous encourageons et soutenons les initiatives citoyennes...</p>
        </div>
        <div class="services-col">
            <h3>Plaidoyer et Représentation</h3>
            <p>Nous sommes vos représentants dévoués sur la scène politique...</p>
        </div>
    </div>
</section>

<section class="campus">
    <h1>Nos Implantations Nationales</h1>
    <p>Ensemble, nos bureaux régionaux et groupes locaux forment un réseau national fort et résilient...</p>
    <div class="row">
        <div class="campus-col">
            <img src="images/casablanca.png">
            <div class="layer">
                <h3>CASABLANCA</h3>
            </div>
        </div>
        <div class="campus-col">
            <img src="images/rabat.png">
            <div class="layer">
                <h3>RABAT</h3>
            </div>
        </div>
        <div class="campus-col">
        <img src="images/fes.png">
            <div class="layer">
            <h3>FES</h3>
            </div>
        </div>
    </div>
</section>

<section class="facilities">
    <h1>Our facilities</h1>
    <p>Nos installations comprennent des salles de réunion modernes, un centre de ressources, une salle polyvalente, des ateliers créatifs, un centre de bien-être et un hub technologique, conçus pour favoriser la collaboration, l'innovation et le bien-être de notre communauté.</p>
    <div class="row">
        <div class="facilities-col">
            <img src="images/bureauModerne.png">
            <h3>Bureaux Modernes</h3>
            <p>Nos bureaux, situés dans diverses régions, sont équipés pour accueillir des réunions...</p>
        </div>
        <div class="facilities-col">
            <img src="images/modernRessource.png">
            <h3>Centre de Ressources</h3>
            <p>Notre centre de ressources est à la disposition des citoyens...</p>
        </div>
        <div class="facilities-col">
            <img src="images/espaceCommu.png">
            <h3>Espace Communautaire</h3>
            <p>Nos espaces communautaires sont conçus pour accueillir des événements sociaux...</p>
        </div>
    </div>
</section>

<section class="testimonials">
    <h1>Témoignages de Nos Citoyens</h1>
    <p>Ces témoignages mettent en lumière l'impact positif de l'Alliance Démocratique...</p>
    <div class="row">
        <div class="testimonial-col">
            <img src="images/Ahmed.png">
            <div>
                <p>En tant qu'entrepreneur, j'ai bénéficié du soutien de l'Alliance Démocratique...</p>
                <h3>Ahmed Ben Ali</h3>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
        </div>

        <div class="testimonial-col">
            <img src="images/Sophie.png">
            <div>
                <p>Participer aux forums communautaires organisés par l'Alliance Démocratique...</p>
                <h3>Zineb El-Hachimi</h3>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
            </div>
        </div>
    </div>
</section>

<section class="cta fade-in">
    <h1>Engagez-vous pour un Futur Meilleur :<br> Partagez Vos Idées</h1>
    <a href="contact.html" class="hero-btn">CONTACT US</a>
</section>

<section class="footer fade-in">
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
        const anchors = document.querySelectorAll('a[href^="http"], a[href^="about.html"], a[href^="services.html"], a[href^="Blog.php"], a[href^="contact.html"]');
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