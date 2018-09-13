<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'New News';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="new-news-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p> <?= Html::a('Create New News', ['create'], ['class' => 'btn btn-success']) ?> </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'photo',
                'header' => 'Image',
                'value' => function ($m) {
                    if(!empty($m->photo)){
                        return '<img src="/'.$m->photo.'" height="20">';
                    } else {
                        return "";
                    }
                },
                'format' => 'raw',
            ],
            'id',
            'category_id',
            'type',
            'title_ru',
            'link',
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
            //'title_en',
            //'title_ua',
            //'short_text_ru:ntext',
            //'short_text_en:ntext',
            //'short_text_ua:ntext',
            //'text_ru:ntext',
            //'text_en:ntext',
            //'text_ua:ntext',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
