<?php use yii\helpers\Url;
use yii\widgets\ActiveForm;
$capabilities = $model->companyinfo->getCapabilities()->andWhere(['direction_id' => $direction_id, 'theme_id' => $theme_id])->all();

$modelCapability = new \app\models\CompanyProfileCapabilities();

$capabilitiesModal = new \app\components\ModalComponents(
    'buttonNewCapability',
    'capability',
    'capability-new',
    'capabilities-event',
    'update_capability',
    'capability-form',
    '/company/capability-edit',
    '/company/capability-update',
    '/company/capability-response',
    'companyprofilecapabilities',
    'capability-delete',
    '/company/capability-delete'
);

?>

<div class="company-profile-box  background-color-white">
    <div class="company-profile-box__content  company-profile-box__content_text  content-text">
        <h3>Наши возможности
            <?=$capabilitiesModal->mainButton()?>
        </h3>
        <p>Вы можете добавить фотографии с пояснениями и отредактировать текст, для того, чтобы лучше рассказать потенциальным клиентам о возможностях Вашей компании</p>
    </div>
    <?php if(!empty($capabilities)):?>
        <?php foreach ($capabilities as $capability): ?>
            <div class="our-capabilities__item  row  background-repeat" id="capability-<?= $capability->id ?>">
                <div class="our-capabilities__item-in  col-12">
                    <div class="our-capabilities__background  background-repeat">
                        <div class="our-capabilities__row  row">
                            <div class="our-capabilities__col  col-md-4">
                                <div class="our-capabilities__img-box  row">
<!--                                    <div class="our-capabilities__img  img-wrap">-->
                                        <?= $capabilitiesModal->indidualButton($capability) ?>
                                        <?= $capabilitiesModal->deleteButton($capability) ?>
                                    <?php if(!is_null($model->companyinfo->profileVariants->videos_count) && $capability->getVideos()): ?>
                                        <?php $mediaFiles = array_merge(explode(',', $capability->getVideos()), explode(',', $capability->getPhotos())) ?>
                                    <?php else: ?>
                                        <?php $mediaFiles = explode(',', $capability->getPhotos()) ?>
                                    <?php endif; ?>
                                        <?php foreach ($mediaFiles as $file): ?>
                                            <div class="our-capabilities__img  our-capabilities__img--col  col-6 col-sm-6  img-wrap">
                                        <?php if(isVideo($file)): ?>
                                            <video width="100%" controls="controls">
                                                <source src="/<?=$file?>" type='video/ogg; codecs="theora, vorbis"'>
                                                <source src="/<?=$file?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                                                <source src="/<?=$file?>" type='video/webm; codecs="vp8, vorbis"'>
                                                Тег video не поддерживается вашим браузером.
                                            </video>
                                        <?php else: ?>
                                            <img src="/<?=$file?>" alt="">
                                        <?php endif; ?>
                                            </div>
                                        <?php endforeach; ?>
<!--                                    </div>-->
                                </div>
                                    <div class="our-capabilities__txt  content-text  text-center  background-color-white">
                                        <p> <?=$capability->title?> </p>
                                    </div>

                            </div>
                            <div class="our-capabilities__col  col-md-8">
                                <div class="our-capabilities__content  content-text">
                                    <p><?=$capability->description?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    <?php endif;?>
        <button class="button  button_green create_capability" data-event="capability-new">
            Добавить описание
        </button>
</div>

<div class="direction_id" id="<?= $direction_id ?>" hidden></div>
<div class="theme_id" id="<?= $theme_id ?>" hidden></div>
<?php if($first == 0 && $first2 == 0): ?>
<div class="header-popup  header-popup_pay_form update_capability">
    <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times" aria-hidden="true"></i></button>

    <?php $form = ActiveForm::begin([
        'action' => '/company/capability-update',
        'id' => 'capability-form',
        'enableAjaxValidation' => true,
        'validationUrl' => Url::toRoute('/company/validation?class='.$modelCapability->className()),
        'options' =>
        [
            'class' => 'register-form-box',
            'enctype' => 'multipart/form-data',
        ]
    ])
    ?>

    <div class="register-form-box__foot">
        <?=t('Редактирование Поля Наши возможности.')?>
    </div><br/>
    <div class="register-form-box__main-inputs">

        <?= $form->field($modelCapability, 'id')->hiddenInput()->label(false); ?>

        <?= $form->field($modelCapability, 'action')->hiddenInput()->label(false); ?>

        <?= $form->field($modelCapability, 'direction_id')->hiddenInput()->label(false); ?>

        <?= $form->field($modelCapability, 'theme_id')->hiddenInput()->label(false); ?>

        <?= $form->field($modelCapability, 'user_id')->hiddenInput(['value' => $model->companyinfo->user_id])->label(false); ?>

        <?= $form->field($modelCapability, 'title', [
            'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
        ])->textInput(['placeholder'=>t('Заголовок').'*','class'=>'popup_input'])->label(false); ?>

        <?= $form->field($modelCapability, 'description', [
            'template' => "
				    		 <div class=\"register-form-box__main-input\">\n
				    			{input}\n
							</div>\n
							<p class='help-block help-block-error'></p>
			    		",
            // 'enableAjaxValidation' => true,
        ])->textarea(['placeholder'=>t('Текст').'*','class'=>'popup_input','rows'=>6]) ?>

        <?= $form->field($modelCapability, 'imageFile[]')->fileInput(['class' => 'button  button_green ml-auto mr-auto', 'multiple' => true])->label(false) ?>

        <?php if(!is_null($model->companyinfo->profileVariants->videos_count)): ?>
            <?= $form->field($modelCapability, 'imageFile2[]')->fileInput(['class' => 'button  button_green ml-auto mr-auto', 'multiple' => true])->label(false) ?>
        <?php endif; ?>
    </div>
    <div class="register-form-box__btns  flex  justify-content-center">
        <button type="submit" class="register-form-box__btn  button  button_blue"><?=t('Сохранить')?></button>
        <button  data-fancybox-close="" class="register-form-box__btn  register-form-box__btn_back  btn  btn-clear"><?=t('Назад')?></button>
    </div>
    <?php ActiveForm::end() ?>

</div>
<?php endif; ?>
<?php $this->registerJs($capabilitiesModal->script());?>


