<?php

use app\models\FilterMain;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$langs = Yii::$app->params['languages'];
$model_id = (!is_null($model->id)) ? $model->id : 0;
?>

<div class="filter-main-form">

    <?php $form = ActiveForm::begin();

    echo Html:: hiddenInput(Yii::$app->getRequest()->csrfParam, Yii::$app->getRequest()->getCsrfToken(), []);

    ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'direction_id')->dropDownList(['' => '...'] + $directions)->error(false) ?>

    <?= $form->field($model, 'type')->dropDownList(FilterMain::types()) ?>

    <ul class="nav nav-tabs" id="NavTabs">

        <?php $a = 0;
        foreach ($langs as $key => $value): ?>

            <li class="<?= $a == 0 ? 'active' : '' ?>">

                <a href="#<?= $key . '_' . $value['id'] ?>"><?= $value['name'] ?></a>

            </li>

            <?php $a++; endforeach ?>

    </ul>

    <div class="tab-content">

        <?php $a = 0;
        foreach ($langs as $key => $value): ?>

            <div id="<?= $key . '_' . $value['id'] ?>" class="tab-pane2 <?= $a == 0 ? 'active2' : '' ?>">

                <div class="col-md-6">
                    <div class="col-md-12">
                        <?= $form->field($modelForm, 'ThemesInput_' . $key, ['options' => ['class' => 'Themes_' . $key]])->textInput(['maxlength' => true, 'id' => 'ThemesInput_' . $key])->error(false) ?>
                        <?= $form->field($modelForm, 'ThemesAttrParentInput_' . $key, ['options' => ['class' => 'ThemesAttrParent_' . $key]])->textInput(['maxlength' => true, 'id' => 'ThemesAttrParentInput_' . $key])->error(false) ?>
                        <?= $form->field($modelForm, 'ThemesAttrInput_' . $key, ['options' => ['class' => 'ThemesAttr_' . $key]])->textInput(['maxlength' => true, 'id' => 'ThemesAttrInput_' . $key])->error(false) ?>
                        <?= $form->field($modelForm, 'SubThemesInput_' . $key, ['options' => ['class' => 'SubThemes_' . $key]])->textInput(['maxlength' => true, 'id' => 'SubThemesInput_' . $key])->error(false) ?>
                        <?= $form->field($modelForm, 'TechInput_' . $key, ['options' => ['class' => 'ThemeTech_' . $key]])->textInput(['maxlength' => true, 'id' => 'ThemeTechInput_' . $key])->error(false) ?>
                        <?= $form->field($modelForm, 'OperationsInput_' . $key, ['options' => ['class' => 'TechOperations_' . $key]])->textInput(['maxlength' => true, 'id' => 'TechOperationsInput_' . $key])->error(false) ?>
                        <?= $form->field($modelForm, 'E_TypeInput_' . $key, ['options' => ['class' => 'EquipmentType_' . $key]])->textInput(['maxlength' => true, 'id' => 'EquipmentTypeInput_' . $key])->error(false) ?>
                        <?= $form->field($modelForm, 'ManufacturerInput_' . $key, ['options' => ['class' => 'EquipmentManufacturer_' . $key]])->textInput(['maxlength' => true, 'id' => 'EquipmentManufacturerInput_' . $key])->error(false) ?>
                        <?= $form->field($modelForm, 'AttributesInput_' . $key, ['options' => ['class' => 'OperationAttributes_' . $key]])->textInput(['maxlength' => true, 'id' => 'OperationAttributesInput_' . $key])->error(false) ?>

                    </div>
                </div>

            </div>

            <?php $a++; endforeach ?>

    </div>

    <div class="col-md-6">
        <div class="col-md-12">
            <?= $form->field($model, 'theme_id', ['options' => ['class' => 'ThemesList']])->dropDownList([])->error(false) ?>
            <?= $form->field($model, 'theme_attr_parent_id', ['options' => ['class' => 'ThemesAttrParentList']])->dropDownList([])->error(false) ?>
            <?= $form->field($model, 'sub_theme_id', ['options' => ['class' => 'SubThemesList']])->dropDownList([])->error(false) ?>
            <div class="input-group">
              <span class="input-group-addon" title="Признак темы" style="border-top: 0; background: #fff">
                <?= $form->field($model, 'theme_attribute', ['options' => ['style' => 'margin: 0']])->checkbox(['style' => 'margin-top: 27px'])->error(false)->label(false) ?>
              </span>
                <?= $form->field($model, 'theme_attr_id', ['options' => ['class' => 'ThemesAttrList']])->dropDownList([])->error(false) ?>
                <?= $form->field($model, 'tech_id', ['options' => ['class' => 'ThemeTechList']])->dropDownList([])->error(false) ?>
            </div>
            <?= $form->field($model, 'operation_id', ['options' => ['class' => 'TechOperationsList']])->dropDownList([])->error(false) ?>
            <?= $form->field($model, 'equipment_type_id', ['options' => ['class' => 'EquipmentTypeList']])->dropDownList([])->error(false) ?>
            <?= $form->field($model, 'equipment_manufacturer_id', ['options' => ['class' => 'EquipmentManufacturerList']])->dropDownList([])->error(false) ?>
            <?= $form->field($model, 'attributes_id', ['options' => ['class' => 'OperationAttributesList']])->dropDownList([])->error(false) ?>
        </div>
    </div>
