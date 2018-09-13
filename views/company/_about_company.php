<?php

use yii\widgets\ActiveForm;

$aboutCompanies = $model->companyinfo->getAbout()->andWhere(['direction_id' => $direction_id])->one();

//kk($model->companyinfo->companyVariants);

$AboutCompanyModal = new \app\components\ModalComponents(
    'buttonNewAbout',
    'about',
    'about-new',
    'about-event',
    'update-about',
    'about-form',
    '/company/about-edit',
    '/company/about-update',
    '/company/about-response',
    'companyprofileabout',
    'about-delete',
    '/company/about-delete'
);

$AboutDirectorModal = new \app\components\ModalComponents(
    'buttonNewAboutDirector',
    'aboutDirector',
    'aboutDirector-new',
    'aboutDirector-event',
    'update-aboutDirector',
    'aboutDirector-form',
    '/company/about-directors-create',
    '/company/about-director-update',
    '/company/about-director-response',
    'companyprofileaboutdirectors',
    'about-director-delete',
    '/company/about-directors-delete'
);

$aboutID = null;

$forms = new \app\models\CompanyProfileAbout();
$forms2 = new \app\models\CompanyProfileAboutDirectors();

?>

<div class="company-profile-box  background-color-white">
    <div class="company-profile-box__content  company-profile-box__content_text  content-text">
        <h3>О компании
            <?= $AboutCompanyModal->mainButton() ?>
                <button class="edit create_about" data-event="about-new">
                    <i class="fa fa-plus color-blue" aria-hidden="true"></i>
                </button>
        </h3>
        <p>Познакомьте потенциального покупателя с Вашей компанией</p>
    </div>
    <?php if (!empty($aboutCompanies)): ?>
<!--        --><?php //foreach ($aboutCompanies as $aboutCompany): ?>
                <?php $aboutID = $aboutCompanies->id ?>
                <div class="about  about_company-card  background-color-grey  section-js"  id="about-<?= $aboutCompanies->id ?>">
                    <?= $AboutCompanyModal->indidualButton($aboutCompanies); ?>
                    <?= $AboutCompanyModal->deleteButton($aboutCompanies); ?>
                    <div class="row">
                        <div class="about__video-or-img  about__video-or-img_profile  col-lg-9 block-centered">
                            <?php if(isVideo($aboutCompanies->media)): ?>
                                <video width="100%" controls="controls">
                                    <source src="/<?=$aboutCompanies->media?>" type='video/ogg; codecs="theora, vorbis"'>
                                    <source src="/<?=$aboutCompanies->media?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                                    <source src="/<?=$aboutCompanies->media?>" type='video/webm; codecs="vp8, vorbis"'>
                                    Тег video не поддерживается вашим браузером.
                                </video>
                            <?php else: ?>
                                <img src="/<?= $aboutCompanies->media  ?>">
                            <?php endif; ?>
                        </div>
                        <div class="about__content  content-text  col-lg-12">
                            <p>
                                <?= $aboutCompanies->description ?>
                            </p>
                        </div>
                    </div>
                    <?= $this->render('_directors',['model'=>$aboutCompanies->aboutDirectors, 'AboutDirectorModal' => $AboutDirectorModal]); ?>
                </div>
                <?php if(count($aboutCompanies->aboutDirectors) < 2): ?>
                    <button class="btn btn-success create_<?= $AboutDirectorModal->viewName ?>" data-event="<?= $AboutDirectorModal->mainSrc?>">
                        Добавить директора
                    </button>
                <?php endif; ?>
<!--        --><?php //endforeach; ?>
    <?php endif; ?>
    <?= $AboutDirectorModal->mainButton() ?>

</div>

<div class="direction_id" id="<?= $direction_id ?>" hidden></div>
<?php if ($first == 0): ?>
    <div class="header-popup  header-popup_pay_form <?= $AboutCompanyModal->modalClass; ?>">
        <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times"
                                                                                     aria-hidden="true"></i></button>

        <?php
        $form = ActiveForm::begin([
            'id' => $AboutCompanyModal->formId,
            'options' => ['class' => 'register-form-box']])
        ?>

        <div class="register-form-box__foot">
            <?= t('О компании.') ?>
        </div>
        <br/>
        <div class="register-form-box__main-inputs">
            <?= $form->field($forms, 'id')->hiddenInput()->label(false) ?>

            <?= $form->field($forms, 'direction_id')->hiddenInput()->label(false) ?>

            <?= $form->field($forms, 'description', [
            'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
            ])->textarea(['placeholder' => t('До 1000 символов с пробелами') . '*', 'class' => 'popup_input', 'rows' => 6]) ?>
            <?= $form->field($forms, 'imageFile')->fileInput(['class' => 'button  button_green ml-auto mr-auto director1-input'])->label(false) ?>
            <!--            <div class="row  align-items-center input-file-wrap multiple">-->
