<?php


use yii\widgets\ActiveForm;

$company = $model->companyinfo;
$forms = new \app\models\CompanyInfoForm();
?>

<div class="instruction">
    <div class="container">
        <a href="#" class="instruction__link"><?=t('Краткая инструкция по работе с кабинетом компании')?></a>
    </div>
</div>
<div class="company-office">
    <div class="company-office__container  container">
        <div class="company-office__row  row">
            <button class="company-office__btn-menu  company-office__btn-menu_call  animated  pulse_bigger  infinite"><i class="fa fa-bars" aria-hidden="true"></i></button>
            <?=
                $this->render('_sidebar',['active'=>'index']);
            ?>
            <div class="company-office-content  col-md-8  col-lg-9  block-margin-adaptive">
                <div class="company-office__name  content-text">
                    <div class="company-office__name-top  flex  justify-content-between  align-items-center">
                        <div class="text  color-light-grey"><?=t('На IH: с')?> <?= ' '.Yii::$app->formatter->asDate($company->created_at,'d/M/Y')?></div>
                        <div class="text  flex  color-light-grey"><div class="company-office__icon-reload  icon icon_reload">img-tag-can-be-here</div><?=Yii::$app->formatter->asDate($model->last_visit,'m:s, d/M/Y')?></div>
                    </div>
                    <h2>ООО "<?=$company->name?>"</h2>
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
                    <?php endif;?>
                </div>
                <div class="company-office-content__item  row">
                    <div class="company-office-content__col  col-lg-7  col-xl-8">
                        <div class="company-info  company-info_background  company-info_background_phone  background-color-white">
                            <div class="company-office__content  content-text">
                                <h3><?=t('Контакты для связи со специалистами Industry Hunter')?></h3>
                                <p><?=t('Наши специалисты готовы помочь вам по любым возникающим вопросам. Просто позвоните или напишите')?>!</p>
                            </div>
                            <div class="row">
                                <div class="company-office__window  seller-window  gutters">
                                    <div class="seller-window__title  text-weight-bold"><?=t('Общие контакты')?></div>
                                    <div class="seller-window__info  text"><i class="seller-window__fa-icon  color-light-blue  fa fa-user" aria-hidden="true"></i><?=$company?></div>
                                    <a href="tel:+998981212120" class="seller-window__info  text"><i class="seller-window__fa-icon  color-light-blue  fa fa-phone" aria-hidden="true"></i><?=$company->phone?></a>
                                    <a href="mailto:" class="seller-window__info  text"><i class="seller-window__fa-icon  color-light-blue  fa fa-envelope" aria-hidden="true"></i><?=$model->email?></a>
                                </div>
                                <div class="company-office__window  seller-window  gutters">
                                    <div class="seller-window__title  text-weight-bold"><?=t('По техническим вопросам')?></div>

                                    <div class="seller-window__info  text"><i class="seller-window__fa-icon  color-light-blue  fa fa-user" aria-hidden="true"></i><?=$company->technicalInfoFio?></div>
                                    <a href="tel:+998981212120" class="seller-window__info  text"><i class="seller-window__fa-icon  color-light-blue  fa fa-phone" aria-hidden="true"></i><?=$company->technicalInfoNumber?></a>
                                    <a href="mailto:" class="seller-window__info  text"><i class="seller-window__fa-icon  color-light-blue  fa fa-envelope" aria-hidden="true"></i><?=$company->technicalInfoEmail?></a>
                                </div>
                                <div class="company-office__window  seller-window  gutters">
                                    <div class="seller-window__title  text-weight-bold"><?=t('По вопросам сотрудничества')?></div>
                                    <div class="seller-window__info  text"><i class="seller-window__fa-icon  color-light-blue  fa fa-user" aria-hidden="true"></i><?=$company->cooperationInfoFio?></div>
                                    <a href="tel:+998981212120" class="seller-window__info  text"><i class="seller-window__fa-icon  color-light-blue  fa fa-phone" aria-hidden="true"></i><?=$company->cooperationInfoNumber?></a>
                                    <a href="mailto:" class="seller-window__info  text"><i class="seller-window__fa-icon  color-light-blue  fa fa-envelope" aria-hidden="true"></i><?=$company->cooperationInfoEmail?></a>
                                </div>
                                <?php if($model->id == Yii::$app->user->id ):?>
                                    <sup><button class="edit"  data-fancybox="" data-src="#edits" data-modal="true" data-toggle="tooltip" data-placement="top" title="Нажав на данный значок вы можете редактировать графу, которой он принадлежит"><i class="fa fa-pencil-square-o  color-blue" aria-hidden="true"></i></button></sup>
                                    <div class="header-popup  header-popup_pay_form" id="edits">
                                        <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times" aria-hidden="true"></i></button>

                                        <?php $form = ActiveForm::begin([
                                            'action' => '/company/update-company-info',
                                            'options' => ['class' => 'register-form-box']])
                                        ?>

                                        <div class="register-form-box__foot">
                                            <?=t('Редактирование данных профиля.')?>
                                        </div><br/>
                                        <div class="register-form-box__main-inputs">
                                            <div style="text-align: center"><?=t('Поля сотрудничества')?></div>
                                            <?= $form->field($company, 'cooperation_info_fio', [
                                                'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
								<i class='input-wrap__fa  fa fa-address-book' aria-hidden='true' data-toggle='tooltip'  data-placement='top'></i>\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
                                            ])->textInput(['placeholder'=>t('Фио'),'class'=>'popup_input']) ?>

                                            <?= $form->field($company, 'cooperation_info_email', [
                                                'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
				    			<i class='input-wrap__fa  fa fa-envelope' aria-hidden='true' data-toggle='tooltip'  data-placement='top'></i>\n

							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
                                            ])->textInput(['placeholder'=>t('Е-маил'),'class'=>'popup_input']) ?>

                                            <?= $form->field($company, 'cooperation_info_number', [
                                                'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
								<i class='input-wrap__fa  fa fa-phone' aria-hidden='true' data-toggle='tooltip'  data-placement='top'></i>\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
                                            ])->textInput(['placeholder'=>t('Номер телефона'),'class'=>'popup_input']) ?>
                                            <div style="text-align: center"><?=t('Поля техническим вопросам')?></div>
                                            <?= $form->field($company, 'technical_info_fio', [
                                                'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
				    			<i class='input-wrap__fa  fa fa-address-book' aria-hidden='true' data-toggle='tooltip'  data-placement='top'></i>\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
                                            ])->textInput(['placeholder'=>t('Фио'),'class'=>'popup_input']) ?>

                                            <?= $form->field($company, 'technical_info_email', [
                                                'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
								<i class='input-wrap__fa  fa fa-envelope' aria-hidden='true' data-toggle='tooltip'  data-placement='top'></i>\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
                                            ])->textInput(['placeholder'=>t('Е-маил'),'class'=>'popup_input']) ?>
                                            <?= $form->field($company, 'technical_info_number', [
                                                'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
								<i class='input-wrap__fa  fa fa-phone' aria-hidden='true' data-toggle='tooltip'  data-placement='top'></i>\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
                                            ])->textInput(['placeholder'=>t('Номер телефона'),'class'=>'popup_input']) ?>
                                        </div>
                                        <div class="register-form-box__btns  flex  justify-content-center">
                                            <button type="submit" class="register-form-box__btn  button  button_blue"><?=t('Сохранить')?></button>
                                            <button  data-fancybox-close="" class="register-form-box__btn  register-form-box__btn_back  btn  btn-clear"><?=t('Назад')?></button>
                                        </div>
                                        <?php ActiveForm::end() ?>
                                    </div>

                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                    <div class="company-office-content__col  col-lg-5  col-xl-4">
                        <div class="company-office__logo  img-wrap  block-

                        relative">
                            <?php if(!empty($company->photo)):?>
                                <img src="/<?=$company->photo ?>">
                            <?php else:?>
                                <img src="<?=noPhotoSrc() ?>">
                            <?php endif;?>
                            <span class="company-office__ready  ready  position-left-top"><img src="/images/created.jpg" alt=""></span>
                        </div>
                        <div class="company-office-content__content  content-text">
                            <h3>Ваш статус VIP</h3>
                            <div class="text  color-light-grey">Действует до 01.01.2019</div>
                        </div>

                        <div class="flex  justify-content-center">
                            <a href="#" class="company-office__btn  button  button_green">
                                <span><?=t('Улучшить')?></span>
                            </a>
                            <a href="#" class="company-office__btn  button  button_blue">
                                <span><?=t('Продлить')?></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row company-office-content__item">
                    <div class="col-xl-8">
                        <div class="company-info  company-info_background  company-info_background_logo  background-color-white">
                            <div class="company-info__content  company-info__content_contact  content-text">
                                <h3>Контакт компании для работы с Industry Hunter
                                    <sup><button class="edit" data-toggle="tooltip" data-placement="top" data-src="#" data-modal="true" title="Нажав на данный значок вы можете редактировать графу, которой он принадлежит"><i class="fa fa-pencil-square-o  color-blue" aria-hidden="true"></i></button></sup>
                                </h3>
                                <p>Наши специалисты готовы помочь вам по любым возникающим вопросам. Просто позвоните или напишите!</p>
                            </div>
                            <div class="company-info__items-wrap  row  justify-content-between">
                                <div class="company-office__window  seller-window  gutters">
                                    <div class="seller-window__info text"><i class="seller-window__fa-icon  color-light-blue  fa fa-building" aria-hidden="true"></i>Компания Компания</div>
                                    <div class="seller-window__info text"><i class="seller-window__fa-icon  color-light-blue  fa fa-user" aria-hidden="true"></i>Фамилия Имя отчество</div>
                                </div>
                                <div class="company-office__window  seller-window  gutters">
                                    <a href="tel:+998981212120" class="seller-window__info  text"><i class="seller-window__fa-icon  color-light-blue  fa fa-phone" aria-hidden="true"></i>+99898 121 21 20</a>
                                    <a href="mailto:" class="seller-window__info  text"><i class="seller-window__fa-icon  color-light-blue  fa fa-envelope" aria-hidden="true"></i>mail@mail.ru</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="company-office-content__item row">
                    <div class="col-12">
                        <div class="company-info  company-info_padding_small  background-color-white">
                            <div class="row">
                                <div class="company-info__audit  img-wrap  col-xl-4  block-margin-adaptive  text-center">
                                    <img src="/images/checked-logo.png" alt="">
                                    <a href="#" class="company-info__audit-btn  button  button_green">
                                        <span>Запросить аудит</span>
                                    </a>
                                    <div class="text  text_smaller  color-light-grey">*аудит производственных возможностей</div>
                                </div>
                                <div class="col-xl-8  company-info__content  company-info__content_audit  content-text  block-margin-adaptive">
                                    <p>Industry Hunter всегда стремиться к тому, чтобы предоставить нашим пользователям наиболее актуальную проверенную информацию. Сотрудники Industry Hunter готовы провести аудит Ваших производственных возможностей, составить отчет и присвоить Вашей компании знак «проверено Industry Hunter». </p>
                                    <p>Да, это за небольшую оплату, так как мы все знаем, что такое «бесплатные аудиты». Но это  предоставит Вам дополнительные преимущества для получения заказов. Нажимайте на кнопку, и мы свяжемся с Вами и расскажем подробности».</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if($model->id == Yii::$app)?>
                <div class="company-office-content__item row">
                    <div class="col-12">
                        <div class="company-info  company-info_background  company-info_background_lock  background-color-white" style="background-image: url(images/lock-img.jpg);">
                            <div class="row">
                                <?php $form = ActiveForm::begin([
                                    'action' => '/company/pass-change',
                                    'method' => 'POST',
                                    'id' => 'changePassForm',
                                    'options' => ['class' => 'company-info__form  site_form  col-lg-5  col-xl-4'],
                                ]); ?>

                                <label class="company-info__label">
                                    <?=$form->field($model, 'password', [
                                        'template' => "<input id='newPass' type=\"password\" name='newpassword' placeholder=\"Пароль\" class=\"popup_input\">
                                        <i class=\"input-wrap__fa  fa-lock fa\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Пароль должен быть не менее 6 символов, содержать цифры и буквы\"></i>",
                                    ])->textInput() ?>
                                </label>
                                <label class="company-info__label">
                                    <input id='newRePass' type="password" placeholder="Подтверждение пароля" class="popup_input">
                                    <i class="input-wrap__fa  fa fa-unlock" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="Подтвердите пароль для входа на сервис"></i>
                                </label>
                                <div class="company-info__form-btn-wrap  flex  justify-content-center">
                                    <button type="submit" id="confirmNewPass" class="company-info__form-btn  button  button_green"><i class="fa fa-check" aria-hidden="true"></i></button>
                                    <button id="resetPass" class="company-info__form-btn  button  button_red"><i class="fa fa-times" aria-hidden="true"></i></button>
                                </div>
                                <?php ActiveForm::end()?>
                                <!--                                </form>-->
                                <div class="col-lg-7  col-xl-8">
                                    <div class="company-info__content  company-info__content_secure  content-text">
                                        <h3><?=t('Настройки безопасности')?>
                                            <!-- <button class="edit  position-top-right"  data-toggle="tooltip" data-placement="top" title="Нажав на данный значок вы можете редактировать графу, которой он принадлежит"><i class="fa fa-pencil-square-o  color-blue" aria-hidden="true"></i></button> -->
                                        </h3>
                                        <div><?=t('Пожалуйста, будьте бдительны при вводе пароля.')?></div>
                                        <div><?=t('Попадание пароля в чужие руки может привести к неблагоприятным последствиям.')?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="small_branches">
        <div class="container in">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <a href="#" class="small_branches__item_company">
                        <img src="/images/temp/br1.jpg" alt="">
                        <span class="h2 white flex aic jcc"><?=t('Привлечь больше клиентов')?></span>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="#" class="small_branches__item_company">
                        <img src="/images/temp/br2.jpg" alt="">
                        <span class="h2 white flex aic jcc"><?=t('Организовать вебинар')?></span>
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="#" class="small_branches__item_company">
                        <img src="/images/temp/br3.jpg" alt="">
                        <span class="h2 white flex aic jcc"><?=t('Разместить статью')?></span>
                    </a>
                </div>
                <div class="col-md-6 col-sm-6 ">
                    <a href="#" class="small_branches__item_company">
                        <img src="/images/temp/br4.jpg" alt="">
                        <span class="h2 white flex aic jcc"><?=t('Разместить объявление')?></span>
                    </a>
                </div>

                <div class="col-md-6 col-sm-6">
                    <a href="#" class="small_branches__item_company">
                        <img src="/images/temp/br5.jpg" alt="">
                        <span class="h2 white flex aic jcc"><?=t('Разместить вакансию')?></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="message-from-ih">

        <?php if (!empty($model->messages)): ?>

            <div class="container">

                <div class="message-from-ih__sub-title content-text"><p><?=t('Сообщения от Industry Hunter')?></p></div>

                <?php foreach ($model->messages as $key => $value): ?>

                    <div class="message-from-ih__stroke  background-color-white  flex <?=$value->readed == 0 ? 'no-readed-message' : '' ?>">
                        <div class="message-from-ih__col  message-from-ih__col_small">
                            <div class="message-from-ih__link  block-relative"><i class="fa fa-envelope-open  color-light-grey  position-left-top" aria-hidden="true"></i> <?=$value->message->title ?></div>
                            <div class="message-form-ih__date"><?=$value->takeDate() ?></div>
                            <a href="<?=\yii\helpers\Url::to(['company/delete-message','id'=>$value->id])?>" class="message-from-ih__del  background-color-grey"><i class="fa fa-trash  color-light-grey" aria-hidden="true"></i></a>
                        </div>
                        <div class="message-from-ih__col  message-from-ih__col_large  content-text">
                            <p><?=$value->message->text ?></p>
                        </div>
                    </div>

                <?php endforeach ?>

                <div class="message-from-ih__more-wrap  flex justify-content-end">

                    <a href="#" class="message-from-ih__more  color-regular">        <?=t('Все сообщения')?>
                        </a>

                </div>

            </div>

        <?php endif ?>
    </div>
