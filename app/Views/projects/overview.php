
<style type="text/css">table, th,td{border: 1px solid black;}</style>

<form  method="post">
	<table id="table_projects">
		<tr>
			<th></th>
			<th>id</th>
			<th>Project Name</th>
			<th>Client Name</th>
			<th>Currency</th>
		</tr>
    <?php foreach ($projects as $projects_item): ?>
    	<tr>
    		<th><input type="radio" name="id" value="<?= esc($projects_item['id']); ?>"></th>
    		<th><?= esc($projects_item['id']); ?></th>
	        <th><?= esc($projects_item['name']); ?></th>
	        <th><?= esc($projects_item['client']); ?></th>
	        <th><?= esc($projects_item['currency']); ?></th>
        </tr>
    <?php endforeach; ?>
	</table>
	<br>
	<input type="submit" formaction="/projects/view" value="Edit Project">
	<input type="submit" formaction="/projects/create" value="New Project">
</form>