<?php
use app\models\Directions;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$forms = new \app\models\CompanyProfileEmployees();
$emplContactsForm = new \app\models\CompanyProfileEmplContacts();
$employees = $model->companyinfo->getEmployees()->andWhere(['direction_id' => $direction->id])->all();

$emplContacts = $model->companyinfo->getContacts()->andWhere(['direction_id' => $direction->id])->one();

$emplContactsModal = new \app\components\ModalComponents(
    'buttonNewEmplContact',
    'empl_contact',
    'empl-contact-new',
    'empl_contact-event',
    'update_empl_contact',
    'empl-contact',
    '/company/empl-contacts-edit',
    '/company/empl-contacts-update',
    '/company/empl-contacts-response',
    'companyprofileemplcontacts',
    'empl_contact-delete',
    '/company/empl-contacts-delete'
);

$employeesModal = new \app\components\ModalComponents(
    'buttonNewEmployees',
    'employees',
    'employees-new',
    'employee-event',
    'update-employee',
    'employee-update',
    '/company/edit-employees',
    '/company/employee-update',
    '/company/employee-response',
    'companyprofileemployees',
    'employees-delete',
    '/company/employee-delete'
);
?>

<div class="company-profile-box  background-color-white">
    <div class="company-profile-box__content  company-profile-box__content_text  content-text">
        <h3>Наши Контакты по различным направлениям и темам
            <?=$emplContactsModal->mainButton()?>
        </h3>
        <p>Пожалуйста, внесите контакты для того, чтобы потенциальные клиенты могли связаться с сотрудниками Вашей компании. Персональные менеджеры по направлениям необходимы, чтобы потенциальному клиенту не приходилось каждый раз тратить время на разговор с секретарем</p>
    </div>

    <?php if($emplContacts) :?>
        <div class="company-profile-box__contacts  row  justify-content-between" <?= $emplContacts ?  'id="empl_contact-'.$emplContacts->id.'"' : '' ?>>
            <div class="company-profile-box__contacts-box  col-sm-6  col-lg-1">
                <?= $emplContactsModal->indidualButton($emplContacts) ?>
            </div>
            <div class="company-profile-box__contacts-box  col-sm-6  col-lg-4">
                <h4>Основной адрес</h4>
                <div class="company-profile-box__contact-info"><i class="fa fa-map-marker" aria-hidden="true"></i> <?=$emplContacts->address_one?></div>
            </div>
            <div class="company-profile-box__contacts-box  col-sm-6  col-lg-3">
                <h4>Дополнительный адрес</h4>
                <div class="company-profile-box__contact-info"><i class="fa fa-map-marker" aria-hidden="true"></i><?=$emplContacts->address_two?></div>
            </div>
            <div class="company-profile-box__contacts-box  col-sm-6  col-lg-3">
                <h4>Общие контакты</h4>
                <a href="" class="company-profile-box__contact-info"><i class="seller-window__fa-icon  fa fa-phone" aria-hidden="true"></i> <?=$emplContacts->public_phone?></a>
                <a href="" class="company-profile-box__contact-info"><i class="seller-window__fa-icon  fa fa-envelope" aria-hidden="true"></i><?=$emplContacts->public_email?></a>
            </div>

            <div class="company-profile-box__contacts-box  col-sm-6  col-lg-1">
                <?= $emplContactsModal->deleteButton($emplContacts) ?>
            </div>
        </div>
        <?php else: ?>
        <div class="company-profile-box__contacts  row  justify-content-between">
            <div class="company-profile-box__contacts-box  col-sm-6  col-lg-4">
                <h4>Основной адрес</h4>
                <div class="company-profile-box__contact-info"><i class="fa fa-map-marker" aria-hidden="true"></i>Неуказано</div>
            </div>
            <div class="company-profile-box__contacts-box  col-sm-6  col-lg-4">
                <h4>Дополнительный адрес</h4>
                <div class="company-profile-box__contact-info"><i class="fa fa-map-marker" aria-hidden="true"></i>Неуказано</div>
            </div>
            <div class="company-profile-box__contacts-box  col-sm-6  col-lg-3">
                <h4>Общие контакты</h4>
                <a href="" class="company-profile-box__contact-info"><i class="seller-window__fa-icon  fa fa-phone" aria-hidden="true"></i>Неуказано</a>
                <a href="" class="company-profile-box__contact-info"><i class="seller-window__fa-icon  fa fa-envelope" aria-hidden="true"></i>Неуказано</a>
            </div>
            <div class="company-profile-box__contacts-box  col-sm-6  col-lg-1">
                <button class="edit create_empl_contact" data-event="empl-contact-new" >
                    <i class="fa fa-plus color-blue" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    <?php endif; ?>
    <div class="company-profile-box__ads  ads-section">
        <div class="company-profile-box__contacts-box  content-text">
            <h4>Персональные менеджеры
                <?=$employeesModal->mainButton()?>
            </h4>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="company-profile-box__menegers  row" >
                    <?php if(!empty($employees)):?>
                        <?php foreach($employees as $employe):?>
                                <div class="ads-section__col  col-md-4  col-lg-4" <?= $employe ?  'id="employees-'.$employe->id.'"' : '' ?>>
                                    <div class="ads-box  ads-box_profile">
                                        <?= $employeesModal->indidualButton($employe) ?>
                                        <div class="ads-box__img-wrap  ads-box__img-wrap_profile  img-wrap">
                                            <img src="<?=$employe->getPhotos()?>" alt="">
                                        </div>
                                        <?= $employeesModal->deleteButton($employe) ?>
                                        <div class="ads-box__content_profile  content-text">
                                            <h4><?= $employe->fio ?></h4>
                                            <div class="text  color-light-grey"><?= $employe->role ?></div>
                                        </div>
                                        <div class="ads-box__info  ads-box__info_profile  text">
                                            <div class="ads-box__info-name  text  color-light-grey">Направление</div>
                                            <div class="ads-box__info-value"><?= getRecordsByClass($employe->direction_id, false, Directions::className())->name; ?></div>
                                        </div>
                                        <div class="ads-box__info  ads-box__info_profile  text">
                                            <div class="ads-box__info-name  text  color-light-grey">Тема</div>
                                            <div class="ads-box__info-value"><?= getRecordsByClass($employe->theme_ids, true, \app\models\FilterThemes::className()); ?></div>
                                        </div>
                                        <?php if($employe->sub_theme_ids): ?>
                                            <div class="ads-box__info  ads-box__info_profile  text">
                                                <div class="ads-box__info-name  text  color-light-grey">Подтема</div>
                                                <div class="ads-box__info-value"><?= getRecordsByClass($employe->sub_theme_ids, true, \app\models\FilterSubThemes::className()); ?></div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="ads-box__info  ads-box__info_profile  text">
                                            <div class="ads-box__info-name  text  color-light-grey">Телефон</div>
                                            <div class="ads-box__info-value"><?= $employe->phone ?></div>
                                        </div>
                                        <div class="ads-box__info  ads-box__info_profile  text">
                                            <div class="ads-box__info-name  text  color-light-grey">Почта</div>
                                            <div class="ads-box__info-value"><?= $employe->email ?></div>
                                        </div>
                                    </div>
                                </div>
                        <?php endforeach;?>
                    <?php endif;?>
                    <div class="ads-section__col  col-md-4  col-lg-4">
                        <button data-event="employees-new" class="btn-add  btn-add_menegers edit create_employees">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="direction_id" id="<?= $direction->id ?>" hidden></div>
