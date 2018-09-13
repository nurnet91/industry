<?php
    use yii\widgets\ListView;
?>
<div class="banner  banner_knowledge-base  background"  style="background-image: url(/images/data-base-ban-bg.jpg);">
    <div class="container">
        <div class="row  justify-content-center">
            <div class="banner__title-knowledge-base  content-text  col-md-7">
                <h1>База знаний</h1>
                <h3>Здесь Вы можете узнать все самое новое и интересное из интересующей Вас области</h3>
                <div class="banner__btns-knowledge-base  row  justify-content-center">
                    <a href="#search" class="banner__btn-knowledge-base  margin-b-10  button button_blue">Начать поиск</a>
                    <a href="#" class="banner__btn-knowledge-base  margin-b-10  button button_green">Зарегистрироваться</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="anchor-menu  anchor-menu_knowledge-base  anchor-menu--js  background-color-blue"  id="anchor_top">
    <div class="container">
        <ul class="list  justify-content-center">
            <li><a href="#most-new">Самое новое</a></li>
            <li><a href="#most-popular">Самое популярное</a></li>
            <li><a href="#most-discuss">Самое обсуждаемое</a></li>
        </ul>
    </div>
</div>
<div class="knowldge-base-wrap">
    <div class="news-section  news-section_knowldege  background-color-grey" id="most-new">
        <div class="container">
            <div class="news-section__title  content-text  color-blue">
                <h2><a href="#">Самое новое</a></h2>
            </div>
            <?=
                ListView::widget([
                    'options'=>['class' => 'row','tag'=>'div'],
                    'dataProvider' => $news,
                    'layout' => '{items}',
                    'itemView'=>'_publications_items',
                    'itemOptions' => [
                        'tag' => 'div',
                        'class' => 'news-section__col  news-section__col_knowledge  news-box  col-md-6  col-xl-4  flex  flex-sm-column  justify-content-sm-between',
                    ],
                ]);
            ?>
<!--                <div class="news-section__col  news-section__col_knowledge  news-box  col-md-6  col-xl-4  flex  flex-sm-column  justify-content-sm-between">-->
<!--                    <div class="news-box__body">-->
<!--                        <div class="news-box__title-head  content-text">-->
<!--                            <h3>Открылась электронная регистрация на выставку «ЭкспоЭлектроника» 2018</h3>-->
<!--                        </div>-->
<!--                        <span class="news-box__date">02.02.2018</span>-->
<!--                        <span class="news-box__author"><i class="fa fa-user"></i><a href="#">ITE</a></span>-->
<!--                        <div class="news-box__img-wrap  news-box__img-wrap_knowledge  img-wrap">-->
<!--                            <img src="/images/temp/news-poster1.jpg" alt="">-->
<!--                        </div>-->
<!--                        <div class="news-box__info  flex justify-content-between align-items-center">-->
<!--                            <div class="news-box__liked"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 243</div>-->
<!--                            <div class="news-box__view"><i class="news-box__view-fa  fa fa-eye" aria-hidden="true"></i>243</div>-->
<!--                        </div>-->
<!--                        <div class="news-box__content  content-text">-->
<!--                            <p>Приглашаем вас посетить 21-ю Международную выставку электронных компонентов, модулей и комплектующих «ЭкспоЭлектроника», которая состоится 17-19 апреля 2018 года в Крокус Экспо.</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="news-box__foot  flex  justify-content-between  align-items-center">-->
<!--                        <a href="#" class="news-box__btn  button  button_blue">-->
<!--                            <span class="btn__in">Смотреть</span>-->
<!--                        </a>-->
<!--                        <div class="news-box__settings">-->
<!--                            <a href="#" class="news-box__settings-link  news-box__settings-link_later"><i class="fa fa-clock-o" aria-hidden="true"></i></a>-->
<!--                            <a href="#" class="news-box__settings-link  news-box__settings-link_favour">-->
<!--                                <i class="fa fa-bookmark" aria-hidden="true"></i>-->
<!--                                <i class="fa fa-bookmark-o" aria-hidden="true"></i>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="news-section__col  news-section__col_knowledge  news-box  col-md-6  col-xl-4  flex  flex-sm-column  justify-content-sm-between">-->
<!--                    <div class="news-box__body">-->
<!--                        <div class="news-box__title-head  content-text">-->
<!--                            <h3>Открылась электронная регистрация на выставку «ЭкспоЭлектроника» 2018</h3>-->
<!--                        </div>-->
<!--                        <span class="news-box__date">02.02.2018</span>-->
<!--                        <span class="news-box__author"><i class="fa fa-user"></i><a href="#">ITE</a></span>-->
<!--                        <div class="news-box__img-wrap  news-box__img-wrap_knowledge  img-wrap">-->
<!--                            <img src="/images/temp/news-poster1.jpg" alt="">-->
<!--                            <a data-fancybox href="https://vimeo.com/191947042" class="news-box__play  btn-play"><i class="fa fa-play" aria-hidden="true"></i></a>-->
<!--                        </div>-->
<!--                        <div class="news-box__info  flex justify-content-between align-items-center">-->
<!--                            <div class="news-box__liked"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 243</div>-->
<!--                            <div class="news-box__view"><i class="news-box__view-fa  fa fa-eye" aria-hidden="true"></i>243</div>-->
<!--                        </div>-->
<!--                        <div class="dotted-box  dotted-box_news">-->
<!--                            <div class="dotted-box__in">-->
<!--                                <div class="dotted-box__item  dotted-box__item_left">Продолжительность</div>-->
<!--                                <div class="dotted-box__item  dotted-box__item_right">3:23</div>-->
<!--                            </div>-->
<!--                            <div class="dotted-box__in">-->
<!--                                <div class="dotted-box__item  dotted-box__item_left">Язык</div>-->
<!--                                <div class="dotted-box__item  dotted-box__item_right">Английский</div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="news-box__content  content-text">-->
<!--                            <p>Приглашаем вас посетить 21-ю Международную выставку электронных компонентов, модулей и комплектующих «ЭкспоЭлектроника», которая состоится</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="news-box__foot  flex  justify-content-between  align-items-center">-->
<!--                        <a href="#" class="news-box__btn  button  button_blue">-->
<!--                            <span class="btn__in">Смотреть</span>-->
<!--                        </a>-->
<!--                        <div class="news-box__settings">-->
<!--                            <a href="#" class="news-box__settings-link  news-box__settings-link_later"><i class="fa fa-clock-o" aria-hidden="true"></i></a>-->
<!--                            <a href="#" class="news-box__settings-link  news-box__settings-link_favour">-->
<!--                                <i class="fa fa-bookmark" aria-hidden="true"></i>-->
<!--                                <i class="fa fa-bookmark-o" aria-hidden="true"></i>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            <div class="news-section__pagination  pagination  pagination_grey  flex  justify-content-center">-->
<!--                <ul class="row  justify-content-center  align-items-end">-->
<!--                    <li class="active"><span>1</span></li>-->
<!--                    <li><a href="#">2</a></li>-->
<!--                    <li><a href="#">3</a></li>-->
<!--                    <li><a href="#">4</a></li>-->
<!--                    <li><a href="#">5</a></li>-->
<!--                    <li>...</li>-->
<!--                    <li><a href="#">11</a></li>-->
<!--                </ul>-->
<!--            </div>-->
        </div>
    </div>
    <div class="news-section  news-section_knowldege  background-color-grey" id="most-popular">
        <div class="container">
            <div class="news-section__title  content-text  color-blue">
                <h2><a href="#">Самое популярное</a></h2>
            </div>
            <?=
                ListView::widget([
                    'options'=>['class' => 'row','tag'=>'div'],
                    'dataProvider' => $populars,
                    'layout' => '{summary}{items}',
                    'itemView'=>'_placing_order_items',
                    'itemOptions' => [
                        'tag' => 'div',
                        'class' => 'news-section__col  news-section__col_knowledge  news-box  col-md-6  col-xl-4  flex  flex-sm-column  justify-content-sm-between',
                    ],
                ]);
            ?>
