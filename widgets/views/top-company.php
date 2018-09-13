<?php if(!empty($model)):?>
<section class="best-company-section  background" style="background-image: url(/images/best-company-section-bg.jpg);">
    <div class="container">
        <div class="best-company-section__title  content-text  content-text--text--center">
            <h2><?=t('ТОП Компании')?></h2>
        </div>
        <div class="best-company-slider  owl-carousel  owl-carousel_dots_blue  owl-theme">
            <?php foreach($model as $mod):?>


                <a href="<?=$mod->singleLink?>" class="company-box">
                    <div class="company-box__img-wrap  img-wrap">
                        <img src="<?=$mod->photos?>" alt="">
                    </div>
                    <div class="company-box__foot  background-color-blue  flex  justify-content-between  align-items-center">
                        <div class="company-box__content  content-text  color-white">
                            <h5><?=$mod->name?></h5>
                        </div>
                        <div class="rate"><img src="/images/stars.png" alt=""></div>
                    </div>
                </a>
            <?php endforeach;?>
        </div>
    </div>
</section>
<?php endif; ?>
