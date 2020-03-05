<?php echo validation_errors(); ?>

<?php echo form_open('Client/create'); ?>
<table style="margin-left: 2em; margin-top: 2em">
    <tr>
        <td><label for="nomClient">Nom</label></td>
        <td><input type="text" name="nomClient"></td>
    </tr>
    <tr>
        <td><label for="numClient">Nro de Client</label></td>
        <td><input type="text" name="numClient"></td>
    </tr>
    <tr>
        <td><label for="emailClient">Email</label></td>
        <td><input type="text" name="emailClient"></td>
    </tr>
    <tr>
        <td><label for="adresseClient">Adresse</label></td>
        <td><input type="text" name="adresseClient"></td>
    </tr>
    <tr>
        <td><label for="telClient">Telephone</label></td>
        <td><input type="text" name="telClient"></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center">
            <input type="submit" name="submit" value="add client">
        </td>
    </tr>
</table>
</form>