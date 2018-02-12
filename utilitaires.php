<?php
/**
 * Created by PhpStorm.
 * User: Aemy
 * Date: 10/02/2018
 * Time: 15:05
 */

$page_data = array(
    'vehicules' => array()
);

while ($vehicule = $utilitaire_query->fetch()) {
    array_push($page_data['vehicules'], $vehicule);
}
?>


<div id="utilContainer">
    <!-- Title row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="titleUtil">
                <h2 class="titleUtil">Nos utilitaires </h2>
            </div>
        </div>
    </div>
    <!-- /Title row -->

    <!-- Vehicules row -->
    <div class="row text-center">
        <?php foreach ($page_data['vehicules'] as $vehicule): ?>
            <div class="col-xs-12 col-md-4">
                <div class="card-flip">
                    <!-- Afficher les données des véhicules -->
                    <div class="flip">
                        <div class="front">
                            <!-- FRONT CONTENT -->
                            <div class="card">
                                <img class="card-img-top" src="<?=$vehicule['Img_Mod'] ?>" alt="Image véhicule">
                                <div class="card-block">
                                    <h3 class="card-title text-center"><?= $vehicule['Nom_Mod'] ?></h3>
                                </div>
                            </div>
                            <!-- /FRONT CONTENT-->
                        </div>


                        <div class="back">
                            <!-- BACK CONTENT -->
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title">Caractéristiques :</h4>
                                </div>

                                <div class="card-block">
                                    <table class="table table-striped">
                                        <tbody>
                                            <?= $vehicule['Nom_Mod'] ?>
                                            <tr><th scope="row" style="font: bold">Marque : <?= $vehicule['Marq_Mod'] ?></th></tr>
                                            <tr><th scope="row">Prix journalier : <?= $vehicule['Prix_Jour_Mod'] ?></th></tr>
                                            <tr><th scope="row">Catégorie : <?= $vehicule['Nom_Cat'] ?></th></tr>
                                            <tr><th scope="row">Carburant : <?= $vehicule['Nom_Carbu'] ?></th></tr>
                                            <tr><th scope="row">Volume : <?= $vehicule['Vol_Ut'] ?> m3</th></tr>
                                            <tr><th scope="row">Charge utile : <?= $vehicule['Charg_Ut'] ?> kg</th></tr>
                                            <tr><th scope="row">Longueur interne : <?= $vehicule['Long_Ut'] ?></th></tr>
                                            <tr><th scope="row">Largeur interne : <?= $vehicule['Larg_Ut'] ?></th></tr>
                                            <tr><th scope="row">Hauteur interne: <?= $vehicule['Haut_Ut'] ?></th></tr>

                                        </tbody>
                                    </table>
                                            <!-- ici on créé des 'formulaires cachés qui enverrons données de la requête !-->
                                            <form action="index.php?action=accueil" method="post">
                                                <input type="hidden" name="Marq_Mod" value="<?= $vehicule['Marq_Mod'] ?>">
                                                <input type="hidden" name="Nom_Mod" value="<?= $vehicule['Nom_Mod'] ?>">
                                                <input type="hidden" name="Prix_Jour_Mod" value="<?= $vehicule['Prix_Jour_Mod'] ?>">
                                                <input type="hidden" name="Num_Car" value="<?= $vehicule['Num_Car'] ?>">
                                                <input type="hidden" name="Nom_Cat" value="<?= $vehicule['Nom_Cat'] ?>">
                                                <input type="hidden" name="Nom_Carbu" value="<?= $vehicule['Nom_Carbu'] ?>">
                                                <input type="hidden" name="Vol_Ut" value="<?= $vehicule['Vol_Ut'] ?>">
                                                <input type="hidden" name="Charg_Ut" value="<?= $vehicule['Charg_Ut'] ?>">
                                                <input type="hidden" name="Long_Ut" value="<?= $vehicule['Long_Ut'] ?>">
                                                <input type="hidden" name="Larg_Ut" value="<?= $vehicule['Larg_Ut'] ?>">
                                                <input type="hidden" name="Haut_Ut" value="<?= $vehicule['Haut_Ut'] ?>">
                                                <input type="hidden" name="devis" value="2">


                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Valider</button>
                                            <a class="btn btn-secondary" href="./index.php?action=home" role="button">Annuler</a>
                                        </div>
                                        </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Afficher les données des véhicules -->
        <?php endforeach; ?>
    </div>
</div>

<script>
    document.querySelector(".card-flip").classList.toggle("flip");
</script>
<!-- /Vehicules row -->

