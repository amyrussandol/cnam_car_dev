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
	$agences1 = getAgences();
	$agences2 = getAgences();	
	require('accueil.php');
}
function selectTourisme($ag_depart)
{
	$tourisme = getTourisme($ag_depart);
	require('v_tourisme.php');
}
function selectUtilitaire($ag_depart)
{
	$utilitaire = getUtilitaire($ag_depart);
	require('v_utilitaire.php');
}

function afficheDevisFormulaire($droit_user, $login)
{

	$input_id = choixbouton(1);
	$data = choixFormulaire($droit_user, $login);
	$input_fidele = boutonFidele($droit_user);
	require('devis_formulaire.php');
	require('devis.php');
}
function afficheDevis()
{
	$input_id = choixbouton(0);
	$input_fidele = false;
	$devis_formulaire = false;
	require('devis.php');
}
function identification()
{
	require('compte_login.php');
}
function afficheEspaceId()
{
	require('compte_formulaire.php');
	$compte_fidele = false;
	$compte_admin = false;
	require('compte_espace.php');
}
function afficheEspaceFidele($login)
{
	$location = getLocation($login);
	require('compte_fidele.php');
	$compte_formulaire = false;
	$compte_admin = false;
	require('compte_espace.php');
}
function afficheEspaceAdmin()
{
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
	require('vehicules.php');
}
function afficheFAQ()
{
	require('faq.php');
}
function afficheAgence()
{
	require('agences.php');
}
function afficheCnamcar()
{
	require('qui_sommes_nous.php');
}
function afficheMentions()
{
	require('mentions_legales.php');
}
// function supprimeDevisClient();
// {
// 	$session = [];
// 	return $session;
// }
