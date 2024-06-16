<?php
class LoginController {

    static function event(){

        require_once "config.inc.php"; # Inclure le fichier de configuration de la base de données

        require_once "connection_bdd.php"; # Inclure le fichier de connexion à la bdd

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $identifiant = $_POST["identifiant"]; // Peut être l'adresse e-mail ou le nom d'utilisateur
            $mot_de_passe = $_POST["mot_de_passe"];

            if (empty($identifiant)) {
                $_SESSION['login_errors'][] = "Veuillez renseigner votre identifiant (e-mail ou nom d'utilisateur)";
            } elseif (empty($mot_de_passe)) {
                $_SESSION['login_errors'][] = "Veuillez renseigner votre mot de passe";
            } else {
                // Vérification si l'identifiant est une adresse e-mail valide
                if (filter_var($identifiant, FILTER_VALIDATE_EMAIL)) {
                    // Vérifier si l'utilisateur existe déjà dans la base de données
                    $_requete_Verif = $connexion->prepare("SELECT * FROM utilisateur WHERE email = ?");
                } else {
                    // Vérifier si l'utilisateur existe déjà dans la base de données
                    $_requete_Verif = $connexion->prepare("SELECT * FROM utilisateur WHERE login = ?");
                }
                    
                    $_requete_Verif->bindParam( 1, $identifiant);
                    #$_requete_Verif->bindParam( 2, $identifiant);
                    $_requete_Verif->execute();
                    // Récupération des résultats
                    $usertab = $_requete_Verif->fetch(PDO::FETCH_ASSOC);

                    if ($_requete_Verif->rowCount() > 0) {
                        if (password_verify($mot_de_passe, $usertab["mot_de_passe"])) {
                            // L'utilisateur est authentifié
                            $_SESSION['user_id'] = $usertab['id_utilisateur'];
                            $_SESSION['user_name'] = $usertab['login'];
                            header("Location: ../src/welcome.php");

                            echo'vous etes connecté';
                            exit;
                        } else {
                            $_SESSION['login_errors'][] = "Erreur de mot de passe";
                        }
                    } else {
                        $_SESSION['login_errors'][] = "Identifiant introuvable";
                    }
            }
        }
    }
}
// Utilisation
LoginController::event();