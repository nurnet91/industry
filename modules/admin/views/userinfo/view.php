<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Userinfo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Userinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userinfo-view">

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
            'user_id',
            'first_name',
            'last_name',
            'middle_name',
            'b_date',
            'referal_id',
            'company',
            'position',
            'created_at',
            'updated_at',
            'info_inform',
            'info_special',
            'info_offer',
            'phone',
            'skype',
            'site_company',
            'sex',
            'photo',
            'repost',
        ],
    ]) ?>

</div>
