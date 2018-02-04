<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Véhicules de tourisme</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript">
		    $(function(){
				$("#form_categorie").change(function(){
				var num_categorie = $(this).find("select[name=num_categorie]").val();
				$('html,body').animate({scrollTop: $('#num_categorie').offset().top}, 'slow');
				});
			});
		</script>
	</head>
		<body>
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h1>Véhicules de tourisme</h1>
							<p>
								<a href="index.php?action=accueil">Accueil</a><span> | </span>
								<a href="index.php?action=agence">Nos agences</a><span> | </span>	
								<a href="index.php?action=nos_vehicules">Nos véhicules</a><span> | </span>	
								<a href="index.php?action=cnam_car">Qui sommes nous</a><span> | </span>
								<a href="index.php?action=faq">FAQ</a><span> | </span>
								<a href="index.php?action=mentions">Mentions légales</a><span> | </span>
								<a href="index.php?action=espace_perso">Espace Client</a><br>			
							</p>
						<h2>Choisissez votre véhicule :</h2>
							<form action="v_tourisme.php" method="POST" id="form_categorie">
								<select name="num_categorie">
									<option value="1">Citadines</option>
									<option value="2">Berline</option>
									<option value="3">SUV</option>
									<option value="4">Espace</option>
									<option value="5">Coupe</option>
									<option value="6">Cabriolet</option>
								</select>						
							</form>
			  				<?php while ($data = $tourisme->fetch()) {  ?>
							 <div id="<?= $data['Num_Cat'] ?>">
								 <!-- <form action="index.php?action=devis" method="post"> -->
								 	<form action="index.php?action=devis" method="post">
									 <fieldset>
									 	<legend><?= $data['Marq_Mod'] ?> | <?= $data['Nom_Mod'] ?></legend>
					  					<p>Prix journalier : <?= 		$data['Prix_Jour_Mod'] ?></p>
			  					 		<a href="<?= $data['Img_Mod'] ?>">Image</a>
					 					<p>Catégorie : <?= 				$data['Nom_Cat'] ?></p>
			 					 		<p>Carburant : <?= 				$data['Nom_Carbu'] ?></p>
		 					 			<p>Toit : <?= 					$data['Toit_Tou'] ?></p>
	 					 				<p>Climatisation : <?= 			$data['Clim_Tou'] ?></p>	
	 					 				<p>Nombre de Bagages : <?= 		$data['Nb_Bagage_Tou'] ?></p>
	 					 				<p>GPS : <?= 					$data['GPS_Tou'] ?></p>
	 					 				<p>Nombre de Places : <?= 		$data['Nb_Place_Tou'] ?></p>
				 					 	<!-- ici on créé des 'formulaires cachés qui enverrons données de la requête !-->
				 					 	<input type="hidden" name="Marq_Mod" value="<?= $data['Marq_Mod'] ?>">
				 					 	<input type="hidden" name="Nom_Mod" value="<?= $data['Nom_Mod'] ?>"> 	
			 					 		<input type="hidden" name="Prix_Jour_Mod" value="<?= $data['Prix_Jour_Mod'] ?>">
				 					 	<input type="hidden" name="Nom_Cat" value="<?= $data['Nom_Cat'] ?>">
				 					 	<input type="hidden" name="Nom_Carbu" value="<?= $data['Nom_Carbu'] ?>">
				 					 	<input type="hidden" name="Toit_Tou" value="<?= $data['Toit_Tou'] ?>">
				 					 	<input type="hidden" name="Clim_Tou" value="<?= $data['Clim_Tou'] ?>">
				 					 	<input type="hidden" name="Nb_Bagage_Tou" value="<?= $data['Nb_Bagage_Tou'] ?>">
				 					 	<input type="hidden" name="GPS_Tou" value="<?= $data['GPS_Tou'] ?>">
				 					 	<input type="hidden" name="Nb_Place_Tou" value="<?= $data['Nb_Place_Tou'] ?>"> 	
				 					 	<input type="hidden" name="Num_Car" value="<?= $data['Num_Car'] ?>">
			 					 		<input type="hidden" name="devis" value="1">
			 					 		<input type="submit" value="Ok, c'est parti">
									 </fieldset>
								 </form>
								 <form action="index.php?action=accueil" method="post">
									<input type="submit" value="annuler">
								</form>
							</div>	
			    			<?php } $tourisme->closeCursor(); ?>
						<pre><?php print_r($GLOBALS);?></pre>
					<img src="images/fond.jpg">
				</div>
			</div>
		</div>	
	</body>
</html>