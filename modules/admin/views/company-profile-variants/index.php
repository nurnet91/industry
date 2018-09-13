<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Company Profile Variants';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="company-profiles-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Company Profile Variant', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'profile_icon',
                'value' => function ($m) {
                    if(!empty($m->profile_icon)){
                        return '<img src="/'.$m->profile_icon.'" height="40">';
                    } else {
                        return "";
                    }
                },
                'format' => 'raw',
            ],
            'id',
            'name',
            'price',
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
//            'industries_count',
//            'services_count',
//            'photos_count',
            //'videos_count',
            //'photo_video_size',
            //'show_priority',
            //'on_reviews',
            //'special_share',
            //'extra_sections_ch_n',
            //'extra_sections_sh_r_c',
            //'tenders_notification',
            //'statistics',
            //'update_info',
            //'vacancy_deploy',
            //'equipment_deploy',
            //'on_tenders',
            //'promo_price',
            //'updated_at',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
