<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;

    $forms = new \app\models\CompanyProfileClients();
    $clients = $model->companyinfo->getClients()->andWhere(['direction_id' => $direction_id])->all();

    $clientsModal = new \app\components\ModalComponents(
        'buttonNewClients',
        'our_clients',
        'clients-new',
        'clients-event',
        'update_clients',
        'our_clients-form',
        '/company/clients-edit',
        '/company/clients-update',
        '/company/clients-response',
        'companyprofileclients',
        'clients-delete',
        '/company/clients-delete'
    );

?>

<div class="company-profile-box  background-color-white">
    <div class="company-profile-box__content  company-profile-box__content_text  content-text">
        <h3>Наши клиенты
            <?=$clientsModal->mainButton()?>
            <button class="edit create_our_clients" data-event="clients-new">
                <i class="fa fa-plus color-blue" aria-hidden="true"></i>
            </button>
        </h3>
        <p>Пожалуйста, загрузите фотографии или логотипы ваших клиентов и укажите названия компаний (до 10 клиентов)</p>
    </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="company-profile-box__menegers  row">
                    <div class="best-company-slider  owl-carousel  owl-carousel_dots_blue  owl-theme">
                        <?php if(!empty($clients)):?>
                            <?php foreach($clients as $client):?>
<!--                                <div class="company-profile-box__best-slide_add  col-md-3">-->
                                    <div class="company-box" id="our_clients-<?= $client->id ?>">
                                        <div class="company-box__img-wrap  img-wrap">
                                            <?= $clientsModal->indidualButton($client) ?>
                                            <?= $clientsModal->deleteButton($client) ?>
                                            <img src="<?=$client->getPhotos()?>" alt="">
                                        </div>
                                        <div class="company-box__foot  background-color-blue  flex  justify-content-between  align-items-center">
                                            <div  class="company-box__content  content-text  color-white">
                                                <h5><?=$client->name?></h5>
                                            </div>
                                        </div>
                                    </div>
<!--                                </div>-->
                            <?php endforeach;?>
                        <?php endif;?>
                    </div>
                </div>
            </div>

        </div>

</div>

<div class="direction_id" id="<?= $direction_id ?>" hidden></div>

<?php if($first == 0): ?>
<div class="header-popup  header-popup_pay_form update_clients">
    <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times" aria-hidden="true"></i></button>

    <?php

    $form = ActiveForm::begin([
        'action' => '/company/edit-clients',
        'id' => 'our_clients-form',
        'enableAjaxValidation' => true,
        'validationUrl' => Url::toRoute('/company/validation?class='.$forms->className()),
        'options' => ['class' => 'register-form-box']])
    ?>

    <div class="register-form-box__foot">
        <?=t('Добавить наши клиенты.')?>
    </div><br/>
    <div class="register-form-box__main-inputs">


        <?= $form->field($forms, 'id')->hiddenInput()->label(false) ?>

        <?= $form->field($forms, 'direction_id')->hiddenInput()->label(false) ?>

        <?= $form->field($forms, 'action')->hiddenInput()->label(false); ?>

        <?= $form->field($forms, 'name', [
            'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
            // 'enableAjaxValidation' => true,
        ])->textInput(['placeholder'=>t('Название компании').'*','class'=>'popup_input']) ?>
        <?= $form->field($forms, 'imageFile')->fileInput(['class' => 'button  button_green ml-auto mr-auto'])->label(false) ?>
    </div>
    <div class="register-form-box__btns  flex  justify-content-center">
        <button type="submit" class="register-form-box__btn  button  button_blue"><?=t('Сохранить')?></button>
        <button  data-fancybox-close="" class="register-form-box__btn  register-form-box__btn_back  btn  btn-clear"><?=t('Назад')?></button>
    </div>
    <?php ActiveForm::end() ?>
</div>
<?php endif; ?>
<?php $this->registerJs($clientsModal->script());?>
