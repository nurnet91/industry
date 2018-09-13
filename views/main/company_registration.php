<?php 

?>
<div class="company-registration">
    <div class="container">
        <div class="company-registration__item  company-registration__item_top  text-center">
            <p>Благодарим Вас за то, что хотите развивать свою компанию и проявили интерес к нашему сообществу!» Пожалуйста, выберете вариант профиля, который вам больше нравится:</p>
        </div>
        <div class="company-registration__item  table-wrap  table-wrap_medium">
            <table class="register-table">
                <thead>
                <tr>
                    <th></th>
                    <?php use app\models\CompanyInfo;
                    use yii\widgets\ActiveForm;

                    foreach ($variants as $variant): ?>
                        <th><img src="/<?=$variant->profile_icon ?>" alt=""> <?=$variant->name ?> </th>
                    <?php endforeach; ?>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?=t('Otrasley') ?></td>
                    <?php foreach ($variants as $variant): ?>
                        <td><?=$variant->industries_count;?> отрасль </td>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <td><?=t('Услуги') ?></td>
                    <?php foreach ($variants as $variant): ?>
                        <td><?=($variant->services_count == 0) ? 'услуги не ограничены' : $variant->services_count .' услуги'?> </td>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <td><?=t('Загрузка фото и видео') ?></td>
                    <?php foreach ($variants as $variant): ?>
                        <td><?=($variant->photos_count == 0 && $variant->videos_count == 0) ? 'фото и видео ' : (($variant->photos_count > 0) ? (($variant->videos_count > 0) ? $variant->photos_count.' фото '.$variant->videos_count.' видео ' : $variant->photos_count .' фото ') : '') ?><span class="color-light-grey">(<?=$variant->photo_video_size?>Мб)</span></td>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <td><?=t('Приоритетность показов') ?></td>
                    <?php foreach ($variants as $variant): ?>
                        <td><span class="register-table__show  register-table<?=($variant->show_priority == 1) ? '__show_max' : (($variant->show_priority == 2) ? '__show_bussines' : '__show_standart') ?>"><?=$variant->show_priority ?></span></td>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <td><?=t('Появление в разделе «Отзывы» на странице услуг') ?></td>
                    <?php foreach ($variants as $variant): ?>
                        <td><div class="icon-svg  icon-svg-<?=($variant->on_reviews) ? 'check' : 'not-check' ?>  block-centered"></div></td>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <td><?=t('Информирование о специальных акциях на странице услуг') ?></td>
                    <?php foreach ($variants as $variant): ?>
                        <td><div class="icon-svg  icon-svg-<?=($variant->special_share) ? 'check' : 'not-check' ?>  block-centered"></div></td>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <td><?=t('Дополнительные разделы в профиле компании: «Почему нас выбирают» «Новости компании»') ?></td>
                    <?php foreach ($variants as $variant): ?>
                        <td><div class="icon-svg  icon-svg-<?=($variant->extra_sections_ch_n) ? 'check' : 'not-check' ?>  block-centered"></div></td>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <td><?=t('Дополнительные разделы  в профиле компании: «Акции», «Отзывы», «Наши клиенты»') ?></td>
                    <?php foreach ($variants as $variant): ?>
                        <td><div class="icon-svg  icon-svg-<?=($variant->extra_sections_sh_r_c) ? 'check' : 'not-check' ?>  block-centered"></div></td>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <td><?=t('Статистика и аналитика по посещениям и взаимодействию с потенциальными клиентами') ?></td>
                    <?php foreach ($variants as $variant): ?>
                        <td><div class="icon-svg  icon-svg-<?=($variant->statistics) ? 'check' : 'not-check' ?>  block-centered"></div></td>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <td><?=t('Информирование пользователей об обновлениях в профиле – на сайте, в рассылке, в соцсетях и месенджерах') ?></td>
                    <?php foreach ($variants as $variant): ?>
                        <td><div class="icon-svg  icon-svg-<?=($variant->update_info) ? 'check' : 'not-check' ?>  block-centered"></div></td>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <td><?=t('Размещение вакансий') ?></td>
                    <?php foreach ($variants as $variant): ?>
                        <td><div class="icon-svg  icon-svg-<?=($variant->vacancy_deploy) ? 'check' : 'not-check' ?>  block-centered"></div></td>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <td><?=t('Размещение объявлений о покупке или продаже Б/У оборудования') ?></td>
                    <?php foreach ($variants as $variant): ?>
                        <td><div class="icon-svg  icon-svg-<?=($variant->equipment_deploy) ? 'check' : 'not-check' ?>  block-centered"></div></td>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <td><?=t('Участие в коммерческих тендерах') ?></td>
                    <?php foreach ($variants as $variant): ?>
                        <td><div class="icon-svg  icon-svg-<?=($variant->on_tenders) ? 'check' : 'not-check' ?>  block-centered"></div></td>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <td><?=t('Стоимость ежегодного размещения') ?></td>
                    <?php foreach ($variants as $variant): ?>
                        <td><span class="text-decoration-through"><?=$variant->price ?> руб/год</span></td>
                    <?php endforeach; ?>
                </tr>
                <tr class="register-table__price-row">
                    <td><?=t('Специальная промо-цена') ?></td>
                    <?php foreach ($variants as $variant): ?>
                        <td><span class="register-table__price"><?=($variant->promo_price) ? $variant->promo_price : $variant->price ?> руб/год</span></td>
                    <?php endforeach; ?>
                </tr>
                <tr class="register-table__book-row">
                    <td></td>
                    <?php foreach ($variants as $variant): ?>
