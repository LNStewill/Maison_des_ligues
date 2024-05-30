<?php

class EventSubscription {

    static function insertEvent() {
        require_once "config.inc.php"; # Inclure le fichier de configuration de la base de données

        require_once "connection_bdd.php";

            // Vérifier si le formulaire a été soumis
            if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                // Récupérer les données en entrée du formulaire
                $image_event= $_POST['image_event'];
                $titre_event = $_POST['titre_event'];
                $description = $_POST["description"];

        
                // Vérifier si l'evenement existe déjà dans la base de données
                $_requete_Verif = $connexion->prepare("SELECT id_event FROM evenement WHERE titre_event = ?");
        
                $_requete_Verif->bindParam(1, $titre_event);
                $_requete_Verif->execute();
               
                if ($_requete_Verif->rowCount() > 0) {
                    
                    // L'event existe déjà, stocker un message d'erreur dans la session
                    $_SESSION['errors'][] = "Un event portant ce titre est déjà enregistrée. Publiez en un autre.";
                    // L'event existe déjà, afficher un message d'erreur
                    #print '<p class="warning msg-alert">Cette adresse e-mail est déjà enregistrée. Choisissez une autre adresse e-mail.</p>';
                } 
                else 
                {
                    // L'event n'existe pas, procéder à l'insertion
                    if (empty($image_event) && empty($titre_event) && empty($description)) {
                        $_SESSION['errors'][] ="Tous les champs sont obligatoires ";
                        #print '<p class="warning msg-alert">Tous les champs sont obligatoires ou mail invalide</p>';
                        
                        // Rediriger vers la page d'inscription
                        #header("Location: ./index.php");
                        exit;                       
        
                    } else {

                        if ($_FILES["image_event"]["error"] == UPLOAD_ERR_OK) {
                            $photo_name = htmlspecialchars(basename($_FILES["image_event"]["name"]));
                            
                            # Vérifier l'extension et autoriser une extention
                            $allowed_extensions = array("jpg", "jpeg", "png");
                            $photo_extension = strtolower(pathinfo($photo_name, PATHINFO_EXTENSION));
                    
                            if (!in_array($photo_extension, $allowed_extensions)) {
                                $errors[] = "L'extension de la photo doit être jpg, jpeg, ou png.";
                            }
                    
                            # Vérifier la taille maximale (2 Mo ici, mais tu peux ajuster selon tes besoins)
                            $max_size = 2 * 1024 * 1024; # 2 Mo
                            if ($_FILES["image_event"]["size"] > $max_size) {
                                $errors[] = "La taille de la photo ne doit pas dépasser 2 Mo.";
                            }
                    
                            move_uploaded_file($_FILES["image_event"]["tmp_name"], "uploads/evenement" . $photo_name);
                        } else {
                            $_SESSION['errors'][] = "Erreur lors du téléchargement de la photo.";
                        }
            
                        // Préparer la requête SQL pour insérer les données dans la base de données
                        $requete = $connexion->prepare("INSERT INTO evenement (image_event, titre_event, description) VALUES (?, ?, ?)");
                
                        // Stockez les informations dans des variables de session
                        #$_SESSION['nom'] = $nom;
                        #$_SESSION['prenom'] = $prenom;

                        // Binder les paramètres
                        $requete->bindParam(1, $image_event);
                        $requete->bindParam(2, $titre_event);
                        $requete->bindParam(3, $description);

                        // Exécuter la requête
                        $requete->execute();
                        // Stocker un message de succès dans la session
                        #$_SESSION['success_message'][] = "Bonjour ".$prenom ." ". $nom . " Inscription réussie ! Vous pouvez maintenant vous connecter.";

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
EventSubscription::insertEvent();