<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FilterMain */


$this->title = 'Create Filter Main';
$this->params['breadcrumbs'][] = ($model->type == 1) ? ['label' => 'Filter Mains', 'url' => ['service']] : ['label' => 'Filter Mains', 'url' => ['equipment']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filter-main-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelThemes' => $modelThemes,
        'modelForm' => $modelForm,
        'directions' => $directions,
    ]) ?>

</div>
