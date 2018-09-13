<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->name_ru;
$this->params['breadcrumbs'][] = ['label' => 'Countries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="countries-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name_ru',
            'name_en',
            'name_ua',
            'status',
        ],
    ]) ?>

</div>
