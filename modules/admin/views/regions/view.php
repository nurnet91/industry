<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->name_ru;
$this->params['breadcrumbs'][] = ['label' => 'Countries', 'url' => ['countries/index']];
$this->params['breadcrumbs'][] = ['label' => "Regions - ".$model->country->name_ru,'url' => ['index','country_id' => $model->country_id]];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="regions-view">

    <h1><?=Html::encode($this->title) ?></h1>

    <?=DetailView::widget([
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
