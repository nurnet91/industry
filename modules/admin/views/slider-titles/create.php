<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SliderTitles */

$this->title = 'Create Slider Titles';
$this->params['breadcrumbs'][] = ['label' => 'Slider Titles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-titles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
