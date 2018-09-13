<div class="instruction">
    <div class="container">
        <a href="#" class="instruction__link">Краткая инструкция по работе с кабинетом компании</a>
    </div>
</div>
<?php //qq($model)?>
<div class="company-office">
    <div class="company-office__container  container">
        <div class="company-office__row  row">
            <button class="company-office__btn-menu  company-office__btn-menu_call  animated  pulse_bigger  infinite"><i class="fa fa-bars" aria-hidden="true"></i></button>
            <?=
            $this->render('_sidebar',['active'=>'tenders']);
            ?>
            <div class="company-office-content  col-md-8  col-lg-9">
                <div class="company-office__title_tenders  content-text">
                    <h2>ООО "<?=$model->name?>"</h2>
                </div>
                <div class="company-tender  background-color-white  ">
                    <div class="company-tender__title  content-text"><h3><?=t('Запросы')?></h3></div>
                    <div class="company-table-wrap">
                        <table class="company-table">
                            <thead class="company-table__thead-title-flex">
                                <tr>
                                    <th>
                                        <div class="company-table__th-in  company-table__th-in_date"><?=t('Дата')?></div>
                                    </th>
                                    <th>
                                        <div class="company-table__th-in  company-table__th-in_requisits"><?=t('Реквизиты')?></div>
                                    </th>
                                    <th>
                                        <div class="company-table__th-in  company-table__th-in_task"><?=t('Задание')?></div>
                                    </th>
                                    <th colspan="2">
                                        <div class="company-table__th-in  company-table__th-in_comment"><?=t('Комментарии')?></div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($model->requests as $request):?>
                                    <tr class="company-table__tr">
                                        <td>
                                            <div class="company-table__td-in  company-table__td-in_date"><?=Yii::$app->formatter->asDate($request->created_at,'d/M/yy')?></div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in  company-table__td-in_requisits">
                                                <div class="company-table__company">
                                                    <a href="<?=\yii\helpers\Url::to(['main/download','file'=>$request->file_requisites])?>" class="company-table__company-download"><i class="fa fa-download" aria-hidden="true"></i></a>
                                                   <?=$request->company_name?>
                                                </div>
                                                <div><?=$request->fio?></div>
                                                <a href="tel:<?=$request->phone?>"><?=$request->phone?></a>
                                                <a href="mailto:<?=$request->email?>"><?=$request->email?></a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in  company-table__td-in_task">
                                                <a href="<?=\yii\helpers\Url::to(['main/download','file'=>$request->file])?>" class="company-table__task-download">
                                                    <i class="fa fa-file-text" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in  company-table__td-in_comment"><?= $request->comment?> </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in  company-table__td-in_request_action">
                                                <button class="company-table__btn  background-color-green"   data-toggle="tooltip"  data-placement="top" title="Обработано"><i class="fa fa-check" aria-hidden="true"></i></button>
                                                <button class="company-table__btn  background-color-red event-close" data-request_id="<?=$request->id?>"  data-toggle="tooltip"  data-placement="top" title="Отказ от запроса"><i class="fa fa-times" aria-hidden="true"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                            <?php endforeach;?>

                            </tbody>
                        </table>
                    </div>
                </div>
