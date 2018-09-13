<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Reviews';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="reviews-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Reviews', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'author_photo',
                'value' => function ($m) {
                    if(!empty($m->author_photo)){
                        return '<img src="/'.$m->author_photo.'" height="50">';
                    } else {
                        return "";
                    }
                },
                'format' => 'raw',
            ],
            'id',
            'author_ru',
            'author_desc_ru',
            'review_text_ru:ntext',
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
//            'author_en',
//            'author_ua',
            //'review_text_en:ntext',
            //'review_text_ua:ntext',

            //'author_desc_en',
            //'author_desc_ua',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