<?php if($first == 0): ?>
<div class="header-popup  header-popup_pay_form update_empl_contact">
    <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times" aria-hidden="true"></i></button>

    <?php
    $form = ActiveForm::begin([
        'action' => '/company/empl-contacts-update',
        'id'=>'empl-contact',
        'options' => ['class' => 'register-form-box']])
    ?>

    <div class="register-form-box__foot">
        <?=t('Добавить Контакты.')?>
    </div><br/>
    <div class="register-form-box__main-inputs">

        <?= $form->field($emplContactsForm, 'id')->hiddenInput()->label(false); ?>

        <?= $form->field($emplContactsForm,'direction_id')->hiddenInput()->label(false)?>

        <?= $form->field($emplContactsForm, 'address_one', [
            'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
                             <i class='input-wrap__fa fa fa-map-marker' aria-hidden='true' data-toggle='tooltip'  data-placement='top'></i>\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
            // 'enableAjaxValidation' => true,
        ])->textInput(['placeholder'=>t('Основной адрес'),'class'=>'popup_input']) ?>

        <?= $form->field($emplContactsForm, 'address_two', [
            'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
                              <i class='input-wrap__fa fa fa-map-marker' aria-hidden='true' data-toggle='tooltip'  data-placement='top'></i>\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
            // 'enableAjaxValidation' => true,
        ])->textInput(['placeholder'=>t('Дополнительный адрес'),'class'=>'popup_input']) ?>
        <?= $form->field($emplContactsForm, 'public_phone', [
            'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
            // 'enableAjaxValidation' => true,
        ])->textInput(['placeholder'=>t('Номер телефона'),'class'=>'popup_input']) ?>

        <?= $form->field($emplContactsForm, 'public_email', [
            'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
                            <i class='input-wrap__fa fa fa-envelope' aria-hidden='true' data-toggle='tooltip'  data-placement='top'></i>\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
            // 'enableAjaxValidation' => true,
        ])->textInput(['placeholder'=>t('Е-маил'),'class'=>'popup_input']) ?>
    </div>
    <div class="register-form-box__btns  flex  justify-content-center">
        <button type="submit" class="register-form-box__btn  button  button_blue"><?=t('Сохранить')?></button>
        <button  data-fancybox-close="" class="register-form-box__btn  register-form-box__btn_back  btn  btn-clear"><?=t('Назад')?></button>
    </div>
    <?php ActiveForm::end() ?>
