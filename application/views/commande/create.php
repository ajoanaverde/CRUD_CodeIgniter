<?php echo validation_errors(); ?>

<?php echo form_open('commande/create'); ?>
<table style="margin-left: 2em; margin-top: 2em">
    <tr>
        <td><label for="numeroCommande">Numero de commande</label></td>
        <td><input type="text" name="numeroCommande"></td>
    </tr>
<tr>
<td><label for="numClient">Numero de Client</label></td>
<td><select name="numClient" id="numClient">
<?php foreach ($client as $one_client) : ?>
<option value="<?php echo $one_client['numClient']. "  " . $one_client['nomClient'];  ?>"><?php echo $one_client['numClient']. "  " . $one_client['nomClient'];  ?></option>
<?php endforeach ?>
</select></td>

</tr>
    <tr>
        <td colspan="2" style="text-align: center">
            <input type="submit" name="submit" value="add commande">
        </td>
    </tr>

</table>
</form>