<!--                        <td><a href="#" id="--><?//=$variant->id ?><!-- " class="register-table__book  block-centered  button  button_--><?//=($variant->show_priority == 1) ? 'green" data-fancybox="" data-src="#max-package"' : 'blue" data-fancybox=""  data-src="#standart-package"'?><!--" data-modal="true">Заказать</a></td>-->
                        <td><a href="#" id="<?=$variant->id ?> " class="register-table__book  block-centered  button  button_<?=($variant->show_priority == 1) ? 'green" data-fancybox=""' : 'blue" data-fancybox=""'?>" data-modal="true"  data-src="#Package_<?=$variant->id ?>">Заказать</a></td>
                    <?php endforeach; ?>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="company-registration__item  register-descr  row">
            <div class="col-md-6">
                <div class="register-descr-box" style="background-image: url(/images/images/regist-descr-box-img1.jpg);">
                    <div class="register-descr-box__title"><?=t('Если у вас есть вопросы по профилям')?>:</div>
                    <div class="register-descr-box__item">
                        <i class="seller-window__fa-icon fa fa-phone" aria-hidden="true"></i>
                        <a href="tel:+88001234556"><?=t('позвоните')?> 8-800-123-45-56</a>
                    </div>
                    <div class="register-descr-box__item">
                        <div class="register-descr-box__icon  icon-svg icon-svg  icon-svg-messenger"></div>
                        <a href="#"><?=t('напиште нам в чат')?></a>
                    </div>
                    <div class="register-descr-box__item"></div>
                    <div class="register-descr-box__item">
                        <i class="seller-window__fa-icon fa fa-envelope" aria-hidden="true"></i>
                        <a href="mailto:mail@mail.ru">по e-mail mail@mail.ru</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="register-descr-box  register-descr-box_content" style="background-image: url(/images/images/regist-descr-box-img2.jpg);">
                    <p><?=t('А здесь мы рассказываем, почему мы не предлагаем так называемые «бесплатные» профили')?></p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- <div class="payment-result">
    <div class="container">
        <div class="row">
            <div class="col-md-6 block-centered">
                <div class="payment-result__content  content-text">
                    <p>В течение 15 минут Вам будет выслан счет на оплату годового профиля. Если у Вас возникнут вопросы, наши сотрудники всегда Вам помогут. Скажите по телефону  или напишите в письме код авторизации <span>12458987</span>.</p>
                </div>
                <div class="payment-result__seller  seller-window">
                    <a href="mailto:mail@mail.ru" class="seller-window__info  seller-window__info_payment"><i class="seller-window__fa-icon  color-light-grey  fa fa-envelope" aria-hidden="true"></i>E-mail: mail@mail.ru</a>
                    <a href="tel:+88001234567" class="seller-window__info  seller-window__info_payment"><i class="seller-window__fa-icon  color-light-grey  fa fa-phone" aria-hidden="true"></i>Тел.: 8-800-123-45-67</a>
                </div>
            </div>
        </div>
    </div>
