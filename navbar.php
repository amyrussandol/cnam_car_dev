<?php
/**
 * Created by PhpStorm.
 * User: Aemy
 * Date: 10/02/2018
 * Time: 11:08
 */
?>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" id="nav">

    <!--Title-->
    <a class="navbar-brand" href="./index.php?action=accueil">
        <img src="./images/logo1.png" width="30" height="30" alt="">
        CNAM LOCATION
    </a>

    <!--Collapse button-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!--Navigation-->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">

            <!--Acceuil-->
            <li class="nav-item active">
                <a class="nav-link" href="./index.php?action=accueil">Acceuil <span class="sr-only">(current)</span></a>
            </li>
            <!--/.Acceuil-->

            <!--Menu-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menu
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="./index.php?action=nos_vehicules"> Nos véhicules</a>
                    <a class="dropdown-item" href="./index.php?action=agence"> Nos agences</a>
                    <a class="dropdown-item" href="./index.php?action=espace_perso">Mon compte</a>
                    <a class="dropdown-item" href="./index.php?action=fidelite">Programme fidélité</a>
                    <a class="dropdown-item" href="./index.php?action=cnam_car">Notre histoire</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../index.php?action=faq">Des questions ?</a>
                </div>
            </li>
            <!--/.Menu-->

            <!--Connexion-->
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#loginModal">Connexion</a>
            </li>
            <!--/.Connexion-->

        </ul>
    </div>
    <!--/.Navigation-->

</nav>

<!--Login modal-->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Connexion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" class="mb-0" action="./index.php?action=login" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" class="form-control" id="email" placeholder="Entrez votre e-mail">
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="text" class="form-control" id="password" placeholder="Entrez votre mot de passe">
                    </div>

                    <button type="submit" class="btn btn-secondary">Connexion</button>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger btn-default pull-left">Effacer</button>
                    <p>Nouveau membre ? <a href="./nouveau_compte.php">Créer un compte</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
<!--/.Login modal-->

<main class="container" role="main">
