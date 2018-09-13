<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Subscribers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subscribers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'info_inform')->checkbox() ?>

    <?= $form->field($model, 'info_special')->checkbox() ?>

    <?= $form->field($model, 'info_offer')->checkbox() ?>


    <?php foreach ($categories as $category): ?>
        <?php if(!empty($category->subs2)): ?>
            <p><?=  $category->name ?></p>

            <?php $model->category_ids = explode(',', $model->category_ids) ?>
            <?= $form->field($model, 'category_ids')->checkboxList($category->subs2, ['separator' => '<br>'])->label(false); ?>
        <?php endif; ?>
    <?php endforeach; ?>

            <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
