<?php

ob_start(); // Met en mémoire tampon la sortie

    #demarrage de la session
    session_start();
    class User {
        public $_title = "MAISON DES LIGUES";
        public $_css; // Initialize the property
    
        public function __construct() {
            // Determine the appropriate CSS path based on the current page
            if (basename($_SERVER['PHP_SELF']) === 'index.php') {
                $this->_css = './css/style.css';
            } else {
                $this->_css = './../css/style.css';
            }
        }
    
        public static $_lang = ["fr", "en", "es"];
    }
    
    
    #Pour appeller la classe 
    $_user_new = new User();
?>
<!DOCTYPE html>
<html lang="<?= User::$_lang[0]?>">
<head>
    <meta name="description" content="Ceci est le projet Web Maison des ligues">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_user_new->_title ?></title>
    <link rel="icon" type="image/x-icon" href="favicon/favicon.ico">
    <link rel="stylesheet" href="<?= $_user_new->_css ?>">
</head>

<?php
if (isset($_SESSION['user_id'])) {
    // Affichez le contenu de la page "welcome"
    echo '<h1>Bienvenue sur la page d\'accueil !</h1>

<body>
    <header>
        <nav >
            <ul>
                <li><span class="logo" ><img src="../assets/logo/Logo_MDL.png" alt="LOGO"></span></li>
                <li><a href="./publication.php">Publier un Evenement</a></li>
                <li><a href="./eventlist.php">Voir les Evenement</a></li>
            </ul>
        </nav>
    </header>

    <section style="height : 100vh">

    </section>';

    
    // Détruisez la session "user_id"
    unset($_SESSION['user_id']);

} else {
        // Redirection de l'utilisateur vers la page de connexion
        echo '<h1>Vous ne pouvez acceder à cette page sans vous connectez vous serez redirigé vers la page de connexion !</h1>';

        #header("Location: ./connexion_user.php");
        header('Refresh: 5; url=./connexion_user.php');
        exit; // Arrêt de l'exécution du script
    }

    ob_end_flush(); // Envoie la sortie mise en mémoire tampon


    include_once __DIR__."./../includes/footer.inc.php";
?>