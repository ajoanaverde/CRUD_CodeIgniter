<?php echo validation_errors(); ?>

<?php echo form_open('commande/create'); ?>
<table style="margin-left: 2em; margin-top: 2em">
    <tr>
        <td><label for="numeroCommande">Numero de commande</label></td>
        <td><input type="text" name="numeroCommande"></td>
    </tr>

    <tr>
        <td colspan="2" style="text-align: center">
            <input type="submit" name="submit" value="add commande">
        </td>
    </tr>

</table>
</form>