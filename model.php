<?php

function dbconnect()
{
	try
	{
	    $db = new PDO('mysql:host=localhost;dbname=cnam_car_base;charset=utf8', 'root', '123Soleil!',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	    return $db;
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}
}
function getAgences()
{
    $db = dbconnect(); 
    $agence = $db->query('SELECT Num_AG, Nom_AG FROM Agence'); 
    return $agence;
}
function nb_jour($date_debut, $date_fin)
{
	
	$dateD = strtotime($date_debut);
	$dateF = strtotime($date_fin);
	$diff = $dateF-$dateD;
	 $retour = array();
 
    $tmp = $diff;
    $retour['second'] = $tmp % 60;
 
    $tmp = floor( ($tmp - $retour['second']) /60 );
    $retour['minute'] = $tmp % 60;
 
    $tmp = floor( ($tmp - $retour['minute'])/60 );
    $retour['hour'] = $tmp % 24;
 
    $tmp = floor( ($tmp - $retour['hour'])  /24 );
    $retour['day'] = $tmp+1;
 
    return $retour['day'];
}
function devis($prix_jour, $nb_jour)
{
    $devis = $prix_jour * $nb_jour;
    return $devis;
}
function getTourisme($ag_depart)
{
	$db = dbconnect();
	  $tourisme = $db->prepare('
        SELECT * FROM Car
        JOIN Carburant
        ON Carburant.Num_Carbu = Car.Num_Carbu
        JOIN Modele
        ON Modele.Num_Mod = Car.Num_Mod
        JOIN Tourisme
        ON Tourisme.Num_Mod = Modele.Num_Mod
        JOIN Categorie
        ON Categorie.Num_Cat = Modele.Num_Cat
    	WHERE Num_AG = (SELECT Num_AG FROM Agence WHERE Nom_AG = ?) 
    	AND  Modele.Num_Cat <= 6
    	ORDER BY Prix_Jour_Mod
    	'); // les "?" correspondent aux variables dont dépent la requête, ici le nom de l'agence de départ et la catégorie du véhicule, on les retrouvent dans la ligne suivante

	$tourisme->execute(array($ag_depart));

	return $tourisme;
}
function tourisme_categorie($ag_depart, $categorie)
{
    $db = dbconnect();
      $tourisme = $db->prepare('
        SELECT * FROM Car
        JOIN Carburant
        ON Carburant.Num_Carbu = Car.Num_Carbu
        JOIN Modele
        ON Modele.Num_Mod = Car.Num_Mod
        JOIN Tourisme
        ON Tourisme.Num_Mod = Modele.Num_Mod
        JOIN Categorie
        ON Categorie.Num_Cat = Modele.Num_Cat
        WHERE Num_AG = (SELECT Num_AG FROM Agence WHERE Nom_AG = ?) 
        AND  Modele.Num_Cat = ?
        ORDER BY Prix_Jour_Mod
        '); // les "?" correspondent aux variables dont dépent la requête, ici le nom de l'agence de départ et la catégorie du véhicule, on les retrouvent dans la ligne suivante

    $tourisme->execute(array($ag_depart, $categorie));

    return $tourisme;
}
function getUtilitaire($ag_depart)
{
	$db = dbconnect();
	  $utilitaire = $db->prepare('
        SELECT * FROM Car
        JOIN Carburant
        ON Carburant.Num_Carbu = Car.Num_Carbu
        JOIN Modele
        ON Modele.Num_Mod = Car.Num_Mod
        JOIN Utilitaire
        ON Utilitaire.Num_Mod = Modele.Num_Mod
        JOIN Categorie
        ON Categorie.Num_Cat = Modele.Num_Cat
        WHERE Num_AG = (SELECT Num_AG FROM Agence WHERE Nom_AG = ?) 
        AND  Modele.Num_Cat = 7
        ORDER BY Prix_Jour_Mod
    	   ');

	$utilitaire->execute(array($ag_depart));

	return $utilitaire;
}

function nb_tranche($prix_devis, $droit_user, $nb_locations)
{
    
   if($droit_user == 1 && $nb_locations>2){
        if($prix_devis >= 50 && $prix_devis <= 100){
            $nb_tranche = 2;
        }elseif($prix_devis >= 100 && $prix_devis <= 500){
            $nb_tranche = 3;
        }elseif($prix_devis >= 500 && $prix_devis <= 1000){
            $nb_tranche = 4;
        }elseif($prix_devis >= 1000 && $prix_devis <= 1500){
            $nb_tranche = 5;
        }elseif($prix_devis >= 1500 && $prix_devis <= 2000){
            $nb_tranche = 6;
        }
    }else{
        $nb_tranche = 1;
    }
    return $nb_tranche;
}
function choixbouton($i)
{
     if($i == 0){      

        $bouton = '<input type=\'submit\' value=\'identifiez vous pour réserver\'>';

     }else {

        $bouton = '<input type=\'submit\' value=\'reserver\'>';  

     }
    return $bouton;
}

function choixFormulaire($droit_user, $login)
{
    
    if(!empty($login) && !empty($droit_user) && $droit_user == 1){
        $bd = dbconnect();
        $client_fideles = $bd->prepare('SELECT * FROM Client_Fidele WHERE Num_User = (SELECT Num_User FROM Espace_User WHERE Mel_User = ?)');
        $client_fideles->execute(array($login));
        $data = $client_fideles->fetch();
    }
    else{
        $data = false;
    }
    return $data;

}
function boutonFidele($droit_user)
{
    if(isset($droit_user) && $droit_user == 1){

        $fidele = false;
        
    }else {
        $fidele = '
            <p>Voulez vous faire parti du programme de fidélité ? Profitez d\'avantages sur vos reservations. Vous n\'aurez plus à remplir vos coordonnées par la suite.</p>
            <label for="fidele">Souhaitez vous participer au programme de fidélité ?</label>
            <input type="radio" name="fidele" value="1" id="fidele_oui"><label for="fidele_oui">OUI</label>
            <input type="radio" name="fidele" value="0" id="fidele_non" checked=""><label for="fidele_non">NON</label>';
    }
    return $fidele;
}

function getLocation($login)
{
    $db = dbconnect();
        $info_location = $db->prepare('
            SELECT * FROM Location
            WHERE Num_User = (SELECT Num_User FROM Espace_User WHERE Mel_User = ?)
            ORDER BY Date_loc DESC
            ');
        $info_location->execute([$login]);
        return $info_location;
}