<?php

use yii\helpers\Url;

$company = $model;

?>
    <div class="company_card background-color-grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-4  col-xl-3 col-sm-6 col-l">
                    <div class="company_logo">
                        <img src="/<?= $company->photo ?>" alt="">
                    </div>
                    <div class="company_description">
                        <h3 class="centered_text"><?= $company->name ?></h3>
<!--                        <div class="rating">-->
<!--                            <ul>-->
<!--                                <li>-->
<!--                                    <a href="#" class="color-light-grey">Рейтинг</a>-->
<!--                                    <span><img src="/images/temp/stars_yellow.png" alt="">(9/10)</span>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <span class="color-light-grey">Просмотров</span>-->
<!--                                    <span class="viewed"><img src="/images/viewed.png"-->
<!--                                                              alt=""> --><?//= $company->views ?><!--</span>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                            <a href="#" class="button  button_green">Сделать запрос</a>-->
<!--                        </div>-->
                    </div>
                </div>
                <div class="col-lg-4  col-xl-5 col-sm-6 col">
                    <div class="text_box">
                        <p>
                            <?= $company->annotation  ?>
                        </p>
                    </div>
                    <div class="company_card__company-checked  company-checked  block-centered">
                        <div class="company-checked__icon  company-checked__icon_true  icon">icon</div>
                        Компания проверена сотрудниками Industry Hunter
                    </div>
                    <div class="company_card__box  box  flex  justify-content-center">
                        <a href="#" class="company_card__button  button button_blue button_with_bg">В сравнении</a>
                        <?php if (Yii::$app->user->isGuest): ?>
                            <button class="company_card__button  button button_red button_with_bg" data-fancybox=""
                                    id="GuestModalId" data-src="#isGuest" data-modal="true" data-toggle="tooltip"
                                    data-placement="top">В избранное
                            </button>
                            <div class="header-popup  header-popup_pay_form" id="isGuest">
                                <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i
                                            class="fa fa-times"
                                            aria-hidden="true">
                                    </i></button>
                                Пожалуйство зарегиструйтес для добавленые компанию в избранное <a style="color:#2f6aa6"
                                                                                                  href="<?= Url::to('/site/registeruser') //TODO НАДО ПОПРАВИТ ЛИНК ?>">вход
                                    / регистрации</a>

                            </div>
                        <?php else: ?>
                            <?php if ($company->hasFavorite): ?>
                                <button class="company_card__button  button button_green button_with_bg button_favorite"
                                        data-id="<?= $company->id ?>">Убрать из избранных
                                </button>
                            <?php else: ?>
                                <button class="company_card__button  button button_red button_with_bg button_favorite"
                                        data-id="<?= $company->id ?>">В избранное
                                </button>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-lg-4  col-xl-4 col-md-12 col-r main_list">
                    <div class="box_company_contacts background person_link_box">
                        <div class="inner">
                            <div class="box_company_contacts__title">Ваш персональный специалист по направлению:
                                <select class="box_company_contacts__select  select  select--front-text  select--branch_selector">
                                <?php foreach ($direction as $item): ?>
                                    <option><?= $item->name ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <ul class="special_list">
                                <?php foreach ($company->employees as $employee): ?>

                                        <li>
                                            <span class="left">
                                            <?php $theme_ids = explode(',', $employee->theme_ids); ?>
                                            <?php foreach ($theme_ids as $key => $theme_id): ?>
                                                <?= \app\models\FilterThemes::findOne($theme_id)->name; ?><?= ($key + 1 < count($theme_ids)) ? ', ' : '' ?>
                                            <?php endforeach; ?>
                                            </span>
                                            <span class="right">
                                                <a href="#pers_<?= $employee->id ?>" target="pers_1"><?= $employee->fio ?></a>
                                            </span>
                                        </li>

                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <a href="#" class="button button_green button_wide accordeon hide_person_link_box">
                            <span>Общие контакты компании</span>
                        </a>
                    </div> <!-- END .box_company_contacts -->

                    <?php foreach ($company->employees as $employee): ?>
                        <div class="box_company_contacts background hidden person_block" id="pers_<?= $employee->id ?>">
                            <div class="inner">
                                <h3>Ваш персональный специалист по Контрактному производству</h3>
                                <div class="back_wrapper">
                                    <a href="#" class="back"><i class="fa fa-arrow-left color_green" aria-hidden="true"></i></a>
                                </div>
                                <div class="avatar">
                                    <img src="/<?= $employee->photo ?>" alt="" class="img">
                                    <span class="status online"></span>

                                </div>
                                <div class="info_box">
                                    <div class="person_phone"><?= $employee->fio ?></div>
                                    <a href="#" class="info_box__link  person_name">
                                        <i class="seller-window__fa-icon  color-light-grey  fa fa-phone"
                                           aria-hidden="true"></i> <?= $employee->phone ?>
                                    </a>
                                    <div class="person_email">
                                        <a href="mailto:mail@mail.ru" class="info_box__link"><i
                                                    class="seller-window__fa-icon  color-light-grey  fa fa-envelope"
                                                    aria-hidden="true"></i><?= $employee->email ?></a>
                                    </div>
                                </div>
                            </div><!--END .in-->
                            <a href="#" class="button accordeon hide_person_block">
                                <span>Общие контакты компании</span>
                            </a>
                        </div>
                        <!-- END id="pers_1" .box_company_contacts -->
                    <?php endforeach; ?>

                    <div class="box_company_contacts background hidden company_block">
                        <a href="#" class="button button_green button_wide accordeon show_person_link_box">
                            <span>Контакты по направлениям</span>
                        </a>
                        <div class="inner">
                            <h3><?= $company->name ?></h3>
                            <div class="avatar">
                                <img src="/<?= $company->photo ?>" alt="" class="img">
                                <span class="status offline"></span>
                            </div>
                            <div class="info_box">
                                <div class="person_phone"><?= $company->name ?></div>
                                <a href="#" class="info_box__link  person_name">
                                    <i class="seller-window__fa-icon  color-light-grey  fa fa-phone"
                                       aria-hidden="true"></i> <?= $company->phone ?>
                                </a>
                                <div class="person_email">
                                    <a href="mailto:mail@mail.ru" class="info_box__link"><i
                                                class="seller-window__fa-icon  color-light-grey  fa fa-envelope"
                                                aria-hidden="true"></i><?= $company->cooperation_info_email ?></a>
                                </div>
                            </div>
                        </div><!--END .in-->

                    </div>
                    <!-- END .box_company_contacts -->

                </div><!--col-lg-->
            </div><!-- END .row -->
        </div> <!-- END .container -->
    </div>
    <div class="anchor-menu  anchor-menu--js  background-color-blue" id="anchor_top">
        <div class="container">
            <ul class="list">
                <li><a href="#id_0_0" data-href="small_branches">Услуги</a></li>
                <li><a href="#id_1_0" data-href="stock">Акции</a></li>
                <li><a href="#id_2_0" data-href="our-capabilities">Возможности</a></li>
                <li><a href="#id_3_0" data-href="testimonials">Отзывы</a></li>
                <li><a href="#id_4_0" data-href="about-company-section">О компании</a></li>
                <li><a href="#id_5_0" data-href="sertificate-list-section">Новости</a></li>
            </ul>
        </div>
    </div>
    <div class="tabs-section  tabs-section_overflow  tabs">
        <nav class="tabs-section__tabs-nav  tabs-nav">
            <ul class="tabs-nav__list  list  nav nav-tabs  nav-tabs_parent">
                <?php
                foreach ($direction as $key => $category):?>
                    <?php if ($key == 0) {
                        $class = 'active show';
                    } else $class = '';
                    ?>
                    <li class="nav-item"><a href="#tab-pane<?= $category->id ?>" class="nav-link <?= $class ?>"
                                            data-toggle="tab"><span><?= $category->getName() ?></span></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <div class="tabs-section__panel tab-content">
            <?php foreach ($direction as $tKey => $tabs): ?>
                <?php if ($tKey == 0) {
                    $class = 'active show';
                } else $class = '';
                ?>
                <div class="tabs-section__pane  tab-pane fade <?=$class?>" id="tab-pane<?=$tabs->id?>">
                    <div class="small_branches  small_branches_company-card  background-color-white  section-js"
                         id="id_0_<?=$tKey?>">
                        <div class="container">
                            <div class="small_branches__title  content-text">
                                <h3>Услуги</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-sm-6">
                                    <a href="#">
                                        <img src="/images/temp/br1.jpg" alt="">
                                        <span class="h2 white flex aic jcc">Контрактное производство</span>
                                    </a>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <a href="#">
                                        <img src="/images/temp/br2.jpg" alt="">
                                        <span class="h2 white flex aic jcc">Печатные платы</span>
                                    </a>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <a href="#">
                                        <img src="/images/temp/br3.jpg" alt="">
                                        <span class="h2 white flex aic jcc">Компоненты</span>
                                    </a>
                                </div>
                                <div class="col-md-3 col-sm-6 ">
                                    <a href="#">
                                        <img src="/images/temp/br4.jpg" alt="">
                                        <span class="h2 white flex aic jcc">Трафареты</span>
                                    </a>
                                </div>

                                <div class="col-md-4 col-sm-6">
                                    <a href="#">
                                        <img src="/images/temp/br5.jpg" alt="">
                                        <span class="h2 white flex aic jcc">Испытания, контроль</span>
                                    </a>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <a href="#">
                                        <img src="/images/temp/br6.jpg" alt="">
                                        <span class="h2 white flex aic jcc">Кабели и жгуты</span>
                                    </a>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <a href="#">
                                        <img src="/images/temp/br7.jpg" alt="">
                                        <span class="h2 white flex aic jcc">Оборудование</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if(($newsSales = ($model->getNewsSale()->andWhere(['category_id'=>$tabs->id])->limit(8)->all())) !==null):?>
                        <div class="stock-section  background-color-white  section-js" id="id_1_<?=$tKey?>">
                            <div class="container">
                                <div class="stock-slider  owl-carousel_dots_blue  owl-carousel  owl-theme">
                                    <?php foreach($newsSales as $newsSale):?>
                                        <a href="<?=$newsSale->singleLink?>" class="stock-box">
                                            <div class="stock-box__img">
                                                <div class="stock-box__stock  stock-box__stock_left_top  text  color-white">
                                                    акция
                                                </div>
                                                <img src="<?=$newsSale->photos?>" alt="">
                                            </div>
                                            <div class="stock-box__content  content-text  content-text--title-color--blue">
                                                <h2><?=$newsSale->title?></h2>
                                                <p><?=$newsSale->anotation?> </p>
                                            </div>
                                        </a>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                    <?php endif;?>
                    <div class="our-capabilities  our-capabilities_tabs-wrap  background  section-js"
                         style="background-image: url(/images/our-capabilities-bg.png);" id="id_2_<?=$tKey?>">
                        <div class="container">
                            <div class="tabs-section  tabs">
                                <nav class="tabs-section__tabs-nav  tabs-nav">
                                    <ul class="tabs-nav__list  list  nav nav-tabs">
                                        <?php foreach ($tabs->subs as $key => $subs):?>
                                            <?php if ($key == 0) {
                                                $class = 'active';
                                            } else $class = '';
                                            ?>
                                            <li class="nav-item"><a href="#tab-in-pane<?= $tabs->id;?>-<?= $subs->theme->id ?>" class="nav-link <?= $class ?>"
                                                                    data-toggle="tab"><span><?= $subs->theme->name ?></span></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </nav>
                                <div class="tabs-section__panel tab-content">
                                    <?php foreach ($tabs->subs as $sKey => $subs):?>
                                        <?php if ($sKey == 0) {
                                            $class = 'active show';
                                        } else $class = '';
                                        ?>
                                        <div class="tabs-section__pane  tabs-section__pane_in  tab-pane fade  <?= $class ?>"
                                             id="tab-in-pane<?= $tabs->id;?>-<?= $subs->theme->id ?>">
                                            <?php if($capabilities = $company->getCapabilities()->andWhere(['direction_id' => $tabs->id, 'theme_id' => $subs->theme->id])->all()): ?>
                                                <div class="our-capabilities__title  content-text">
                                                    <h2>Наши возможности</h2>
                                                </div>
                                            <?php foreach ($capabilities as $capability): ?>
                                                <?php $mediaFiles = array_merge(explode(',', $capability->getVideos()), explode(',', $capability->getPhotos())) ?>
                                            <div class="our-capabilities__item  row  background-repeat">
                                                <div class="our-capabilities__item-in  col-12">
                                                    <div class="our-capabilities__background  background-repeat"
                                                         style="background-image: url(/images/our-capabilities-items-bg.jpg);">
                                                        <div class="our-capabilities__row  row">
                                                            <div class="our-capabilities__col  col-md-4">
                                                                <div class="background-color-else-white">
                                                                    <div class="our-capabilities__img-box  row">
                                                                        <?php foreach ($mediaFiles as $file): ?>
