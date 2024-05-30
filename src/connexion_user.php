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
        <form action="#" method="post">
            <fieldset>
                <legend><b>CONNEXION MEMBRE</b></legend>
                <!--<div class="imgcontainer">
                    <img src="../assets/logo/Python.png" alt="PROFIL_PICTURE" class="avatar">
                </div>-->
    
                <div>
                    <label for="">Login</label><input type="text">
                    <label for="">Choisir un mot de passe</label><input type="password">
                </div>
                <hr>
                <input type="submit" class="loginbtn" name="connexion" value="Se Connecter">
                </fieldset>
        </form>

    </section>
    
    
<?php
    include_once __DIR__."./../includes/footer.inc.php";
?>