<!--        <div class="container">-->
<!--            <div class="message-from-ih__sub-title content-text"><p>Сообщения от Industry Hunter</p></div>-->
<!--            <div class="message-from-ih__stroke  background-color-white  flex">-->
<!--                <div class="message-from-ih__col  message-from-ih__col_small">-->
<!--                    <div class="message-from-ih__link  block-relative"><i class="fa fa-envelope-open  color-light-grey  position-left-top" aria-hidden="true"></i> Тема первого письма</div>-->
<!--                    <div class="message-form-ih__date">12/12/12</div>-->
<!--                    <button class="message-from-ih__del  background-color-grey"><i class="fa fa-trash  color-light-grey" aria-hidden="true"></i></button>-->
<!--                </div>-->
<!--                <div class="message-from-ih__col  message-from-ih__col_large  content-text">-->
<!--                    <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько  абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. </p>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="message-from-ih__stroke  background-color-white  flex">-->
<!--                <div class="message-from-ih__col  message-from-ih__col_small">-->
<!--                    <div class="message-from-ih__link  block-relative"><i class="fa fa-envelope-open  color-light-grey  position-left-top" aria-hidden="true"></i> Тема первого письма</div>-->
<!--                    <div class="message-form-ih__date">12/12/12</div>-->
<!--                    <button class="message-from-ih__del  background-color-grey"><i class="fa fa-trash  color-light-grey" aria-hidden="true"></i></button>-->
<!--                </div>-->
<!--                <div class="message-from-ih__col  message-from-ih__col_large  content-text">-->
<!--                    <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько  абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. </p>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="message-from-ih__stroke  background-color-white  flex">-->
<!--                <div class="message-from-ih__col  message-from-ih__col_small">-->
<!--                    <div class="message-from-ih__link  block-relative"><i class="fa fa-envelope-open  color-light-grey  position-left-top" aria-hidden="true"></i> Третье письмо</div>-->
<!--                    <div class="message-form-ih__date">12/12/12</div>-->
<!--                    <button class="message-from-ih__del  background-color-grey"><i class="fa fa-trash  color-light-grey" aria-hidden="true"></i></button>-->
<!--                </div>-->
<!--                <div class="message-from-ih__col  message-from-ih__col_large  content-text">-->
<!--                    <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько  абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. </p>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="message-from-ih__stroke  background-color-white  flex">-->
<!--                <div class="message-from-ih__col  message-from-ih__col_small">-->
<!--                    <div class="message-from-ih__link  block-relative"><i class="fa fa-envelope-open  color-light-grey  position-left-top" aria-hidden="true"></i> Тема первого письма</div>-->
<!--                    <div class="message-form-ih__date">12/12/12</div>-->
<!--                    <button class="message-from-ih__del  background-color-grey"><i class="fa fa-trash  color-light-grey" aria-hidden="true"></i></button>-->
<!--                </div>-->
<!--                <div class="message-from-ih__col  message-from-ih__col_large  content-text">-->
<!--                    <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько  абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. </p>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="message-from-ih__stroke  background-color-white  flex">-->
<!--                <div class="message-from-ih__col  message-from-ih__col_small">-->
<!--                    <div class="message-from-ih__link  block-relative"><i class="fa fa-envelope-open  color-light-grey  position-left-top" aria-hidden="true"></i> Письмо номер два</div>-->
<!--                    <div class="message-form-ih__date">12/12/12</div>-->
<!--                    <button class="message-from-ih__del  background-color-grey"><i class="fa fa-trash  color-light-grey" aria-hidden="true"></i></button>-->
<!--                </div>-->
<!--                <div class="message-from-ih__col  message-from-ih__col_large  content-text">-->
<!--                    <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько  абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. </p>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="message-from-ih__more-wrap  flex justify-content-end">-->
<!--                <a href="#" class="message-from-ih__more  color-regular">Все сообщения</a>-->
<!--            </div>-->
<!--        </div>-->
    </div>
<?php
$js = <<<JS
   
    var changePassForm = $("#changePassForm");
    var resetPass = $("#resetPass");
    
    resetPass.click(function(){
        changePassForm[0].reset();
    })
    var submited = false;

    changePassForm.on("beforeSubmit", function(e){
    e.preventDefault();
       if (submited == false )
        {
            submited = true;
    var newPass = $("#newPass").val();
    var newRePass = $("#newRePass").val();
        if (newPass === newRePass) {

            $.ajax({
                type: changePassForm.attr("method"),
                url: changePassForm.attr("action"),
                data: changePassForm.serializeArray(),
                success: function(data){
//                    console.log(data);
                    if(data.status === 1){
                        alert("Пароль успешно изменён!");
                        changePassForm[0].reset();
                    }
                }

            });
            return false;
        }else{
            alert("Введённые пароли не совпадают!");
        }
           submited = false;
    }}).on('submit', function(e)
    {
        e.preventDefault();
    });
JS;
return $this->registerJs($js);


?>



		