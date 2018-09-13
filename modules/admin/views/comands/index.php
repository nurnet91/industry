<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Comands';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="comands-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Comands', ['create'], ['class' => 'btn btn-success']) ?>
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
            'fio_ru',
            'occupation_ru',
            'education_ru',
            'regalia_ru',
            'experience_ru',
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
            // 'fio_en',
            // 'fio_ua',
            //'occupation_en',
            //'occupation_ua',
            //'education_en',
            //'education_ua',
            // 'regalia_en',
            //'regalia_ua',
            //'experience_en',
            //'experience_ua',
            //'info_ru:ntext',
            //'info_en:ntext',
            //'info_ua:ntext',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