<!--            <div class="row">-->
<!--                <div class="news-section__col  news-section__col_knowledge  news-box  col-md-6  col-xl-4  flex  flex-sm-column  justify-content-sm-between">-->
<!--                    <div class="news-box__body">-->
<!--                        <div class="news-box__title-head  content-text">-->
<!--                            <h3>Открылась электронная регистрация на выставку «ЭкспоЭлектроника» 2018</h3>-->
<!--                        </div>-->
<!--                        <span class="news-box__date">02.02.2018</span>-->
<!--                        <span class="news-box__author"><i class="fa fa-user"></i><a href="#">ITE</a></span>-->
<!--                        <div class="news-box__img-wrap  news-box__img-wrap_knowledge  img-wrap">-->
<!--                            <img src="/images/temp/news-poster1.jpg" alt="">-->
<!--                        </div>-->
<!--                        <div class="news-box__info  flex justify-content-between align-items-center">-->
<!--                            <div class="news-box__liked"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 243</div>-->
<!--                            <div class="news-box__view"><i class="news-box__view-fa  fa fa-eye" aria-hidden="true"></i>243</div>-->
<!--                        </div>-->
<!--                        <div class="news-box__content  content-text">-->
<!--                            <p>Приглашаем вас посетить 21-ю Международную выставку электронных компонентов, модулей и комплектующих «ЭкспоЭлектроника», которая состоится 17-19 апреля 2018 года в Крокус Экспо.</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="news-box__foot  flex  justify-content-between  align-items-center">-->
<!--                        <a href="#" class="news-box__btn  button  button_blue">-->
<!--                            <span class="btn__in">Смотреть</span>-->
<!--                        </a>-->
<!--                        <div class="news-box__settings">-->
<!--                            <a href="#" class="news-box__settings-link  news-box__settings-link_later"><i class="fa fa-clock-o" aria-hidden="true"></i></a>-->
<!--                            <a href="#" class="news-box__settings-link  news-box__settings-link_favour">-->
<!--                                <i class="fa fa-bookmark" aria-hidden="true"></i>-->
<!--                                <i class="fa fa-bookmark-o" aria-hidden="true"></i>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="news-section__col  news-section__col_knowledge  news-box  col-md-6  col-xl-4  flex  flex-sm-column  justify-content-sm-between">-->
<!--                    <div class="news-box__body">-->
<!--                        <div class="news-box__title-head  content-text">-->
<!--                            <h3>Открылась электронная регистрация на выставку «ЭкспоЭлектроника» 2018</h3>-->
<!--                        </div>-->
<!--                        <span class="news-box__date">02.02.2018</span>-->
<!--                        <span class="news-box__author"><i class="fa fa-user"></i><a href="#">ITE</a></span>-->
<!--                        <div class="news-box__img-wrap  news-box__img-wrap_knowledge  img-wrap">-->
<!--                            <img src="/images/temp/news-poster1.jpg" alt="">-->
<!--                            <a data-fancybox href="https://vimeo.com/191947042" class="news-box__play  btn-play"><i class="fa fa-play" aria-hidden="true"></i></a>-->
<!--                        </div>-->
<!--                        <div class="news-box__info  flex justify-content-between align-items-center">-->
<!--                            <div class="news-box__liked"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 243</div>-->
<!--                            <div class="news-box__view"><i class="news-box__view-fa  fa fa-eye" aria-hidden="true"></i>243</div>-->
<!--                        </div>-->
<!--                        <div class="dotted-box  dotted-box_news">-->
<!--                            <div class="dotted-box__in">-->
<!--                                <div class="dotted-box__item  dotted-box__item_left">Продолжительность</div>-->
<!--                                <div class="dotted-box__item  dotted-box__item_right">3:23</div>-->
<!--                            </div>-->
<!--                            <div class="dotted-box__in">-->
<!--                                <div class="dotted-box__item  dotted-box__item_left">Язык</div>-->
<!--                                <div class="dotted-box__item  dotted-box__item_right">Английский</div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="news-box__content  content-text">-->
<!--                            <p>Приглашаем вас посетить 21-ю Международную выставку электронных компонентов, модулей и комплектующих «ЭкспоЭлектроника», которая состоится</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="news-box__foot  flex  justify-content-between  align-items-center">-->
<!--                        <a href="#" class="news-box__btn  button  button_blue">-->
<!--                            <span class="btn__in">Смотреть</span>-->
<!--                        </a>-->
<!--                        <div class="news-box__settings">-->
<!--                            <a href="#" class="news-box__settings-link  news-box__settings-link_later"><i class="fa fa-clock-o" aria-hidden="true"></i></a>-->
<!--                            <a href="#" class="news-box__settings-link  news-box__settings-link_favour">-->
<!--                                <i class="fa fa-bookmark" aria-hidden="true"></i>-->
<!--                                <i class="fa fa-bookmark-o" aria-hidden="true"></i>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="news-section__pagination  pagination  pagination_grey  flex  justify-content-center">-->
<!--                <ul class="row  justify-content-center  align-items-end">-->
<!--                    <li class="active"><span>1</span></li>-->
<!--                    <li><a href="#">2</a></li>-->
<!--                    <li><a href="#">3</a></li>-->
<!--                    <li><a href="#">4</a></li>-->
<!--                    <li><a href="#">5</a></li>-->
<!--                    <li>...</li>-->
<!--                    <li><a href="#">11</a></li>-->
<!--                </ul>-->
<!--            </div>-->
        </div>
    </div>
    <div class="news-section  news-section_knowldege  background-color-grey" id="most-discuss">
        <div class="container">
            <div class="news-section__title  content-text  color-blue">
                <h2><a href="#">Самое обсуждаемое</a></h2>
            </div>
            <?=
            ListView::widget([
                'options'=>['class' => 'row','tag'=>'div'],
                'dataProvider' => $discussed,
                'layout' => '{summary}{items}',
                'itemView'=>'_placing_order_items',
                'itemOptions' => [
                    'tag' => 'div',
                    'class' => 'news-section__col  news-section__col_knowledge  news-box  col-md-6  col-xl-4  flex  flex-sm-column  justify-content-sm-between',
                ],
            ]);
            ?>
