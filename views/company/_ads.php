
<div class="company-tender  company-tender_activity  background-color-white">
    <div class="company-tender__title  content-text  content-text_tender">
        <h3>Объявления</h3>
        <p>В таблице показана информация по вашим объявлениям. На данный момент вы можете разместить объявления о покупке или продаже Б/У оборудования или разместить вакансию. Пожалуйста, выберете необходимое действие по ссылкам после таблице и заполните простую форму</p>
    </div>

    <?php

    use yii\helpers\Html;
    use yii\helpers\Url;

    $values = [
        'created' => t('Дата'),
        'type' => t('Тип'),
        'ads' => t('Обьявление'),
        'status' => t('Статус'),
    ];

    $current = Yii::$app->request->get('sort');

    ?>
    <div class="company-table-wrap">
        <table class="company-table">
            <thead class="company-table__thead-title-flex">
            <tr>
                <?php foreach($values as $index=>$value):?>
                    <th>
                        <div class="company-table__th-in  company-table__th-in_<?= $index == 'created' ? 'date' : 'type_ads' ?> flex  align-items-center">
                            <?= $value ?>
                            <a href="<?= Html::encode(Url::current(['sort' => $index ?: null])) ?>" class="company-table__ranging  ranging<?= $index == $current ? ' active' : '' ?>">
                                <span class="ranging__span"><i class="fa fa-caret-up"></i></span>
                                <span class="ranging__span"><i class="fa fa-caret-down"></i></span>
                            </a>
                        </div>
                    </th>
                <?php endforeach;?>
                <th>
                    <div class="company-table__th-in  company-table__th-in_ads-actions  flex  align-items-center"><?=t('Действия')?>

                    </div>
                </th>
            </tr>
            </thead>
            <?php if(!empty($model)):?>
                 <tbody>
            <?php foreach($model as $ad):?>
            <?php
                if($ad->status ==\app\models\CompanyAds::STATUS_NOACTIVE){
                    $class = '';
                    $button_class = 'open';
                    $name = t('Открыто');
                }else{
                    $class = 'disabled';
                    $button_class = 'close';
                    $name = t('Закрыто');
                }
            ?>
            <tr id="<?='AdTr'.$ad->id?>" class="<?=$class?>">
                    <td>
                        <div class="company-table__td-in  company-table__td-in_date"><?=$ad->getDate()?></div>
                    </td>
                    <td>
                        <div class="company-table__td-in  company-table__td-in_type_ads"><?=$ad->getType()?></div>
                    </td>
                    <td>
                        <div class="company-table__td-in  company-table__td-in_ads"><a href="<?=$ad->getSingleLink()?>"><?=$ad->getName()?></a></div>
                    </td>
                    <td>
                        <div class="company-table__td-in  company-table__td-in_status"><div class="company-table__status_<?=$button_class?>"><?=$name?></div></div>
                    </td>
                    <td>
                        <div class="company-table__td-in  company-table__td-in_ads-actions">
                            <button class="company-table__btn  background-color-red event-close" data-ad_id="<?=$ad->id?>" data-toggle="tooltip"  data-placement="top" title="отказ от запроса"><i class="fa fa-times" aria-hidden="true"></i></button>
                        </div>
                    </td>
            </tr>
            <?php endforeach;?>
            </tbody>
            <?php endif; ?>
        </table>
    </div>
    <div class="content-text content-text_tender  text-center  col-md-10  block-centered  block-margin-adaptive">
        <h3>Совет:</h3>
        <p>Чтобы разместить привлекательное объявление о продаже Б/У оборудования и быстрее найти покупателя, сделайте до 5 фото Вашего оборудования с лучших ракурсов, уточните модель, производителя, наработку, год выпуска и комплектацию. А также подумайте заранее, по какой цене вы хотели бы продать данное оборудование. После этого смело заполняйте форму на нашем сайте и покупатели не заставят себя ждать!</p>
    </div>
    <div class="adds-public-menu">
        <ul>
            <li class="adds-hover"><a href="#">Опубликовать объявление о покупке Б/У оборудования</a></li>
            <li class="adds-hover"><a href="<?=Url::to('/main/vacancy-form')?>">Опубликовать новую вакансию</a></li>
            <li class="adds-hover"><a href="#">Опубликовать объявление о покупке Б/У оборудования</a></li>
        </ul>
    </div>
</div>
<?php
$js =<<<JS
$('li.adds-hover').hover(function(){
    $(this).addClass('active');
  
},function(){{
    $(this).removeClass('active');
}}
)
$('button.company-table__btn.background-color-red.event-close').on('click',function() {
    var _this = $(this);
    var id = _this.data('ad_id');
  		$.ajax({
				url: "/company/status-close/",
				type: "post",
				data:{id:id},
				success: function(data){
				    
				}
			});
  		$('#AdTr'+id).remove();
})
JS;
$this->registerJs($js);




?>
