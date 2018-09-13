<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NewPromotions */

$this->title = 'Create New Promotions';
$this->params['breadcrumbs'][] = ['label' => 'New Promotions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="new-promotions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'mainCats' => $mainCats
    ]) ?>

</div>
