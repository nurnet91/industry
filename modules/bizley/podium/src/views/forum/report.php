<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */

use app\modules\bizley\podium\src\widgets\editor\EditorBasic;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = t( 'Report post');
$this->params['breadcrumbs'][] = ['label' => t( 'Main Forum'), 'url' => ['forum/index']];
$this->params['breadcrumbs'][] = ['label' => $post->forum->category->name, 'url' => ['forum/category', 'id' => $post->forum->category->id, 'slug' => $post->forum->category->slug]];
$this->params['breadcrumbs'][] = ['label' => $post->forum->name, 'url' => ['forum/forum', 'cid' => $post->forum->category->id, 'id' => $post->forum->id, 'slug' => $post->forum->slug]];
$this->params['breadcrumbs'][] = ['label' => $post->thread->name, 'url' => ['forum/thread', 'cid' => $post->forum->category->id, 'fid' => $post->forum->id, 'id' => $post->thread->id, 'slug' => $post->thread->slug]];
$this->params['breadcrumbs'][] = $this->title;

?>
<?= $this->render('/elements/forum/_post', ['model' => $post, 'category' => $post->forum->category->id, 'slug' => $post->thread->slug]) ?>
<br>
<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        <div class="panel panel-default">
            <?php $form = ActiveForm::begin(['id' => 'report-post-form']); ?>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'content')
                                ->label(t( 'Complaint'))
                                ->widget(EditorBasic::className()) ?>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <?= Html::submitButton('<span class="glyphicon glyphicon-ok-sign"></span> ' . t( 'Report post'), [
                                'class' => 'btn btn-block btn-danger', 'name' => 'save-button'
                            ]) ?>
                        </div>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div><br>
