<?php 

	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;
	use app\models\LoginForm;

	$model = new LoginForm();

?>
<div class="popup_windows_wrap  header-popup" id="header-popup">
			
	<div class="popup_win login popup_bg  header-popup__form-log-in" id="login">
		
			<div class="small_window">
				<div class="inner">
				<div class="header-popup__small-window-title  content-text">
					<h2>Уже есть личный кабинет?</h2>
				</div>
			    
				<?php $form = ActiveForm::begin([
					'action' => '/site/login',
			        'id' => 'loginFormUser',
			        'options' => ['class' => 'site_form'],
			    ]); ?>

					<?=$form->field($model, 'username', [
			    		'template' => "
				    		<div class='input-wrap'>\n
				    			<input type='text' id='loginform-username' name='LoginForm[username]' aria-required='true' placeholder='Логин или E-mail' class='popup_input'>\n
								<i class='input-wrap__fa  fa fa-user' aria-hidden='true' data-toggle='tooltip'  data-placement='top' title='Введите e-mail адрес или логин указанный при регистрации'></i>\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
			    		'enableAjaxValidation' => true,
			    	])->textInput() ?>

			    	<?=$form->field($model, 'password', [
			    		'template' => "
				    		<div class='input-wrap'>\n
				    			<input type='password' id='loginform-password' name='LoginForm[password]' aria-required='true' placeholder='Пароль' class='popup_input'>\n
								<i class='input-wrap__fa fa fa-lock' aria-hidden='true' data-toggle='tooltip'  data-placement='top' title='Введите пароль указанный при регистрации'></i>\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
			    		'enableAjaxValidation' => true,
			    	])->passwordInput() ?>

					<div class="form_buttons  header-popup__log-in">
						<button type="submit" class="button button_blue button_wide">Войти</button>
					</div>
					<div class="form_settings flex jcsb">
						<label class="checkbox-label">
							<input type="hidden" name="LoginForm[rememberMe]" value="0">
							<input type="checkbox" class="checkbox-label__input-check" name="LoginForm[rememberMe]" value="1" checked>
							<span class="checkbox-label__pseudo-check"></span>
							<span class="checkbox-label__content">Запомнить</span>
						</label>
						<div class="right"><a data-morphing="" id="morphing" data-src="#forgot_pass-popup" href="javascript:;">Забыли пароль?</a></div>

					</div>
					<div class="login_soc_net centered_text  header-popup__social-log">
						Войти с помощью
						<ul class="log_soc flex jcsa">
							<li><a href="/site/login?service=vkontakte" class="soc_popup1"></a></li>
							<li><a href="/site/login?service=facebook" class="soc_popup2"></a></li>
							<li><a href="/site/login?service=twitter" class="soc_popup4"></a></li>
							<li><a href="/site/login?service=linkedin_oauth2" class="soc_popup5"></a></li>
							<li><a href="/site/login?service=odnoklassniki" class="soc_popup6"></a></li>
							<li><a href="/site/login?service=mailru" class="soc_popup7"></a></li>
							<li><a href="/site/login?service=google" class="soc_popup3"></a></li>
						</ul>
					</div>
				<?php ActiveForm::end(); ?>
			</div>
			
			<div class="popup_bottom centered_text  header-popup__reg">
				<button class="header-popup__reg-btn  button  button_green"  data-fancybox="" data-src="#enter_login1" data-modal="true">Регистрация</button>
			</div>
		</div>
		<div class="login_testim">
			<?=$this->render('_nam_doveryayut') ?>
		</div>		
	</div>
</div>

<?=$this->render('_forgot_pass') ?>