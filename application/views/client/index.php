
<h1>hi</h1>
<table>
<?php foreach($client as $one_client): ?>
<?php echo $one_client['nomClient']; ?>
<a href="<?php echo site_url("/client/show/" . $one_client["idClient"]) ?>">View</a>
<a href="<?php echo site_url("/client/update/" . $one_client["idClient"]) ?>">Edit</a>
<a href="<?php echo site_url("/client/delete/" . $one_client["idClient"]) ?>">Delete</a>
<br>
<?php endforeach; ?>

