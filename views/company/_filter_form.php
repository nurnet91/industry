
<?php if (!empty($data)): ?>

	<?php foreach ($data as $key => $value): ?>
    <?php if (!empty($value->$mName)): ?>
		<option value="<?=$value->$mName->id ?>" <?= $value->$mName->id == $item_id ? 'selected' : '' ?>><?=$value->$mName->name ?></option>
    <?php else: ?>
        <option value="<?= $value->id ?>"><?= $value->name ?></option>
    <?php endif; ?>
	<?php endforeach ?>
	
<?php endif ?>