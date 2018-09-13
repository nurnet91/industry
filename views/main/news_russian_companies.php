<?php

use yii\helpers\Url;

$this->params['breadcrumbs'][] = [
    'label' => $direction->getName(),
    'url' => $direction->singleLink,
    'class' => ''
];
$component = new \app\components\ToolsComponent();
$this->params['breadcrumbs'][] = [
    'label' => t('Новости Российских компаний'),
];
$count = 0;


?>
<div class="banner banner_news_events  background" style="background-image: url(/images/data-base-ban-bg.jpg);">
    <div class="container">
        <div class="subscribe  subscribe_news_events">
            <div class="row">
                <div class="col-lg-9  col-xl-8  block-centered">
                    <div class="subscribe__title  content-text">
                        <h1><?= t('Новости российских компаний') ?></h1>
                    </div>
                    <?= \app\widgets\SubscribeWidget::widget(['tpl' => 'subscribe-news']); ?>
                    <div class="subscribe__form_text  form_text"><a href="#">Зарегистрируйте личный кабинет</a> и сами
                        формируйте содержание своей новостной рассылки. Только полезная информация!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= \app\widgets\CBRFWidget::widget() ?>
<div class="knowldge-base-wrap  knowldge-base-wrap_news_russians">

    <?= app\widgets\Breadcrumb::widget() ?>
    <div class="news-wrap-section  news-wrap-section_russians  news-wrap-section_front">
        <div class="container">
            <div class="row">
                <div class="col-md-7  col-lg-8">
                    <div class="news-section  news-section_russians">
                        <div class="row">
                            <?php foreach ($model as $item => $value): ?>
                                <div class="news-section__col  news-box  col-md-12  col-xl-6  flex  flex-sm-column  justify-content-sm-between">
                                    <div class="news-box__body">
                                        <div class="news-box__img-wrap  img-wrap">
                                            <img src="<?= $value->getPhotos() ?>" alt="">
                                        </div>
                                        <div class="news-box__info  flex justify-content-between align-items-center">
                                            <div class="news-box__date  text"><?= Yii::$app->formatter->asDate($value->created_at, 'd.M.Y') ?></div>
                                            <div class="news-box__view flex align-items-center">
                                                <i class="news-box__view-fa  fa fa-eye color-light-grey"
                                                   aria-hidden="true"></i>
                                                <div class="news-box__view-value"><?= $value->getView() ?></div>
                                            </div>
                                        </div>
                                        <div class="news-box__content  content-text">
                                            <h3><?= $value->userTitle ?></h3>
                                            <p><?= $component->wordsCut($value->userText); ?></p>
                                        </div>
                                    </div>
                                    <div class="news-box__foot  flex  justify-content-between  align-items-center">
                                        <div class="author">
                                            <i class="author__icon-fa  fa fa-user  color-light-grey"
                                               aria-hidden="true"></i>
                                            <a href="<?= $value->company->companyLink ?>"
                                               class="author__link  text"><?= $value->company; ?></a>
                                        </div>
                                        <a href="<?= $value->singleLink ?>" class="news-box__btn  button  button_blue">
                                            <span class="btn__in"><?= t('Читать') ?></span>
                                        </a>
                                    </div>
                                </div>
                                <?php if ($item == 3) {
                                    break;
                                    $count = $item;
                                } ?>
                            <?php endforeach; ?>
                            <?php for ($i = 0; $i <= 3; $i++) {
                                unset($model[$i]);
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-5  col-lg-4">
                    <div class="news-wrap-section__aside  news-wrap-section__aside_paddings">
                        <?= \app\widgets\NewsEvents::widget(['direction' => $direction->id]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="banner  banner_small  background" style="background-image: url(/images/temp/banner_img.jpg);">
    <div class="container">
        <div class="banner__title">Пробный Баннер</div>
    </div>
</div>
<div class="news-section">
    <div class="container">
        <div class="row">
            <?php foreach ($model as $item => $value): ?>
                <div class="news-section__col  news-box  col-md-6  col-xl-4  flex  flex-sm-column  justify-content-sm-between">
                    <div class="news-box__body">
                        <div class="news-box__img-wrap  img-wrap">
                            <img src="<?= $value->getPhotos() ?>" alt="">
                        </div>
                        <div class="news-box__info  flex justify-content-between align-items-center">
                            <div class="news-box__date  text"><?= Yii::$app->formatter->asDate($value->created_at, 'd.M.Y') ?></div>
                            <div class="news-box__view flex align-items-center">
                                <i class="news-box__view-fa  fa fa-eye color-light-grey" aria-hidden="true"></i>
                                <div class="news-box__view-value"><?= $value->getView() ?></div>
                            </div>
                        </div>
                        <div class="news-box__content  content-text">
                            <h3><?= $value->userTitle ?></h3>
                            <p><?= $component->wordsCut($value->userText); ?></p>
                        </div>
                    </div>
                    <div class="news-box__foot  flex  justify-content-between  align-items-center">
                        <div class="author">
                            <i class="author__icon-fa  fa fa-user  color-light-grey" aria-hidden="true"></i>
                            <a href="<?= $value->company->companyLink ?>"
                               class="author__link  text"><?= $value->company; ?></a>
                        </div>
                        <a href="<?= $value->singleLink ?>" class="news-box__btn  button  button_blue">
                            <span class="btn__in"><?= t('Читать') ?></span>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="news-section__pagination  pagination  flex  justify-content-center">
            <?=
            \yii\widgets\LinkPager::widget([
                'pagination' => $pagination,
                'options' => [
                    'class' => 'row  justify-content-center  align-items-end',
                    'prevPageLabel' => 'previous',
                    'nextPageLabel' => 'next',
                    'maxButtonCount' => 6,
                ]
            ]);
            ?>
        </div>
    </div>
</div>
</div>

	