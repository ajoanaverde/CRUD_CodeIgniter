

<?php echo validation_errors(); ?>

<?php echo form_open('Client/create'); ?>

<label for="nomClient">Nom</label>
<br>
<input type="text" name="nomClient">
<br>
<label for="numClient" >Nro de Client</label>
<br>
<input type="text" name="numClient">
<br>
<label for="emailClient">Email</label>
<br>
<input type="text" name="emailClient">
<br>
<label for="adresseClient">Adresse</label>
<br>
<input type="text" name="adresseClient">
<br>
<label for="telClient">Telephone</label>
<br>
<input type="text" name="telClient">
<br>
<input type="submit" name="submit" value="add client">

</form>