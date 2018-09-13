<?php

use app\widgets\LangTabs;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="new-news-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'category_id')->dropDownlist($mainCats, ['prompt' => 'Select category']) ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <br>

    <?=LangTabs::widget([
        'w_id' => 'NavTabs',
        'form' => $form,
        'model' => $model,
        'methods' => [
            ['attribute' => 'title_',       'input' => 'textInput', 'inputOptions' => ['maxlength' => true]],
            ['attribute' => 'short_text_',  'input' => 'textarea',  'inputOptions' => ['rows' => 6]],
            ['attribute' => 'text_',        'input' => 'textarea',  'inputOptions' => ['rows' => 6]],
        ],
    ]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
