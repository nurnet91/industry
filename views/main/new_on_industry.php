<!--<pre>-->
<?php $c = 0 ;

use yii\helpers\Html;
use yii\helpers\Url;
?>
<?php //print_r(\app\models\News::industryTypes());die();?>
    <div class="content">
        <div class="banner  banner_new-on-ih  background" style="background-image: url(/images/data-base-ban-bg.jpg);">
            <div class="container">
                <div class="banner__content  content-text">
                    <h1><?=t('Новое на Industry Hunter')?></h1>
                    <h3><?=t('Мы сохраняем для Вас все новые поступления в Базу Знаний за период с последнего посещения сайта по сегодняшний день (до 1 месяца), чтобы Вы ничего не пропустили и не тратили время на поиск')?></h3>
                </div>
            </div>
        </div>
        <div class="last-visit  last-visit_new-on-ih">
            <div class="container">
                <div class="last-visit__content  content-text  gutters  title-with-line">
                    <h3><?=t('Дата последнего посещения')?>: <span><?=Yii::$app->formatter->asDate($dataProvider->analytics->last_visit,'d/M/Y')?></span></h3>
                </div>
            </div>
        </div>
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
                                <?php foreach(\app\models\News::industryTypes() as $item => $value):?>
                                    <li class="nav-item  anchor-menu--js"><a href="#id_<?=$item?>_0" class="nav-link"><span><?=$value->name?></span></a></li>
                                <?php endforeach;?>
                            </ul>
                        </nav>
                    </div>
                    <?php $c = 0;?>
                    <div class="tabs-section__panel tab-content">
                        <?php foreach ($dataProvider as $item => $tabs):?>
                            <?php if($c == 0){
                                $class = 'active show';
                            }else $class = '';
                            $c++;
                            ?>
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
                                    </div>
                                </div>
                                <?php if(!empty($tabs->newsMain)):?>
                                    <div class="banner  banner_small  background" style="background-image: url(/images/temp/banner_img.jpg);">
                                        <div class="container">
                                            <div class="banner__title">Пробный Баннер</div>
                                        </div>
                                    </div>
                                <?php endif;?>
                                <?php $return = false;?>
                                <div class="news-wrap-section  news-wrap-section_cards">
                                    <div class="container">
                                        <div class="row">
                                            <?php if(!empty($tabs->newsArticle)):?>
                                                <div class="news-wrap-card  col-md-6   col-lg-6   articles-news" id="id_1_<?=$item?>">
                                                    <div class="content-text">
                                                        <h3 class="title-text"><?=t('Cтатьи')?></h3>
                                                    </div>
                                                    <?php $return = true;?>
                                                    <div class="news-wrap news-wrap_card">
                                                        <?php foreach($tabs->newsArticle as $report =>$value):?>
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
                                                            <a href="<?=Url::to(['/main/news-articles']);?>" class="news-wrap__link-more"><?=t('Все статьи')?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif;?>
                                            <?php if(!empty($tabs->newsAnalytic)):?>
                                                <div class="news-wrap-card  col-md-6   col-lg-6   articles-news" id="id_2_<?=$item?>">
                                                    <div class="content-text">
                                                        <h3 class="title-text"><?=t('Аналитика')?></h3>
                                                    </div>
                                                    <?php $return = true;?>
                                                    <div class="news-wrap news-wrap_card">
                                                        <?php foreach($tabs->newsAnalytic as $report =>$value):?>
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
                                                            <a href="<?=Url::to(['/main/news-analytics']);?>" class="news-wrap__link-more"><?=t('Вся аналитика')?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif;?>
                                            <?php if(!empty($tabs->newsSale)):?>
                                                <div class="news-wrap-card  col-md-6   col-lg-6   articles-news" id="id_3_<?=$item?>">
                                                    <div class="content-text">
                                                        <h3 class="title-text"><?=t('Аналитика')?></h3>
                                                    </div>
                                                    <?php $return = true;?>
                                                    <div class="news-wrap news-wrap_card">
                                                        <?php foreach($tabs->newsSale as $report =>$value):?>
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
                                                            <a href="<?=Url::to(['/main/news-analytics']);?>" class="news-wrap__link-more"><?=t('Вся аналитика')?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif;?>
                                            <?php if(!empty($tabs->newsReports)):?>
                                                <div class="news-wrap-card  col-md-6   col-lg-6   articles-news" id="id_4_<?=$item?>">
                                                    <div class="content-text">
                                                        <h3 class="title-text"><?=t('Репортажи, интервью')?></h3>
                                                    </div>
                                                    <?php $return = true;?>
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
                                                            <a href="<?=Url::to(['/main/news-reports']);?>" class="news-wrap__link-more"><?=t('Все репортажи и интервью')?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                                <?php if($return):?>
                                    <div class="banner  banner_small  background" style="background-image: url(/images/temp/banner_img.jpg);">
                                        <div class="container">
                                            <div class="banner__title">Пробный Баннер</div>
                                        </div>
                                    </div>
                                <?php endif;?>
                                <div class="news-wrap-section  news-wrap-section_cards">
                                    <div class="container">
                                        <div class="row">
                                            <?php if(!empty($tabs->newsVideos)):?>
                                                <div class="news-wrap-card  col-md-6  col-lg-4  video-news" id="id_5_<?=$item?>">
                                                    <div class="content-text">
                                                        <h3 class="title-text" ><?=t('Видео')?></h3>
                                                    </div>
                                                    <div class="news-wrap news-wrap_card">
                                                        <?php foreach($tabs->newsVideos as $popular =>$value):?>
                                                            <?php if($popular == 0):?>
                                                                <a href="<?=$value->singleLink?>" class="news-wrap__link-in">
                                                                    <img src="<?=$value->getPhotos()?>" alt="">
                                                                </a>
                                                            <?php endif;?>
                                                            <div class="news-wrap__content content-text">
                                                                <a href="<?=$value->singleLink?>" class="hoverlink"><h4><?=$value->defaultTitle?></h4></a>
                                                            </div>
                                                        <?php endforeach;?>
                                                        <div class="news-wrap__foot  flex  justify-content-end">
                                                            <a href="<?=Url::to(['/main/news-videos']);?>" class="news-wrap__link-more"><?=t('Все видео')?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif;?>
                                            <?php if(!empty($tabs->newsPresentations)):?>
                                                <div class="news-wrap-card  col-md-6  col-lg-4  presentation-news" id="id_6_<?=$item?>">
                                                    <div class="content-text">
                                                        <h3 class="title-text" ><?=t('Презентации')?></h3>
                                                    </div>
                                                    <div class="news-wrap news-wrap_card">
                                                        <?php foreach($tabs->newsPresentations as $popular =>$value):?>
                                                            <?php if($popular == 0):?>
                                                                <a href="<?=$value->singleLink?>" class="news-wrap__link-in">
                                                                    <img src="<?=$value->getPhotos()?>" alt="">
                                                                </a>
                                                            <?php endif;?>
                                                            <div class="news-wrap__content content-text">
                                                                <a href="<?=$value->singleLink?>" class="hoverlink"><h4><?=$value->defaultTitle?></h4></a>
                                                            </div>
                                                        <?php endforeach;?>
                                                        <div class="news-wrap__foot  flex  justify-content-end">
                                                            <a href="<?=Url::to(['/main/news-presentations']);?>" class="news-wrap__link-more"><?=t('Все самые популярные')?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif;?>
                                            <?php if(!empty($tabs->newsPhoto)):?>
                                                <div class="news-wrap-card  col-md-6  col-lg-4  presentation-news" id="id_7_<?=$item?>">
                                                    <div class="content-text">
                                                        <h3 class="title-text" ><?=t('Фото')?></h3>
                                                    </div>
                                                    <div class="news-wrap news-wrap_card">
                                                        <?php foreach($tabs->newsPhoto as $popular =>$value):?>
                                                            <?php if($popular == 0):?>
                                                                <a href="<?=$value->singleLink?>" class="news-wrap__link-in">
                                                                    <img src="<?=$value->getPhotos()?>" alt="">
                                                                </a>
                                                            <?php endif;?>
                                                            <div class="news-wrap__content content-text">
                                                                <a href="<?=$value->singleLink?>" class="hoverlink"><h4><?=$value->defaultTitle?></h4></a>
                                                            </div>
                                                        <?php endforeach;?>
                                                        <div class="news-wrap__foot  flex  justify-content-end">
                                                            <a href="<?=Url::to(['/main/news-photos']);?>" class="news-wrap__link-more"><?=t('Все самые обсуждаемые')?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    <?=\app\widgets\LastCompanyWidget::widget()?>


    </div><!-- content -->
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
