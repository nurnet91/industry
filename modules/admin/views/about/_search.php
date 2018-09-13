<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchAbout */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="about-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'photo') ?>

    <?= $form->field($model, 'text_ru') ?>

    <?= $form->field($model, 'text_en') ?>

    <?= $form->field($model, 'text_ua') ?>

    <?php // echo $form->field($model, 'link') ?>

    <?php // echo $form->field($model, 'author_ru') ?>

    <?php // echo $form->field($model, 'author_en') ?>

    <?php // echo $form->field($model, 'author_ua') ?>

    <?php // echo $form->field($model, 'dolz_ru') ?>

    <?php // echo $form->field($model, 'dolz_en') ?>

    <?php // echo $form->field($model, 'dolz_ua') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
