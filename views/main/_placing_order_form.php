<?php
$company_name ='';
$first_name = '';
$last_name = '';
$middle_name = '';
$user_email = '';
if(!empty($user)){
    if(!empty($user->companyinfo)){
        $company_name = $user->companyinfo->name;
        $first_name = $user->companyinfo->first_name;
        $last_name = $user->companyinfo->last_name;
        $middle_name = $user->companyinfo->middle_name;
        $user_email = $user->email;
        $phone = $user->companyinfo->phone;

    }
    if(!empty($user->info)){
        $company_name = $user->info->company;
        $first_name = $user->info->first_name;
        $last_name = $user->info->last_name;
        $middle_name = $user->info->middle_name;
        $user_email = $user->email;
        $phone = $user->info->phone;
    }
}



?>
<div class="send_to_tender" id="forms">
    <div class="container">

        <div class="send_to_tender__title  content-text">
            <h2>Отправить задание</h2>
        </div>

        <div class="siteform">
            <?php $form = \yii\widgets\ActiveForm::begin([
                    'action' => '/main/add-placing-order'
            ])?>
                <div class="siteform__title  content-text"><h3>Выбранные компании:</h3></div>
                <ul class="choosen_companies">
                </ul>

                <!-- <label class="public_tender  checkbox-label">
                    <input type="checkbox" class="checkbox-label__input-check">
                    <span class="checkbox-label__pseudo-check"></span>
                    <span>Публичный тендер</span>
                </label> -->
                <div class="siteform__after-public  content-else">
                    <p>Публичный тендер предполагает, что задание публикуется в открытом доступе, и любая компания может принять в нем участие, предложив свое решение</p>
                </div>
            <div class="container width_100">
                    <div class="row">
                        <?=$form->field($model,'ids')->hiddenInput()->label(false)?>

                        <div class="siteform__col  col-md-6  col-lg-3">
                            <div class="content-text important"><h3>Название компании</h3></div>
                            <?= $form->field($model,'company_name')->textInput(['placeholder'=>t('Организация'),'class'=>'input','value'=>$company_name])->label(false)?>
<!--                            <input type="text" placeholder="Организация" class="input">-->
                        </div>
                        <div class="siteform__col  col-md-6  col-lg-3">
                            <div class="content-text important"><h3>Телефон</h3></div>
                            <?= $form->field($model,'phone')->textInput(['placeholder'=>t('Номер телефона для связи'),'class'=>'input','value'=>$phone])->label(false)?>

<!--                            <input type="text" placeholder="Номер телефона для связи" class="input">-->
                        </div>
                        <div class="siteform__col  col-md-6  col-lg-3">
                            <div class="content-text important"><h3>Email</h3></div>
                            <?= $form->field($model,'email')->textInput(['placeholder'=>t('Адрес почты для связи'),'class'=>'input','value'=>$user_email])->label(false)?>

<!--                            <input type="text" placeholder="Адрес почты для связи" class="input">-->
                        </div>
                        <div class="siteform__col  col-md-6  col-lg-4">
                            <div class="content-text important"><h3>Фамилия</h3></div>
                            <?= $form->field($model,'last_name')->textInput(['placeholder'=>t('Фамилия'),'class'=>'input','value'=>$last_name])->label(false)?>

<!--                            <input type="text" placeholder="Иванов" class="input">-->
                        </div>
                        <div class="siteform__col  col-md-6  col-lg-4 ">
                            <div class="content-text important"><h3>Имя</h3></div>
                            <?= $form->field($model,'first_name')->textInput(['placeholder'=>t('Имя'),'class'=>'input','value'=>$first_name])->label(false)?>

<!--                            <input type="text" placeholder="Иван" class="input">-->
                        </div>
                        <div class="siteform__col  col-md-6  col-lg-4">
                            <div class="content-text important"><h3>Отчество</h3></div>
                            <?= $form->field($model,'middle_name')->textInput(['placeholder'=>t('Отчество'),'class'=>'input','value'=>$middle_name])->label(false)?>

<!--                            <input type="text" placeholder="Иванович" class="input">-->
                        </div>
                        <div class="siteform__col  col-md-6  col-12">
                            <div class="content-text important"><h3>Реквизиты</h3></div>
                            <div class="siteform__textarea-wrap">
                                <?= $form->field($model, 'requisites', [
                                    'template' => "
                                <p class='help-block help-block-error'></p>
                               {input}
				    		   <label class=\"siteform__textarea-file\">
                                    <i class=\"fa fa-upload\" aria-hidden=\"true\"></i>
                                    <input type=\"file\" id='' name=PlacementRequests[dataFileRequisites]' class=\"siteform__file-hide\">
                                </label>
							
			    		",
                                ])->textarea(['placeholder'=>t('Вы можете скопировать реквизиты Вашей компании в поле или загрузить файл').'*','class'=>'textarea  textarea_requisits']) ?>
<!--                                <textarea class="textarea  textarea_requisits" placeholder="Вы можете скопировать реквизиты Вашей компании в поле или загрузить файл"></textarea>-->
<!--                                <label class="siteform__textarea-file">-->
<!--                                    <i class="fa fa-upload" aria-hidden="true"></i>-->
<!--                                    <input type="file" class="siteform__file-hide">-->
<!--                                </label>-->
                            </div>
                            <div class="siteform__col">
                                <div class="row  align-items-center">
                                    <div class="gutters  text  margin-b-10">Загрузите файл с описанием Вашего запроса</div>
                                    <div class="gutters  siteform__description-request  margin-b-10">
                                        <?= $form->field($model, 'dataFile'
                                            , [
                                                'template' => '
                                         <label class="">
                                            <i class="fa fa-upload" aria-hidden="true"></i>
                                            {input}
                                        </label>
                                        <p class=\'help-block help-block-error\'></p>

                                        '
                                            ]
                                        )->fileInput(['class' => 'siteform__file-hide'])->label(false) ?>
<!--                                        <label class="">-->
<!--                                            <i class="fa fa-upload" aria-hidden="true"></i>-->
<!--                                            <input type="file" class="siteform__file-hide">-->
<!--                                        </label>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php //TODO файл инпут не работает не отправлаеться данные?>
                        <div class="siteform__col  col-md-6">
                            <div class="content-text"><h3>Комментарий</h3></div>
                            <div class="siteform__textarea-com">
                                <?=$form->field($model,'comment')->textarea(['class'=>'textarea','placeholder'=>t('Напишите комментарий к заданию. Например, если у вас срочный заказ')])->label(false)?>
<!--                                <textarea class="textarea" placeholder="Напишите комментарий к заданию. Например, если у вас срочный заказ"></textarea>-->
                            </div>
                        </div>
                    </div>
                    <div class="siteform__buttons-row  row  justify-content-center">
                        <a class="siteform__button  button button_blue clear-button" style="color: white;">Очистить</a>
                        <input type="submit" class="siteform__button  button button_blue" value="Отправить">
                    </div>
                </div>
            <?php \yii\widgets\ActiveForm::end()?>
        </div>
    </div>
</div>
