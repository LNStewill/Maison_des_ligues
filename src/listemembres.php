<?php
    include_once __DIR__."./../controller/header.inc.php";
?>

    <section class="content">
        <h1>
            MAISON DES LIGUES TOUS LES SPORTS
        </h1>
    </section> 

    <section class="list_membres">
        <h1>
           Inscription à modifier ou supprimer
        </h1>
        
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Age</th>
                    <th>Mail</th>
                    <th>Identifiant</th>
                    <th>Mot de passe</th>
                    <th>Ville</th> 
                    <th>Modifier</th>
                    <th>Supprimer</th> 
                </tr>
            </thead>
            <tbody>
                <?php

                    include_once __DIR__."./../controller/connection_bdd.php";

                    $_requete_affich = $connexion->prepare("SELECT * FROM utilisateur");

                    $_requete_affich->execute();

                    #$_membres = $_requete_affich->fetch(PDO::FETCH_ASSOC);

                    if ($_requete_affich->rowCount()==0){
                        echo"Il n'y pas d'utilisateur inscrit pour l'instant";
                    } else {

                        while($_membres = $_requete_affich->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr>
                        <td><?=$_membres['nom'] ?></td>
                        <td><?=$_membres['prenom'] ?></td>
                        <td><?=$_membres['age'] ?></td>
                        <td><?=$_membres['email'] ?></td>
                        <td><?=$_membres['login'] ?></td>
                        <td><?=$_membres['mot_de_passe'] ?></td>
                        <td><?=$_membres['ville'] ?></td>
                        <td>
                             <!-- Bouton Modifier -->
                             <a href="modifier_membre.php?id=<?= $_membres['id_utilisateur'] ?>">Modifier</a>
                        </td>
                        <td>
                            <!-- Bouton Supprimer -->
                            <a href="supprimer_membre.php?id=<?= $_membres['id_utilisateur'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce membre ?')">Supprimer</a>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                    /**/
               ?>
            </tbody>
        </table>


    </section>


<?php
    include_once __DIR__."./../includes/footer.inc.php";
?>