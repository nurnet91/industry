<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchFilterMainEquipment */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Filter Mains';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filter-main-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Filter Main', ['create?type=2'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'direction_id',
                'value' => function ($m) {
                    if ($m->direction_id > 0) {
                        return $m->direction->name;
                    } else {
                        return null;
                    }
                },
                'filter'=> Html::activeDropDownList($searchModel, 'direction_id', $directions,['class'=>'form-control','prompt' => '']),
                'format' => 'raw',
            ],
            [
                'attribute' => 'theme_id',
                'value' => function ($m) {
                    if ($m->theme_id > 0) {
                        return $m->theme->name;
                    } else {
                        return null;
                    }
                },
                'filter'=> Html::activeDropDownList($searchModel, 'theme_id', $themeList,['class'=>'form-control','prompt' => '']),
                'format' => 'raw',
            ],
            [
                'attribute' => 'theme_attr_id',
                'value' => function ($m) {
                    if ($m->theme_attr_id > 0) {
//                        dd($m);
                        return $m->themeAttr->name;
                    } else {
                        return null;
                    }
                },
                'filter'=> Html::activeDropDownList($searchModel, 'theme_attr_id', $FiltersThemeAttr,['class'=>'form-control','prompt' => '']),
                'format' => 'raw',
            ],
            [
                'attribute' => 'sub_theme_id',
                'value' => function ($m) {
                    if ($m->sub_theme_id > 0) {
                        return $m->subTheme->name;
                    } else {
                        return null;
                    }
                },
                'filter'=> Html::activeDropDownList($searchModel, 'sub_theme_id', $FiltersSubThemes,['class'=>'form-control','prompt' => '']),
                'format' => 'raw',
            ],
            [
                'attribute' => 'tech_id',
                'value' => function ($m) {
                    if ($m->tech_id > 0) {
                        return $m->technology->name;
                    } else {
                        return null;
                    }
                },
                'filter'=> Html::activeDropDownList($searchModel, 'tech_id', $FiltersTechnologies,['class'=>'form-control','prompt' => '']),
                'format' => 'raw',
            ],
            [
                'attribute' => 'operation_id',
                'value' => function ($m) {
                    if ($m->operation_id > 0) {
                        return $m->operation->name;
                    } else {
                        return null;
                    }
                },
                'filter'=> Html::activeDropDownList($searchModel, 'operation_id', $FiltersOperations,['class'=>'form-control','prompt' => '']),
                'format' => 'raw',
            ],
            [
                'attribute' => 'equipment_type_id',
                'value' => function ($m) {
                    if ($m->equipment_type_id > 0) {
                        return $m->eType->name;
                    } else {
                        return null;
                    }
                },
                'filter'=> Html::activeDropDownList($searchModel, 'equipment_type_id', $FiltersEquipmentType,['class'=>'form-control','prompt' => '']),
                'format' => 'raw',
            ],
            [
                'attribute' => 'equipment_manufacturer_id',
                'value' => function ($m) {
                    if ($m->equipment_manufacturer_id > 0) {
                        return $m->eManufacturer->name;
                    } else {
                        return null;
                    }
                },
                'filter'=> Html::activeDropDownList($searchModel, 'equipment_manufacturer_id', $FiltersEquipmentManufacturer,['class'=>'form-control','prompt' => '']),
                'format' => 'raw',
            ],

            [
                'attribute' => 'status',
                'value' => function ($m) {
                    return $m->status > 0 ? '<span class="label label-success">Активный</span>' : '<span class="label label-danger">Не активный</span>';
                },
                'format'=> 'raw',
                'filter'=> Html::activeDropDownList($searchModel, 'status', [1 => 'Активный', 0 => 'Не активный'],['class'=>'form-control','prompt' => '']),
            ],
            [
                'attribute' => 'created_at',
                'value' => function ($m) {
                    $dt = date('d.m.Y H:i', strtotime($m->created_at));
                    return $dt;
                },
            ],
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
