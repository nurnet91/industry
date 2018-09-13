<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = t( 'Podium Settings');
$this->params['breadcrumbs'][] = ['label' => t( 'Administration Dashboard'), 'url' => ['admin/index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<?= $this->render('/elements/admin/_navbar', ['active' => 'settings']); ?>
<br>
<div class="row">
    <div class="col-md-3 col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= t( 'Settings Index') ?></h3>
            </div>
            <div class="list-group">
                <a href="#maintenance" class="list-group-item"><?= t( 'Maintenance mode') ?></a>
                <a href="#meta" class="list-group-item"><?= t( 'Meta data') ?></a>
                <a href="#register" class="list-group-item"><?= t( 'Registration') ?></a>
                <a href="#posts" class="list-group-item"><?= t( 'Posts') ?></a>
                <a href="#guests" class="list-group-item"><?= t( 'Guests privileges') ?></a>
                <a href="#emails" class="list-group-item"><?= t( 'E-mails') ?></a>
                <a href="#tokens" class="list-group-item"><?= t( 'Tokens') ?></a>
                <a href="#db" class="list-group-item"><?= t( 'Database') ?></a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-8">
        <div class="panel panel-default">
            <?php $form = ActiveForm::begin(['id' => 'settings-form']); ?>
                <div class="panel-heading">
                    <h3 class="panel-title"><?= t( 'Podium Settings') ?></h3>
                </div>
                <div class="panel-body">
                    <p><?= t( 'Leave setting empty if you want to restore the default Podium value.') ?></p>
                    <h3 id="maintenance"><span class="label label-primary"><?= t( 'Maintenance mode') ?></span></h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'maintenance_mode')->checkBox()->label(t( 'Set forum to Maintenance mode'))
                                ->hint(t( 'All users without Administrator privileges will be redirected to {maintenancePage}.', ['maintenancePage' => Html::a(t( 'Maintenance page'), ['forum/maintenance'])])) ?>
                        </div>
                    </div>
                    <h3 id="meta"><span class="label label-primary"><?= t( 'Meta data') ?></span></h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'name')->textInput()->label(t( "Forum's Name")) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'meta_keywords')->textInput()->label(t( 'Global meta keywords')) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'meta_description')->textInput()->label(t( 'Global meta description')) ?>
                        </div>
                    </div>
                    <h3 id="register"><span class="label label-primary"><?= t( 'Registration') ?></span></h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'registration_off')->checkBox()->label(t( 'Switch registration off'))
                                ->hint(t( 'New users registration will not be available. This setting is ignored in case of running Podium with Inherited User Identity.')) ?>
                        </div>
                        <div class="col-sm-12">
                            <?= $form->field($model, 'use_captcha')->checkBox()->label(t( 'Add captcha in registration form')) ?>
                        </div>
                        <div class="col-sm-12">
                            <?= $form->field($model, 'recaptcha_sitekey')->textInput()->label(t( 'Use reCAPTCHA instead of standard Captcha - Enter Site Key')) ?>
                        </div>
                        <div class="col-sm-12">
                            <?= $form->field($model, 'recaptcha_secretkey')->textInput()->label(t( 'Use reCAPTCHA instead of standard Captcha - Enter Secret Key')) ?>
                        </div>
                        <div class="col-sm-12">
                            <?= t( '{Click here} to register your site and get reCAPTCHA keys.', ['Click here' => Html::a(t( 'Click here'), 'https://www.google.com/recaptcha/admin', ['target' => '_blank'])]) ?>
                        </div>
                    </div>
                    <h3 id="posts"><span class="label label-primary"><?= t( 'Posts') ?></span></h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'hot_minimum')->textInput()->label(t( 'Minimum number of posts for thread to become Hot')) ?>
                        </div>
                        <div class="col-sm-12">
                            <?= $form->field($model, 'merge_posts')->checkBox()->label(t( 'Merge reply with post in case of the same author')) ?>
                        </div>
                        <div class="col-sm-12">
                            <?= $form->field($model, 'allow_polls')->checkBox()->label(t( 'Allow polls adding')) ?>
                        </div>
                        <div class="col-sm-12">
                            <?= $form->field($model, 'use_wysiwyg')->checkBox()->label(t( 'Use WYSIWYG editor'))
                                ->hint(t( '{WYSIWYG} stands for What You See Is What You Get and Podium uses {Quill} for this way of posting. If you would like to switch it off {CodeMirror} in {Markdown} mode will be used instead.', [
                                    'WYSIWYG' => Html::a('WYSIWYG', 'https://en.wikipedia.org/wiki/WYSIWYG'),
                                    'Quill' => Html::a('Quill', 'https://quilljs.com'),
                                    'CodeMirror' => Html::a('CodeMirror', 'https://codemirror.net'),
                                    'Markdown' => Html::a('Markdown', 'https://en.wikipedia.org/wiki/Markdown')
                                ])) ?>
                        </div>
                    </div>
                    <h3 id="guests"><span class="label label-primary"><?= t( 'Guests privileges') ?></span></h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'members_visible')->checkBox()->label(t( 'Allow guests to list members')) ?>
                        </div>
                    </div>
                    <h3 id="emails"><span class="label label-primary"><?= t( 'E-mails') ?></span></h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'from_email')->textInput()->label(t( 'Podium "From" email address')) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'from_name')->textInput()->label(t( 'Podium "From" email name')) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'max_attempts')->textInput()->label(t( 'Maximum number of email sending attempts before giving up')) ?>
                        </div>
                    </div>
                    <h3 id="tokens"><span class="label label-primary"><?= t( 'Tokens') ?></span></h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'password_reset_token_expire')->textInput()->label(t( 'Number of seconds for the Password Reset Token to expire')) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'email_token_expire')->textInput()->label(t( 'Number of seconds for the Email Change Token to expire')) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'activation_token_expire')->textInput()->label(t( 'Number of seconds for the Account Activation Token to expire')) ?>
                        </div>
                    </div>
                    <h3 id="db"><span class="label label-primary"><?= t( 'Database') ?></span></h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'version')->textInput(['readonly' => true])->label(t( 'Database version (read only)')) ?>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <?= Html::submitButton('<span class="glyphicon glyphicon-ok-sign"></span> ' . t( 'Save Settings'), ['class' => 'btn btn-block btn-primary', 'name' => 'save-button']) ?>
                        </div>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <div class="col-md-3 col-sm-8 col-sm-offset-4 col-md-offset-0">
        <a href="<?= Url::to(['admin/clear']) ?>" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-alert"></span> <?= t( 'Clear all cache'); ?></a>
    </div>
</div><br>
