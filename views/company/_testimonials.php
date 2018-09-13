<?php use yii\widgets\ActiveForm;
$forms = new \app\models\CompanyProfileTestimonials();
$testimonials = $model->companyinfo->getTestimonials()->andWhere(['direction_id' => $direction_id])->all();

$testimonialsModal = new \app\components\ModalComponents(
    'buttonNewTestimonial',
    'testimonial',
    'testimonial-new',
    'testimonial-event',
    'update-testimonial',
    'testimonials-form',
    '/company/testimonials-edit',
    '/company/testimonials-update',
    '/company/testimonials-response',
    'companyprofiletestimonials',
    'testimonials-delete',
    '/company/testimonials-delete'
);



?>

<div class="company-profile-box  background-color-white">
    <div class="company-profile-box__content  company-profile-box__content_text  content-text">
        <h3>Отзывы
            <?=$testimonialsModal->mainButton()?>
            <button class="edit create_testimonial" data-event="testimonial-new">
                <i class="fa fa-plus color-blue" aria-hidden="true"></i>
            </button>
        </h3>
        <p>Прежде чем что-то купить, все любят читать отзывы. Пожалуйста, опубликуйте несколько отзывов о работе с Вашей компанией.</p>
    </div>
    <div class="testimonials  testimonials_profile in">
        <div class="slide_testim_profile owl-carousel  owl-carousel_nav_angle  owl-carousel_nav_angle_blue">
            <?php if(!empty($testimonials)):?>
                <?php foreach($testimonials as $testimonial):?>
                    <div class="item  item_profile" id="testimonial-<?= $testimonial->id ?>">
                        <div class="flex jcsb  justify-content-center  justify-content-lg-start">
                            <div class="left  left_profile">
                                <?= $testimonialsModal->indidualButton($testimonial) ?>
                                <?= $testimonialsModal->deleteButton($testimonial) ?>
                                <div class="user_pic  user_pic_profile"><img src="<?=$testimonial->getPhotos()?>" alt=""></div>
                                <div class="user_name  user_name_profile">
                                    <span><?=$testimonial->fio?></span>
                                    <?= $testimonial->position?> <?=$testimonial->company_name?>
                                </div>
                            </div>
                            <div class="right">
                                <div class="testim  testim_profile"><?=$testimonial->description?></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>
</div>

<div class="direction_id" id="<?= $direction_id ?>" hidden></div>
<?php if($first == 0): ?>
<div class="header-popup  header-popup_pay_form update-testimonial">
    <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times" aria-hidden="true"></i></button>

    <?php
    $form = ActiveForm::begin([
        'action' => '/company/edit-testimonials',
        'id' => 'testimonials-form',
        'options' => ['class' => 'register-form-box']])
    ?>

    <div class="register-form-box__foot">
        <?=t('Добавить Отзыв.')?>
    </div><br/>
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
            // 'enableAjaxValidation' => true,
        ])->textarea(['placeholder'=>t('Текст').'*','class'=>'popup_input','rows'=>12]) ?>

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

        <?= $form->field($forms, 'company_name', [
            'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
            // 'enableAjaxValidation' => true,
        ])->textInput(['placeholder'=>t('Название компании'),'class'=>'popup_input']) ?>

        <?= $form->field($forms, 'position', [
            'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
            // 'enableAjaxValidation' => true,
        ])->textInput(['placeholder'=>t('Должност'),'class'=>'popup_input']) ?>
        <?= $form->field($forms, 'imageFile')->fileInput(['class' => 'button  button_green ml-auto mr-auto'])->label(false) ?>
    </div>
    <div class="register-form-box__btns  flex  justify-content-center">
        <button type="submit" class="register-form-box__btn  button  button_blue"><?=t('Сохранить')?></button>
        <button  data-fancybox-close="" class="register-form-box__btn  register-form-box__btn_back  btn  btn-clear"><?=t('Назад')?></button>
    </div>
    <?php ActiveForm::end() ?>
</div>
<?php endif; ?>
<?php $this->registerJs($testimonialsModal->script());?>
