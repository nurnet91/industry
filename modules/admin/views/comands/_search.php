<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchComands */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comands-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'photo') ?>

    <?= $form->field($model, 'fio_ru') ?>

    <?= $form->field($model, 'fio_en') ?>

    <?= $form->field($model, 'fio_ua') ?>

    <?php // echo $form->field($model, 'occupation_ru') ?>

    <?php // echo $form->field($model, 'occupation_en') ?>

    <?php // echo $form->field($model, 'occupation_ua') ?>

    <?php // echo $form->field($model, 'education_ru') ?>

    <?php // echo $form->field($model, 'education_en') ?>

    <?php // echo $form->field($model, 'education_ua') ?>

    <?php // echo $form->field($model, 'regalia_ru') ?>

    <?php // echo $form->field($model, 'regalia_en') ?>

    <?php // echo $form->field($model, 'regalia_ua') ?>

    <?php // echo $form->field($model, 'experience_ru') ?>

    <?php // echo $form->field($model, 'experience_en') ?>

    <?php // echo $form->field($model, 'experience_ua') ?>

    <?php // echo $form->field($model, 'info_ru') ?>

    <?php // echo $form->field($model, 'info_en') ?>

    <?php // echo $form->field($model, 'info_ua') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
