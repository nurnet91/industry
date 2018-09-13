<?php

use yii\helpers\Html;
?>

<?php if($theme->id == 1){throw new \yii\web\HttpException(404 ,'Ошибка');} ?>
<div class="banner  background" style="background-image: url(/images/banner-glass.jpg);">
    <div class="container  container--relative">
        <div class="banner__bread-crumbs  bread-crumbs  flex  justify-content-center">
            <ul class="bread-crumbs__list  list  flex  align-items-center  justify-content-center">

                <li><a href="<?=\yii\helpers\Url::home()?>"><?=t('Главная')?></a></li>
                <li><a href="<?=\yii\helpers\Url::to('/main/electronics')?>"><?=t($theme->parent->direction->name)?></a></li>
                <li><span><?=t($theme->name)?></span></li>
            </ul>
        </div>
        <div class="banner__content-wrap  row  justify-content-center">
            <div class="banner__content  content-text  content-text--text--center  content-text--color--white  text-center  col-xl-10">
                <h1><?=t($theme->name)?></h1>
                <p><?=t('Вы можете выбрать несколько контрактных производителей электроники по параметрам из каталога или выбрав регион на карте. А потом за пару «кликов» отправить запрос одновременно всем выбранным компаниям. Или Вы можете выбрать выгодную акцию или ТОП компанию из данного раздела. Удобно и быстро!')?></p>
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
                    <div class="production-info__value-in">470</div>
                    <div class="production-info__value-back">470</div>
                </div>
                <div class="production-info__name"><?=t('Запросов')?></div>
            </div>
        </div>
        <div class="banner__btn-wrap  row justify-content-center">
            <div class="banner__btn-col  col">
                <a href="<?=\yii\helpers\Url::to('main/company-registration')?>" class="banner__btn  button  button_green  button_wide">
                    <span class="btn__in"><?=t('Зарегистрируйте компанию')?></span>
                </a>
            </div>
            <div class="banner__btn-col  col">
                <a href="<?=\yii\helpers\Url::to('main/company-registration') //TODO РЕГИСТРАТЦИЯ ПРОФИЛЯ ДЛЯ ПОЛЗОВАТЕЛЯ ЛИНК ПОПРАВИТ НАДО?> " class="banner__btn  button  button_blue  button_wide">
                    <span class="btn__in"><?=t('Создайте личный кабинет')?></span>
                </a>
            </div>
        </div>
    </div>
    <a href="#down" class="go_down"></a>
</div>
<section class="branches  branches--section  section-padding in" id="down">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="branch_box wide">
                    <img src="/images/images/publication-img.jpg" alt="">
                    <div class="branch_title flex aic">
                        <span><?=t('Каталог производителей')?></span>
                    </div>
                    <div class="branch_hover hidden">
                        <h2><?=t('Каталог производителей')?></h2>
                        <div class="branch_text"><?=t('Краткое описание этой отрасли. Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить')?> </div>
                        <div class="branch_text_mob flex jcsb hidden">
                            <?=t('Краткое описание этой отрасли. Сайт рыбатекст поможет дизайнеру, верстальщику,')?>
                        </div>
                        <a href="#"><?=t('Ознакомиться с каталогом')?></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="branch_box wide">
                    <img src="/images/images/news-wrap-img2.jpg" alt="">
                    <div class="branch_title flex aic">
                        <span><?=t('Найти партнера по карте')?></span>
                    </div>
                    <div class="branch_hover hidden">
                        <h2><?=t('Найти партнера по карте')?></h2>
                        <div class="branch_text">
                            <?=t('Краткое описание этой отрасли. Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить')?>
                        </div>
                        <div class="branch_text_mob hidden">
                            <?=t('                            Краткое описание этой отрасли. Сайт рыбатекст поможет дизайнеру, верстальщику,
')?>
                        </div>
                        <a href="#">
                            <?=t('Ознакомиться с картой')?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="banner  background" style="background-image: url(/images/banner-empty.jpg);"></div>
<?=\app\widgets\SaleSectionWidget::widget()?>
<?=\app\widgets\MostNewsWidget::widget()?>
<?=\app\widgets\WeareTrustedWidget::widget()?>
<?=\app\widgets\TopCompanyWidget::widget()?>
<div class="banner  banner_small  background" style="background-image: url(/images/banner-empty.jpg);"></div>
<?=\app\widgets\LastViewCompanyWidget::widget()?>
<?=\app\widgets\SubscribeWidget::widget()?>
