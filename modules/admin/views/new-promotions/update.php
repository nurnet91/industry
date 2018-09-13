<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NewPromotions */

$this->title = 'Update New Promotions: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'New Promotions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="new-promotions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'mainCats' => $mainCats
    ]) ?>

</div>
