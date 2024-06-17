<?php
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

<body>
    <header>
        <nav >
        <?php
            if (basename($_SERVER['PHP_SELF']) === 'index.php') {
                echo '<ul>
                <li><a class="logo"  href="index.php"><img src="assets/logo/Logo_MDL.png" alt="LOGO"></a></li>
                <li><a href="src/inscription_user.php">Inscription</a></li>
                <li><a href="src/connexion_user.php">Connexion</a></li>
                <li><a href="#">Admin</a></li>
                <!--Soit gerer la redirection lors d ela connexion 
                    ou bien creer un epage special pour admin -->
            </ul>';
            } else {
                echo '<ul>
                <li><a class="logo" href="../index.php"><img src="../assets/logo/Logo_MDL.png" alt="LOGO"></a></li>
                <li><a href="./inscription_user.php">Inscription</a></li>
                <li><a href="./connexion_user.php">Connexion</a></li>
                <li><a href="#">Admin</a></li>
            </ul>';
            }
            ?>
        </nav>
    </header>