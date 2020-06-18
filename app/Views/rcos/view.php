<style type="text/css">table, th,td{border: 1px solid black;}</style>

<form method="post">

	<input type="hidden" name="name" value="<?= esc($rco->name); ?>"><br>

	<label for="description">Description: </label>
	<input type="text" name="description" value="<?= esc($rco->description); ?>"><br>

	<label for="date">Date: </label>
	<input type="date" name="date" value="<?= esc($rco->date); ?>"><br><br>

	<input type="submit" formaction="/rcos/addMaterial" value="Add Material">
	<input type="submit" formaction="/rcos/editMaterial" value="Edit Material">
	<input type="hidden" name="materials" value="<?= esc(json_encode($rco->materials)); ?>">
	<br>
	<br>
	<table>
		<thead>
			<tr>
				<th></th>
				<th>Name</th>
				<th>Quantity</th>
				<th>Unit</th>
				<th>Tax</th>
				<th>Unit Price</th>
			</tr>
		</thead>
    <?php foreach ($rco->materials as $m): ?>
    	<tr>
		    <th><input type="radio" name="material_id" value="<?= esc($m->id); ?>"></th>
    		<th><?= esc($m->name); ?></th>
	        <th><?= esc($m->quantity); ?></th>
	        <th><?= esc($m->unit); ?></th>
	        <th><?= esc($m->tax); ?></th>
	        <th><?= esc($m->unitprice); ?></th>
        </tr>
    <?php endforeach; ?>
	</table>
	<br>
	<label for="note">Note: </label>
	<textarea name="note" value="<?= esc($rco->note); ?>"></textarea>
	<br>
	<br>
	<input type="hidden" name="id" value="<?= esc($_POST['id']); ?>">
	<input type="submit" formaction="/rcos/saveAndQuit" value="Save">
</form>