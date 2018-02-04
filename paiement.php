<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Paiment</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
        
    <body>
        
        <form action="index.php?action=validation_paiement" method="post">
        	<fieldset>
        		<legend><h2>Espace sécurisé</h2></legend>
				<table>
						<tr>
					<td>Votre type de carte :</td>
					<td><input type="radio" name="moyen" value="carte" id="carte"><label for="carte">VISA</label></td>
					<td><input type="radio" name="moyen" value="carte" id="carte"><label for="carte">MASTERCARD</label></td>
					<td><input type="radio" name="moyen" value="carte" id="carte"><label for="carte">LAPOSTE</label></td>
				</tr>
					<tr>
						<td><label for="card">Votre numéro de carte : </label></td>
						<td> : </td>
						<td><input type="text" name="card" id="card"></td>
					</tr>
					<tr>
						<td><label for="crypt">Votre cryptogramme (les 3 chiffres au dos de la carte) : </label></td>
						<td> : </td>
						<td><input type="password" name="crypt" id="crypt"></td>
					</tr>
				</table>
			</fieldset>
			<input type="reset" value="tout effacer"><input type="submit" value="ok">
		</form>
		<form action="index.php?action=accueil" method="post">
			<input type="submit" value="annuler">
		</form>
		<pre><?php print_r($GLOBALS);?></pre>

    </body>
</html>