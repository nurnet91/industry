<?php

use app\models\Mailer;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MailerSubscribers */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mailers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mailer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>-->
<!--        --><?//= Html::a('Create Mailer', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            [
                'attribute' => 'user_id',
                'value' => function ($m) {
                    if ($m->user_id > 0) {
                        if($m->user_type == Mailer::SUBSCRIBER){
                            return $m->subscribers->email;
                        }else{
                            return $m->users->email;
                        }
                    } else {
                        return '';
                    }
                },
                'filter'=> Html::activeDropDownList($searchModel, 'user_id', $users,['class'=>'form-control','prompt' => '']),
                'format' => 'raw',
            ],

            [
                'attribute' => 'created_at',
                'value' => function ($m) {
                    $dt = date('d.m.Y H:i', strtotime($m->created_at));
                    return $dt;
                },
            ],
            [
                'attribute' => 'user_group_id',
                'value' => function ($m) {
                    $group_id = Mailer::byType($m->user_group_id);
                    return $group_id;
                },
                'filter' => Html::activeDropDownList($searchModel, 'user_group_id', Mailer::types(), ['class'=>'form-control', 'prompt' => '']),
            ],
            [
                'attribute' => 'status',
                'value' => function ($m) {
                    return $m->status > 0 ? '<span class="label label-success">Активный</span>' : '<span class="label label-danger">Не активный</span>';
                },
                'format'=> 'raw',
                'filter'=> Html::activeDropDownList($searchModel, 'status', [1 => 'Активный', 0 => 'Не активный'],['class'=>'form-control','prompt' => '']),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
