<h1 style="text-align: center">Detail Client</h1>

<table class="table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Nro de Client</th>
            <th>Email</th>
            <th>Adresse</th>
            <th>Telephone</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $client['nomClient']; ?></td>
            <td><?php echo $client['numClient']; ?></td>
            <td><?php echo $client['emailClient']; ?></td>
            <td><?php echo $client['adresseClient']; ?></td>
            <td><?php echo $client['telClient']; ?></td>
        </tr>
    </tbody>
</table>
<div style="text-align: center">
<a href="<?php echo site_url("/client/update/" . $client["idClient"]) ?>"><button type="button" class="btn btn-warning">Edit</button></a>
<a href="<?php echo site_url("/client/delete/" . $client["idClient"]) ?>"><button type="button" class="btn btn-danger">Delete</button></a>
</div>
