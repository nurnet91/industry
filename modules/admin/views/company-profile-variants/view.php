<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Company Profile Variants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="company-profiles-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'industries_count',
            'services_count',
            'photos_count',
            'videos_count',
            'photo_video_size',
            'show_priority',
            'on_reviews',
            'special_share',
            'extra_sections_ch_n',
            'extra_sections_sh_r_c',
            'tenders_notification',
            'statistics',
            'update_info',
            'vacancy_deploy',
            'equipment_deploy',
            'on_tenders',
            'price',
            'promo_price',
            'created_at',
            'updated_at',
            'status',
        ],
    ]) ?>

</div>
