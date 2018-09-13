<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\FilterMain */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Filter Mains', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filter-main-view">

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
            'direction_id',
            'theme_id',
            'sub_theme_id',
            'tech_id',
            'operation_id',
            'equipment_type_id',
            'equipment_manufacturer_id',
            'attributes_id',
            'type',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
