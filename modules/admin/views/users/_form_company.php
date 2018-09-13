<?php

use app\models\CompanyInfo;
use app\models\Users;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="users-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?=$form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'password')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'country_id')->dropDownlist($countries, ['prompt' => 'Select Country']) ?>

    <?=$form->field($model, 'region_id')->dropDownlist(!empty($model->country) ? $model->country->listRegions() : [], ['prompt' => 'Select Region']) ?>

    <?=$form->field($model, 'city_id')->dropDownlist(!empty($model->country) ? $model->country->listCities() : [], ['prompt' => 'Select City']) ?>

    <?=$form->field($model, 'social_id')->textInput() ?>

    <?=$form->field($model, 'status')->checkbox() ?>
    
    <?=$form->field($model, 'doverenniy')->checkbox() ?>

    <hr>

    <?=$form->field($model2, 'imageFile')->fileInput() ?>

    <?=$form->field($model2, 'name')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model2, 'company_variant_id')->dropDownlist($variants) ?>

    <?=$form->field($model2, 'first_name')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model2, 'last_name')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model2, 'middle_name')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model2, 'inn')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model2, 'phone')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model2, 'promo_code')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model2, 'type')->dropDownlist(CompanyInfo::$types) ?>

    <?=$form->field($model2, 'payment_type')->dropDownlist(CompanyInfo::$payments) ?>

    <?=$form->field($model2, 'technical_info_number')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model2, 'technical_info_email')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model2, 'cooperation_info_fio')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model2, 'cooperation_info_number')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model2, 'cooperation_info_email')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model2, 'technical_info_fio')->textInput(['maxlength' => true]) ?>
    
    <?=$form->field($model2, 'comment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?=Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php $this->registerJs('
    var id0 = $("#users-country_id");
    var id1 = $("#users-region_id");
    var id2 = $("#users-city_id");
    id0.change(function(){
        selectRegionCity($(this), id1, id2);
    });
    function selectRegionCity(id0, id1, id2){
        if(id1.length > 0){
            var url = "/admin/countries/regions/"+id0.val();
            $.ajax({
                type: "get",
                url: url,
                dataType: "html",
                success: function(data){
                    id1.html(data);
                }
            });
        }
        if(id2.length > 0){
            var url = "/admin/countries/cities/"+id0.val();
            $.ajax({
                type: "get",
                url: url,
                dataType: "html",
                success: function(data){
                    id2.html(data);
                }
            });
        }
    }
') ?>
