<?php

use app\models\Reviews;
use app\widgets\LangTabs;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>


<div class="reviews-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?=LangTabs::widget([
        'w_id' => 'NavTabs',
        'form' => $form,
        'model' => $model,
        'methods' => [
            ['attribute' => 'author_', 'fieldOptions' => [], 'input' => 'textInput', 'inputOptions' => ['maxlength' => true]],
            ['attribute' => 'author_desc_', 'fieldOptions' => [], 'input' => 'textarea'],
            ['attribute' => 'review_text_', 'fieldOptions' => [], 'input' => 'textarea', 'inputOptions' => ['rows' => 6]],
        ],
    ]) ?>
    
    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'position')->dropDownlist(Reviews::positions()) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>