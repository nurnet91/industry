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
                        <li>
                            <a href="<?= \yii\helpers\Url::to('/personal/tenders')?>">Тендеры</a>
                        </li>
                        <li class="company-menu__active">
                            <span>Опубликовать</span>
                        </li>
                    </ul>
                </div>
                <div class="company-office-content  col-md-8  col-lg-9  block-margin-adaptive">
                    <div class="publish-box">
                        <div class="publish-box__content content-text">
                            <h2>Опубликовать</h2>
                            <p>Мы собираем все виды полезной информации для наших пользователей. Предложите нам интересные новости, события, статьи, презентации, видео или подборки фотографий! <br> Мы их с удовольствием опубликуем на сайте. За высокую активность мы лично дарим мега-полезные подарки! Вы можете самостоятельно разместить новую публикацию. Просто нажмите кнопку ниже, выберете направление, к которому относится данная публикация, тип публикации, например, Новость, заполните аннотацию, текст и вставьте изображение для привлечения внимания. Также вы можете загрузить текст новости или статьи, презентацию подборку фото или прислать нам ссылку на видео. <br> Если статья не Ваша, пожалуйста, укажите корректно автора. Мы уважаем авторские права и свяжемся с ним, чтобы уточнить возможность размещения его публикации. Но баллы за активность вы все равно получите сами – за то, что предложили нам новый материал!</p>
                        </div>
                        <!-- <div class="publish-box__content  publish-box__content_title  content-text">
                            <h4>Вы можете самостоятельно разместить новую публикацию Просто нажмите кнопку ниже</h4>
                        </div> -->
                        <a href="#" class="button button_blue  block-centered  margin-b-10">Разместить новую публикацию </a>
                    </div>
                    <div class="company-office-content__publish  publish-box  publish-box_else">
                        <div class="publish-box__content  publish-box__content_centered  content-text">
                            <h4>Или вы можете предложить нам интересную публикацию, просто отправив ссылку</h4>
                        </div>
                        <form>
                            <div class="row">
                                <div class="content-text  col-sm-6  col-md-12  col-lg-6">
                                    <h3>Направление</h3>
                                    <select class="select" style="display: none;">
                                        <option data-display="Бытовая и промышленная химия">Бытовая и промышленная химия</option>
                                        <option value="1">Электроника</option>
                                        <option value="2">Микроэлектроника</option>
                                    </select><div class="nice-select select" tabindex="0"><span class="current">Бытовая и промышленная химия</span><ul class="list"><li data-value="Бытовая и промышленная химия" data-display="Бытовая и промышленная химия" class="option selected">Бытовая и промышленная химия</li><li data-value="1" class="option">Электроника</li><li data-value="2" class="option">Микроэлектроника</li></ul></div>
                                </div>
                                <div class="content-text  col-sm-6  col-md-12  col-lg-6">
                                    <h3>Тип публикации</h3>
                                    <select class="select" style="display: none;">
                                        <option data-display="Статья">Статья</option>
                                        <option value="1">Новость</option>
                                        <option value="2">Акция</option>
                                    </select><div class="nice-select select" tabindex="0"><span class="current">Статья</span><ul class="list"><li data-value="Статья" data-display="Статья" class="option selected">Статья</li><li data-value="1" class="option">Новость</li><li data-value="2" class="option">Акция</li></ul></div>
                                </div>
                                <div class="content-text  col">
                                    <input type="text" class="input" placeholder="Ссылка на публикацию">
                                </div>
                            </div>
                            <input type="submit" value="Отправить" class="publish-box__form-btn  button button_green  block-centered">
                        </form>
                    </div>
                    <div class="company-office-content__publish  publish-box">
                        <div class="publish-box__content  content-text">
                            <h3>На столе у редактора</h3>
                            <p>В таблице показана информация по вашим публикациям, которые ожидают подтверждения.</p>
                        </div>
                        <div class="company-table-wrap">
                            <table class="company-table  company-table_editor">
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
                                        <div class="company-table__th-in  company-table__th-in_news  flex  align-items-center">Название новости
                                            <button class="company-table__ranging  ranging  active">
                                                <span class="ranging__span"><i class="fa fa-caret-up"></i></span>
                                                <span class="ranging__span"><i class="fa fa-caret-down"></i></span>
                                            </button>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="company-table__th-in  company-table__th-in_type  flex  align-items-center">Тип
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
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_date">04/08/18</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_news">
                                            <a href="#">Сайт рыбатекст поможет</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_type">Иностранные новости</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_rating">
                                            <div class="comapny-table__editor">На столе у редактора</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_date">04/08/18</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_news">
                                            <a href="#">Сайт рыбатекст поможет</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_type">Иностранные новости</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_rating">
                                            <div class="comapny-table__editor">На столе у редактора</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_date">04/08/18</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_news">
                                            <a href="#">Сайт рыбатекст поможет</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_type">Иностранные новости</div>
                                    </td>
                                    <td>
                                        <div class="company-table__td-in  company-table__td-in_rating">
                                            <div class="comapny-table__editor  comapny-table__editor_false">Не принято</div>
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