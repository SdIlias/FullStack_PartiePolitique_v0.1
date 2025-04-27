<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="style4.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="fade-in">
    <section class="header">
        <nav>
            <a href="index.php"><img src="images/Capture2.png" alt="Logo"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                    <li><a href="services.html">SERVICES</a></li>
                    <li><a href="blog.php">BLOG</a></li>
                    <li><a href="contact.html">CONTACT</a></li>
                    <li><a href="shop.php">SHOP</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
    </section>

    <!-- The Modal -->
    <div id="requestModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Submit a Request</h2>
            <form id="requestForm" method="post" action="includes/blog_db.php">
                <label for="problem">Problem:</label>
                <input type="text" id="problem" name="title" required>
                <label for="comments">Description:</label>
                <textarea id="comments" name="description" required></textarea>
                <button type="submit" class="styled-button">Submit</button>
            </form>
        </div>
    </div>

    <div class="button-container">
        <button id="openModalBtn" class="styled-button">New Complaint</button>
    </div>

    <div class="container">
        <h2>Blog</h2>
        <div class="blog-posts">
            <div class="blog-post">
                <div class="blog-post_info">
                    <div class="blog-post_date">
                        <span>Ahmed Bettah</span>
                        <span>2024-04-20</span>
                    </div>
                    <h1 class="blog-post_title">Problème de la Corruption Politique</h1>
                    <p class="blog-post_text">La corruption politique reste un fléau qui mine la confiance des citoyens dans leurs institutions et entrave le développement socio-économique du pays. Notre parti politique s'engage à mener une lutte acharnée contre toutes formes de corruption en instaurant des mesures de transparence et de responsabilité. Il est essentiel de renforcer les mécanismes de contrôle et d'audit des dépenses publiques, de promouvoir la transparence dans les processus de passation des marchés publics, et d'assurer des sanctions sévères pour les actes de corruption. En garantissant l'intégrité et la probité de nos dirigeants, nous pourrons restaurer la confiance du public et promouvoir une gouvernance plus transparente et responsable.</p>
                    <a href="#" class="blog-post_cta" onclick="togglePopup()">Party answers</a>
                </div>
            </div>

            <div class="blog-post">
                <div class="blog-post_info">
                    <div class="blog-post_date">
                        <span>Sophia Alaoui</span>
                        <span>2024-05-12</span>
                    </div>
                    <h1 class="blog-post_title">Problème des Inégalités Économiques</h1>
                    <p class="blog-post_text">Les inégalités économiques sont un problème majeur qui affecte notre société à tous les niveaux. Malgré les avancées économiques, une grande partie de la population continue de vivre dans la précarité, incapable de répondre à ses besoins fondamentaux. Il est impératif que notre parti politique mette en place des politiques publiques visant à réduire ces disparités. Cela passe par une réforme fiscale progressive, la création d'emplois décents et bien rémunérés, ainsi que par l'amélioration de l'accès à l'éducation et aux soins de santé pour les plus vulnérables. En réduisant les écarts de revenus et en offrant des opportunités égales à tous, nous pourrons construire une société plus juste et plus équitable.</p>
                    <a href="#" class="blog-post_cta" onclick="togglePopup()">Party Answers</a>
                </div>
            </div>

            <?php
                $con = mysqli_connect("localhost", "root", "", "siphpdb");
                $query = "SELECT title, description FROM blog";
                $query_run = mysqli_query($con, $query);
                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $row) {
                        echo '<div class="blog-post">
                                <div class="blog-post_info">
                                    <div class="blog-post_date">
                                        <span>User</span>
                                        <span>' . formatDate(date("Y-m-d")) . '</span>
                                    </div>
                                    <h1 class="blog-post_title">' . $row['title'] . '</h1>
                                    <p class="blog-post_text">' . $row['description'] . '</p>
                                    <a href="#" class="blog-post_cta" onclick="togglePopup()">Party answers</a>
                                </div>
                                </div>'
                                ;
                    }
                }
            ?>

        </div>
    </div>

    <div class="popup" id="popup-1">
        <div class="overlay"></div>
        <div class="content">
            <div class="close-btn" onclick="togglePopup()">&times;</div>
            <h1>Alliance Démocratique</h1>
            <p>Nous vous remercions pour votre participation. Nous allons examiner votre réclamation et vous fournir une réponse dans un délai de 48 heures.</p>
        </div>
    </div>

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
        function showMenu() {
            navLinks.style.right = "0";
        }
        function hideMenu() {
            navLinks.style.right = "-200px";
        }
       <?php
        function formatDate($date) {
            return date('Y-m-d', strtotime($date)); // Adjust the date format as needed
        }
?>

        document.addEventListener("DOMContentLoaded", function() {
            const anchors = document.querySelectorAll('a[href^="http"], a[href^="about.html"], a[href^="services.html"], a[href^="blog.php"], a[href^="contact.html"]');
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

        function togglePopup() {
            const popup = document.getElementById("popup-1");
            popup.classList.toggle("active");
        }

        var modal = document.getElementById("requestModal");

        function openModal() {
            modal.style.display = "block";
        }

        function closeModal() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        var btn = document.getElementById("openModalBtn");
        btn.onclick = function() {
            modal.style.display = "block";
        }
        
        function formatDate(date) {
            const options = { day: '2-digit', month: 'long', year: 'numeric' };
            return new Date(date).toLocaleDateString('fr-FR', options);
        } 
    </script>
</body>
</html>
