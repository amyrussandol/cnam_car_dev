<?php
/**
 * Created by PhpStorm.
 * User: Aemy
 * Date: 10/02/2018
 * Time: 11:42
 */

$page_data = array(
    'agences' => array()
);

while ($agence = $agence_list->fetch()) {
    array_push($page_data['agences'], array(
        'nom' => $agence['Nom_AG']
    ));
}
$agence_list->closeCursor();
?>

<style>
    body{
        background-image: url("./images/road.jpg");
    }
</style>


<div>

    <!--Title row-->
    <div class="row">
        <div class="col-lg-12" style="text-align: center; padding-top: 3">
            <h1>CNAM-CAR-Accueil</h1>
            <p>Vous souhaitez louer une voiture ? Vous êtes au bon endroit !</p>
        </div>
    </div>
    <!--/.Title row-->

    <!--Search row-->
    <div class="row">
        <div class="col-lg-12" style="padding-top: 15%">
            <!--Form card-->
            <div class="card" id="acc">
                <h5 class="card-title text-center"> Exécuter une recherche : </h5>
                <div class="card-body">
                    <form action="./index.php?action=vehicules" method="post">

                        <div class="row">
                            <!-- Agence et date -->
                            <div class="col-xs-12 col-md-8">
                                <div class="row">

                                    <!-- Agence départ -->
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label for="ag_depart">Agence de départ : </label>
                                            <select class="form-control" id="ag_depart" name="ag_depart">
                                                <option value="null">--Selectioner--</option>
                                                <?php foreach ($page_data['agences'] as $agence): ?>
                                                    <option value="<?=$agence['nom'] ?>"><?=$agence['nom'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Date départ -->
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label for="date_depart">Date de départ :</label>
                                            <input type="date" class="form-control" name="date_depart" id="date_depart">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <!-- Agence arrivée -->
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label for="ag_arrivee">Agence d'arrivée : </label>
                                            <select class="form-control" id="ag_arrivee" name="ag_arrivee">
                                                <option value="null">--Selectioner--</option>
                                                <?php foreach ($page_data['agences'] as $agence): ?>
                                                    <option value="<?=$agence['nom'] ?>"><?=$agence['nom'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Date arrivée -->
                                    <div class="col-xs-12 col-md-6">
                                        <div class="form-group">
                                            <label for="date_arrivee">Date d'arrivée :</label>
                                            <input type="date" class="form-control" name="date_arrivee" id="date_arrivee">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- catégorie -->
                            <div class="col-xs-12 col-md-4">
                                <div class="row">
                                    <div class="col-xs-4 col-md-4"></div>
                                    <div class="col-xs-4 col-md-4">

                                        <label for="exampleRadios1">Catégorie</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="categorie" id="tourisme" value="1" checked>
                                            <label class="form-check-label" for="tourisme">
                                                Tourisme
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="categorie" id="utilitaire" value="7">
                                            <label class="form-check-label" for="utilitaire">
                                                Utilitaire
                                            </label>
                                        </div>

                                    </div>
                                    <div class="col-xs-4 col-md-4"></div>

                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="reset" class="btn btn-secondary">Tout effacer</button>
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </form>
                </div>

            </div>
            <!--/.Form card-->
        </div>
    </div>
    <!--/.Search row-->
</div>

