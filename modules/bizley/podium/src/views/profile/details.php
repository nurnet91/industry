<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */

use app\modules\bizley\podium\src\Podium;
use app\modules\bizley\podium\src\widgets\Avatar;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = t( 'Account Details');
$this->params['breadcrumbs'][] = ['label' => t( 'My Profile'), 'url' => ['profile/index']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs("$('[data-toggle=\"popover\"]').popover();");
$this->registerJs("$('#show-email').click(function (e) { e.preventDefault(); $('#details-email').removeClass('hide'); $('#user-new_email').prop('disabled', false); $(this).addClass('hide'); });");
if (Podium::getInstance()->userComponent === true) {
    $this->registerJs("$('#show-password').click(function (e) { e.preventDefault(); $('#details-password').removeClass('hide'); $('#user-newPassword').prop('disabled', false); $('#user-newPasswordRepeat').prop('disabled', false); $(this).addClass('hide'); });");
}

?>
<div class="row">
    <div class="col-md-3 col-sm-4">
        <?= $this->render('/elements/profile/_navbar', ['active' => 'details']) ?>
    </div>
    <div class="col-md-6 col-sm-8">
        <div class="panel panel-default">
            <?php $form = ActiveForm::begin(['id' => 'details-form']); ?>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'username')->textInput([
                                'data-container' => 'body',
                                'data-toggle' => 'popover',
                                'data-placement' => 'right',
                                'data-content' => t( 'Username must start with a letter, contain only letters, digits and underscores, and be at least 3 characters long.'),
                                'data-trigger' => 'focus'
                            ])->label(t( 'Username')) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <button class="btn btn-warning btn-block <?= !empty($model->new_email) ? 'hide' : '' ?>" id="show-email"><span class="glyphicon glyphicon-envelope"></span> <?= t( 'Change e-mail address') ?></button>
                            </div>
                        </div>
<?php if (Podium::getInstance()->userComponent === true): ?>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <button class="btn btn-warning btn-block <?= !empty($model->newPassword) ? 'hide' : '' ?>" id="show-password"><span class="glyphicon glyphicon-lock"></span> <?= t( 'Change password') ?></button>
                            </div>
                        </div>
<?php endif; ?>
                    </div>
                    <div class="row <?= empty($model->new_email) ? 'hide' : '' ?>" id="details-email">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'new_email')->textInput([
                                'placeholder'    => t( "Leave empty if you don't want to change it"),
                                'data-container' => 'body',
                                'data-toggle'    => 'popover',
                                'data-placement' => 'right',
                                'data-content'   => t( 'New e-mail has to be activated first. Activation link will be sent to the new address.'),
                                'data-trigger'   => 'focus',
                                'autocomplete'   => 'off',
                                'disabled'       => empty($model->new_email) ? true : false
                            ])->label(t( 'New Podium e-mail')) ?>
                        </div>
                    </div>
<?php if (Podium::getInstance()->userComponent === true): ?>
                    <div id="details-password" class="<?= empty($model->newPassword) ? 'hide' : '' ?>">
                        <div class="row">
                            <div class="col-sm-12">
                                <?= $form->field($model, 'newPassword')->passwordInput([
                                    'placeholder'    => t( "Leave empty if you don't want to change it"),
                                    'data-container' => 'body',
                                    'data-toggle'    => 'popover',
                                    'data-placement' => 'right',
                                    'data-content'   => t( 'Password must contain uppercase and lowercase letter, digit, and be at least 6 characters long.'),
                                    'data-trigger'   => 'focus',
                                    'autocomplete'   => 'off',
                                    'disabled'       => empty($model->newPassword) ? true : false
                                ])->label(t( 'New password')) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <?= $form->field($model, 'newPasswordRepeat')->passwordInput([
                                        'autocomplete' => 'off',
                                        'placeholder'  => t( "Leave empty if you don't want to change it"),
                                        'disabled'     => empty($model->newPassword) ? true : false
                                    ])->label(t( 'Repeat new password')) ?>
                            </div>
                        </div>
                    </div>
<?php endif; ?>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'currentPassword')->passwordInput(['autocomplete' => 'off'])->label(t( 'Current password')) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= Html::submitButton('<span class="glyphicon glyphicon-ok-sign"></span> ' . t( 'Save changes'), ['class' => 'btn btn-block btn-primary', 'name' => 'save-button']) ?>
                        </div>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <div class="col-md-3 hidden-sm hidden-xs">
        <?= Avatar::widget([
            'author' => $model,
            'showName' => false
        ]) ?>
    </div>
</div><br>
