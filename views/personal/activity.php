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
                        <li class="company-menu__active">
                            <span>Активность</span>
                        </li>
                        <li>
                            <a href="<?= \yii\helpers\Url::to('/personal/tenders')?>">Тендеры</a>
                        </li>
                        <li>
                            <a href="<?= \yii\helpers\Url::to('/personal/publish')?>">Опубликовать</a>
                        </li>
                    </ul>
<!--                    <div style="position: static; width: 210px; height: 354px; display: block; vertical-align: baseline; float: none;"></div>-->
                </div>
                <div class="company-office-content  col-md-8  col-lg-9">
                    <div class="company-office__title_tenders  content-text">
                        <h2>Активность</h2>
                    </div>
                    <div class="company-office-content__item  company-statistic  company-statistic_personal">
                        <div class="company-statistic__row  company-statistic__row_personal  row  justify-content-center">
                            <div class="company-statistic__wrap  company-statistic__wrap_personal  col-6  col-sm-4  col-lg-2">
                                <div class="company-statistic__item  company-statistic__item_personal  background" style="background-image: url(/images/company-stat-red.jpg);">
                                    <span>139</span>
                                    запросов
                                </div>
                            </div>
                            <div class="company-statistic__wrap  company-statistic__wrap_personal  col-6  col-sm-4  col-lg-2">
                                <div class="company-statistic__item  company-statistic__item_personal  background" style="background-image: url(/images/company-stat-green.jpg);">
                                    <span>140</span>
                                    публикаций
                                </div>
                            </div>
                            <div class="company-statistic__wrap  company-statistic__wrap_personal  col-6  col-sm-4  col-lg-2">
                                <div class="company-statistic__item  company-statistic__item_personal  background" style="background-image: url(/images/company-stat-blue.jpg);">
                                    <span>1514</span>
                                    объявлений
                                </div>
                            </div>
                            <div class="company-statistic__wrap  company-statistic__wrap_personal  col-6  col-sm-4  col-lg-2">
                                <div class="company-statistic__item  company-statistic__item_personal  background" style="background-image: url(/images/company-stat-orange.jpg);">
                                    <span>139</span>
                                    комментариев
                                </div>
                            </div>
                            <div class="company-statistic__wrap  company-statistic__wrap_personal  col-6  col-sm-4  col-lg-2">
                                <div class="company-statistic__item  company-statistic__item_personal  background" style="background-image: url(/images/company-stat-green.jpg);">
                                    <span>140</span>
                                    сообщений на форуме
                                </div>
                            </div>
                            <div class="company-statistic__wrap  company-statistic__wrap_personal  col-6  col-sm-4  col-lg-2">
                                <div class="company-statistic__item  company-statistic__item_personal  background" style="background-image: url(/images/company-stat-shine-green.jpg);">
                                    <span>1514</span>
                                    записей в блоге
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="company-office-content__item  company-tender  background-color-white">
                        <div class="company-tender__title  content-text  content-text_tender">
                            <h3>Запросы</h3>
                            <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, начинающему оратору отточить навык публичных выступлений в домашних условиях.</p>
                        </div>
                        <div class="company-table-wrap  company-table-wrap_activite">
                            <table class="company-table">
                                <thead class="company-table__thead-title-flex">
                                <tr>
                                    <th>
                                        <div class="company-table__th-in  company-table__th-in_date">Дата </div>
                                    </th>
                                    <th>
                                        <div class="company-table__th-in  company-table__th-in_companies">Компании</div>
                                    </th>
                                    <th>
                                        <div class="company-table__th-in  company-table__th-in_task_request">Задание</div>
                                    </th>
                                    <th>
                                        <div class="company-table__th-in  company-table__th-in_comment_request">Комментарии</div>
                                    </th>
                                    <th>
                                        <div class="company-table__th-in  company-table__th-in_new_request">Новый запрос</div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_date">04/08/18</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_companies">
                                            <div class="company-table__companies-wrap">
                                                <a href="#">Название компании</a>
                                                <a href="#" class="company-table__companies-favour"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            </div>
                                            <div class="company-table__companies-wrap">
                                                <a href="#">Название компании</a>
                                                <a href="#" class="company-table__companies-favour"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            </div>
                                            <div class="company-table__companies-wrap">
                                                <a href="#">Название компании</a>
                                                <a href="#" class="company-table__companies-favour"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            </div>
                                            <div class="company-table__companies-wrap">
                                                <a href="#">Название компании</a>
                                                <a href="#" class="company-table__companies-favour"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            </div>
                                            <div class="company-table__companies-wrap">
                                                <a href="#">Название компании</a>
                                                <a href="#" class="company-table__companies-favour"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_task_request">
                                            <a href="#" class="company-table__task-download">
                                                <i class="fa fa-file-text" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_comment_request">
                                            Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на
                                        </div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_new_request">
                                            <button class="company-table__send-request" data-toggle="tooltip" data-placement="top" title="" data-original-title="Отправить новый запрос"><i class="fa fa-circle-o-notch" aria-hidden="true"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_date">04/08/18</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_companies">
                                            <div class="company-table__companies-wrap">
                                                <a href="#">Название компании</a>
                                                <a href="#" class="company-table__companies-favour"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            </div>
                                            <div class="company-table__companies-wrap">
                                                <a href="#">Название компании</a>
                                                <a href="#" class="company-table__companies-favour"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            </div>
                                            <div class="company-table__companies-wrap">
                                                <a href="#">Название компании</a>
                                                <a href="#" class="company-table__companies-favour"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            </div>
                                            <div class="company-table__companies-wrap">
                                                <a href="#">Название компании</a>
                                                <a href="#" class="company-table__companies-favour"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            </div>
                                            <div class="company-table__companies-wrap">
                                                <a href="#">Название компании</a>
                                                <a href="#" class="company-table__companies-favour"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_task_request">
                                            <a href="#" class="company-table__task-download">
                                                <i class="fa fa-file-text" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_comment_request">
                                            Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на
                                        </div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_new_request">
                                            <button class="company-table__send-request" data-toggle="tooltip" data-placement="top" title="" data-original-title="Отправить новый запрос"><i class="fa fa-circle-o-notch" aria-hidden="true"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_date">04/08/18</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_companies">
                                            <div class="company-table__companies-wrap">
                                                <a href="#">Название компании</a>
                                                <a href="#" class="company-table__companies-favour"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            </div>
                                            <div class="company-table__companies-wrap">
                                                <a href="#">Название компании</a>
                                                <a href="#" class="company-table__companies-favour"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            </div>
                                            <div class="company-table__companies-wrap">
                                                <a href="#">Название компании</a>
                                                <a href="#" class="company-table__companies-favour"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            </div>
                                            <div class="company-table__companies-wrap">
                                                <a href="#">Название компании</a>
                                                <a href="#" class="company-table__companies-favour"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            </div>
                                            <div class="company-table__companies-wrap">
                                                <a href="#">Название компании</a>
                                                <a href="#" class="company-table__companies-favour"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_task_request">
                                            <a href="#" class="company-table__task-download">
                                                <i class="fa fa-file-text" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_comment_request">
                                            Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на
                                        </div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_new_request">
                                            <button class="company-table__send-request" data-toggle="tooltip" data-placement="top" title="" data-original-title="Отправить новый запрос"><i class="fa fa-circle-o-notch" aria-hidden="true"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="#" class="company-tender__link-more">Перейти на страницу размещения запросов</a>
                    </div>
                    <div class="company-office-content__item  company-tender  background-color-white">
                        <div class="company-tender__title  content-text  content-text_tender">
                            <h3>Публикации</h3>
                            <p>В таблице показана информация по вашим объявлениям. На данный момент вы можете разместить объявления о покупке или продаже Б/У оборудования или разместить вакансию. Пожалуйста, выберете необходимое действие по ссылкам после таблице и заполните простую форму</p>
                        </div>
                        <div class="company-table-wrap  company-table-wrap_activite">
                            <table class="company-table">
                                <thead class="company-table__thead-title-flex">
                                <tr>
                                    <th>
                                        <div class="company-table__th-in  company-table__th-in_date  flex  align-items-center">Дата
                                            <button class="company-table__ranging  ranging">
                                                <span class="ranging__span"><i class="fa fa-caret-up"></i></span>
                                                <span class="ranging__span"><i class="fa fa-caret-down"></i></span>
                                            </button>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="company-table__th-in  company-table__th-in_public_name  flex  align-items-center">Название публикации
                                            <button class="company-table__ranging  ranging  active">
                                                <span class="ranging__span"><i class="fa fa-caret-up"></i></span>
                                                <span class="ranging__span"><i class="fa fa-caret-down"></i></span>
                                            </button>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="company-table__th-in  company-table__th-in_public_type  flex  align-items-center">Тип
                                            <button class="company-table__ranging  ranging">
                                                <span class="ranging__span"><i class="fa fa-caret-up"></i></span>
                                                <span class="ranging__span"><i class="fa fa-caret-down"></i></span>
                                            </button>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="company-table__th-in  company-table__th-in_public_rating  flex  align-items-center">Рейтинг
                                            <button class="company-table__ranging  ranging">
                                                <span class="ranging__span"><i class="fa fa-caret-up"></i></span>
                                                <span class="ranging__span"><i class="fa fa-caret-down"></i></span>
                                            </button>
                                        </div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_date">04/08/18</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_public_name">
                                            <a href="#">Сайт рыбатекст поможет</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_public_type">Иностранные новости</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_public_rating">
                                            <div class="user-actions  user-actions_personal_activity">
                                                <div class="user-actions__in">
                                                    <div class="user-actions__item  user-actions__item_personal_activity">
                                                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                        <span>123</span>
                                                    </div>
                                                    <div class="user-actions__item  user-actions__item_personal_activity">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                        <span>1231</span>
                                                    </div>
                                                    <div class="user-actions__item  user-actions__item_personal_activity">
                                                        <i class="fa fa-comment" aria-hidden="true"></i>
                                                        <span>123</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_date">04/08/18</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_public_name">
                                            <a href="#">Сайт рыбатекст поможет</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_public_type">Иностранные новости</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_public_rating">
                                            <div class="user-actions  user-actions_personal_activity">
                                                <div class="user-actions__in">
                                                    <div class="user-actions__item  user-actions__item_personal_activity">
                                                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                        <span>123</span>
                                                    </div>
                                                    <div class="user-actions__item  user-actions__item_personal_activity">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                        <span>1231</span>
                                                    </div>
                                                    <div class="user-actions__item  user-actions__item_personal_activity">
                                                        <i class="fa fa-comment" aria-hidden="true"></i>
                                                        <span>123</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_date">04/08/18</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_public_name">
                                            <a href="#">Сайт рыбатекст поможет</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_public_type">Иностранные новости</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_public_rating">
                                            <div class="user-actions  user-actions_personal_activity">
                                                <div class="user-actions__in">
                                                    <div class="user-actions__item  user-actions__item_personal_activity">
                                                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                        <span>123</span>
                                                    </div>
                                                    <div class="user-actions__item  user-actions__item_personal_activity">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                        <span>1231</span>
                                                    </div>
                                                    <div class="user-actions__item  user-actions__item_personal_activity">
                                                        <i class="fa fa-comment" aria-hidden="true"></i>
                                                        <span>123</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="content-text content-text_tender  content-text--text--center">
                            <button class="btn-add  btn-add_activity_page">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                            <p>Чтобы добавить новую новость, пожалуйста, нажмите на область выше.</p>
                        </div>
                    </div>
                    <div class="company-office-content__item  company-tender  background-color-white">
                        <div class="company-tender__title  content-text  content-text_tender">
                            <h3>Объявления</h3>
                            <p>В таблице показана информация по вашим объявлениям. На данный момент вы можете разместить объявления о покупке или продаже Б/У оборудования или разместить вакансию. Пожалуйста, выберете необходимое действие по ссылкам после таблице и заполните простую форму</p>
                        </div>
                        <div class="company-table-wrap  company-table-wrap_activite">
                            <table class="company-table">
                                <thead class="company-table__thead-title-flex">
                                <tr>
                                    <th>
                                        <div class="company-table__th-in  company-table__th-in_date  flex  align-items-center">Дата
                                            <button class="company-table__ranging  ranging">
                                                <span class="ranging__span"><i class="fa fa-caret-up"></i></span>
                                                <span class="ranging__span"><i class="fa fa-caret-down"></i></span>
                                            </button>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="company-table__th-in  company-table__th-in_type_ads  flex  align-items-center">Тип
                                            <button class="company-table__ranging  ranging  active">
                                                <span class="ranging__span"><i class="fa fa-caret-up"></i></span>
                                                <span class="ranging__span"><i class="fa fa-caret-down"></i></span>
                                            </button>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="company-table__th-in  company-table__th-in_ads  flex  align-items-center">Обьявление
                                            <button class="company-table__ranging  ranging">
                                                <span class="ranging__span"><i class="fa fa-caret-up"></i></span>
                                                <span class="ranging__span"><i class="fa fa-caret-down"></i></span>
                                            </button>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="company-table__th-in  company-table__th-in_status  flex  align-items-center">Статус
                                            <button class="company-table__ranging  ranging">
                                                <span class="ranging__span"><i class="fa fa-caret-up"></i></span>
                                                <span class="ranging__span"><i class="fa fa-caret-down"></i></span>
                                            </button>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="company-table__th-in  company-table__th-in_ads-actions  flex  align-items-center">Действия

                                        </div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_date">04/08/18</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_type_ads">Б/У оборудование</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_ads"><a href="#">Сайт рыбатекст поможет</a></div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_status"><div class="company-table__status_open">Открыто</div></div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_ads-actions">
                                            <button class="company-table__btn  background-color-red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Отказ от запроса"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="disabled">
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_date">04/08/18</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_type_ads">Вакансии</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_ads"><a href="#">Сайт рыбатекст поможет</a></div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_status"><div class="company-table__status_close">Закрыто</div></div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_ads-actions">
                                            <button class="company-table__btn  background-color-red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Отказ от запроса"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_date">04/08/18</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_type_ads">Вакансии</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_ads"><a href="#">Сайт рыбатекст поможет</a></div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_status"><div class="company-table__status_open">Открыто</div></div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_ads-actions">
                                            <button class="company-table__btn  background-color-red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Отказ от запроса"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="content-text content-text_tender  content-text--text--center  col-md-10  block-centered  block-margin-adaptive">
                            <h3>Совет:</h3>
                            <p>Чтобы разместить привлекательное объявление о продаже Б/У оборудования и быстрее найти покупателя, сделайте до 5 фото Вашего оборудования с лучших ракурсов, уточните модель, производителя, наработку, год выпуска и комплектацию. А также подумайте заранее, по какой цене вы хотели бы продать данное оборудование. После этого смело заполняйте форму на нашем сайте и покупатели не заставят себя ждать!</p>
                        </div>
                        <div class="adds-public-menu">
                            <ul>
                                <li><a href="#">Опубликовать объявление о покупке Б/У оборудования</a></li>
                                <li class="active"><a href="#">Опубликовать новую вакансию</a></li>
                                <li><a href="#">Опубликовать объявление о покупке Б/У оборудования</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="company-office-content__item  comments">
                        <div class="comments__title  content-else">
                            <h3>Комментарии</h3>
                            <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, начинающему оратору отточить навык публичных выступлений в домашних условиях.</p>
                        </div>
                        <div class="comments__item  comment">
                            <div class="comment__date"><span>#1</span>04/08/18</div>
                            <div class="comment__text">
                                <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.</p>
                            </div>
                            <a href="#" class="comment__share"><i class="fa fa-share-square-o" aria-hidden="true"></i></a>
                        </div>
                        <div class="comments__item  comment">
                            <div class="comment__date"><span>#1</span>04/08/18</div>
                            <div class="comment__text">
                                <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.</p>
                            </div>
                            <a href="#" class="comment__share"><i class="fa fa-share-square-o" aria-hidden="true"></i></a>
                        </div>
                        <div class="comments__item  comment">
                            <div class="comment__date"><span>#1</span>04/08/18</div>
                            <div class="comment__text">
                                <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.</p>
                            </div>
                            <a href="#" class="comment__share"><i class="fa fa-share-square-o" aria-hidden="true"></i></a>
                        </div>
                        <div class="comments__pagination  pagination  pagination_grey  flex  justify-content-center">
                            <ul class="row  justify-content-center  align-items-end">
                                <li class="active"><span>1</span></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>...</li>
                                <li><a href="#">11</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="company-office-content__item  comments">
                        <div class="comments__title  content-else">
                            <h3>Сообщения на форуме</h3>
                            <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, начинающему оратору отточить навык публичных выступлений в домашних условиях.</p>
                        </div>
                        <div class="comments__item  comment">
                            <div class="comment__date"><span>#1</span>04/08/18</div>
                            <div class="comment__text">
                                <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.</p>
                            </div>
                            <a href="#" class="comment__share"><i class="fa fa-share-square-o" aria-hidden="true"></i></a>
                        </div>
                        <div class="comments__item  comment">
                            <div class="comment__date"><span>#1</span>04/08/18</div>
                            <div class="comment__text">
                                <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.</p>
                            </div>
                            <a href="#" class="comment__share"><i class="fa fa-share-square-o" aria-hidden="true"></i></a>
                        </div>
                        <div class="comments__item  comment">
                            <div class="comment__date"><span>#1</span>04/08/18</div>
                            <div class="comment__text">
                                <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.</p>
                            </div>
                            <a href="#" class="comment__share"><i class="fa fa-share-square-o" aria-hidden="true"></i></a>
                        </div>
                        <div class="comments__pagination  pagination  pagination_grey  flex  justify-content-center">
                            <ul class="row  justify-content-center  align-items-end">
                                <li class="active"><span>1</span></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>...</li>
                                <li><a href="#">11</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>