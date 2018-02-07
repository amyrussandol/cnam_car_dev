<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>Inscription</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script type="text/javascript">
	 // function isEmail(myVar){
  //    // La 1ère étape consiste à définir l'expression régulière d'une adresse email
  //    var regEmail = new RegExp('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$','i');

  //    return regEmail.test(myVar);
  //  }

  //  var emails = new Array('adressemail@gmail','adresse@mel.fr','adr@fr.com.eu');

  //  for(var e = 0; e < emails.length; e++){
  //    document.write('Test sur '+ emails[e] +' : '+ isEmail(emails[e]) +' < br /> ');
  //  }
   
   // Affiche:
   // Test sur adressemail@gmail : false
   // Test sur adresse@mel.fr : true
   // Test sur adr@fr.com.eu : true 
</script>

	</head>

	<body>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1>Mon Compte</h1>

					<?= $menu ?>
					
					<?php if(!empty($_SESSION['login'])){ ?>

					<h2>Votre Identifiant : </h2>

						<p><?= $_SESSION['login'] ?></p>

					<form action="deconnexion.php" method="post">
						<input type="submit" name="annulation" value="deconnexion">
					</form>
					
					<?php } ?>


					<?= $compte_formulaire ?>
					<?= $compte_fidele ?>
					<?= $compte_admin ?>


					<pre> <?php print_r($GLOBALS);?> </pre>
					<img src="images/fond.jpg">
				</div>
			</div>
		</div>
	</body>
	</html>