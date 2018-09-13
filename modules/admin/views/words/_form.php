<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$langs = Yii::$app->params['languages'];

?>

<div class="words-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <ul class="nav nav-tabs" id="NavTabs">

        <?php $a = 0; foreach ($langs as $key => $value): ?>

            <li class="<?= $a == 0 ? 'active' : '' ?>">

                <a href="#<?= $key . '_' . $value['id'] ?>"><?= $value['name'] ?></a>

            </li>

            <?php $a++; endforeach ?>

    </ul>

    <div class="tab-content">

        <?php $a = 0; foreach ($langs as $key => $value): ?>

            <div id="<?= $key . '_' . $value['id'] ?>" class="tab-pane2 <?= $a == 0 ? 'active2' : '' ?>">

                <?= $form->field($model, 'title_'.$key)->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'text_'.$key)->textarea(['rows' => 6]) ?>

            </div>

            <?php $a++; endforeach ?>

    </div>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php $this->registerJs('

    $(".tab-content .tab-pane2").each(function(){
        $(this).addClass("item2");
    });

    $("#NavTabs li a").click(function(e){

        e.preventDefault();

        changeTab($(this));

    });

    function changeTab (t){

        t.parent().addClass("active");
        t.parent().siblings().removeClass("active");

        var b_id = t.attr("href");

        if($(b_id).length > 0){

            $(b_id).addClass("active2");
            $(b_id).siblings().removeClass("active2");

        }
        
    }

') ?>
