<?php  use yii\helpers\Html; ?>
<?php
$title = t($direction->name);

?>
<div class="banner  background" style="background-image: url(/images/electron.jpg);">
    <div class="container  container--relative">
        <div class="banner__bread-crumbs  bread-crumbs  flex  justify-content-center">
            <ul class="bread-crumbs__list  list  flex  align-items-center  justify-content-center">
                <li><a href="<?=\yii\helpers\Url::home()?>"><?=t('Главная')?></a></li>
                <li><span><?=$title?></span></li>
            </ul>
        </div>
        <div class="banner__content-wrap  content-text--text--center  row  justify-content-center">
            <div class="banner__content  content-text  content-text--color--white  text-center  col-xl-10">
                <h1>
                    <?=$title?>
                </h1>
                <p>
                   <?=t('У вас есть задачи в области производства электроники? Мы поможем Вам подобрать надежного разработчика, производителя, испытательный центр, поставщика оборудования или комплектующих, крутых специалистов или работу мечты и многое другое. Выбирайте тему из блоков ниже и действуйте!')?>
                </p>
            </div>
        </div>
        <div class="banner__production-info-list  row  justify-content-center  justify-content-sm-between">
            <div class="banner__production-info  production-info  gutters  text-center  color-white">
                <div class="production-info__value">
                    <div class="production-info__value-in"><?=$company_count?></div>
                    <div class="production-info__value-back"><?=$company_count?></div>
                </div>
                <div class="production-info__name"><?=t('Компаний')?></div>
            </div>
            <div class="banner__production-info  production-info  gutters  text-center  color-white">
                <div class="production-info__value">
                    <div class="production-info__value-in"><?=$region_count?></div>
                    <div class="production-info__value-back"><?=$region_count?></div>

                </div>
                <div class="production-info__name"><?=t('Городов')?></div>
            </div>
            <div class="banner__production-info  production-info  gutters  text-center  color-white">
                <div class="production-info__value">
                    <div class="production-info__value-in">135</div>
                    <div class="production-info__value-back">135</div>
                </div>
                <div class="production-info__name">Запросов</div>
            </div>
        </div>
        <div class="banner__btn-wrap  row justify-content-center">
            <a href="#" class="banner__btn  button  button_green  block-centered">
                <span class="btn__in">Отправить быстрый запрос</span>
            </a>
        </div>
    </div>
    <a href="#down" class="go_down"></a>
</div>
<?=\app\widgets\RegisterSectionWidget::widget()?>

<div class="small_branches  small_branches_electronics  background"  style="background-image: url(/images/small_branches-bg.jpg);">
    <div class="container in">
        <div class="row">

            <?php $arr[0]['img']= 'images/temp/br13.jpg'?>
            <?php $arr[0]['name']= 'БУ оборудование'?>
            <?php $arr[1]['img']= 'images/temp/br14.jpg'?>
            <?php $arr[1]['name']= 'Вакансии'?>

            <?php $c = 0; foreach ($themesServices as $key => $sub): ?>
                <?php if($c < 4): ?>
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src="/<?= $sub->theme->img ?>" alt="">
                        <span class="h2 white flex aic jcc"><?= $sub->theme->name ?></span>
                    </a>
                </div>
                <?php else: ?>
                <div class="col-md-4 col-sm-6">
                    <a href="#">
                        <img src="/<?= $sub->theme->img ?>" alt="">
                        <span class="h2 white flex aic jcc"><?= $sub->theme->name ?></span>
                    </a>
                </div>
                <?php endif; ?>
                <?php ($c == 6) ? $c = 0 : false; ?>
                <?php $c++; ?>
            <?php endforeach;?>

            <?php foreach ($arr as $key => $sub): ?>
                <?php if($c < 4): ?>
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src="/<?= $sub['img']?>" alt="">
                        <span class="h2 white flex aic jcc"><?= $sub['name']?></span>
                    </a>
                </div>
                <?php else: ?>
                <div class="col-md-4 col-sm-6">
                    <a href="#">
                        <img src="/<?= $sub['img'] ?>" alt="">
                        <span class="h2 white flex aic jcc"><?= $sub['name'] ?></span>
                    </a>
                </div>
                <?php endif; ?>
                <?php ($c == 6) ? $c = 0 : false; ?>
                <?php $c++; ?>
            <?php endforeach;?>

<!--            <div class="col-md-4 col-sm-6">-->
<!--                <a href="#">-->
<!--                    <img src="/images/temp/br13.jpg" alt="">-->
<!--                    <span class="h2 white flex aic jcc">БУ оборудование</span>-->
<!--                </a>-->
<!--            </div>-->
<!--            <div class="col-md-4 col-sm-6">-->
<!--                <a href="#">-->
<!--                    <img src="/images/temp/br14.jpg" alt="">-->
<!--                    <span class="h2 white flex aic jcc">Вакансии</span>-->
<!--                </a>-->
<!--            </div>-->

        </div>
    </div>
</div>

<div class="advice background" style="background-image: url(/images/advice_bg.jpg);">
    <div class="container">
        <div class="advice_slider owl-carousel owl-carousel_nav_angle  owl-carousel_dots_blue  owl-carousel_dots_white">
            <?php foreach ($advices as $tip): ?>
                <div class="item white">
                    <div class="advice_slider__content  content-text inner">
                        <h2><?= $tip->title ?></h2>
                        <p>
                            <?= $tip->text ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="banner  banner_small  background" style="background-image: url(/images/temp/banner_img.jpg);">
    <div class="container">
        <div class="banner__title">Пробный Баннер</div>
    </div>
</div>
<?=\app\widgets\WeareTrustedWidget::widget()?>
<?=\app\widgets\MostNewsWidget::widget()?>
<?=\app\widgets\SubscribeWidget::widget()?>