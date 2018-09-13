<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\NewNews */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'New News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="new-news-view">

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
            'category_id',
            'photo',
            'type',
            'title_ru',
            'title_en',
            'title_ua',
            'short_text_ru:ntext',
            'short_text_en:ntext',
            'short_text_ua:ntext',
            'text_ru:ntext',
            'text_en:ntext',
            'text_ua:ntext',
            'link',
            'created_at',
            'updated_at',
            'status',
        ],
    ]) ?>

</div>
