<?php 
ob_start(); ?>


<h2>Vos dernières locations</h2>

<?php while ($data = $location->fetch()) { ?>
        
        <table>
            <tr>
                <td>Date de location : </td>
                <td><?= $data['Date_Loc'] ?></td>
            </tr>
            <tr>
                <td>Montant</td>
                <td><?= $data['Pu_TTC_Loc'] ?></td>
            </tr>
        </table>



 <?php  };
$compte_fidele = ob_get_clean(); ?>
