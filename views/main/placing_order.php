<?php use yii\widgets\ListView;
use yii\widgets\Pjax;

?>
    <div class="banner  banner_order  background" style="background-image: url(/images/banner-placing-order.jpg);">
    <div class="container">
        <div class="row  justify-content-center">
            <div class="banner__content-order  content-text  col-xl-7">
                <h1>Размещение запросов</h1>
                <p>Вы можете отправить запрос без регистрации личного кабинета. Тогда на почту вам придет подтверждающее письмо и список выбранных компаний, которым был отправлен Ваш запрос. </p>
                <p>Зарегистрируйте личный кабинет, чтобы видеть сразу все ваши запросы, ставить оценки компаниям, отправлять новые запросы тем же группам компаний. Также вы сможете легко организовывать коммерческие тендеры, работать с Базой Знаний и многое другое!</p>
            </div>
        </div>
    </div>
    <a href="#down" class="go_down"></a>
</div>
<?php Pjax::begin()?>

<?=$this->render('_placing_order_filter',['dataProvider'=>$dataProvider,'searchModel'=>$searchModel])?>

<div class="results  results_order" id="results">
    <div class="results_block__container  container">

        <div class="block_buttons select_all_box">
            <div class="row  align-items-center">
                <div class="results_block__btn-company  col-sm-6  col-lg-3">
                    <label class="checkbox-label  checkbox-label_results_block_all">
                        <input type="checkbox" class="checkbox-label__input-check" id="select_all">
                        <span class="checkbox-label__pseudo-check"></span>
                        <span>Выбрать все</span>
                    </label>
                </div>
                <div class="results_block__btn-company  col-sm-6  col-lg-3">
                    <a href="#forms" class="results__btn  button button_green">Отправить запрос выбранным компаниям</a>
                </div>
                <div class="results_block__btn-company  col-sm-6  col-lg-3">
                    <a href="#" class="results__btn  results__btn_many_text  button button_blue">Организовать тендер с выбранными компаниями</a>
                </div>
                <div class="results_block__btn-company  col-sm-6  col-lg-3">
                    <a href="#" class="results__btn  button button_white  button_white_color_blue">Сравнить выбранные компании</a>
                </div>
            </div>
        </div>
<!--        --><?//= ListView::widget([
//        'options'=>['class' => 'results_block','tag'=>'ul'],
//        'dataProvider' => $dataProvider,
//        'layout' => '{summary}{items}',
//        'itemView'=>'_placing_order_items',
//        'itemOptions' => [
//        'tag' => 'li',
//        'class' => 'row justify-content-between  align-items-center',
//        ],
//        'emptyText' =>t('No results'),
//        ]);?>
<!--        --><?php //dd($dataProvider) ?>
        <div class="centered_text">
            <?php $limit = 10;?>
            <?php if(!empty(Yii::$app->request->queryParams['page'])): $page = Yii::$app->request->queryParams['page']; $page++; $limit = $limit + 10;?>
                <a href="<?=\yii\helpers\Url::current(['page'=>$page,'limit'=>$limit])?>" class="button  button_green  block-centered">Показать еще</a>
            <?php else:?>
                <a href="<?=\yii\helpers\Url::current(['page'=>2,'limit'=>$limit])?>" class="button  button_green  block-centered">Показать еще</a>
            <?php endif;?>
        </div>
    </div>
</div>
<?=$this->render('_placing_order_form',['dataProvider'=>$dataProvider,'searchModel'=>$searchModel,'model'=>$model,'user'=>$user])?>

