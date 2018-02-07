<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Acccueil</title>
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <script src="bootstrap/js/jquery-3.3.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
		<script type = "text/javascript">
			function verif(unForm){
				var noms = unForm.age.value;
				var message = "";
				var ok = false;

				if (age <= 0){
					message = "N'importe quoi !!";		
				} else if(age <18) {
					message = "Tu n'es pas majeur mais c'est bon on envoie !";
					ok = true;
				} else if(age <= 60){
					message = "Non!";		
				}else if(age <= 120){
					message = "Vous êtes senior";		
				}else if(120 < age){
					message = "Est ce bien possible ?";		
				}else{
					message = "Tu dois rentrer un nombre";		
				}
				document.getElementById("conclusion").innerHTML = message;
				return ok ;
			}
		</script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<h1>CNAM-CAR-Accueil</h1>
					<p>Vous souahitez louer une voiture ? vous êtez au bon endroit !</p>
					<?= $menu ?>
			
					<?php if(!empty($_SESSION['login'])){ ?>

						<h2>Votre Identifiant : </h2>

							<?= $_SESSION['login'] ?>

						<form action="deconnexion.php" method="post">
							<input type="submit" name="annulation" value="deconnexion">
						</form>
						
					<?php } ?>
					
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