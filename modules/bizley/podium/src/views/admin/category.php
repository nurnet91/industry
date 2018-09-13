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

$this->title = $model->isNewRecord ? t( 'New Category') : t( 'Edit Category');
$this->params['breadcrumbs'][] = ['label' => t( 'Administration Dashboard'), 'url' => ['admin/index']];
$this->params['breadcrumbs'][] = ['label' => t( 'Forums'), 'url' => ['admin/categories']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs("$('[data-toggle=\"popover\"]').popover();");

?>
<?= $this->render('/elements/admin/_navbar', ['active' => 'categories']); ?>
<br>
<div class="row">
    <div class="col-md-3 col-sm-4">
        <div class="form-group">
            <ul class="nav nav-pills nav-stacked">
                <li role="presentation"><a href="<?= Url::to(['admin/categories']) ?>"><span class="glyphicon glyphicon-list"></span> <?= t( 'Categories List') ?></a></li>
<?php foreach ($categories as $category): ?>
                <li role="presentation" class="<?= $model->id == $category->id ? 'active' : '' ?>"><a href="<?= Url::to(['admin/edit-category', 'id' => $category->id]) ?>"><span class="glyphicon glyphicon-chevron-right"></span> <?= Html::encode($category->name) ?></a></li>
<?php endforeach; ?>
                <li role="presentation" class="<?= $model->isNewRecord ? 'active' : '' ?>"><a href="<?= Url::to(['admin/new-category']) ?>"><span class="glyphicon glyphicon-plus"></span> <?= t( 'Create new category') ?></a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-6 col-sm-8">
        <div class="panel panel-default">
            <?php $form = ActiveForm::begin(['id' => 'edit-category-form']); ?>
                <div class="panel-heading">
                    <h3 class="panel-title"><?= $this->title ?></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label(t( "Category's Name")) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'visible')->checkbox(['uncheck' => 0, 'aria-describedby' => 'help-visible'])->label(t( 'Category visible for guests')) ?>
                            <small id="help-visible" class="help-block"><?= t( 'You can turn off visibility for each individual forum in the category as well.') ?></small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'keywords')->textInput([
                                'placeholder'    => t( 'Optional keywords'),
                                'data-container' => 'body',
                                'data-toggle'    => 'popover',
                                'data-placement' => 'right',
                                'data-content'   => t( 'Meta keywords (comma separated, leave empty to get global value).'),
                                'data-trigger'   => 'focus'
                            ])->label(t( "Category's Meta Keywords")) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $form->field($model, 'description')->textInput([
                                'placeholder'    => t( 'Optional description'),
                                'data-container' => 'body',
                                'data-toggle'    => 'popover',
                                'data-placement' => 'right',
                                'data-content'   => t( 'Meta description (leave empty to get global value).'),
                                'data-trigger'   => 'focus'
                            ])->label(t( "Category's Meta Description")) ?>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <?= Html::submitButton('<span class="glyphicon glyphicon-ok-sign"></span> ' . ($model->isNewRecord ? t( 'Create new category') : t( 'Save Category')), ['class' => 'btn btn-block btn-primary', 'name' => 'save-button']) ?>
                        </div>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div><br>
