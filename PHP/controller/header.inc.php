<?php
    #demarrage de la session
    session_start();
    class User {
        public $_title = "MAISON DES LIGUES";
        public $_css; // Initialize the property
    
        public function __construct() {
            // Determine the appropriate CSS path based on the current page
            if (basename($_SERVER['PHP_SELF']) === 'index.php') {
                $this->_css = './../css/style.css';
            } else {
                $this->_css = './../../css/style.css';
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
    <meta name="description" content="Ceci est l'exercice du partiel gmail">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_user_new->_title ?></title>
    <link rel="icon" type="image/x-icon" href="favicon/favicon.ico">
    <link rel="stylesheet" href="<?= $_user_new->_css ?>">
</head>

<body>
    <header>
        <nav >
        <?php
            if (basename($_SERVER['PHP_SELF']) === 'index.php') {
                echo '<ul>
                <li><span class="logo"><img src="assets/logo/Logo_MDL.png" alt="LOGO"></span></li>
                <li><a href="pages/inscription_user.html">Inscription</a></li>
                <li><a href="pages/connexion_user.html">Connexion</a></li>
                <li><a href="#">Admin</a></li>
                <!--Soit gerer la redirection lors d ela connexion 
                    ou bien creer un epage special pour admin -->
            </ul>';
            } else {
                echo '<ul>
                <li><span class="logo" ><img src="assets/logo/Logo_MDL.png" alt="LOGO"></span></li>
                <li><a href="./inscription_user.html">Inscription</a></li>
                <li><a href="./connexion_user.html">Connexion</a></li>
                <li><a href="#">Admin</a></li>
            </ul>';
            }
            ?>
        </nav>
    </header>