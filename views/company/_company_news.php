<?php use yii\helpers\Url;

if($model->company_variant_id !== \app\models\CompanyInfo::COMPANY_TYPE_BUSINESS):?>
<div class="company-tender  company-tender_activity  background-color-white">
    <div class="company-tender__title  content-text  content-text_tender"><h3>Новости компании</h3></div>
    <div class="company-table-wrap">
        <table class="company-table">
            <thead>
            <tr>
                <th><div class="company-table__th-in  company-table__th-in_date">Дата</div></th>
                <th><div class="company-table__th-in  company-table__th-in_info">Информация о новости</div></th>
                <th><div class="company-table__th-in  company-table__th-in_action">Действия</div></th>
            </tr>
            </thead>
            <?php if(!empty($model)):?>
                <tbody>
                    <?php foreach($model as $new):?>
                        <tr>
                            <td>
                                <div class="company-table__td-in  company-table__td-in_date"><?=$new->getDate()?></div>
                            </td>
                            <td>

                                <div class="company-table__td-in  company-table__td-in_info">
                                    <img src="<?=$new->getPhotos()?>" alt="">
                                    <h3><?=$new->getUserTitle()?></h3>
                                    <p><?=$new->getUserText()?></p>
                                    <div class="user-actions">
                                        <div class="user-actions__in  flex">
                                            <div class="user-actions__item">
                                                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                <span><?=$new->countLikes?></span>
                                            </div>
                                            <div class="user-actions__item">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                <span><?=$new->getView()?></span>
                                            </div>
                                            <div class="user-actions__item">
                                                <i class="fa fa-comment" aria-hidden="true"></i>
                                                <span><?=$new->comments?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="company-table__td-in  company-table__td-in_action">
                                    <a href="<?=Url::to(['main/news-update','id'=>$new->id])?>" class="company-table__btn  company-table__btn_edit  background-color-green button_items-update"  data-toggle="tooltip" data-new_id="<?=$new->id?> "data-placement="top" title="Редактировать"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            <?php endif;?>
        </table>
    </div>
    <div class="content-text content-text_tender  text-center">
        <button data-fancybox="" data-src="#companyNews" data-modal="true" class="btn-add  btn-add_activity_page">
            <i class="fa fa-plus" aria-hidden="true"></i>
        </button>
        <p>Чтобы опубликовать новость, пожалуйста, нажмите кнопку «Добавить новость». В открывшейся форме выберете Направление, к которому относится данная новость, заполните Название новости, Аннотацию (основную суть новости), текст новости и вставьте изображение или фото для привлечения дополнительного внимания</p>
    </div>
</div>
    <div class="popup_windows_wrap  header-popup" id="companyNews">

        <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times" aria-hidden="true"></i></button>
        <div class="publishing">
            <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times" aria-hidden="true"></i></button>
            <?php $form = \yii\widgets\ActiveForm::begin(
                [
                    'options'=>['class'=>'publishing-form','enctype' => 'multipart/form-data'],
                    'action'=>'/main/add-publish'
                ]
            )?>
            <div class="publishing-form__title-main  content-text">
                <h2>Размещение Новости Компании</h2>
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
                    ])->dropDownList([\app\models\News::COMPANY_NEWS_RU=>\app\models\News::Type(\app\models\News::COMPANY_NEWS_RU)],['class'=>'select'])->label(false)?>
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
                                      <label for="newsform-imagefile" class="input-wrap__label-file  label-anchor"><i class="fa fa-upload" aria-hidden="true"></i></label>
                                      <input type="file" id="newsform-imagefile" name="NewsForm[imageFile]" class="input-file-wrap__input input-file-wrap__input_hidden addImages">
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

                <div class="col-md-6">
                    <div class="block-margin-adaptive">
                        <div class="content-text">
                            <h3>Текст новости</h3>
                            <?=$form->field($request,'text_ru')->textarea(['class'=>'textarea  textarea_largest','placeholder'=>t('Текст')])->label(false)?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-wrap justify-content-center">
                <a class="button button_blue button_side_margin" style="color:white">Отмена</a>
                <input type="submit" value="Добавить новость" class="button button_blue button_side_margin">
            </div>
            <?php \yii\widgets\ActiveForm::end()?>
        </div>
    </div>
<?php endif;?>
