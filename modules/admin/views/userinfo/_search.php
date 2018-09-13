<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchUserinfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="userinfo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'first_name') ?>

    <?= $form->field($model, 'last_name') ?>

    <?= $form->field($model, 'middle_name') ?>

    <?php // echo $form->field($model, 'b_date') ?>

    <?php // echo $form->field($model, 'referal_id') ?>

    <?php // echo $form->field($model, 'company') ?>

    <?php // echo $form->field($model, 'position') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'info_inform') ?>

    <?php // echo $form->field($model, 'info_special') ?>

    <?php // echo $form->field($model, 'info_offer') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'skype') ?>

    <?php // echo $form->field($model, 'site_company') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'photo') ?>

    <?php // echo $form->field($model, 'repost') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
