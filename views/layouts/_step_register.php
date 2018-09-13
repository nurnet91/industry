<?php

use app\models\Categories;
use app\models\Countries;
use app\models\Directions;
use app\models\Interests;
use app\models\Referals;
use app\models\Userinfo;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
	

$categories = Directions::find()->all();;

$referals = Referals::allList();

$countries = Countries::selectList();

$model = new Userinfo();

$interests = new Interests();

?>
<div class="popup_windows_wrap  header-popup" id="login_step">
	<button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times" aria-hidden="true"></i></button>

	<?php $form = ActiveForm::begin([
		'action' => '/site/registeruserinfo',
        'id' => 'login_step3',
        'options' => ['class' => 'popup_win login in bg_white'],
        // 'enableClientValidation' => false,
        // 'enableAjaxValidation' => true,
    ]); ?>
		
		<div class="last_step">
			<div class="step_banner background" style="background-image: url(/images/step_03_bg.jpg);">
				<div class="step_banner__content  text_box centered_text">
					<h2>Спасибо, что выбрали Industry Hunter</h2>
					<p>Мы уверены, что вы сделали правильный выбор!</p>
					<p>Поделитесь со своими друзьями <br> новостью о регистрации:</p>
					<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,gplus,twitter,linkedin,telegram"></div>
				</div>
			</div>
			
			<div class="popup__title content-text">
				<h3>Для более продуктивной работы <br> на Industry Hunter расскажите нам о себе.</h3>
				<h2>Я интересуюсь</h2>
			</div>
			<div class="choise_box  choise_box_popup">
				<ul class="flex">
					<?php if (!empty($categories)): ?>
						<?php foreach ($categories as $category): ?>
                        <?php if (!empty($category->subs)): ?>
							<li>
								<div class="choise-box  h3">
									<div class="choise-box__in">
										<label class="choise-box__check  checkbox-label">
											<input type="checkbox" class="checkbox-label__input-check  select_all_branches">
											<span class="checkbox-label__pseudo-check"></span>
											<span class="checkbox-label__content"><?=$category->name ?></span>
										</label>
										<i class="choise-box__caret  fa fa-caret-down"></i>
									</div>
								</div>
								<div class="site_form hidden">
									<?php if (!empty($category->subs)): ?>
										<?php foreach ($category->subs as $catsub): ?>

											<label class="choise-box__check-in  checkbox-label">
												<input type="checkbox" class="checkbox-label__input-check  check_branch" name="Userinfo[cats_ids][<?= $catsub->theme->id ?>]" value="<?=$catsub->theme->id ?>">
												<span class="checkbox-label__pseudo-check"></span>
												<span class="checkbox-label__content-in"><?=$catsub->theme->name ?></span>
											</label>

										<?php endforeach ?>
									<?php endif ?>
								</div>
							</li>
                            <?php endif ?>
                        <?php endforeach ?>
					<?php endif ?>
				</ul>
			</div>
			<div class="popup__check-list  simple-check-list">
				<div class="row  justify-content-between">
					<div class="simple-check-list__col  col-md-4 col-xl-3">
						<label class="choise-box__check  checkbox-label">
							<input type="hidden" name="Userinfo[info_inform]" value="0">
							<input type="checkbox" class="checkbox-label__input-check" name="Userinfo[info_inform]" value="1">
							<span class="checkbox-label__pseudo-check"></span>
							<span class="checkbox-label__content">Информация</span>
						</label>
					</div>

					<div class="simple-check-list__col  col-md-4 col-xl-5">
						<label class="choise-box__check  checkbox-label">
							<input type="hidden" name="Userinfo[info_special]" value="0">
							<input type="checkbox" class="checkbox-label__input-check" name="Userinfo[info_special]" value="1">
							<span class="checkbox-label__pseudo-check"></span>
							<span class="checkbox-label__content">Специальные предложения</span>
						</label>
					</div>

					<div class="simple-check-list__col  col-md-4 col-xl-4">
						<label class="choise-box__check  checkbox-label">
							<input type="hidden" name="Userinfo[info_offer]" value="0" name="Userinfo[info_offer]" value="1">
							<input type="checkbox" class="checkbox-label__input-check">
							<span class="checkbox-label__pseudo-check"></span>
							<span class="checkbox-label__content">Я сам готов предлагать услуги своей компании</span>
						</label>
					</div>
				</div>
			</div>
			<section class="personal_info in">
				<div class="personal_info__title  content-text">
					<h3 class="centered_text">Персональная информация</h3>
				</div>
				<div class="row">
					<label class="personal_info__label  col-md-4">
						<?=$form->field($model, 'first_name', [
				    		'template' => "
				    			<span class=\"personal_info__name  personal_info__name_important\">Фамилия</span>\n
				    			<input type=\"text\" id='userinfo-first_name' name='Userinfo[first_name]' aria-required='true' placeholder=\"Ваша Фамилия\" class=\"personal_info__input\">\n
								<p class='help-block help-block-error'></p>
				    		",
				    		// 'enableAjaxValidation' => true,
				    	])->textInput() ?>
					</label>
					<label class="personal_info__label  col-md-4">
						<?=$form->field($model, 'last_name', [
				    		'template' => "
				    			<span class=\"personal_info__name  personal_info__name_important\">Имя</span>\n
				    			<input type=\"text\" id='userinfo-last_name' name='Userinfo[last_name]' aria-required='true' placeholder=\"Ваше имя\" class=\"personal_info__input\">\n
								<p class='help-block help-block-error'></p>
				    		",
				    		// 'enableAjaxValidation' => true,
				    	])->textInput() ?>
					</label>
					<label class="personal_info__label  col-md-4">
						<?=$form->field($model, 'middle_name', [
				    		'template' => "
				    			<span class=\"personal_info__name\">Отчество</span>\n
				    			<input type=\"text\" id='userinfo-middle_name' name='Userinfo[middle_name]' aria-required='true' placeholder=\"Ваше отчество\" class=\"personal_info__input\">\n
								<p class='help-block help-block-error'></p>
				    		",
				    		// 'enableAjaxValidation' => true,
				    	])->textInput() ?>
					</label>
				</div>
				<div class="row  useful-info">
					<div class="useful-info__col  col-md-4">
						<label><span class="personal_info__name">Дата рождения</span></label>
						<div class="clear">
							<div class="input-wrap  input-wrap_number  input-wrap_day">
								<div class="input-wrap__btn  input-wrap__btn_plus"><i class="fa fa-angle-up" aria-hidden="true"></i></div>
								<input type="number" class="input  input_number  personal_info__input" value="1" name="Userinfo[day]">
								<div class="input-wrap__btn  input-wrap__btn_minus"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
							</div>
							<select class="select  select_sub auto_width no_clear" name="Userinfo[month]">
								<?php foreach (monthsList() as $key => $value): ?>
									<option id="b_date_month" value="<?=$key ?>"><?=$value ?></option>
								<?php endforeach ?>
							</select>
							<select class="select  select_sub auto_width no_clear" name="Userinfo[year]">
								<?php for ($year = 2010; $year >= 1970; $year--): ?>
									<option value="<?=$year ?>"><?=$year ?></option>
								<?php endfor ?>
							</select>
						</div>
						<div class="site_form_note">
							Мы обязательно поздравим Вас с днем рождения!
						</div>
					</div>
					<div class="useful-info__col  col-md-4 col-sm-6">
						<label><span class="personal_info__name">Откуда Вы узнали о нас?</span></label>
						<select class="select  select_sub" name="Userinfo[referal_id]">
							<option value="0">Выбрать</option>
							<?php if (!empty($referals)): ?>
								<?php foreach ($referals as $key => $value): ?>
									<option value="<?=$key ?>"><?=$value ?></option>
								<?php endforeach ?>
							<?php endif ?>
						</select>	
					</div>

				</div>
					<div class="row">
						<div class="useful-info__col  col-xl-3 col-md-4">
							<?=$form->field($model, 'country', [
					    		'template' => "
					    			<label> <span class=\"personal_info__name  personal_info__name_important\">Страна</span></label>\n
									{input}
									<p class='help-block help-block-error'></p>
					    		",
					    		// 'enableAjaxValidation' => true,
					    	])->dropDownList($countries, ['class' => 'select select_sub', 'prompt' => 'Страна']) ?>							
						</div>
						<div class="useful-info__col  col-xl-3 col-md-4">
							<?=$form->field($model, 'region', [
					    		'template' => "
					    			<label><span class=\"personal_info__name  personal_info__name_important\">Город</span></label>\n
									{input}
									<p class='help-block help-block-error'></p>
					    		",
					    		// 'enableAjaxValidation' => true,
					    	])->dropDownList([], ['class' => 'select select_sub', 'prompt' => 'Город']) ?>
						</div>
						<div class="useful-info__col  col-xl-3 col-md-4">
							<?=$form->field($model, 'company', [
					    		'template' => "
					    			<span class=\"personal_info__name\">Компания</span>\n
					    			<input type=\"text\" id='userinfo-company' name='Userinfo[company]' aria-required='true' placeholder=\"Название\" class=\"personal_info__input\">\n
									<p class='help-block help-block-error'></p>
					    		",
					    		// 'enableAjaxValidation' => true,
					    	])->textInput() ?>							
						</div>
						<div class="useful-info__col  col-xl-3 col-md-4">
							<?=$form->field($model, 'position', [
					    		'template' => "
					    			<span class=\"personal_info__name\">Должность</span>\n
					    			<input type=\"text\" id='userinfo-position' name='Userinfo[position]' aria-required='true' placeholder=\"Кем работаете в компании\" class=\"personal_info__input\">\n
									<p class='help-block help-block-error'></p>
					    		",
					    		// 'enableAjaxValidation' => true,
					    	])->textInput() ?>	
						</div>
					</div>
			</section>
			<button class="header-popup__form-submit  button  button_blue  block-centered"> Отправить </button>
			<div class="pink_section">
				<div class="text_box">
					В знак признательности за то, что Вы заполнили все поля,<br/>мы дарим Вам <a href="#">автомобиль</a>
				</div>
			</div>
		</div>
	<?php ActiveForm::end(); ?>
</div>

<?php $this->registerJs('
	var form_info = $("#login_step3");

	var st_info = false;

	form_info.on("submit", function(e){

		$.ajax({

			type: form_info.attr("method"),
			url: form_info.attr("action"),
			data: form_info.serializeArray(),
			success: function(data){
			    console.log(data);
				if(data.status == 1){
					if(!st_info){
						st_info = true;
						window.location.href = "/";
					}
				} else {
					st_info = false;
					$.each(data, function(key, val) {
		            	form_info.yiiActiveForm("updateAttribute", key, [val]);
		          	});
				}
			}

		});
		
		return false;

	});

	$(".header-popup__btn-close").click(function(){
		st_info = false;
	});

	var country = $("#userinfo-country");

	var region = $("#userinfo-region");

	if(country.length > 0 && region.length > 0){

		country.change(function(){

			$.ajax({
				url: "/site/regions/"+$(this).val(),
				type: "get",
				dataType: "html",
				success: function(data){
					region.html(data);
					region.niceSelect("update");
				}
			});

		});

	}

') ?>