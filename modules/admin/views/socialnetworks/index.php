<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Social Networks';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="social-networks-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Html::a('Create Social Networks', ['create'], ['class' => 'btn btn-success']) ?></p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'social_icon',
                'value' => function ($m) {
                    if(!empty($m->social_icon)){
                        return '<div class="social_icon"><img src="/'.$m->social_icon.'" height="30"/></div>';
                    } else {
                        return "";
                    }
                },
                'format' => 'raw',
            ],
            'name',
            'url:url',
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
            'norder',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
