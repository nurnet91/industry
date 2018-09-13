<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NewVideos */

$this->title = 'Create New Videos';
$this->params['breadcrumbs'][] = ['label' => 'New Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="new-videos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'mainCats' => $mainCats
    ]) ?>

</div>
