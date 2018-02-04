<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Acccueil</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<h1>CNAM-CAR-Accueil</h1>
					<p>Vous souahitez louer une voiture ? vous êtez au bon endroit !</p>
					<p>
						<a href="index.php?action=accueil">Accueil</a><span> | </span>
						<a href="index.php?action=agence">Nos agences</a><span> | </span>	
						<a href="index.php?action=nos_vehicules">Nos véhicules</a><span> | </span>	
						<a href="index.php?action=cnam_car">Qui sommes nous</a><span> | </span>
						<a href="index.php?action=faq">FAQ</a><span> | </span>
						<a href="index.php?action=mentions">Mentions légales</a><span> | </span>
						<a href="index.php?action=espace_perso">Espace Client</a><br>			
					</p>
					<?php if(!empty($_SESSION['login'])){ ?>

						<h2>Votre Identifiant : </h2>

							<p><?= $_SESSION['login'] ?>
					<?php } ?>
					<form action="deconnexion.php" method="post">
						<input type="submit" name="annulation" value="deconnexion">
					</form></p>
					<form action="index.php?action=vehicules" method="post">
						<legend>Executer une recherche : </legend>
								<label for="ag_depart">Agence de départ : </label>
									<input type="text" list="agence_depart" name="ag_depart" id="ag_depart">
										<datalist id="agence_depart">
											<?php
											while ($data1 = $agences1->fetch())
												 { ?> 
											<option value="<?=$data1['Nom_AG'] ?>"><?=$data1['Nom_AG'] ?></option>
											<?php } $agences1->closeCursor();?>
										</datalist>

								<label for="ag_arrivee">Agence d'arrivée : </label>
									<input type="text" list="agence_arrivee" name="ag_arrivee" id="ag_arrivee">
										<datalist id="agence_arrivee">
										 	<?php 
											while ($data2 = $agences2->fetch())
												 { ?> 
											<option value="<?=$data2['Nom_AG'] ?>"><?=$data2['Nom_AG'] ?></option>
											<?php } $agences2->closeCursor();?>
										</datalist>
								<label for="date_depart">Date de départ : </label><input type="date" name="date_depart" id="date_depart">
								<label for="date_arrivee">Date de d'arrivée : </label><input type="date" name="date_arrivee" id="date_arrivee">
							<p> Categorie : 
							<input type="radio" name="categorie" value="1" id="tourisme" checked=""><label for="tourisme">tourisme : </label>
						    <input type="radio" name="categorie" value="7" id="utilitaire"><label for="utilitaire">utilitaire : </label>
							</p>
						<input type="reset" value="tout effacer"> <input type="submit" value="Ok, c'est parti">
					</form>
					<img src="images/fond.jpg">
				</div>
			</div>
		</div>
			<pre><?php print_r($GLOBALS);?></pre>
	</body>
</html>