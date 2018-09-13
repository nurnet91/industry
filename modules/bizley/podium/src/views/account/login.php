<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = t( 'Sign in');
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs("$('[data-toggle=\"tooltip\"]').tooltip();");

?>
<div class="row">
    <div class="col-sm-4 col-sm-offset-4">
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <div class="form-group">
                <?= $form->field($model, 'username')->textInput(['placeholder' => t( 'Username or E-mail'), 'autofocus' => true])->label(false) ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'password')->passwordInput(['placeholder' => t( 'Password')])->label(false) ?>
            </div>
            <div class="form-group text-center">
                <?= $form->field($model, 'rememberMe')->checkBox()->label(null, ['data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => t( "Don't use this option on public computers!")]) ?>
            </div>
            <div class="form-group">
                <?= Html::submitButton('<span class="glyphicon glyphicon-ok-sign"></span> ' . t( 'Sign in'), ['class' => 'btn btn-block btn-primary', 'name' => 'login-button']) ?>
            </div>
            <div class="form-group">
                <a href="<?= Url::to(['account/reset']) ?>" class="pull-right"><?= t( 'Reset Password') ?></a>
                <a href="<?= Url::to(['account/reactivate']) ?>" class="pull-left"><?= t( 'Resend activation link') ?></a>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div><br>
