<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NewReports */

$this->title = 'Create New Reports';
$this->params['breadcrumbs'][] = ['label' => 'New Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="new-reports-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'mainCats' => $mainCats
    ]) ?>

</div>
