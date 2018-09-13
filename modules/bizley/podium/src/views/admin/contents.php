<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */

use app\modules\bizley\podium\src\models\Content;
use app\modules\bizley\podium\src\widgets\quill\QuillFull;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = t( 'Contents');
$this->params['breadcrumbs'][] = ['label' => t( 'Administration Dashboard'), 'url' => ['admin/index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('/elements/admin/_navbar', ['active' => 'contents']);

?>
<br>
<div class="row">
    <div class="col-md-3 col-sm-4">
        <ul class="nav nav-pills nav-stacked">
            <li role="presentation" class="<?= $model->name == Content::TERMS_AND_CONDS ? 'active' : '' ?>"><a href="<?= Url::to(['admin/contents', 'name' => Content::TERMS_AND_CONDS]) ?>"><span class="glyphicon glyphicon-chevron-right"></span> <?= t( 'Forum Terms and Conditions') ?></a></li>
            <li role="presentation" class="<?= $model->name == Content::EMAIL_REGISTRATION ? 'active' : '' ?>"><a href="<?= Url::to(['admin/contents', 'name' => Content::EMAIL_REGISTRATION]) ?>"><span class="glyphicon glyphicon-chevron-right"></span> <?= t( 'Registration e-mail') ?></a></li>
            <li role="presentation" class="<?= $model->name == Content::EMAIL_NEW ? 'active' : '' ?>"><a href="<?= Url::to(['admin/contents', 'name' => Content::EMAIL_NEW]) ?>"><span class="glyphicon glyphicon-chevron-right"></span> <?= t( 'New address activation e-mail') ?></a></li>
            <li role="presentation" class="<?= $model->name == Content::EMAIL_REACTIVATION ? 'active' : '' ?>"><a href="<?= Url::to(['admin/contents', 'name' => Content::EMAIL_REACTIVATION]) ?>"><span class="glyphicon glyphicon-chevron-right"></span> <?= t( 'Account reactivation e-mail') ?></a></li>
            <li role="presentation" class="<?= $model->name == Content::EMAIL_PASSWORD ? 'active' : '' ?>"><a href="<?= Url::to(['admin/contents', 'name' => Content::EMAIL_PASSWORD]) ?>"><span class="glyphicon glyphicon-chevron-right"></span> <?= t( 'Password reset e-mail') ?></a></li>
            <li role="presentation" class="<?= $model->name == Content::EMAIL_SUBSCRIPTION ? 'active' : '' ?>"><a href="<?= Url::to(['admin/contents', 'name' => Content::EMAIL_SUBSCRIPTION]) ?>"><span class="glyphicon glyphicon-chevron-right"></span> <?= t( 'New post in subscribed thread') ?></a></li>
        </ul>
<?php if (substr($model->name, 0, 6) == 'email-'): ?>
        <br>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= t( 'Content variables') ?></h3>
            </div>
            <div class="panel-body">
                <strong>{forum}</strong> <?= t( "This forum's name") ?><br>
                <strong>{link}</strong> <?= t( 'The link coming with email') ?><br>
            </div>
        </div>
<?php endif; ?>
    </div>
    <div class="col-md-9 col-sm-8">
        <?php $form = ActiveForm::begin(['id' => 'content-form']); ?>
            <div class="row">
                <div class="col-sm-12">
                    <?= $form->field($model, 'topic')->textInput(['placeholder' => t( 'Topic'), 'autofocus' => true])->label(false) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <?= $form->field($model, 'content')->label(false)->widget(QuillFull::className(), ['options' => ['style' => 'min-height:320px;']]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <?= Html::submitButton('<span class="glyphicon glyphicon-ok-sign"></span> ' . t( 'Save Content'), ['class' => 'btn btn-block btn-primary', 'name' => 'save-button']) ?>
                </div>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div><br>
