<?php
    include_once __DIR__."./../controller/header.inc.php";
?>

    <section class="content">
        <h1>
            MAISON DES LIGUES TOUS LES SPORTS
        </h1>
    </section> 

    <section class="form_container">
        <h1>
            Inscrivez vous
        </h1>

        <?php
        
        require_once __DIR__."./../controller/register.class.php";

        if (isset($_SESSION['errors'])) {
            foreach ($_SESSION['errors'] as $error) {
                echo '<p class="warning msg-alert">' . $error . '</p>';
            }
            unset($_SESSION['errors']); // Supprimez les erreurs de la session
        }
    ?>

    <br>
        <form method="post" action="<?php print $_SERVER["PHP_SELF"]; ?>" id="registration-form" class="registration-form" enctype="multipart/form-data">
        
        <fieldset class="container">

            <legend>Créer votre compte</legend>

            <label for="nom">Nom</label>
            <input type="text" id="name" name="nom" placeholder="Votre nom" aria-required="true">
            
            <label for="prenom">Prénom</label>
            <input type="text" id="name" name="nom" placeholder="Votre prénom" aria-required="true">
            
            <label for="age">Age</label>
            <input type="number" min="0" max="130" id="age" name="age" placeholder="Votre âge" aria-required="true">
            
            <label for="mail">Mail</label>
            <input type="email" id="email" name="email" placeholder="Votre mail" required aria-required="true">
            
            <label for="login">Identifiant</label>
            <input type="text" id="login" name="login" placeholder="Votre identifiant" required aria-required="true">
            
            <label for="mot_de_passe">Choisissez votre mot de passe </label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" required aria-required="true">
            
            <label for="ville">Ville</label>
            <input type="text" id="ville" name="ville" placeholder="Votre ville" required aria-required="true">

            <label for="use_default_avatar">
            <input type="checkbox" id="use_default_avatar" name="use_default_avatar">
            Utiliser un avatar par défaut
        </label>
            
            <label for="image">Telecharger votre photo</label>
            <input type="file" id="image_profile" name="image_profile" accept="image/*" required aria-required="true">
            
            <hr>
            <input type="submit" class="registerbtn" name="inscription" value="CRÉER UN COMPTE">

        </fieldset>                
        </form>
    </section>


<?php
    include_once __DIR__."./../includes/footer.inc.php";
?>