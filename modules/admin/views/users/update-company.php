<?php

use yii\helpers\Html;

$this->title = 'Update Company: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Company', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

?>

<div class="users-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=$this->render('_form_company', ['model' => $model, 'model2' => $model2, 'countries' => $countries, 'variants' => $variants]) ?>

</div>
