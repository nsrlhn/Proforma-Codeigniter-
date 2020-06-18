<style type="text/css">table, th,td{border: 1px solid black;}</style>
	
	<h2><?= esc($title); ?></h2>

	<label for="description">Description: </label>
	<input type="text" name="description" value="<?= esc($rco->description); ?>"><br>

	<label for="date">Date: </label>
	<input type="date" name="date" value="<?= esc($rco->date); ?>"><br><br>
	
	<label for="materials">Materials: </label>
	<table name="materials">
		<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Quantity</th>
				<th>Unit</th>
				<th>Tax</th>
				<th>Unit Price</th>
			</tr>
		</thead>
    <?php foreach ($rco->materials as $m): ?>
    	<tr>
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
	<textarea name="note" value="<?= esc($rco->note); ?>"></textarea><br>