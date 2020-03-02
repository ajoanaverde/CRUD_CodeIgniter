<?php echo validation_errors(); ?>

<?php echo form_open('produit/update'); ?>
<table style="margin-left: 2em; margin-top: 2em">
    <tr>
        <td><label for="nomProduit">Nom</label></td>
        <td><input type="text" name="nomProduit" value="<?php echo $produit['nomProduit']; ?>"></td>
    </tr>
    <tr>
        <td><label for="descriptProduit">Description</label></td>
        <td><textarea name="descriptProduit" id="" cols="30" rows="10"><?php echo $produit['descriptProduit']; ?></textarea></td>
    </tr>
    <tr>
        <td><label for="qttProduit">quantité</label></td>
        <td><input type="number" name="qttProduit" value="<?php echo $produit['qttProduit']; ?>"></td>
    </tr>
    <tr>
        <td><label for="prixProduit">Prix</label></td>
        <td><input type="text" name="prixProduit" value="<?php echo $produit['prixProduit']; ?>"></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center">
            <input type="submit" name="submit" value="update produit">
        </td>
    </tr>

</table>
</form>