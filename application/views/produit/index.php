<h1 style="text-align: center;">Produits</h1>

<table class="table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Stock</th>
            <th>Prix</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($produit as $one_produit) : ?>
            <tr>
                <td><?php echo $one_produit['nomProduit']; ?></td>
                <td><?php echo $one_produit['descriptProduit']; ?></td>
                <td><?php echo $one_produit['qttProduit']; ?></td>
                <td><?php echo $one_produit['prixProduit']; ?></td>

                <td> <a href="<?php echo site_url("/produit/show/" . $one_produit["idProduit"]) ?>">View</a></td>

                <td> <a class="text-warning" href="<?php echo site_url("/produit/update/" . $one_produit["idProduit"]) ?>">Edit</a></td>

                <td> <a class="text-danger" href="<?php echo site_url("/produit/delete/" . $one_produit["idProduit"]) ?>">Delete</a></td>
            </tr>


        <?php endforeach; ?>
    </tbody>
</table>

<div style="text-align: center">
    <a href="<?php echo site_url("/produit/create/") ?>"><button type="button" class="btn btn-success">add new produit</button></a>
</div>