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
                        <h1><?=t('Новости и события')?></h1>
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
                        <?php foreach(\app\models\News::TypesEvents() as  $item => $value):?>
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
                                <?php if (!empty($tabs->newsMain)): ?>



                                    <div class="news-wrap-card  news-wrap  news-wrap_main"
                                         id="id_0_<?= $item ?>">
                                        <div class="news-wrap__title-higher  content-text">
                                            <h3 class="title-text"><?= t('Главные новости') ?></h3>
                                        </div>
                                        <div class="news-wrap__in">
                                            <?php foreach ($tabs->newsMain as $key => $value): ?>
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
                                               class="news-wrap__link-more"><?= t('Все Главные новости') ?></a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php $return1 = true;?>

                                <div class="row">

                                    <div class="col-md-6">
                                        <?php if(!empty($tabs->newsCompanyru)):?>
                                            <div class="news-wrap-card  russians-news" id="id_2_<?=$item?>">
                                                <div class="news-wrap">
                                                    <div class="news-wrap__title-higher  content-text">
                                                        <h3 class="title-text"><?=t('Новости Российских Компаний')?></h3>
                                                    </div>

                                                    <div class="news-wrap__link-in news-wrap__company-ru">
                                                        <?php foreach($tabs->newsCompanyru as $key =>$value):?>
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
                                                        <a href="<?=Url::to(['/main/news-company-ru']);?>" class="news-wrap__link-more"><?=t('Все новости российских компаний')?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif;?>

                                        <?php if(!empty($tabs->newsCompanyen)):?>
                                            <?php $return1 = true;?>

                                        <div class="news-wrap-card  russians-news" id="id_3_<?=$item?>">
                                                <div class="news-wrap">
                                                    <div class="news-wrap__title-higher  content-text">
                                                        <h3 class="title-text"><?=t('Новости зарубежных Компаний')?></h3>
                                                    </div>
                                                        <div class="news-wrap__link-in news-wrap__company-ru">
                                                            <?php foreach($tabs->newsCompanyen as $index =>$value):?>
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
                                                        <a href="<?=Url::to(['/main/news-company-en']);?>" class="news-wrap__link-more"><?=t('Все новости зарубежных компаний')?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif;?>

                                    </div>
                                    <?php if (!empty($tabs->newsEvents)): ?>
                                        <?php $return1 = true;?>

                                        <div class="col-md-6">

                                            <div class="news-wrap-card  news-wrap-section__aside" id="id_1_<?= $item ?>">
                                                <div class="news-wrap-section__aside-title content-text">
                                                    <h3 class="title-text"><?= t('События') ?></h3>
                                                </div>
                                                <?php foreach ($tabs->newsEvents as $event => $value): ?>
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
                                                       class="news-wrap-section__aside-link-events"><?= t('Все события') ?></a>
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
                                    <?php if(!empty($tabs->newsReports)):?>
                                        <?php $return2 = 1;?>
                                    <div class="news-wrap-card  col-md-6  col-lg-4  interview-news" id="id_4_<?=$item?>">

                                        <div class="content-text">
                                            <h3 class="title-text"><?=t('Репортажи, интервью')?></h3>
                                        </div>
                                            <div class="news-wrap news-wrap_card">
                                                    <?php foreach($tabs->newsReports as $report =>$value):?>
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
                                                    <a href="<?=Url::to(['/main/news-analytics']);?>" class="news-wrap__link-more"><?=t('Все репортажи, интервью')?></a>
                                                </div>
                                            </div>
                                    </div>
                                    <?php endif;?>
                                    <?=PopularNewsWidget::widget(['item' => $item,'direction' => $tabs->id])?>
                                    <?=\app\widgets\MostDiscussedNewsWidget::widget(['item' => $item,'direction' => $tabs->id])?>
                                </div>

                                <div class="row">
                                    <?php if(!empty($tabs->newsBd)):?>
                                        <?php $return2 = 1;?>

                                    <div class="news-wrap-card  news-wrap  news-wrap_new  col-md-6  col-lg-6  new-base-knowledge-news" id="id_7_<?=$item?>">
                                        <div class="news-wrap__tiitle  content-text">
                                            <h3 class="title-text"><?=t('Новое в базе знаний')?></h3>
                                        </div>
                                            <div class="news-wrap__in">
                                            <?php foreach($tabs->newsBd as $bd_item =>$bd):?>
                                                <?php if($bd_item == 0):?>
                                                    <a href="<?= $bd->singleLink ?>" class="news-wrap__link-in">
                                                            <img src="<?= $bd->getPhotos() ?>" alt="">
                                                    </a>
                                                <?php endif;?>
                                                <div class="news-wrap__content content-text">
                                                    <a href="<?=$bd->singleLink?>" class="hoverlink"><h4><?=$bd->defaultTitle?></h4></a>
                                                </div>
                                            <?php endforeach;?>
                                            </div>
                                        <div class="news-wrap__foot  flex  justify-content-end">
                                                <a href="<?=Url::to(['/main/newests']);?>" class="news-wrap__link-more"><?=t('Все новое')?></a>
                                        </div>
                                    </div>
                                    <?php endif;?>
                                    <?php if(!empty($tabs->newsSale)):?>
                                        <?php $return2 = 1;?>

                                    <div class="news-wrap-card  news-wrap  news-wrap_new  col-md-6  col-lg-6  new-base-knowledge-news" id="id_8_<?=$item?>">
                                            <div class="news-wrap__tiitle  content-text">
                                                <h3 class="title-text"><?=t('Акции')?></h3>
                                            </div>
                                                <div class="news-wrap__in">
                                                    <?php foreach($tabs->newsSale as $sale_item =>$newsSale):?>
                                                        <?php if($sale_item == 0):?>
                                                            <a href="<?= $newsSale->singleLink ?>" class="news-wrap__link-in">
                                                                <img src="<?= $newsSale->getPhotos() ?>" alt="">
                                                            </a>
                                                        <?php endif;?>
                                                        <div class="news-wrap__content content-text">
                                                            <a href="<?=$newsSale->singleLink?>" class="hoverlink"><h4><?=$newsSale->defaultTitle?></h4></a>
                                                        </div>
                                                    <?php endforeach;?>
                                                </div>
                                           <div class="news-wrap__foot  flex  justify-content-end">
                                                <a href="<?=Url::to(['/main/news-sale']);?>" class="news-wrap__link-more"><?=t('Все акции')?></a>
                                           </div>
                                    </div>
                                    <?php endif;?>

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
