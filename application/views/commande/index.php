<h1 style="text-align: center;">Produits</h1>

<table class="table">
    <thead>
        <tr>
            <th>Numero de Commande</th>
            <th>Livré <span class="text-danger">0->non</span> <span class="text-success">1->oui</span></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($commande as $one_commande) : ?>
            <tr>
                <td><?php echo $one_commande['numeroCommande']; ?></td>
                <td><?php echo $one_commande['isDelivered']; ?></td>

                <td> <a href="<?php echo site_url("/commande/show/" . $one_commande["idCommande"]) ?>">View</a></td>

                <td> <a class="text-warning" href="<?php echo site_url("/commande/update/" . $one_commande["idCommande"]) ?>">Edit</a></td>

                <td> <a class="text-danger" href="<?php echo site_url("/commande/delete/" . $one_commande["idCommande"]) ?>">Delete</a></td>
            </tr>


        <?php endforeach; ?>
    </tbody>
</table>

<div style="text-align: center">
    <a href="<?php echo site_url("/commande/create/") ?>"><button type="button" class="btn btn-success">add new commande</button></a>
</div>