<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NewEvents */

$this->title = 'Create New Events';
$this->params['breadcrumbs'][] = ['label' => 'New Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="new-events-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'mainCats' => $mainCats
    ]) ?>

</div>
