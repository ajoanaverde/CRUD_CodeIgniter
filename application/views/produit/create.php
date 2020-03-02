<?php echo validation_errors(); ?>

<?php echo form_open('produit/create'); ?>
<table style="margin-left: 2em; margin-top: 2em">
    <tr>
        <td><label for="nomProduit">Nom</label></td>
        <td><input type="text" name="nomProduit"></td>
    </tr>
    <tr>
        <td><label for="descriptProduit">Description</label></td>
        <td><textarea name="descriptProduit" id="" cols="30" rows="10"></textarea></td>
    </tr>
    <tr>
        <td><label for="qttProduit">quantité</label></td>
        <td><input type="number" name="qttProduit"></td>
    </tr>
    <tr>
        <td><label for="prixProduit">Prix</label></td>
        <td><input type="text" name="prixProduit"></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center">
            <input type="submit" name="submit" value="add produit">
        </td>
    </tr>

</table>
</form>