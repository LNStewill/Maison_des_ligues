<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MDL_INSCRIPTION</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <header>
        <nav>
            <ul>
                <li><span class="logo"><img src="../assets/logo/Logo_MDL.png" alt="LOGO"></span></li>
                <li><a href="./inscription_user.php">Inscription</a></li>
                <li><a href="./connexion_user.php">Connexion</a></li>
                <li><a href="#">Admin</a></li>
            </ul>
        </nav>
    </header>

    <section style="text-align: center;position: relative; left: 2%;max-width: 96%">
        <h1>
            MAISON DES LIGUES TOUS LES SPORTS
        </h1>
    </section> 

<section class="form_container">

    <h1>
        Ajouter une publication
    </h1>
    <?php
        
        require_once __DIR__."./../controller/upload_event.class.php";

        if (isset($_SESSION['errors'])) {
            foreach ($_SESSION['errors'] as $error) {
                echo '<p class="warning msg-alert">' . $error . '</p>';
            }
            unset($_SESSION['errors']); // Supprimez les erreurs de la session
        }
    ?>

    <br>
        
    <form action="<?php print $_SERVER["PHP_SELF"]; ?>" method="post">
        <fieldset class="container">
                 
            <label for="image_event">Telecharger la photo de votre sport</label>
            <input type="file" id="image_event" name="image_event" accept="image/*" required aria-required="true">
            
            <label for="titre_event">Ajouter un titre</label>
            <input type="text" type="file" id="titre_event" name="titre_event" required aria-required="true">
            
            <label for="description">Ajouter un contenu</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
            
            <hr>
            <input type="submit" class="registerbtn" name="inscription" value="Publier">
        </fieldset>    
    </form>
</section>
    
    
</body>
</html>