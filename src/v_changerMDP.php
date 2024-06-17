<?php
    include_once __DIR__."./../controller/header.inc.php";
?>

    <section class="content">
        <h1>
            MAISON DES LIGUES TOUS LES SPORTS
        </h1>
    </section> 

    <section class="form_container">
        <h1>Il s'git de votre premiere connexion changer de mot de passe</h1>

        <h2>
            Veuillez respecter les conditions ci dessous 
        </h2>

        <p>
            Au moins 8 caracteres 
        </p>
        <p>
            Au moins une lettre majuscule
        </p>
        <p>
            contient au moins des caractere spciaux suivants : !, # ou &.        
        </p>

        <p>
            contient au moins un chiffre.        
        </p>

        <br><br><br>
        <?php
        
        require_once __DIR__."./../controller/c_changerMDP.class.php";

        if (isset($_SESSION['change_mdp_errors'])) {
            foreach ($_SESSION['change_mdp_errors'] as $error) {
                echo '<p class="warning msg-alert">' . $error . '</p>';
            }
            unset($_SESSION['change_mdp_errors']); // Supprimez les erreurs de la session
        }
    ?>
<br><br><br>

        <form action="<?php print $_SERVER["PHP_SELF"]; ?>" method="post">
            <fieldset>
                <legend><b>Changer le mot de passe</b></legend>
                <div>
                    <label for="new_mdp">Nouveau mot de passe</label><input name="new_mdp" id="new_mdp" type="password">
                    <label for="new_mdp_confirm">Confirmez le mot dde passe</label><input name="new_mdp_confirm" id="new_mdp_confirm" type="password">
                </div>
                <hr>
                <input type="submit" class="loginbtn" name="chnagerMDP" value="Mettre à jour le mot de passe">
                </fieldset>
        </form>

    </section>
    
    
<?php
    include_once __DIR__."./../includes/footer.inc.php";
?>