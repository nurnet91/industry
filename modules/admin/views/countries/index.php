<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Countries';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="countries-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Html::a('Create Countries', ['create'], ['class' => 'btn btn-success']) ?></p>

    <?= GridView::widget([
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
                'template' => '{view}&nbsp;&nbsp;{update}&nbsp;&nbsp;{delete}&nbsp;&nbsp;{regions}&nbsp;&nbsp;{cities}',
                'buttons' => [
                    'regions' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-list-alt"></span>', ['regions/index', 'country_id' => $model->id], ['title' => 'Regions', 'aria-label' => 'Regions', 'data-pjax' => '0']);
                    },
                    'cities' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-menu-hamburger"></span>', ['cities/index', 'country_id' => $model->id], ['title' => 'Cities', 'aria-label' => 'Cities', 'data-pjax' => '0']);
                    }
                ]
            ],
        ],
    ]); ?>
</div>