<!--                                                                      --><?php //if(isVideo($file)): ?>
<!--                                                                          <video class="our-capabilities__img  our-capabilities__img--col  col-6 col-sm-6  img-wrap" width="100%" controls="controls">-->
<!--                                                                              <source src="/--><?//=$file?><!--" type='video/ogg; codecs="theora, vorbis"'>-->
<!--                                                                              <source src="/--><?//=$file?><!--" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>-->
<!--                                                                              <source src="/--><?//=$file?><!--" type='video/webm; codecs="vp8, vorbis"'>-->
<!--                                                                              Тег video не поддерживается вашим браузером.-->
<!--                                                                          </video>-->
<!--                                                                      --><?php //else: ?>
                                                                            <a href="#"
                                                                               class="our-capabilities__img  our-capabilities__img--col  col-6 col-sm-6  img-wrap">
                                                                                <img src="/<?= $file ?>"
                                                                                     alt="">
                                                                            </a>
<!--                                                                      --><?php //endif; ?>
                                                                        <?php endforeach; ?>
                                                                    </div>
                                                                </div>
                                                                <div class="our-capabilities__txt  content-text  text-center  background-color-white">
                                                                    <p> <?= $capability->title ?> </p>
                                                                </div>
                                                            </div>
                                                            <div class="our-capabilities__col  our-capabilities__col--content col-md-8">
                                                                <div class="our-capabilities__content  content-text">
                                                                    <p><?= $capability->description ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if($chooses = $company->getChooses()->andWhere(['direction_id' => $tabs->id])->all()): ?>
                    <div class="feature-section  background-color-white  section-js">
                        <div class="container">
                            <div class="feature-section__title  content-text">
                                <h2>Почему нас выбирают</h2>
                            </div>
                            <div class="feature-section__main-row  row">
                                <?php foreach ($chooses as $chKey => $choose): ?>
                                    <?php if($chKey == 0): ?>
                                        <div class="feature-section__main-col  col-md-6">
                                            <a href="#" class="feature-section__img  feature-section__img--large  img-wrap">
                                                <img src="/<?= $choose->photo ?>" alt="">
                                                <div class="feature-section__feature  content-text"><h3><?= $choose->description ?></h3></div>
                                            </a>
                                        </div>
                                        <div class="feature-section__main-col  col-md-6">
                                            <div class="feature-section__row-in  row">
                                    <?php else: ?>
                                            <div class="feature-section__col-in  col-sm-6">
                                                <a href="#" class="feature-section__img  img-wrap">
                                                    <img src="/<?= $choose->photo ?>" alt="">
                                                    <div class="feature-section__feature  content-text"><h3><?= $choose->description ?></h3>
                                                    </div>
                                                </a>
                                            </div>
                                    <?php endif; ?>
                                <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="feature-section__btn  button  button_blue"><span class="btn__in">Сделать запрос</span></a>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if($clients = $company->getClients()->andWhere(['direction_id' => $tabs->id])->all()): ?>
                    <div class="best-company-section  background  section-js"
                         style="background-image: url(/images/best-company-section-bg.jpg);">
                        <div class="container">
                            <div class="best-company-section__title  content-text  content-text--text--center">
                                <h2>Наши клиенты</h2>
                            </div>
                            <div class="best-company-slider  owl-carousel  owl-carousel_dots_blue  owl-theme">
                                <?php foreach ($clients as $client): ?>
                                    <a href="#" class="company-box">
                                        <div class="company-box__img-wrap  img-wrap">
                                            <img src="/<?= $client->photo ?>" alt="">
                                        </div>
                                        <div class="company-box__foot  background-color-blue  flex  justify-content-between  align-items-center">
                                            <div class="company-box__content  content-text  color-white">
                                                <h5><?= $client->name ?></h5>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if($testimonials = $company->getTestimonials()->andWhere(['direction_id' => $tabs->id])->all()): ?>
                    <div class="testimonials  testimonials_company-card  section-js" id="id_3_0">
                        <div class="testimonials__container  container">
                            <h2 class="h2"><a href="#">Нам доверяют</a></h2>
                            <div class="slide_testim owl-carousel  owl-carousel_nav_angle  owl-carousel_nav_angle_blue  owl-carousel_dots_blue  owl-theme">
                                    <?php foreach ($testimonials as $testimonial): ?>
                                    <div class="slide_testim__item  item  flex  justify-content-between">
                                        <div class="testimonials__left  left">
                                            <div class="user_pic"><img src="/<?= $testimonial->photo ?>" alt=""></div>
                                            <div class="user_name">
                                                <span><?= $testimonial->fio ?></span>
                                                <?= $testimonial->position ?> «<?= $testimonial->company_name ?>»
                                            </div>
                                        </div>
                                        <div class="testimonials__right  right">
                                            <div class="testimonials__testim  testim">
                                                <?= $testimonial->description ?>
                                            </div>
                                            <a href="#"
                                               class="slide_testim__btn  button  button_green"><span><?= t('Зарегистрировать компанию') ?></span></a>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if($companyAbout = $company->getAbout()->andWhere(['direction_id' => $tabs->id])->one()): ?>
                    <div class="about  about_company-card  background-color-grey  section-js" id="id_4_<?=$tKey?>">
                        <div class="about__name  container no-padding">
                            <div class="col-sm-6  col-lg-7"><?= $company->name ?></div>
                        </div>
                        <div class="about__container  container">
                            <div class="about__right_side_bg">
