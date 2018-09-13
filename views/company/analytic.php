<div class="instruction">
    <div class="container">
        <a href="#" class="instruction__link">Краткая инструкция по работе с кабинетом компании</a>
    </div>
</div>
<div class="company-office">
    <div class="company-office__container  container">
        <div class="company-office__row  row">
            <button class="company-office__btn-menu  company-office__btn-menu_call  animated  pulse_bigger  infinite"><i class="fa fa-bars" aria-hidden="true"></i></button>
            <?=
            $this->render('_sidebar',['active'=>'analytic']);
            ?>
            <div class="company-office-content  col-md-8  col-lg-9">
                <div class="content-text  content-text_analytic_main_titie">
                    <h2>ООО «<?=$model->name?>»</h2>
                </div>
                <div class="company-statistic">
                    <div class="row">
                        <div class="col-lg-4  block-margin-adaptive">
                            <div class="company-statistic__item  background"  style="background-image: url(/images/company-stat-red.jpg);">
                                <span><?=$model->views?></span>
                                просмотры профиля
                            </div>
                        </div>
                        <div class="col-lg-4  block-margin-adaptive">
                            <div class="company-statistic__item  background"  style="background-image: url(/images/company-stat-green.jpg);">
                                <span><?=count($model->requests)?></span>
                                количество запросов
                            </div>
                        </div>
                        <div class="col-lg-4  block-margin-adaptive">
                            <div class="company-statistic__item  background"  style="background-image: url(/images/company-stat-blue.jpg);">
                                в избранном у
                                <span><?=count($model->favorites)?></span>
                                пользователей
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
<!--                    <div class="col-lg-5  block-margin-adaptive">-->
<!--                        <div class="company-analytic-box  background-color-white">-->
<!--                            <div class="row  justify-content-center  justify-content-xl-between  company-analytic-box__title  align-items-center">-->
<!--                                <div class="company-analytic-box__content gutters">-->
<!--                                    <h3>Статистика тендеров</h3>-->
<!--                                </div>-->
<!--                                <div class="gutters">-->
<!--                                    <select class="company-analytic-box__select  select  select--front-text">-->
<!--                                        <option data-display="За месяц">За месяц</option>-->
<!--                                        <option>За год</option>-->
<!--                                        <option>Всего</option>-->
<!--                                    </select>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="highchart-pie-box">-->
<!--                                <div id="highchart-pie" class="highchart-pie"></div>-->
<!--                                <div class="row  justify-content-center">-->
<!--                                    <div class="e-chart-box__descr  gutters"><div class="highchart-pie-box__disc  background-color-green"></div> выиграно</div>-->
<!--                                    <div class="e-chart-box__descr  gutters"><div class="highchart-pie-box__disc  background-color-red"></div> проиграно</div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                 <?=\app\widgets\ActivityAnalyticWidget::widget(['id'=>'hightchart-analytic',
                     'options'=>[
                         'categories'=>
                             [
                               '0'=>t('Рекламные акции'),
                               '1'=>t('Новости компании'),
                               '2'=>t('Объявления'),
                             ],
                         'data'=>
                            [
                                '0'=>count($model->newsSale),
                                '1'=>count($model->newsCompany),
                                '2'=>count($model->ads)
                            ],
                         'name'=>t('Посты')
                     ]])?>
                    <div class="col-lg-5  block-margin-adaptive">
                        <div class="company-analytic-box  background-color-white">
                            <div class="row  justify-content-center  company-analytic-box__title  align-items-center">
                                <div class="company-analytic-box__content gutters">
                                    <h3>Заинтересованность</h3>
                                </div>
                                <div class="gutters">
                                    <select class="company-analytic-box__select  select  select--front-text">
                                        <option data-display="За месяц">За месяц</option>
                                        <option>За год</option>
                                        <option>Всего</option>
                                    </select>
                                </div>
                            </div>

                            <div class="dotted-box  dotted-box_analytic  text">
                                <div class="dotted-box__in">
                                    <div class="dotted-box__item  dotted-box__item_left"><div class="circle  background-color-blue"></div>Клики на контакты</div>
                                    <div class="dotted-box__item  dotted-box__item_right">123</div>
                                </div>
                                <div class="dotted-box__in">
                                    <div class="dotted-box__item  dotted-box__item_left"><div class="circle  background-color-green"></div>Клики перейти на сайт</div>
                                    <div class="dotted-box__item  dotted-box__item_right">12312</div>
                                </div>
                                <div class="dotted-box__in">
                                    <div class="dotted-box__item  dotted-box__item_left"><div class="circle  background-color-red"></div>Клики на фото</div>
                                    <div class="dotted-box__item  dotted-box__item_right">1231212</div>
                                </div>
                                <div class="dotted-box__in">
                                    <div class="dotted-box__item  dotted-box__item_left"><div class="circle  background-color-blue"></div>Клики на новости</div>
                                    <div class="dotted-box__item  dotted-box__item_right">12312</div>
                                </div>
                                <div class="dotted-box__in">
                                    <div class="dotted-box__item  dotted-box__item_left"><div class="circle  background-color-green"></div>Клики на статьи</div>
                                    <div class="dotted-box__item  dotted-box__item_right">1231</div>
                                </div>
                                <div class="dotted-box__in">
                                    <div class="dotted-box__item  dotted-box__item_left"><div class="circle  background-color-red"></div>Клики объявления</div>
                                    <div class="dotted-box__item  dotted-box__item_right">1232121</div>
                                </div>
                                <div class="dotted-box__in">
                                    <div class="dotted-box__item  dotted-box__item_left"><div class="circle  background-color-blue"></div>Клики по рекламе</div>
                                    <div class="dotted-box__item  dotted-box__item_right">1231</div>
                                </div>
                                <div class="dotted-box__in">
                                    <div class="dotted-box__item  dotted-box__item_left"><div class="circle  background-color-green"></div>Количество участников вебинаров</div>
                                    <div class="dotted-box__item  dotted-box__item_right">12311</div>
                                </div>
                                <div class="dotted-box__in">
                                    <div class="dotted-box__item  dotted-box__item_left"><div class="circle  background-color-red"></div>Клики по рассылкам</div>
                                    <div class="dotted-box__item  dotted-box__item_right">12223</div>
                                </div>
                            </div>
                        </div>
                    </div>
