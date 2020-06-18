<?php $rco_json = json_encode($rco) ?>

<form action="/rcos/saveMaterial" method="post">
		<table name="materials">
			<tr>
				<th>Name</th>
				<th>Quantity</th>
				<th>Unit</th>
				<th>Tax(%)</th>
				<th>Unit Price</th>
			</tr>
			<tr>
				<th><input type="hidden" name="material_id" value="<?= esc($material->id); ?>"><br></th>
				<th><input type="text" name="material_name" value="<?= esc($material->name); ?>"><br></th>
				<th><input type="text" name="material_quantity" value="<?= esc($material->quantity); ?>"><br></th>
				<th><input type="text" name="material_unit" value="<?= esc($material->unit); ?>"><br></th>
				<th><input type="text" name="material_tax" value="<?= esc($material->tax); ?>"><br></th>
				<th><input type="text" name="material_unitprice" value="<?= esc($material->unitprice); ?>"><br></th>
			</tr>
		</table>
	<br>	
	<input type="hidden" name="id" value="<?= esc($project['id']); ?>">
	<input type="hidden" name="rco_json" value="<?= esc($rco_json); ?>">
	<br>
	<input type="submit" value="Save">
</form>