<!--            <div class="news-section__pagination  pagination  pagination_grey  flex  justify-content-center">-->
            <!--                <ul class="row  justify-content-center  align-items-end">-->
            <!--                    <li class="active"><span>1</span></li>-->
            <!--                    <li><a href="#">2</a></li>-->
            <!--                    <li><a href="#">3</a></li>-->
            <!--                    <li><a href="#">4</a></li>-->
            <!--                    <li><a href="#">5</a></li>-->
            <!--                    <li>...</li>-->
            <!--                    <li><a href="#">11</a></li>-->
            <!--                </ul>-->
            <!--            </div>-->
        </div>
    </div>
    <?php if(!Yii::$app->user->isGuest):?>
        <form class="filter  filter_knowledge" id="search">
        <div class="container">
            <div class="filter__title  content-text  content-text_medium">
                <h2>Фильр публикаций</h2>
            </div>
            <div class="filter__start  row">
                <div class="filter__start-col  col-sm-12">
                    <div class="row  align-items-end">
                        <div class="filter__start-col-in  content-text  col-md-6 col-xl-4">
                            <h3>Ключевые слова</h3>
                            <input type="text" class="input" placeholder="Автомат установки компонентов SM451">
                        </div>
                    </div>
                    <div class="filter__start-col-in  content-text  col-md-6  col-lg-12  no-padding">
                        <h3>Выберите временной период</h3>
                        <div class="row  flex-column  flex-lg-row  align-items-lg-center">
                            <div class="filter__start-col-in  margin-b-10  col-auto">
                                <div class="date-birth  clear">
                                    <select class="select  select_sub  select_sub_small auto_width no_clear">
                                        <option data-display="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                    <select class="select  select_sub auto_width no_clear">
                                        <option data-display="Январь">Январь</option>
                                        <option>Февраль</option>
                                        <option>Март</option>
                                        <option>Апрель</option>
                                        <option>Май</option>
                                        <option>Июнь</option>
                                        <option>Июль</option>
                                        <option>Август</option>
                                        <option>Сентябрь</option>
                                    </select>
                                    <select class="select  select_sub auto_width no_clear">
                                        <option data-display="1970">1970</option>
                                        <option>1971</option>
                                        <option>1972</option>
                                        <option>1973</option>
                                    </select>
                                </div>
                            </div>
                            <div class="margin-b-10 text-weight-bold  col-auto  no-lg-padding">-</div>
                            <div class="filter__start-col-in  margin-b-10  col-auto">
                                <div class="date-birth  clear">
                                    <select class="select  select_sub  select_sub_small auto_width no_clear">
                                        <option data-display="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                    <select class="select  select_sub auto_width no_clear">
                                        <option data-display="Январь">Январь</option>
                                        <option>Февраль</option>
                                        <option>Март</option>
                                        <option>Апрель</option>
                                        <option>Май</option>
                                        <option>Июнь</option>
                                        <option>Июль</option>
                                        <option>Август</option>
                                        <option>Сентябрь</option>
                                    </select>
                                    <select class="select  select_sub auto_width no_clear">
                                        <option data-display="1970">1970</option>
                                        <option>1971</option>
                                        <option>1972</option>
                                        <option>1973</option>
                                    </select>
                                </div>
                            </div>
                            <div class="margin-b-10  col-auto  no-lg-padding">или</div>
                            <div class="gutters margin-b-10  col-auto">
                                <select class="select">
                                    <option data-display="Временной период">Временной период</option>
                                    <option value="1">За неделю</option>
                                    <option value="2">За месяц</option>
                                    <option value="3">За год</option>
                                    <option value="3">За все время</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter__start-col  col-sm-6  col-lg-4">
                    <div class="content-text">
                        <h3>Направление</h3>
                        <select class="select  select_text_wide">
                            <option data-display="Электроника">Электроника</option>
                            <option value="1">Микроэлектроника</option>
                            <option value="2">Аддитивные технологии</option>
                        </select>
                    </div>
                </div>
                <div class="filter__start-col  col-sm-6  col-lg-4">
                    <div class="content-text">
                        <h3>Тема</h3>
                        <select class="select  select_text_wide">
                            <option data-display="Контактное производство">Контактное производство</option>
                            <option value="1">Микроэлектроника</option>
                            <option value="2">Аддитивные технологии</option>
                        </select>
                    </div>
                </div>
                <div class="filter__start-col  col-sm-6  col-lg-4">
                    <div class="content-text">
                        <h3>Технологии</h3>
                        <select class="select  select_text_wide">
                            <option data-display="Оборудование для испытаний и тестирования">Оборудование для испытаний и тестирования</option>
                            <option value="1">Оборудование для испытаний и тестирования 1</option>
                            <option value="2">Оборудование для испытаний и тестирования 2</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- <div class="filter__settings-btns  row  justify-content-center">
                <button class="filter__settings-btn  button  button_blue  button_min">Показать</button>
                <button class="filter__settings-btn  button  button_blue  button_min">Найти</button>
            </div> -->
            <div class="filter-result  filter-result_knowledge">
                <div class="row  justify-content-between  align-items-center">
                    <div class="filter-result__item  gutters">
                        <button class="filter__more  filter__more_knowledge  filter-more-open  button">
                            <i class="fa fa-arrow-up" aria-hidden="true"></i>
                            <span>Расширенный поиск</span>
                        </button>
                    </div>
                    <div class="filter-result__item  filter-result__item--line  gutters">line</div>
                    <div class="filter-result__item  filter-result__item--title-wrap  gutters">
                        <div class="filter-result__else-title  content-text">
                            <h3><span>Выбрано:</span> 123 публикации</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filter__more-components">
                <div class="filter__checkbox-list  row">
                    <div class="filter__checkbox-col  col-lg-6  col-xl-4">
                        <div class="content-text">
                            <h3>Операции</h3>
                        </div>
                        <div class="choise-box-select">
                            <div class="choise-box  h3">
                                <div class="choise-box__in">
                                    <label class="checkbox-label">
                                        <input type="checkbox" class="checkbox-label__input-check">
                                        <span class="checkbox-label__pseudo-check"></span>
                                        <span class="checkbox-label__content-in">Бытовая и промышленная химия<sup>123</sup></span>
                                    </label>
                                    <i class="choise-box__caret  fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="site_form  hidden">
                                <label class="choise-box__check-in  checkbox-label">
                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                    <span class="checkbox-label__pseudo-check"></span>
                                    <span class="checkbox-label__content-in">Элемент 1</span>
                                </label>
                                <label class="choise-box__check-in  checkbox-label">
                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                    <span class="checkbox-label__pseudo-check"></span>
                                    <span class="checkbox-label__content-in">Элеменент 2</span>
                                </label>
                                <label class="choise-box__check-in  checkbox-label">
                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                    <span class="checkbox-label__pseudo-check"></span>
                                    <span class="checkbox-label__content-in">Элемент 3</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="filter__checkbox-col  col-lg-6  col-xl-4">
                        <div class="content-text">
                            <h3>Тип компонентов</h3>
                        </div>
                        <div class="choise-box-select">
                            <div class="choise-box  h3">
                                <div class="choise-box__in">
                                    <label class="checkbox-label">
                                        <input type="checkbox" class="checkbox-label__input-check">
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
                                    <span class="checkbox-label__content-in">Оборудование 1</span>
                                </label>
                                <label class="choise-box__check-in  checkbox-label">
                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                    <span class="checkbox-label__pseudo-check"></span>
                                    <span class="checkbox-label__content-in">Оборудование 2</span>
                                </label>
                                <label class="choise-box__check-in  checkbox-label">
                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                    <span class="checkbox-label__pseudo-check"></span>
                                    <span class="checkbox-label__content-in">Оборудования 3</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="filter__checkbox-col  col-lg-6  col-xl-4">
                        <div class="content-text">
                            <h3>Тип оборудования</h3>
                        </div>
                        <div class="choise-box-select">
                            <div class="choise-box  h3">
                                <div class="choise-box__in">
                                    <label class="checkbox-label">
                                        <input type="checkbox" class="checkbox-label__input-check">
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
                                    <span class="checkbox-label__content-in">Оборудование 1</span>
                                </label>
                                <label class="choise-box__check-in  checkbox-label">
                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                    <span class="checkbox-label__pseudo-check"></span>
                                    <span class="checkbox-label__content-in">Оборудование 2</span>
                                </label>
                                <label class="choise-box__check-in  checkbox-label">
                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                    <span class="checkbox-label__pseudo-check"></span>
                                    <span class="checkbox-label__content-in">Оборудования 3</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="filter__checkbox-col  col-lg-6  col-xl-4">
                        <div class="content-text">
                            <h3>Тип материалов</h3>
                        </div>
                        <div class="choise-box-select">
                            <div class="choise-box  h3">
                                <div class="choise-box__in">
                                    <label class="checkbox-label">
                                        <input type="checkbox" class="checkbox-label__input-check">
                                        <span class="checkbox-label__pseudo-check"></span>
                                        <span class="checkbox-label__content-in">Бытовая и промышленная химия<sup>123</sup></span>
                                    </label>
                                    <i class="choise-box__caret  fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="site_form  hidden">
                                <label class="choise-box__check-in  checkbox-label">
                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                    <span class="checkbox-label__pseudo-check"></span>
                                    <span class="checkbox-label__content-in">Элемент 1</span>
                                </label>
                                <label class="choise-box__check-in  checkbox-label">
                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                    <span class="checkbox-label__pseudo-check"></span>
                                    <span class="checkbox-label__content-in">Элеменент 2</span>
                                </label>
                                <label class="choise-box__check-in  checkbox-label">
                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                    <span class="checkbox-label__pseudo-check"></span>
                                    <span class="checkbox-label__content-in">Элемент 3</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="filter__checkbox-col  col-lg-6  col-xl-4">
                        <div class="content-text">
                            <h3>Тип программного опеспечения</h3>
                        </div>
                        <div class="choise-box-select">
                            <div class="choise-box  h3">
                                <div class="choise-box__in">
                                    <label class="checkbox-label">
                                        <input type="checkbox" class="checkbox-label__input-check">
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
                                    <span class="checkbox-label__content-in">Оборудование 1</span>
                                </label>
                                <label class="choise-box__check-in  checkbox-label">
                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                    <span class="checkbox-label__pseudo-check"></span>
                                    <span class="checkbox-label__content-in">Оборудование 2</span>
                                </label>
                                <label class="choise-box__check-in  checkbox-label">
                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                    <span class="checkbox-label__pseudo-check"></span>
                                    <span class="checkbox-label__content-in">Оборудования 3</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="filter__checkbox-col  col-lg-6  col-xl-4">
                        <div class="content-text">
                            <h3>Производители</h3>
                        </div>
                        <div class="choise-box-select">
                            <div class="choise-box  h3">
                                <div class="choise-box__in">
                                    <label class="checkbox-label">
                                        <input type="checkbox" class="checkbox-label__input-check">
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
                                    <span class="checkbox-label__content-in">Оборудование 1</span>
                                </label>
                                <label class="choise-box__check-in  checkbox-label">
                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                    <span class="checkbox-label__pseudo-check"></span>
                                    <span class="checkbox-label__content-in">Оборудование 2</span>
                                </label>
                                <label class="choise-box__check-in  checkbox-label">
                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                    <span class="checkbox-label__pseudo-check"></span>
                                    <span class="checkbox-label__content-in">Оборудования 3</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="filter__checkbox-col  col-lg-6  col-xl-4">
                        <div class="content-text">
                            <h3>Тип публикации</h3>
                        </div>
                        <div class="choise-box-select">
                            <div class="choise-box  h3">
                                <div class="choise-box__in">
                                    <label class="checkbox-label">
                                        <input type="checkbox" class="checkbox-label__input-check">
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
                                    <span class="checkbox-label__content-in">Оборудование 1<sup>123</sup></span>
                                </label>
                                <label class="choise-box__check-in  checkbox-label">
                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                    <span class="checkbox-label__pseudo-check"></span>
                                    <span class="checkbox-label__content-in">Оборудование 2<sup>123</sup></span>
                                </label>
                                <label class="choise-box__check-in  checkbox-label">
                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                    <span class="checkbox-label__pseudo-check"></span>
                                    <span class="checkbox-label__content-in">Оборудования 3<sup>123</sup></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="filter__checkbox-col  col-lg-6  col-xl-4">
                        <div class="content-text">
                            <h3>Язык</h3>
                        </div>
                        <div class="choise-box-select">
                            <div class="choise-box  h3">
                                <div class="choise-box__in">
                                    <label class="checkbox-label">
                                        <input type="checkbox" class="checkbox-label__input-check">
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
                                    <span class="checkbox-label__content-in">Оборудование 1<sup>123</sup></span>
                                </label>
                                <label class="choise-box__check-in  checkbox-label">
                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                    <span class="checkbox-label__pseudo-check"></span>
                                    <span class="checkbox-label__content-in">Оборудование 2<sup>123</sup></span>
                                </label>
                                <label class="choise-box__check-in  checkbox-label">
                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                    <span class="checkbox-label__pseudo-check"></span>
                                    <span class="checkbox-label__content-in">Оборудования 3<sup>123</sup></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filter__settings-btns  row  justify-content-center">
                <button class="filter__settings-btn  button  button_blue  button_min">Показать</button>
                <button class="filter__settings-btn  button  button_blue  button_min">Очистить</button>
            </div>
        </div>
    </form>
    <?php endif;?>
