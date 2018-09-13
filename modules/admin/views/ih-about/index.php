<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchIhAbout */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ih Abouts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ih-about-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php if(!$model): ?>
    <p>
        <?= Html::a('Create Ih About', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php endif; ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
