    <div class="instruction">
        <div class="container">
            <a href="#" class="instruction__link">Краткая инструкция по работе с личным кабинетом</a>
        </div>
    </div>
    <div class="company-office">
        <div class="company-office__container  container">
            <div class="company-office__row  row">
                <button class="company-office__btn-menu  company-office__btn-menu_call  animated  pulse_bigger  infinite"><i class="fa fa-bars" aria-hidden="true"></i></button>

                <div class="company-menu  company-menu_mob  col-md-4  col-lg-3  block-margin-adaptive">
                    <button class="company-menu__btn-close  company-menu__btn-close_close  animated  pulse_bigger  infinite"><i class="fa fa-times" aria-hidden="true"></i></button>
                    <ul>
                        <li>
                            <a href="<?= \yii\helpers\Url::to('/personal')?>">Главная</a>
                        </li>
                        <li>
                            <a href="<?= \yii\helpers\Url::to('/personal/interests')?>">Мои интересы</a>
                        </li>
                        <li>
                            <a href="<?= \yii\helpers\Url::to('/personal/settings')?>">Настройки</a>
                        </li>
                        <li>
                            <a href="<?= \yii\helpers\Url::to('/personal/activity')?>">Активность</a>
                        </li>
                        <li class="company-menu__active">
                            <span>Тендеры</span>
                        </li>
                        <li>
                            <a href="<?= \yii\helpers\Url::to('/personal/publish')?>">Опубликовать</a>
                        </li>
                    </ul>
