<?php use yii\helpers\Url;

if(!empty($model)):?>
    <?php $return2 = 1;?>

    <div class="news-wrap-card  col-md-6  col-lg-4  interview-news" id="id_6_<?=$item?>">
        <div class="content-text">
            <h3 class="title-text"><?=t('Самые обсуждаемые')?></h3>
        </div>
        <div class="news-wrap news-wrap_card">
            <?php foreach($model as $discussed =>$value):?>
                <?php if($discussed == 0):?>
                    <a href="<?=$value->singleLink?>" class="news-wrap__link-in">
                        <img src="<?=$value->getPhotos()?>" alt="">
                    </a>
                <?php endif;?>
                <div class="news-wrap__content content-text">
                    <a href="<?=$value->singleLink?>" class="hoverlink"><h4><?=$value->defaultTitle?></h4></a>
                </div>
            <?php endforeach;?>
            <div class="news-wrap__foot  flex  justify-content-end">
                <a href="<?=Url::to(['/main/news-discussed']);?>" class="news-wrap__link-more"><?=t('Все самые обсуждаемые')?></a>
            </div>
        </div>
    </div>
<?php endif;?>