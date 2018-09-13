<?php //if($model->company_variant_id == \app\models\CompanyInfo::COMPANY_TYPE_MAX):?>
<div class="company-tender  company-tender_activity  background-color-white  ">
    <div class="company-tender__title  content-text"><h3>Рекламные акции</h3></div>
    <div class="company-table-wrap">
        <table class="company-table">
            <thead>
            <tr>
                <th><div class="company-table__th-in  company-table__th-in_date">Дата</div></th>
                <th><div class="company-table__th-in  company-table__th-in_info">Информация об акции</div></th>
                <th><div class="company-table__th-in  company-table__th-in_action">Действия</div></th>
            </tr>
            </thead>
            <tbody>
            <?php use yii\helpers\Url;

            if(!empty($model)):?>
                <?php foreach($model as $sale):?>
                    <tr id="saleId<?=$sale->id?>">
                        <td>
                            <div class="company-table__td-in  company-table__td-in_date"><?=$sale->getDate()?></div>
                        </td>
                        <td>
                            <div class="company-table__td-in  company-table__td-in_info">
                                <img src="<?=$sale->getPhotos()?>" alt="">
                                <h3><?=$sale->getUserTitle()?></h3>
                                <p><?=$sale->getUserText()?></p>
                            </div>
                        </td>
                        <td>
                            <div class="company-table__td-in  company-table__td-in_action">
                                <a class="company-table__btn  company-table__btn_edit  background-color-green"  href="<?=Url::to(['main/news-update','id'=>$sale->id])?>" data-toggle="tooltip"  data-placement="top" title="Редактировать"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <button class="company-table__btn  background-color-red sale-event"  data-sale_id ="<?=$sale->id?>" data-fancybox="" data-src="#close-post" data-toggle="tooltip" data-modal="true" data-placement="top" title="отказ от запроса"><i class="fa fa-times" aria-hidden="true"></i></button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach;?>
            <?php endif;?>
            </tbody>
        </table>
    </div>
    <div class="content-text content-text_tender  text-center">
        <button   data-fancybox="" data-src="#qwerty" data-modal="true" class="btn-add  btn-add_activity_page">
            <i class="fa fa-plus" aria-hidden="true"></i>
        </button>
        <p>Чтобы добавить новую рекламную акцию, пожалуйста, нажмите кнопку «Добавить акцию». В открывшейся форме выберете Направление, к которому относится данная рекламная акция, заполните Название акции, Аннотацию (суть Вашего предложения) и вставьте изображение или фото для привлечения дополнительного внимания</p>
    </div>
</div>
<div class="header-popup  header-popup_pay_form" id="close-post">
    <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times" aria-hidden="true"></i></button>
    <div class="register-form-box__btns  flex  justify-content-center">
        <button type="submit" id="eventSaleButton" class="register-form-box__btn  button  button_red"><?=t('Вы точно хотите удалит?')?></button>
        <button  data-fancybox-close="" class="register-form-box__btn  register-form-box__btn_back  btn  btn-clear"><?=t('Назад')?></button>
    </div>
</div>
    <div class="popup_windows_wrap  header-popup" id="qwerty">

        <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times" aria-hidden="true"></i></button>
        <div class="publishing">
            <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times" aria-hidden="true"></i></button>
            <?php $form = \yii\widgets\ActiveForm::begin(
                [
                    'options'=>['class'=>'publishing-form','enctype' => 'multipart/form-data'],
                    'action'=>'/main/add-publish',
                    'id'=>'saleAdvertisiment',
                ]
            )?>
            <div class="publishing-form__title-main  content-text">
                <h2>Размещение Рекламные акции</h2>
            </div>
            <div class="row">
                <div class="col-sm-6  col-md-4  content-text  content-text_medium">
                    <h3>Направление</h3>
                    <?= $form->field($request,'category_id',[
                        'template'=>'
                        {input}
                         <p class=\'help-block help-block-error\'></p>
                        '
                    ])->dropDownList($mainCats,['class'=>'select'])->label(false)?>
                    <p>Выберете направление, к которому относится данная публикация</p>
                </div>
                <div class="col-sm-6  col-md-4  content-text">
                    <h3>Тип публикации</h3>
                    <?= $form->field($request,'type_id',[
                        'template'=>'
                        {input}
                         <p class=\'help-block help-block-error\'></p>
                        '
                    ])->dropDownList([\app\models\News::SALE_ADVERTISEMENT=>\app\models\News::Type(\app\models\News::SALE_ADVERTISEMENT)],['class'=>'select'])->label(false)?>
                </div>
                <div class="col-sm-6  col-md-4  content-text">
                    <h3>Название</h3>
                    <?=$form->field($request,'title_ru',[
                        'template'=>
                            '
                                <p class=\'help-block help-block-error\'></p>
                               <div class="input-wrap">
                                  {input}
                              </div>
                                    '
                    ])->textInput(['class'=>'input','placeholder'=>t('Введите название публикации')])->label(false)?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="block-margin-adaptive  input-file-wrap  input-file-wrap_main-img">
                        <div class="content-text">
                            <h3>Аннотация</h3>
                        </div>
                        <div class="input-wrap">
                            <?=$form->field($request,'anotation_ru',[
                                'template'=>
                                    '
                                <p class=\'help-block help-block-error\'></p>
                               <div class="input-wrap">
                                      <label for="newsforms-imagefile" class="input-wrap__label-file  label-anchor"><i class="fa fa-upload" aria-hidden="true"></i></label>
                                      <input type="file" id="newsforms-imagefile" name="NewsForm[imageFile]" class="input-file-wrap__input input-file-wrap__input_hidden addImages">
                                  {input}
                              </div>
                                    '
                            ])->textarea(['class'=>'textarea  textarea_small  margin-b-10','placeholder'=>t('Опишите кратко о чём данная публикация')])->label(false)?>
                        </div>
                        <div class="content-text  content-text_medium">
                            <p class="input-file-wrap__description">Вставьте изображение или фото для привлечения дополнительного внимания</p>
                            <ul class="input-file-wrap__list  uploadImagesList">
                                <li class="input-file-wrap__item template"><span class="delete-link" title="Удалить">Удалить</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-wrap justify-content-center">
                <a class="button button_blue button_side_margin" style="color:white" >Отмена</a>
                <input type="submit" value="Добавить новость" class="button button_blue button_side_margin">
            </div>
            <?php \yii\widgets\ActiveForm::end()?>
        </div>
    </div>

<?php //endif;?>

<?php
$js =<<<JS
$('.company-table__btn.background-color-red.sale-event').on('click',function() {
    id = $(this).data('sale_id');
    $('#eventSaleButton').attr("data-sale_id",id);
  });
$('#eventSaleButton').on('click',function() {
    $.ajax({
        url: "/company/news-delete/",
        type: "post",
        data:{id:id},
        success: function(data){
            console.log(data);
            $('#saleId'+id).remove();
        }
    });
    $('.header-popup__btn-close.btn-clear').trigger('click');
});
$('.button.button_blue.button_side_margin').on('click',function() {
        $('.header-popup__btn-close.btn-clear').trigger('click');
})
JS;
$this->registerJs($js);
?>
