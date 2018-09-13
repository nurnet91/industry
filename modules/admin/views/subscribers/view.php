<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Subscribers */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Subscribers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscribers-view">

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
            'name',
            'email:email',
            'phone',
            'created_at',
            'updated_at',
            'info_inform',
            'info_special',
            'info_offer',
            'category_ids',
        ],
    ]) ?>

</div>
