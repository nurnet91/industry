<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchFilterMainEquipment */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сортировка позиций фильтров';
$this->params['breadcrumbs'][] = ['label' => 'Направления', 'url' => ['/admin/directions']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Сортировка позиций фильтров';
?>

    <h1><?= Html::encode($this->title) ?></h1>

<?php $this->registerCssFile('/css/style_sort.css') ?>



<div class="filter-main-form">

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success', 'id' => 'pos_submit']) ?>
    </div>

    <div class="cf nestable-lists">

        <menu id="nestable-menu">
            <button type="button" class="btn btn-info" data-action="expand-all">Развернуть</button>
            <button type="button" class="btn btn-danger" data-action="collapse-all">Свернуть</button>
        </menu>

        <div class="dd" id="nestable">
            <ol class="dd-list">
                <?php foreach ($directions as $direction): ?>
                    <li class="dd-item" data-id="<?= $direction->id ?>" data-filter_name="<?= \app\models\Directions::className() ?>">
                        <div class="dd-handle" style="background: #007ba8; color: #fff" ><?= $direction->name ?></div>
<!--                        <i class="item_remove_btn glyphicon glyphicon-remove" style="color: #fff; padding: 8px; right: 0; position: absolute"></i>-->

                        <?php if ($direction->subs): ?>
                            <ol class="dd-list">
                                <?php foreach ($direction->subs as $directionSubs): ?>
                                    <li class="dd-item" data-id="<?= $directionSubs->theme->id ?>" data-filter_name="<?= \app\models\FilterThemes::className() ?>">
                                        <div class="dd-handle"
                                             style="background: #009fa8; color: #fff"><?= $directionSubs->theme->name ?></div><i class="item_remove_btn glyphicon glyphicon-remove" style="color: #fff; padding: 8px; right: 0; position: absolute"></i>
                                        <!--//////////////////////////////////////////////////////////////
                                        //////////////////////////////////////////////////////////////-->
                                        <?php if ($directionSubs->theme->subsEquipment): ?>
                                            <ol class="dd-list">
                                                <?php foreach ($directionSubs->theme->subsEquipment as $eThemeSubs): ?>
                                                    <li class="dd-item" data-id="<?= $eThemeSubs->subTheme->id ?>" data-filter_name="<?= \app\models\FilterSubThemes::className() ?>">
                                                        <div class="dd-handle"
                                                             style="background: #5ea800; color: #fff"><?= $eThemeSubs->subTheme->name ?></div><i class="item_remove_btn glyphicon glyphicon-remove" style="color: #fff; padding: 8px; right: 0; position: absolute"></i>
                                                        <?php if ($eThemeSubs->subTheme->subs): ?>
                                                            <ol class="dd-list">
                                                                <?php foreach ($eThemeSubs->subTheme->subs as $themeSubTheme): ?>
                                                                    <li class="dd-item" data-id="<?= $themeSubTheme->technology->id ?>" data-filter_name="<?= \app\models\FilterTechnologies::className() ?>">
                                                                        <div class="dd-handle"
                                                                             style="background: #a8009e; color: #fff"><?= $themeSubTheme->technology->name ?></div><i class="item_remove_btn glyphicon glyphicon-remove" style="color: #fff; padding: 8px; right: 0; position: absolute"></i>
                                                                        <?php if ($themeSubTheme->technology->subs): ?>
                                                                            <ol class="dd-list">
                                                                                <?php foreach ($themeSubTheme->technology->subs as $subThemeTech): ?>
                                                                                    <li class="dd-item" data-id="<?= $subThemeTech->operation->id ?>" data-filter_name="<?= \app\models\FilterOperations::className() ?>">
                                                                                        <div class="dd-handle"
                                                                                             style="background: #a6a800; color: #fff"><?= $subThemeTech->operation->name ?></div><i class="item_remove_btn glyphicon glyphicon-remove" style="color: #fff; padding: 8px; right: 0; position: absolute"></i>
                                                                                        <?php if ($subThemeTech->operation->subsService): ?>
                                                                                            <ol class="dd-list">
                                                                                                <?php foreach ($subThemeTech->operation->subsService as $sTechOperation): ?>
                                                                                                    <li class="dd-item" data-id="<?= $sTechOperation->operationAttributes->id ?>" data-filter_name="<?= \app\models\FilterAttributes::className() ?>">
                                                                                                        <div class="dd-handle" style="background: #1ba831; color: #fff"><?= $sTechOperation->operationAttributes->name ?></div><i class="item_remove_btn glyphicon glyphicon-remove" style="color: #fff; padding: 8px; right: 0; position: absolute"></i>
                                                                                                    </li>
                                                                                                <?php endforeach; ?>
                                                                                            </ol>
                                                                                        <?php endif; ?>
                                                                                        <!--//////////////////////////////////////////////////////////////
                                                                                        //////////////////////////////////////////////////////////////-->
                                                                                        <?php if ($subThemeTech->operation->subsEquipment): ?>
                                                                                            <ol class="dd-list">
                                                                                                <?php foreach ($subThemeTech->operation->subsEquipment as $eTechOperation): ?>
                                                                                                    <li class="dd-item" data-id="<?= $eTechOperation->eType->id ?>" data-filter_name="<?= \app\models\FilterEquipmentTypes::className() ?>">
                                                                                                        <div class="dd-handle" style="background: #1ba831; color: #fff"><?= $eTechOperation->eType->name ?></div><i class="item_remove_btn glyphicon glyphicon-remove" style="color: #fff; padding: 8px; right: 0; position: absolute"></i>

                                                                                                        <?php if ($eTechOperation->eType->subs): ?>
                                                                                                            <ol class="dd-list">
                                                                                                                <?php foreach ($eTechOperation->eType->subs as $operationType): ?>
                                                                                                                    <li class="dd-item" data-id="<?= $operationType->eManufacturer->id ?>" data-filter_name="<?= \app\models\FilterEquipmentManufacturers::className() ?>">
                                                                                                                        <div class="dd-handle" style="background: #a81e27; color: #fff"><?= $operationType->eManufacturer->name ?></div><i class="item_remove_btn glyphicon glyphicon-remove" style="color: #fff; padding: 8px; right: 0; position: absolute"></i>
                                                                                                                    </li>
                                                                                                                <?php endforeach; ?>
                                                                                                            </ol>
                                                                                                        <?php endif; ?>
                                                                                                    </li>
                                                                                                <?php endforeach; ?>
                                                                                            </ol>
                                                                                        <?php endif; ?>
                                                                                    </li>
                                                                                <?php endforeach; ?>
                                                                            </ol>
                                                                        <?php endif; ?>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            </ol>
                                                        <?php endif; ?>
                                                    </li>
                                                <?php endforeach; ?>

                                            <?php if (!$directionSubs->theme->subsEquipmentAttrParent): ?>
                                                </ol>
                                            <?php endif; ?>

                                        <?php endif; ?>
                                        <!--//////////////////////////////////////////////////////////////
                                        //////////////////////////////////////////////////////////////-->
                                        <?php if ($directionSubs->theme->subsEquipmentAttrParent): ?>

                                            <?php if (!$directionSubs->theme->subsEquipment): ?>
                                                <ol class="dd-list">
                                            <?php endif; ?>

                                                <?php foreach ($directionSubs->theme->subsEquipmentAttrParent as $DirectionThemeAttrParent): ?>
                                                    <li class="dd-item" data-id="<?= $DirectionThemeAttrParent->themeAttrParent->id ?>"  data-filter_name="<?= \app\models\FilterThemesAttrParent::className() ?>">
                                                        <div class="dd-handle"
                                                             style="border: 3px dashed #ff7241; background: #589ca8; color: #fff"><?= $DirectionThemeAttrParent->themeAttrParent->name ?></div><i class="item_remove_btn glyphicon glyphicon-remove" style="color: #fff; padding: 8px; right: 0; position: absolute"></i>
                                                        <?php if ($DirectionThemeAttrParent->themeAttrParent->subsEquipmentAttr): ?>
                                                            <ol class="dd-list">
                                                                <?php foreach ($DirectionThemeAttrParent->themeAttrParent->subsEquipmentAttr as $child): ?>
                                                                    <li class="dd-item" data-id="<?= $child->themeAttr->id ?>" data-filter_name="<?= \app\models\FilterThemesAttributes::className() ?>">
                                                                        <div class="dd-handle"
                                                                             style="border: 3px dashed #ff7241; background: #589ca8; color: #fff"><?= $child->themeAttr->name ?></div><i class="item_remove_btn glyphicon glyphicon-remove" style="color: #fff; padding: 8px; right: 0; position: absolute"></i>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            </ol>
                                                        <?php endif; ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ol>
                                        <?php endif; ?>
                                        <!--//////////////////////////////////////////////////////////////
                                        //////////////////////////////////////////////////////////////-->
                                        <?php if ($directionSubs->theme->subsService): ?>
                                            <ol class="dd-list">
                                                <?php foreach ($directionSubs->theme->subsService as $themeTechService): ?>
                                                    <li class="dd-item" data-id="<?= $themeTechService->technology->id ?>" data-filter_name="<?= \app\models\FilterTechnologies::className() ?>">
                                                        <div class="dd-handle"
                                                             style="background: #a8009e; color: #fff"><?= $themeTechService->technology->name ?></div><i class="item_remove_btn glyphicon glyphicon-remove" style="color: #fff; padding: 8px; right: 0; position: absolute"></i>
                                                        <?php if ($themeTechService->technology->subs): ?>
                                                            <ol class="dd-list">
                                                                <?php foreach ($themeTechService->technology->subs as $techOperationService): ?>
                                                                    <li class="dd-item" data-id="<?= $techOperationService->operation->id ?>" data-filter_name="<?= \app\models\FilterOperations::className() ?>">
                                                                        <div class="dd-handle"
                                                                             style="background: #a6a800; color: #fff"><?= $techOperationService->operation->name ?></div><i class="item_remove_btn glyphicon glyphicon-remove" style="color: #fff; padding: 8px; right: 0; position: absolute"></i>
                                                                        <?php if ($techOperationService->operation->subsService): ?>
                                                                            <ol class="dd-list">
                                                                                <?php foreach ($techOperationService->operation->subsService as $TechOperationAttribute): ?>
                                                                                    <li class="dd-item" data-id="<?= $TechOperationAttribute->operationAttribute->id ?>" data-filter_name="<?= \app\models\FilterAttributes::className() ?>">
                                                                                        <div class="dd-handle" style="background: #40a858; color: #fff"><?= $TechOperationAttribute->operationAttribute->name ?></div><i class="item_remove_btn glyphicon glyphicon-remove" style="color: #fff; padding: 8px; right: 0; position: absolute"></i>
                                                                                    </li>
                                                                                <?php endforeach; ?>
                                                                            </ol>
                                                                        <?php endif; ?>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            </ol>
                                                        <?php endif; ?>
                                                    </li>
                                                <?php endforeach; ?>

                                                <?php if (!$directionSubs->theme->subsServiceAttrParent): ?>
                                                </ol>
                                                <?php endif; ?>

                                        <?php endif; ?>
                                        <!--//////////////////////////////////////////////////////////////
                                        //////////////////////////////////////////////////////////////-->
                                        <?php if ($directionSubs->theme->subsServiceAttrParent): ?>

                                            <?php if (!$directionSubs->theme->subsService): ?>
                                                <ol class="dd-list">
                                            <?php endif; ?>

                                                <?php foreach ($directionSubs->theme->subsServiceAttrParent as $attrParentService): ?>
                                                    <li class="dd-item" data-id="<?= $attrParentService->themeAttrParent->id ?>" data-filter_name="<?= \app\models\FilterThemesAttrParent::className() ?>">
                                                        <div class="dd-handle" style="border: 3px dashed #ff7241; background: rgba(255,114,65,0.79); color: #fff"><?= $attrParentService->themeAttrParent->name ?></div><i class="item_remove_btn glyphicon glyphicon-remove" style="color: #fff; padding: 8px; right: 0; position: absolute"></i>
                                                        <?php if ($attrParentService->themeAttrParent->subsServiceAttr): ?>
                                                            <ol class="dd-list">
                                                                <?php foreach ($attrParentService->themeAttrParent->subsServiceAttr as $themeAttrService): ?>
                                                                    <li class="dd-item" data-id="<?= $themeAttrService->themeAttr->id ?>" data-filter_name="<?= \app\models\FilterThemesAttributes::className() ?>">
                                                                        <div class="dd-handle" style="border: 3px dashed #ff7241; background: rgba(255,114,65,0.51); color: #fff "><?= $themeAttrService->themeAttr->name ?></div><i class="item_remove_btn glyphicon glyphicon-remove" style="color: #fff; padding: 8px; right: 0; position: absolute"></i>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            </ol>
                                                        <?php endif; ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ol>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ol>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </div>

</div>

<?php $this->registerJs("

        var list;

        var updateOutput = function (e) {
            list = e.length ? e : $(e.target),
                output = list.data('output');

            

            if (window.JSON) {
                output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
            } else {
                output.val('JSON browser support required for this demo.');
            }
        };
        
        var submitBtn = $('#pos_submit');

        submitBtn.click(function() {
            $.ajax({
                url: '/admin/filter-main/sorting',
                type: 'POST',
                data: {
                    data: list.nestable('serialize'),
                    _csrf : '<?=Yii::$app->request->getCsrfToken()?>'
                    },
                success: function(data){

                }
            });
        });
        
        var removeBtn = $('.item_remove_btn');

        removeBtn.click(function() {  
            
            var data = [],
                self = $(this),
                resultActionUser = confirm('Вы действительно хотите удалить фильтр \"'+ $(self).prev('div').text()+'\" и все его вложенности?');
            
//            

            if (resultActionUser) {
                
                self.closest('li').nestable('serialize');
                
                data.push([self.closest('li').attr('data-id'), self.closest('li').attr('data-filter_name')]);
    
                self.closest('li').find('li').each(function(c,v) {
                  data.push([$(v).attr('data-id'), $(v).attr('data-filter_name')]);
                });
                    
                  $.ajax({
                        url: '/admin/filter-main/remove-sort-item',
                        type: 'POST',
                        data: {
                            main: self.closest('li').nestable('serialize'),
                            ids: data,
                            _csrf : '<?=Yii::$app->request->getCsrfToken()?>'
                            },
                        success: function(data){
                            if(data){
                                console.log(data);
                                self.closest('li').remove();
                            }else{
                                
                            }
                        }
                });
            }
            
        });
        
        // activate Nestable for list 1
        $('#nestable').nestable({
            maxDepth: 11,
            group: 0
        })
            .on('change', updateOutput);

        // output initial serialised data
        updateOutput($('#nestable').data('output', $('#nestable-output')));

        $('#nestable-menu').on('click', function (e) {
            var target = $(e.target),
                action = target.data('action');
            if (action === 'expand-all') {
                $('.dd').nestable('expandAll');
            }
            if (action === 'collapse-all') {
                $('.dd').nestable('collapseAll');
            }
        });

")


?>
