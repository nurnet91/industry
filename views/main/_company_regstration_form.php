<button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times" aria-hidden="true"></i></button>
<?php use yii\widgets\ActiveForm;

$form = ActiveForm::begin(
    [
        'options'=>['class'=>'register-form-box active-form-company registerCompanyForm site_form'],
        'action'=>'/site/company-session',
        'method'=>'post',
    ]
);
?>
<div class="register-form-box__price">
    <div><?=t('Стоимость профиля на год')?>:</div>
    <span id="span-price"><i class="fa fa-rub" aria-hidden="true"></i></span>
</div>

<div class="register-form-box__promo">
    <?=t('Если у Вас есть промо-код, введите его здесь')?>
    <div class="register-form-box__promo-wrap  flex">
        <input type="text" class="register-form-box__promo-input  input promo-code-input" name="RegisterCompanyForm[promo_code]">
        <a href="#" class="register-form-box__promo-icon-wrap promo-code">
            <div class="register-form-box__promo-icon  icon-svg-reload-white"></div>
        </a>
        <div class="register-form-box__promo-check  icon-svg-check  icon-svg-check_small"></div>
    </div>
</div>
<div class="register-form-box__main-inputs">


    <?= $form->field($model, 'last_name', [
        'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
								<i class='input-wrap__fa  fa fa-user' aria-hidden='true' data-toggle='tooltip'  data-placement='top'></i>\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
        // 'enableAjaxValidation' => true,
    ])->textInput(['placeholder'=>t('Фамилия').'*','class'=>'popup_input']) ?>
    <?= $form->field($model, 'first_name', [
        'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
        // 'enableAjaxValidation' => true,
    ])->textInput(['placeholder'=>t('Имя').'*','class'=>'popup_input']) ?>
    <?= $form->field($model, 'middle_name', [
        'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
						
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
        // 'enableAjaxValidation' => true,
    ])->textInput(['placeholder'=>t('Отчество').'*','class'=>'popup_input']) ?>

    <?= $form->field($model, 'name', [
        'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
        // 'enableAjaxValidation' => true,
    ])->textInput(['placeholder'=>t('Название компании').'*','class'=>'popup_input']) ?>

    <?= $form->field($model, 'inn', [
        'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
								<i class='input-wrap__fa  fa fa-address-book' aria-hidden='true' data-toggle='tooltip'  data-placement='top'></i>\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
        // 'enableAjaxValidation' => true,
    ])->textInput(['placeholder'=>t('ИНН компании').'*','class'=>'popup_input']) ?>
    <?= $form->field($model, 'phone', [
        'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
								<i class='input-wrap__fa  fa fa-phone' aria-hidden='true' data-toggle='tooltip'  data-placement='top'></i>\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
        // 'enableAjaxValidation' => true,
    ])->textInput(['placeholder'=>t('Номер телефона').'*','class'=>'popup_input']) ?>

<!--    <div class="register-form-box__main-input">-->
<!--        --><?//=$form->field($model,'email')->textInput(['placeholder'=>t('E-mail').'*','id'=>$id.'-email','class'=>'popup_input form-control'])->label(false);?>
<!--        <i class="register-form-box__fa  fa fa-envelope" aria-hidden="true"></i>-->
<!--    </div>-->
<!--    -->
    <?= $form->field($model, 'email', [
        'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
								<i class='input-wrap__fa  fa fa-envelope' aria-hidden='true' data-toggle='tooltip'  data-placement='top'></i>\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
    ])->textInput(['placeholder'=>t('Е-маил').'*','class'=>'popup_input']) ?>
    <div class="register-form-box__main-input">
        <?=$form->field($model,'comment')->textarea(['placeholder'=>t('Комментарии').'*','class'=>'popup_input'])->label(false);?>
        <i class="register-form-box__fa  register-form-box__fa_textarea  fa fa-commenting" aria-hidden="true"></i>
    </div>
        <?=$form->field($model,'type')->hiddenInput()->label(false);?>
        <?=$form->field($model,'company_variant_id')->hiddenInput(['class'=>'popup_input'])->label(false);?>

</div>
<div class="register-form-box__btns  flex  justify-content-center">
    <button  hidden="true" data-fancybox="" data-src='#payment-choise' data-modal="true"  class='register-form-box__btn  button  button_blue button-form'><?=t('Отправить')?></button>
    <?=\yii\helpers\Html::submitButton(t('Отправить'),['class'=>'register-form-box__btn button_blue button  button-register-form'])?>
    <button  data-fancybox-close="" class="register-form-box__btn  register-form-box__btn_back  btn  btn-clear"><?=t('Назад')?></button>
