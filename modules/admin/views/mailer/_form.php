<?php

use app\models\Mailer;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
//dd($users)
/* @var $this yii\web\View */
/* @var $model app\models\Mailer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">

    <?php $form = ActiveForm::begin(); ?>
<!--    --><?//= $form->field($model, 'user_id')->textInput(['readOnly'=> true, 'value' =>  ]) ?>

    <?= (($model->user_type == Mailer::USER) ? $users[$model->user_id] : $subscribers[$model->user_id]) ?>

    <?= $form->field($userModel, 'info_inform')->checkbox() ?>

    <?= $form->field($userModel, 'info_special')->checkbox() ?>

    <?= $form->field($userModel, 'info_offer')->checkbox() ?>

    <?php foreach ($categories as $category): ?>
        <?php if(!empty($category->subs2)): ?>
            <p><?=  $category->name ?></p>

            <?php $userModel->category_ids = explode(',', $userModel->category_ids) ?>
            <?= $form->field($userModel, 'category_ids')->checkboxList($category->subs2, ['separator' => '<br>'])->label(false); ?>
        <?php endif; ?>
    <?php endforeach; ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
