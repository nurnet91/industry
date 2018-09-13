<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchProjects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projects-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'photo') ?>

    <?= $form->field($model, 'title_ru') ?>

    <?= $form->field($model, 'title_en') ?>

    <?= $form->field($model, 'title_ua') ?>

    <?php // echo $form->field($model, 'link') ?>

    <?php // echo $form->field($model, 'duration_ru') ?>

    <?php // echo $form->field($model, 'duration_en') ?>

    <?php // echo $form->field($model, 'duration_ua') ?>

    <?php // echo $form->field($model, 'language_ru') ?>

    <?php // echo $form->field($model, 'language_en') ?>

    <?php // echo $form->field($model, 'language_ua') ?>

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
