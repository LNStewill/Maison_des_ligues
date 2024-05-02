<?php

class UserSubscription {

    static function insertUser() {
        require_once "config.inc.php"; # Inclure le fichier de configuration de la base de données

        require_once "connection_bdd.php";

            // Vérifier si le formulaire a été soumis
            if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                // Récupérer le mail et le mot de passe du formulaire
                $nom= $_POST['nom'];
                $prenom = $_POST['prenom'];
                $mail = $_POST["mail"];
                $login = $_POST["login"];
                $mot_de_passe = $_POST["mot_de_passe"];
                $ville = $_POST["ville"];

        
                // Vérifier si l'utilisateur existe déjà dans la base de données
                $_requete_Verif = $connexion->prepare("SELECT id FROM utilisateurs WHERE mail = ?");
                # $_requete_Verif->bindParam(1, $nom);
                # $_requete_Verif->bindParam(2, $prenom);
                $_requete_Verif->bindParam(1, $mail);
                $_requete_Verif->bindParam(2, $login);
                $_requete_Verif->execute();
               
                if ($_requete_Verif->rowCount() > 0) {
                    
                    // L'utilisateur existe déjà, stocker un message d'erreur dans la session
                    $_SESSION['errors'][] = "Cette adresse e-mail est déjà enregistrée. Choisissez une autre adresse e-mail.";
                    // L'utilisateur existe déjà, afficher un message d'erreur
                    #print '<p class="warning msg-alert">Cette adresse e-mail est déjà enregistrée. Choisissez une autre adresse e-mail.</p>';
                } 
                else 
                {
                    // L'utilisateur n'existe pas, procéder à l'insertion
                    if (empty($nom) && empty($prenom) && empty($mail) && empty($mot_de_passe) && filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                        $_SESSION['errors'][] ="Tous les champs sont obligatoires ou mail invalide";
                        #print '<p class="warning msg-alert">Tous les champs sont obligatoires ou mail invalide</p>';
                        
                        // Rediriger vers la page d'inscription
                        header("Location: ./index.php?#main2");
                        exit;                       
        
                    } else {
                        $motDePasseHash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
            
                        // Préparer la requête SQL pour insérer les données dans la base de données
                        $requete = $connexion->prepare("INSERT INTO utilisateurs (nom, prenom, mail, mot_de_passe) VALUES (?, ?, ?, ?)");
                
                        // Stockez les informations dans des variables de session
                        $_SESSION['nom'] = $nom;
                        $_SESSION['prenom'] = $prenom;

                        // Binder les paramètres
                        $requete->bindParam(1, $nom);
                        $requete->bindParam(2, $prenom);
                        $requete->bindParam(3, $mail);
                        $requete->bindParam(4, $motDePasseHash);

                        // Exécuter la requête
                        $requete->execute();
                        // Stocker un message de succès dans la session
                        $_SESSION['success_message'][] = "Bonjour ".$prenom ." ". $nom . " Inscription réussie ! Vous pouvez maintenant vous connecter.";

                        // Rediriger vers la page de connexion (ou toute autre page souhaitée)
                        #header("Location: ./src/connexion.php");
                        exit;
                    
                    }
                }
        
                // Fermer la connexion
                $connexion = null;
                
            }
    }
}

// Utilisation
UserSubscription::insertUser();