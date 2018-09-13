<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchReviews */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reviews-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'author_ru') ?>

    <?= $form->field($model, 'author_en') ?>

    <?= $form->field($model, 'author_ua') ?>

    <?= $form->field($model, 'review_text_ru') ?>

    <?php // echo $form->field($model, 'review_text_en') ?>

    <?php // echo $form->field($model, 'review_text_ua') ?>

    <?php // echo $form->field($model, 'author_desc_ru') ?>

    <?php // echo $form->field($model, 'author_desc_en') ?>

    <?php // echo $form->field($model, 'author_desc_ua') ?>

    <?php // echo $form->field($model, 'author_photo') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
