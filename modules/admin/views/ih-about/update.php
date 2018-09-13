<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IhAbout */

$this->title = 'Update Ih About: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Ih Abouts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ih-about-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
