<?php
        ob_start(); // Met en mémoire tampon la sortie

                    include_once __DIR__."./../controller/connection_bdd.php";

                    $id = $_GET['id'];

                    $_requete_suppr = $connexion->prepare("DELETE FROM utilisateur WHERE id_utilisateur = $id");

                    $_requete_suppr->execute();

                    echo"<h2>Membre supprimé avec succès</h2>";

                    header('Refresh: 5; url=listemembres.php');

                    ob_end_flush(); // Envoie la sortie mise en mémoire tampon

?>