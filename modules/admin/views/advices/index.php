<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchAdvices */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Advices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advices-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Advices', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title_ru',
            'text_ru:ntext',
            [
                'attribute' => 'created_at',
                'value' => function ($m) {
                    $dt = date('d.m.Y H:i', strtotime($m->created_at));
                    return $dt;
                },
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
