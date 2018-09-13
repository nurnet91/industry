<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NewPresentations */

$this->title = 'Create New Presentations';
$this->params['breadcrumbs'][] = ['label' => 'New Presentations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="new-presentations-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'mainCats' => $mainCats
    ]) ?>

</div>
