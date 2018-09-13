<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="company-profiles-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'industries_count') ?>

    <?= $form->field($model, 'services_count') ?>

    <?= $form->field($model, 'photos_count') ?>

    <?php // echo $form->field($model, 'videos_count') ?>

    <?php // echo $form->field($model, 'photo_video_size') ?>

    <?php // echo $form->field($model, 'show_priority') ?>

    <?php // echo $form->field($model, 'on_reviews') ?>

    <?php // echo $form->field($model, 'special_share') ?>

    <?php // echo $form->field($model, 'extra_sections_ch_n') ?>

    <?php // echo $form->field($model, 'extra_sections_sh_r_c') ?>

    <?php // echo $form->field($model, 'tenders_notification') ?>

    <?php // echo $form->field($model, 'statistics') ?>

    <?php // echo $form->field($model, 'update_info') ?>

    <?php // echo $form->field($model, 'vacancy_deploy') ?>

    <?php // echo $form->field($model, 'equipment_deploy') ?>

    <?php // echo $form->field($model, 'on_tenders') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'promo_price') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
