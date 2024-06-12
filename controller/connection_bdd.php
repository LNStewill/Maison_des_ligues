<?php
require_once "config.inc.php"; # Inclure le fichier de configuration de la base de données

try {
    //code...
    // Connexion à la base de données avec PDO
    $connexion = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $utilisateur, $motDePasse);
    #print '<p class="warning msg-success">' .' Connexion à la Bdd réussi !</p><br>';

    // Afficher les erreurs PDO
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    //throw $th;
    echo '<p class="warning msg-alert">Erreur de connexion à la base de données : </p>' . $e->getMessage();
}