</div>

<div class="col-md-12">

    <br/>
    <div class="col-md-2">
        <img id="theme_img" style="padding: 0; margin: 0; height:50px; width: 100px;" src="" type="text" class="form-control">
    </div>
    <div class="col-md-10">
        <?= $form->field($modelThemes, 'imageFile')->fileInput()->label('Изображение для темы') ?>
    </div>

    <div class="col-md-12">
        <br/>
        <?= $form->field($model, 'status')->checkbox()->error(false) ?>
        <?= $form->field($model, 'show_anywhere')->checkbox()->error(false) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>


</div>
<?php ActiveForm::end(); ?>
<script>

</script>

<?php $this->registerJs(/** @lang JavaScript */
    '

    var model_id = "' . $model_id . '";
    
	var direction = $("#filtermain-direction_id");
	var optionTemplate = "<option value=\'0\'>...</option><option value=\'1\'>[skipped]</option>";
	var directionthemes_type = $("#filtermain-type");
	var theme_attribute_checkbox = $("#filtermain-theme_attribute");
    if(model_id > 0){
        directionthemes_type.attr("disabled", "disabled");
    }
	var theme_img = $("#theme_img");
	var directionthemes = $("#filtermain-theme_id");
	var directionthemesattr = $("#filtermain-theme_attr_id");
	var directionthemesattrparent = $("#filtermain-theme_attr_parent_id");
    var directionsubthemes = $("#filtermain-sub_theme_id");
	var themetech = $("#filtermain-tech_id");
	var techoperations = $("#filtermain-operation_id");
	var equipmenttype = $("#filtermain-equipment_type_id");
	var equipmentmanufacturer = $("#filtermain-equipment_manufacturer_id");
	var operationattributes = $("#filtermain-attributes_id");

    var DirectionThemes_ru = $(".Themes_ru");
    var DirectionThemes_en = $(".Themes_en");
    var DirectionThemes_ua = $(".Themes_ua");

    var directionthemesattr_ru = $(".ThemesAttr_ru");
    var directionthemesattr_en = $(".ThemesAttr_en");
    var directionthemesattr_ua = $(".ThemesAttr_ua");
    
    var directionthemesattrList = $(".ThemesAttrList");

    var directionthemesattrParent_ru = $(".ThemesAttrParent_ru");
    var directionthemesattrParent_en = $(".ThemesAttrParent_en");
    var directionthemesattrParent_ua = $(".ThemesAttrParent_ua");
    
    var directionthemesattrParentList = $(".ThemesAttrParentList");

    var DirectionSubThemes_ru = $(".SubThemes_ru");
    var DirectionSubThemes_en = $(".SubThemes_en");
    var DirectionSubThemes_ua = $(".SubThemes_ua");

    var DirectionSubThemesList = $(".SubThemesList");

    var ThemeTech_ru = $(".ThemeTech_ru");
    var ThemeTech_en = $(".ThemeTech_en");
    var ThemeTech_ua = $(".ThemeTech_ua");

    var ThemeTechList = $(".ThemeTechList");

    var TechOperations_ru = $(".TechOperations_ru");
    var TechOperations_en = $(".TechOperations_en");
    var TechOperations_ua = $(".TechOperations_ua");
    var TechOperationsList = $(".TechOperationsList");

    var EquipmentTypeList = $(".EquipmentTypeList");

    var EquipmentType_ru = $(".EquipmentType_ru");
    var EquipmentType_en = $(".EquipmentType_en");
    var EquipmentType_ua = $(".EquipmentType_ua");

    var EquipmentManufacturer_ru = $(".EquipmentManufacturer_ru");
    var EquipmentManufacturer_en = $(".EquipmentManufacturer_en");
    var EquipmentManufacturer_ua = $(".EquipmentManufacturer_ua");

    var EquipmentManufacturerList = $(".EquipmentManufacturerList");

    var OperationAttributes_ru = $(".OperationAttributes_ru");
    var OperationAttributes_en = $(".OperationAttributes_en");
    var OperationAttributes_ua = $(".OperationAttributes_ua");

    var OperationAttributesList = $(".OperationAttributesList");

    themetech.html(optionTemplate);
    directionthemes.html(optionTemplate);
    directionthemesattr.html(optionTemplate);
    directionsubthemes.html(optionTemplate);
    techoperations.html(optionTemplate);
    equipmenttype.html(optionTemplate);
    equipmentmanufacturer.html(optionTemplate);
    operationattributes.html(optionTemplate);
    
    loadFiltersList();

    function attributeCheckbox(){
            
        if(theme_attribute_checkbox[0].checked){
            
            directionthemesattr_ru.show();
            directionthemesattr_en.show();
            directionthemesattr_ua.show();
            directionthemesattrList.show();
            
            directionthemesattrParent_ru.show();
            directionthemesattrParent_en.show();
            directionthemesattrParent_ua.show();
            directionthemesattrParentList.show();
            
            TechOperations_ru.hide();
            TechOperations_en.hide();
            TechOperations_ua.hide();
            TechOperationsList.hide();
            
            ThemeTech_ru.hide();
            ThemeTech_en.hide();
            ThemeTech_ua.hide();
            ThemeTechList.hide();

            DirectionSubThemes_ru.hide();
            DirectionSubThemes_en.hide();
            DirectionSubThemes_ua.hide();
            DirectionSubThemesList.hide();

            EquipmentType_ru.hide();
            EquipmentType_en.hide();
            EquipmentType_ua.hide();
            EquipmentTypeList.hide();
    
            EquipmentManufacturer_ru.hide();
            EquipmentManufacturer_en.hide();
            EquipmentManufacturer_ua.hide();
            EquipmentManufacturerList.hide();
    
            OperationAttributes_ru.hide();
            OperationAttributes_en.hide();
            OperationAttributes_ua.hide();
            OperationAttributesList.hide();
          
            if(directionthemes_type.val() == 1){
                $.ajax({
                    url: "/admin/filter-main/filter?id="+directionthemes.val()+"&model=themes_attr_parent&modelmain="+model_id,
                    type: "get",
                    dataType: "JSON",
                    success: function(data){
      
                        theme_img.attr("src", "/"+data.themeImg);
                        directionthemesattrparent.html(data.template);
                        
                        if(directionthemesattrparent.val() > 0){
                            $.ajax({
                                url: "/admin/filter-main/filter?id="+directionthemesattrparent.val()+"&model=themes_attr&modelmain="+model_id,
                                type: "get",
                                dataType: "html",
                                success: function(data){
                                    directionthemesattr.html(data);
                                }
                            });
                        }
                    }
                });
            }else{
                $.ajax({
                    url: "/admin/filter-main/filter?id="+directionthemes.val()+"&model=themes_attr_parent_equipment&modelmain="+model_id,
                    type: "get",
                    dataType: "json",
                    success: function(data){
                        theme_img.attr("src", "/"+data.themeImg);
                        directionthemesattrparent.html(data.template);
                        
                        if(directionthemesattrparent.val() > 0){
                            $.ajax({
                                url: "/admin/filter-main/filter?id="+directionthemesattrparent.val()+"&model=themes_attr_equipment&modelmain="+model_id,
                                type: "get",
                                dataType: "html",
                                success: function(data){
                                    directionthemesattr.html(data);
                                }
                            });
                        }
                    }
                });
            }
        }else{
            directionthemesattr.html(optionTemplate);
            directionthemesattrparent.html(optionTemplate);
            
            directionthemesattr_ru.find("input").val("");
            directionthemesattr_en.find("input").val("");
            directionthemesattr_ua.find("input").val("");
            
            directionthemesattrParent_ru.find("input").val("");
            directionthemesattrParent_en.find("input").val("");
            directionthemesattrParent_ua.find("input").val("");

            
        if(directionthemes_type.val() == 1){

            directionthemesattr_ru.hide();
            directionthemesattr_en.hide();
            directionthemesattr_ua.hide();
            directionthemesattrList.hide();
            
            directionthemesattrParent_ru.hide();
            directionthemesattrParent_en.hide();
            directionthemesattrParent_ua.hide();
            directionthemesattrParentList.hide();
            
            ThemeTech_ru.show();
            ThemeTech_en.show();
            ThemeTech_ua.show();
            ThemeTechList.show();
            
            DirectionSubThemes_ru.hide();
            DirectionSubThemes_en.hide();
            DirectionSubThemes_ua.hide();
            DirectionSubThemesList.hide();

            TechOperations_ru.show();
            TechOperations_en.show();
            TechOperations_ua.show();
            TechOperationsList.show();
            
            ThemeTech_ru.show();
            ThemeTech_en.show();
            ThemeTech_ua.show();
            ThemeTechList.show();
            
            EquipmentType_ru.hide();
            EquipmentType_en.hide();
            EquipmentType_ua.hide();
            EquipmentTypeList.hide();
    
            EquipmentManufacturer_ru.hide();
            EquipmentManufacturer_en.hide();
            EquipmentManufacturer_ua.hide();
            EquipmentManufacturerList.hide();
    
            OperationAttributes_ru.show();
            OperationAttributes_en.show();
            OperationAttributes_ua.show();
            OperationAttributesList.show();
                
        }else if(directionthemes_type.val() == 2){
    
            directionsubthemes.html(optionTemplate);
            themetech.html(optionTemplate);
            techoperations.html(optionTemplate);
            equipmenttype.html(optionTemplate);
            equipmentmanufacturer.html(optionTemplate);
            operationattributes.html(optionTemplate);
            
            directionthemesattr_ru.hide();
            directionthemesattr_en.hide();
            directionthemesattr_ua.hide();
            directionthemesattrList.hide();
            
            directionthemesattrParent_ru.hide();
            directionthemesattrParent_en.hide();
            directionthemesattrParent_ua.hide();
            directionthemesattrParentList.hide();
    
            ThemeTech_ru.show();
            ThemeTech_en.show();
            ThemeTech_ua.show();
            ThemeTechList.show();
            
            DirectionSubThemes_ru.show();
            DirectionSubThemes_en.show();
            DirectionSubThemes_ua.show();
            DirectionSubThemesList.show();

            TechOperations_ru.show();
            TechOperations_en.show();
            TechOperations_ua.show();
            TechOperationsList.show();
            
            ThemeTech_ru.show();
            ThemeTech_en.show();
            ThemeTech_ua.show();
            ThemeTechList.show();
            
            EquipmentType_ru.show();
            EquipmentType_en.show();
            EquipmentType_ua.show();
            EquipmentTypeList.show();
    
            EquipmentManufacturer_ru.show();
            EquipmentManufacturer_en.show();
            EquipmentManufacturer_ua.show();
            EquipmentManufacturerList.show();
            
            OperationAttributes_ru.hide();
            OperationAttributes_en.hide();
            OperationAttributes_ua.hide();
            OperationAttributesList.hide();
        }
    }
}
    attributeCheckbox();
    theme_attribute_checkbox.change(function(){
        attributeCheckbox();
    });

    function loadFiltersList(){
     if(directionthemes_type.val() == 1){
         $.ajax({
             url: "/admin/filter-main/filter?id="+(direction.val())+"&model=directions_s&modelmain="+model_id,
             type: "get",
             dataType: "html",
             success: function(data){
                 directionthemes.html(data);
                 
             if(theme_attribute_checkbox[0].checked){
                 $.ajax({
                    url: "/admin/filter-main/filter?id="+directionthemes.val()+"&model=themes_attr_parent&modelmain="+model_id,
                    type: "get",
                    dataType: "json",
                    success: function(data){
                        theme_img.attr("src", "/"+data.themeImg);
                        directionthemesattrparent.html(data.template);
                        
                        if(directionthemesattrparent.val() > 0){
                            $.ajax({
                                url: "/admin/filter-main/filter?id="+directionthemesattrparent.val()+"&model=themes_attr&modelmain="+model_id,
                                type: "get",
                                dataType: "html",
                                success: function(data){
                                    directionthemesattr.html(data);
                                }
                            });
                        }
                    }
                });
                 
             }else{
                 if(directionthemes.val() > 0){
                         $.ajax({
                             url: "/admin/filter-main/filter?id="+(directionthemes.val())+"&model=direction_themes&modelmain="+model_id,
                             type: "get",
                             dataType: "JSON",
                             success: function(data){
                                 
                                 theme_img.attr("src", "/"+data.themeImg);
                                 themetech.html(data.template);
                                 if(themetech.val() > 0){
                                     $.ajax({
                                         url: "/admin/filter-main/filter?id="+(themetech.val())+"&model=theme_tech&modelmain="+model_id,
                                         type: "get",
                                         dataType: "html",
                                         success: function(data){
                                             techoperations.html(data);
                                             if(techoperations.val() > 0){
                                                 $.ajax({
                                                     url: "/admin/filter-main/filter?id="+(techoperations.val())+"&model=tech_operations_s&modelmain="+model_id,
                                                     type: "get",
                                                     dataType: "html",
                                                     success: function(data){
                                                         operationattributes.html(data);
                                                     }
                                                 });
                                             }
                                         }
                                     });
                                 }
                             }
                         });
                     }
                 }
             }
         });
     }else if(directionthemes_type.val() == 2){
         $.ajax({
             url: "/admin/filter-main/filter?id="+(direction.val())+"&model=directions_e&modelmain="+model_id,
             type: "get",
             dataType: "html",
             success: function(data){
                 directionthemes.html(data);
                 
             if(theme_attribute_checkbox[0].checked){
                 $.ajax({
                    url: "/admin/filter-main/filter?id="+directionthemes.val()+"&model=themes_attr_parent_equipment&modelmain="+model_id,
                    type: "get",
                    dataType: "json",
                    success: function(data){
                        theme_img.attr("src", "/"+data.themeImg);
                        directionthemesattrparent.html(data.template);
                        
                        if(directionthemesattrparent.val() > 0){
                            $.ajax({
                                url: "/admin/filter-main/filter?id="+directionthemesattrparent.val()+"&model=themes_attr_equipment&modelmain="+model_id,
                                type: "get",
                                dataType: "html",
                                success: function(data){
                                    directionthemesattr.html(data);
                                }
                            });
                        }
                    }
                });
                 
             }else{
                if(directionthemes.val() > 0){
                     $.ajax({
                         url: "/admin/filter-main/filter?id="+(directionthemes.val())+"&model=direction_themes_sub&modelmain="+model_id,
                         type: "get",
                         dataType: "JSON",
                         success: function(data){
                            console.log(data);
                            theme_img.attr("src", "/"+data.themeImg);
                             directionsubthemes.html(data.template);
                             if(directionsubthemes.val() > 0){
                                 $.ajax({
                                     url: "/admin/filter-main/filter?id="+(directionsubthemes.val())+"&model=sub_themes&modelmain="+model_id,
                                     type: "get",
                                     dataType: "html",
                                     success: function(data){
                                     
                                         themetech.html(data);
                                         if(themetech.val() > 0){
                                             $.ajax({
                                                 url: "/admin/filter-main/filter?id="+(themetech.val())+"&model=theme_tech&modelmain="+model_id,
                                                 type: "get",
                                                 dataType: "html",
                                                 success: function(data){
                                                     
                                                     techoperations.html(data);
                                                     if(techoperations.val() > 0){
                                                         $.ajax({
                                                             url: "/admin/filter-main/filter?id="+(techoperations.val())+"&model=tech_operations_e&modelmain="+model_id,
                                                             type: "get",
                                                             dataType: "html",
                                                             success: function(data){
                                                             
                                                                 equipmenttype.html(data);
                                                                 if(equipmenttype.val() > 0){
                                                                     $.ajax({
                                                                         url: "/admin/filter-main/filter?id="+(equipmenttype.val())+"&model=equipment_type&modelmain="+model_id,
                                                                         type: "get",
                                                                         dataType: "html",
                                                                         success: function(data){
                                                                         
                                                                             equipmentmanufacturer.html(data);
                                                                         }
                                                                     });
                                                                 }
                                                             }
                                                         });
                                                     }
                                                 }
                                             });
                                         }
                                     }
                                 });
                             }
                         }
                     });
                }
             }
             }
         });
     }
 }

    direction.change(function(){
        
        themetech.html(optionTemplate);
        directionthemes.html(optionTemplate);
        directionthemesattr.html(optionTemplate);
        directionsubthemes.html(optionTemplate);
        techoperations.html(optionTemplate);
        equipmenttype.html(optionTemplate);
        equipmentmanufacturer.html(optionTemplate);
        operationattributes.html(optionTemplate);
    
        loadFiltersList();
        
    });
    
    directionthemes.change(function(){
        theme_img.attr("src", "");
        if(theme_attribute_checkbox[0].checked){

            if(directionthemes_type.val() == 1){
                $.ajax({
                    url: "/admin/filter-main/filter?id="+directionthemes.val()+"&model=themes_attr_parent&modelmain="+model_id,
                    type: "get",
                    dataType: "json",
                    success: function(data){
                        theme_img.attr("src", "/"+data.themeImg);
                        directionthemesattrparent.html(data.template);
                        directionthemesattrparent.trigger("change");
                    }
                });
            }else{
                $.ajax({
                    url: "/admin/filter-main/filter?id="+directionthemes.val()+"&model=themes_attr_parent_equipment&modelmain="+model_id,
                    type: "get",
                    dataType: "json",
                    success: function(data){
                        theme_img.attr("src", "/"+data.themeImg);
                        directionthemesattrparent.html(data.template);
                        directionthemesattrparent.trigger("change");
                    }
                });
            }
        }else{
            directionthemesattrparent.html(optionTemplate);
            directionthemesattr.html(optionTemplate);
            if(directionthemes_type.val() == 2){
                $.ajax({
                    url: "/admin/filter-main/filter?id="+(directionthemes.val())+"&model=direction_themes_sub&modelmain="+model_id,
                    type: "get",
                    dataType: "JSON",
                    success: function(data){
                        console.log(data);
                        theme_img.attr("src", "/"+data.themeImg);
                        directionsubthemes.html(data.template);
                        directionsubthemes.trigger("change");
                    }
                });
            }else if(directionthemes_type.val() == 1){
                $.ajax({
                    url: "/admin/filter-main/filter?id="+(directionthemes.val())+"&model=direction_themes&modelmain="+model_id,
                    type: "get",
                    dataType: "json",
                    success: function(data){
                        themetech.html(data.template);
                        theme_img.attr("src", "/"+data.themeImg);
                        themetech.trigger("change");
                    }
                });
            }
        }
    });

    directionthemesattrparent.change(function(){
        if(directionthemes_type.val() == 2){
            $.ajax({
                url: "/admin/filter-main/filter?id="+directionthemesattrparent.val()+"&model=themes_attr_equipment&modelmain="+model_id,
                type: "get",
                dataType: "html",
                success: function(data){
                 
                    directionthemesattr.html(data);
                }
            });
        }else{
            $.ajax({
                url: "/admin/filter-main/filter?id="+directionthemesattrparent.val()+"&model=themes_attr&modelmain="+model_id,
                type: "get",
                dataType: "html",
                success: function(data){
           
                    directionthemesattr.html(data);
                }
            });
        }
    });

    directionsubthemes.change(function(){
        $.ajax({
            url: "/admin/filter-main/filter?id="+($(this).val())+"&model=sub_themes&modelmain="+model_id,
            type: "get",
            dataType: "html",
            success: function(data){
     
                themetech.html(data);
                themetech.trigger("change");
            }
        });
    });

    themetech.change(function(){
        $.ajax({
            url: "/admin/filter-main/filter?id="+($(this).val())+"&model=theme_tech&modelmain="+model_id,
            type: "get",
            dataType: "html",
            success: function(data){
                techoperations.html(data);
                techoperations.trigger("change");
            }
        });
    });

    techoperations.change(function(){
    
        if(directionthemes_type.val() == 1){
            $.ajax({
                url: "/admin/filter-main/filter?id="+($(this).val())+"&model=tech_operations_s&modelmain="+model_id,
                type: "get",
                dataType: "html",
                success: function(data){
                    operationattributes.html(data);
                    operationattributes.trigger("change");
                }
            });
        }else if(directionthemes_type.val() == 2){
            $.ajax({
                url: "/admin/filter-main/filter?id="+($(this).val())+"&model=tech_operations_e&modelmain="+model_id,
                type: "get",
                dataType: "html",
                success: function(data){
                    equipmenttype.html(data);
                    equipmenttype.trigger("change");
                }
            });
        }
    });

    equipmenttype.change(function(){
        $.ajax({
            url: "/admin/filter-main/filter?id="+($(this).val())+"&model=equipment_type&modelmain="+model_id,
            type: "get",
            dataType: "html",
            success: function(data){
                equipmentmanufacturer.html(data);
            }
        });
    });

    directionthemes_type.on("change", function (e) {

        directionthemes.html(optionTemplate);
        directionthemesattr.html(optionTemplate);
        directionthemesattrparent.html(optionTemplate);
        directionsubthemes.html(optionTemplate);
        themetech.html(optionTemplate);
        techoperations.html(optionTemplate);
        equipmenttype.html(optionTemplate);
        equipmentmanufacturer.html(optionTemplate);
        operationattributes.html(optionTemplate);
        directionthemesattr.html(optionTemplate);
        
        directionthemesattr_ru.find("input").val("");
        directionthemesattr_en.find("input").val("");
        directionthemesattr_ua.find("input").val(""); 
        directionthemesattrParent_ru.find("input").val("");
        directionthemesattrParent_en.find("input").val("");
        directionthemesattrParent_ua.find("input").val("");
        DirectionThemes_ru.find("input").val("");
        DirectionThemes_en.find("input").val("");
        DirectionThemes_ua.find("input").val("");
        DirectionSubThemes_en.find("input").val("");
        DirectionSubThemes_ua.find("input").val("");
        DirectionSubThemes_ru.find("input").val("");
        DirectionSubThemes_en.find("input").val("");
        DirectionSubThemes_ua.find("input").val("");
        ThemeTech_ru.find("input").val("");
        ThemeTech_en.find("input").val("");
        ThemeTech_ua.find("input").val("");
        TechOperations_ru.find("input").val("");
        TechOperations_en.find("input").val("");
        TechOperations_ua.find("input").val("");
        EquipmentType_ru.find("input").val("");
        EquipmentType_en.find("input").val("");
        EquipmentType_ua.find("input").val("");
        EquipmentManufacturer_ru.find("input").val("");
        EquipmentManufacturer_en.find("input").val("");
        EquipmentManufacturer_ua.find("input").val("");
        OperationAttributes_ru.find("input").val("");
        OperationAttributes_en.find("input").val("");
        OperationAttributes_ua.find("input").val("");
            
        loadFiltersList();
        
        attributeCheckbox();
    });

    $(".tab-content .tab-pane2").each(function(){
        $(this).addClass("item2");
    });

    $("#NavTabs li a").click(function(e){

        e.preventDefault();

        aaa($(this));

    });

    function aaa (t){

        t.parent().addClass("active");
        t.parent().siblings().removeClass("active");

        var b_id = t.attr("href");

        if($(b_id).length > 0){

            $(b_id).addClass("active2");
            $(b_id).siblings().removeClass("active2");

        }

    }
')
?>