</div>
<div class="banner  banner_small  background" style="background-image: url(/images/temp/banner_img.jpg);">
    <div class="container">
        <div class="banner__title">Пробный Баннер</div>
    </div>
</div>
<div class="knowldge-base-wrap">
    <div class="filter-result  filter-result_knowledge">
        <div class="container">
            <div class="row  justify-content-between  align-items-center">
                <div class="filter-result__item  filter-result__item--title-wrap  gutters">
                    <div class="row  align-items-center">
                        <div class="filter-result__else-title  filter-result__else-title_margin  content-text  gutters">
                            <h3>Результаты поиска</h3>
                        </div>
                        <a href="#" class="filter-result__choisen"><span>Статьи</span> <sup>123</sup></a>
                        <a href="#" class="filter-result__choisen"><span>Интервью</span> <sup>123</sup></a>
                        <a href="#" class="filter-result__choisen"><span>Аналитика</span> <sup>123</sup></a>
                    </div>
                </div>
                <div class="filter-result__item  filter-result__item--line  gutters">line</div>
                <div class="filter-result__item  gutters">
                    <button class="filter-result__btn  btn-clear"  data-toggle="tooltip"  data-placement="top" title="Сначала новые">
                        <i class="fa fa-arrow-up"></i>
                    </button>
                    <button class="filter-result__btn  btn-clear"  data-toggle="tooltip"  data-placement="top" title="Сначала старые">
                        <i class="fa fa-arrow-down"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="news-section  news-section_knowldege  background-color-grey">
        <div class="news-section__result">
            <div class="container">
                <div class="news-section__title  content-text  color-blue">
                    <h3>Статьи</h3>
                </div>
                <div class="row">
                    <div class="news-section__col  news-section__col_knowledge  news-box  col-md-6  col-xl-4  flex  flex-sm-column  justify-content-sm-between">
                        <div class="news-box__body">
                            <div class="news-box__title-head  content-text">
                                <h3>Открылась электронная регистрация на выставку «ЭкспоЭлектроника» 2018</h3>
                            </div>
                            <span class="news-box__date">02.02.2018</span>
                            <span class="news-box__author"><i class="fa fa-user"></i><a href="#">ITE</a></span>
                            <div class="news-box__img-wrap  news-box__img-wrap_knowledge  img-wrap">
                                <img src="/images/temp/news-poster1.jpg" alt="">
                            </div>
                            <div class="news-box__info  flex justify-content-between align-items-center">
                                <div class="news-box__liked"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 243</div>
                                <div class="news-box__view"><i class="news-box__view-fa  fa fa-eye" aria-hidden="true"></i>243</div>
                            </div>
                            <div class="news-box__content  content-text">
                                <p>Приглашаем вас посетить 21-ю Международную выставку электронных компонентов, модулей и комплектующих «ЭкспоЭлектроника», которая состоится 17-19 апреля 2018 года в Крокус Экспо.</p>
                            </div>
                        </div>
                        <div class="news-box__foot  flex  justify-content-between  align-items-center">
                            <a href="#" class="news-box__btn  button  button_blue">
                                <span class="btn__in">Смотреть</span>
                            </a>
                            <div class="news-box__settings">
                                <a href="#" class="news-box__settings-link  news-box__settings-link_later"><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                                <a href="#" class="news-box__settings-link  news-box__settings-link_favour">
                                    <i class="fa fa-bookmark" aria-hidden="true"></i>
                                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="news-section__col  news-section__col_knowledge  news-box  col-md-6  col-xl-4  flex  flex-sm-column  justify-content-sm-between">
                        <div class="news-box__body">
                            <div class="news-box__title-head  content-text">
                                <h3>Открылась электронная регистрация на выставку «ЭкспоЭлектроника» 2018</h3>
                            </div>
                            <span class="news-box__date">02.02.2018</span>
                            <span class="news-box__author"><i class="fa fa-user"></i><a href="#">ITE</a></span>
                            <div class="news-box__img-wrap  news-box__img-wrap_knowledge  img-wrap">
                                <img src="/images/temp/news-poster1.jpg" alt="">
                            </div>
                            <div class="news-box__info  flex justify-content-between align-items-center">
                                <div class="news-box__liked"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 243</div>
                                <div class="news-box__view"><i class="news-box__view-fa  fa fa-eye" aria-hidden="true"></i>243</div>
                            </div>
                            <div class="news-box__content  content-text">
                                <p>Приглашаем вас посетить 21-ю Международную выставку электронных компонентов, модулей и комплектующих «ЭкспоЭлектроника», которая состоится 17-19 апреля 2018 года в Крокус Экспо.</p>
                            </div>
                        </div>
                        <div class="news-box__foot  flex  justify-content-between  align-items-center">
                            <a href="#" class="news-box__btn  button  button_blue">
                                <span class="btn__in">Смотреть</span>
                            </a>
                            <div class="news-box__settings">
                                <a href="#" class="news-box__settings-link  news-box__settings-link_later"><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                                <a href="#" class="news-box__settings-link  news-box__settings-link_favour">
                                    <i class="fa fa-bookmark" aria-hidden="true"></i>
                                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="news-section__col  news-section__col_knowledge  news-box  col-md-6  col-xl-4  flex  flex-sm-column  justify-content-sm-between">
                        <div class="news-box__body">
                            <div class="news-box__title-head  content-text">
                                <h3>Открылась электронная регистрация на выставку «ЭкспоЭлектроника» 2018</h3>
                            </div>
                            <span class="news-box__date">02.02.2018</span>
                            <span class="news-box__author"><i class="fa fa-user"></i><a href="#">ITE</a></span>
                            <div class="news-box__img-wrap  news-box__img-wrap_knowledge  img-wrap">
                                <img src="/images/temp/news-poster1.jpg" alt="">
                            </div>
                            <div class="news-box__info  flex justify-content-between align-items-center">
                                <div class="news-box__liked"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 243</div>
                                <div class="news-box__view"><i class="news-box__view-fa  fa fa-eye" aria-hidden="true"></i>243</div>
                            </div>
                            <div class="news-box__content  content-text">
                                <p>Приглашаем вас посетить 21-ю Международную выставку электронных компонентов, модулей и комплектующих «ЭкспоЭлектроника», которая состоится 17-19 апреля 2018 года в Крокус Экспо.</p>
                            </div>
                        </div>
                        <div class="news-box__foot  flex  justify-content-between  align-items-center">
                            <a href="#" class="news-box__btn  button  button_blue">
                                <span class="btn__in">Смотреть</span>
                            </a>
                            <div class="news-box__settings">
                                <a href="#" class="news-box__settings-link  news-box__settings-link_later"><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                                <a href="#" class="news-box__settings-link  news-box__settings-link_favour">
                                    <i class="fa fa-bookmark" aria-hidden="true"></i>
                                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="news-section__col  news-section__col_knowledge  news-box  col-md-6  col-xl-4  flex  flex-sm-column  justify-content-sm-between">
                        <div class="news-box__body">
                            <div class="news-box__title-head  content-text">
                                <h3>Открылась электронная регистрация на выставку «ЭкспоЭлектроника» 2018</h3>
                            </div>
                            <span class="news-box__date">02.02.2018</span>
                            <span class="news-box__author"><i class="fa fa-user"></i><a href="#">ITE</a></span>
                            <div class="news-box__img-wrap  news-box__img-wrap_knowledge  img-wrap">
                                <img src="/images/temp/news-poster1.jpg" alt="">
                            </div>
                            <div class="news-box__info  flex justify-content-between align-items-center">
                                <div class="news-box__liked"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 243</div>
                                <div class="news-box__view"><i class="news-box__view-fa  fa fa-eye" aria-hidden="true"></i>243</div>
                            </div>
                            <div class="news-box__content  content-text">
                                <p>Приглашаем вас посетить 21-ю Международную выставку электронных компонентов, модулей и комплектующих «ЭкспоЭлектроника», которая состоится 17-19 апреля 2018 года в Крокус Экспо.</p>
                            </div>
                        </div>
                        <div class="news-box__foot  flex  justify-content-between  align-items-center">
                            <a href="#" class="news-box__btn  button  button_blue">
                                <span class="btn__in">Смотреть</span>
                            </a>
                            <div class="news-box__settings">
                                <a href="#" class="news-box__settings-link  news-box__settings-link_later"><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                                <a href="#" class="news-box__settings-link  news-box__settings-link_favour">
                                    <i class="fa fa-bookmark" aria-hidden="true"></i>
                                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="news-section__col  news-section__col_knowledge  news-box  col-md-6  col-xl-4  flex  flex-sm-column  justify-content-sm-between">
                        <div class="news-box__body">
                            <div class="news-box__title-head  content-text">
                                <h3>Открылась электронная регистрация на выставку «ЭкспоЭлектроника» 2018</h3>
                            </div>
                            <span class="news-box__date">02.02.2018</span>
                            <span class="news-box__author"><i class="fa fa-user"></i><a href="#">ITE</a></span>
                            <div class="news-box__img-wrap  news-box__img-wrap_knowledge  img-wrap">
                                <img src="/images/temp/news-poster1.jpg" alt="">
                            </div>
                            <div class="news-box__info  flex justify-content-between align-items-center">
                                <div class="news-box__liked"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 243</div>
                                <div class="news-box__view"><i class="news-box__view-fa  fa fa-eye" aria-hidden="true"></i>243</div>
                            </div>
                            <div class="news-box__content  content-text">
                                <p>Приглашаем вас посетить 21-ю Международную выставку электронных компонентов, модулей и комплектующих «ЭкспоЭлектроника», которая состоится 17-19 апреля 2018 года в Крокус Экспо.</p>
                            </div>
                        </div>
                        <div class="news-box__foot  flex  justify-content-between  align-items-center">
                            <a href="#" class="news-box__btn  button  button_blue">
                                <span class="btn__in">Смотреть</span>
                            </a>
                            <div class="news-box__settings">
                                <a href="#" class="news-box__settings-link  news-box__settings-link_later"><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                                <a href="#" class="news-box__settings-link  news-box__settings-link_favour">
                                    <i class="fa fa-bookmark" aria-hidden="true"></i>
                                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="news-section__col  news-section__col_knowledge  news-box  col-md-6  col-xl-4  flex  flex-sm-column  justify-content-sm-between">
                        <div class="news-box__body">
                            <div class="news-box__title-head  content-text">
                                <h3>Открылась электронная регистрация на выставку «ЭкспоЭлектроника» 2018</h3>
                            </div>
                            <span class="news-box__date">02.02.2018</span>
                            <span class="news-box__author"><i class="fa fa-user"></i><a href="#">ITE</a></span>
                            <div class="news-box__img-wrap  news-box__img-wrap_knowledge  img-wrap">
                                <img src="/images/temp/news-poster1.jpg" alt="">
                            </div>
                            <div class="news-box__info  flex justify-content-between align-items-center">
                                <div class="news-box__liked"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 243</div>
                                <div class="news-box__view"><i class="news-box__view-fa  fa fa-eye" aria-hidden="true"></i>243</div>
                            </div>
                            <div class="news-box__content  content-text">
                                <p>Приглашаем вас посетить 21-ю Международную выставку электронных компонентов, модулей и комплектующих «ЭкспоЭлектроника», которая состоится 17-19 апреля 2018 года в Крокус Экспо.</p>
                            </div>
                        </div>
                        <div class="news-box__foot  flex  justify-content-between  align-items-center">
                            <a href="#" class="news-box__btn  button  button_blue">
                                <span class="btn__in">Смотреть</span>
                            </a>
                            <div class="news-box__settings">
                                <a href="#" class="news-box__settings-link  news-box__settings-link_later"><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                                <a href="#" class="news-box__settings-link  news-box__settings-link_favour">
                                    <i class="fa fa-bookmark" aria-hidden="true"></i>
                                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="news-section__col  news-section__col_knowledge  news-box  col-md-6  col-xl-4  flex  flex-sm-column  justify-content-sm-between">
                        <div class="news-box__body">
                            <div class="news-box__title-head  content-text">
                                <h3>Открылась электронная регистрация на выставку «ЭкспоЭлектроника» 2018</h3>
                            </div>
                            <span class="news-box__date">02.02.2018</span>
                            <span class="news-box__author"><i class="fa fa-user"></i><a href="#">ITE</a></span>
                            <div class="news-box__img-wrap  news-box__img-wrap_knowledge  img-wrap">
                                <img src="/images/temp/news-poster1.jpg" alt="">
                            </div>
                            <div class="news-box__info  flex justify-content-between align-items-center">
                                <div class="news-box__liked"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 243</div>
                                <div class="news-box__view"><i class="news-box__view-fa  fa fa-eye" aria-hidden="true"></i>243</div>
                            </div>
                            <div class="news-box__content  content-text">
                                <p>Приглашаем вас посетить 21-ю Международную выставку электронных компонентов, модулей и комплектующих «ЭкспоЭлектроника», которая состоится 17-19 апреля 2018 года в Крокус Экспо.</p>
                            </div>
                        </div>
                        <div class="news-box__foot  flex  justify-content-between  align-items-center">
                            <a href="#" class="news-box__btn  button  button_blue">
                                <span class="btn__in">Смотреть</span>
                            </a>
                            <div class="news-box__settings">
                                <a href="#" class="news-box__settings-link  news-box__settings-link_later"><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                                <a href="#" class="news-box__settings-link  news-box__settings-link_favour">
                                    <i class="fa fa-bookmark" aria-hidden="true"></i>
                                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="news-section__col  news-section__col_knowledge  news-box  col-md-6  col-xl-4  flex  flex-sm-column  justify-content-sm-between">
                        <div class="news-box__body">
                            <div class="news-box__title-head  content-text">
                                <h3>Открылась электронная регистрация на выставку «ЭкспоЭлектроника» 2018</h3>
                            </div>
                            <span class="news-box__date">02.02.2018</span>
                            <span class="news-box__author"><i class="fa fa-user"></i><a href="#">ITE</a></span>
                            <div class="news-box__img-wrap  news-box__img-wrap_knowledge  img-wrap">
                                <img src="/images/temp/news-poster1.jpg" alt="">
                            </div>
                            <div class="news-box__info  flex justify-content-between align-items-center">
                                <div class="news-box__liked"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 243</div>
                                <div class="news-box__view"><i class="news-box__view-fa  fa fa-eye" aria-hidden="true"></i>243</div>
                            </div>
                            <div class="news-box__content  content-text">
                                <p>Приглашаем вас посетить 21-ю Международную выставку электронных компонентов, модулей и комплектующих «ЭкспоЭлектроника», которая состоится 17-19 апреля 2018 года в Крокус Экспо.</p>
                            </div>
                        </div>
                        <div class="news-box__foot  flex  justify-content-between  align-items-center">
                            <a href="#" class="news-box__btn  button  button_blue">
                                <span class="btn__in">Смотреть</span>
                            </a>
                            <div class="news-box__settings">
                                <a href="#" class="news-box__settings-link  news-box__settings-link_later"><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                                <a href="#" class="news-box__settings-link  news-box__settings-link_favour">
                                    <i class="fa fa-bookmark" aria-hidden="true"></i>
                                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="news-section__col  news-section__col_knowledge  news-box  col-md-6  col-xl-4  flex  flex-sm-column  justify-content-sm-between">
                        <div class="news-box__body">
                            <div class="news-box__title-head  content-text">
                                <h3>Открылась электронная регистрация на выставку «ЭкспоЭлектроника» 2018</h3>
                            </div>
                            <span class="news-box__date">02.02.2018</span>
                            <span class="news-box__author"><i class="fa fa-user"></i><a href="#">ITE</a></span>
                            <div class="news-box__img-wrap  news-box__img-wrap_knowledge  img-wrap">
                                <img src="/images/temp/news-poster1.jpg" alt="">
                            </div>
                            <div class="news-box__info  flex justify-content-between align-items-center">
                                <div class="news-box__liked"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 243</div>
                                <div class="news-box__view"><i class="news-box__view-fa  fa fa-eye" aria-hidden="true"></i>243</div>
                            </div>
                            <div class="news-box__content  content-text">
                                <p>Приглашаем вас посетить 21-ю Международную выставку электронных компонентов, модулей и комплектующих «ЭкспоЭлектроника», которая состоится 17-19 апреля 2018 года в Крокус Экспо.</p>
                            </div>
                        </div>
                        <div class="news-box__foot  flex  justify-content-between  align-items-center">
                            <a href="#" class="news-box__btn  button  button_blue">
                                <span class="btn__in">Смотреть</span>
                            </a>
                            <div class="news-box__settings">
                                <a href="#" class="news-box__settings-link  news-box__settings-link_later"><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                                <a href="#" class="news-box__settings-link  news-box__settings-link_favour">
                                    <i class="fa fa-bookmark" aria-hidden="true"></i>
                                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="news-section__pagination  pagination  pagination_grey  flex  justify-content-center">
                    <ul class="row  justify-content-center  align-items-end">
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li>...</li>
                        <li><a href="#">11</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="news-section__result">
            <div class="container">
                <div class="news-section__title  content-text  color-blue">
                    <h3>Интервью</h3>
                </div>
                <div class="row">
                    <div class="news-section__col  news-section__col_knowledge  news-box  col-md-6  col-xl-4  flex  flex-sm-column  justify-content-sm-between">
                        <div class="news-box__body">
                            <div class="news-box__title-head  content-text">
                                <h3>Открылась электронная регистрация на выставку «ЭкспоЭлектроника» 2018</h3>
                            </div>
                            <span class="news-box__date">02.02.2018</span>
                            <span class="news-box__author"><i class="fa fa-user"></i><a href="#">ITE</a></span>
                            <div class="news-box__img-wrap  news-box__img-wrap_knowledge  img-wrap">
                                <img src="/images/temp/news-poster1.jpg" alt="">
                            </div>
                            <div class="news-box__info  flex justify-content-between align-items-center">
                                <div class="news-box__liked"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 243</div>
                                <div class="news-box__view"><i class="news-box__view-fa  fa fa-eye" aria-hidden="true"></i>243</div>
                            </div>
                            <div class="news-box__content  content-text">
                                <p>Приглашаем вас посетить 21-ю Международную выставку электронных компонентов, модулей и комплектующих «ЭкспоЭлектроника», которая состоится 17-19 апреля 2018 года в Крокус Экспо.</p>
                            </div>
                        </div>
                        <div class="news-box__foot  flex  justify-content-between  align-items-center">
                            <a href="#" class="news-box__btn  button  button_blue">
                                <span class="btn__in">Смотреть</span>
                            </a>
                            <div class="news-box__settings">
                                <a href="#" class="news-box__settings-link  news-box__settings-link_later"><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                                <a href="#" class="news-box__settings-link  news-box__settings-link_favour">
                                    <i class="fa fa-bookmark" aria-hidden="true"></i>
                                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="news-section__col  news-section__col_knowledge  news-box  col-md-6  col-xl-4  flex  flex-sm-column  justify-content-sm-between">
                        <div class="news-box__body">
                            <div class="news-box__title-head  content-text">
                                <h3>Открылась электронная регистрация на выставку «ЭкспоЭлектроника» 2018</h3>
                            </div>
                            <span class="news-box__date">02.02.2018</span>
                            <span class="news-box__author"><i class="fa fa-user"></i><a href="#">ITE</a></span>
                            <div class="news-box__img-wrap  news-box__img-wrap_knowledge  img-wrap">
                                <img src="/images/temp/news-poster1.jpg" alt="">
                            </div>
                            <div class="news-box__info  flex justify-content-between align-items-center">
                                <div class="news-box__liked"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 243</div>
                                <div class="news-box__view"><i class="news-box__view-fa  fa fa-eye" aria-hidden="true"></i>243</div>
                            </div>
                            <div class="news-box__content  content-text">
                                <p>Приглашаем вас посетить 21-ю Международную выставку электронных компонентов, модулей и комплектующих «ЭкспоЭлектроника», которая состоится 17-19 апреля 2018 года в Крокус Экспо.</p>
                            </div>
                        </div>
                        <div class="news-box__foot  flex  justify-content-between  align-items-center">
                            <a href="#" class="news-box__btn  button  button_blue">
                                <span class="btn__in">Смотреть</span>
                            </a>
                            <div class="news-box__settings">
                                <a href="#" class="news-box__settings-link  news-box__settings-link_later"><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                                <a href="#" class="news-box__settings-link  news-box__settings-link_favour">
                                    <i class="fa fa-bookmark" aria-hidden="true"></i>
                                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="news-section__col  news-section__col_knowledge  news-box  col-md-6  col-xl-4  flex  flex-sm-column  justify-content-sm-between">
                        <div class="news-box__body">
                            <div class="news-box__title-head  content-text">
                                <h3>Открылась электронная регистрация на выставку «ЭкспоЭлектроника» 2018</h3>
                            </div>
                            <span class="news-box__date">02.02.2018</span>
                            <span class="news-box__author"><i class="fa fa-user"></i><a href="#">ITE</a></span>
                            <div class="news-box__img-wrap  news-box__img-wrap_knowledge  img-wrap">
                                <img src="/images/temp/news-poster1.jpg" alt="">
                            </div>
                            <div class="news-box__info  flex justify-content-between align-items-center">
                                <div class="news-box__liked"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 243</div>
                                <div class="news-box__view"><i class="news-box__view-fa  fa fa-eye" aria-hidden="true"></i>243</div>
                            </div>
                            <div class="news-box__content  content-text">
                                <p>Приглашаем вас посетить 21-ю Международную выставку электронных компонентов, модулей и комплектующих «ЭкспоЭлектроника», которая состоится 17-19 апреля 2018 года в Крокус Экспо.</p>
                            </div>
                        </div>
                        <div class="news-box__foot  flex  justify-content-between  align-items-center">
                            <a href="#" class="news-box__btn  button  button_blue">
                                <span class="btn__in">Смотреть</span>
                            </a>
                            <div class="news-box__settings">
                                <a href="#" class="news-box__settings-link  news-box__settings-link_later"><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                                <a href="#" class="news-box__settings-link  news-box__settings-link_favour">
                                    <i class="fa fa-bookmark" aria-hidden="true"></i>
                                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="news-section__pagination  pagination  pagination_grey  flex  justify-content-center">
                    <ul class="row  justify-content-center  align-items-end">
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li>...</li>
                        <li><a href="#">11</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="news-section__result">
            <div class="container">
                <div class="news-section__title  content-text  color-blue">
                    <h3>Аналитика</h3>
                </div>
                <div class="row">
                    <div class="news-section__col  news-section__col_knowledge  news-box  col-md-6  col-xl-4  flex  flex-sm-column  justify-content-sm-between">
                        <div class="news-box__body">
                            <div class="news-box__title-head  content-text">
                                <h3>Открылась электронная регистрация на выставку «ЭкспоЭлектроника» 2018</h3>
                            </div>
                            <span class="news-box__date">02.02.2018</span>
                            <span class="news-box__author"><i class="fa fa-user"></i><a href="#">ITE</a></span>
                            <div class="news-box__img-wrap  news-box__img-wrap_knowledge  img-wrap">
                                <img src="/images/temp/news-poster1.jpg" alt="">
                            </div>
                            <div class="news-box__info  flex justify-content-between align-items-center">
                                <div class="news-box__liked"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 243</div>
                                <div class="news-box__view"><i class="news-box__view-fa  fa fa-eye" aria-hidden="true"></i>243</div>
                            </div>
                            <div class="news-box__content  content-text">
                                <p>Приглашаем вас посетить 21-ю Международную выставку электронных компонентов, модулей и комплектующих «ЭкспоЭлектроника», которая состоится 17-19 апреля 2018 года в Крокус Экспо.</p>
                            </div>
                        </div>
                        <div class="news-box__foot  flex  justify-content-between  align-items-center">
                            <a href="#" class="news-box__btn  button  button_blue">
                                <span class="btn__in">Смотреть</span>
                            </a>
                            <div class="news-box__settings">
                                <a href="#" class="news-box__settings-link  news-box__settings-link_later"><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                                <a href="#" class="news-box__settings-link  news-box__settings-link_favour">
                                    <i class="fa fa-bookmark" aria-hidden="true"></i>
                                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="news-section__col  news-section__col_knowledge  news-box  col-md-6  col-xl-4  flex  flex-sm-column  justify-content-sm-between">
                        <div class="news-box__body">
                            <div class="news-box__title-head  content-text">
                                <h3>Открылась электронная регистрация на выставку «ЭкспоЭлектроника» 2018</h3>
                            </div>
                            <span class="news-box__date">02.02.2018</span>
                            <span class="news-box__author"><i class="fa fa-user"></i><a href="#">ITE</a></span>
                            <div class="news-box__img-wrap  news-box__img-wrap_knowledge  img-wrap">
                                <img src="/images/temp/news-poster1.jpg" alt="">
                            </div>
                            <div class="news-box__info  flex justify-content-between align-items-center">
                                <div class="news-box__liked"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 243</div>
                                <div class="news-box__view"><i class="news-box__view-fa  fa fa-eye" aria-hidden="true"></i>243</div>
                            </div>
                            <div class="news-box__content  content-text">
                                <p>Приглашаем вас посетить 21-ю Международную выставку электронных компонентов, модулей и комплектующих «ЭкспоЭлектроника», которая состоится 17-19 апреля 2018 года в Крокус Экспо.</p>
                            </div>
                        </div>
                        <div class="news-box__foot  flex  justify-content-between  align-items-center">
                            <a href="#" class="news-box__btn  button  button_blue">
                                <span class="btn__in">Смотреть</span>
                            </a>
                            <div class="news-box__settings">
                                <a href="#" class="news-box__settings-link  news-box__settings-link_later"><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                                <a href="#" class="news-box__settings-link  news-box__settings-link_favour">
                                    <i class="fa fa-bookmark" aria-hidden="true"></i>
                                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="news-section__col  news-section__col_knowledge  news-box  col-md-6  col-xl-4  flex  flex-sm-column  justify-content-sm-between">
                        <div class="news-box__body">
                            <div class="news-box__title-head  content-text">
                                <h3>Открылась электронная регистрация на выставку «ЭкспоЭлектроника» 2018</h3>
                            </div>
                            <span class="news-box__date">02.02.2018</span>
                            <span class="news-box__author"><i class="fa fa-user"></i><a href="#">ITE</a></span>
                            <div class="news-box__img-wrap  news-box__img-wrap_knowledge  img-wrap">
                                <img src="/images/temp/news-poster1.jpg" alt="">
                            </div>
                            <div class="news-box__info  flex justify-content-between align-items-center">
                                <div class="news-box__liked"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 243</div>
                                <div class="news-box__view"><i class="news-box__view-fa  fa fa-eye" aria-hidden="true"></i>243</div>
                            </div>
                            <div class="news-box__content  content-text">
                                <p>Приглашаем вас посетить 21-ю Международную выставку электронных компонентов, модулей и комплектующих «ЭкспоЭлектроника», которая состоится 17-19 апреля 2018 года в Крокус Экспо.</p>
                            </div>
                        </div>
                        <div class="news-box__foot  flex  justify-content-between  align-items-center">
                            <a href="#" class="news-box__btn  button  button_blue">
                                <span class="btn__in">Смотреть</span>
                            </a>
                            <div class="news-box__settings">
                                <a href="#" class="news-box__settings-link  news-box__settings-link_later"><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                                <a href="#" class="news-box__settings-link  news-box__settings-link_favour">
                                    <i class="fa fa-bookmark" aria-hidden="true"></i>
                                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="news-section__pagination  pagination  pagination_grey  flex  justify-content-center">
                    <ul class="row  justify-content-center  align-items-end">
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li>...</li>
                        <li><a href="#">11</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php \app\widgets\FavoriteAddJsWidget::widget([
        'findClass' =>'news-box__settings-link_favour' ,
        'url' => '/main/publications-favorite',
        'data' => 'favorite_id',
])?>
		