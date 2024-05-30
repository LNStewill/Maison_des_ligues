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
        
    <form action="<?php print $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
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
<?php
    include_once __DIR__."./../includes/footer.inc.php";
?>