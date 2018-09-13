<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NewStatya */

$this->title = 'Create New Statya';
$this->params['breadcrumbs'][] = ['label' => 'New Statyas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="new-statya-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'mainCats' => $mainCats
    ]) ?>

</div>