<!--                                <img src="/--><?//= $companyAbout->media  ?><!--">-->
                            </div>
                            <div class="about__title  content-text">
                                <h2>О компании</h2>
                            </div>
                            <div class="row">
                                <div class="about__content  content-text  col-lg-7 col-md-6">
                                    <p><?= $companyAbout->description ?></p>
                                </div>
                                <div class="about__video-or-img  col-lg-5 col-md-6 ">
                                    <?php if(isVideo($companyAbout->media)): ?>
                                        <iframe width="510" height="287"
                                                src="/<?= $companyAbout->media ?>"></iframe>
                                    <?php else: ?>
                                        <img src="/<?= $companyAbout->media ?>">
                                    <?php endif; ?>

                                </div>
                            </div>
                            <!-- <div class="name"><img src="/images/name.png" alt=""></div> -->
                            <?php if($companyAbout->aboutDirectors): ?>
                            <div class="about__people-list  row">
                                <div class="about__col  col-md-9">
                                    <div class="row  justify-content-between">
                                        <?php foreach ($companyAbout->aboutDirectors as $director): ?>
                                        <div class="about__member  company-member  col-md-6">
                                            <div class="flex align-items-center">
                                                <div class="company-member__img img-wrap">
                                                    <img src="/<?= $director->photo ?>" alt="">
                                                </div>
                                                <div class="company-member__text  col">
                                                    <p><?= $director->fio ?></p>
                                                    <p class="text  color-light-grey"><?= $director->position ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if($certificates = $company->getCertificates()->andWhere(['direction_id' => $tabs->id])->all()): ?>
                    <div class="sertificate-list-section  background-color-white  section-js" id="id_5_<?=$tKey?>">
                        <div class="container">
                            <div class="sertificate-list-section__title  content-text">
                                <h2>Лицензии и сертификаты</h2>
                            </div>
                            <div class="sertificate-slider  owl-carousel  owl-carousel_nav_angle  owl-carousel_nav_angle_blue  owl-theme">
                                    <?php foreach ($certificates as $certificate): ?>
                                        <a href="#" class="sertificate-box">
                                            <div class="sertificate-box__img  img-wrap">
                                                <img src="/<?= $certificate->photo ?>" alt="">
                                            </div>
                                            <div class="sertificate-box__text  text  text-center">
                                                <?= $certificate->description ?>
                                            </div>
                                        </a>
                                    <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

