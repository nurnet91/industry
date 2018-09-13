<?php $form = \yii\widgets\ActiveForm::begin(
        [
            'options'=>['class'=>'organize-webinar  organize-webinar_company'],
            'action'=>'/company/edit-webinars',

        ]
)?>
    <div class="organize-webinar__title-main  content-text">
        <h2>Организовать вебинар</h2>
        <p>Если вы хотите организовать вебинар, пожалуйста, заполните форму ниже. Наши специалисты свяжутся с указанным Организатором мероприятия для уточнения деталей вебинара.</p>
    </div>
    <div class="row  align-items-end  align-items-xl-start">
        <div class="organize-webinar__col  col-lg-7  col-xl-5">
            <div class="content-text">
                <h3>Дата проведения</h3>
            </div>
            <div class="date-birth  clear">
                <?= $form->field($model,'date_day')->dropDownList(dayList(),['class'=>'select  select_sub  select_sub_small auto_width no_clear'])->label(false) ?>
                <?= $form->field($model,'date_month')->dropDownList(monthsList(),['class'=>'select  select_sub auto_width no_clear'])->label(false) ?>
                <?= $form->field($model,'date_year')->dropDownList(yearList(),['class'=>'select  select_sub auto_width no_clear'])->label(false) ?>
            </div>
        </div>
        <div class="organize-webinar__col  col  col-sm-6  col-xl-4">
            <div class="content-text">
                <h3>Время проведения</h3>
            </div>
            <div class="date-birth  clear">

                <?= $form->field($model, 'date_hours', [
                    'template' => "
							<p class='help-block help-block-error'></p>
				    	   <div class=\"input-wrap  input-wrap_number  input-wrap_day\">
                              <div class=\"input-wrap__btn  input-wrap__btn_plus\"><i class=\"fa fa-angle-up\" aria-hidden=\"true\"></i></div>
                              {input}
                             <div class=\"input-wrap__btn  input-wrap__btn_minus\"><i class=\"fa fa-angle-down\" aria-hidden=\"true\"></i></div>
                           </div>
			    		",
                    // 'enableAjaxValidation' => true,
                ])->textInput(['type'=>'number','class'=>'input  input_number','value'=>13]) ?>
                <div class="organize-webinar__numbers-devider">:</div>
                <?= $form->field($model, 'date_minutes', [
                    'template' => "
							<p class='help-block help-block-error'></p>
				    	   <div class=\"input-wrap  input-wrap_number  input-wrap_day\">
                              <div class=\"input-wrap__btn  input-wrap__btn_plus\"><i class=\"fa fa-angle-up\" aria-hidden=\"true\"></i></div>
                              {input}
                             <div class=\"input-wrap__btn  input-wrap__btn_minus\"><i class=\"fa fa-angle-down\" aria-hidden=\"true\"></i></div>
                           </div>
			    		",
                    // 'enableAjaxValidation' => true,
                ])->textInput(['type'=>'number','class'=>'input  input_number','value'=>0]) ?>
            </div>
        </div>
        <div class="organize-webinar__col  col  col-sm-6  col-xl-3">
            <div class="content-text">
                <h3>Длительность</h3>
            </div>
            <div class="organize-webinar__numbers  date-birth">
                <div class="row  align-items-center">
                    <div class="gutters">
                        <?= $form->field($model, 'time_duration', [
                            'template' => "
				    	   <div class=\"input-wrap  input-wrap_number  input-wrap_day\">
                              <div class=\"input-wrap__btn  input-wrap__btn_plus\"><i class=\"fa fa-angle-up\" aria-hidden=\"true\"></i></div>
                              {input}
                             <div class=\"input-wrap__btn  input-wrap__btn_minus\"><i class=\"fa fa-angle-down\" aria-hidden=\"true\"></i></div>
                           </div>
							<p class='help-block help-block-error'></p>
			    		",
                            // 'enableAjaxValidation' => true,
                        ])->textInput(['type'=>'number','class'=>'input  input_number','value'=>0]) ?>
                    </div>
                    <div class="text margin-b-10  color-light-grey">минут</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="organize-webinar__col  col-xl-6">
            <div class="content-text">
                <h3>Тема</h3>
            </div>
            <?= $form->field($model, 'topic')->textarea(['type'=>'number','class'=>'organize-webinar__textarea-small  textarea','placeholder'=>'Тема вашего предстоящего вебинара'])->label(false) ?>
            <div class="row  align-items-center  justify-content-center">
                <div class="gutters  margin-b-10">Программа Вебинара:</div>
                <div class="gutters">
                    <?=$form->field($model,'dataFile',[
                        'template'=>
                            '
                                <label class="file-button  button button_green  margin-b-10">
                                 Загрузить файлы
                                 {input}
                                </label>
                                <p class=\'help-block help-block-error\'></p>
                            '

                    ])->fileInput(['class'=>'file-button__file'])->label(false)?>
                </div>
            </div>
        </div>
        <div class="organize-webinar__col  col-xl-6">
            <div class="content-text">
                <h3>Аннтоация</h3>
            </div>
            <?= $form->field($model, 'annotation')->textarea(['type'=>'number','class'=>'organize-webinar__textarea  textarea','placeholder'=>'Опишите основные идеи вебинара. Ограничение 400 символов с пробелами'])->label(false) ?>
        </div>
    </div>
    <div class="content-text">
        <h3>Докладчик</h3>
    </div>
    <div class="organize-webinar__col">
        <div class="row">
            <div class="organize-webinar__col-in  col-lg-6  col-xl-4">
                <?= $form->field($model, 'speaker_last_name', [
                    'template' => "
				    	   <div class=\"organize-webinar__input-wrap  input-wrap\">
                              {input}
                             <i class=\"fa fa-user\" aria-hidden=\"true\"></i>
                            </div>
							<p class='help-block help-block-error'></p>
			    		",
                    // 'enableAjaxValidation' => true,
                ])->textInput(['type'=>'text','class'=>'input','placeholder'=>'Фамилия докладчика*']) ?>
            </div>
            <div class="organize-webinar__col-in  col-lg-6  col-xl-4">
                <?= $form->field($model, 'speaker_name', [
                    'template' => "
				    	   <div class=\"organize-webinar__input-wrap  input-wrap\">
                              {input}
                            </div>
							<p class='help-block help-block-error'></p>
			    		",
                    // 'enableAjaxValidation' => true,
                ])->textInput(['type'=>'text','class'=>'input','placeholder'=>'Имя докладчика*']) ?>
            </div>
            <div class="organize-webinar__col-in  col-lg-6  col-xl-4">
                <?= $form->field($model, 'speaker_middle_name', [
                    'template' => "
				    	   <div class=\"organize-webinar__input-wrap  input-wrap\">
                              {input}
                            </div>
							<p class='help-block help-block-error'></p>
			    		",
                    // 'enableAjaxValidation' => true,
                ])->textInput(['type'=>'text','class'=>'input','placeholder'=>'Отчество докладчика*']) ?>
            </div>
            <div class="organize-webinar__col-in  col-lg-6">
                <?= $form->field($model, 'speaker_position', [
                    'template' => "
				    	   <div class=\"organize-webinar__input-wrap  input-wrap\">
                              {input}
                          <i class=\"fa fa-users\" aria-hidden=\"true\"></i>

                            </div>

							<p class='help-block help-block-error'></p>
			    		",
                    // 'enableAjaxValidation' => true,
                ])->textInput(['type'=>'text','class'=>'input','placeholder'=>'Должность*']) ?>
            </div>
            <div class="organize-webinar__col-in  col-lg-6">
                <?= $form->field($model, 'speaker_company_name', [
                    'template' => "
				    	   <div class=\"organize-webinar__input-wrap  input-wrap\">
                              {input}
                             <i class=\"fa fa-building\" aria-hidden=\"true\"></i>

                            </div>
							<p class='help-block help-block-error'></p>
			    		",
                    // 'enableAjaxValidation' => true,
                ])->textInput(['type'=>'text','class'=>'input','placeholder'=>'Компания*']) ?>
            </div>
        </div>
    </div>
    <div class="content-text">
        <h3>Организатор</h3>
    </div>
    <div class="organize-webinar__col">
        <div class="row">
            <div class="organize-webinar__col-in  col-lg-6  col-xl-4">
                <?= $form->field($model, 'organizer_last_name', [
                    'template' => "
				    	   <div class=\"organize-webinar__input-wrap  input-wrap\">
                              {input}
                             <i class=\"fa fa-user\" aria-hidden=\"true\"></i>
                            </div>
							<p class='help-block help-block-error'></p>
			    		",
                    // 'enableAjaxValidation' => true,
                ])->textInput(['type'=>'text','class'=>'input','placeholder'=>'Фамилия организатор*']) ?>
            </div>
            <div class="organize-webinar__col-in  col-lg-6  col-xl-4">
                <?= $form->field($model, 'organizer_name', [
                    'template' => "
				    	   <div class=\"organize-webinar__input-wrap  input-wrap\">
                              {input}
                            </div>
							<p class='help-block help-block-error'></p>
			    		",
                    // 'enableAjaxValidation' => true,
                ])->textInput(['type'=>'text','class'=>'input','placeholder'=>'Имя организатора*']) ?>
            </div>
            <div class="organize-webinar__col-in  col-lg-6  col-xl-4">
                <?= $form->field($model, 'organizer_middle_name', [
                    'template' => "
				    	   <div class=\"organize-webinar__input-wrap  input-wrap\">
                              {input}
                            </div>
							<p class='help-block help-block-error'></p>
			    		",
                    // 'enableAjaxValidation' => true,
                ])->textInput(['type'=>'text','class'=>'input','placeholder'=>'Отчество организатора*']) ?>
            </div>
            <div class="organize-webinar__col-in  col-lg-6">
                <?= $form->field($model, 'organizer_position', [
                    'template' => "
				    	   <div class=\"organize-webinar__input-wrap  input-wrap\">
                              {input}
                          <i class=\"fa fa-users\" aria-hidden=\"true\"></i>

                            </div>
							<p class='help-block help-block-error'></p>
			    		",
                    // 'enableAjaxValidation' => true,
                ])->textInput(['type'=>'text','class'=>'input','placeholder'=>'Должность*']) ?>
            </div>
            <div class="organize-webinar__col-in  col-lg-6">
                <?= $form->field($model, 'organizer_company_name', [
                    'template' => "
				    	   <div class=\"organize-webinar__input-wrap  input-wrap\">
                              {input}
                             <i class=\"fa fa-building\" aria-hidden=\"true\"></i>

                            </div>
							<p class='help-block help-block-error'></p>
			    		",
                    // 'enableAjaxValidation' => true,
                ])->textInput(['type'=>'text','class'=>'input','placeholder'=>'Компания*']) ?>
            </div>
            <div class="organize-webinar__col-in  col-lg-6  col-xl-4">
                <?= $form->field($model, 'phone', [
                    'template' => "
				    	   <div class=\"organize-webinar__input-wrap  input-wrap\">
                              {input}
                              <i class=\"fa fa-phone\" aria-hidden=\"true\"></i>

                            </div>
							<p class='help-block help-block-error'></p>
			    		",
                    // 'enableAjaxValidation' => true,
                ])->textInput(['type'=>'text','class'=>'input','placeholder'=>'Телефон*']) ?>
            </div>
            <div class="organize-webinar__col-in  col-lg-6  col-xl-4">
                <?= $form->field($model, 'email', [
                    'template' => "
				    	   <div class=\"organize-webinar__input-wrap  input-wrap\">
                              {input}
                            <i class=\"fa fa-envelope\" aria-hidden=\"true\"></i>

                            </div>
							<p class='help-block help-block-error'></p>
			    		",
                    // 'enableAjaxValidation' => true,
                ])->textInput(['type'=>'text','class'=>'input','placeholder'=>'Email*']) ?>
            </div>
        </div>
    </div>
    <input type="submit" value="Отправить" class="organize-webinar__button-submit  button button_blue  block-centered  margin-b-10">
    <div class="text  color-light-grey  text-right">*Все поля обязательны к заполнению</div>
<?php \yii\widgets\ActiveForm::end()?>