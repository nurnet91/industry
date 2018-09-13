<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */

use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>
<?php $form = ActiveForm::begin(['id' => 'search-form']); ?>
    <div class="row">
        <div class="form-group">
            <div class="col-sm-8 col-sm-offset-2">
                <?= $form->field($model, 'query')->textInput(['class' => 'form-control input-lg', 'autofocus' => true])->label(t( 'Find words')) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
                <?= $form->field($model, 'match', ['inline' => true])->radioList(['all' => t( 'all words'), 'any' => t( 'any word')], ['unselect' => 'all'])->label(t( 'Match')) ?>
            </div>
            <div class="col-sm-4">
                <?= $form->field($model, 'author')->textInput()->label(t( 'Author')) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
                <?= $form->field($model, 'dateFrom')->widget(DatePicker::classname(), ['removeButton' => false, 'pluginOptions' => ['autoclose' => true, 'format' => 'yyyy-mm-dd']])->label(t( 'Date from')) ?>
            </div>
            <div class="col-sm-4">
                <?= $form->field($model, 'dateTo')->widget(DatePicker::classname(), ['removeButton' => false, 'pluginOptions' => ['autoclose' => true, 'format' => 'yyyy-mm-dd']])->label(t( 'Date to')) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="col-sm-8 col-sm-offset-2">
                <?= $form->field($model, 'forums')->dropDownList($list, ['multiple' => true, 'encode' => false])->label(t( 'Search in Forums')) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
                <?= $form->field($model, 'type', ['inline' => true])->radioList(['posts' => t( 'posts contents'), 'topics' => t( 'threads titles')], ['unselect' => 'posts'])->label(t( 'Search in')) ?>
            </div>
            <div class="col-sm-4">
                <?= $form->field($model, 'display', ['inline' => true])->radioList(['posts' => t( 'as posts'), 'topics' => t( 'as threads')], ['unselect' => 'topics'])->label(t( 'Display as')) ?>
            </div>
        </div>
    </div>
<div class="row">
        <div class="form-group">
            <div class="col-sm-8 col-sm-offset-2">
                <?= Html::submitButton('<span class="glyphicon glyphicon-search"></span> ' . t( 'Search'), ['class' => 'btn btn-block btn-lg btn-primary', 'name' => 'search-button']) ?>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>
<br><br>
