
<?php 

$rcos = json_decode($project['rcos']);

if (! empty($rcos) && is_object($rcos)) : ?>

	<style type="text/css">
		table, th,td{
			border: 1px solid black;
		}
	</style>

	<form action="/rcos/edit" method="post">
		<table >
			<tr>
				<th>RCO</th>
				<th>Date</th>
				<th>Description</th>
				<th>Amount</th>
				<th>Rejected</th>
				<th>Pending</th>
				<th>Apprvd Amount</th>
				<th>Status</th>
			</tr>
	    <?php foreach ($rcos as $rco): ?>
	    	<tr>
	        <th><?= esc($rco->name); ?></th>
	        <th><?= esc($rco->date); ?></th>
	        <th><?= esc($rco->description); ?></th>
	        <th><?= esc($rco->amount); ?></th>
	        <th><?= esc($rco->rejected); ?></th>
	        <th><?= esc($rco->pending); ?></th>
	        <th><?= esc($rco->approved); ?></th>
	        <th><?= esc($rco->status); ?></th>
	        </tr>
	    <?php endforeach; ?>
		</table>
		<br>
	</form>
<?php else : ?>

    <h3>No RCO</h3>

    <p>Unable to find any rco for you.</p>

<?php endif ?>