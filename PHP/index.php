<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAISON DES LIGUES</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav >
            <ul>
                <li><span class="logo"><img src="../assets/logo/Logo_MDL.png" alt="LOGO"></span></li>
                <li><a href="src/inscription_user.php">Inscription</a></li>
                <li><a href="src/connexion_user.php">Connexion</a></li>
                <li><a href="#">Admin</a></li>
                <!--Soit gerer la redirection lors d ela connexion 
                    ou bien creer un epage special pour admin -->
            </ul>
        </nav>
    </header>
    <main >
        <section class="content" >
            <h1>
                MAISON DES LIGUES TOUS LES SPORTS
            </h1>
        </section>
        
        <section class="content" >
            <h1>
                Prêt(e) à la compétition? Cliquez sur le bouton pour commencer
            </h1>
    
            <article>
                Tous les mois profitez de toutes les nouveautés et opportunités. A partir du mois
    prochain on vous propose toutes les séance de sport sur vos support préférés
            </article>
        </section>
    
        <section class="main_container" style="position: relative; left: 2%;max-width: 96%; display: flex; flex-direction: row; flex-wrap: wrap; margin: 0 auto;">
            <article class="event_container" > <img class="event_image" src="../assets/logo/Boost.png" alt=""> <p></p> </article>
            <article class="event_container" > <img class="event_image" src="../assets/logo/Boostrap.jpg" alt=""> <p></p> </article>
            <article class="event_container" > <img class="event_image" src="../assets/logo/Boostrap.png" alt=""> <p></p> </article>
            <article class="event_container" > <img class="event_image" src="../assets/logo/CSS.jpeg" alt=""> <p></p> </article>
    
            <article class="event_container" > <img class="event_image" src="../assets/logo/CSS.png" alt=""> <p></p> </article>
            <article class="event_container" > <img class="event_image" src="../assets/logo/css3-logo.png" alt=""> <p></p> </article>
            <article class="event_container" > <img class="event_image" src="../assets/logo/HTML.jpeg" alt=""> <p></p> </article>
            <article class="event_container" > <img class="event_image" src="../assets/logo/HTML.png" alt=""> <p></p> </article>
    
            <article class="event_container" > <img class="event_image" src="../assets/logo/HTML1.jpeg" alt=""> <p></p> </article>
            <article class="event_container" > <img class="event_image" src="../assets/logo/HTML2.png" alt=""> <p></p> </article>
            <article class="event_container" > <img class="event_image" src="../assets/logo/image-260nw-1315562843.webp" alt=""> <p></p> </article>
            <article class="event_container" > <img class="event_image" src="../assets/logo/JS.jpg" alt=""> <p></p> </article>
    
            <article class="event_container" > <img class="event_image" src="../assets/logo/JS.jpg" alt=""> <p></p> </article>
            <article class="event_container" > <img class="event_image" src="../assets/logo/JS.png" alt=""> <p></p> </article>
            <article class="event_container" > <img class="event_image" src="../assets/logo/markdown (1).png" alt=""> <p></p> </article>
            <article class="event_container" > <img class="event_image" src="../assets/logo/markdown-1200-628.jpg" alt=""> <p></p> </article>
        </section>
    
        <form class="btn_start" action="src/inscription_user.php">
            <button>Cliquer pour vous inscrire</button>
        </form>
    
        <span class="span_image" >
            <img src="../assets/en_construction.jpg" alt="en_construction">
        </span>
    
    </main>

    <footer class="footer">
        &copy; - Maison_des_ligues - <a href="#">LNS</a> - 2024
    </footer>
</body>
</html>