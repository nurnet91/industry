<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NewsTypes */

$this->title = 'Create News Types';
$this->params['breadcrumbs'][] = ['label' => 'News Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