</div>
<!--<label class="register-form-box__label  checkbox-label">-->
<!--     --><?//= $form->field($model,'checkbox')->checkbox(['class'=>'checkbox-label__input-check offerts-checkbox', 'id'=>$id.'-checkbox'])->label(false)?>
<!--    <span class="checkbox-label__pseudo-check"></span>-->
<!--    <span class="checkbox-label__content  checkbox-label__content_agree">--><?//=t('Нажимая кнопку отправить я подтверждаю согласие с ')?><!--<a href="#">--><?//=t('договором оферты')?><!--</a></span>-->
<!--</label>-->
<!--    --><?//= $form->field($model, 'checkbox', [
//        'template' => "
//                    <p class='help-block help-block-error'></p>
//                    <label class=\"register-form-box__label  checkbox-label\">
//                      <input type=\"hidden\" name=\"RegisterCompanyForm[checkbox]\" value=\"0\">
//                        <input type='checkbox' id='".$id."-checkbox' name='RegisterCompanyForm[checkbox]' aria-required='true'  value='1' class='checkbox-label__input-check offerts-checkbox'>\n
//                      <span class=\"checkbox-label__pseudo-check\"></span>
//                      <span class=\"checkbox-label__content  checkbox-label__content_agree\">".t('Нажимая кнопку отправить я подтверждаю согласие с ')."<a href=\"#\">".t('договором оферты')."</a></span>
//                    </label>
//			    		",
//     'enableAjaxValidation' => true,
//    ])->textInput() ?>
<?= $form->field($model, 'agree', [
    'template' => "
							<p class=\"help-block help-block-error\"></p>
			    			<div class=\"polytic\">
			    				<label class=\"polytic__ckeckbox-label checkbox-label\">
					    			<input type=\"hidden\" name=\"RegisterCompanyForm[agree]\" value=\"0\">
				    				<input type=\"checkbox\" id=\"registercompanyform-agree\" name=\"RegisterCompanyForm[agree]\" value=\"1\" class=\"checkbox-label__input-check\">
				    				<span class=\"checkbox-label__pseudo-check\"></span>
				    				<span class=\"checkbox-label__content  checkbox-label__content_agree\">".t('Нажимая кнопку отправить я подтверждаю согласие с ')."<a href=\"#\">".t('договором оферты')."</a></span>
			    				</label>
			    			</div>
			    		",
    'enableAjaxValidation' => true,
])->textInput() ?>
<div class="register-form-box__foot">
    <?=t(' Если у вас возникли вопросы, позвоните прямо сейчас')?><a href="#">8-800-123-45-67  </a>
</div>
<?php ActiveForm::end();

?>

<?php
$script = <<<JS

    var submited = false;
    $('.registerCompanyForm').on("beforeSubmit", function(event, jqXHR, settings){
        var id = $(this).attr('id'), _this = $(this);
        form_info = $('#'+id);
	      if (submited == false )
        {
            $('div .form-group .has-error').find('register-form-box__fa').css({'padding-bottom':'30px;!important'})
            submited = true;
		$.ajax({
			type: form_info.attr("method"),
			url: form_info.attr("action"),
			data: form_info.serializeArray(),
			success: function(data){
				if(data.status == 1){
				    var button = $('.button-form');
				    _this.find(button).trigger('click');
				    form_info[0].reset()
				} else {
					$.each(data, function(key, val) {
					    
		            	form_info.yiiActiveForm("updateAttribute", key, [val]);
		            	
		          	});
				}
			}
		});
		submited = false;
    }}).on('submit', function(e)
    {
        e.preventDefault();
    });
    $('div .has-error').find('.register-form-box__fa').css('padding:bottom','30px');
      //   var button = $('.button-register-form');
      //   $('input[type=checkbox]').click(function() {
      //     if($(this).prop('checked') == true)
      //     {
      //       button.removeAttr('disabled');
      //       button.addClass('button_blue');
      //     }
      //   else{
      //       button.attr('disabled',true);
      //       button.removeClass('button_blue');
      //     }
      // });
   
      

JS;


$this->registerJs($script);

?>
