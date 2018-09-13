<?php

use app\models\Categories;
use app\widgets\LangTabs;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$mainCats = \app\models\Directions::findForMainList();
/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'category_id')->dropDownlist($mainCats, ['prompt' => 'Select category']) ?>

    <?= $form->field($model, 'type_id')->dropDownlist(\app\models\News::TypesAll(), ['prompt' => 'Select type']) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <br>

    <?=LangTabs::widget([
        'w_id' => 'NavTabs',
        'form' => $form,
        'model' => $model,
        'methods' => [
            ['attribute' => 'title_',       'input' => 'textInput', 'inputOptions' => ['maxlength' => true]],
            ['attribute' => 'text_',        'input' => 'textarea',  'inputOptions' => ['rows' => 6]],
        ],
    ]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