<!--                    --><?php //kk($newest) ?>

                    <?php if($newest = $model->getNews()->andWhere(['category_id'=>$tabs->id])->orderBy(['in_news.created_at'=>SORT_DESC])->limit(3)->all()):?>
                    <div class="news-section  background-color-grey  section-js">
                        <div class="container">
                            <div class="news-section__title  text-content  color-blue">
                                <h2><a href="#">Самое новое</a></h2>
                            </div>
                            <div class="row">
                                <?php foreach($newest as $new):?>
                                      <div class="news-section__col  news-box  col-md-6  col-xl-4  flex  flex-sm-column  justify-content-sm-between">
                                    <div class="news-box__body">
                                        <div class="news-box__img-wrap  img-wrap">
                                            <img src="<?=$new->photos?>" alt="">
                                        </div>
                                        <div class="news-box__info  flex justify-content-between align-items-center">
                                            <div class="news-box__date  text"><?=$new->date?></div>
                                            <div class="news-box__view flex align-items-center">
                                                <i class="news-box__view-fa  fa fa-eye color-light-grey"
                                                   aria-hidden="true"></i>
                                                <div class="news-box__view-value"><?=$new->views?></div>
                                            </div>
                                        </div>
                                        <div class="news-box__content  text-content">
                                            <h3><?=$new->title?></h3>
                                            <p><?=$new->text?></p>
                                        </div>
                                    </div>
                                    <div class="news-box__foot  flex  justify-content-between  align-items-center">
                                        <div class="author">
                                            <i class="author__icon-fa  fa fa-user  color-light-grey"
                                               aria-hidden="true"></i>
                                            <a href="" class="author__link  text"><?=$new->author?></a>
                                        </div>
                                        <a href="<?=$new->singleLink?>" class="news-box__btn  button  button_blue">
                                            <span class="btn__in">Читать</span>
                                        </a>
                                    </div>
                                </div>
                                <?php endforeach;?>

                            </div>
                        </div>
                    </div>
                <?php endif;?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="anchors  anchors--fixed">
        <a href="#anchor_top" class="anchors__link  anchor-top  anchor-top--js  icon-svg">
            <svg viewBox="0 0 286.1 286.1" style="enable-background:new 0 0 286.1 286.1;" xml:space="preserve"
                 class="anchor-top__border">
						<g>
                            <path class="st0" d="M44.7,26.8h17.7L62.3,0H35.8C16,0,0,16,0,35.8v27l26.8-0.1v-18C26.8,34.8,34.8,26.8,44.7,26.8z M62.3,286.1
								l0.1-26.8H44.7c-9.9,0-17.9-8-17.9-17.9v-18L0,223.3v27c0,19.7,16,35.7,35.8,35.7L62.3,286.1L62.3,286.1z M26.8,152H0v53.6h26.8
								V152z M134.1,259.2H80.5v26.8h53.6V259.2z M26.8,80.5H0v53.6h26.8V80.5z M80.5,26.8h53.6V0H80.5V26.8z M259.2,205.6h26.8V152h-26.8
								V205.6z M286.1,250.3v-27l-26.8,0.1v18c0,9.9-8,17.9-17.9,17.9h-17.7l0.1,26.8h26.6C270,286.1,286.1,270.1,286.1,250.3z
								 M259.2,134.1h26.8V80.5h-26.8V134.1z M259.2,62.7l26.8,0.1v-27C286.1,16,270,0,250.3,0h-26.6l-0.1,26.8h17.8
								c9.9,0,17.9,8,17.9,17.9C259.2,44.7,259.2,62.7,259.2,62.7z M152,26.8h53.6V0H152V26.8z M152,286.1h53.6v-26.8H152V286.1z"/>
                        </g>
					</svg>
					<svg viewBox="0 0 125.2 133.9" style="enable-background:new 0 0 125.2 133.9;" xml:space="preserve"
                         class="anchor-top__arrow">
					<g>
                        <path class="st0" d="M-80.4-8.9 M-80.4,151.6 M-80.4,80.3v53.6 M-80.4,8.8v53.6 M123.1,57L71.4,5.9C66.6-2,58.6-2,53.8,5.9L2.1,57
							c-4.8,7.9-0.9,14.3,8.8,14.3h24.9V125c0,4.9,4,8.9,8.9,8.9h35.8c4.9,0,8.9-4,8.9-8.9V71.3h24.9C124,71.4,127.9,64.9,123.1,57z"/>
                    </g>
				</svg>

        </a>
        <a href="#" class="anchors__link  anchor-helper  icon-svg">
            <svg viewBox="0 0 286.1 286.1" style="enable-background:new 0 0 286.1 286.1;" xml:space="preserve"
                 class="anchor-helper__border">
						<g>
                            <path class="st0" d="M44.7,26.8h17.7L62.3,0H35.8C16,0,0,16,0,35.8v27l26.8-0.1v-18C26.8,34.8,34.8,26.8,44.7,26.8z M62.3,286.1
								l0.1-26.8H44.7c-9.9,0-17.9-8-17.9-17.9v-18L0,223.3v27c0,19.7,16,35.7,35.8,35.7L62.3,286.1L62.3,286.1z M26.8,152H0v53.6h26.8
								V152z M134.1,259.2H80.5v26.8h53.6V259.2z M26.8,80.5H0v53.6h26.8V80.5z M80.5,26.8h53.6V0H80.5V26.8z M259.2,205.6h26.8V152h-26.8
								V205.6z M286.1,250.3v-27l-26.8,0.1v18c0,9.9-8,17.9-17.9,17.9h-17.7l0.1,26.8h26.6C270,286.1,286.1,270.1,286.1,250.3z
								 M259.2,134.1h26.8V80.5h-26.8V134.1z M259.2,62.7l26.8,0.1v-27C286.1,16,270,0,250.3,0h-26.6l-0.1,26.8h17.8
								c9.9,0,17.9,8,17.9,17.9C259.2,44.7,259.2,62.7,259.2,62.7z M152,26.8h53.6V0H152V26.8z M152,286.1h53.6v-26.8H152V286.1z"/>
                        </g>
					</svg>
					<svg viewBox="0 0 512 416.7" style="enable-background:new 0 0 512 416.7;" xml:space="preserve"
                         class="anchor-helper__chat">
						<g>
                            <g>
                                <g>
                                    <path d="M474.1,1.3H122.7c-21.1,0-37.9,17.3-37.9,37.9v218.3c0,21.1,17.3,37.9,37.9,37.9h242.2l54.8,55.3
										c2.3,2.3,5.2,3.7,8.4,3.7c6.6,0,12.2-5.2,12.2-12.2v-46.8h33.7c21.1,0,37.9-17.3,37.9-37.9V39.2C512,18.1,494.7,1.3,474.1,1.3z
										 M176.6,189.1c-19.2,0-35.1-15.9-35.1-35.1s15.9-35.1,35.1-35.1s35.1,15.9,35.1,35.1S196.3,189.1,176.6,189.1z M299.8,189.1
										c-19.2,0-35.1-15.9-35.1-35.1s15.9-35.1,35.1-35.1s35.1,15.9,35.1,35.1S319,189.1,299.8,189.1z M422.5,189.1
										c-19.2,0-35.1-15.9-35.1-35.1s15.9-35.1,35.1-35.1s35.1,15.9,35.1,35.1S441.7,189.1,422.5,189.1z"/>
                                    <path d="M63.3,258.4v-74.5H24.8C11.3,183.9,0,195.2,0,208.8v143.3c-0.5,14.5,10.8,25.8,24.8,25.8h22v30.9c0,4.2,3.7,8,8,8
										c2.3,0,4.2-0.9,5.6-2.3l36.1-36.1h159.3c13.6,0,24.8-11.2,24.8-24.8v-35.6H122.7C90,317.9,63.3,291.2,63.3,258.4z"/>
                                </g>
                            </g>
                        </g>
					</svg>
        </a>
    </div>

<?=
\app\widgets\FavoriteAddJsWidget::widget(['findClass' => 'button_favorite', 'data' => 'id', 'url' => '/main/company-favorite', 'responseClass' => 'button_favorite']);
?>