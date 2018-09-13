<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\RegisterUser;
use yii\helpers\Json;

$model = new RegisterUser();

?>
    <div class="popup_windows_wrap  header-popup" id="enter_login1">
        <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times"
                                                                                     aria-hidden="true"></i></button>

        <div class="popup_win login popup_bg" id="enter_login">

            <div class="small_window">
                <div class="inner">
                    <div class="header-popup__small-window-title  content-text">
                        <h2>Недавно на IH? Присоединяйтесь</h2>
                    </div>
                    <?php $form = ActiveForm::begin([
                        'action' => '/site/registeruser',
                        'id' => 'registerFormUser',
                        'options' => ['class' => 'site_form'],
                        // 'enableClientValidation' => false,
                        // 'enableAjaxValidation' => true,
                    ]); ?>

                    <?= $form->field($model, 'login', [
                        'template' => "
				    		<div class='input-wrap'>\n
				    			<input type='text' id='registeruser-login' name='RegisterUser[login]' aria-required='true' placeholder='Логин' class='popup_input'>\n
								<i class='input-wrap__fa  fa fa-user' aria-hidden='true' data-toggle='tooltip'  data-placement='top' title='Будет Вашим логином для входа на платформу'></i>\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
                        // 'enableAjaxValidation' => true,
                    ])->textInput() ?>

                    <?= $form->field($model, 'email', [
                        'template' => "
				    		<div class='input-wrap'>\n
				    			<input type='text' id='registeruser-email' name='RegisterUser[email]' aria-required='true' placeholder='Email' class='popup_input'>\n
								<i class='input-wrap__fa  fa fa-envelope' aria-hidden='true' data-toggle='tooltip'  data-placement='top' title='Будет вашим логином для входа на платформу'></i>\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
                        // 'enableAjaxValidation' => true,
                    ])->textInput() ?>

                    <?= $form->field($model, 'password', [
                        'template' => "
				    		<div class='input-wrap'>\n
				    			<input type='password' id='registeruser-password' name='RegisterUser[password]' aria-required='true' placeholder='Пароль' class='popup_input'>\n
								<i class='input-wrap__fa fa fa-lock' aria-hidden='true' data-toggle='tooltip'  data-placement='top' title='Будет Вашим паролем для входа на платформу'></i>\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
                        // 'enableAjaxValidation' => true,
                    ])->passwordInput() ?>

                    <?= $form->field($model, 'repassword', [
                        'template' => "
				    		<div class='input-wrap'>\n
				    			<input type='password' id='registeruser-repassword' name='RegisterUser[repassword]' aria-required='true' placeholder='Подтверждение пароля' class='popup_input'>\n
								<i class='input-wrap__fa fa fa-unlock' aria-hidden='true' data-toggle='tooltip'  data-placement='top' title='Подтвердите пароль для входа на платформу'></i>\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
                        // 'enableAjaxValidation' => true,
                    ])->passwordInput() ?>

                    <div class="form_buttons  header-popup__reg-now-wrap">
                        <a id="open_modal" class="header-popup__reg-now button button_blue button_wide" data-fancybox=""
                           data-src="#login_step" data-modal="true" href="javascript:;"
                           style="display: none;">&nbsp;</a>
                        <button type="submit" id="open_modal2"
                                class="header-popup__reg-now  button  button_blue  button_wide">Зарегистрировать
                        </button>
                    </div>

                    <?= $form->field($model, 'agree', [
                        'template' => "
							<p class=\"help-block help-block-error\"></p>
			    			<div class=\"polytic\">
			    				<label class=\"polytic__ckeckbox-label checkbox-label\">
					    			<input type=\"hidden\" name=\"RegisterUser[agree]\" value=\"0\">
				    				<input type=\"checkbox\" id=\"registeruser-agree\" name=\"RegisterUser[agree]\" value=\"1\" class=\"checkbox-label__input-check\">
				    				<span class=\"checkbox-label__pseudo-check\"></span>
				    				<span class=\"polytic__content\">Я ознакомился с <a href=\"#\" target=\"_blank\">Пользовательским Соглашением</a> и <a href=\"#\" target=\"_blank\">Политикой Конфиденциальности</a> и даю согласие на обработку своих персональных данных</span>
			    				</label>
			    			</div>
			    		",
                        'enableAjaxValidation' => true,
                    ])->textInput() ?>

                    <?php ActiveForm::end(); ?>
                </div>

                <div class="popup_bottom centered_text">
                    <div class="login_soc_net centered_text">
                        Регистрация с помощью
                        <ul id="reg_soc" class="log_soc flex jcsa">
                            <li><a href="/site/socialreg?service=vkontakte" class="soc_popup1"></a></li>
                            <li><a href="/site/socialreg?service=facebook" class="soc_popup2"></a></li>
                            <li><a href="/site/socialreg?service=twitter" class="soc_popup4"></a></li>
                            <li><a href="/site/socialreg?service=linkedin_oauth2" class="soc_popup5"></a></li>
                            <li><a href="/site/socialreg?service=odnoklassniki" class="soc_popup6"></a></li>
                            <li><a href="/site/socialreg?service=mailru" class="soc_popup7"></a></li>
                            <li><a href="/site/socialreg?service=google" class="soc_popup3"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="sertificate-icons">
                <div class="text">Сертификаты безопасноти</div>
                <ul>
                    <li><a href="#"><img src="/images/sertificate-icon.png" alt=""></a></li>
                    <li><a href="#"><img src="/images/sertificate-icon.png" alt=""></a></li>
                    <li><a href="#"><img src="/images/sertificate-icon.png" alt=""></a></li>
                </ul>
            </div>
            <div class="login_testim">
                <?= $this->render('_nam_doveryayut') ?>
            </div>
        </div>
    </div>

<?php
    $session = Yii::$app->session;
    $UserInfo = unserialize($session->get('UserSocialInfo'));

    if ($UserInfo) {
        $session->remove('UserSocialInfo');
        $this->registerJs('
                var UserInfo = addValueToRegisterForm(' . Json::encode($UserInfo) . ');
                ');

    }

?>

<?php $this->registerJs('

    function addValueToRegisterForm(data) {
        //console.log(data);
        //open the third step
        var form = $("#registerFormUser");
        form.find("#open_modal").trigger("click");

        var login_step3 = $("#login_step3");
        login_step3.find("#userinfo-last_name").val(data.last_name);
        login_step3.find("#userinfo-first_name").val(data.first_name);
//        login_step3.find("#b_date_month").attr("value", 8).text("August");

    }
    
	var form = $("#registerFormUser");

	var st = false;

	form.on("submit", function(e){
		$.ajax({

			type: form.attr("method"),
			url: form.attr("action"),
			data: form.serializeArray(),
			success: function(data){
				if(data.status == 1){
					if(!st){
						var btn = form.find("#open_modal");
						btn.trigger("click");
						st = true;
					}
				} else {
					st = false;
					$.each(data, function(key, val) {
		            	form.yiiActiveForm("updateAttribute", key, [val]);
		          	});
				}
			}

		});
		
		return false;

	});

	$(".header-popup__btn-close").click(function(){
		st = false;
		st2 = false;
	});

'); ?>