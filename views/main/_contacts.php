<?php 

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<div class="row">
    <div class="col-md-6  col-lg-4">
        <div class="content-text">
            <h2>Контакты</h2>
        </div>
        <?php if (!empty($contacts)): ?>
            <div class="subscribe__info">
                <i class="fa fa-map-marker  color-blue" aria-hidden="true"></i>
                <span><?=$contacts->company_name ?></span>
            </div>
            <div class="subscribe__info">
                <i class="fa fa-map-marker  color-blue" aria-hidden="true"></i>
                <span><?=$contacts->adres ?> <a href="#" class="subscribe__info-link">(посмотреть план проезда)</a></span>
            </div>
            <div class="subscribe__info">
                <?php if (!empty($contacts->phonelist)): ?>
                    <i class="fa fa-map-marker  color-blue" aria-hidden="true"></i>
                    <?php foreach ($contacts->phonelist as $key => $value): ?>
                        <a href="tel:<?=$key ?>"><?=$value ?></a>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
            <div class="subscribe__info">
                <?php if (!empty($contacts->emaillist)): ?>
                    <i class="fa fa-map-marker  color-blue" aria-hidden="true"></i>
                    <?php foreach ($contacts->emaillist as $key => $value): ?>
                        <a href="mailto:<?=$key ?>"><?=$value ?></a>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        <?php endif ?>
    </div>
    <div class="col-md-6  col-lg-8">
        <?php $form = ActiveForm::begin(['id' => 'contact-form', 'options' => ['class' => 'subscribe__form']]); ?>
            <div class="content-text">
                <h3>Напишите нам</h3>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <?=$form->field($contModel, 'name', [
                        'template' => '
                            <div class="input-wrap" style="padding-top:1px;">
                                {input}
                                <p class="help-block help-block-error" style="margin-top:-25px;height: 9px;"></p>
                            </div>
                        ',
                    ])->textInput(['autofocus' => true, 'placeholder' => 'Ваше имя', 'class' => 'input']) ?>

                    <?=$form->field($contModel, 'email', [
                        'template' => '
                            <div class="input-wrap" style="padding-top:1px;">
                                {input}
                                <p class="help-block help-block-error" style="margin-top:-25px;height: 9px;"></p>
                            </div>
                        ',
                    ])->textInput(['placeholder' => 'Ваше Email', 'class' => 'input']) ?>

                    <!-- <div class="input-wrap">
                        <input type="text" placeholder="Ваше имя" class="input">
                    </div>
                    <div class="input-wrap">
                        <input type="email" placeholder="Ваше Email" class="input">
                    </div> -->
                    <?/*= $form->field($contModel, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ])*/ ?>
                </div>
                <div class="col-lg-7">
                    <?= $form->field($contModel, 'body', [
                        'template' => '
                            {input}
                            <p class="help-block help-block-error" style="margin-top:-25px;height: 9px;"></p>
                        ',
                    ])->textarea(['rows' => 6, 'class' => 'textarea', 'placeholder' => 'Ваше сообщение']) ?>
                    <!-- <textarea placeholder="Ваше сообщение" class="textarea"></textarea> -->
                </div>
            </div>
            <?= Html::submitButton('Отправить', ['class' => 'subscribe__form-submit  button  button_green']) ?>
            <!-- <input type="submit" value="Отправить" class="subscribe__form-submit  button  button_green"> -->
        <?php ActiveForm::end(); ?>
    </div>
</div>