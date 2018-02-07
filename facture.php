<?php
session_start();
$db = dbconnect();
$agence_depart = $db->prepare('SELECT Num_AG FROM Agence WHERE Nom_AG = ? ');
$agence_depart->execute([$_SESSION['ag_depart']]);
$agence_departs = $agence_depart->fetch(\PDO::FETCH_ASSOC);

$agence_arrivee = $db->prepare('SELECT Num_AG FROM Agence WHERE Nom_AG = ? ');
$agence_arrivee->execute([$_SESSION['ag_arrivee']]);
$agence_arrivees = $agence_arrivee->fetch(\PDO::FETCH_ASSOC);

$numero_client = $db->prepare('SELECT Num_User FROM Espace_User WHERE Mel_User = ?');
$numero_client->execute([$_SESSION['login']]);
$numero_clients = $numero_client->fetch(\PDO::FETCH_ASSOC);

$nb_location = $db->prepare('SELECT COUNT(*) as nb_loc FROM Location WHERE Num_User = ?');
$nb_location->execute([$numero_clients['Num_User']]);
$nb_locations = $nb_location->fetch(\PDO::FETCH_ASSOC);
$_SESSION['nb_loc'] = $nb_locations['nb_loc'];

$Num_Tr_Pt = nb_tranche($_SESSION['prix_devis'], $_SESSION['Droit_User'], $nb_locations['nb_loc']);
$_SESSION['Num_Tr_Pt'] = $Num_Tr_Pt;

$_SESSION['date_depart'] = date("Y-m-d", strtotime($_SESSION['date_depart']));
$_SESSION['date_arrivee'] = date("Y-m-d", strtotime($_SESSION['date_arrivee']));

$insert_fact = $db->prepare('INSERT INTO Location(Date_Debut_Loc, Date_Fin_Loc, Duree_Loc, Pu_TTC_Loc, Num_User, Num_AG, Num_Car, Num_AG_Agence, Num_Tr_Pt)
					VALUES(:Date_Debut_Loc, :Date_Fin_Loc, :Duree_Loc, :Pu_TTC_Loc, :Num_User, :Num_AG, :Num_Car, :Num_AG_Agence,  :Num_Tr_Pt)');
$insert_fact->execute([
	'Date_Debut_Loc' => $_SESSION['date_depart'],
	'Date_Fin_Loc' => $_SESSION['date_arrivee'],
	'Duree_Loc' => $_SESSION['nb_jour'],
	'Pu_TTC_Loc' => $_SESSION['prix_devis'],
	'Num_User' => $numero_clients['Num_User'],
	'Num_AG' => $agence_departs['Num_AG'],
	'Num_Car' => $_SESSION['Num_Car'],
	'Num_AG_Agence' => $agence_arrivees['Num_AG'],
	'Num_Tr_Pt' => $Num_Tr_Pt
]);

if(isset($_SESSION['fidele']) && $_SESSION['fidele'] == 1){
	$insert_coordonnees = $db->prepare('INSERT INTO Client_Fidele(Civ_Cli, Nom_Cli, Prenom_Cli, Rue_Cli, Ville_Cli, CP_Cli, Tel_Cli, Num_User) VALUES(:Civ_Cli, :Nom_Cli, :Prenom_Cli, :Rue_Cli, :Ville_Cli, :CP_Cli, :Tel_Cli, :Num_User)');
	$insert_coordonnees->execute([
		'Civ_Cli' => $_SESSION['Civ'],
		'Nom_Cli' => $_SESSION['Nom'],
		'Prenom_Cli' => $_SESSION['Prenom'],
		'Rue_Cli' => $_SESSION['voie'],
		'Ville_Cli' => $_SESSION['ville'],
		'CP_Cli' => $_SESSION['cp'],
		'Tel_Cli' => $_SESSION['Num_Tel'],
		'Num_User' => $numero_clients['Num_User']
	]);

	$change_droit = $db->prepare('UPDATE Espace_User SET Droit_User = 1 WHERE Num_User = ?');
	$change_droit->execute([$numero_clients['Num_User']]);
	$_SESSION['Droit_User'] = 1;
}
else if (!isset($_SESSION['fidele'])){
	$update_coordonnees = $db->prepare('UPDATE Client_Fidele SET Civ_Cli=:Civ_Cli, Nom_Cli=:Nom_Cli , Prenom_Cli=:Prenom_Cli, Rue_Cli=:Rue_Cli, Ville_Cli=:Ville_Cli, CP_Cli=:CP_Cli, Tel_Cli=:Tel_Cli WHERE Num_User=:Num_User');
	$update_coordonnees->execute([
		'Civ_Cli' => $_SESSION['Civ'],
		'Nom_Cli' => $_SESSION['Nom'],
		'Prenom_Cli' => $_SESSION['Prenom'],
		'Rue_Cli' => $_SESSION['voie'],
		'Ville_Cli' => $_SESSION['ville'],
		'CP_Cli' => $_SESSION['cp'],
		'Tel_Cli' => $_SESSION['Num_Tel'],
		'Num_User' => $numero_clients['Num_User']
	]);
}

echo "<a href=\"index.php?action=accueil\">Votre reservation a été acceptée</a>";
echo "<br>";
?>
<pre><?php print_r($GLOBALS);?></pre>
