<?php if(!empty($model)):?>
<section class="stock-section  stock-section_not_slider  background-color-white">
    <div class="container">
        <div class="row  justify-content-md-between">
            <?php foreach($model as $mod):?>
                <a href="<?=$mod->singleLink?>" class="stock-box  stock-box_not_slider  col-md-6  col-lg-4  col-xl-3">
                    <div class="stock-box__img">
                        <div class="stock-box__stock  stock-box__stock_left_top  text  color-white"><?=t('Акция')?></div>
                        <img src="<?=$mod->photos?>" alt="">
                    </div>
                    <div class="stock-box__content  content-text  content-text--title-color--blue">
                        <h2><?=$mod->title?></h2>
                        <p><?=$mod->text?></p>
                    </div>
                </a>
            <?php endforeach;?>
        </div>
        <a href="<?=\yii\helpers\Url::to('/main/news-sale')//TODO ЛИНК ПОПРАВИТ НАДО НОВОСТИ АКЦИИ?>" class="banner__btn  block-centered  button  button_green">
            <span><?=t('Посмотреть все акции')?></span>
        </a>
    </div>
</section>
<?php endif;?>