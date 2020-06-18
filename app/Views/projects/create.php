<?= \Config\Services::validation()->listErrors(); ?>

<form action="/projects/create" method="post">
    <?= csrf_field() ?>
    
	<fieldset>
	    <legend>Create New Project:</legend>

	    <label for="client">Client: </label>
	    <select name="client">
	    	<?php foreach ($clients as $clients_item): ?>
		        <option><?= esc($clients_item['name']); ?></option>
		    <?php endforeach; ?>
	    </select><br>

	    <label for="name">Project Name: </label>
	    <input type="text" name="name"  value=""><br>

	    <label for="currency">Currency: </label>
	    <input type="text" name="currency" value=""><br>
	    
	    <input type="hidden" name="rcos" value="{}"><br>
	    <input type="submit" value="Create"></input>
    </fieldset>

</form>