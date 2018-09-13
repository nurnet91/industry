<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SliderTitles */

$this->title = 'Update Slider Titles: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Slider Titles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="slider-titles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
