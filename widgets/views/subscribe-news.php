<form id="SubsForm" class="subscribe__site-form  site_form flex jcsb  align-items-center">
    <div class="site_form__inputs  left flex jcsb  align-items-center">
        <label class="site-form__label gutters">
            <input name="Subscribers[name]" id="subsName" type="text" placeholder="<?=t('Имя')?>*" class="grey">
            <span id="name_error" class="site-form__error  site-form__error_show error" hidden="hidden"><?=t('Неправильно заполненное имя')?></span>
        </label>
        <label class="site-form__label gutters">
            <input name="Subscribers[email]" id="subsMail" type="email" placeholder="E-Mail*" class="grey">
            <span id="email_error" class="site-form__error  site-form__error_show error" hidden="hidden"><?=t('Неправильно заполнен "E-Mail"')?></span>
        </label>
    </div>
    <div class="form_buttons flex jcsb">
        <a id="validateMail"  class="site_form__button  button  button_green" href="javascript:;"><span><?=t('Подписаться')?></span></a>
    </div>
</form>
<div class="header-popup  header-popup_subscribe" id="subscribe-modal">
    <div class="site_form__modal  header-popup__subscribe">
        <?=$this->render('_subscribe', ['interests' => $interests]); ?>
    </div>
</div>
