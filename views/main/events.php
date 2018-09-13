<?php use app\widgets\PopularNewsWidget;
use yii\helpers\Url;

?>
<?php //echo '<pre>'?>
<?php //print_r($dataProvider);die()?>
<div class="banner banner_news_events  background" style="background-image: url(/images/data-base-ban-bg.jpg);">
    <div class="container">
        <div class="subscribe  subscribe_news_events">
            <div class="row">
                <div class="col-lg-9  col-xl-8  block-centered">
                    <div class="subscribe__title  content-text">
                        <h1><?=t('События')?></h1>
                    </div>

                    <?= \app\widgets\SubscribeWidget::widget(['tpl' => 'subscribe-news','interests'=>$dataProvider]); ?>
                    <div class="subscribe__form_text  form_text"><a href="#">Зарегистрируйте личный кабинет</a> и сами формируйте содержание своей новостной рассылки.  Только полезная информация!</div>
                </div>
            </div>
        </div>
    </div>
</div>
<?=\app\widgets\CBRFWidget::widget()?>
<div class="company-office company-office_news_events">
    <div class="company-office__main-tab  company-office__main-tab_news_events  tabs-section  tabs">
        <nav class="tabs-section__tabs-nav  tabs-nav">
            <ul class="tabs-nav__list  list  nav nav-tabs  nav-tabs_parent">
                <?php
                foreach($dataProvider as $item => $category):?>
                    <?php if($item == 0){
                        $class = 'active show';
                    }else $class = '';
                    ?>
                    <li class="nav-item"><a href="#tab-pane<?=$category->id?>" class="nav-link <?=$class?>" data-toggle="tab"><span><?=$category->getName()?></span></a></li>
                <?php endforeach;?>
            </ul>
        </nav>
        <div class="knowldge-base-wrap">
            <div class="container">
                <nav class="company-filter-tab  company-filter-tab_in  flex  justify-content-center">
                    <ul class="list  nav nav-tabs  flex  justify-content-center">
                        <?php foreach(\app\models\News::TypeEventPage() as  $item => $value):?>
                            <li class="nav-item  anchor-menu--js"><a href="#id_<?=$item?>_0" class="nav-link"><span class="span-title"><?=$value?></span></a></li>
                        <?php endforeach;?>
                    </ul>
                </nav>
            </div>

            <div class="tabs-section__panel tab-content">
                <?php foreach ($dataProvider as $item => $tabs):?>
                    <?php $count = 0;?>
                    <?php if($item == 0){
                        $class ='show active';
                    }else $class = '';
                    ?>
                    <?php $return1 = false;?>
                    <div class="tabs-section__pane  tab-pane fade <?=$class?>" id="tab-pane<?=$tabs->id?>">
                        <div class="news-wrap-section  news-wrap-section_front">
                            <div class="container">
                                <?php if (!empty($tabs->newsEvents)): ?>



                                    <div class="news-wrap-card  news-wrap  news-wrap_main"
                                         id="id_0_<?= $item ?>">
                                        <div class="news-wrap__title-higher  content-text">
                                            <h3 class="title-text"><?= t('Главные события') ?></h3>
                                        </div>
                                        <div class="news-wrap__in">
                                            <?php foreach ($tabs->newsEvents as $key => $value): ?>
                                                <?php
                                                if ($key == 0) {
                                                    ?>
                                                    <a href="<?= $value->singleLink ?>" class="news-wrap__in-image">
                                                        <img src="<?= $value->getPhotos() ?>"
                                                             class="image-event-main" alt="">
                                                    </a>

                                                    <?php
                                                }
                                                ?>
                                                <div class="news-wrap__contents">
                                                    <div class="news-wrap__content  content-text ">
                                                        <a href="<?= $value->singleLink ?>" class="hoverlink"
                                                           data-link="<?= $value->singleLink ?>"
                                                           data-img="<?= $value->getPhotos() ?>">
                                                            <h3><?= $value->defaultTitle ?></h3></a>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <div class="news-wrap__foot  flex  justify-content-end">
                                            <a href="<?= Url::to(['/main/news-main']); ?>"
                                               class="news-wrap__link-more"><?= t('Все Главные события') ?></a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php $return1 = true;?>

                                <div class="row">

                                    <div class="col-md-6">
                                        <?php if(!empty($tabs->newsRF)):?>
                                            <div class="news-wrap-card  russians-news" id="id_1_<?=$item?>">
                                                <div class="news-wrap">
                                                    <div class="news-wrap__title-higher  content-text">
                                                        <h3 class="title-text"><?=t('Выставки в РФ')?></h3>
                                                    </div>

                                                    <div class="news-wrap__link-in news-wrap__company-ru">
                                                        <?php foreach($tabs->newsRF as $key =>$value):?>
                                                            <?php if($key ==0):?>
                                                                <a class="news-wrap__in" href="<?=$value->singleLink;?>">
                                                                    <img src="<?=$value->getPhotos()?>" alt="" class="news-wrap__company-img">
                                                                    <div class="news-wrap__content  content-text">
                                                                        <h4 class="news-wrap__title"><?=$value->userTitle;?></h4>
                                                                        <div class="news-wrap__content-text"><?=$value->userText;?></div>
                                                                    </div>
                                                                </a>
                                                            <?php else:?>
                                                                <div class="news-wrap__content  content-text">
                                                                    <a  href="<?=$value->singleLink;?>" class="hoverlink" data-img="<?=$value->getPhotos()?>"  data-title="Сайт рыбатекст поможет дизайнеру, верстальщику 1" data-description="Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее 1"><h4><?=$value->title;?> </h4></a>
                                                                </div>
                                                            <?php endif;?>
                                                        <?php endforeach;?>
                                                    </div>
                                                    <div class="news-wrap__foot  flex  justify-content-end">
                                                        <a href="<?=Url::to(['/main/news-company-ru']);?>" class="news-wrap__link-more"><?=t('Все Выставки в РФ')?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif;?>

                                        <?php if(!empty($tabs->newsEnRF)):?>
                                            <?php $return1 = true;?>
                                            <div class="news-wrap-card  russians-news" id="id_2_<?=$item?>">
                                                <div class="news-wrap">
                                                    <div class="news-wrap__title-higher  content-text">
                                                        <h3 class="title-text"><?=t('Зарубежные выставки')?></h3>
                                                    </div>
                                                    <div class="news-wrap__link-in news-wrap__company-ru">
                                                        <?php foreach($tabs->newsEnRF as $index =>$value):?>
                                                            <?php if($index ==0):?>
                                                                <a class="news-wrap__in" href="<?=$value->singleLink;?>">
                                                                    <img src="<?=$value->getPhotos()?>" alt="" class="news-wrap__company-img">
                                                                    <div class="news-wrap__content  content-text">
                                                                        <h4 class="news-wrap__title"><?=$value->userTitle;?></h4>
                                                                        <div class="news-wrap__content-text"><?=$value->userText;?></div>
                                                                    </div>
                                                                </a>
                                                            <?php else:?>
                                                                <div class="news-wrap__content  content-text">
                                                                    <a  href="<?=$value->singleLink;?>" class="hoverlink" data-img="<?=$value->getPhotos()?>"  data-title="Сайт рыбатекст поможет дизайнеру, верстальщику 1" data-description="Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее 1"><h4><?=$value->title;?> </h4></a>
                                                                </div>
                                                            <?php endif;?>
                                                        <?php endforeach;?>
                                                    </div>
                                                    <div class="news-wrap__foot  flex  justify-content-end">
                                                        <a href="<?=Url::to(['/main/news-company-en']);?>" class="news-wrap__link-more"><?=t('Все зарубежные выставки')?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif;?>

                                    </div>
                                    <?php if (!empty($tabs->newsСonference)): ?>
                                        <?php $return1 = true;?>

                                        <div class="col-md-6">

                                            <div class="news-wrap-card  news-wrap-section__aside" id="id_3_<?= $item ?>">
                                                <div class="news-wrap-section__aside-title content-text">
                                                    <h3 class="title-text"><?= t('Семинары и конференции') ?></h3>
                                                </div>
                                                <?php foreach ($tabs->newsСonference as $event => $value): ?>
                                                    <?php if ($event < 2): ?>
                                                        <a href="<?= $value->singleLink ?>"
                                                           class="news-wrap  news-wrap_event">
                                                            <div class="news-wrap__in">
                                                                <img src="<?= $value->getPhotos() ?>" alt="">
                                                                <div class="news-wrap__content  news-wrap__content_event  content-text">
                                                                    <h4><?= $value->title ?></h4>
                                                                    <div class="news-wrap__info">
                                                                        <span><?= t('Место') ?>:</span>
                                                                        <div><?= $value->eventsMap ?></div>
                                                                    </div>
                                                                    <div class="news-wrap__info">
                                                                        <span><?= t('Дата') ?>:</span>
                                                                        <div><?= $value->eventsDate ?></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>

                                                    <?php else: ?>
                                                        <div class="news-wrap__content  content-text">
                                                            <a href="<?= $value->singleLink ?>" class="hoverlink">
                                                                <h4><?= $value->title ?></h4></a>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                                <div class="news-wrap-section__aside-foot  flex  justify-content-end">
                                                    <a href="<?= Url::to('/main/news-events') ?>"
                                                       class="news-wrap-section__aside-link-events"><?= t('Все Семинары и конференции') ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php if($return1):?>
                            <div class="banner  banner_small  background" style="background-image: url(/images/temp/banner_img.jpg);">
                                <div class="container">
                                    <div class="banner__title">Пробный Баннер</div>
                                </div>
                            </div>
                        <?php endif;?>
                        <?php $return2=0;?>
                        <div class="news-wrap-section  news-wrap-section_cards">
                            <div class="container">
                                <div class="row">
                                    <?php if(!empty($tabs->newsWebinars)):?>
                                        <?php $return2 = 1;?>
                                        <div class="news-wrap-card  col-md-6  col-lg-4  interview-news" id="id_4_<?=$item?>">

                                            <div class="content-text">
                                                <h3 class="title-text"><?=t('Вебинары')?></h3>
                                            </div>
                                            <div class="news-wrap news-wrap_card">
                                                <?php foreach($tabs->newsWebinars as $report =>$value):?>
                                                    <?php if($report == 0):?>
                                                        <a href="<?=$value->singleLink?>" class="news-wrap__link-in">
                                                            <img src="<?=$value->getPhotos()?>" alt="">
                                                        </a>
                                                    <?php endif;?>
                                                    <div class="news-wrap__content content-text">
                                                        <a href="<?=$value->singleLink?>" class="hoverlink"><h4><?=$value->defaultTitle?></h4></a>
                                                    </div>
                                                <?php endforeach;?>
                                                <div class="news-wrap__foot  flex  justify-content-end">
                                                    <a href="<?=Url::to(['/main/news-analytics']);?>" class="news-wrap__link-more"><?=t('Вебинары')?></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif;?>
                                    <?=PopularNewsWidget::widget(['item' => $item,'direction' => $tabs->id])?>
                                    <?=\app\widgets\MostDiscussedNewsWidget::widget(['item' => $item,'direction' => $tabs->id])?>
                                </div>
                            </div>
                        </div>
                        <?php if($return2 != 0):?>
                            <div class="banner  banner_small  background" style="background-image: url(/images/temp/banner_img.jpg);">
                                <div class="container">
                                    <div class="banner__title">Пробный Баннер</div>
                                </div>
                            </div>
                        <?php endif;?>
                    </div>
                <?php endforeach;?>

            </div>
        </div>
    </div>
</div>
<?php
$js =<<<JS
$('.hoverlink').hover(function(i) {
    var _this = $(this);
    var img = _this.data('img');
    var link = _this.data('link');
    var _parent = _this.parents('.news-wrap__in');
    _parent.find('.image-event-main').attr('src',img);
    _parent.find('.news-wrap__in-image').attr('href',link);
});
$('.nav-tabs_parent>li>a.active.show').trigger('shown.bs.tab');
JS;
$this->registerJs($js);


?>
