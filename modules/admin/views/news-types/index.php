<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsTypesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-types-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create News Types', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name_ru',
            'name_ua',
            'name_en',
            'position',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
