<?php
    use yii\helpers\Url;
    use yii\widgets\ActiveForm;
?>

<div class="instruction">
    <div class="container">
        <a href="#" class="instruction__link">Краткая инструкция по работе с личным кабинетом</a>
    </div>
</div>
<div class="company-office">
    <div class="company-office__container  container">
        <div class="company-office__row  row">
            <button class="company-office__btn-menu  company-office__btn-menu_call  animated  pulse_bigger  infinite"><i class="fa fa-bars" aria-hidden="true"></i></button>


            <div class="company-menu  company-menu_mob  col-md-4  col-lg-3  block-margin-adaptive">
                <button class="company-menu__btn-close  company-menu__btn-close_close  animated  pulse_bigger  infinite"><i class="fa fa-times" aria-hidden="true"></i></button>
                <ul>
                    <li class="company-menu__active">
                        <span>Главная</span>
                    </li>
                    <li>
                        <a href="<?=Url::to('/personal/interests')?>">Мои интересы</a>
                    </li>
                    <li>
                        <a href="<?=Url::to('/personal/settings')?>">Настройки</a>
                    </li>
                    <li>
                        <a href="<?=Url::to('/personal/activity')?>">Активность</a>
                    </li>
                    <li>
                        <a href="<?=Url::to('/personal/tenders')?>">Тендеры</a>
                    </li>
                    <li>
                        <a href="<?=Url::to('/personal/publish')?>">Опубликовать</a>
                    </li>
                </ul>
            </div>


            <div class="company-office-content  col-md-8  col-lg-9  block-margin-adaptive">
                <div class="company-office__name  content-text">
                    <div class="company-office__name-top  flex  justify-content-between  align-items-center">
                        <div class="text  color-light-grey">На IH: с <?=$user->info->created_at ?></div>
                    </div>
                    <h2><?=$user->info->last_name . ' ' .$user->info->first_name . ' ' ?><sup><button class="edit"  data-fancybox="" data-src="#edit_user_info" data-modal="true" data-toggle="tooltip" data-placement="top" title="Нажав на данный значок вы можете редактировать графу, которой он принадлежит"><i class="fa fa-pencil-square-o  color-blue" aria-hidden="true"></i></button></sup></h2>
                </div>



                <div class="header-popup  header-popup_pay_form" id="edit_user_info">
                    <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times" aria-hidden="true"></i></button>

                    <?php $form = ActiveForm::begin([
                        'action' => '/personal/edit-user-info',
                        'id' => 'info_edit_form',
                        'options' => ['class' => 'register-form-box']])
                    ?>

                        <div class="register-form-box__foot">
                            Редактирование данных профиля.
                        </div><br/>
                    <div class="register-form-box__main-inputs">
                    <?= $form->field($user->info, 'last_name', [

                        'template' => '
                            <div class="register-form-box__main-input">
                                <input type="text" placeholder="Фамилия" name="Userinfo[last_name]" value="'.$user->info->last_name.'">{error}
                                <i class="register-form-box__fa  fa fa-user" aria-hidden="true"></i>
                            </div>'

                    ])->textInput() ?>


                    <?= $form->field($user->info, 'first_name', [

                        'template' => '
                            <div class="register-form-box__main-input">
                                <input type="text" placeholder="Имя" name="Userinfo[first_name]" value="'.$user->info->first_name.'">{error}
                            </div>'

                    ])->textInput() ?>

                    <?= $form->field($user->info, 'middle_name', [

                        'template' => '
                            <div class="register-form-box__main-input">
                                <input type="text" placeholder="Отчество" name="Userinfo[middle_name]" value="'.$user->info->middle_name.'">
                            </div>'

                    ])->textInput() ?>

                    <?= $form->field($user->info, 'b_date', [

                        'template' => '
                            <div class="register-form-box__main-input">
                                <input type="date" placeholder="Дата рождения" max="'. date('Y-m-d') .'" name="Userinfo[b_date]" value="' . (($user->info->b_date) ? date('Y-m-d', strtotime($user->info->b_date)) : null) . '">
                                <i class="register-form-box__fa  fa fa-calendar" aria-hidden="true"></i>
                            </div>'

                    ])->textInput() ?>


                    <?= $form->field($user->info, 'sex', [

                        'template' => '
                            <div class="register-form-box__main-input">
                                {input}
                                <i class="register-form-box__fa  fa fa-venus-mars" aria-hidden="true"></i>
                            </div>'

                    ])->dropDownList(['Женщина', 'Мужчина']) ?>

                        <?= $form->field($user, 'country_id', [

                            'template' => '
                            <div class="register-form-box__main-input">
                                {input}{error}
                                <i class="register-form-box__fa  fa" aria-hidden="true"></i>
                            </div>'

                        ])->dropDownList($countries, ['class' => 'select select_sub', 'name' => 'Userinfo[country]', 'value' => $user->country->id]) ?>

                        <?= $form->field($user, 'region_id', [

                            'template' => '
                            <div class="register-form-box__main-input">
                                {input}{error}
                                <i class="register-form-box__fa  fa" aria-hidden="true"></i>
                            </div>'

                        ])->dropDownList([$regions], ['class' => 'select select_sub', 'name' => 'Userinfo[region]', 'value' => $user->region->id,
                            'options' => [
                                $user->region->id => ['selected' => true]]
                        ])?>

                        <?= $form->field($user->info, 'phone', [

                            'template' => '
                            <div class="register-form-box__main-input">
                                <input type="tel" placeholder="Номер телефона" name="Userinfo[phone]" value="'.$user->info->phone.'">
                                <i class="register-form-box__fa  fa fa-phone" aria-hidden="true"></i>
                            </div>'

                        ])->textInput() ?>

