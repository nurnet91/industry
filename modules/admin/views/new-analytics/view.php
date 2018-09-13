<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\NewAnalytics */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'New Analytics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="new-analytics-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'photo',
            'title_ru',
            'title_ua',
            'title_en',
            'text_ru:ntext',
            'text_en:ntext',
            'text_ua:ntext',
            'created_at',
            'updated_at',
            'status',
        ],
    ]) ?>

</div>
