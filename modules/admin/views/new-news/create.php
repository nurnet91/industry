<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NewNews */

$this->title = 'Create New News';
$this->params['breadcrumbs'][] = ['label' => 'New News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="new-news-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'mainCats' => $mainCats
    ]) ?>

</div>
