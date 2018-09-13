<?php

use app\models\Mailer;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mailer */

$this->title = 'Update Mailer: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mailers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mailer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'users' => $users,
        'subscribers' => $subscribers,
        'user_groups' => Mailer::types(),
        'userModel' => $userModel,
        'categories' => $categories
    ]) ?>

</div>
