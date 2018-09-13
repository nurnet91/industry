<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mailer */

$this->title = 'Create Mailer';
$this->params['breadcrumbs'][] = ['label' => 'Mailers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mailer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'users' => $users,
        'user_groups' => $user_groups
    ]) ?>

</div>