</div>

<div class="header-popup  header-popup_pay_form update-employee">
    <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times" aria-hidden="true"></i></button>

    <?php
    $form = ActiveForm::begin([
        'action' => '/company/employee-update',
        'id'=>'employee-update',
        'enableAjaxValidation' => true,
        'validationUrl' => Url::toRoute('/company/validation?class='.$forms->className()),
        'options' => ['class' => 'register-form-box']])
    ?>

    <div class="register-form-box__foot">
        <?=t('Редактировать Персональные менеджеров.')?>
    </div><br/>
    <div class="register-form-box__main-inputs">

        <?= $form->field($forms,'id')->hiddenInput()->label(false)?>

        <?= $form->field($forms, 'action')->hiddenInput()->label(false); ?>

        <?= $form->field($forms,'theme_ids')->hiddenInput()->label(false)?>

        <?= $form->field($forms,'sub_theme_ids')->hiddenInput()->label(false)?>

        <?= $form->field($forms,'direction_id')->hiddenInput()->label(false)?>

        <?= $form->field($forms,'direction')->dropDownList(Directions::allList(), ['disabled' => true])->label(false)?>

        <?= $form->field($forms, 'fio', [
            'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
                             <i class='input-wrap__fa  fa fa-user' aria-hidden='true' data-toggle='tooltip'  data-placement='top'></i>\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
            // 'enableAjaxValidation' => true,
        ])->textInput(['placeholder'=>t('Фио').'*','class'=>'popup_input']) ?>

        <?= $form->field($forms, 'role', [
            'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
            // 'enableAjaxValidation' => true,
        ])->textInput(['placeholder'=>t('Должность'),'class'=>'popup_input']) ?>

        <?= $form->field($forms, 'themeIds[]', [
            'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
        ])->dropDownList([],[
            'class' => 'multiple-selected-themes',
            'multiple'=>'multiple',
            ])->label(false) ?>

        <?= $form->field($forms, 'subThemeIds[]', [
            'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
        ])->dropDownList([],[
            'class' => 'multiple-selected-sub-themes',
            'multiple'=>'multiple',
        ]) ?>
        <?= $form->field($forms, 'phone', [
            'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
                                 <i class='input-wrap__fa  fa fa-phone' aria-hidden='true' data-toggle='tooltip'  data-placement='top'></i>\n

							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
            // 'enableAjaxValidation' => true,
        ])->textInput(['placeholder'=>t('Номер телефона'),'class'=>'popup_input']) ?>
        <?= $form->field($forms, 'email', [
            'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
                                 <i class='input-wrap__fa  fa fa-envelope' aria-hidden='true' data-toggle='tooltip'  data-placement='top'></i>\n

							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
            // 'enableAjaxValidation' => true,
        ])->textInput(['placeholder'=>t('Е-маил'),'class'=>'popup_input']) ?>
        <?= $form->field($forms, 'imageFile')->fileInput(['class' => 'button  button_green ml-auto mr-auto'])->label(false) ?>
    </div>
    <div class="register-form-box__btns  flex  justify-content-center">
        <button type="submit" class="register-form-box__btn  button  button_blue"><?=t('Сохранить')?></button>
        <button  data-fancybox-close="" class="register-form-box__btn  register-form-box__btn_back  btn  btn-clear"><?=t('Назад')?></button>
    </div>
    <?php ActiveForm::end() ?>
</div>
<?php endif; ?>

<?php $this->registerJs($emplContactsModal->script());?>
<?php $this->registerJs($employeesModal->script());?>




