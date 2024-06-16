<?php
    // Début de la page
    ob_start(); // Met en mémoire tampon la sortie
    include_once __DIR__."./../controller/header.inc.php";
?>

    <section class="content">
        <h1>
            MAISON DES LIGUES TOUS LES SPORTS
        </h1>
    </section> 

    <section class="confirmation_membre">

        <?php
            if (isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset($_SESSION['email']) && isset($_SESSION['ville']) && isset($_SESSION['image_profile'])) {
                $nom = $_SESSION['nom'];
                $prenom = $_SESSION['prenom'];
                $mail = $_SESSION['email'];
                $ville = $_SESSION['ville'];
                $photo = $_SESSION['image_profile'];

                echo' <h1>Merci de vous êtes inscrit ! Votrre formulaire a été soumis avec succès.</h1>
        
                <h1>
                🏆Vous êtes le nouveau membre
                </h1>';
            
                // Affiche les autres informations dans une liste <ul>
                echo '<ul>';
                // Nom
                echo '<li>Nom: ' . $nom . '</li>';
                // Prénom
                echo '<li>Prénom: ' . $prenom . '</li>';
                echo '<li>Mail: ' . $mail . '</li>';
                // Ville (remplacez par la variable appropriée)
                echo '<li>Votre ville: ' . $ville . '</li>';
                // Photo (remplacez par la variable appropriée)
                echo '<li>Photo:<br/> <img style="width : 100%" src=" '.$photo.' " alt="Votre photo"></li>';
                echo '</ul>';

                session_destroy();
            } else {
                echo '<article class="content_2">
                        <h1 class="paragraph">
                            Bonjour votre session a expiré ou vous êtes actuellement déconnecté
                            <br/>
                            Vous serez redirigé vers la page d\'accueil  sous peu ! 
                        </h1>
                      </article>';

                #header("Location: ./index.php");
                header('Refresh: 5; url=../index.php');
            }
        ?>
        <article style="text-align : center">
            <form action="../index.php">
                <button class="btn_start">Retour à l'accueil</button>
            </form>
            <form action="./connexion_user.php">
                <button class="btn_start">Connectez-vous</button>
            </form>
        </article>
        
        
    </section>


<?php
// Fin de la page
ob_end_flush(); // Envoie la sortie mise en mémoire tampon
    include_once __DIR__."./../includes/footer.inc.php";
?>