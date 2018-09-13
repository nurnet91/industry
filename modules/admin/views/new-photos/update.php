<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NewPhotos */

$this->title = 'Update New Photos: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'New Photos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="new-photos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'mainCats' => $mainCats
    ]) ?>

</div>
