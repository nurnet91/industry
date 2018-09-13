<?php use app\models\Countries;
use app\models\Regions;
use yii\widgets\ActiveForm;
$company = $model->companyinfo;
$countries = Countries::selectList();
$regions = Regions::findByCountry($model->country->id);
$forms = new \app\models\CompanyInfoForm();
?>
<div class="instruction">
    <div class="container">
        <a href="#" class="instruction__link">Краткая инструкция по работе с кабинетом компании</a>
    </div>
</div>
<div class="company-office">

    <div class="container">
        <div class="company-office__section  company-office__row  row">
            <button class="company-office__btn-menu  company-office__btn-menu_call  animated  pulse_bigger  infinite"><i class="fa fa-bars" aria-hidden="true"></i></button>
            <?=
            $this->render('_sidebar',['active'=>'profile']);
            ?>
            <div class="company-office-content  col-md-8  col-lg-9">
                <div class="company-profile-box  background-color-white">
                    <div class="company-profile-box__content  content-text">
                        <h2><?=$company->name?>
                            <?php if($model->id == Yii::$app->user->id ):?>
                                <sup><button class="edit"  data-fancybox="" data-src="#edit_company_info" data-modal="true" data-toggle="tooltip" data-placement="top" title="Нажав на данный значок вы можете редактировать графу, которой он принадлежит"><i class="fa fa-pencil-square-o  color-blue" aria-hidden="true"></i></button></sup>
                                <div class="header-popup  header-popup_pay_form" id="edit_company_info">
                                    <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times" aria-hidden="true"></i></button>

                                    <?php $form = ActiveForm::begin([
                                        'action' => '/company/edit-company-info',
                                        'id' => 'info_edit_form',
                                        'options' => ['class' => 'register-form-box']])
                                    ?>

                                    <div class="register-form-box__foot">
                                        <?=t('Редактирование данных профиля.')?>
                                    </div><br/>
                                    <div class="register-form-box__main-inputs">


                                        <?= $form->field($forms, 'last_name', [
                                            'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
								<i class='input-wrap__fa  fa fa-user' aria-hidden='true' data-toggle='tooltip'  data-placement='top'></i>\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
                                            // 'enableAjaxValidation' => true,
                                        ])->textInput(['placeholder'=>t('Фамилия').'*','class'=>'popup_input','value'=>$company->last_name]) ?>
                                        <?= $form->field($forms, 'first_name', [
                                            'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
                                            // 'enableAjaxValidation' => true,
                                        ])->textInput(['placeholder'=>t('Имя').'*','class'=>'popup_input','value'=>$company->first_name]) ?>
                                        <?= $form->field($forms, 'middle_name', [
                                            'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
						
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
                                            // 'enableAjaxValidation' => true,
                                        ])->textInput(['placeholder'=>t('Отчество').'*','class'=>'popup_input','value'=>$company->middle_name]) ?>

                                        <?= $form->field($forms, 'name', [
                                            'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
                                            // 'enableAjaxValidation' => true,
                                        ])->textInput(['placeholder'=>t('Название компании').'*','class'=>'popup_input','value'=>$company->name]) ?>

                                        <?= $form->field($forms, 'inn', [
                                            'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
								<i class='input-wrap__fa  fa fa-address-book' aria-hidden='true' data-toggle='tooltip'  data-placement='top'></i>\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
                                            // 'enableAjaxValidation' => true,
                                        ])->textInput(['placeholder'=>t('ИНН компании').'*','class'=>'popup_input','value'=>$company->inn]) ?>
                                        <?= $form->field($forms, 'phone', [
                                            'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
								<i class='input-wrap__fa  fa fa-phone' aria-hidden='true' data-toggle='tooltip'  data-placement='top'></i>\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
                                            // 'enableAjaxValidation' => true,
                                        ])->textInput(['placeholder'=>t('Номер телефона').'*','class'=>'popup_input','value'=>$company->phone]) ?>

                                        <!--    <div class="register-form-box__main-input">-->
                                        <!--        --><?//=$form->field($model,'email')->textInput(['placeholder'=>t('E-mail').'*','id'=>$id.'-email','class'=>'popup_input form-control'])->label(false);?>
                                        <!--        <i class="register-form-box__fa  fa fa-envelope" aria-hidden="true"></i>-->
                                        <!--    </div>-->
                                        <!--    -->
                                        <?= $form->field($forms, 'email', [
                                            'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
								<i class='input-wrap__fa  fa fa-envelope' aria-hidden='true' data-toggle='tooltip'  data-placement='top'></i>\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
                                        ])->textInput(['placeholder'=>t('Е-маил').'*','class'=>'popup_input','value'=>$model->email]) ?>
                                    </div>
                                    <div class="register-form-box__btns  flex  justify-content-center">
                                        <button type="submit" class="register-form-box__btn  button  button_blue"><?=t('Сохранить')?></button>
                                        <button  data-fancybox-close="" class="register-form-box__btn  register-form-box__btn_back  btn  btn-clear"><?=t('Назад')?></button>
                                    </div>
                                    <?php ActiveForm::end() ?>
                                </div>
                            <?php endif;?>  </h2>
                    </div>
                    <div class="text"><?=$model->getMaps()?>  <?php if($model->id == Yii::$app->user->id ):?>
                                <sup><button class="edit"  data-fancybox="" data-src="#editUserRegion" data-modal="true" data-toggle="tooltip" data-placement="top" title="Нажав на данный значок вы можете редактировать графу, которой он принадлежит"><i class="fa fa-pencil-square-o  color-blue" aria-hidden="true"></i></button></sup>
                                <div class="header-popup  header-popup_pay_form" id="editUserRegion">
                                    <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times" aria-hidden="true"></i></button>

                                    <?php $form = ActiveForm::begin([
                                        'action' => '/company/user-update',
                                        'options' => ['class' => 'register-form-box']])
                                    ?>
                                    <?= $form->field($model, 'country_id', [

                                        'template' => '
                            <div class="register-form-box__main-input">
                                {input}{error}
                                <i class="register-form-box__fa  fa" aria-hidden="true"></i>
                            </div>'

                                    ])->dropDownList($countries, ['class' => 'select select_sub', 'name' => 'Users[country_id]', 'value' => $model->country->id]) ?>

                                    <?= $form->field($model, 'region_id', [

                                        'template' => '
                            <div class="register-form-box__main-input">
                                {input}{error}
                                <i class="register-form-box__fa  fa" aria-hidden="true"></i>
                            </div>'

                                    ])->dropDownList([$regions], ['class' => 'select select_sub', 'name' => 'Users[region_id]', 'value' => $model->region->id,
                                        'options' => [
                                            $model->region->id => ['selected' => true]]
                                    ])?>
                                    <div class="register-form-box__btns  flex  justify-content-center">
                                        <button type="submit" class="register-form-box__btn  button  button_blue"><?=t('Сохранить')?></button>
                                        <button  data-fancybox-close="" class="register-form-box__btn  register-form-box__btn_back  btn  btn-clear"><?=t('Назад')?></button>
                                    </div>
                                </div>

                                <?php ActiveForm::end() ?>
                            <?php endif;?></div>

                    </div>

                    <div class="row  justify-content-md-center  justify-content-lg-start">
                        <div class="company-profile-box__content  col-lg-8  content-text">

                            <?php if(empty($company->annotation)): ?>
                            <sup><button class="btn btn-success"  data-fancybox="" data-src="#update-annotation" data-modal="true">Добавить описание</button></sup>
                            <?php else: ?>
                                <sup><button class="edit" data-fancybox="" data-src="#update-annotation" data-modal="true" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o  color-blue" aria-hidden="true"></i></button></sup>
                            <?php endif; ?>
                            <p><?= $company->annotation ?></p>
                            <div class="header-popup  header-popup_pay_form" id="update-annotation">
                                <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times" aria-hidden="true"></i></button>

                                <?php $form = ActiveForm::begin([
                                    'action' => '/company/update-company-info',
                                ])?>

                                <?=$form->field($company,'annotation')->textarea(['rows' => 6, 'placeholder' => '400 знаков с пробелами*'])?>

                                <div class="register-form-box__btns  flex  justify-content-center">
                                    <button type="submit" class="button  button_blue"><?=t('Сохранить')?></button>
                                    <button  data-fancybox-close="" class="register-form-box__btn  register-form-box__btn_back  btn  btn-clear"><?=t('Назад')?></button>
                                </div>

                                <?php ActiveForm::end()?>

                            </div>
