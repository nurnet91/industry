<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FilterMain */

$this->title = 'Update Filter Main: ' . $model->id;
$this->params['breadcrumbs'][] = ($model->type == 1) ? ['label' => 'Filter Mains', 'url' => ['service']] : ['label' => 'Filter Mains', 'url' => ['equipment']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="filter-main-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'allPos' => $allPos,
        'model' => $model,
        'modelThemes' => $modelThemes,
        'modelForm' => $modelForm,
        'directions' => $directions,
    ]) ?>

</div>
