
<div class="content">
    <div class="container" style="padding: 40px 0;">
        <!-- <a href="javascript:;" class="gutters" data-fancybox="" data-src="#job-placement" data-modal="true">Кликни по мне! :D</a> -->
        <div class="job-placement">
            <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times" aria-hidden="true"></i></button>
            <?php $form = \yii\widgets\ActiveForm::begin(
                ['options'=>['class'=>'job-placement-form','enctype' => 'multipart/form-data'],
                    'action'=>'/company/edit-vacancy'
                ]
            )?>
            <div class="job-placement-form__title-main  content-text">
                <h2><?=t('Форма размещения вакансий')?></h2>
                <p><?=t('Укажите контактные данные для связи по данному объявлению')?>:</p>
            </div>
            <div class="row  align-items-start">
                <div class="col-sm-6  col-lg-4  content-text">
                    <div class="input-file-wrap  input-file-wrap_main-img">
                        <div class="content-text">
                            <h3><?=t('Компания')?></h3>
                        </div>
                        <div class="input-wrap  input-wrap_margin_none">
                            <?=$form->field($model,'imageFile',[
                                'template'=>
                                    '
                                     <label for="vacancyform-imagefile" class="input-wrap__label-file  label-anchor"><i class="fa fa-upload" aria-hidden="true"></i></label>
                                     {input}
                                    '

                            ])->fileInput(['class'=>'input-file-wrap__input input-file-wrap__input_hidden addImages','data-anchor'])->label(false)?>
                            <?=$form->field($model,'company_name',[
                                'template'=>
                                    '
                                     {input}
                                     <p class=\'help-block help-block-error\'></p>

                                            '

                            ])->textInput(['class'=>'input  input_with_upload_icon','placeholder'=>t('Название компании')])->label(false)?>

                        </div>
                        <ul class="input-file-wrap__list  uploadImagesList">
                            <li class="input-file-wrap__item template"><span class="delete-link" title="Удалить">Удалить</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6  col-lg-4  content-text">
                    <h3><?=t('Название вакансии')?></h3>
                    <?=$form->field($model,'vacancy_name',[
                        'template'=>
                            '                           
                                      <p class=\'help-block help-block-error\'></p>
                                      <div class="input-wrap">
                                        {input}
                                      </div>
                                    '

                    ])->textInput(['class'=>'input','placeholder'=>t('Название вакансии')])?>

                </div>
                <div class="col-sm-6  col-lg-4  content-text margin-t-30">
                    <div class="row align-items-center input-file-wrap  multiple input-file-wrap_vacancy">
                        <div class="col">
                            <div class="input-file-wrap__description"><?=t('Пожалуйста, загрузите файл с описанием вакансии')?></div>
                            <ul class="input-file-wrap__list  uploadImagesList">
                                <li class="input-file-wrap__item template"><span class="delete-link" title="Удалить"><?=t('Удалить')?></span></li>
                            </ul>
                        </div>
                        <div class="gutters">
                            <?=$form->field($model,'dataFile[]',[
                                'template'=>
                                    '
                                    <p class=\'help-block help-block-error\'></p>
                                    <label id="label-id" for="vacancyform-datafile" class="input-file-wrap__label label-file label-anchor"><i class="label-file__fa  fa fa-upload" aria-hidden="true"></i></label>
                                    {input}
                                    '
                            ])->fileInput(['class'=>'input-file-wrap__input input-file-wrap__input_hidden addImages','data-anchor','multiple'=>true])?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="job-placement-form__description  content-text  content-text_medium">
                <p><?=t('При необходимости вы можете поменять название компании и логотип, которые будут показаны в списке на странице вакансий')?></p>
            </div>
            <?=$form->field($model,'link_profile',[
                'template'=>
                    '
                         <p class=\'help-block help-block-error\'></p>
                     <label class="checkbox-label",id="linkCheckbox">
                                {input}
                                <span class="checkbox-label__pseudo-check"></span>
                                <span>'.t('Указать ссылку на профиль компании').'</span>
                      </label>
                              '

            ])->textInput(['class'=>'checkbox-label__input-check','type'=>'checkbox'])?>

            <div class="job-placement-form__btns   row  align-items-center  justify-content-center">
                <button data-fancybox-close="" class="job-placement-form__back  btn-clear  margin-b-10"><?=t('Назад')?></button>
                <input type="submit" value="Сохранить и отправить" class="job-placement-form__submit  button button_blue  margin-b-10">
            </div>
            <?php \yii\widgets\ActiveForm::end() ?>
        </div>
    </div>

</div>