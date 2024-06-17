<?php

class UserUpdate {

    static function updateMDP() {
        require_once "config.inc.php"; # Inclure le fichier de configuration de la base de données

        require_once "connection_bdd.php";

            // Vérifier si le formulaire a été soumis
            if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                // Récupérer les données en entrée du formulaire
                $new_mdp= $_POST['new_mdp'];
                $new_mdp_confirm = $_POST['new_mdp_confirm'];

                #Verifier si les champs sont remplis

                if (empty($new_mdp) || empty($new_mdp_confirm) ) {
                    $_SESSION['errors'][] ="Les champs sont obligatoires";
                    #print '<p class="warning msg-alert">Tous les champs sont obligatoires</p>';
                    
                    // Rediriger vers la page d'inscription
                    #header("Location: ./index.php");
                    exit;                       
    
                } else {
                         
                    $id = $_GET['id'];
                    // Vérifier si l'utilisateur existe déjà dans la base de données
                    $_requete_changerMDP = $connexion->prepare("UPDATE utilisateur SET mot_de_passe = $new_mdp WHERE id_utilisateur = $id");
            
                    $_requete_changerMDP->execute();
                
                    if ($_requete_Verif->rowCount() > 0) {
                        
                        // L'utilisateur existe déjà, stocker un message d'erreur dans la session
                        $_SESSION['errors'][] = "Cette adresse e-mail et ou login est déjà enregistrée. Choisissez en un autre.";
                        // L'utilisateur existe déjà, afficher un message d'erreur
                        #print '<p class="warning msg-alert">Cette adresse e-mail est déjà enregistrée. Choisissez une autre adresse e-mail.</p>';
                    } 
                            exit;

                }
                // Fermer la connexion
                $connexion = null;
            }
        }    
    }
// Utilisation
UserUpdate::updateMDP();