<?php if (!empty($contact)) {
    $adress = $contact->address_one;
} else {
    $adress = '';
}
if (!empty($company)) {
    $dataCompany = $company->name;
} else {
    $dataCompany = '';
} ?>
<option>Список Авторов</option>

<?php if (!empty($data)): ?>

    <?php foreach ($data as $key => $value): ?>
        <?php
        $values = $value->fio.",".$value->role.",".$dataCompany.",".$adress;
        ?>
        <option value='<?=$values?>'><?=$values?></option>

    <?php endforeach ?>

<?php endif ?>