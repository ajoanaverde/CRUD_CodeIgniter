

<table class="table">
    <thead>
        <tr>
            <th>Nro de Commande</th>
            <th>Client</th>
            <th>Nro de Client</th>
            <th>Passé le:</th>
            <th>Livré<br>0->non<br>1->oui</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $commande['numeroCommande']; ?></td>
            <td><?php echo $commande['nomClient']; ?></td>
            <td><?php echo $commande['numClient']; ?></td>
            <td><?php echo $commande['dateCommande']; ?></td>
            <td><?php echo $commande['isDelivered']; ?></td>
        </tr>
    </tbody>
</table>
<div style="text-align: center">
<a href="<?php echo site_url("/commande/update/" . $commande["idCommande"]) ?>"><button type="button" class="btn btn-warning">Edit</button></a>
<a href="<?php echo site_url("/commande/delete/" . $commande["idCommande"]) ?>"><button type="button" class="btn btn-danger">Delete</button></a>
</div>