<!--                    <div class="col-lg-7  block-margin-adaptive">-->
<!--                        <div class="company-analytic-box  background-color-white">-->
<!--                            <div class="row  justify-content-center  company-analytic-box__title  align-items-center">-->
<!--                                <div class="company-analytic-box__content gutters">-->
<!--                                    <h3>Чаще всего сравнивали с компаниями </h3>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="comparison-companys">-->
<!--                                <div class="comparison-companys__item">-->
<!--                                    <div class="comparison-companys__item-in">ООО «Невская электронная компания»</div>-->
<!--                                    <a href="#" class="comparison-companys__item-in"><i class="fa fa-external-link" aria-hidden="true"></i>Посмотреть сравнение</a>-->
<!--                                </div>-->
<!--                                <div class="comparison-companys__item">-->
<!--                                    <div class="comparison-companys__item-in">ООО «123»</div>-->
<!--                                    <a href="#" class="comparison-companys__item-in"><i class="fa fa-external-link" aria-hidden="true"></i>Посмотреть сравнение</a>-->
<!--                                </div>-->
<!--                                <div class="comparison-companys__item">-->
<!--                                    <div class="comparison-companys__item-in">ООО «1234»</div>-->
<!--                                    <a href="#" class="comparison-companys__item-in"><i class="fa fa-external-link" aria-hidden="true"></i>Посмотреть сравнение</a>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col">-->
<!--                        <div class="company-analytic-box  company-analytic-box_rating  background-color-white">-->
<!--                            <div class="row  justify-content-center  company-analytic-box__title  align-items-center">-->
<!--                                <div class="company-analytic-box__content gutters">-->
<!--                                    <h3>Сводный рейтинг компании</h3>-->
<!--                                    <div class="company-analytic-box__rating  rating  text-center">-->
<!--                                         <span class="color-light-grey">Рейтинг</span> -->
<!--                                        <span><img src="/images/temp/stars_yellow.png" alt="">(9/10)</span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="company-analytic-box__rate-list  row">-->
<!--                                <div class="company-analytic-box__rate-item  rating  text-center">-->
<!--                                    <span>Стоимость</span>-->
<!--                                    <span><img src="/images/temp/stars_yellow.png" alt="">(9/10)</span>-->
<!--                                </div>-->
<!--                                <div class="company-analytic-box__rate-item  rating  text-center">-->
<!--                                    <span>Качество</span>-->
<!--                                    <span><img src="/images/temp/stars_yellow.png" alt="">(9/10)</span>-->
<!--                                </div>-->
<!--                                <div class="company-analytic-box__rate-item  rating  text-center">-->
<!--                                    <span>Сроки</span>-->
<!--                                    <span><img src="/images/temp/stars_yellow.png" alt="">(9/10)</span>-->
<!--                                </div>-->
<!--                                <div class="company-analytic-box__rate-item  rating  text-center">-->
<!--                                    <span>Персонал</span>-->
<!--                                    <span><img src="/images/temp/stars_yellow.png" alt="">(9/10)</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="company-office-content__link-wrap  text-right">-->
<!--                    <a href="#" class="link-reviews">Посмотреть оценки и отзывы</a>-->
<!--                </div>-->
            </div>
        </div>
    </div>
</div>
	