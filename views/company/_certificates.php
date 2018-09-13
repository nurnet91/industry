<?php

use yii\widgets\ActiveForm;

$forms = new \app\models\CompanyProfileCertificates();
$certificates = $model->companyinfo->getCertificates()->andWhere(['direction_id' => $direction_id])->all();

$modal = new \app\components\ModalComponents(
        'buttonNewCertificates',
        'certificates',
        'certificates-top',
        'certificates-event',
        'update-certificates',
        'certificates-update',
        '/company/edit-certificates',
        '/company/certificate-update',
        '/company/certificate-response',
        'companyprofilecertificates',
        'certificates-delete',
        '/company/certificates-delete'
        );
?>

<div class="company-profile-box  background-color-white">
    <div class="company-profile-box__content  company-profile-box__content_text  content-text">
        <h3>Сертификаты
        <?=$modal->mainButton()?>
        </h3>
        <p>Пожалуйста, добавьте необходимые сертификаты для подтверждения компетенций Вашей компании</p>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="company-profile-box__menegers  row">
                    <?php if(!empty($certificates)):?>
                        <?php foreach($certificates as $certificate):?>

                            <div class="ads-section__col  col-md-4  col-lg-4"  id="certificates-<?= $certificate->id ?>">
                                <div class="ads-box  ads-box_profile">

                                    <div class="ads-box__img-wrap  ads-box__img-wrap_profile  img-wrap">
                                        <img src="<?=$certificate->getPhotos()?>" alt="">
                                    </div>
                                    <div class="sertificate-box__text  text  text-center"><?=$certificate->description;?></div>
                                </div>
                                <?= $modal->indidualButton($certificate) ?>
                                <?= $modal->deleteButton($certificate) ?>
                            </div>

                        <?php endforeach;?>
                    <?php endif;?>
                <div class="ads-section__col  col-md-4  col-lg-4">
                    <button data-event="certificates-top" class="btn-add  btn-add_menegers edit create_certificates">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="direction_id" id="<?= $direction_id ?>" hidden></div>
<?php if($first): ?>
<div class="header-popup  header-popup_pay_form update-certificates">
    <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times" aria-hidden="true"></i></button>

    <?php
    $form = ActiveForm::begin([
        'id'=>'certificates-update',
        'options' => ['class' => 'register-form-box']])
    ?>

    <div class="register-form-box__foot">
        <?=t('Добавить сертификаты .')?>
    </div><br/>
    <div class="register-form-box__main-inputs">

        <?= $form->field($forms, 'id')->hiddenInput()->label(false) ?>

        <?= $form->field($forms, 'direction_id')->hiddenInput(['value' => $direction_id])->label(false) ?>

        <?= $form->field($forms, 'description', [
            'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
            // 'enableAjaxValidation' => true,
        ])->textarea(['placeholder'=>t('Название').'*','class'=>'popup_input','rows'=>6]) ?>
        <?= $form->field($forms, 'imageFile')->fileInput(['class' => 'button  button_green ml-auto mr-auto'])->label(false) ?>
    </div>
    <div class="register-form-box__btns  flex  justify-content-center">
        <button type="submit" class="register-form-box__btn  button  button_blue"><?=t('Сохранить')?></button>
        <button  data-fancybox-close="" class="register-form-box__btn  register-form-box__btn_back  btn  btn-clear"><?=t('Назад')?></button>
    </div>
    <?php ActiveForm::end() ?>
</div>

<?php endif; ?>

<?php $this->registerJs($modal->script());?>
