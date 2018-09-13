<?php

use app\models\Countries;
use app\models\Regions;
$countries = Countries::selectList();
$regions = [t('Выберите Страну')];
?>
<?php $form = \yii\widgets\ActiveForm::begin([
        'options' => ['class'=>'filter  filter_order','style'=>'background-image: url(images/filter-order-bg.jpg)'],
        'id'=>'down',
        'method'=>'GET',
        'action' => '/main/placing-order'
])?>
    <div class="container">
        <div class="filter__title  content-text  content-text_medium">
            <p>Для поиска нужных Вам тендеров, пожалуйста, выберете направление и тему. Если для Вас важна территориальная принадлежность тендеров, можно дополнительно выбрать страну, регион или город. Чем больше условий Вы задаете, тем меньше тендеров будет в результатах поиска. Поэтому вы можете выбрать сначала самые необходимые условия и посмотреть результаты. А потом добавлять новые.</p>
        </div>
        <div class="filter__start  row">
            <div class="filter__start-col  col-sm-6  col-lg-4">
                <div class="content-text">
                    <h3>Ключевые слова</h3>
                    <input type="text" class="input" placeholder="Автомат установки компонентов SM451">
                </div>
            </div>
            <div class="filter__start-col  col-sm-6  col-lg-4">
                <div class="content-text">
                    <h3>Направление</h3>
                    <?= $form->field($searchModel, 'direction',['inputOptions' => ['name' => 'direction']])->dropDownList(\app\models\Directions::findForMainList(), ['class' => 'select  select_text_wide'])->label(false) ?>
                </div>
            </div>
            <div class="filter__start-col  col-sm-6  col-lg-4">
                <div class="content-text">
                    <h3>Тема</h3>
                    <?= $form->field($searchModel, 'theme',['inputOptions' => ['name' => 'theme']])->dropDownList(\app\models\FilterThemes::allList(), ['class' => 'select  select_text_wide'])->label(false) ?>

                </div>
            </div>
            <div class="filter__start-col  col-sm-6  col-lg-4">
                <div class="content-text">
                    <h3>Страна</h3>
                    <?= $form->field($searchModel, 'country_id',['inputOptions' => ['name' => 'country_id']])->dropDownList($countries, ['class' => 'select  select_text_wide'])->label(false) ?>

