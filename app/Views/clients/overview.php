
<style type="text/css"> table, th,td{border: 1px solid black;} </style>

<form method="post">
	<table id="table_clients">
		<thead>
			<tr>
				<th></th>
				<th>id</th>
				<th>Name</th>
				<th>Phone</th>
				<th>Address</th>
				<th>Notes</th>
			</tr>
		</thead>
    <?php foreach ($clients as $clients_item): ?>
    	<tr>
    		<th><input type="radio" name="id" value="<?= esc($clients_item['id']); ?>"></th>
    		<th><?= esc($clients_item['id']); ?></th>
	        <th><?= esc($clients_item['name']); ?></th>
	        <th><?= esc($clients_item['phone']); ?></th>
	        <th><?= esc($clients_item['address']); ?></th>
	        <th><?= esc($clients_item['note']); ?></th>
        </tr>
    <?php endforeach; ?>
	</table>
	<br>
	<input type="submit" formaction="/clients/view" value="Edit Client">
	<input type="submit" formaction="/clients/create" value="New Client">
</form>