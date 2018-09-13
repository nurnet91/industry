<?php

use yii\helpers\Html;

$this->title = 'Update Company Profile Variant: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Company Profile Variants', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

?>
<div class="company-profiles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
