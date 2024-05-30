<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">

    <title>Inscription Maison des Ligues</title>
</head>
<body>

    <header>
        <nav >
            <ul>
                <li><span class="logo" ><img src="assets/logo/Logo_MDL.png" alt="LOGO"></span></li>
                <li><a href="./inscription_user.php">Inscription</a></li>
                <li><a href="connexion_user.phph">Connexion</a></li>
                <li><a href="#">Admin</a></li>
            </ul>
        </nav>
    </header>

    <section style="text-align: center;position: relative; left: 2%;max-width: 96%">
        <h1>
            MAISON DES LIGUES TOUS LES SPORTS
        </h1>
    </section> 

    <section>
        <form method="post" action="<?php print $_SERVER["PHP_SELF"]; ?>" id="registration-form" class="registration-form">
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
            
            <label for="image">Telecharger votre photo</label>
            <input type="file" id="image_profile" name="image_profile" accept="image/*" required aria-required="true">
            
            <hr>
            <input type="submit" class="registerbtn" name="inscription" value="CRÉER UN COMPTE">
        </fieldset>                
        </form>
    </section>
</body>
</html>