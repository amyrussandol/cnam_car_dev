<?php
/**
 * Created by PhpStorm.
 * User: Aemy
 * Date: 11/02/2018
 * Time: 20:19
 */

$db = dbconnect();

$vehicules_query = $db->query('SELECT * FROM Modele');
$page_data = array(
    'vehicules' => array()
);

while($vehicule = $vehicules_query->fetch()) {
    array_push($page_data['vehicules'], $vehicule);
}
$vehicules_query->CloseCursor()
?>

<style>

</style>

<div>

    <!--Title-->
    <div class="row titlev">
        <div class="col-lg-12 mt-3 text-center"><h3> Nos véhicules </h3></div>
    </div>
    <!--/.Title-->

    <!--Vehicules-->
    <div class="row vehiculesfrow">
        <?php foreach ($page_data['vehicules'] as $vehicule): ?>

            <!--Vehicule template-->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-title">
                            <p class="namev mt-3"><?= $vehicule['Marq_Mod'] ?> | <?= $vehicule['Nom_Mod'] ?></p>
                        <hr style="bottom">
                    </div>
                    <div class="card-img">
                        <p><img src="<?=$vehicule['Img_Mod'] ?>"></p>
                    </div>
                </div>
            </div>
            <!--/.Vehicule template-->

        <?php endforeach; ?>
    </div>
    <!--/.Vehicules-->
</div>
