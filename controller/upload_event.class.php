<?php

class EventSubscription {

    static function insertEvent() {
        require_once "config.inc.php"; # Inclure le fichier de configuration de la base de données

        require_once "connection_bdd.php"; # Inclure le fichier de connexion à la base de données

        // Vérifier si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") { 

            #if (isset($_FILES['image_event']) && $_FILES['image_event']['error'] === UPLOAD_ERR_OK) {
                // Récupérer les données en entrée du formulaire
                
                $titre_event = $_POST['titre_event'];
                $description = $_POST['description'];
                $image_event = $_FILES['image_event']['tmp_name'];
        
                
        
                    // L'event n'existe pas, procéder à l'insertion
                    if (empty($image_event) || empty($titre_event) || empty($description)) {
                        $_SESSION['errors'][] ="Tous les champs sont obligatoires ";
                        print '<p class="warning msg-alert">Tous les champs sont obligatoires ou mail invalide</p>';
                        
                        // Rediriger vers la page d'inscription
                        #header("Location: ./index.php");
                        exit;                       
        
                    } else {
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

                        #verification image si tout est ok !

                        if (isset($_FILES['image_event']) && $_FILES['image_event']['error'] === UPLOAD_ERR_OK) {


                            $photo_name = htmlspecialchars(pathinfo($_FILES["image_event"]["name"],PATHINFO_FILENAME));
                            $photo_extension = strtolower(pathinfo($_FILES["image_event"]["name"], PATHINFO_EXTENSION));

                            # Vérifier l'extension et autoriser une extention
                            $allowed_extensions = array("jpg", "jpeg", "png");

                            if (!in_array($photo_extension, $allowed_extensions)) {
                                $errors[] = "L'extension de la photo doit être jpg, jpeg, ou png.";
                            }

                            # Vérifier la taille maximale (2 Mo ici, mais tu peux ajuster selon tes besoins)
                            $max_size = 2 * 1024 * 1024; # 2 Mo
                            if ($_FILES["image_event"]["size"] > $max_size) {
                                $errors[] = "La taille de la photo ne doit pas dépasser 2 Mo.";
                            }

                            #renommer la photo pour éviter l'enregistrement du meme nom afin de bien gerer l'affichage

                            $photo_name = $photo_name.'_'.date("Ymd_His").'.'. $photo_extension;

                            $image_event = $photo_name;
                
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

                            if ($requete->execute()) {

                                $uploads = "./../uploads/event/";
                                
                                move_uploaded_file($_FILES["image_event"]["tmp_name"], $uploads . $photo_name);

                                // Stocker un message de succès dans la session
                                #$_SESSION['success_message'][] = "Bonjour ".$prenom ." ". $nom . " Inscription réussie ! Vous pouvez maintenant vous connecter.";

                                // Rediriger vers la page de connexion (ou toute autre page souhaitée)
                                #header("Location: ./src/connexion.php");

                        }
                    
                        exit;
                    
                        } else {
                            $_SESSION['errors'][] = "Erreur lors du téléchargement de la photo.";
                        }
                    }
                }
        
                // Fermer la connexion
                $connexion = null;
                
            } 
        }
    }

// Utilisation
EventSubscription::insertEvent();