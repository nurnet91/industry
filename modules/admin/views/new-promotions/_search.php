<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchNewPromotions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="new-promotions-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'photo') ?>

    <?= $form->field($model, 'title_ru') ?>

    <?= $form->field($model, 'title_ua') ?>

    <?= $form->field($model, 'title_en') ?>

    <?php // echo $form->field($model, 'text_ru') ?>

    <?php // echo $form->field($model, 'text_en') ?>

    <?php // echo $form->field($model, 'text_ua') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
