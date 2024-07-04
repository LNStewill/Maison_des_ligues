<?php

class UserUpdateMDP {

    static function updateMDP() {
        try {
            //code...
            
            $id = $_GET['id'];
        require_once "config.inc.php"; # Inclure le fichier de configuration de la base de données

        require_once "connection_bdd.php";

            // Vérifier si le formulaire a été soumis
            if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                // Récupérer les données en entrée du formulaire
                $new_mdp= $_POST['new_mdp'];
                $new_mdp_confirm = $_POST['new_mdp_confirm'];

                #Verifier si les champs sont remplis

                if (empty($new_mdp) || empty($new_mdp_confirm) ) {
                    $_SESSION['change_mdp_errors'][] ="Les champs sont obligatoires";
                    #print '<p class="warning msg-alert">Tous les champs sont obligatoires</p>';
                    
                    // Rediriger vers la page d'inscription
                    #header("Location: ./index.php");
                    exit;                       
    
                } else {

                    #$motDePasse = "VotreMotDePasse"; // Remplacez par le mot de passe à vérifier
                    if (preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/', $new_mdp)) {
                        #echo "Mot de passe valide !";

                        if($new_mdp===$new_mdp_confirm) {
                            #$id = $_GET['id'];
    
                            $value = 2;
                        // Vérifier si l'utilisateur existe déjà dans la base de données
                        $_requete_changerMDP = $connexion->prepare("UPDATE utilisateur SET mot_de_passe = $new_mdp, indice_first_connexion = $value WHERE id_utilisateur = $id");
                
                        $_requete_changerMDP->execute();

                        $_SESSION['change_mdp_succes'][] ="Modification effectuées avec succes";

                        header("Location: ../src/confirmation_inscription.php");
                    
                        exit;
                        } else {
                            $_SESSION['change_mdp_errors'][] ="les deux mdp doivent correspondent";
                        }
                    } else {
                        $_SESSION['change_mdp_errors'][] = "Mot de passe invalide. il ne correspond aps aux critères mentionnées";
                    }


                    
                    

                }
                // Fermer la connexion
                $connexion = null;
            }
        } catch (\Throwable $th) {
            //throw $th;
            $th ="id null" ;
        }
            
    }

}    
// Utilisation
UserUpdateMDP::updateMDP();