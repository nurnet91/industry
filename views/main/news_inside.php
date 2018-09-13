<?php

use yii\helpers\Url;

$this->params['breadcrumbs'][] = [
    'label' => $model->direction->name,
    'url'   => $model->direction->singleLink,
    'class' => ''
];
$component = new \app\components\ToolsComponent();
$this->params['breadcrumbs'][] = [
    'label' => \app\models\News::Type($model->type_id),
    'url'=>Url::to(['/main/types','id'=>$model->type_id])
];

$text = $model->userText;
$title = $model->userTitle;
$date = $model->date;
$view =  $model->view;
$photo = $model->getPhotos();
$user_singlelink = $model->company->singleLink;
$user_fullname = $model->company;

$this->params['breadcrumbs'][] = [
    'label' => $title,
    'class' => ''
];
$count = 0;
$type = \app\models\News::Type($model->type_id)

?>
<div class="banner banner_news_events  background" style="background-image: url(/images/data-base-ban-bg.jpg);">
    <div class="container">
        <div class="subscribe  subscribe_news_events">
            <div class="row">
                <div class="col-lg-9  col-xl-8  block-centered">
                    <div class="subscribe__title  content-text">
                        <h1><?=$type?></h1>
                    </div>
                    <?=\app\widgets\SubscribeWidget::widget(['tpl' => 'subscribe-news']);?>
                    <div class="subscribe__form_text  form_text"><a href="#">Зарегистрируйте личный кабинет</a> и сами формируйте содержание своей новостной рассылки.  Только полезная информация!</div>
                </div>
            </div>
        </div>
    </div>
</div>
<?=\app\widgets\CBRFWidget::widget()?>
<div class="knowldge-base-wrap knowldge-base-wrap_news_russians">
    <div class="publication">
        <div class="container">
            <div class="publication-content">
                <div class="publication-content__in  row">
                    <div class="publication-content__left  col-lg-8">
                      <?=\app\widgets\Breadcrumb::widget()?>
                        <div class="publication__head">
                            <div class="publication__head-in">
                                <div class="publication__head-left">
                                    <div class="publication__head-title content-text">
                                        <h2><?=$title?></h2>
                                    </div>
                                    <div class="publication__head-foot  row  align-items-center">
                                        <div class="publication__head-foot-item  publication__head-date  gutters  color-light-grey"><?=$date?></div>
                                        <div class="publication__head-foot-item  gutters"><i class="fa fa-eye" aria-hidden="true"></i><?=' '.$view?></div>
                                        <div class="gutters">
                                            <div class="row">
                                                <div class="publication__head-foot-item  gutters">
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                    <a href="<?=$user_singlelink?>"><?=$user_fullname?></a>
                                                    <span>менеджер в Лукойл (Россия)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,twitter,evernote,linkedin,whatsapp,telegram"></div>
                                </div>
                            </div>
                        </div>
                        <div class="publication__body">
                            <img src="<?=$photo?>" alt="">
                            <div class="publication-content__content   content-text">
                               <?=$text?>
                            </div>
                            <img src="<?=$photo?>" alt="">
                            <div class="publication-content__content   content-text">
                                <h3><?=$title?></h3>
                                <?=$text?>
                            </div>
                        </div>
                        <div class="publication-content__actions">
                            <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,twitter,evernote,linkedin,whatsapp,telegram"></div>
                        </div>
                    </div>
                    <div class="publication-content__right  col-lg-4">
                        <div class="publication__aside  news-wrap-section__aside_paddings">
                            <?=\app\widgets\NewsEvents::widget(['direction' => $model->direction->id])?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="publication__foot">
                <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,twitter,evernote,linkedin,whatsapp,telegram"></div>
            </div> -->
        </div>
    </div>
    <div class="banner  banner_small  background" style="background-image: url(/images/temp/banner_img.jpg);">
        <div class="container">
            <div class="banner__title">Пробный Баннер</div>
        </div>
    </div>
<?=\app\widgets\CommentsWidget::widget(['model'=>$model,'PostAction' => 'comment-news-add']);?>
<?=\app\widgets\NewsTypeWidget::widget(['type' => $model->type_id,'text' => $type,'id'=>$model->id])?>
</div>
		