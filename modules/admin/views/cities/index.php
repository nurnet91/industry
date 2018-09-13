<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = "Cities - " . $country->name_ru;
$this->params['breadcrumbs'][] = ['label' => 'Countries', 'url' => ['countries/index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="cities-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Html::a('Create Cities', ['create', 'country_id' => $country->id], ['class' => 'btn btn-success']) ?></p>

    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name_ru',
            [
                'attribute' => 'status',
                'value' => function ($m) {
                    return $m->status > 0 ? '<span class="label label-success">Активный</span>' : '<span class="label label-danger">Не активный</span>';
                },
                'format'=> 'raw',
                'filter'=> Html::activeDropDownList($searchModel, 'status', [1 => 'Активный', 0 => 'Не активный'],['class'=>'form-control','prompt' => '']),
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}&nbsp;&nbsp;{update}&nbsp;&nbsp;{delete}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['cities/view', 'country_id' => $model->country_id, 'id' => $model->id], ['title' => 'Просмотр', 'aria-label' => 'Просмотр', 'data-pjax' => '0']);
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['cities/update', 'country_id' => $model->country_id, 'id' => $model->id], ['title' => 'Редактировать', 'aria-label' => 'Редактировать', 'data-pjax' => '0']);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['cities/delete', 'country_id' => $model->country_id, 'id' => $model->id], ['title' => 'Удалить', 'aria-label' => 'Удалить', 'data-pjax' => '0', 'data-confirm' => 'Вы уверены, что хотите удалить этот элемент?', 'data-method' => 'post']);
                    },
                ]
            ],
            
        ],

    ]); ?>

</div>
