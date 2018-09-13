<?php

use app\models\Messages;
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Messages';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="messages-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Messages', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'user_id',
                'value' => function ($m) {
                    if (!empty($m->user)) {
                        return $m->user->username;
                    } else {
                        return '';
                    }
                },
            ],
            'title',
            'text:ntext',
            // [
            //     'attribute' => 'type',
            //     'value' => function ($m) {
            //         return Messages::TYPES[$m->type];
            //     },
            //     'filter' => Html::activeDropDownList($searchModel, 'type', Messages::TYPES, ['class' => 'form-control', 'prompt' => '']),
            // ],
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
            // [
            //     'class' => 'yii\grid\ActionColumn',
            //     'template' => '{view}&nbsp;&nbsp;{update}&nbsp;&nbsp;{delete}&nbsp;&nbsp;{send}',
            //     'buttons' => [
            //         'send' => function ($url, $model, $key) {
            //             return Html::a('<span class="glyphicon glyphicon-envelope"></span>', ['messages/send', 'id' => $model->id], ['title' => 'Отправить', 'aria-label' => 'Отправить', 'data-pjax' => '0']);
            //         },
            //     ]
            // ],
        ],
    ]); ?>
</div>
