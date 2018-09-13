<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="referals-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_ua')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">

        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        
    </div>

    <?php ActiveForm::end(); ?>

</div>
