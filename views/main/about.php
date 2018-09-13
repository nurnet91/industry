<div class="galery-banner">
    <div class="galery-banner__in  clearfix">
        <div class="galery-banner__img-col">
            <a data-fancybox="galery-banner" data-type="image" href="/images/images/galery-banner-img1.jpg" class="galery-banner__img-wrap">
                <img src="/images/images/galery-banner-img1.jpg" alt="" class="galery-banner__img">
            </a>
        </div>
        <div class="galery-banner__img-col">
            <a data-fancybox="galery-banner" data-type="image" href="/images/images/galery-banner-img2.jpg" class="galery-banner__img-wrap">
                <img src="/images/images/galery-banner-img2.jpg" alt="" class="galery-banner__img">
            </a>
            <a data-fancybox="galery-banner" data-type="image" href="/images/images/galery-banner-img3.jpg" class="galery-banner__img-wrap">
                <img src="/images/images/galery-banner-img3.jpg" alt="" class="galery-banner__img">
            </a>
        </div>
        <div class="galery-banner__img-col">
            <a data-fancybox="galery-banner" data-type="image" href="/images/images/galery-banner-img4.jpg" class="galery-banner__img-wrap">
                <img src="/images/images/galery-banner-img4.jpg" alt="" class="galery-banner__img">
            </a>
        </div>
        <div class="galery-banner__img-col">
            <a data-fancybox="galery-banner" data-type="image" href="/images/images/galery-banner-img5.jpg" class="galery-banner__img-wrap">
                <img src="/images/images/galery-banner-img5.jpg" alt="" class="galery-banner__img">
            </a>
            <a data-fancybox="galery-banner" data-type="image" href="/images/images/galery-banner-img6.jpg" class="galery-banner__img-wrap">
                <img src="/images/images/galery-banner-img6.jpg" alt="" class="galery-banner__img">
            </a>
        </div>
        <div class="galery-banner__img-col-center">
            <a data-fancybox="galery-banner" data-type="image" href="/images/images/galery-banner-img7.jpg" class="galery-banner__img-col-center-in">
                <img src="/images/images/galery-banner-img7.jpg" alt="">
            </a>
        </div>
    </div>
</div>
<div class="tabs-section  tabs-section_overflow  tabs">
    <nav class="tabs-section__tabs-nav  tabs-nav">
        <ul class="tabs-nav__list  list  nav nav-tabs  nav-tabs_parent">
            <li class="nav-item"><a href="#tab-pane1" class="nav-link active" data-toggle="tab"><span><?= t('Слово основателя') ?></span></a></li>
            <li class="nav-item"><a href="#tab-pane2" class="nav-link" data-toggle="tab"><span><?= t('Нам доверяют') ?></span></a></li>
            <li class="nav-item"><a href="#tab-pane3" class="nav-link" data-toggle="tab"><span><?= t('Об IH говорят') ?></span></a></li>
            <li class="nav-item"><a href="#tab-pane4" class="nav-link" data-toggle="tab"><span><?= t('Наша команда') ?></span></a></li>
            <li class="nav-item"><a href="#tab-pane5" class="nav-link" data-toggle="tab"><span><?= t('Социальные проекты') ?></span></a></li>
            <li class="nav-item"><a href="#tab-pane6" class="nav-link" data-toggle="tab"><span><?= t('Контакты') ?></span></a></li>
            <li class="nav-item"><a href="#tab-pane7" class="nav-link" data-toggle="tab"><span><?= t('FAQ') ?></span></a></li>
        </ul>
    </nav>
    <div class="tabs-section__panel tab-content">
        <div class="tabs-section__pane  tab-pane fade show active  background-color-white" id="tab-pane1">
            <div class="mission">
                <div class="container">
                    <?=$this->render('_words', ['words' => $words]) ?>
                </div>
            </div>
        </div>
<!--        --><?php //kk($rev_com) ?>
        <div class="tabs-section__pane  tab-pane fade  background-color-white" id="tab-pane2">
            <div class="trust">
                <div class="container">
                    <?=$this->render('_reviews', [
                        'reviews' => $reviews, 
                        'rev_com' => $rev_com,
                    ]) ?>
                </div>
            </div>
        </div>
        <div class="tabs-section__pane  tab-pane fade  background-color-white" id="tab-pane3">
            <div class="galery  galery_about">
                <div class="container">
                    <?=$this->render('_about', ['about' => $about]) ?>
                </div>
            </div>
        </div>
        <div class="tabs-section__pane  tab-pane fade  background-color-white" id="tab-pane4">
            <div class="team-about">
                <div class="container">
                    <?=$this->render('_comands', ['comands' => $comands]) ?>
                </div>
            </div>
        </div>
        <div class="tabs-section__pane  tab-pane fade  background-color-white" id="tab-pane5">
            <div class="galery  galery_social-project">
                <div class="container">
                    <?=$this->render('_projects', ['projects' => $projects]) ?>
                </div>
            </div>
        </div>
        <div class="tabs-section__pane  tab-pane fade  background-color-white" id="tab-pane6">
            <div class="subscribe  subscribe_contacts">
                <div class="container">
                    <?=$this->render('_contacts', ['contacts' => $contacts, 'contModel' => $contModel]) ?>
                </div>
            </div>
            <div id="map" class="map"></div>
        </div>
        <div class="tabs-section__pane  tab-pane fade  background-color-white" id="tab-pane7">
            <div class="faq-about">
                <div class="container">
                    <?=$this->render('_faqs', ['faqs' => $faqs]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->registerJsFile("https://api-maps.yandex.ru/2.1/?lang=ru_RU"); ?>
<?php $this->registerJs("
    ymaps.ready(function () {
        var myMap = new ymaps.Map('map', {
                center: [55.751574, 37.573856],
                zoom: 9,
                controls: ['zoomControl']
            }, {
                searchControlProvider: 'yandex#search'
            }),

            myPlacemark = new ymaps.Placemark([55.661574, 37.573856], {
                hintContent: 'Собственный значок метки',
                balloonContent: 'Центральный офис'
            }, {
                iconLayout: 'default#image',
                iconImageHref: '/images/svg/map-pin.svg',
                iconImageSize: [30, 42],
                iconImageOffset: [-5, -38]
            });

        myMap.behaviors.disable('scrollZoom');
        myMap.geoObjects.add(myPlacemark);
    });
"); ?>
            