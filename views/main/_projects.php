<?php if (!empty($projects)): ?>
    <div class="galery__title  content-text">
        <h2><a href="#">Социальные проекты</a></h2>
    </div>
    <div class="row">
        <?php foreach ($projects as $key => $value): ?>
            <?php 
                $link = !empty($value->link) ? $value->link : '/'.$value->photo;
                $icon = !empty($value->link) ? 'fa-play-circle' : 'fa-arrows-alt';
                $attr = !empty($value->link) ? '' : 'data-type="image"';
            ?>
            <div class="galery__column  col-md-6  col-lg-4">
                <div class="galery__item">
                    <a href="<?=$link ?>" class="galery__link" data-fancybox="images" <?=$attr ?>>
                        <span class="galery__link-loop">
                            <i class="fa <?=$icon ?>" aria-hidden="true"></i>
                        </span>
                        <img src="/<?=$value->photo ?>" alt="">
                    </a>
                    <div class="content-text">
                        <h3><?=$value->title ?></h3>
                        <div class="galery__dotted  dotted-box">
                            <?php if (!empty($value->duration)): ?>
                                <div class="dotted-box__in">
                                    <div class="dotted-box__item  dotted-box__item_left">Продолжительность</div>
                                    <div class="dotted-box__item  dotted-box__item_right"><?=$value->duration ?></div>
                                </div>
                            <?php endif ?>
                            <?php if (!empty($value->language)): ?>
                                <div class="dotted-box__in">
                                    <div class="dotted-box__item  dotted-box__item_left">Язык</div>
                                    <div class="dotted-box__item  dotted-box__item_right"><?=$value->language ?></div>
                                </div>
                            <?php endif ?>
                        </div>
                        <?php if (!empty($value->info)): ?>
                            <p><?=$value->info ?></p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
        <!-- <div class="galery__column  col-md-6  col-lg-4">
            <div class="galery__item">
                <a class="galery__link" data-fancybox="images" href="https://www.youtube.com/watch?v=_sI_Ps7JSEk&amp;autoplay=1&amp;rel=0&amp;controls=0&amp;showinfo=0">
    							<span class="galery__link-loop">
    								<i class="fa fa-play-circle" aria-hidden="true"></i>
    							</span>
                    <img src="/images/temp/about1.jpg" alt="">
                </a>
                <div class="content-text">
                    <h3>Открылась электронная регистрация на выставку «ЭкспоЭлектроника» 2018</h3>
                    <div class="galery__dotted  dotted-box">
                        <div class="dotted-box__in">
                            <div class="dotted-box__item  dotted-box__item_left">Продолжительность</div>
                            <div class="dotted-box__item  dotted-box__item_right">3:23</div>
                        </div>
                        <div class="dotted-box__in">
                            <div class="dotted-box__item  dotted-box__item_left">Язык</div>
                            <div class="dotted-box__item  dotted-box__item_right">английский</div>
                        </div>
                    </div>
                    <p>Международную выставку электронных компонентов, модулей и комплектующих «ЭкспоЭлектроника», которая состоится 17-19 </p>
                </div>
            </div>
        </div>
        <div class="galery__column  col-md-6  col-lg-4">
            <div class="galery__item">
                <a class="galery__link" data-fancybox="images" data-type="image" href="/images/temp/about3.jpg">
    							<span class="galery__link-loop">
    								<i class="fa fa-arrows-alt" aria-hidden="true"></i>
    							</span>
                    <img src="/images/temp/about3.jpg" alt="">
                </a>
                <div class="content-text">
                    <h3>Открылась электронная регистрация на выставку «ЭкспоЭлектроника» 2018</h3>
                    <p>Приглашаем вас посетить 21-ю Международную выставку электронных компонентов, модулей и комплектующих «ЭкспоЭлектроника», которая состоится 17-19 апреля 2018 года в Крокус Экспо.</p>
                </div>
            </div>
        </div>
        <div class="galery__column  col-md-6  col-lg-4">
            <div class="galery__item">
                <a class="galery__link" data-fancybox="images" data-type="image" href="/images/temp/about3.jpg">
    							<span class="galery__link-loop">
    								<i class="fa fa-arrows-alt" aria-hidden="true"></i>
    							</span>
                    <img src="/images/temp/about3.jpg" alt="">
                </a>
                <div class="content-text">
                    <h3>Открылась электронная регистрация на выставку «ЭкспоЭлектроника» 2018</h3>
                    <p>Приглашаем вас посетить 21-ю Международную выставку электронных компонентов, модулей и комплектующих «ЭкспоЭлектроника», которая состоится 17-19 апреля 2018 года в Крокус Экспо.</p>
                </div>
            </div>
        </div> -->
    </div>
<?php endif ?>