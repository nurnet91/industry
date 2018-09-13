<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="company-profiles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'industries_count')->textInput() ?>

    <?= $form->field($model, 'services_count')->textInput() ?>

    <?= $form->field($model, 'photos_count')->textInput() ?>

    <?= $form->field($model, 'videos_count')->textInput() ?>

    <?= $form->field($model, 'photo_video_size')->textInput() ?>

    <?= $form->field($model, 'show_priority')->textInput() ?>

    <?= $form->field($model, 'on_reviews')->checkbox() ?>

    <?= $form->field($model, 'special_share')->checkbox() ?>

    <?= $form->field($model, 'extra_sections_ch_n')->checkbox() ?>

    <?= $form->field($model, 'extra_sections_sh_r_c')->checkbox() ?>

    <?= $form->field($model, 'tenders_notification')->checkbox() ?>

    <?= $form->field($model, 'statistics')->checkbox() ?>

    <?= $form->field($model, 'update_info')->checkbox() ?>

    <?= $form->field($model, 'vacancy_deploy')->checkbox() ?>

    <?= $form->field($model, 'equipment_deploy')->checkbox() ?>

    <?= $form->field($model, 'on_tenders')->checkbox() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'promo_price')->textInput() ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
