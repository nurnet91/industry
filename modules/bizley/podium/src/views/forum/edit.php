<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */

use app\modules\bizley\podium\src\widgets\editor\EditorFull;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Alert;
use yii\helpers\Html;

$this->title = t( 'Edit Post');
$this->params['breadcrumbs'][] = ['label' => t( 'Main Forum'), 'url' => ['forum/index']];
$this->params['breadcrumbs'][] = ['label' => $model->forum->category->name, 'url' => ['forum/category', 'id' => $model->forum->category->id, 'slug' => $model->forum->category->slug]];
$this->params['breadcrumbs'][] = ['label' => $model->forum->name, 'url' => ['forum/forum', 'cid' => $model->forum->category->id, 'id' => $model->forum->id, 'slug' => $model->forum->slug]];
$this->params['breadcrumbs'][] = ['label' => $model->thread->name, 'url' => ['forum/thread', 'cid' => $model->forum->category->id, 'fid' => $model->thread->forum->id, 'id' => $model->thread->id, 'slug' => $model->thread->slug]];
$this->params['breadcrumbs'][] = $this->title;

?>
<?php if (!empty($preview)): ?>
<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <?= Alert::widget([
            'body' => '<strong><small>'
                        . t( 'Post Preview')
                        . '</small></strong>:<hr>'
                        . $model->parsedContent,
            'options' => ['class' => 'alert-info']
        ]); ?>
    </div>
</div>
<?php endif; ?>

<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="panel panel-default">
            <?php $form = ActiveForm::begin(['id' => 'edit-post-form']); ?>
                <div class="panel-body">
<?php if ($isFirstPost): ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'topic')->textInput(['autofocus' => true])->label(t( 'Topic')) ?>
                        </div>
                    </div>
<?php endif; ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'content')->label(false)->widget(EditorFull::className()) ?>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-8">
                            <?= Html::submitButton('<span class="glyphicon glyphicon-ok-sign"></span> ' . t( 'Save Post'), ['class' => 'btn btn-block btn-primary', 'name' => 'save-button']) ?>
                        </div>
                        <div class="col-sm-4">
                            <?= Html::submitButton('<span class="glyphicon glyphicon-eye-open"></span> ' . t( 'Preview'), ['class' => 'btn btn-block btn-default', 'name' => 'preview-button']) ?>
                        </div>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div><br>