<!--                 -->
<!--                    <select class="select  select_text_wide">-->
<!--                        <option data-display="Россия">Россия</option>-->
<!--                        <option value="1">Украина</option>-->
<!--                        <option value="2">Беларусь</option>-->
<!--                    </select>-->
                </div>
            </div>
            <div class="filter__start-col  col-sm-6  col-lg-4">
                <div class="content-text">
                    <h3>Регион</h3>
                    <?= $form->field($searchModel, 'region_id',['inputOptions' => ['name' => 'region_id']])->dropDownList($regions, ['class' => 'select  select_text_wide'])->label(false)?>
                </div>
            </div>
            <div class="filter__start-col  col-sm-6  col-lg-4">
                <div class="content-text">
                    <h3>Город</h3>
                    <?= $form->field($searchModel, 'city_id',['inputOptions' => ['name' => 'city_id']])->dropDownList([t('Выберите регион')], ['class' => 'select  select_text_wide'])->label(false)?>

                </div>
            </div>
        </div>
        <div class="filter__settings  row  justify-content-between">
            <div class="filter__settings-col  col-lg-5">
                <button class="filter__more  filter-more-open  button">
                    <i class="fa fa-arrow-up" aria-hidden="true"></i>
                    <span>Расширенный поиск</span>
                </button>
                <div class="content-text">
                    <p>Расширенный поиск поможет Вам найти те компании, которые готовы оказывать определенные услуги или имеют те или иные специфические возможности производства. Если Вы не уверены, какие технологические возможности требуются для решения Вашей задачи, просто выберете наиболее общие условия и отправьте запрос бОльшему количеству компаний.</p>
                </div>
            </div>
            <div class="filter__settings-col  col-lg-6">
                <div class="filter__settings-col-in  row  align-items-start">
                    <div class="col-lg-5">
                        <label class="filter__checkbox-label checkbox-label">
                            <input type="checkbox" class="checkbox-label__input-check">
                            <span class="checkbox-label__pseudo-check"></span>
                            <span class="checkbox-label__content-in">Только «Проверенные IH»</span>
                        </label>
                        <label class="filter__checkbox-label checkbox-label">
                            <input type="checkbox" class="checkbox-label__input-check">
                            <span class="checkbox-label__pseudo-check"></span>
                            <span class="checkbox-label__content-in">Использовать как поиск по умолчанию</span>
                        </label>
                    </div>
                    <div class="col-lg-7  flex  justify-content-around">
                        <div class="row justify-content-center">
                            <a class="filter__settings-btn  button  button_blue  button_min clear-button" style="color: white;">Очистить</a>
                            <button class="filter__settings-btn  button  button_blue  button_min">Найти</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="filter__more-components">
            <div class="choise_box  choise_box_profile">
                <ul class="flex">
                    <li>
                        <div class="choise-box  h3">
                            <div class="choise-box__in">
                                <label class="choise-box__check  checkbox-label">
                                    <input type="checkbox" class="checkbox-label__input-check  select_all_branches">
                                    <span class="checkbox-label__pseudo-check"></span>
                                    <span class="checkbox-label__content">Контрактное производство </span>
                                </label>
                                <i class="choise-box__caret  fa fa-caret-down"></i>
                            </div>
                        </div>
                        <div class="site_form">
                            <div class="choise_box  choise_box_profile_in">
                                <ul class="flex jcsb">
                                    <li>
                                        <div class="choise-box  h3">
                                            <div class="choise-box__in">
                                                <label class="choise-box__check  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  select_all_branches  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content" data-toggle="tooltip" data-placement="bottom" title="Здесь описание темы в двух-трех строчках Здесь описание темы в двух-трех строчках Здесь описание темы в двух-трех строчках">Поверхностный монтаж (SMT)</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="site_form">
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Контрактное производство</span>
                                            </label>
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Еще категория</span>
                                            </label>
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Третья категория</span>
                                            </label>
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Контрактное производство</span>
                                            </label>
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Контрактное производство</span>
                                            </label>
                                        </div>
                                        <div class="site_form">
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Контрактное производство</span>
                                            </label>
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Еще категория</span>
                                            </label>
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Третья категория</span>
                                            </label>
                                        </div>
                                        <div class="site_form">
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Контрактное производство</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="choise-box  h3">
                                            <div class="choise-box__in">
                                                <label class="choise-box__check  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  select_all_branches  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content" data-toggle="tooltip" data-placement="bottom" title="Здесь описание темы в двух-трех строчках Здесь описание темы в двух-трех строчках Здесь описание темы в двух-трех строчках">Монтаж в отверстия (THT)</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="site_form">
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Контрактное производство</span>
                                            </label>
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Еще категория</span>
                                            </label>
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Третья категория</span>
                                            </label>
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Контрактное производство</span>
                                            </label>
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Контрактное производство</span>
                                            </label>
                                        </div>
                                        <div class="site_form">
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Контрактное производство</span>
                                            </label>
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Еще категория</span>
                                            </label>
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Третья категория</span>
                                            </label>
                                        </div>
                                        <div class="site_form">
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Контрактное производство</span>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="choise-box  h3">
                                            <div class="choise-box__in">
                                                <label class="choise-box__check  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  select_all_branches  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content" data-toggle="tooltip" data-placement="bottom" title="Здесь описание темы в двух-трех строчках Здесь описание темы в двух-трех строчках Здесь описание темы в двух-трех строчках">Объем производства</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="site_form">
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Контрактное производство</span>
                                            </label>
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Еще категория</span>
                                            </label>
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Третья категория</span>
                                            </label>
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Контрактное производство</span>
                                            </label>
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Контрактное производство</span>
                                            </label>
                                        </div>
                                        <div class="site_form">
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Контрактное производство</span>
                                            </label>
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Еще категория</span>
                                            </label>
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Третья категория</span>
                                            </label>
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Контрактное производство</span>
                                            </label>
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Контрактное производство</span>
                                            </label>
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Контрактное производство</span>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="filter__capabilities  other-capabilities">
                <a href="#" class="other-capabilities__link  filter-more-open-in  block-centered"><i class="fa fa-arrow-up  color_green" aria-hidden="true"></i> Дополнительные возможности</a>
                <div class="other-capabilities__text   text-size-medium  block-centered  text-center">У некоторых из найденных компаний есть дополнительные производственные возможности, которые могут быть Вам полезны. Вы можете развернуть расширенный поиск по этим услугам и выбрать необходимые. </div>
            </div>
            <div class="filter__more-components-in">
                <div class="filter__choise_box  choise_box  choise_box_profile">
                    <ul class="flex">
                        <li>
                            <div class="choise-box  h3">
                                <div class="choise-box__in">
                                    <label class="choise-box__check  checkbox-label">
                                        <input type="checkbox" class="checkbox-label__input-check  select_all_branches">
                                        <span class="checkbox-label__pseudo-check"></span>
                                        <span class="checkbox-label__content">Кабели и Жгуты </span>
                                    </label>
                                    <i class="choise-box__caret  fa fa-caret-down"></i>
                                </div>
                            </div>
                            <div class="site_form ">
                                <div class="choise_box  choise_box_profile_in">
                                    <ul class="flex">
                                        <li>
                                            <div class="choise-box  h3">
                                                <div class="choise-box__in">
                                                    <label class="choise-box__check  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  select_all_branches  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content" data-toggle="tooltip" data-placement="bottom" title="Здесь описание темы в двух-трех строчках Здесь описание темы в двух-трех строчках Здесь описание темы в двух-трех строчках">Намотка</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="site_form">
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Контрактное производство</span>
                                                </label>
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Еще категория</span>
                                                </label>
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Третья категория</span>
                                                </label>
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Контрактное производство</span>
                                                </label>
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Контрактное производство</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="site_form">
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Контрактное производство</span>
                                                </label>
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Еще категория</span>
                                                </label>
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Третья категория</span>
                                                </label>
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Контрактное производство</span>
                                                </label>
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Контрактное производство</span>
                                                </label>
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Контрактное производство</span>
                                                </label>
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Еще категория</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="site_form">
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Контрактное производство</span>
                                                </label>
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Еще категория</span>
                                                </label>
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Третья категория</span>
                                                </label>
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Контрактное производство</span>
                                                </label>
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Контрактное производство</span>
                                                </label>
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Контрактное производство</span>
                                                </label>
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Еще категория</span>
                                                </label>
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Третья категория</span>
                                                </label>
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Контрактное производство</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="choise-box  h3">
                                                <div class="choise-box__in">
                                                    <label class="choise-box__check  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  select_all_branches  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content" data-toggle="tooltip" data-placement="bottom" title="Здесь описание темы в двух-трех строчках Здесь описание темы в двух-трех строчках Здесь описание темы в двух-трех строчках">Намотка</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="site_form">
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Контрактное производство</span>
                                                </label>
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Еще категория</span>
                                                </label>
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Третья категория</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="site_form">
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Контрактное производство</span>
                                                </label>
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Еще категория</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="site_form">
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Контрактное производство</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="site_form">
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Еще категория</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="site_form">
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Контрактное производство</span>
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php \yii\widgets\ActiveForm::end()?>
<?php
$js =<<<JS

    var country = $("#placementrequestsfiltr-country_id");

	var region = $("#placementrequestsfiltr-region_id");

	if(country.length > 0 && region.length > 0){

		country.change(function(){
			$.ajax({
				url: "/site/regions/"+$(this).val(),
				type: "get",
				dataType: "html",
				success: function(data){
					region.html(data);
					region.niceSelect("update");
				}
			});

		});

	}

	var cities = $("#placementrequestsfiltr-city_id");
	if(region.length > 0 && cities.length > 0){
		region.change(function(){
			$.ajax({
				url: "/site/cities/"+$(this).val(),
				type: "get",
				dataType: "html",
				success: function(data){
					cities.html(data);
					cities.niceSelect("update");
				}
			});
		});
	}

	
JS;
$this->registerJs($js)



?>

