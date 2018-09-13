<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */

use app\modules\bizley\podium\src\Podium;
use app\modules\bizley\podium\src\widgets\editor\EditorFull;
use app\modules\bizley\podium\src\widgets\poll\Poll;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Alert;
use yii\helpers\Html;

$this->title = t( 'New Thread');
$this->params['breadcrumbs'][] = ['label' => t( 'Main Forum'), 'url' => ['forum/index']];
$this->params['breadcrumbs'][] = ['label' => $forum->category->name, 'url' => ['forum/category', 'id' => $forum->category->id, 'slug' => $forum->category->slug]];
$this->params['breadcrumbs'][] = ['label' => $forum->name, 'url' => ['forum/forum', 'cid' => $forum->category->id, 'id' => $forum->id, 'slug' => $forum->slug]];
$this->params['breadcrumbs'][] = $this->title;

?>
<?php if ($preview): ?>
<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <?= Alert::widget([
            'body' => '<strong><small>'
                        . t( 'Post Preview')
                        . '</small></strong>:<hr>'
                        . $model->parsedPost
                        . (Podium::getInstance()->podiumConfig->get('allow_polls') ? Poll::preview($model) : null),
            'options' => ['class' => 'alert-info']
        ]); ?>
    </div>
</div>
<?php endif; ?>

<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="panel panel-default">
            <?php $form = ActiveForm::begin(['id' => 'new-thread-form']); ?>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label(t( 'Topic')); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'post')->label(false)->widget(EditorFull::className()); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'subscribe')->checkbox()->label(t( 'Subscribe to this thread')); ?>
                        </div>
                    </div>
<?php if (Podium::getInstance()->podiumConfig->get('allow_polls')): ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= Poll::create($form, $model); ?>
                        </div>
                    </div>
<?php endif; ?>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-8">
                            <?= Html::submitButton(
                                '<span class="glyphicon glyphicon-ok-sign"></span> ' . t( 'Create new thread'),
                                ['class' => 'btn btn-block btn-primary', 'name' => 'save-button']
                            ); ?>
                        </div>
                        <div class="col-sm-4">
                            <?= Html::submitButton(
                                '<span class="glyphicon glyphicon-eye-open"></span> ' . t( 'Preview'),
                                ['class' => 'btn btn-block btn-default', 'name' => 'preview-button']
                            ); ?>
                        </div>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div><br>
