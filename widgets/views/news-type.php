
<?php
$component = new \app\components\ToolsComponent();
?>
<div class="news-section  news-section_news_inside  background-color-grey">
    <div class="container">
        <div class="news-section__title-line  news-section__title-line_knowledge  flex  align-items-center  content-text">
            <h2><?=t('Другие')?> <?=$text?></h2>
        </div>
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
                            <a href="<?= $value->user->singleLink ?>"
                               class="author__link  text"><?= $value->user->username; ?></a>
                        </div>
                        <a href="<?= $value->singleLink ?>" class="news-box__btn  button  button_blue">
                            <span class="btn__in"><?= t('Читать') ?></span>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>