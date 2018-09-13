<?php

use app\components\NFormat;
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Abouts';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="about-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create About', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'photo',
                'value' => function ($m) {
                    if(!empty($m->photo)){
                        return '<img src="/'.$m->photo.'" height="50">';
                    } else {
                        return "";
                    }
                },
                'format' => 'raw',
            ],
            'id',
            'link',
            'author_ru',
            'dolz_ru',
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
            [
                'attribute' => 'norder',
                'format'=> 'raw',
                'filter'=> Html::activeDropDownList($searchModel, 'norder', NFormat::orderList(),['class'=>'form-control','prompt' => '']),
            ],
            // 'text_ru:ntext',
            //'author_en',
            //'author_ua',
            //'dolz_en',
            //'dolz_ua',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
