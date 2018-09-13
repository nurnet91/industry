<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NewReports */

$this->title = 'Update New Reports: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'New Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="new-reports-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'mainCats' => $mainCats
    ]) ?>

</div>
