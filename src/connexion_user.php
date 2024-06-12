<?php
    include_once __DIR__."./../controller/header.inc.php";
?>

    <section class="content">
        <h1>
            MAISON DES LIGUES TOUS LES SPORTS
        </h1>
    </section> 

    <section class="form_container">
        <h1>Connecter vous à votre compte pour ajouter des publications</h1>

        <?php
        
        require_once __DIR__."./../controller/login.class.php";

        if (isset($_SESSION['login_errors'])) {
            foreach ($_SESSION['login_errors'] as $error) {
                echo '<p class="warning msg-alert">' . $error . '</p>';
            }
            unset($_SESSION['login_errors']); // Supprimez les erreurs de la session
        }
    ?>


        <form action="<?php print $_SERVER["PHP_SELF"]; ?>" method="post">
            <fieldset>
                <legend><b>CONNEXION MEMBRE</b></legend>
                <!--<div class="imgcontainer">
                    <img src="../assets/logo/Python.png" alt="PROFIL_PICTURE" class="avatar">
                </div>-->
    
                <div>
                    <label for="identifiant">Login</label><input name="identifiant" id="identifiant" type="text">
                    <label for="mot_de_passe">Choisir un mot de passe</label><input name="mot_de_passe" id="mot_de_passe" type="password">
                </div>
                <hr>
                <input type="submit" class="loginbtn" name="connexion" value="Se Connecter">
                </fieldset>
        </form>

    </section>
    
    
<?php
    include_once __DIR__."./../includes/footer.inc.php";
?>