</div> -->
</div>
<?php foreach ($variants as $variant): ?>
    <div class="header-popup  header-popup_buy_package" id="Package_<?=$variant->id ?>">
        <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times" aria-hidden="true"></i></button>
        <div class="choose-package">
            <div class="choose-package__title content-text">
                <h2>Вы выбрали вариант профиля: <span><?=$variant->name ?></span></h2>
                <h3>Выберите как вы хотите оплатить?</h3>
            </div>
            <div class="choose-package__pay-method  row  justify-content-around">
                <div class="choose-package__col  col-5  flex  flex-column  justify-content-between">
                    <div class="choose-package__img  img-wrap">
                        <img src="/images/images/choose-package-img3.png" alt="">
                    </div>
                    <a href="#" class="choose-package__btn  button button_blue button-events"  data-fancybox=""  id="<?=$variant->id?>Entity<?=CompanyInfo::TYPE_ENTITIY?>" data-src="#<?=$variant->id?>Entity"  data-modal="true" hidden="true"></a>
                    <a href="#" class="choose-package__btn  button button_blue button-events button-form-events"   data-price ="<?=$variant->price?>" data-type="<?=CompanyInfo::TYPE_ENTITIY?>" data-variant="<?=$variant->id?> "data-src="<?=$variant->id?>Entity"><?=t('Как юридическое лицо')?></a>
                </div>
                <div class="choose-package__col  col-5  flex  flex-column  justify-content-between">
                    <div class="choose-package__img  img-wrap">
                        <img src="/images/images/choose-package-img4.png" alt="">
                    </div>
                    <a href="#" class="choose-package__btn  button button_green"  data-fancybox="" id="<?=$variant->id?>Individual<?=CompanyInfo::TYPE_INDIVIDUAL?>" data-src="#<?=$variant->id?>Individual"  data-modal="true" hidden="true"></a>
                    <a href="#" class="choose-package__btn  button button_green button-form-events"  data-price ="<?=$variant->price?>" data-type="<?=CompanyInfo::TYPE_INDIVIDUAL?>" data-variant="<?=$variant->id?>"data-src="<?=$variant->id?>Individual"><?=t('Как физическое лицо')?></a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<div class="header-popup  header-popup_pay_form popuv-form-events">
    <?= $this->render('_company_regstration_form',['model'=>$model]) ?>
