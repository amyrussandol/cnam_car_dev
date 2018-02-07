<?php
ob_start();
while $data = $agence->fetch();

?> 
<h2>Espace administrateur</h2>

<p>Enregistrer/Modifier une agence :</p>

	<form>
		<fieldset>
			<legend></legend>
				<table>
					<tr>
						<td><label for="Nom_AG">Nom de l'agence</label></td>
						<td> : </td>
						<td><input type="text" name="Nom_AG" id="Nom_AG" size="10" value ="<?= $data['Nom_AG'] ?>"></td>
					</tr>
					<tr>
						<td><label for="Rue_AG">Voie</label></td>
						<td> : </td>
						<td><input type="text" name="Rue_AG" id="Rue_AG" size="20" value="<?= $data['Rue_AG'] ?>"></td>
					</tr>
					<tr>
						<td><label for="Ville_AG">Ville </label></td>
						<td> : </td>
						<td><input type="text" name="Ville_AG" id="Ville_AG" size="10" value="<?= $data['Ville_AG'] ?>"></td>
					</tr>
					<tr>
						<td><label for="CP_AG">Code postal</label></td>
						<td> : </td>
						<td><input type="text" name="CP_AG" id="CP_AG" size="6" value="<?= $data['CP_AG'] ?>"></td>
					</tr>
					<tr>
						<td><label for="Tel_AG">Téléphone</label></td>
						<td> : </td>
						<td><input type="text" name="Tel_AG" id="Tel_AG" size="10" value="<?= $data['Tel_AG'] ?>"></td>
					</tr>
				</table>
		</fieldset>
	</form>


<?php $compte_admin = ob_get_clean(); ?>