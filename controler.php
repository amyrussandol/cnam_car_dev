<?php
require ('model.php');

function calculeDevis($date_depart, $date_arrivee, $prix_jour_mod)
{
    $nb_jour = nb_jour($date_depart, $date_arrivee); 
    $prix_devis = devis($prix_jour_mod , $nb_jour);
    return $devis = [$nb_jour, $prix_devis ];
} 
function supprimeDevisClientConnecte($login, $droit_user)
{
    $session = [
    	'login' =>$login,
    	'Droit_User' => $droit_user
    ];
    return $session;
}// fonctions qui devraient être dans model.php
function selectAgence()
{
	$agences1 = getAgence();
	$agences2 = getAgence();
	require('menu.php');
	require('accueil.php');
}
function selectTourisme($ag_depart)
{
	$tourisme_query = getTourisme($ag_depart);
    require ('./components/header.php');
    require ('./components/navbar.php');
	require ('./views/vehicules/tourisme.php');
	require('./components/footer.php');
}
function selectUtilitaire($ag_depart)
{
	$utilitaire_query = getUtilitaire($ag_depart);
    require ('./components/header.php');
    require ('./components/navbar.php');
    require ('./views/vehicules/utilitaires.php');
    require('./components/footer.php');
}

function afficheDevisFormulaire($droit_user, $login) {
	$input_id = choixbouton(1);
	$data = choixFormulaire($droit_user, $login);
	$input_fidele = boutonFidele($droit_user);
	require('menu.php');
	require('devis_formulaire.php');
	require('devis.php');
}

function afficheDevis() {
	$input_id = choixbouton(0);
	$input_fidele = false;
	$devis_formulaire = false;
	require('menu.php');
	require('devis.php');
}

function identification()
{
	require('compte_login.php');
}
function afficheEspaceId()
{
	require('menu.php');
	require('compte_formulaire.php');
	$compte_fidele = false;
	$compte_admin = false;
	require('compte_espace.php');
}
function afficheEspaceFidele($login)
{
	require('menu.php');
	$location = getLocation($login);
	require('compte_fidele.php');
	$compte_formulaire = false;
	$compte_admin = false;
	require('compte_espace.php');
}
function afficheEspaceAdmin()
{
	require('menu.php');
	require('compte_admin.php');
	$compte_formulaire = false;
	$compte_fidele = false;
	require('compte_espace.php');
}
function affichePagePaiement()
{
	require('paiement.php');
}
function afficheValidationPaiement()
{
	require('facture.php');
}
function afficheVehicules()
{
    require ('./components/header.php');
    require ('./components/navbar.php');
	require('./views/vehicules/vehicules.php');
    require ('./components/footer.php');
}
function afficheFAQ()
{
	require('menu.php');
	require('faq.php');
}
function afficheAgence()
{
	require('menu.php');
	require('agences.php');
}
function afficheCnamcar()
{
	require('menu.php');
	require('qui_sommes_nous.php');
}
function afficheMentions()
{
	require('menu.php');
	require('mentions_legales.php');
}
function afficheTest()
{
	require('test.php');
}

function showHome() {
    $agence_list = getAgence();
    $sticky_footer = true;
    require ('./components/header.php');
    require ('./components/navbar.php');
    require ('./views/home.php');
    require ('./components/footer.php');
}
// function supprimeDevisClient();
// {
// 	$session = [];
// 	return $session;
// }
