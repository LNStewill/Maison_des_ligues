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
            Inscrivez vous
        </h1>
        
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Ville</th>
                    <th>Mail</th>
                    <th>Actions</th> <!-- Nouvelle colonne pour les boutons -->
                </tr>
            </thead>
            <tbody>
                <?php #foreach ($membres as $membre) : ?>
                    <tr>
                        <td><?#= $membre['nom'] ?></td>
                        <td><?#= $membre['prenom'] ?></td>
                        <td><?#= $membre['date_naissance'] ?></td>
                        <td><?#= $membre['ville'] ?></td>
                        <td><?#= $membre['mail'] ?></td>
                        <td>
                            <!-- Bouton Modifier -->
                            <a href="modifier_membre.php?id=<?#= $membre['id'] ?>">Modifier</a>

                            <!-- Bouton Supprimer -->
                            <a href="supprimer_membre.php?id=<?#= $membre['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce membre ?')">Supprimer</a>
                        </td>
                    </tr>
                <?php #endforeach; ?>
            </tbody>
        </table>


    </section>


<?php
    include_once __DIR__."./../includes/footer.inc.php";
?>