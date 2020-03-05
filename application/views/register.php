<?php echo validation_errors(); ?>

<?php echo form_open('user/register'); ?>

<div class="container">
<table  class="mx-auto" style="margin-left: 2em; margin-top: 2em">

    <tr>
        <td><label for="emailUser">Email</label></td>
        <td><input type="text" name="emailUser"></td>
    </tr>

    <tr>
        <td><label for="passwordUser">Password</label></td>
        <td><input type="password" name="passwordUser"></td>
    </tr>
    <tr>
        <td><label for="passwordUser2">Confirm Password</label></td>
        <td><input type="password" name="passwordUser2"></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center">
            <input class="btn btn-primary btn-block" type="submit" name="submit" value="Register">
        </td>
    </tr>

</table>

</form>
</div>