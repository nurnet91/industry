
<div class="instruction">
    <div class="container">
        <a href="#" class="instruction__link">Краткая инструкция по работе с кабинетом компании</a>
    </div>
</div>
<div class="company-office">
    <div class="company-office__container  container">
        <div class="company-office__row  row">
            <button class="company-office__btn-menu  company-office__btn-menu_call  animated  pulse_bigger  infinite"><i class="fa fa-bars" aria-hidden="true"></i></button>
            <?=
            $this->render('_sidebar',['active'=>'activity']);
            ?>
            <div class="company-office-content  col-md-8  col-lg-9">
                <div class="company-office__title_tenders  content-text">
                    <h2><?=t('Activity')?></h2>
                </div>
<!--                рекламные акции-->
                <?= $this->render('_sale_advertisement',['model'=>$news_sale,'mainCats'=>$mainCats, 'mainTypes'=>$mainTypes,'request'=>$request]) ?>
<!--                Новости компании-->
                <?= $this->render('_company_news',['model'=>$news_company,'mainCats'=>$mainCats, 'mainTypes'=>$mainTypes,'request'=>$request]) ?>
<!--                Публикации-->
                <?php \yii\widgets\Pjax::begin()?>
                <?= $this->render('_publications',['model'=>$dataProvider->getModels()]) ?>
<!--               обявление-->
<!--                --><?//= $this->render('_ads',['model'=>$dataProvider->getModels()[0]->ads])?>
                <?php \yii\widgets\Pjax::end()?>
            </div>
        </div>
    </div>
</div>
		