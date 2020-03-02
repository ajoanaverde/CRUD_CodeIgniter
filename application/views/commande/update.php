<?php echo validation_errors(); ?>
<?php echo form_open('client/update/' . $client['idClient']); ?>

<label for="nomClient">Nom Client</label>
<br>
<input type="text" name="nomClient" value="<?php echo $client['nomClient']; ?>" />
<br>
<label for="numClient">Num Client</label>
<br>
<input type="text" name="numClient" value="<?php echo $client['numClient']; ?>" />
<br>
<label for="emailClient">Email Client</label>
<br>
<input type="text" name="emailClient" value="<?php echo $client['emailClient']; ?>" />
<br>
<label for="adresseClient">Adresse Client</label>
<br>
<input type="text" name="adresseClient" value="<?php echo $client['adresseClient']; ?>" />
<br>
<label for="telClient">Tel Client</label>
<br>
<input type="text" name="telClient" value="<?php echo $client['telClient']; ?>" />
<br>
<input type="submit" value="Yala !">
</form>