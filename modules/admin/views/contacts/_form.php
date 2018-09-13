<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="contacts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emailes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lat')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'lon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