<!--                <div class="gutters  margin-b-10">-->
<!--                    --><?//= $form->field($forms, 'multiFile[]', [
//                        'template' =>
//                            '
//                                <p class=\'help-block help-block-error\'></p>
//                                <label for="companyabout-multifile" class="input-file-wrap__label  label-file  label-file_large  label-anchor"><i class="label-file__fa  fa fa-upload" aria-hidden="true"></i></label>
//                                {input}
//
//                                    '
//                    ])->fileInput(['class' => 'input-file-wrap__input input-file-wrap__input_hidden addImages', 'data-anchor', 'multiple' => true])->label(false) ?>
<!--                </div>-->
<!--                <div class="col-9  margin-b-10  label-file-descr">-->
<!--                    <div class="input-file-wrap__description">Загрузите здесь фото и видео</div>-->
<!--                    <ul class="input-file-wrap__list  uploadImagesList">-->
<!--                        <li class="input-file-wrap__item template"><span class="delete-link"-->
<!--                                                                         title="Удалить">Удалить</span></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->

        </div>
        <div class="register-form-box__btns  flex  justify-content-center">
            <button type="submit" class="register-form-box__btn  button  button_blue"><?= t('Сохранить') ?></button>
            <button data-fancybox-close=""
                    class="register-form-box__btn  register-form-box__btn_back  btn  btn-clear"><?= t('Назад') ?></button>
        </div>
        <?php ActiveForm::end() ?>
    </div>

    <div class="header-popup  header-popup_pay_form <?= $AboutDirectorModal->modalClass; ?>">
        <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times"
                                                                                     aria-hidden="true"></i></button>

        <?php
        $form = ActiveForm::begin([
            'id' => $AboutDirectorModal->formId,
            'options' =>
            [
                'enctype' => 'multipart/form-data',
                'class' => 'register-form-box'
            ]])
        ?>

        <div class="register-form-box__foot">
            <?= t('О компании.') ?>
        </div>
        <br/>
        <div class="register-form-box__main-inputs">
            <?= $form->field($forms2, 'id')->hiddenInput()->label(false) ?>

            <?= $form->field($forms2, 'about_id')->hiddenInput()->label(false) ?>

            <?= $form->field($forms2, 'first_name', [
                'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
                // 'enableAjaxValidation' => true,
            ])->textInput(['placeholder' => t('Имя'), 'class' => 'popup_input director1-input',]) ?>
            <?= $form->field($forms2, 'last_name', [
                'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
                // 'enableAjaxValidation' => true,
            ])->textInput(['placeholder' => t('фамилия'), 'class' => 'popup_input director1-input']) ?>
            <?= $form->field($forms2, 'middle_name', [
                'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
                // 'enableAjaxValidation' => true,
            ])->textInput(['placeholder' => t('Отчество'), 'class' => 'popup_input director1-input']) ?>
            <?= $form->field($forms2, 'position', [
                'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
                // 'enableAjaxValidation' => true,
            ])->textInput(['placeholder' => t('Должность'), 'class' => 'popup_input director1-input']) ?>
            <?= $form->field($forms2, 'imageFile')->fileInput(['class' => 'button  button_green ml-auto mr-auto director1-input'])->label(false) ?>

        </div>
        <div class="register-form-box__btns  flex  justify-content-center">
            <button type="submit" class="register-form-box__btn  button  button_blue"><?= t('Сохранить') ?></button>
            <button data-fancybox-close=""
                    class="register-form-box__btn  register-form-box__btn_back  btn  btn-clear"><?= t('Назад') ?></button>
        </div>
        <?php ActiveForm::end() ?>
    </div>

<?php endif; ?>
<?php $this->registerJs($AboutCompanyModal->script()); ?>
<?php $this->registerJs($AboutDirectorModal->script()); ?>

<?php $this->registerJs("

    $('.create_".$AboutDirectorModal->viewName."').click(function() {
        var AboutID = $(document).find('#companyprofileaboutdirectors-about_id');
        AboutID.val(". $aboutID .")
    });

"
); ?>
