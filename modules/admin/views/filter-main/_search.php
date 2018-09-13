<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchFilterMainEquipment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="filter-main-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'direction_id') ?>

    <?= $form->field($model, 'theme_id') ?>

    <?= $form->field($model, 'theme_attr_id') ?>

    <?= $form->field($model, 'sub_theme_id') ?>

    <?= $form->field($model, 'tech_id') ?>

    <?php // echo $form->field($model, 'operation_id') ?>

    <?php // echo $form->field($model, 'equipment_type_id') ?>

    <?php // echo $form->field($model, 'equipment_manufacturer_id') ?>

    <?php // echo $form->field($model, 'attributes_id') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
