<?php

class UserSubscription {

    static function insertUser() {
        require_once "config.inc.php"; # Inclure le fichier de configuration de la base de données

        require_once "connection_bdd.php";

            // Vérifier si le formulaire a été soumis
            if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                // Récupérer les données en entrée du formulaire
                $nom= $_POST['nom'];
                $prenom = $_POST['prenom'];
                $age = $_POST['age'];
                $mail = $_POST["email"];
                $login = $_POST["login"];
                $mot_de_passe = $_POST["mot_de_passe"];
                $ville = $_POST["ville"];
                #$image_profile = $_FILES['image_profile']['tmp_name'];
                $image_profile = isset($_POST['use_default_avatar']) ? 'default_avatar.png' : $_FILES['image_profile']['tmp_name'];

                #Verifier si les champs sont remplis

                if (empty($nom) || empty($mail) || empty($login) || empty($mot_de_passe)) {
                    $_SESSION['errors'][] ="Les champs noms, mails, login, mot_de_passe sont obligatoires";
                    #print '<p class="warning msg-alert">Tous les champs sont obligatoires</p>';
                    
                    // Rediriger vers la page d'inscription
                    #header("Location: ./index.php");
                    exit;                       
    
                } else {

                    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                        # vérification si le format du mail est correcte
                       $_SESSION['login_errors'][] ="Veuillez renseigner un mail valide";
                   }
   
                   else {
                         
                    // Vérifier si l'utilisateur existe déjà dans la base de données
                    $_requete_Verif = $connexion->prepare("SELECT * FROM utilisateur WHERE email = ? OR login = ?");
            
                    $_requete_Verif->bindParam(1, $mail);
                    $_requete_Verif->bindParam(2, $login);
                    $_requete_Verif->execute();
                
                    if ($_requete_Verif->rowCount() > 0) {
                        
                        // L'utilisateur existe déjà, stocker un message d'erreur dans la session
                        $_SESSION['errors'][] = "Cette adresse e-mail et ou login est déjà enregistrée. Choisissez en un autre.";
                        // L'utilisateur existe déjà, afficher un message d'erreur
                        #print '<p class="warning msg-alert">Cette adresse e-mail est déjà enregistrée. Choisissez une autre adresse e-mail.</p>';
                    } 
                    else {
                        // L'utilisateur n'existe pas, procéder à l'insertion

                        #verification image si tout est ok !

                        if (isset($_FILES['image_profile']) && $_FILES['image_profile']['error'] === UPLOAD_ERR_OK) {


                            $photo_name = htmlspecialchars(pathinfo($_FILES["image_profile"]["name"],PATHINFO_FILENAME));
                            $photo_extension = strtolower(pathinfo($_FILES["image_profile"]["name"], PATHINFO_EXTENSION));

                            # Vérifier l'extension et autoriser une extention
                            $allowed_extensions = array("jpg", "jpeg", "png");

                            if (!in_array($photo_extension, $allowed_extensions)) {
                                $errors[] = "L'extension de la photo doit être jpg, jpeg, ou png.";
                            }

                            # Vérifier la taille maximale (2 Mo ici, mais tu peux ajuster selon tes besoins)
                            $max_size = 2 * 1024 * 1024; # 2 Mo
                            if ($_FILES["image_profile"]["size"] > $max_size) {
                                $errors[] = "La taille de la photo ne doit pas dépasser 2 Mo.";
                            }

                            #renommer la photo pour éviter l'enregistrement du meme nom afin de bien gerer l'affichage

                            $photo_name = $photo_name.'_'.date("Ymd_His").'.'. $photo_extension;

                            $image_profile = $photo_name;

                            $motDePasseHash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
                
                            // Préparer la requête SQL pour insérer les données dans la base de données
                            $requete = $connexion->prepare("INSERT INTO utilisateur (nom, prenom, age, email, login, mot_de_passe, ville, image_profile) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

                            // Binder les paramètres
                            $requete->bindParam(1, $nom);
                            $requete->bindParam(2, $prenom);
                            $requete->bindParam(3, $age);
                            $requete->bindParam(4, $mail);
                            $requete->bindParam(5, $login);
                            $requete->bindParam(6, $motDePasseHash);
                            $requete->bindParam(7, $ville);
                            $requete->bindParam(8, $image_profile);

                            // Exécuter la requête
                            $requete->execute();
                            #Stocker dans le repertoire le fichier temporaire uploadé
                            $uploads = "./../uploads/profile/";
                            move_uploaded_file($_FILES["image_profile"]["tmp_name"], $uploads . $photo_name);

                            // Stocker les variables pour la page de confirmation d'inscription
                            // Stockez les informations dans des variables de session
                            $_SESSION['nom'] = $nom;
                            $_SESSION['prenom'] = $prenom;
                            $_SESSION['email'] = $mail;
                            $_SESSION['ville'] = $ville;
                            $_SESSION['image_profile'] = $uploads . $photo_name;

                            // Rediriger vers la page de connexion (ou toute autre page souhaitée)
                            header("Location: src/confirmation_inscription.php");

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
}

// Utilisation
UserSubscription::insertUser();