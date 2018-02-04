<?php
require('controler.php');

if(isset($_GET['action'])){

	if($_GET['action'] == 'accueil'){
		session_start();
		if(isset($_SESSION['login']) && isset($_SESSION['Droit_User'])){
			$_SESSION = supprimeDevisClientConnecte($_SESSION['login'], $_SESSION['Droit_User']);
			selectAgence();
		}
		else{
			$_SESSION = [];
			selectAgence();
		}
	}
	else if($_GET['action'] == 'nos_vehicules'){
		session_start();
		if(isset($_SESSION['login']) && isset($_SESSION['Droit_User'])){
			$_SESSION = supprimeDevisClientConnecte($_SESSION['login'], $_SESSION['Droit_User']);
			afficheVehicules();
		}
		else{
			$_SESSION = false;
			afficheVehicules();
		}
	}
	else if($_GET['action'] == 'faq'){
		session_start();
		if(isset($_SESSION['login']) && isset($_SESSION['Droit_User'])){
			$_SESSION = supprimeDevisClientConnecte($_SESSION['login'], $_SESSION['Droit_User']);
			afficheFAQ();
		}
		else{
			$_SESSION = false;
			afficheFAQ();
		}
	}
	else if($_GET['action'] == 'agence'){
		session_start();
		if(isset($_SESSION['login']) && isset($_SESSION['Droit_User'])){
			$_SESSION = supprimeDevisClientConnecte($_SESSION['login'], $_SESSION['Droit_User']);
			afficheAgence();
		}
		else{
			$_SESSION = false;
			afficheAgence();
		}
	}
	else if($_GET['action'] == 'cnam_car'){
		session_start();
		if(isset($_SESSION['login']) && isset($_SESSION['Droit_User'])){
			$_SESSION = supprimeDevisClientConnecte($_SESSION['login'], $_SESSION['Droit_User']);
			afficheCnamcar();
		}
		else{
			$_SESSION = false;
			afficheCnamcar();
		}
	}
	else if($_GET['action'] == 'mentions'){
		session_start();
		if(isset($_SESSION['login']) && isset($_SESSION['Droit_User'])){
			$_SESSION = supprimeDevisClientConnecte($_SESSION['login'], $_SESSION['Droit_User']);
			afficheMentions();
		}
		else{
			$_SESSION = false;
			afficheMentions();
		}
	}
	else if($_GET['action'] == 'vehicules'){

		session_start();
		$_SESSION['ag_depart'] = $_POST['ag_depart'];
		$_SESSION['ag_arrivee'] = $_POST['ag_arrivee'];
		$_SESSION['date_depart'] = date("d-m-Y", strtotime($_POST['date_depart']));
		$_SESSION['date_arrivee'] = date("d-m-Y", strtotime($_POST['date_arrivee']));
		$_SESSION['categorie'] = $_POST['categorie'];

		if(!empty($_POST['categorie']) && $_POST['categorie'] == 1){

			selectTourisme($_POST['ag_depart']);

		}
		else if(!empty($_POST['categorie']) && $_POST['categorie'] == 7){

			selectUtilitaire($_POST['ag_depart']);
		}
		else{
			echo 'Impossible d\'afficher les véhicules';
			echo "<br><a href=\"index.php\">cliquez ici pour retourner à l'accueil</a>";
			?><pre><?php print_r($GLOBALS);?></pre><?php
		}
	}
	else if($_GET['action'] == 'devis'){

		session_start();

			if(isset($_SESSION['login']) && isset($_SESSION['devis']) && isset($_SESSION['Droit_User'])){
				
				afficheDevisFormulaire($_SESSION['Droit_User'], $_SESSION['login'], 0);			
			}
			else if(!isset($_SESSION['devis'])){

				$devis = calculeDevis($_SESSION['date_depart'], $_SESSION['date_arrivee'], $_POST['Prix_Jour_Mod']);
				$_SESSION['nb_jour'] =$devis[0];
				$_SESSION['prix_devis'] = $devis[1];
				$_SESSION['Marq_Mod'] = $_POST['Marq_Mod'];
				$_SESSION['Nom_Mod'] = $_POST['Nom_Mod'];
				$_SESSION['Nom_Cat'] = $_POST['Nom_Cat'];
				$_SESSION['Nom_Carbu'] = $_POST['Nom_Carbu'];
				$_SESSION['devis'] = $_POST['devis'];
				$_SESSION['Num_Car'] = $_POST['Num_Car'];

				if($_SESSION['devis'] == 1){
					$_SESSION['Toit_Tou'] = $_POST['Toit_Tou'];
					$_SESSION['Clim_Tou'] = $_POST['Clim_Tou'];
					$_SESSION['Nb_Bagage_Tou'] = $_POST['Nb_Bagage_Tou'];
					$_SESSION['GPS_Tou'] = $_POST['GPS_Tou'];
					$_SESSION['Nb_Place_Tou'] = $_POST['Nb_Place_Tou'];					
				}else if($_SESSION['devis'] == 2){
					$_SESSION['Vol_Ut'] = $_POST['Vol_Ut'];
					$_SESSION['Charg_Ut'] = $_POST['Charg_Ut'];
					$_SESSION['Long_Ut'] = $_POST['Long_Ut'];
					$_SESSION['Larg_Ut'] = $_POST['Larg_Ut'];
					$_SESSION['Haut_Ut'] = $_POST['Haut_Ut'];	
				}
				if(isset($_SESSION['login']) && isset($_SESSION['Droit_User'])){

					afficheDevisFormulaire($_SESSION['Droit_User'], $_SESSION['login']);
				}
				else{

					afficheDevis();
				}
			}
			else{

				echo 'Impossible d\'afficher le devis';
				echo "<br><a href=\"index.php\">cliquez ici pour retourner à l'accueil</a>";
				?><pre><?php print_r($GLOBALS);?></pre><?php
			}	
	}
	else if($_GET['action'] == 'identification_paiement'){
		session_start();

		if(isset($_SESSION['login'])){

			$_SESSION['Civ'] = $_POST['Civ'];
			$_SESSION['Nom'] = $_POST['Nom'];
			$_SESSION['Prenom'] = $_POST['Prenom'];
			$_SESSION['Num_Tel'] = $_POST['Num_Tel'];
			$_SESSION['voie'] = $_POST['voie'];
			$_SESSION['ville'] = $_POST['ville'];
			$_SESSION['cp'] = $_POST['cp'];

			if($_SESSION['Droit_User'] == 0){

				$_SESSION['fidele'] = $_POST['fidele'];
				affichePagePaiement();
			}
			else{
				affichePagePaiement();
			}
		}
		else{
			afficheEspaceId();
		}
	}
	else if($_GET['action'] == 'login' || $_GET['action'] == 'create_login'){	
		
		identification();
	}
	else if($_GET['action'] == 'espace_perso'){
		session_start();

		if(isset($_SESSION['Droit_User']) && $_SESSION['Droit_User'] == 1){

			afficheEspaceFidele($_SESSION['login']);
		}
		else if(isset($_SESSION['Droit_User']) && $_SESSION['Droit_User'] == 2){

			afficheEspaceAdmin();
		}
		else{
			afficheEspaceId();
		}
	}
	else if($_GET['action'] == 'validation_paiement'){
		afficheValidationPaiement();
	}
}
else{

	selectAgence();
}