</div>
<div class="header-popup  header-popup_buy_package" id="payment-choise">
    <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times" aria-hidden="true"></i></button>
    <div class="choose-package">
        <div class="choose-package__title content-text">
            <h2>Вы выбрали вариант профиля: <span>Максимум</span></h2>
            <h3>Выберите как вы хотите оплатить?</h3>
        </div>
        <div class="choose-package__pay-method  row  justify-content-around">
            <div class="choose-package__col  col-5  flex  flex-column  justify-content-between">
                <div class="choose-package__img  img-wrap">
                    <img src="/images/images/choose-package-img3.png" alt="">
                </div>
                <a href="#" class="choose-package__btn  button button_blue payment-type-trigger-button"  data-fancybox-close="" hidden="true"></a>
                <a href="#" class="choose-package__btn  button button_blue payment-type-button"   data-type="<?=CompanyInfo::PAYMENT_ONLINE?>" data-fancybox-close=""><?=t('онлайн оплата')?></a>
            </div>
            <div class="choose-package__col  col-5  flex  flex-column  justify-content-between">
                <div class="choose-package__img  img-wrap">
                    <img src="/images/images/choose-package-img4.png" alt="">
                </div>
                <a href="#" class="choose-package__btn  button button_green payment-type-trigger-button" hidden="true" data-fancybox="" data-src="#thanks-for-payment" data-modal="true"></a>
                <a href="#" class="choose-package__btn  button button_green payment-type-button" data-type="<?=CompanyInfo::PAYMENT_BANKS?>"><?=t('оплата через банк')?></a>
            </div>
        </div>
    </div>
</div>
<div class="header-popup  header-popup_thanks" id="thanks-for-payment">
    <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times" aria-hidden="true"></i></button>
    <div class="banner  banner_register  banner_small" style="background-image: url(images/banner-img-register.jpg);">
        <div class="container">
            <div class="row">
                <div class="banner__content_register  content-text  col-xl-10  block-centered">
                    <h2>Спасибо, что выбрали Industry Hunter. Мы уверены, что вы сделали правильный выбор!    </h2>
                </div>
            </div>
            <!-- <button data-fancybox-close="" class="banner_btn_register  button  button_green  block-centered">Закрыть</button> -->
        </div>
    </div>
    <div class="payment-result">
        <div class="container">
            <div class="row">
                <div class="col-md-6 block-centered">
                    <div class="payment-result__content  content-text">
                        <p>В течение 15 минут Вам будет выслан счет на оплату годового профиля. Если у Вас возникнут вопросы, наши сотрудники всегда Вам помогут. Скажите по телефону  или напишите в письме код авторизации <span>12458987</span>.</p>
                    </div>
                    <div class="payment-result__seller  seller-window">
                        <a href="mailto:mail@mail.ru" class="seller-window__info  seller-window__info_payment"><i class="seller-window__fa-icon  color-light-grey  fa fa-envelope" aria-hidden="true"></i>E-mail: mail@mail.ru</a>
                        <a href="tel:+88001234567" class="seller-window__info  seller-window__info_payment"><i class="seller-window__fa-icon  color-light-grey  fa fa-phone" aria-hidden="true"></i>Тел.: 8-800-123-45-67</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$script = <<<JS
	var promo_code = $('.promo-code');
	promo_code.on('click',function(e) {
	    var promo_code_id = $(this).attr('id');
	    var input = $('.promo-code-input');
	    var value = input.val();
	    $.ajax({
	       type:'POST',
	       url:'/site/promo',
	       data:{promo:value},
	       success:function(data) {
	           if(success.true){
	               alert('active');
	           }
	           else{
	               alert('ne activniy');
	           }
	       }
	    })
	  
	});
	
	var payment_type = $('.payment-type-button');
		payment_type.on('click',function(e) {
	    var type = $(this).data('type');
	    $.ajax({
	       type:'POST',
	       url:'/site/payment-type',
	       data:{payment:type},
	    })
	     $('.payment-type-trigger-button').trigger('click');
	   
	  
	});
		$('.button-form-events').click(function() {
		    var _this = $(this);
		    var data_src =_this.data('src');
		    var data_price =_this.data('price');
		    var data_type = _this.data('type');
		    var data_variant = _this.data('variant');
		    $('.popuv-form-events').attr('id',data_src)
		    $('#'+data_src+data_type).trigger('click');
		    $('#span-price').html(data_price);
		    $('#registercompanyform-type').val(data_type);
		    $('#registercompanyform-company_variant_id').val(data_variant);
		});


JS;
$this->registerJs($script);

//?>