<!--        <ul class="results_block premium">-->
<!--            <li>-->
<!--                <div class="row justify-content-between  align-items-center">-->
<!--                    <div class="results_block__company_info  company_info  col-12  col-lg-9  col-xl-8">-->
<!--                        <div class="row">-->
<!--                            <div class="col-auto">-->
<!--                                <label class="results_block__check-label  checkbox-label">-->
<!--                                    <input type="checkbox" class="checkbox-label__input-check  comp_name" data-text="ООО «Доломант» 1">-->
<!--                                    <span class="checkbox-label__pseudo-check"></span>-->
<!--                                </label>-->
<!--                            </div>-->
<!--                            <div class="results_block__info-box  col-sm">-->
<!--                                <div class="company_info_box flex">-->
<!--                                    <div class="company_info_box__title  content-text"><h3><a href="#">ООО «Доломант» 1</a></h3></div>-->
<!--                                    <span><img src="/images/temp/stars_yellow.png" alt="">(9/10)</span>-->
<!--                                    <div class="wit_small"><img src="/images/wit_small.png" alt=""></div>-->
<!--                                </div>-->
<!--                                <div class="text_block">-->
<!--                                    <p>-->
<!--                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.-->
<!--                                    </p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="results_block__buttons  col-12  col-lg-3  col-xl-4">-->
<!---->
<!--                        <a href="#" class="results_block__btn  results_block__btn_large  button  button_green"><i class="fa fa-share-square-o" aria-hidden="true"></i>Сделать запрос</a>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="row justify-content-between  align-items-center">-->
<!--                    <div class="results_block__company_info  company_info  col-12  col-lg-9  col-xl-8">-->
<!--                        <div class="row">-->
<!--                            <div class="col-auto">-->
<!--                                <label class="results_block__check-label  checkbox-label">-->
<!--                                    <input type="checkbox" class="checkbox-label__input-check  comp_name" data-text="ООО «Доломант» 2">-->
<!--                                    <span class="checkbox-label__pseudo-check"></span>-->
<!--                                </label>-->
<!--                            </div>-->
<!--                            <div class="results_block__info-box  col-sm">-->
<!--                                <div class="company_info_box flex">-->
<!--                                    <div class="company_info_box__title  content-text"><h3><a href="#">ООО «Доломант» 2</a></h3></div>-->
<!--                                    <span><img src="/images/temp/stars_yellow.png" alt="">(9/10)</span>-->
<!--                                    <div class="wit_small"><img src="/images/wit_small.png" alt=""></div>-->
<!--                                </div>-->
<!--                                <div class="text_block">-->
<!--                                    <p>-->
<!--                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.-->
<!--                                    </p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="results_block__buttons  col-12  col-lg-3  col-xl-4">-->
<!---->
<!--                        <a href="#" class="results_block__btn  results_block__btn_large  button  button_green"><i class="fa fa-share-square-o" aria-hidden="true"></i>Сделать запрос</a>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="row justify-content-between  align-items-center">-->
<!--                    <div class="results_block__company_info  company_info  col-12  col-lg-9  col-xl-8">-->
<!--                        <div class="row">-->
<!--                            <div class="col-auto">-->
<!--                                <label class="results_block__check-label  checkbox-label">-->
<!--                                    <input type="checkbox" class="checkbox-label__input-check  comp_name" data-text="ООО «Доломант» 3">-->
<!--                                    <span class="checkbox-label__pseudo-check"></span>-->
<!--                                </label>-->
<!--                            </div>-->
<!--                            <div class="results_block__info-box  col-sm">-->
<!--                                <div class="company_info_box flex">-->
<!--                                    <div class="company_info_box__title  content-text"><h3><a href="#">ООО «Доломант» 3</a></h3></div>-->
<!--                                    <span><img src="/images/temp/stars_yellow.png" alt="">(9/10)</span>-->
<!--                                    <div class="wit_small"><img src="/images/wit_small.png" alt=""></div>-->
<!--                                </div>-->
<!--                                <div class="text_block">-->
<!--                                    <p>-->
<!--                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.-->
<!--                                    </p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="results_block__buttons  col-12  col-lg-3  col-xl-4">-->
<!---->
<!--                        <a href="#" class="results_block__btn  results_block__btn_large  button  button_green"><i class="fa fa-share-square-o" aria-hidden="true"></i>Сделать запрос</a>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="row justify-content-between  align-items-center">-->
<!--                    <div class="results_block__company_info  company_info  col-12  col-lg-9  col-xl-8">-->
<!--                        <div class="row">-->
<!--                            <div class="col-auto">-->
<!--                                <label class="results_block__check-label  checkbox-label">-->
<!--                                    <input type="checkbox" class="checkbox-label__input-check  comp_name" data-text="ООО «Доломант» 4">-->
<!--                                    <span class="checkbox-label__pseudo-check"></span>-->
<!--                                </label>-->
<!--                            </div>-->
<!--                            <div class="results_block__info-box  col-sm">-->
<!--                                <div class="company_info_box flex">-->
<!--                                    <div class="company_info_box__title  content-text"><h3><a href="#">ООО «Доломант» 4</a></h3></div>-->
<!--                                    <span><img src="/images/temp/stars_yellow.png" alt="">(9/10)</span>-->
<!--                                    <div class="wit_small"><img src="/images/wit_small.png" alt=""></div>-->
<!--                                </div>-->
<!--                                <div class="text_block">-->
<!--                                    <p>-->
<!--                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.-->
<!--                                    </p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="results_block__buttons  col-12  col-lg-3  col-xl-4">-->
<!---->
<!--                        <a href="#" class="results_block__btn  results_block__btn_large  button  button_green"><i class="fa fa-share-square-o" aria-hidden="true"></i>Сделать запрос</a>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="row justify-content-between  align-items-center">-->
<!--                    <div class="results_block__company_info  company_info  col-12  col-lg-9  col-xl-8">-->
<!--                        <div class="row">-->
<!--                            <div class="col-auto">-->
<!--                                <label class="results_block__check-label  checkbox-label">-->
<!--                                    <input type="checkbox" class="checkbox-label__input-check  comp_name" data-text="ООО «Доломант» 5">-->
<!--                                    <span class="checkbox-label__pseudo-check"></span>-->
<!--                                </label>-->
<!--                            </div>-->
<!--                            <div class="results_block__info-box  col-sm">-->
<!--                                <div class="company_info_box flex">-->
<!--                                    <div class="company_info_box__title  content-text"><h3><a href="#">ООО «Доломант» 5</a></h3></div>-->
<!--                                    <span><img src="/images/temp/stars_yellow.png" alt="">(9/10)</span>-->
<!--                                    <div class="wit_small"><img src="/images/wit_small.png" alt=""></div>-->
<!--                                </div>-->
<!--                                <div class="text_block">-->
<!--                                    <p>-->
<!--                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.-->
<!--                                    </p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="results_block__buttons  col-12  col-lg-3  col-xl-4">-->
<!---->
<!--                        <a href="#" class="results_block__btn  results_block__btn_large  button  button_green"><i class="fa fa-share-square-o" aria-hidden="true"></i>Сделать запрос</a>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--            </li>-->
<!--        </ul>-->
<!--        <ul class="results_block">-->
<!--            <li>-->
<!--                <div class="row  justify-content-between  align-items-center">-->
<!--                    <div class="results_block__company_info  company_info  col-12  col-lg-9  col-xl-8">-->
<!--                        <div class="row">-->
<!--                            <div class="col-sm-auto">-->
<!---->
<!--                                <label class="results_block__check-label  checkbox-label">-->
<!--                                    <input type="checkbox" class="checkbox-label__input-check  comp_name" data-text="ООО «Доломант» 6">-->
<!--                                    <span class="checkbox-label__pseudo-check"></span>-->
<!--                                </label>-->
<!--                            </div>-->
<!--                            <div class="results_block__info-box  col-sm">-->
<!--                                <div class="company_info_box flex">-->
<!--                                    <div class="company_info_box__title  content-text"><h3><a href="#">ООО «Доломант» 6</a></h3></div>-->
<!--                                    <span><img src="/images/temp/stars_yellow.png" alt="">(9/10)</span>-->
<!--                                    <div class="wit_small"><img src="/images/wit_small.png" alt=""></div>-->
<!--                                </div>-->
<!--                                <div class="text_block">-->
<!--                                    <p>-->
<!--                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.-->
<!--                                    </p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="results_block__buttons  col-12  col-lg-3  col-xl-4">-->
<!---->
<!--                        <a href="#" class="results_block__btn  results_block__btn_large  button  button_green"><i class="fa fa-share-square-o" aria-hidden="true"></i>Сделать запрос</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->
<!---->
<!--            <li>-->
<!--                <div class="row  justify-content-between  align-items-center">-->
<!--                    <div class="results_block__company_info  company_info  col-12  col-lg-9  col-xl-8">-->
<!--                        <div class="row">-->
<!--                            <div class="col-sm-auto">-->
<!---->
<!--                                <label class="results_block__check-label  checkbox-label">-->
<!--                                    <input type="checkbox" class="checkbox-label__input-check  comp_name" data-text="ООО «Доломант» 7">-->
<!--                                    <span class="checkbox-label__pseudo-check"></span>-->
<!--                                </label>-->
<!--                            </div>-->
<!--                            <div class="results_block__info-box  col-sm">-->
<!--                                <div class="company_info_box flex">-->
<!--                                    <div class="company_info_box__title  content-text"><h3><a href="#">ООО «Доломант» 7</a></h3></div>-->
<!--                                    <span><img src="/images/temp/stars_yellow.png" alt="">(9/10)</span>-->
<!--                                    <div class="wit_small"><img src="/images/wit_small.png" alt=""></div>-->
<!--                                </div>-->
<!--                                <div class="text_block">-->
<!--                                    <p>-->
<!--                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.-->
<!--                                    </p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="results_block__buttons  col-12  col-lg-3  col-xl-4">-->
<!---->
<!--                        <a href="#" class="results_block__btn  results_block__btn_large  button  button_green"><i class="fa fa-share-square-o" aria-hidden="true"></i>Сделать запрос</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="row  justify-content-between  align-items-center">-->
<!--                    <div class="results_block__company_info  company_info  col-12  col-lg-9  col-xl-8">-->
<!--                        <div class="row">-->
<!--                            <div class="col-sm-auto">-->
<!---->
<!--                                <label class="results_block__check-label  checkbox-label">-->
<!--                                    <input type="checkbox" class="checkbox-label__input-check  comp_name" data-text="ООО «Доломант» 8">-->
<!--                                    <span class="checkbox-label__pseudo-check"></span>-->
<!--                                </label>-->
<!--                            </div>-->
<!--                            <div class="results_block__info-box  col-sm">-->
<!--                                <div class="company_info_box flex">-->
<!--                                    <div class="company_info_box__title  content-text"><h3><a href="#">ООО «Доломант» 8</a></h3></div>-->
<!--                                    <span><img src="/images/temp/stars_yellow.png" alt="">(9/10)</span>-->
<!--                                    <div class="wit_small"><img src="/images/wit_small.png" alt=""></div>-->
<!--                                </div>-->
<!--                                <div class="text_block">-->
<!--                                    <p>-->
<!--                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.-->
<!--                                    </p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="results_block__buttons  col-12  col-lg-3  col-xl-4">-->
<!---->
<!--                        <a href="#" class="results_block__btn  results_block__btn_large  button  button_green"><i class="fa fa-share-square-o" aria-hidden="true"></i>Сделать запрос</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="row  justify-content-between  align-items-center">-->
<!--                    <div class="results_block__company_info  company_info  col-12  col-lg-9  col-xl-8">-->
<!--                        <div class="row">-->
<!--                            <div class="col-sm-auto">-->
<!---->
<!--                                <label class="results_block__check-label  checkbox-label">-->
<!--                                    <input type="checkbox" class="checkbox-label__input-check  comp_name" data-text="ООО «Доломант» 9">-->
<!--                                    <span class="checkbox-label__pseudo-check"></span>-->
<!--                                </label>-->
<!--                            </div>-->
<!--                            <div class="results_block__info-box  col-sm">-->
<!--                                <div class="company_info_box flex">-->
<!--                                    <div class="company_info_box__title  content-text"><h3><a href="#">ООО «Доломант» 9</a></h3></div>-->
<!--                                    <span><img src="/images/temp/stars_yellow.png" alt="">(9/10)</span>-->
<!--                                    <div class="wit_small"><img src="/images/wit_small.png" alt=""></div>-->
<!--                                </div>-->
<!--                                <div class="text_block">-->
<!--                                    <p>-->
<!--                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.-->
<!--                                    </p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="results_block__buttons  col-12  col-lg-3  col-xl-4">-->
<!---->
<!--                        <a href="#" class="results_block__btn  results_block__btn_large  button  button_green"><i class="fa fa-share-square-o" aria-hidden="true"></i>Сделать запрос</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="row  justify-content-between  align-items-center">-->
<!--                    <div class="results_block__company_info  company_info  col-12  col-lg-9  col-xl-8">-->
<!--                        <div class="row">-->
<!--                            <div class="col-sm-auto">-->
<!---->
<!--                                <label class="results_block__check-label  checkbox-label">-->
<!--                                    <input type="checkbox" class="checkbox-label__input-check  comp_name" data-text="ООО «Доломант» 10">-->
<!--                                    <span class="checkbox-label__pseudo-check"></span>-->
<!--                                </label>-->
<!--                            </div>-->
<!--                            <div class="results_block__info-box  col-sm">-->
<!--                                <div class="company_info_box flex">-->
<!--                                    <div class="company_info_box__title  content-text"><h3><a href="#">ООО «Доломант» 10</a></h3></div>-->
<!--                                    <span><img src="/images/temp/stars_yellow.png" alt="">(9/10)</span>-->
<!--                                    <div class="wit_small"><img src="/images/wit_small.png" alt=""></div>-->
<!--                                </div>-->
<!--                                <div class="text_block">-->
<!--                                    <p>-->
<!--                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.-->
<!--                                    </p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="results_block__buttons  col-12  col-lg-3  col-xl-4">-->
<!---->
<!--                        <a href="#" class="results_block__btn  results_block__btn_large  button  button_green"><i class="fa fa-share-square-o" aria-hidden="true"></i>Сделать запрос</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->
<!--        </ul>-->
<!--        <ul class="results_block simple">-->
<!--            <li>-->
<!--                <div class="row  justify-content-between  align-items-center">-->
<!--                    <div class="results_block__company_info  company_info  col-12  col-lg-9  col-xl-8">-->
<!--                        <div class="row">-->
<!--                            <div class="col-sm-auto">-->
<!---->
<!--                                <label class="results_block__check-label  checkbox-label">-->
<!--                                    <input type="checkbox" class="checkbox-label__input-check  comp_name" data-text="ООО «Доломант» 11">-->
<!--                                    <span class="checkbox-label__pseudo-check"></span>-->
<!--                                </label>-->
<!--                            </div>-->
<!--                            <div class="results_block__info-box  col-sm">-->
<!--                                <div class="company_info_box flex">-->
<!--                                    <div class="company_info_box__title  content-text"><h3><a href="#">ООО «Доломант» 11</a></h3></div>-->
<!--                                    <span><img src="/images/temp/stars_yellow.png" alt="">(9/10)</span>-->
<!--                                    <div class="wit_small"><img src="/images/wit_small.png" alt=""></div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="results_block__buttons  col-12  col-lg-3  col-xl-4">-->
<!---->
<!--                        <a href="#" class="results_block__btn  results_block__btn_large  button  button_green"><i class="fa fa-share-square-o" aria-hidden="true"></i>Сделать запрос</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="row  justify-content-between  align-items-center">-->
<!--                    <div class="results_block__company_info  company_info  col-12  col-lg-9  col-xl-8">-->
<!--                        <div class="row">-->
<!--                            <div class="col-sm-auto">-->
<!---->
<!--                                <label class="results_block__check-label  checkbox-label">-->
<!--                                    <input type="checkbox" class="checkbox-label__input-check  comp_name" data-text="ООО «Доломант» 12">-->
<!--                                    <span class="checkbox-label__pseudo-check"></span>-->
<!--                                </label>-->
<!--                            </div>-->
<!--                            <div class="results_block__info-box  col-sm">-->
<!--                                <div class="company_info_box flex">-->
<!--                                    <div class="company_info_box__title  content-text"><h3><a href="#">ООО «Доломант» 12</a></h3></div>-->
<!--                                    <span><img src="/images/temp/stars_yellow.png" alt="">(9/10)</span>-->
<!--                                    <div class="wit_small"><img src="/images/wit_small.png" alt=""></div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="results_block__buttons  col-12  col-lg-3  col-xl-4">-->
<!---->
<!--                        <a href="#" class="results_block__btn  results_block__btn_large  button  button_green"><i class="fa fa-share-square-o" aria-hidden="true"></i>Сделать запрос</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="row  justify-content-between  align-items-center">-->
<!--                    <div class="results_block__company_info  company_info  col-12  col-lg-9  col-xl-8">-->
<!--                        <div class="row">-->
<!--                            <div class="col-sm-auto">-->
<!---->
<!--                                <label class="results_block__check-label  checkbox-label">-->
<!--                                    <input type="checkbox" class="checkbox-label__input-check  comp_name" data-text="ООО «Доломант» 13">-->
<!--                                    <span class="checkbox-label__pseudo-check"></span>-->
<!--                                </label>-->
<!--                            </div>-->
<!--                            <div class="results_block__info-box  col-sm">-->
<!--                                <div class="company_info_box flex">-->
<!--                                    <div class="company_info_box__title  content-text"><h3><a href="#">ООО «Доломант» 13</a></h3></div>-->
<!--                                    <span><img src="/images/temp/stars_yellow.png" alt="">(9/10)</span>-->
<!--                                    <div class="wit_small"><img src="/images/wit_small.png" alt=""></div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="results_block__buttons  col-12  col-lg-3  col-xl-4">-->
<!---->
<!--                        <a href="#" class="results_block__btn  results_block__btn_large  button  button_green"><i class="fa fa-share-square-o" aria-hidden="true"></i>Сделать запрос</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="row  justify-content-between  align-items-center">-->
<!--                    <div class="results_block__company_info  company_info  col-12  col-lg-9  col-xl-8">-->
<!--                        <div class="row">-->
<!--                            <div class="col-sm-auto">-->
<!---->
<!--                                <label class="results_block__check-label  checkbox-label">-->
<!--                                    <input type="checkbox" class="checkbox-label__input-check  comp_name" data-text="ООО «Доломант» 14">-->
<!--                                    <span class="checkbox-label__pseudo-check"></span>-->
<!--                                </label>-->
<!--                            </div>-->
<!--                            <div class="results_block__info-box  col-sm">-->
<!--                                <div class="company_info_box flex">-->
<!--                                    <div class="company_info_box__title  content-text"><h3><a href="#">ООО «Доломант» 14</a></h3></div>-->
<!--                                    <span><img src="/images/temp/stars_yellow.png" alt="">(9/10)</span>-->
<!--                                    <div class="wit_small"><img src="/images/wit_small.png" alt=""></div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="results_block__buttons  col-12  col-lg-3  col-xl-4">-->
<!---->
<!--                        <a href="#" class="results_block__btn  results_block__btn_large  button  button_green"><i class="fa fa-share-square-o" aria-hidden="true"></i>Сделать запрос</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="row  justify-content-between  align-items-center">-->
<!--                    <div class="results_block__company_info  company_info  col-12  col-lg-9  col-xl-8">-->
<!--                        <div class="row">-->
<!--                            <div class="col-sm-auto">-->
<!---->
<!--                                <label class="results_block__check-label  checkbox-label">-->
<!--                                    <input type="checkbox" class="checkbox-label__input-check  comp_name" data-text="ООО «Доломант» 15">-->
<!--                                    <span class="checkbox-label__pseudo-check"></span>-->
<!--                                </label>-->
<!--                            </div>-->
<!--                            <div class="results_block__info-box  col-sm">-->
<!--                                <div class="company_info_box flex">-->
<!--                                    <div class="company_info_box__title  content-text"><h3><a href="#">ООО «Доломант» 15</a></h3></div>-->
<!--                                    <span><img src="/images/temp/stars_yellow.png" alt="">(9/10)</span>-->
<!--                                    <div class="wit_small"><img src="/images/wit_small.png" alt=""></div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="results_block__buttons  col-12  col-lg-3  col-xl-4">-->
<!---->
<!--                        <a href="#" class="results_block__btn  results_block__btn_large  button  button_green"><i class="fa fa-share-square-o" aria-hidden="true"></i>Сделать запрос</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->
<!--        </ul>-->
<?php Pjax::end()?>