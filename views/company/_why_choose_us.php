<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$chooses = $model->companyinfo->getChooses()->andWhere(['direction_id' => $direction_id])->all();

$modelChoose = new \app\models\CompanyProfileChooses();

$choosesModal = new \app\components\ModalComponents(
'buttonNewChooses',
'chooses',
'chooses-new',
'chooses-event',
'update-chooses',
'chooses-update',
'/company/edit-choose',
'/company/choose-update',
'/company/choose-response',
'companyprofilechooses',
'choose-delete',
'/company/choose-delete'
);

?>

<div class="company-profile-box  background-color-white">
    <div class="company-profile-box__content  company-profile-box__content_text  content-text">
        <h3>Почему нас выбирают
            <?=$choosesModal->mainButton()?>
        </h3>
        <p>Пожалуйста, приложите дополнительные фотографии и сильные стороны Вашей компании</p>
    </div>
    <div class="feature-section  feature-section_profile">
        <div class="feature-section__row  feature-section__row_profile  row">
            <?php if(!empty($chooses)):?>
                <?php foreach($chooses as $key => $choose):?>
                    <?php $chooses123 = true ?>
                    <?php if($key == 0):?>
                      <div class="feature-section__main-col  feature-section__main-col_profile  col-lg-6" id="chooses-<?= $choose->id ?>">
                        <a href="#" class="feature-section__img  feature-section__img--large  feature-section__img--large_profile  img-wrap">
                            <img src="<?=$choose->getPhotos()?>" alt="">
                            <div class="feature-section__feature  feature-section__feature_profile  content-text">
                                <h3><?=$choose->description?></h3>
                            </div>
                            <?= $choosesModal->indidualButton($choose) ?>
                            <?= $choosesModal->deleteButton($choose) ?>
                        </a>
                      </div>
                    <div class="feature-section__main-col  feature-section__main-col_profile  col-lg-6">
                        <div class="feature-section__row-in  feature-section__row-in_profile  row">
                    <?php else:?>
                            <div class="feature-section__col-in  feature-section__col-in_profile  col-sm-6" id="chooses-<?= $choose->id ?>">
                                <a href="#" class="feature-section__img  feature-section__img_profile  img-wrap">
                                    <img src="<?=$choose->getPhotos()?>" alt="">
                                    <div class="feature-section__feature  feature-section__feature_profile  content-text">
                                        <h3><?=$choose->description;?></h3>
                                    </div>
                                    <?= $choosesModal->indidualButton($choose) ?>
                                    <?= $choosesModal->deleteButton($choose) ?>
                                </a>
                            </div>
                    <?php endif;?>
                <?php endforeach;?>
                <?php if(count($chooses) < $model->companyinfo->profileVariants->photos_count || $model->companyinfo->profileVariants->photos_count == 0): ?>
                        <div class="feature-section__col-in  feature-section__col-in_profile  col-sm-6">
                            <button data-event="chooses-new"  class="btn-add  btn-add_feature edit create_chooses">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                        </div>
                <?php endif; ?>
                    </div>
                </div>
            <?php else: ?>
                <?php if(count($chooses) < $model->companyinfo->profileVariants->photos_count || $model->companyinfo->profileVariants->photos_count == 0): ?>
                    <div class="ads-section__col  col-md-4  col-lg-4">
                        <button data-event="chooses-new"  class="btn-add  btn-add_menegers edit create_chooses">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                    </div>
                <?php endif; ?>
            <?php endif ?>



        </div>
    </div>
</div>
<div class="direction_id" id="<?= $direction_id ?>" hidden></div>

<?php if($first == 0): ?>
<div class="header-popup  header-popup_pay_form update-chooses">
    <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times" aria-hidden="true"></i></button>

    <?php
    $form = ActiveForm::begin([
        'action' => '/company/edit-choose',
        'id' => 'chooses-update',
        'enableAjaxValidation' => true,
        'validationUrl' => Url::toRoute('/company/validation?class='.$modelChoose->className()),
        'options' => ['class' => 'register-form-box']])

    ?>

    <div class="register-form-box__foot">
        <?=t('Добавит "Почему нас выбирают".')?>
    </div><br/>
    <div class="register-form-box__main-inputs">

        <?= $form->field($modelChoose, 'id')->hiddenInput()->label(false) ?>

        <?= $form->field($modelChoose, 'action')->hiddenInput()->label(false); ?>

        <?= $form->field($modelChoose, 'direction_id')->hiddenInput()->label(false) ?>

        <?= $form->field($modelChoose, 'description', [
            'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
            // 'enableAjaxValidation' => true,
        ])->textarea(['placeholder'=>t('Название компании').'*','class'=>'popup_input','rows'=>6]) ?>
        <?= $form->field($modelChoose, 'imageFile')->fileInput(['class' => 'button  button_green ml-auto mr-auto'])->label(false) ?>
    </div>
    <div class="register-form-box__btns  flex  justify-content-center">
        <button type="submit" class="register-form-box__btn  button  button_blue"><?=t('Сохранить')?></button>
        <button  data-fancybox-close="" class="register-form-box__btn  register-form-box__btn_back  btn  btn-clear"><?=t('Назад')?></button>
    </div>
    <?php ActiveForm::end() ?>
</div>
<?php endif; ?>

<?php $this->registerJs($choosesModal->script());?>
