<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="categories-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <p>
        <?= Html::a('Create Categories', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'img',
                'header' => 'Image',
                'value' => function ($m) {
                    if(!empty($m->img)){
                        return '<img src="/'.$m->img.'" height="20">';
                    } else {
                        return "";
                    }
                },
                'format' => 'raw',
            ],
            'id',
            [
                'attribute' => 'parent_id',
                'value' => function ($m) {
                    if ($m->parent_id > 0) {
                        return $m->parent->name_ru;
                    } else {
                        return '';
                    }
                },
                'filter'=> Html::activeDropDownList($searchModel, 'parent_id', $mod,['class'=>'form-control','prompt' => '']),
                'format' => 'raw',
            ],
            'name_ru',
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
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
