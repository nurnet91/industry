<?php
use yii\widgets\ActiveForm;
?><div class="instruction">
    <div class="container">
        <a href="#" class="instruction__link"><?=

            t('Краткая инструкция по работе с кабинетом компании')?></a>
    </div>
</div>
<div class="company-office">
    <div class="company-office__container  container">
        <div class="company-office__row  row">
            <button class="company-office__btn-menu  company-office__btn-menu_call  animated  pulse_bigger  infinite"><i class="fa fa-bars" aria-hidden="true"></i></button>
            <?=
            $this->render('_sidebar',['active'=>'advertising']);
            ?>
            <div class="company-office-content  col-md-8  col-lg-9">
                <div class="company-advertising  background-color-white">
                    <div class="company-advertising__content content-text content-text--text--center  block-centered">
                        <h2><?=t('Открытые рекламные кампании')?></h2>
                        <p><?=t('Здесь Вы можете отслеживать Ваши рекламные кампанииили отправить запрос на новую рекламную кампанию, нажав кнопку «Заказать новую». Наши специалисты свяжутся с вами для уточнения деталей')?></p>
                    </div>
                </div>
                <?php if(!empty($model->advertisement)): ?>
                    <?php foreach($model->advertisement as $advertisement):?>
                        <div class="company-advertising">
                        <div class="company-advertising__banner  banner  banner_height_smaller  background  background-cover" style="background-image: url(<?='/'.$advertisement->photo?>);"></div>
                        <div class="company-advertising__ban-after  flex  align-items-center  flex-column">
                            <div class="company-advertising__item  col-auto  text-weight-bold"><?=$advertisement->getDateStart()?> - <?=$advertisement->getDateEnd()?></div>
                            <div class="company-advertising__item  col-auto  color-light-grey"><?=t('Количество кликов')?>: <span class="color-regular  text-weight-bold"><?=$advertisement->getCountClicks()?></span></div>
                            <a href="#" class="company-advertising__item  company-advertising__item_btn  button  button_blue">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                <span><?=t('Посмотреть')?></span>
                            </a>
                        </div>
                    </div>
                    <?php endforeach;?>
                <?php endif;?>
                <div class="company-advertising  background-color-white">
                    <div class="flex  justify-content-center  align-items-center">
                        <a href="#" class="company-advertising__item-link  text-decoration-underline  	"><?=t('Сотрудничество и реклама')?></a>
                        <button  data-fancybox="" data-src="#edit_company_info" data-modal="true" data-toggle="tooltip" data-placement="top" class="company-advertising__item-link  button  button_green">
                            <span><?=t('Заказать новую')?></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="header-popup  header-popup_pay_form" id="edit_company_info">
    <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times" aria-hidden="true"></i></button>

    <?php $form = ActiveForm::begin([
        'action' => '/company/create-advertising',
        'options' => ['class' => 'register-form-box','enctype' => 'multipart/form-data']])
    ?>

    <div class="register-form-box__foot">
        <?=t('Заказать рекламу')?>
    </div><br/>
    <div class="register-form-box__main-inputs">
        <?= $form->field($advertisement, 'date_start', [
            'template' => "
	      <div class=\"register-form-box__main-input\">     
                                <input type=\"date\" max='".date('Y-m-d')."' name='Advertisement[date_start]'>
                                <i class=\"register-form-box__fa  fa fa-calendar\" aria-hidden=\"true\"></i>
                            </div>
                            <p class='help-block help-block-error'></p>
			    		",
            // 'enableAjaxValidation' => true,
        ])->textInput(['placeholder'=>t('Дата начало').'*','class'=>'popup_input']) ?>
        <?= $form->field($advertisement, 'date_end', [
            'template' => "
	                      <div class=\"register-form-box__main-input\">
                                <input type=\"date\" max='".date('Y-m-d')."' name='Advertisement[date_end]'>
                                <i class=\"register-form-box__fa  fa fa-calendar\" aria-hidden=\"true\"></i>
                            </div>
                                                      <p class='help-block help-block-error'></p>

			    		",
            // 'enableAjaxValidation' => true,
        ])->textInput(['placeholder'=>t('Дата конца').'*','class'=>'popup_input']) ?>
        <?= $form->field($advertisement, 'imageFile'
                            , [
                            'template' => '
                                <label class="add_tender_file button button_green ml-auto mr-auto">
                                    Загрузить фото
                                    {input}
                                </label>
                                <p class=\'help-block help-block-error\'></p>
                                '


                                ]
        )->fileInput(['class' => 'button  button_green ml-auto mr-auto','Advertisement[imageFile]'])->label(false) ?>
    <div class="register-form-box__btns  flex  justify-content-center">
        <button type="submit" class="register-form-box__btn  button  button_blue"><?=t('Сохранить')?></button>
        <button  data-fancybox-close="" class="register-form-box__btn  register-form-box__btn_back  btn  btn-clear"><?=t('Назад')?></button>
    </div>
    </div>
    <?php ActiveForm::end() ?>
</div>
		