

<table class="table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Numero de Client</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($client as $one_client) : ?>
            <tr>
                <td><?php echo $one_client['nomClient']; ?></td>

                <td><?php echo $one_client['numClient']; ?></td>

                <td> <a href="<?php echo site_url("/client/show/" . $one_client["idClient"]) ?>">View</a></td>

                <td> <a class="text-warning" href="<?php echo site_url("/client/update/" . $one_client["idClient"]) ?>">Edit</a></td>

                <td> <a class="text-danger" href="<?php echo site_url("/client/delete/" . $one_client["idClient"]) ?>">Delete</a></td>
            </tr>


        <?php endforeach; ?>
    </tbody>
</table>

<div style="text-align: center">
<a href="<?php echo site_url("/client/create/") ?>"><button type="button" class="btn btn-success">add new client</button></a>
</div>