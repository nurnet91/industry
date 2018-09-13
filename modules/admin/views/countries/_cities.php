<option value="0">Select City</option>

<?php if (!empty($data)): ?>

	<?php foreach ($data as $key => $value): ?>

		<option value="<?=$value->id ?>"><?=$value->name_ru ?></option>

	<?php endforeach ?>
	
<?php endif ?>