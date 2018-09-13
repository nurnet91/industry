<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Comands */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Comands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comands-view">

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
            'fio_ru',
            'fio_en',
            'fio_ua',
            'occupation_ru',
            'occupation_en',
            'occupation_ua',
            'education_ru',
            'education_en',
            'education_ua',
            'regalia_ru',
            'regalia_en',
            'regalia_ua',
            'experience_ru',
            'experience_en',
            'experience_ua',
            'info_ru:ntext',
            'info_en:ntext',
            'info_ua:ntext',
            'created_at',
            'updated_at',
            'status',
        ],
    ]) ?>

</div>
