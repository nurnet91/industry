<?php if(!empty($model->seen)):?>
<section class="recently-viewed-section  background-repeat" style="background-image: url(/images/recently-viewed-bg.jpg);">
    <div class="container">
        <div class="row  align-items-center">
            <div class="recently-viewed-section__col  recently-viewed-section__col--title  content-text  text-center  col-12  col-xl-3">
                <h3><?=t('Вы недавно смотрели')?></h3>
            </div>
            <div class="recently-viewed-section__col  col-12  col-xl-9">
                <div class="row  justify-content-center  justify-content-xl-start">
                    <?php foreach($model->seen as $mod): ?>
                        <div class="recently-viewed-section__col-in  col-sm-6  col-md-4  col-lg-3">
                        <a href="<?=$mod->singleLink?>" class="company-box">
                            <div class="company-box__img-wrap  company-box__img-wrap--height--s  img-wrap">
                                <img src="<?=$mod->photos?>" alt="">
                            </div>
                            <div class="company-box__foot  background-color-green  flex  justify-content-center  align-items-center">
                                <div class="company-box__content  text-center  content-text  color-white">
                                    <h5><?=$mod->name?></h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif;?>
