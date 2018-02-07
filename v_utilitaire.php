<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>Véhicules utilitaires</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1>Véhicules utilitaires</h1>
						<?= $menu ?>
					<h2>Choisissez votre véhicule :</h2>
						<p>
					    <?php while ($data = $utilitaire->fetch()) { ?> 

							 <form action="index.php?action=devis" method="post">

								 <fieldset>
								 	<legend><?= $data['Nom_Mod'] ?></legend>
				 					 <p>Marque : 
				 					 		<?= $data['Marq_Mod'] ?></p>
				  					 <p>Prix journalier : 
				  					 		<?= $data['Prix_Jour_Mod'] ?></p>
				 					 <p>Catégorie : 
				 					 		<?= $data['Nom_Cat'] ?></p>
		 					 		<p>Carburant : 
		 					 				<?= $data['Nom_Carbu'] ?></p>
 					 				<p>Volume : 
		 					 				<?= $data['Vol_Ut'] ?> m3</p>
 					 				<p>Charge utile : 
		 					 				<?= $data['Charg_Ut'] ?> kg</p>
									<p>Longueur interne : 
		 					 				<?= $data['Long_Ut'] ?></p>
 					 				<p>Largeur interne : 
		 					 				<?= $data['Larg_Ut'] ?></p>
 					 				<p>Hauteur interne: 
		 					 				<?= $data['Haut_Ut'] ?></p>
				 					 <p>
				 					 	<!-- ici on créé des 'formulaires cachés qui enverrons données de la requête !-->
				 					 	<input type="hidden" name="Marq_Mod" value="<?= $data['Marq_Mod'] ?>">
				 					 	<input type="hidden" name="Nom_Mod" value="<?= $data['Nom_Mod'] ?>"> 	
			 					 		<input type="hidden" name="Prix_Jour_Mod" value="<?= $data['Prix_Jour_Mod'] ?>">
			 					 		<input type="hidden" name="Num_Car" value="<?= $data['Num_Car'] ?>">
				 					 	<input type="hidden" name="Nom_Cat" value="<?= $data['Nom_Cat'] ?>">
				 					 	<input type="hidden" name="Nom_Carbu" value="<?= $data['Nom_Carbu'] ?>">
				 					 	<input type="hidden" name="Vol_Ut" value="<?= $data['Vol_Ut'] ?>">
				 					 	<input type="hidden" name="Charg_Ut" value="<?= $data['Charg_Ut'] ?>">
										<input type="hidden" name="Long_Ut" value="<?= $data['Long_Ut'] ?>">
										<input type="hidden" name="Larg_Ut" value="<?= $data['Larg_Ut'] ?>">
										<input type="hidden" name="Haut_Ut" value="<?= $data['Haut_Ut'] ?>">
										<input type="hidden" name="devis" value="2">
				 					 	<input type="submit" value="Ok, c'est parti">
				 					 </p>
								 </fieldset>
							</form>
							<form action="index.php?action=accueil" method="post">
								<input type="submit" value="annuler">
							</form>
			    			<?php } $utilitaire->closeCursor(); ?>
			    			<pre><?php print_r($GLOBALS);?></pre>
						</p>
					<img src="images/fond.jpg">
				</div>
			</div>
		</div>
	</body>
</html>