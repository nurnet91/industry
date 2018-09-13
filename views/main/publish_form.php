<?php
if(empty($action)){
    $action = '/main/create-publish';
}
$mainCats = \app\models\Directions::findForMainList();
$mainTypes = \app\models\NewsTypes::findForMainList()?>
<div class="container" style="padding: 40px 0;">
    <!-- <a href="javascript:;" class="gutters" data-fancybox="" data-src="#publishing" data-modal="true">Кликни по мне! :D</a> -->
    <div class="publishing">
        <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times" aria-hidden="true"></i></button>
        <?php $form = \yii\widgets\ActiveForm::begin(
                [
                        'options'=>['class'=>'publishing-form','enctype' => 'multipart/form-data'],
                        'action'=>$action
                ]
        )?>
        <div class="publishing-form__title-main  content-text">
            <h2>Размещение публикации</h2>
        </div>
        <div class="row">
            <div class="col-sm-6  col-md-4  content-text  content-text_medium">
                <h3>Направление</h3>
                <?= $form->field($model,'direction_id',[
                        'template'=>'
                        {input}
                         <p class=\'help-block help-block-error\'></p>
                        '
                ])->dropDownList($mainCats,['class'=>'select'])->label(false)?>
                <p>Выберете направление, к которому относится данная публикация</p>
            </div>
            <div class="col-sm-6  col-md-4  content-text">
                <h3>Тип публикации</h3>
                <?= $form->field($model,'type_id',[
                    'template'=>'
                        {input}
                         <p class=\'help-block help-block-error\'></p>
                        '
                ])->dropDownList($mainTypes,['class'=>'select'])->label(false)?>
            </div>
            <div class="col-sm-6  col-md-4  content-text">
                <h3>Название</h3>
                <?=$form->field($model,'title',[
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
                        <h3>Автор</h3>
                    </div>
                    <div class="input-wrap">
                        <?=$form->field($model,'author',[
                            'template'=>
                                '
                                <p class=\'help-block help-block-error\'></p>
                               <div class="input-wrap">
                                      <label for="publications-logofile" class="input-wrap__label-file  label-anchor"><i class="fa fa-upload" aria-hidden="true"></i></label>
                                      <input type="file" id="publications-logofile" name="Publications[logoFile]" class="input-file-wrap__input input-file-wrap__input_hidden addImages">
                                  {input}
                              </div>
                                    '
                        ])->textInput(['class'=>'input  input_with_upload_icon','placeholder'=>t('ФИО, должность, компания, страна')])->label(false)?>
                    </div>
                    <div class="content-text  content-text_medium">
                        <p class="input-file-wrap__description">Загрузите фото или логотип компании, чтобы повысить свою узнаваемость и доверие к материалу</p>
                        <ul class="input-file-wrap__list  uploadImagesList">
                            <li class="input-file-wrap__item template"><span class="delete-link" title="Удалить">Удалить</span></li>
                        </ul>
                    </div>
                </div>
                <div class="block-margin-adaptive">
                    <div class="row input-file-wrap input-file-wrap_main-img">
                        <div class="gutters margin-b-10">
                            <?=$form->field($model,'imageFile',[
                                'template'=>
                                    '
                                <p class=\'help-block help-block-error\'></p>
                                <label for="publications-imagefile" class="input-file-wrap__add  btn-add label-anchor"><i class="fa fa-plus-square-o" aria-hidden="true"></i></label>
                                {input}  
                                   
                                    '
                            ])->fileInput(['class'=>'input-file-wrap__input input-file-wrap__input_hidden addImages','data-anchor'])->label(false)?>
<!--                            <label for="main-img" class="input-file-wrap__add  btn-add label-anchor"><i class="fa fa-plus-square-o" aria-hidden="true"></i></label>-->
<!--                            <input type="file" name="main-img-main" id="main-img" data-anchor class="input-file-wrap__input input-file-wrap__input_hidden addImages">-->
                        </div>
                        <div class="col-sm margin-b-10">
                            <ul class="input-file-wrap__list  uploadImagesList">
                                <li class="input-file-wrap__item template">
                                    <span class="delete-link" title="Удалить">Удалить</span>
                                </li>
                            </ul>
                            <?=$form->field($model,'sign',[
                                    'template'=>'    
                            <div class="input-wrap">
                               {input}
                            </div>'


                            ])->textInput(['class'=>'input','placeholder'=>t('Подпись к основному изображению')])->label(false);?>

                            <div class="content-text  content-text_medium">
                                <p>Загрузите изображение, которое будет появляться как основное для данной публикации и обязательно подпишите его</p>
                            </div>
                        </div>
                    </div>
                    <?=$form->field($model,'link')->textarea(['class'=>'textarea  textarea_small  margin-b-10'])->label(false)?>
                    <div class="content-text content-text_medium">
                        <p>Вставьте сюда ссылку на видео Youtube,  статью или другую интересную информацию</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="block-margin-adaptive">
                    <div class="content-text">
                        <h3>Аннотация</h3>
                        <?=$form->field($model,'description')->textarea(['class'=>'textarea  textarea_largest','placeholder'=>t('Опишите кратко о чём данная публикация')])->label(false)?>
                    </div>
                </div>
                <div class="row  align-items-center input-file-wrap multiple">
                    <div class="gutters  margin-b-10">
                        <?=$form->field($model,'multiFile[]',[
                            'template'=>
                                '
                                <p class=\'help-block help-block-error\'></p>
                                <label for="publications-multifile" class="input-file-wrap__label  label-file  label-file_large  label-anchor"><i class="label-file__fa  fa fa-upload" aria-hidden="true"></i></label> 
                                {input}  
                                   
                                    '
                        ])->fileInput(['class'=>'input-file-wrap__input input-file-wrap__input_hidden addImages','data-anchor','multiple'=>true])->label(false)?>
                    </div>
                    <div class="col-9  margin-b-10  label-file-descr">
                        <div class="input-file-wrap__description">Загрузите здесь файлы: текст статьи, презентации, видео, архив с фотографиями</div>
                        <ul class="input-file-wrap__list  uploadImagesList">
                            <li class="input-file-wrap__item template"><span class="delete-link" title="Удалить">Удалить</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="editor  block-margin-adaptive">
            <img src="images/images/redactor.jpg" alt="">
        </div>
        <div class="block-margin-adaptive">
            <div class="row">
                <div class="content-text  content-text_medium  col-md-6  col-xl-5">
                    <p>Чтобы пользователи быстрее находили публикацию, выберете необходимые ключевые слова в фильтре</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6  col-lg-4  publishing-form__col  content-text">
                    <h3>Темы</h3>
                    <div class="choise-box-select">
                        <div class="choise-box  h3">
                            <div class="choise-box__in">
                                <label class="checkbox-label">
                                    <input type="checkbox" class="checkbox-label__input-check  select_all_branches">
                                    <span class="checkbox-label__pseudo-check"></span>
                                    <span class="checkbox-label__content-in">Бытовая и промышленная химия</span>
                                </label>
                                <i class="choise-box__caret  fa fa-chevron-down"></i>
                            </div>
                        </div>
                        <div class="site_form  hidden">
                            <label class="choise-box__check-in  checkbox-label">
                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                <span class="checkbox-label__pseudo-check"></span>
                                <span class="checkbox-label__content-in">Операция 1</span>
                            </label>
                            <label class="choise-box__check-in  checkbox-label">
                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                <span class="checkbox-label__pseudo-check"></span>
                                <span class="checkbox-label__content-in">Операция 2</span>
                            </label>
                            <label class="choise-box__check-in  checkbox-label">
                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                <span class="checkbox-label__pseudo-check"></span>
                                <span class="checkbox-label__content-in">Операция 3</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-lg-4  publishing-form__col  content-text">
                    <h3>Технологии</h3>
                    <div class="choise-box-select">
                        <div class="choise-box  h3">
                            <div class="choise-box__in">
                                <label class="checkbox-label">
                                    <input type="checkbox" class="checkbox-label__input-check  select_all_branches">
                                    <span class="checkbox-label__pseudo-check"></span>
                                    <span class="checkbox-label__content-in">Оборудование для испытаний и тестирования</span>
                                </label>
                                <i class="choise-box__caret  fa fa-chevron-down"></i>
                            </div>
                        </div>
                        <div class="site_form  hidden">
                            <label class="choise-box__check-in  checkbox-label">
                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                <span class="checkbox-label__pseudo-check"></span>
                                <span class="checkbox-label__content-in">Операция 1</span>
                            </label>
                            <label class="choise-box__check-in  checkbox-label">
                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                <span class="checkbox-label__pseudo-check"></span>
                                <span class="checkbox-label__content-in">Операция 2</span>
                            </label>
                            <label class="choise-box__check-in  checkbox-label">
                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                <span class="checkbox-label__pseudo-check"></span>
                                <span class="checkbox-label__content-in">Операция 3</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-lg-4  publishing-form__col  content-text">
                    <h3>Операции</h3>
                    <div class="choise-box-select">
                        <div class="choise-box  h3">
                            <div class="choise-box__in">
                                <label class="checkbox-label">
                                    <input type="checkbox" class="checkbox-label__input-check  select_all_branches">
                                    <span class="checkbox-label__pseudo-check"></span>
                                    <span class="checkbox-label__content-in">Оборудование для испытаний и тестирования</span>
                                </label>
                                <i class="choise-box__caret  fa fa-chevron-down"></i>
                            </div>
                        </div>
                        <div class="site_form  hidden">
                            <label class="choise-box__check-in  checkbox-label">
                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                <span class="checkbox-label__pseudo-check"></span>
                                <span class="checkbox-label__content-in">Операция 1</span>
                            </label>
                            <label class="choise-box__check-in  checkbox-label">
                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                <span class="checkbox-label__pseudo-check"></span>
                                <span class="checkbox-label__content-in">Операция 2</span>
                            </label>
                            <label class="choise-box__check-in  checkbox-label">
                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                <span class="checkbox-label__pseudo-check"></span>
                                <span class="checkbox-label__content-in">Операция 3</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-lg-4  publishing-form__col  content-text">
                    <h3>Типы оборудования </h3>
                    <div class="choise-box-select">
                        <div class="choise-box  h3">
                            <div class="choise-box__in">
                                <label class="checkbox-label">
                                    <input type="checkbox" class="checkbox-label__input-check  select_all_branches">
                                    <span class="checkbox-label__pseudo-check"></span>
                                    <span class="checkbox-label__content-in">Бытовая и промышленная химия</span>
                                </label>
                                <i class="choise-box__caret  fa fa-chevron-down"></i>
                            </div>
                        </div>
                        <div class="site_form  hidden">
                            <label class="choise-box__check-in  checkbox-label">
                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                <span class="checkbox-label__pseudo-check"></span>
                                <span class="checkbox-label__content-in">Операция 1</span>
                            </label>
                            <label class="choise-box__check-in  checkbox-label">
                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                <span class="checkbox-label__pseudo-check"></span>
                                <span class="checkbox-label__content-in">Операция 2</span>
                            </label>
                            <label class="choise-box__check-in  checkbox-label">
                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                <span class="checkbox-label__pseudo-check"></span>
                                <span class="checkbox-label__content-in">Операция 3</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-lg-4  publishing-form__col  content-text">
                    <h3>Типы материалов</h3>
                    <div class="choise-box-select">
                        <div class="choise-box  h3">
                            <div class="choise-box__in">
                                <label class="checkbox-label">
                                    <input type="checkbox" class="checkbox-label__input-check  select_all_branches">
                                    <span class="checkbox-label__pseudo-check"></span>
                                    <span class="checkbox-label__content-in">Все</span>
                                </label>
                                <i class="choise-box__caret  fa fa-chevron-down"></i>
                            </div>
                        </div>
                        <div class="site_form  hidden">
                            <label class="choise-box__check-in  checkbox-label">
                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                <span class="checkbox-label__pseudo-check"></span>
                                <span class="checkbox-label__content-in">Операция 1</span>
                            </label>
                            <label class="choise-box__check-in  checkbox-label">
                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                <span class="checkbox-label__pseudo-check"></span>
                                <span class="checkbox-label__content-in">Операция 2</span>
                            </label>
                            <label class="choise-box__check-in  checkbox-label">
                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                <span class="checkbox-label__pseudo-check"></span>
                                <span class="checkbox-label__content-in">Операция 3</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-lg-4  publishing-form__col  content-text">
                    <h3>Типы компонентов</h3>
                    <div class="choise-box-select">
                        <div class="choise-box  h3">
                            <div class="choise-box__in">
                                <label class="checkbox-label">
                                    <input type="checkbox" class="checkbox-label__input-check  select_all_branches">
                                    <span class="checkbox-label__pseudo-check"></span>
                                    <span class="checkbox-label__content-in">Оборудование для испытаний и тестирования</span>
                                </label>
                                <i class="choise-box__caret  fa fa-chevron-down"></i>
                            </div>
                        </div>
                        <div class="site_form  hidden">
                            <label class="choise-box__check-in  checkbox-label">
                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                <span class="checkbox-label__pseudo-check"></span>
                                <span class="checkbox-label__content-in">Операция 1</span>
                            </label>
                            <label class="choise-box__check-in  checkbox-label">
                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                <span class="checkbox-label__pseudo-check"></span>
                                <span class="checkbox-label__content-in">Операция 2</span>
                            </label>
                            <label class="choise-box__check-in  checkbox-label">
                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                <span class="checkbox-label__pseudo-check"></span>
                                <span class="checkbox-label__content-in">Операция 3</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-lg-4  publishing-form__col  content-text">
                    <h3>Типы программного обеспечения</h3>
                    <div class="choise-box-select">
                        <div class="choise-box  h3">
                            <div class="choise-box__in">
                                <label class="checkbox-label">
                                    <input type="checkbox" class="checkbox-label__input-check  select_all_branches">
                                    <span class="checkbox-label__pseudo-check"></span>
                                    <span class="checkbox-label__content-in">Бытовая и промышленная химия</span>
                                </label>
                                <i class="choise-box__caret  fa fa-chevron-down"></i>
                            </div>
                        </div>
                        <div class="site_form  hidden">
                            <label class="choise-box__check-in  checkbox-label">
                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                <span class="checkbox-label__pseudo-check"></span>
                                <span class="checkbox-label__content-in">Операция 1</span>
                            </label>
                            <label class="choise-box__check-in  checkbox-label">
                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                <span class="checkbox-label__pseudo-check"></span>
                                <span class="checkbox-label__content-in">Операция 2</span>
                            </label>
                            <label class="choise-box__check-in  checkbox-label">
                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                <span class="checkbox-label__pseudo-check"></span>
                                <span class="checkbox-label__content-in">Операция 3</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-lg-4  publishing-form__col  content-text">
                    <h3>Производители</h3>
                    <div class="choise-box-select">
                        <div class="choise-box  h3">
                            <div class="choise-box__in">
                                <label class="checkbox-label">
                                    <input type="checkbox" class="checkbox-label__input-check  select_all_branches">
                                    <span class="checkbox-label__pseudo-check"></span>
                                    <span class="checkbox-label__content-in">Все</span>
                                </label>
                                <i class="choise-box__caret  fa fa-chevron-down"></i>
                            </div>
                        </div>
                        <div class="site_form  hidden">
                            <label class="choise-box__check-in  checkbox-label">
                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                <span class="checkbox-label__pseudo-check"></span>
                                <span class="checkbox-label__content-in">Операция 1</span>
                            </label>
                            <label class="choise-box__check-in  checkbox-label">
                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                <span class="checkbox-label__pseudo-check"></span>
                                <span class="checkbox-label__content-in">Операция 2</span>
                            </label>
                            <label class="choise-box__check-in  checkbox-label">
                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                <span class="checkbox-label__pseudo-check"></span>
                                <span class="checkbox-label__content-in">Операция 3</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-lg-4  publishing-form__col  content-text">
                    <h3>Язык</h3>
                    <div class="choise-box-select">
                        <div class="choise-box  h3">
                            <div class="choise-box__in">
                                <label class="checkbox-label">
                                    <input type="checkbox" class="checkbox-label__input-check  select_all_branches">
                                    <span class="checkbox-label__pseudo-check"></span>
                                    <span class="checkbox-label__content-in">Русский</span>
                                </label>
                                <i class="choise-box__caret  fa fa-chevron-down"></i>
                            </div>
                        </div>
                        <div class="site_form  hidden">
                            <label class="choise-box__check-in  checkbox-label">
                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                <span class="checkbox-label__pseudo-check"></span>
                                <span class="checkbox-label__content-in">Английский</span>
                            </label>
                            <label class="choise-box__check-in  checkbox-label">
                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                <span class="checkbox-label__pseudo-check"></span>
                                <span class="checkbox-label__content-in">Украинский</span>
                            </label>
                            <label class="choise-box__check-in  checkbox-label">
                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                <span class="checkbox-label__pseudo-check"></span>
                                <span class="checkbox-label__content-in">Французский</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-wrap justify-content-center">
            <button class="button button_blue button_side_margin">Отмена</button>
            <input type="submit" value="Сохранить" class="button button_blue button_side_margin">
        </div>
                <?php \yii\widgets\ActiveForm::end()?>

    </div>
</div>