<!--                <div class="company-tender  background-color-white  ">-->
<!--                    <div class="company-tender__title  content-text"><h3>Тендеры</h3></div>-->
<!--                    <div class="company-tender__item">-->
<!--                        <div class="flex  justify-content-between  align-items-end  margin-20">-->
<!--                            <div class="company-tender__sub-title content-text">-->
<!--                                <div>-->
<!--                                    <span>Организатор:</span> ООО «ХХХ»-->
<!--                                </div>-->
<!--                                <div>-->
<!--                                    <span>Предмет:</span> какой-то предмет-->
<!--                                </div>-->
<!--                                <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях.</p>-->
<!--                            </div>-->
<!--                            <div class="company-tender__tender">Тендер №12345</div>-->
<!--                        </div>-->
<!--                        <div class="company-table-wrap">-->
<!--                            <table class="company-table">-->
<!--                                <thead class="company-table__thead-title-flex">-->
<!--                                <tr>-->
<!--                                    <th>-->
<!--                                        <div class="company-table__th-in  company-table__th-in_step">Этап</div>-->
<!--                                    </th>-->
<!--                                    <th>-->
<!--                                        <div class="company-table__th-in  company-table__th-in_offers">Предложения</div>-->
<!--                                    </th>-->
<!--                                    <th>-->
<!--                                        <div class="company-table__th-in  company-table__th-in_tender_status">Статус</div>-->
<!--                                    </th>-->
<!--                                    <th>-->
<!--                                        <div class="company-table__th-in  company-table__th-in_result">Результат</div>-->
<!--                                    </th>-->
<!--                                </tr>-->
<!--                                </thead>-->
<!--                                <tbody>-->
<!--                                <tr>-->
<!--                                    <td>-->
<!--                                        <div class="company-table__td-in  company-table__td-in_step">1</div>-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <div class="company-table__td-in  company-table__td-in_offers">Всего 10 предложений</div>-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <div class="company-table__td-in  company-table__td-in_tender_status">-->
<!--                                            <a href="#" class="company-table__status-link">Получен запрос от клиента <span>5</span></a>-->
<!--                                        </div>-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <div class="company-table__td-in  company-table__td-in_result">-->
<!--                                            <div class="company-table__succes">Поздравляем! Вы прошли 2 этап</div>-->
<!--                                        </div>-->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <td>-->
<!--                                        <div class="company-table__td-in  company-table__td-in_step">2</div>-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <div class="company-table__td-in  company-table__td-in_offers">Всего 10 предложений</div>-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <div class="company-table__td-in  company-table__td-in_tender_status">-->
<!--                                            <a href="#" class="company-table__status-link">Получен запрос от клиента <span>5</span></a>-->
<!--                                        </div>-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <div class="company-table__td-in  company-table__td-in_result">-->
<!--                                            <div class="company-table__fail">К сожалению, вам отказали</div>-->
<!--                                        </div>-->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                                </tbody>-->
<!--                            </table>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="company-tender__item">-->
<!--                        <div class="flex  justify-content-between  align-items-end  margin-20">-->
<!--                            <div class="company-tender__sub-title content-text">-->
<!--                                <div>-->
<!--                                    <span>Организатор:</span> ООО «ХХХ»-->
<!--                                </div>-->
<!--                                <div>-->
<!--                                    <span>Предмет:</span> какой-то предмет-->
<!--                                </div>-->
<!--                                <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях.</p>-->
<!--                            </div>-->
<!--                            <div class="company-tender__tender">Тендер №12345</div>-->
<!--                        </div>-->
<!--                        <div class="company-table-wrap">-->
<!--                            <table class="company-table">-->
<!--                                <thead class="company-table__thead-title-flex">-->
<!--                                <tr>-->
<!--                                    <th>-->
<!--                                        <div class="company-table__th-in  company-table__th-in_step">Этап</div>-->
<!--                                    </th>-->
<!--                                    <th>-->
<!--                                        <div class="company-table__th-in  company-table__th-in_offers_large">Предложения</div>-->
<!--                                    </th>-->
<!--                                    <th>-->
<!--                                        <div class="company-table__th-in">Статус</div>-->
<!--                                    </th>-->
<!--                                    <th>-->
<!--                                        <div class="company-table__th-in  company-table__th-in_result">Результат</div>-->
<!--                                    </th>-->
<!--                                </tr>-->
<!--                                </thead>-->
<!--                                <tbody>-->
<!--                                <tr>-->
<!--                                    <td>-->
<!--                                        <div class="company-table__td-in  company-table__td-in_step">1</div>-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <div class="company-table__td-in  company-table__td-in_offers_large">-->
<!--                                            <div>Компания номер один</div>-->
<!--                                            <div>ООО «Компания номер один»</div>-->
<!--                                            <div>Компания номер два</div>-->
<!--                                            <div>ОАО «Компания номер два»</div>-->
<!--                                        </div>-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <div class="company-table__td-in">-->
<!--                                            <a href="#" class="company-table__status-link">Получен запрос от клиента <span>5</span></a>-->
<!--                                        </div>-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <div class="company-table__td-in  company-table__td-in_result">-->
<!--                                            <div class="company-table__succes">Поздравляем! Вы прошли 2 этап</div>-->
<!--                                        </div>-->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <td>-->
<!--                                        <div class="company-table__td-in  company-table__td-in_step">2</div>-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <div class="company-table__td-in  company-table__td-in_offers_large">-->
<!--                                            <div>Компания номер один</div>-->
<!--                                            <div>ООО «Компания номер один»</div>-->
<!--                                            <div>Компания номер два</div>-->
<!--                                            <div>ОАО «Компания номер два»</div>-->
<!--                                        </div>-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <div class="company-table__td-in  company-table__td-in_tender_status">-->
<!--                                            <a href="#" class="company-table__status-link">Получен запрос от клиента <span>5</span></a>-->
<!--                                        </div>-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <div class="company-table__td-in  company-table__td-in_result">-->
<!--                                            <div class="company-table__fail">К сожалению, вам отказали</div>-->
<!--                                        </div>-->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                                </tbody>-->
<!--                            </table>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
    </div>
</div>
<?php
$js =<<<JS

$('button.company-table__btn.background-color-red.event-close').on('click',function() {
    var _this = $(this);
    var id = _this.data('request_id');
  		$.ajax({
				url: "/company/status-request-close",
				type: "get",
				data:{id:id},
				success: function(data){
				}
			});
  		$(this).parents('.company-table__tr').remove();
})
JS;
$this->registerJs($js);




?>
		