<!--                            <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях.-->
<!--                            </p>-->
<!--                            <p>При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце.</p>-->
                        </div>

                        <div class="col-md-8  col-lg-4">
                            <div class="company-profile-box__img-wrap  img-wrap">
                                <?php if(!empty($company->photo)):?>
                                    <img src="/<?=$company->photo ?>">
                                <?php else:?>
                                    <img src="<?=noPhotoSrc() ?>">
                                <?php endif;?>
                                <button class="company-profile-box__edit  edit  position-top-right" id="ImageFileButton" title="Нажав на данный значок вы можете редактировать графу, которой он принадлежит"><i class="fa fa-pencil-square-o  color-blue" style="background: #fff;" aria-hidden="true"></i></button>
                                <?php $form = ActiveForm::begin([
                                    'action' => '/company/update-company-info',
                                ])?>
                                   <?=$form->field($company,'imageFile')->fileInput(['hidden'=>true, 'id'=>'ImageFileEvent'])?>
                                   <button class="trigger-button" hidden="true"></button>
                                <?php ActiveForm::end()?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?=$this->render('_categories',['model'=>$model, 'directions'=>$directions])?>

</div>

<?php
$js =<<<JS
$('#ImageFileButton').click(function(){
    $('#ImageFileEvent').trigger('click').change(function() {
      $('.trigger-button').trigger('click');
    });
});

    var country = $("#users-country_id");

	var region = $("#users-region_id");

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
JS;
$this->registerJs($js)



?>
