<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SliderItems */

$this->title = 'Update Slider Items: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Slider Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="slider-items-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
