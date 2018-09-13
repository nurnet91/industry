<?php

use app\models\Mailer;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mailer */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mailers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mailer-view">

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
            [
                'attribute' => 'user_id',
                'value' => function ($m) {
                    if ($m->user_id > 0) {
                        if($m->user_type == Mailer::SUBSCRIBER){
                            return $m->subscribers->name;
                        }else{
                            return $m->users->username;
                        }
                    } else {
                        return '';
                    }
                },
                'format' => 'raw',
            ],
            'created_at',
            'updated_at',
            'status',
            'user_group_id',
        ],
    ]) ?>

</div>
