<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SliderItems */

$this->title = 'Create Slider Items';
$this->params['breadcrumbs'][] = ['label' => 'Slider Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-items-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
