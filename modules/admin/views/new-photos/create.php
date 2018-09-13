<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NewPhotos */

$this->title = 'Create New Photos';
$this->params['breadcrumbs'][] = ['label' => 'New Photos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="new-photos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'mainCats' => $mainCats
    ]) ?>

</div>
