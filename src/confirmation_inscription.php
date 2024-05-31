<?php
    include_once __DIR__."./../controller/header.inc.php";
?>

    <section class="content">
        <h1>
            MAISON DES LIGUES TOUS LES SPORTS
        </h1>
    </section> 

    <section class="confirmation_membre">
        <h1>
        🏆Vous êtes le nouveau membre
        </h1>
        
        <?php
            if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
                $nom = $_SESSION['nom'];
                $prenom = $_SESSION['prenom'];
            
                // Affiche le message de bienvenue
                echo '<article class="content_2">
                        <p class="paragraph">
                            Bonjour, ' . $prenom . ' ' . $nom . '. Bienvenue dans votre espace !
                        </p>
                      </article>';
            
                // Affiche les autres informations dans une liste <ul>
                echo '<ul>';
                // Nom
                echo '<li>Nom: ' . $nom . '</li>';
                // Prénom
                echo '<li>Prénom: ' . $prenom . '</li>';
                // Ville (remplacez par la variable appropriée)
                echo '<li>Ville: Votre ville</li>';
                // Date de naissance (remplacez par la variable appropriée)
                echo '<li>Date de naissance: 1001 1970</li>';
                // Photo (remplacez par la variable appropriée)
                echo '<li>Photo: <img src="chemin_vers_votre_photo.jpg" alt="Votre photo"></li>';
                echo '</ul>';
            }          

        ?>

        <?php

            if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
                $nom = $_SESSION['nom'];
                $prenom = $_SESSION['prenom'];
                echo '<article class="content_2">
                        <p class="paragraph">
                            Bonjour, ' . $prenom . ' ' . $nom . '. Bienvenue dans votre espace !
                        </p>
                        <p class="paragraph">';
                require_once __DIR__ . "/../controller/controller.class.php";
                echo '</p>
                      </article>';
            } else {
                echo '<article class="content_2">
                        <p class="paragraph">
                            Bonjour votre session a expiré ou vous êtes actuellement déconnecté
                            <br/>
                            Vous serez redirigé vers la page d\'accueil  sous peu ! 
                        </p>
                        <p class="paragraph">
                      </article>';

                header("Location: ./index.php");
            }
        ?>
        
        <form action="#">
            <button>Retour à l'accueil</button>
        </form>

        <form action="#">
            <button>Connectez-vous</button>
        </form>
    </section>


<?php
    include_once __DIR__."./../includes/footer.inc.php";
?>