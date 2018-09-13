<?php

use app\widgets\LangTabs;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="new-promotions-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'category_id')->dropDownlist($mainCats, ['prompt' => 'Select category']) ?>

    <br>

    <?=LangTabs::widget([
        'w_id' => 'NavTabs',
        'form' => $form,
        'model' => $model,
        'methods' => [
            ['attribute' => 'title_',   'fieldOptions' => [], 'input' => 'textInput',   'inputOptions' => ['maxlength' => true]],
            ['attribute' => 'text_',    'fieldOptions' => [], 'input' => 'textarea',    'inputOptions' => ['rows' => 6]],
        ],
    ]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
