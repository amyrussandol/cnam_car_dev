<?php 
session_start();
require('model.php');
$bd = dbconnect();

if($_GET['action'] == 'login'){

	if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['login'])){

		$req1 = $bd->prepare('SELECT Mel_User, Pass_User FROM Espace_User WHERE Mel_User = :Mel_User');
		$req1->execute([
		    'Mel_User' => $_POST['login']
			]);
		$login = $req1->fetch();

		if ($login) {

			if(password_verify($_POST['pass'], $login['Pass_User'])){

				$_SESSION['login'] = $_POST['login'];

				$req2 = $bd->prepare('SELECT Droit_User FROM Espace_User WHERE Mel_User = :Mel_User');
				$req2->execute([
			    	'Mel_User' => $_SESSION['login']
					]);
				$resultat2 = $req2->fetch();
				
				$_SESSION['Droit_User'] = $resultat2['Droit_User'];

				if(isset($_SESSION['devis']) && $_SESSION['Droit_User'] < 2 ){

					header('Location: index.php?action=devis');

				} 
				else if(isset($_SESSION['devis']) && $_SESSION['Droit_User'] == 2){

					echo "<a href=\"index.php?action=espace_perso\">Vous êtes connecté en mode administrateur créez un compte client pour effectuer une reservation</a>";
				}
				else{

					header('Location: index.php?action=espace_perso');
				}			
			} 
			else{

					echo "<a href=\"index.php?action=espace_perso\">Votre mot de passe est erroné veuillez recommencer</a>";
					echo "<br>";
			}
		} 
		else{

			echo "<a href=\"index.php?action=espace_perso\">Votre identifiant est erroné veuillez recommencer</a>";
			echo "<br>";
		}
	}
	else{

		echo "<a href=\"index.php?action=espace_perso\">Le format de votre adresse est erronée veuillez recommencer</a>";
		echo "<br>";

	}
}
else if($_GET['action'] == 'create_login'){

	if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['login'])){

		$req1 = $bd->prepare('SELECT Mel_User FROM Espace_User WHERE Mel_User = :Mel_User');
		$req1->execute([
		    'Mel_User' => $_POST['login']
			]);

		$login = $req1->fetch();

		if (!$login) {
		
			$Pass_Hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);

			$req2 = $bd->prepare('INSERT INTO Espace_User(Num_User, Mel_User, Pass_User, Droit_User) VALUES(:Num_User,:Mel_User, :Pass_User, :Droit_User)');
			$req2->execute([
					'Num_User' => '0',
					'Mel_User' => $_POST['login'],
					'Pass_User' => $Pass_Hache,
					'Droit_User' => 0,
					]);

			$_SESSION['login'] = $_POST['login'];
			$_SESSION['Droit_User'] = 0;
			
		   if(isset($_SESSION['devis']) ){

		   		header('Location: index.php?action=devis');

		   	}
		   	else{

				header('Location: index.php?action=espace_perso');
		   	}
		}
		else{

			 echo "<a href=\"index.php?action=espace_perso\">Identifiant déjà utilisé veuillez recommencer</a>";
		}
	}
	else{

		echo "<a href=\"index.php?action=espace_perso\">Le format de votre adresse est erroné veuillez recommencer</a>";
		echo "<br>";
	}
}	