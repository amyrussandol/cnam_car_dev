<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>Devis</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1>Reservation</h1>
						<p>
						<a href="index.php?action=accueil">Accueil</a><span> | </span>
						<a href="index.php?action=agence">Nos agences</a><span> | </span>	
						<a href="index.php?action=nos_vehicules">Nos véhicules</a><span> | </span>	
						<a href="index.php?action=cnam_car">Qui sommes nous</a><span> | </span>
						<a href="index.php?action=faq">FAQ</a><span> | </span>
						<a href="index.php?action=mentions">Mentions légales</a><span> | </span>
						<a href="index.php?action=espace_perso">Espace Client</a><br>			
					</p>
					<h2>Votre devis :</h2>
						<form action="index.php?action=identification_paiement" method="POST">
							<table>
								<tr>
									<th>Agence de départ : </th><td><?=$_SESSION['ag_depart'] ?></td>
								</tr>
								<tr>
									<td>Agence d'arrivée : </td><td><?=$_SESSION['ag_arrivee'] ?></td>
								</tr>
								<tr>
									<td>Date de départ : </td><td><?=$_SESSION['date_depart'] ?></td>
								</tr>
								<tr>
									<td>Date d'arrivée : </td><td><?=$_SESSION['date_arrivee'] ?></td>
								</tr>
								<tr>
									<td>Durée de la location : </td><td><?=$_SESSION['nb_jour'] ?> jours</td>
								</tr>
								<tr>
									<th>Véhicule : </th><td><?=$_SESSION['Marq_Mod'] ?></td><td><?=$_SESSION['Nom_Mod'] ?></td>
								</tr>
								<tr>
									<td>Catégorie : </td><td><?=$_SESSION['Nom_Cat'] ?></td>
								</tr>
								<tr>
									<td>Carburant : </td><td><?= $_SESSION['Nom_Carbu'] ?></td>
								</tr>
								<?php if($_SESSION['devis'] == 1){ ?>
								<tr>
									<td>Toit :  </td><td><?= $_SESSION['Toit_Tou'] ?></td>
								</tr>
								<tr>
									<td>Climatisation : </td><td><?= $_SESSION['Clim_Tou'] ?></td>
								</tr>
								<tr>
									<td>Nombre de Bagages :  </td><td><?= $_SESSION['Nb_Bagage_Tou'] ?></td>
								</tr>
								<tr>
									<td>GPS : </td><td><?= $_SESSION['GPS_Tou'] ?></td>
								</tr>
								<tr>
									<td>Nombre de Places : </td><td><?= $_SESSION['Nb_Place_Tou'] ?></td>
								</tr>
								<?php }else if ($_SESSION['devis'] == 2){ ?>
								<tr>
									<td>Volume utile :  </td><td><?= $_SESSION['Vol_Ut'] ?></td>
								</tr>
								<tr>
									<td>Charge Utile : </td><td><?= $_SESSION['Charg_Ut'] ?></td>
								</tr>
								<tr>
									<td>Longueur interne :  </td><td><?= $_SESSION['Long_Ut'] ?></td>
								</tr>
								<tr>
									<td>Largeur interne : </td><td><?= $_SESSION['Larg_Ut'] ?></td>
								</tr>
								<tr>
									<td>Hauteur interne : </td><td><?= $_SESSION['Haut_Ut'] ?></td>
								</tr>
								<?php } ?>
								<tr>
									<th>Prix estimé: </th><td><?=$_SESSION['prix_devis'].'€' ?></td>

								</tr>
							</table>

							<?= $devis_formulaire ?>
							<?=  $input_id ?>			
						</form>
						<form action="index.php?action=accueil" method="post">
							<input type="submit" value="annuler">
						</form>
						<pre><?php print_r($GLOBALS);?></pre>
				</div>
			</div>
		</div>
	</body>
</html>