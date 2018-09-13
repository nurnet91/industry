<div class="subscribe">
    <div class="container">
        <div class="row">
            <div class="col-lg-10  block-centered">
                <div class="subscribe__title  content-text">
                    <h2> Более 5000 специалистов уже получают нашу рассылку.<br/> Подпишитесь и Вы.</h2>
                </div>

                <form id="SubsForm" class="subscribe__site-form  site_form flex jcsb  align-items-center">

                    <div class="site_form__inputs  left flex jcsb  align-items-center">

                        <label class="site-form__label gutters">
                            <input name="Subscribers[name]" id="subsName" type="text" placeholder="<?=t('Name')?>*" class="grey">
                            <span id="name_error" class="site-form__error  site-form__error_show error" hidden="hidden"><?=t('Неправильно заполненное имя')?></span>
                        </label>

                        <label class="site-form__label gutters">
                            <input name="Subscribers[email]" id="subsMail" type="email" placeholder="E-Mail*" class="grey">
                            <span id="email_error" class="site-form__error  site-form__error_show error" hidden="hidden" ><?=t('Неправильно заполнен "E-Mail"')?></span>
                        </label>

                    </div>
                    <div class="form_buttons flex jcsb">

                        <a id="validateMail" class="site_form__button  button  button_green" href="javascript:;" ><span>Подписаться</span></a>
                        <a href="#" class="subsc_tg" data-toggle="tooltip"  data-template='<div class="tooltip tooltip_blue" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-placement="bottom"  data-offset="-50px" title="Подписаться на телеграмм">
                            <img src="/images/telegram.jpg" alt="">
                            <!--							 <span class="telegramm_tooltip hidden">Подписаться на телеграмм</span>-->
                        </a>
                    </div>`
                </form>
                <div class="subscribe__form_text  form_text">
                    Либо <a href="">зарегистрируйте личный кабинет</a> и сами формируйте свою новостную ленту.<br/>Ничего лишнего. Это бесплатно, и вы можете отказаться от подписки в любой момент.
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-popup  header-popup_subscribe" id="subscribe-modal">
    <div class="site_form__modal  header-popup__subscribe">
        <?=$this->render('_subscribe', ['interests' => $interests]); ?>
    </div>
</div>

