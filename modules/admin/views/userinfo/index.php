<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchUserinfo */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Userinfos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userinfo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Userinfo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'first_name',
            'last_name',
            'middle_name',
            //'b_date',
            //'referal_id',
            //'company',
            //'position',
            //'created_at',
            //'updated_at',
            //'info_inform',
            //'info_special',
            //'info_offer',
            //'phone',
            //'skype',
            //'site_company',
            //'sex',
            //'photo',
            //'repost',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
