<?= \Config\Services::validation()->listErrors(); ?>

<form action="/clients/create" method="post">
    <?= csrf_field() ?>
    
	<fieldset>
		<?php if (! empty($client)) : ?>
		    <label for="id">id: </label>
		    <input type="text" name="id" value="<?= esc($client['id']); ?>" readonly><br>
		    <label for="name">Name: </label>
		    <input type="text" name="name" value="<?= esc($client['name']); ?>"><br>
		    <label for="phone">Phone: </label>
		    <input type="text" name="phone"  value="<?= esc($client['phone']); ?>"><br>
		    <label for="address">Address: </label>
		    <input type="text" name="address" value="<?= esc($client['address']); ?>"><br>
		    <label for="note">Note: </label>
		    <input type="text" name="note" value="<?= esc($client['note']); ?>"><br>
		<?php else : ?>
		    <label for="name">Name: </label>
		    <input type="text" name="name" value=""><br>
		    <label for="phone">Phone: </label>
		    <input type="text" name="phone"  value=""><br>
		    <label for="address">Address: </label>
		    <input type="text" name="address" value=""><br>
		    <label for="note">Note: </label>
		    <input type="text" name="note" value=""><br>
		<?php endif ?>
	    <input type="submit" value="Save"></input>
    </fieldset>
</form>