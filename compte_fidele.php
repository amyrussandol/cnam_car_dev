<?php 
ob_start(); ?>


<h2>Vos dernières locations</h2>

<?php $nb_points = 0; while ($data = $location->fetch()) { ?>
        
        <table>
            <tr>
                <td>Date de location</td>
                <td> : </td>
                <td><?= $data['date_location'] ?></td>
            </tr>
            <tr>
                <td>Montant</td>
                <td> : </td>
                <td><?= $data['Pu_TTC_Loc'] ?> €</td>
            </tr>
            <tr>
                <td>Duree de la location</td>
                <td> : </td>
                <td><?= $data['Duree_Loc'] ?> jours</td>
            </tr>
        </table><br>



 <?php $nb_points = $nb_points + $data['Nb_Tr_Pt']; } ?>

<h3>Votre nombre de points cumulés : <?= $nb_points; ?> points</h3>

<?php $compte_fidele = ob_get_clean() ?>
