

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
        <tr>
            <td><?php echo $produit['nomProduit']; ?></td>
            <td><?php echo $produit['descriptProduit']; ?></td>
            <td><?php echo $produit['qttProduit']; ?></td>
            <td><?php echo $produit['prixProduit']; ?></td>
        </tr>
    </tbody>
</table>
<div style="text-align: center">
<a href="<?php echo site_url("/produit/update/" . $produit["idProduit"]) ?>"><button type="button" class="btn btn-warning">Edit</button></a>
<a href="<?php echo site_url("/produit/delete/" . $produit["idProduit"]) ?>"><button type="button" class="btn btn-danger">Delete</button></a>
</div>
