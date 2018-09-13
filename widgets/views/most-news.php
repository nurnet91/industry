<?php if ($model): ?>
<?php $component = new \app\components\ToolsComponent();?>
    <section class="news-section  background-color-grey">
        <div class="container">
            <div class="news-section__title  content-text  color-blue">
                <h2><a href="#"><?= t('Самое новое') ?></a></h2>
            </div>
            <div class="row">
                <?php foreach ($model as $mod): ?>
                    <div class="news-section__col  news-box  col-md-6  col-xl-4  flex  flex-sm-column  justify-content-sm-between">
                        <div class="news-box__body">
                            <div class="news-box__img-wrap  img-wrap">
                                <img src="<?=$mod->photos?>" alt="">
                            </div>
                            <div class="news-box__info  flex justify-content-between align-items-center">
                                <div class="news-box__date  text"><?=$mod->date?></div>
                                <div class="news-box__view flex align-items-center">
                                    <i class="news-box__view-fa  fa fa-eye color-light-grey" aria-hidden="true"></i>
                                    <div class="news-box__view-value"><?=$mod->views?></div>
                                </div>
                            </div>
                            <div class="news-box__content  content-text">
                                <h3><?=$mod->title?></h3>
                                <p><?=$component->wordsCut($mod->text)?></p>
                            </div>
                        </div>
                        <div class="news-box__foot  flex  justify-content-sm-between  align-items-center">
                            <div class="author">
                                <i class="author__icon-fa  fa fa-user  color-light-grey" aria-hidden="true"></i>
                                <a href="<?=$mod->user->singleLink?>" class="author__link  text"><?=$mod->user->username?></a>
                            </div>
                            <a href="<?=$mod->singleLink?>" class="news-box__btn  button  button_blue">
                                <span class="btn__in"><?=t('Читать')?></span>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>
<?php endif; ?>