<!--                    <div style="position: static; width: 210px; height: 354px; display: block; vertical-align: baseline; float: none;"></div>-->
                </div>
                <div class="company-office-content  col-md-8  col-lg-9  block-margin-adaptive">
                    <div class="company-tender  company-tender_personal  background-color-white">
                        <div class="company-tender__title  company-tender__title_personal  content-text  content-text_medium">
                            <h3>Опубликованные тендеры </h3>
                            <p>Если вы хотите организовать вебинар, пожалуйста, заполните форму ниже. Наши специалисты свяжутся с указанным Организатором мероприятия для уточнения деталей вебинара.</p>
                        </div>
                        <div class="company-table-wrap">
                            <table class="company-table  company-table_personal-tender">
                                <thead class="company-table__thead-title-flex">
                                <tr>
                                    <th></th>
                                    <th>
                                        <div class="company-table__th-in">Дата</div>
                                    </th>
                                    <th>
                                        <div class="company-table__th-in">Предмет</div>
                                    </th>
                                    <th>
                                        <div class="company-table__th-in">Задание</div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="company-table__td-in">#123456</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in">04/08/18</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in">Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in">Открыт</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="company-table__td-in">#123456</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in">04/08/18</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in">Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in">Открыт</div>
                                    </td>
                                </tr>
                                <tr class="disabled">
                                    <td>
                                        <div class="company-table__td-in">#123456</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in">04/08/18</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in">Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in closed">Закрыт</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="company-table__td-in">#123456</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in">04/08/18</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in">Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in">Открыт</div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="company-tender  company-tender_personal  background-color-white">
                        <div class="company-tender__title  content-text"><h3>Открытые тендеры</h3></div>
                        <div class="company-tender__item">
                            <div class="flex  justify-content-between  align-items-end  margin-20">
                                <div class="company-tender__sub-title content-text">
                                    <div>
                                        <span>Организатор:</span> ООО «ХХХ»
                                    </div>
                                    <div>
                                        <span>Предмет:</span> какой-то предмет
                                    </div>
                                    <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях.</p>
                                </div>
                                <div class="company-tender__tender">Тендер №12345</div>
                            </div>
                            <div class="company-table-wrap">
                                <table class="company-table  company-table_open_tenders">
                                    <thead class="company-table__thead-title-flex">
                                    <tr>
                                        <th>
                                            <div class="company-table__th-in">Предложение</div>
                                        </th>
                                        <th>
                                            <div class="company-table__th-in">Компания</div>
                                        </th>
                                        <th>
                                            <div class="company-table__th-in">Мои запросы и комментарии</div>
                                        </th>
                                        <th>
                                            <div class="company-table__th-in">Цена</div>
                                        </th>
                                        <th>
                                            <div class="company-table__th-in">Проходит дальше</div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="company-table__td-in">
                                                <a href="#" class="company-table__task-download">
                                                    <i class="fa fa-file-text" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in"><span>ООО «ХХХ»</span><a href="#" class="company-table-icon"><i class="fa fa-star-o" aria-hidden="true"></i></a></div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in">
                                                <a href="#" class="company-table-icon"><i class="fa fa-share-square-o" aria-hidden="true"></i></a>
                                                <a href="#" class="company-table-icon"><i class="fa fa-comments" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in">
                                                <div class="price">123 342 <i class="fa fa-rub" aria-hidden="true"></i></div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in">
                                                <!-- <a href="#" class="company-table-icon"><i class="fa fa-comment" aria-hidden="true"></i></a> -->
                                                <label class="checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="company-table__td-in">
                                                <a href="#" class="company-table__task-download">
                                                    <i class="fa fa-file-text" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in"><span>ООО «ХХХ»</span><a href="#" class="company-table-icon"><i class="fa fa-star-o" aria-hidden="true"></i></a></div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in">
                                                <a href="#" class="company-table-icon"><i class="fa fa-share-square-o" aria-hidden="true"></i></a>
                                                <a href="#" class="company-table-icon"><i class="fa fa-comments" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in">
                                                <div class="price">123 342 <i class="fa fa-rub" aria-hidden="true"></i></div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in">
                                                <!-- <a href="#" class="company-table-icon"><i class="fa fa-comment" aria-hidden="true"></i></a> -->
                                                <label class="checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="company-table__td-in">
                                                <a href="#" class="company-table__task-download">
                                                    <i class="fa fa-file-text" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in"><span>ООО «ХХХ»</span><a href="#" class="company-table-icon"><i class="fa fa-star-o" aria-hidden="true"></i></a></div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in">
                                                <a href="#" class="company-table-icon"><i class="fa fa-share-square-o" aria-hidden="true"></i></a>
                                                <a href="#" class="company-table-icon"><i class="fa fa-comments" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in">
                                                <div class="price">123 342 <i class="fa fa-rub" aria-hidden="true"></i></div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in">
                                                <!-- <a href="#" class="company-table-icon"><i class="fa fa-comment" aria-hidden="true"></i></a> -->
                                                <label class="checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="content-text  col-xl">Если вы хотите отправить уточняющий запрос или запрос с дополнительными условиями выбранным компаниям, нажмите:</div>
                                <div class="col-xl">
                                    <a href="#" class="button button_green  button_max_none">Отправить запрос выбранным компаниям</a>
                                </div>
                            </div>
                            <div class="company-tender__foot-tender">
                                <div class="row">
                                    <div class="col-xl  content-text">
                                        <h4>Если вы выбрали победителя, отметьте его в таблице и нажмите:</h4>
                                        <p>(Если вы хотите завершить тендер без выбора победителя, также нажмите кнопку «Завершить тендер», не отмечая компании в таблице)</p>
                                    </div>
                                    <div class="gutters">
                                        <a href="#" class="button button_blue">Завершить тендер</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="company-tender company-tender_personal background-color-white">
                        <div class="company-tender__winner  content-text  text-center">
                            <h4>Победитель тендера:</h4>
                            <h3>ООО «ХХХ»</h3>
                            <p>Чтобы отправить запрос на договор или другую документацию победителю тендера, нажмите</p>
                        </div>
                        <a href="#" class="company-tender__winner-btn  button button_red  block-centered">Отправить запрос</a>
                    </div>
                    <div class="company-tender  company-tender_personal  background-color-white">
                        <div class="company-tender__title  content-text"><h3>Закрытые тендеры</h3></div>
                        <div class="company-tender__item">
                            <div class="flex  justify-content-between  align-items-end  margin-20">
                                <div class="company-tender__sub-title content-text">
                                    <div>
                                        <span>Организатор:</span> ООО «ХХХ»
                                    </div>
                                    <div>
                                        <span>Предмет:</span> какой-то предмет
                                    </div>
                                    <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях.</p>
                                </div>
                                <div class="company-tender__tender">Тендер №12345</div>
                            </div>
                            <div class="company-table-wrap">
                                <table class="company-table  company-table_open_tenders">
                                    <thead class="company-table__thead-title-flex">
                                    <tr>
                                        <th>
                                            <div class="company-table__th-in">Предложение</div>
                                        </th>
                                        <th>
                                            <div class="company-table__th-in">Компания</div>
                                        </th>
                                        <th>
                                            <div class="company-table__th-in">Мои запросы и комментарии</div>
                                        </th>
                                        <th>
                                            <div class="company-table__th-in">Цена</div>
                                        </th>
                                        <th>
                                            <div class="company-table__th-in">Проходит дальше</div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="company-table__td-in">
                                                <a href="#" class="company-table__task-download">
                                                    <i class="fa fa-file-text" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in"><span>ООО «ХХХ»</span></div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in">
                                                <a href="#" class="company-table-icon"><i class="fa fa-share-square-o" aria-hidden="true"></i></a>
                                                <a href="#" class="company-table-icon"><i class="fa fa-comments" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in">
                                                <div class="price">123 342 <i class="fa fa-rub" aria-hidden="true"></i></div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in">
                                                <!-- <a href="#" class="company-table-icon"><i class="fa fa-comment" aria-hidden="true"></i></a> -->
                                                <a href="#" class="company-table-icon"><i class="fa fa-comment" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="company-table__td-in">
                                                <a href="#" class="company-table__task-download">
                                                    <i class="fa fa-file-text" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in"><span>ООО «ХХХ»</span></div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in">
                                                <a href="#" class="company-table-icon"><i class="fa fa-share-square-o" aria-hidden="true"></i></a>
                                                <a href="#" class="company-table-icon"><i class="fa fa-comments" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in">
                                                <div class="price">123 342 <i class="fa fa-rub" aria-hidden="true"></i></div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in">
                                                <!-- <a href="#" class="company-table-icon"><i class="fa fa-comment" aria-hidden="true"></i></a> -->
                                                <a href="#" class="company-table-icon"><i class="fa fa-comment" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="company-table__td-in">
                                                <a href="#" class="company-table__task-download">
                                                    <i class="fa fa-file-text" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in"><span>ООО «ХХХ»</span></div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in">
                                                <a href="#" class="company-table-icon"><i class="fa fa-share-square-o" aria-hidden="true"></i></a>
                                                <a href="#" class="company-table-icon"><i class="fa fa-comments" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in">
                                                <div class="price">123 342 <i class="fa fa-rub" aria-hidden="true"></i></div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in">
                                                <!-- <a href="#" class="company-table-icon"><i class="fa fa-comment" aria-hidden="true"></i></a> -->
                                                <a href="#" class="company-table-icon"><i class="fa fa-comment" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- <div class="row">
                                <div class="content-text  col-xl">Если вы хотите отправить уточняющий запрос или запрос с дополнительными условиями выбранным компаниям, нажмите:</div>
                                <div class="col-xl">
                                    <a href="#" class="button button_green  button_max_none">Отправить запрос выбранным компаниям</a>
                                </div>
                            </div>
                            <div class="company-tender__foot-tender">
                                <div class="row">
                                    <div class="col-xl  content-text">
                                        <h4>Если вы выбрали победителя, отметьте его в таблице и нажмите:</h4>
                                        <p>(Если вы хотите завершить тендер без выбора победителя, также нажмите кнопку «Завершить тендер», не отмечая компании в таблице)</p>
                                    </div>
                                    <div class="gutters">
                                        <a href="#" class="button button_blue">Завершить тендер</a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="company-tender__item">
                            <div class="flex  justify-content-between  align-items-end  margin-20">
                                <div class="company-tender__sub-title content-text">
                                    <div>
                                        <span>Организатор:</span> ООО «ХХХ»
                                    </div>
                                    <div>
                                        <span>Предмет:</span> какой-то предмет
                                    </div>
                                    <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях.</p>
                                </div>
                                <div class="company-tender__tender">Тендер №12345</div>
                            </div>
                            <div class="company-table-wrap">
                                <table class="company-table  company-table_open_tenders">
                                    <thead class="company-table__thead-title-flex">
                                    <tr>
                                        <th>
                                            <div class="company-table__th-in">Предложение</div>
                                        </th>
                                        <th>
                                            <div class="company-table__th-in">Компания</div>
                                        </th>
                                        <th>
                                            <div class="company-table__th-in">Мои запросы и комментарии</div>
                                        </th>
                                        <th>
                                            <div class="company-table__th-in">Цена</div>
                                        </th>
                                        <th>
                                            <div class="company-table__th-in">Проходит дальше</div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="company-table__td-in">
                                                <a href="#" class="company-table__task-download">
                                                    <i class="fa fa-file-text" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in"><span>ООО «ХХХ»</span></div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in">
                                                <a href="#" class="company-table-icon"><i class="fa fa-share-square-o" aria-hidden="true"></i></a>
                                                <a href="#" class="company-table-icon"><i class="fa fa-comments" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in">
                                                <div class="price">123 342 <i class="fa fa-rub" aria-hidden="true"></i></div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in">
                                                <!-- <a href="#" class="company-table-icon"><i class="fa fa-comment" aria-hidden="true"></i></a> -->
                                                <a href="#" class="company-table-icon"><i class="fa fa-comment" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="company-table__td-in">
                                                <a href="#" class="company-table__task-download">
                                                    <i class="fa fa-file-text" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in"><span>ООО «ХХХ»</span></div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in">
                                                <a href="#" class="company-table-icon"><i class="fa fa-share-square-o" aria-hidden="true"></i></a>
                                                <a href="#" class="company-table-icon"><i class="fa fa-comments" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in">
                                                <div class="price">123 342 <i class="fa fa-rub" aria-hidden="true"></i></div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in">
                                                <!-- <a href="#" class="company-table-icon"><i class="fa fa-comment" aria-hidden="true"></i></a> -->
                                                <a href="#" class="company-table-icon"><i class="fa fa-comment" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="company-table__td-in">
                                                <a href="#" class="company-table__task-download">
                                                    <i class="fa fa-file-text" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in"><span>ООО «ХХХ»</span></div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in">
                                                <a href="#" class="company-table-icon"><i class="fa fa-share-square-o" aria-hidden="true"></i></a>
                                                <a href="#" class="company-table-icon"><i class="fa fa-comments" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in">
                                                <div class="price">123 342 <i class="fa fa-rub" aria-hidden="true"></i></div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="company-table__td-in">
                                                <!-- <a href="#" class="company-table-icon"><i class="fa fa-comment" aria-hidden="true"></i></a> -->
                                                <a href="#" class="company-table-icon"><i class="fa fa-comment" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>