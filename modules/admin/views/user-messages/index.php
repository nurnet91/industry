<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'User Messages';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="user-messages-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'user_id',
                'value' => function ($m) {
                    return $m->user->email;
                }
            ],
            [
                'attribute' => 'message_id',
                'value' => function ($m) {
                    return $m->message->title;
                }
            ],
            'created_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{user}&nbsp;&nbsp;{message}&nbsp;&nbsp;{delete}',
                'buttons' => [
                    'user' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-user"></span>', ['users/index', 'SearchUsers[id]' => $model->user_id], ['title' => 'User', 'aria-label' => 'User', 'data-pjax' => '0']);
                    },
                    'message' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-envelope"></span>', ['messages/index', 'SearchMessages[id]' => $model->message_id], ['title' => 'Message', 'aria-label' => 'Message', 'data-pjax' => '0']);
                    }
                ]
            ],
        ],
    ]); ?>
</div>
