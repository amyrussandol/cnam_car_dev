
<?php ob_start(); 

?>
<h2>Vos coordonées : </h2>
	<fieldset>
		<legend></legend>
		<table>
			<tr>
				<td><label for="Civ">Civilité</label></td>
				<td> : </td>
				<td><input type="text" name="Civ" id="Civ" size="10" value ="<?= $data['Civ_Cli'] ?>"></td>
			</tr>
			<tr>
				<td><label for="Nom">Nom</label></td>
				<td> : </td>
				<td><input type="text" name="Nom" id="Nom" size="10" value="<?= $data['Nom_Cli'] ?>"></td>
			</tr>
			<tr>
				<td><label for="Prenom">Prenom</label></td>
				<td> : </td>
				<td><input type="text" name="Prenom" id="Prenom" size="10" value="<?= $data['Prenom_Cli'] ?>"></td>
			</tr>
			<tr>
				<td><label for="Num_Tel">Telephone</label></td>
				<td> : </td>
				<td><input type="text" name="Num_Tel" id="Num_Tel" size="10" value="<?= $data['Tel_Cli'] ?>"></td>
			</tr>
		</table>
	</fieldset>

	<fieldset>
		<legend>Votre adresse : </legend>
		<table>
			<tr>
				<td><label for="voie">Voie</label></td>
				<td> : </td>
				<td><input type="text" name="voie" id="voie" size="50" value="<?= $data['Rue_Cli'] ?>"></td>
			</tr>
			<tr>
				<td><label for="ville">Ville</label></td>
				<td> : </td>
				<td><input type="text" name="ville" id="ville" size="50" value="<?= $data['Ville_Cli'] ?>"></td>
			</tr>
			<tr>
				<td><label for="cp">CP</label></td>
				<td> : </td>
				<td><input type="text" name="cp" id="cp" size="50" value="<?= $data['CP_Cli'] ?>"></td>
			</tr>
		</table>
		<input type="checkbox" name="CGU" value="1" id="CGU"><label for="tourisme">En cochant cette case j'accepte les CGU, Vous devez cochez cette case pour poursuivre la reservation</label><br><br>
		
	    <?= $input_fidele ?>
	</fieldset>

<?php $devis_formulaire = ob_get_clean(); ?>