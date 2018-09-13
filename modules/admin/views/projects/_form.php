<?php

use app\widgets\LangTabs;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="projects-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <br>

    <?=LangTabs::widget([
        'w_id' => 'NavTabs',
        'form' => $form,
        'model' => $model,
        'methods' => [
            ['attribute' => 'title_',       'input' => 'textInput', 'inputOptions' => ['maxlength' => true]],
            ['attribute' => 'duration_',    'input' => 'textInput', 'inputOptions' => ['maxlength' => true]],
            ['attribute' => 'language_',    'input' => 'textInput', 'inputOptions' => ['maxlength' => true]],
            ['attribute' => 'info_',        'input' => 'textarea',  'inputOptions' => ['rows' => 6]],
        ],
    ]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