<!--                        --><?//= $form->field($user, 'email', [
//
//                            'template' => '
//                            <div class="register-form-box__main-input">
//                                <input type="email" placeholder="E-mail" name="Userinfo[email]" value="'. $user->email .'">
//                                <i class="register-form-box__fa  fa fa-envelope" aria-hidden="true"></i>
//                            </div>'
//
//                        ])->textInput() ?>

                        <?= $form->field($user->info, 'skype', [

                            'template' => '
                            <div class="register-form-box__main-input">
                                <input type="text" placeholder="Skype" name="Userinfo[skype]" value="'.$user->info->skype.'">
                                <i class="register-form-box__fa  fa fa-skype" aria-hidden="true"></i>
                            </div>'

                        ])->textInput() ?>

                        <?= $form->field($user->info, 'company', [

                            'template' => '
                            <div class="register-form-box__main-input">
                                <input type="text" placeholder="Название компании" name="Userinfo[company]" value="'.$user->info->company.'">
                                <i class="register-form-box__fa  fa fa-building" aria-hidden="true"></i>
                            </div>'

                        ])->textInput() ?>

                        <?= $form->field($user->info, 'position', [

                            'template' => '
                            <div class="register-form-box__main-input">
                                <input type="text" placeholder="Должность" name="Userinfo[position]" value="'. $user->info->position .'">
                                <i class="register-form-box__fa  fa fa-user" aria-hidden="true"></i>
                            </div>'

                        ])->textInput() ?>

                        <?= $form->field($user->info, 'site_company', [

                            'template' => '
                            <div class="register-form-box__main-input">
                                <input type="text" placeholder="Сайт" name="Userinfo[site_company]" value="'. $user->info->site_company .'">
                                <i class="register-form-box__fa  fa fa-globe" aria-hidden="true"></i>
                            </div>'

                        ])->textInput() ?>

                        <?= $form->field($user->info, 'imageFile'
//                            , [

//                            'template' => '
//                                <label class="add_tender_file button button_green ml-auto mr-auto">
//                                    Загрузить фото
//                                    {input}
//                                </label>'

//                                ]
                        )->fileInput(['class' => 'button  button_green ml-auto mr-auto'])->label(false) ?>

                        </div>
                        <div class="register-form-box__btns  flex  justify-content-center">
                            <button type="submit" class="register-form-box__btn  button  button_blue">Сохранить</button>
                            <button  data-fancybox-close="" class="register-form-box__btn  register-form-box__btn_back  btn  btn-clear">Назад</button>
                        </div>

                    <?php ActiveForm::end() ?>

                </div>



                <div class="company-office-content__item  row">
                    <div class="company-office-content__col  col-lg-7  col-xl-8">
                        <div class="company-info  company-info_personal  background-color-white">
                            <div class="row">
                                <div class="company-office__window  seller-window  gutters">
                                    <div class="seller-window__title  text-weight-bold">Личные данные</div>

                                    <div class="seller-window__info  text">
                                        <i class="seller-window__fa-icon  color-light-blue  fa fa-user" aria-hidden="true"></i>
                                        <?=$user->info->takeFio() ?>
                                    </div>
                                    <div class="seller-window__info  text">
                                        <i class="seller-window__fa-icon  color-light-blue  fa fa-calendar" aria-hidden="true"></i>
                                        <?=$user->info->takeBirthDate() ?>
                                    </div>
                                    <div class="seller-window__info  text"><i class="seller-window__fa-icon  color-light-blue  fa fa-venus-mars" aria-hidden="true"></i><?=$user->info->takeSex() ?></div>
                                    <div class="seller-window__info  text"><i class="seller-window__fa-icon  color-light-blue  fa fa-map-marker" aria-hidden="true"></i><?=$user->takeCountryAndRegion() ?></div>

                                </div>
                                <div class="company-office__window  seller-window  gutters">
                                    <div class="seller-window__title  text-weight-bold">Контакты</div>
                                    <a href="tel:+998981212120" class="seller-window__info  text"><i class="seller-window__fa-icon  color-light-blue  fa fa-phone" aria-hidden="true"></i><?=$user->info->phone ?></a>
                                    <a href="mailto:" class="seller-window__info  text"><i class="seller-window__fa-icon  color-light-blue  fa fa-envelope" aria-hidden="true"></i><?=$user->email ?></a>
                                    <a href="#" class="seller-window__info  text"><i class="seller-window__fa-icon  color-light-blue  fa fa-skype" aria-hidden="true"></i><?=$user->info->skype ?></a>
                                </div>
                                <div class="company-office__window  seller-window  gutters">
                                    <div class="seller-window__title  text-weight-bold">Компания</div>
                                    <div class="seller-window__info  text"><i class="seller-window__fa-icon  color-light-blue  fa fa-building" aria-hidden="true"></i><?=$user->info->company ?></div>
                                    <div class="seller-window__info  text"><i class="seller-window__fa-icon  color-light-blue  fa fa-user" aria-hidden="true"></i><?=$user->info->position ?></div>
                                    <a href="#" class="seller-window__info  seller-window__info_site  text"><i class="seller-window__fa-icon  color-light-blue  fa fa-globe" aria-hidden="true"></i><?=$user->info->site_company ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="company-office-content__col  col-lg-5  col-xl-4">
                        <div class="company-office__logo  company-office__logo_no-border  img-wrap  block-relative">
                            <img src="<?=!empty($user->info->photo) ? $user->info->photo : noPhotoSrc() ?>">
                        </div>
                    </div>
                </div>
                <div class="company-office-content__item row">
                    <div class="col-12">
                        <div class="company-info  company-info_background  company-info_background_lock  background-color-white" style="background-image: url(images/lock-img.jpg);">
                            <div class="row">
                                <?php $form = ActiveForm::begin([
                                    'action' => '/personal/pass-change',
                                    'method' => 'POST',
                                    'id' => 'changePassForm',
                                    'options' => ['class' => 'company-info__form  site_form  col-lg-5  col-xl-4'],
                                ]); ?>

                                    <label class="company-info__label">
                                        <?=$form->field($user, 'password', [
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
                                        <h3>Настройки безопасности
                                            <!-- <button class="edit  position-top-right"  data-toggle="tooltip" data-placement="top" title="Нажав на данный значок вы можете редактировать графу, которой он принадлежит"><i class="fa fa-pencil-square-o  color-blue" aria-hidden="true"></i></button> -->
                                        </h3>
                                        <div>Пожалуйста, будьте бдительны при вводе пароля. </div>
                                        <div>Попадание пароля в чужие руки может привести к неблагоприятным последствиям.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="message-from-ih">

        <?php if (!empty($user->messages)): ?>

            <div class="container">

                <div class="message-from-ih__sub-title content-text"><p>Сообщения от Industry Hunter</p></div>

                <?php foreach ($user->messages as $key => $value): ?>

                    <div class="message-from-ih__stroke  background-color-white  flex <?=$value->readed == 0 ? 'no-readed-message' : '' ?>">
                        <div class="message-from-ih__col  message-from-ih__col_small">
                            <div class="message-from-ih__link  block-relative"><i class="fa fa-envelope-open  color-light-grey  position-left-top" aria-hidden="true"></i> <?=$value->message->title ?></div>
                            <div class="message-form-ih__date"><?=$value->takeDate() ?></div>
                            <a href="/personal/delete-message/<?=$value->id ?>" class="message-from-ih__del  background-color-grey"><i class="fa fa-trash  color-light-grey" aria-hidden="true"></i></a>
                        </div>
                        <div class="message-from-ih__col  message-from-ih__col_large  content-text">
                            <p><?=$value->message->text ?></p>
                        </div>
                    </div>
                    
                <?php endforeach ?>
                
                <div class="message-from-ih__more-wrap  flex justify-content-end">

                    <a href="#" class="message-from-ih__more  color-regular">Все сообщения</a>

                </div>

            </div>

        <?php endif ?>
    </div>
</div>

<script>

</script>
<?php $this->registerJs('

//    $("#datepicker").datepicker({
//      changeMonth: true,
//      changeYear: true,
//      showOtherMonths: true,
//      selectOtherMonths: true,
//      minDate: "-70Y", 
//      maxDate: 0
//    });
//    $("#datepicker").datepicker("option", "dateFormat", "dd MM yy");
    
    
    var changePassForm = $("#changePassForm");
    var resetPass = $("#resetPass");
    
    resetPass.click(function(){
        changePassForm[0].reset();
    })

    changePassForm.on("submit", function(e){
    e.preventDefault();
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
    
');