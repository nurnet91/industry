<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="slider_section">
    <div class="container">
        <div class="slider_section__title  content-text">
            <h1><?= t('Мы развиваем промышленные компании'); ?></h1>
        </div>

        <div class="slider-head  owl-carousel">
        <?php foreach($sliderTitles as $item): ?>
            <div class="slider_head__title  content-text">
                <h3><?= $item->title ?></h3>
            </div>
        <?php endforeach; ?>
        </div>
        <div class="slider_head  owl-carousel  owl-carousel_dots_blue  owl-carousel_dots_white  owl-carousel_nav_angle  owl-theme">
            <?php foreach($sliderItems as $item): ?>
                <div class="slider_head__item  item">
                    <div class="slider_head__img  img_wrap">
                        <img src="/<?= $item->photo ?>" alt="">
                    </div>
                    <div class="slider_text"><?= $item->title ?></div>
                </div>
            <?php endforeach; ?>
        </div>
        <a href="#down" class="go_down"></a>
    </div>
</div><!--about-->

    <?= $this->render('_sign_up'); ?>

<div class="branches  branches_index">
    <div class="container">
        <div class="row">

            <?php foreach($interests as $cat):?>
                <div class="branches__col-main  col-sm-auto">
                    <a href="/main/directions?id=<?= $cat->id ?>" target="_blank" class="branch_box">
                        <?=Html::img('/'.$cat->photo, ['alt' => $cat->name])?>
                        <div class="branch_title flex aic">
                            <span><?=$cat->name?></span>
                        </div>
                        <div class="branch_hover hidden">
                            <h2><?=$cat->name?></h2>
                                <div class="branch_text">
                                    <?=$cat->description?>
                                </div>
                            <div class="branch_box__foot"><?= t('Ознакомиться с направлением') ?></div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
            
        </div>
    </div>
</div>

<?php if($ihAbout): ?>
<div class="about">
    <div class="container container--max_w_95 in">
        <div class="row">
            <div class="col-lg-7 col-sm-6">
                <h2><?= $ihAbout->title ?></h2>
                <div class="text_box">
                    <p>
                        <?= $ihAbout->description ?>
                    </p>
                </div>
                <a href="/main/about" target="_blank" class="button button_green"><span>Подробнее</span></a>
            </div>
            <div class="col-lg-5 col-sm-6 ">
                <?php if(isVideo($ihAbout->photo)): ?>
                    <iframe width="510" height="287" src="/<?= $ihAbout->photo ?>"></iframe>
                <?php else: ?>
                    <?= Html::img('/'.$ihAbout->photo, ['style' => 'max-height: 300px']) ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="name"><img src="/images/name.png" alt=""></div>
    </div>
</div>
<?php endif; ?>

<div class="priority">
    <div class="priority__title  content-text">
        <h2>Наши приоритеты</h2>
    </div>
    <div class="container container--max_w_95 in">
        <div class="row">
            <div class="col-sm-6 col-md-3 box"><span>1</span>Дружественный подход ко всем</div>
            <div class="col-sm-6 col-md-3 box"><span>2</span>Максимальная компетентность  в нашей деятельности</div>
            <div class="col-sm-6 col-md-3 box"><span>3</span>Открытость к конструктивному диалогу с каждым</div>
            <div class="col-sm-6 col-md-3 box"><span>4</span>Использование самых современных инструментов</div>

            <div class="col-sm-6 col-md-3 box"><span>5</span>Постоянный поиск новых решений</div>
            <div class="col-sm-6 col-md-3 box"><span>6</span>Стремление к максимальной информативности и актуальности</div>
            <div class="col-sm-6 col-md-3 box"><span>7</span>Стремление к максимальному  результату для всех участников сообщества</div>
            <div class="col-sm-6 col-md-3 box"><span>8</span>Стремление быть лучшим в своем деле и улучшать мир вокруг</div>
        </div>
    </div>
</div>

<div class="causes">
    <div class="in">
        <div class="causes__title  content-text">
            <h2>3 главные причины работать с IH</h2>
        </div>
        <div class="causes_wrap flex jcsb">
            <div class="causes_box">
                <div class="causes_pict"><img src="/images/cause1.png" alt=""></div>
                <div class="causes_text">Действительно удобный и быстрый поиск</div>
            </div>
            <div class="causes_box">
                <div class="causes_pict"><img src="/images/cause2.png" alt=""></div>
                <div class="causes_text">Все в одном месте - <span>самая актуальная информация по всем отраслям</span></div>
            </div>
            <div class="causes_box">
                <div class="causes_pict"><img src="/images/cause3.png" alt=""></div>
                <div class="causes_text">Неизбежность результата для Вашей компании</div>
            </div>
        </div>
    </div>
</div>
<?php if($about): ?>
    <div class="galery">
        <div class="in">
            <div class="galery__title  content-text">
                <h2><a href="/main/about" target="_blank">Об IH говорят</a></h2>
            </div>
            <ul class="about_item flex jcsb">
                <?php foreach ($about as $key => $value): ?>
                    <li class="item">
                        <a  data-fancybox="images" href="<?= $value->link ? $value->link : $value->photo ?>"><span class="loop_img"></span><img src="/<?= $value->photo ?>" alt=""></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>

<?=\app\widgets\WeareTrustedWidget::widget()?>

<?php if($commands): ?>
<div class="team">
    <div class="container">
        <div class="team__title  content-text">
            <h2 class="white">Наша команда</h2>
        </div>
        <div class="team__members-list  row">
            <?php foreach ($commands as $key => $value): ?>
                <div class="team__member-col  col-md-6  col-lg-4  col-xl-3">
                    <a href="#" class="team-member">
                        <div class="team-member__img">
                            <img src="/<?=$value->photo ?>" alt="">
                        </div>
                        <div class="team-member__content  content-text  text-center">
                            <h3><?=$value->fio ?></h3>
                            <p><?=$value->occupation ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <a href="main/about" class="button  button_blue  block-centered"><span>Познакомится ближе</span></a>
    </div>
</div>
<?php endif; ?>

    <div class="registry">
    <div class="container">
        <div class="registry__title  content-text">
            <h2>Что вы найдете, если <a href="#" class="light_blue">зарегистрируетесь</a></h2>
        </div>
        <ul class="reg_list  row jcsb">
            <li><img src="/images/reg1.png" alt=""><div class="reg_list_text">Персональные настройки новостной ленты</div></li>
            <li><img src="/images/reg2.png" alt=""><div class="reg_list_text">Оценка компаний по результатам работы</div></li>
            <li><img src="/images/reg3.png" alt=""><div class="reg_list_text">Доступ к вебинарам экспертов</div></li>
            <li><img src="/images/reg4.png" alt=""><div class="reg_list_text">Доступ  к организации Тендеров</div></li>
            <li><img src="/images/reg5.png" alt=""><div class="reg_list_text">Общение и обменопытом на Форуме</div></li>
            <li><img src="/images/reg6.png" alt=""><div class="reg_list_text">Доступ к Базе Знаний</div></li>
        </ul>
    </div>
</div>
<?= \app\widgets\SubscribeWidget::widget();?>