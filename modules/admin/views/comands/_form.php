<?php

use app\widgets\LangTabs;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="comands-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <br>

    <?=LangTabs::widget([
        'w_id' => 'NavTabs',
        'form' => $form,
        'model' => $model,
        'methods' => [
            ['attribute' => 'fio_',         'input' => 'textInput',   'inputOptions' => ['maxlength' => true]],
            ['attribute' => 'occupation_',  'input' => 'textInput',   'inputOptions' => ['maxlength' => true]],
            ['attribute' => 'education_',   'input' => 'textInput',   'inputOptions' => ['maxlength' => true]],
            ['attribute' => 'regalia_',     'input' => 'textInput',   'inputOptions' => ['maxlength' => true]],
            ['attribute' => 'experience_',  'input' => 'textInput',   'inputOptions' => ['maxlength' => true]],
            ['attribute' => 'info_',        'input' => 'textarea',    'inputOptions' => ['rows' => 6]],
        ],
    ]) ?>

    <?//= $form->field($model, 'fio_ru')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'fio_en')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'fio_ua')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'occupation_ru')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'occupation_en')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'occupation_ua')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'education_ru')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'education_en')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'education_ua')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'regalia_ru')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'regalia_en')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'regalia_ua')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'experience_ru')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'experience_en')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'experience_ua')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'info_ru')->textarea(['rows' => 6]) ?>

    <?//= $form->field($model, 'info_en')->textarea(['rows' => 6]) ?>

    <?//= $form->field($model, 'info_ua')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
