<?php

use yii\helpers\Html;

$this->title = 'Create Company';
$this->params['breadcrumbs'][] = ['label' => 'Company', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="users-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_company', ['model' => $model, 'model2' => $model2, 'countries' => $countries, 'variants' => $variants]) ?>

</div>
