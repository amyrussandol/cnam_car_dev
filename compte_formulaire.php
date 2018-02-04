<?php ob_start(); ?>

<form action="compte_login.php?action=login" method="post">
	<fieldset>
		<legend>Identification : </legend>
		<table>
			<tr>
				<td><label for="login">Votre mail : </label></td>
				<td> : </td>
				<td><input type="text" name="login" id="login"><label for="login"></label></td>
			</tr>
			<tr>
				<td><label for="pass">Votre mot de passe : </label></td>
				<td> : </td>
				<td><input type="password" name="pass" id="pass"><label for="pass"></label></td>
			</tr>

		</table>
	</fieldset>
	<input type="submit" value="ok">
</form>

<form action="compte_login.php?action=create_login" method="post">
	<fieldset>
		<legend>Nouveau compte : </legend>
		<table>
			<tr>
				<td><label for="login">Votre mail : </label></td>
				<td> : </td>
				<td><input type="text" name="login" id="login"><label for="login"></label></td>
			</tr>
			<tr>
				<td><label for="pass">Votre mot de passe : </label></td>
				<td> : </td>
				<td><input type="password" name="pass" id="pass"><label for="pass"></label></td>
			</tr>
		</table>
	</fieldset>
	<input type="submit" value="ok">
</form>
<?php $compte_formulaire = ob_get_clean(); ?>