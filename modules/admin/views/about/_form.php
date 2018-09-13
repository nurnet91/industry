<?php

use app\components\NFormat;
use app\widgets\LangTabs;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="about-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <br>

    <?=LangTabs::widget([
        'w_id' => 'NavTabs',
        'form' => $form,
        'model' => $model,
        'methods' => [
            ['attribute' => 'text_', 'fieldOptions' => [], 'input' => 'textarea', 'inputOptions' => ['rows' => 6]],
            ['attribute' => 'author_', 'fieldOptions' => [], 'input' => 'textInput', 'inputOptions' => ['maxlength' => true]],
            ['attribute' => 'dolz_', 'fieldOptions' => [], 'input' => 'textInput', 'inputOptions' => ['maxlength' => true]],
        ],
    ]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <?= $form->field($model, 'norder')->dropDownlist(NFormat::orderList()) ?>

    <div class="form-group">

        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
