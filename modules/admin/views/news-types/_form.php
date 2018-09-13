<?php

use app\widgets\LangTabs;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NewsTypes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-types-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=LangTabs::widget([
        'w_id' => 'NavTabs',
        'form' => $form,
        'model' => $model,
        'methods' => [
            ['attribute' => 'name_',       'input' => 'textInput', 'inputOptions' => ['maxlength' => true]],
        ],
    ]) ?>

    <?= $form->field($model, 'position')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
