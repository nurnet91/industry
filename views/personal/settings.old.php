
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
                        <li class="company-menu__active">
                            <span>Настройки</span>
                        </li>
                        <li>
                            <a href="<?= \yii\helpers\Url::to('/personal/activity')?>">Активность</a>
                        </li>
                        <li>
                            <a href="<?= \yii\helpers\Url::to('/personal/tenders')?>">Тендеры</a>
                        </li>
                        <li>
                            <a href="<?= \yii\helpers\Url::to('/personal/publish')?>">Опубликовать</a>
                        </li>
                    </ul>
                </div>
                <div class="company-office-content  col-md-8  col-lg-9  block-margin-adaptive">
                    <form class="company-office-content__in-settings  background-color-white">
                        <div class="content-text  text-center">
                            <h2>Настройки рассылки</h2>
                            <p>Я хочу получать рассылку по следующим направлениям и темам:</p>
                        </div>
                        <div class="company-office-content__advice">Совет: чтобы эффективно настроить рассылку, выбирайте интересующие Вас пункты сверху вниз</div>
                        <div class="choise_box  choise_box_settings">
                            <ul class="flex">
                                <li>
                                    <div class="choise-box  choise-box_settings">
                                        <div class="choise-box__in">
                                            <label class="choise-box__check  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content"><?= t('Directions') ?></span>
                                            </label>
                                            <i class="choise-box__caret  fa fa-caret-down"></i>
                                        </div>
                                    </div>
                                    <div class="site_form  site_form_settings">
                                        <ul>
                                            <?php if (!empty($directions)): ?>
                                                <?php foreach ($directions as $category): ?>
                                                    <?php if (!empty($category->subs)): ?>
                                                        <li>
                                                            <div class="choise-box-select">
                                                                <div class="choise-box h3">
                                                                    <div class="choise-box__in">
                                                                        <label class="checkbox-label">
                                                                            <input type="checkbox" class="checkbox-label__input-check  select_all_branches">
                                                                            <span class="checkbox-label__pseudo-check"></span>
                                                                            <span class="checkbox-label__content-in"><?=$category->name?></span>
                                                                        </label>
                                                                        <i class="choise-box__caret fa fa-chevron-down"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="site_form">
                                                                <?php if (!empty($category->subs)): ?>
                                                                    <?php foreach ($category->subs as $catsub): ?>
                                                                        <label class="choise-box__check-in  checkbox-label">
                                                                            <input name="Subscribers[cat_ids][<?=$catsub->id ?>]" type="checkbox" class="checkbox-label__input-check  check_branch">
                                                                            <span class="checkbox-label__pseudo-check"></span>
                                                                            <span class="checkbox-label__content-in"><?= $catsub->name ?></span>
                                                                        </label>
                                                                    <?php endforeach ?>
                                                                <?php endif ?>
                                                            </div>
                                                        </li>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="choise_box  choise_box_settings">
                            <ul class="flex">
                                <li>
                                    <div class="choise-box  choise-box_settings">
                                        <div class="choise-box__in">
                                            <label class="choise-box__check  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content">Электроника</span>
                                            </label>
                                            <i class="choise-box__caret  fa fa-caret-down"></i>
                                        </div>
                                    </div>
                                    <div class="site_form  site_form_settings">
                                        <ul>
                                            <li>
                                                <div class="choise-box-select">
                                                    <div class="choise-box h3">
                                                        <div class="choise-box__in">
                                                            <label class="checkbox-label">
                                                                <input type="checkbox" class="checkbox-label__input-check  select_all_branches">
                                                                <span class="checkbox-label__pseudo-check"></span>
                                                                <span class="checkbox-label__content-in">Контрактное производство</span>
                                                            </label>
                                                            <i class="choise-box__caret fa fa-chevron-down"></i>
                                                        </div>
                                                    </div>
                                                    <div class="site_form  hidden">
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Тема 1</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Тема 2</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Тема 3</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="choise-box-select">
                                                    <div class="choise-box h3">
                                                        <div class="choise-box__in">
                                                            <label class="checkbox-label">
                                                                <input type="checkbox" class="checkbox-label__input-check  select_all_branches">
                                                                <span class="checkbox-label__pseudo-check"></span>
                                                                <span class="checkbox-label__content-in">Контрактное производство</span>
                                                            </label>
                                                            <i class="choise-box__caret fa fa-chevron-down"></i>
                                                        </div>
                                                    </div>
                                                    <div class="site_form  hidden">
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">операция номер 1</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">операция номер 2</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">операция номер 3</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="choise-box-select">
                                                    <div class="choise-box h3">
                                                        <div class="choise-box__in">
                                                            <label class="checkbox-label">
                                                                <input type="checkbox" class="checkbox-label__input-check  select_all_branches">
                                                                <span class="checkbox-label__pseudo-check"></span>
                                                                <span class="checkbox-label__content-in">Контрактное производство</span>
                                                            </label>
                                                            <i class="choise-box__caret fa fa-chevron-down"></i>
                                                        </div>
                                                    </div>
                                                    <div class="site_form  hidden">
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">операция номер 1</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">операция номер 2</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">операция номер 3</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="choise-box-select">
                                                    <div class="choise-box h3">
                                                        <div class="choise-box__in">
                                                            <label class="checkbox-label">
                                                                <input type="checkbox" class="checkbox-label__input-check  select_all_branches">
                                                                <span class="checkbox-label__pseudo-check"></span>
                                                                <span class="checkbox-label__content-in">Контрактное производство</span>
                                                            </label>
                                                            <i class="choise-box__caret fa fa-chevron-down"></i>
                                                        </div>
                                                    </div>
                                                    <div class="site_form  hidden">
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">операция номер 1</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">операция номер 2</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">операция номер 3</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="choise_box  choise_box_settings">
                            <ul class="flex">
                                <li>
                                    <div class="choise-box  choise-box_settings">
                                        <div class="choise-box__in">
                                            <label class="choise-box__check  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content">Электроника</span>
                                            </label>
                                            <i class="choise-box__caret  fa fa-caret-down"></i>
                                        </div>
                                    </div>
                                    <div class="site_form  site_form_settings  hidden">
                                        <ul>
                                            <li>
                                                <div class="choise-box-select">
                                                    <div class="choise-box h3">
                                                        <div class="choise-box__in">
                                                            <label class="checkbox-label">
                                                                <input type="checkbox" class="checkbox-label__input-check  select_all_branches">
                                                                <span class="checkbox-label__pseudo-check"></span>
                                                                <span class="checkbox-label__content-in">Контрактное производство</span>
                                                            </label>
                                                            <i class="choise-box__caret fa fa-chevron-down"></i>
                                                        </div>
                                                    </div>
                                                    <div class="site_form">
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Тема 1</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Тема 2</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Тема 3</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="choise-box-select">
                                                    <div class="choise-box h3">
                                                        <div class="choise-box__in">
                                                            <label class="checkbox-label">
                                                                <input type="checkbox" class="checkbox-label__input-check  select_all_branches">
                                                                <span class="checkbox-label__pseudo-check"></span>
                                                                <span class="checkbox-label__content-in">Контрактное производство</span>
                                                            </label>
                                                            <i class="choise-box__caret fa fa-chevron-down"></i>
                                                        </div>
                                                    </div>
                                                    <div class="site_form">
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">операция номер 1</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">операция номер 2</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">операция номер 3</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="choise-box-select">
                                                    <div class="choise-box h3">
                                                        <div class="choise-box__in">
                                                            <label class="checkbox-label">
                                                                <input type="checkbox" class="checkbox-label__input-check  select_all_branches">
                                                                <span class="checkbox-label__pseudo-check"></span>
                                                                <span class="checkbox-label__content-in">Контрактное производство</span>
                                                            </label>
                                                            <i class="choise-box__caret fa fa-chevron-down"></i>
                                                        </div>
                                                    </div>
                                                    <div class="site_form">
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">операция номер 1</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">операция номер 2</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">операция номер 3</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="choise-box-select">
                                                    <div class="choise-box h3">
                                                        <div class="choise-box__in">
                                                            <label class="checkbox-label">
                                                                <input type="checkbox" class="checkbox-label__input-check  select_all_branches">
                                                                <span class="checkbox-label__pseudo-check"></span>
                                                                <span class="checkbox-label__content-in">Контрактное производство</span>
                                                            </label>
                                                            <i class="choise-box__caret fa fa-chevron-down"></i>
                                                        </div>
                                                    </div>
                                                    <div class="site_form">
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">операция номер 1</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">операция номер 2</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">операция номер 3</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="company-office-content__list choise-box-list">
                            <div class="row  justify-content-center">
                                <div class="col-lg-5  content-text">
                                    <h3>Виды публикаций</h3>
                                    <div class="choise-box-select">
                                        <div class="choise-box h3">
                                            <div class="choise-box__in">
                                                <label class="checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  select_all_branches">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Все</span>
                                                </label>
                                                <i class="choise-box__caret fa fa-chevron-down"></i>
                                            </div>
                                        </div>
                                        <div class="site_form">
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Номер 1</span>
                                            </label>
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Номер 2</span>
                                            </label>
                                            <label class="choise-box__check-in  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content-in">Номер 3</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5  content-text">
                                    <h3>Языки</h3>
                                    <div class="choise-box-select">
                                        <div class="choise-box h3">
                                            <div class="choise-box__in">
                                                <label class="checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  select_all_branches">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in">Все</span>
                                                </label>
                                                <i class="choise-box__caret fa fa-chevron-down"></i>
                                            </div>
                                        </div>
                                        <div class="site_form">
                                            <?php if (!empty($languages)): ?>
                                            <?php foreach ($languages as $lang): ?>
                                                <label class="choise-box__check-in  checkbox-label">
                                                    <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                    <span class="checkbox-label__pseudo-check"></span>
                                                    <span class="checkbox-label__content-in"><?= $lang['name']?></span>
                                                </label>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
<!--                                            <label class="choise-box__check-in  checkbox-label">-->
<!--                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">-->
<!--                                                <span class="checkbox-label__pseudo-check"></span>-->
<!--                                                <span class="checkbox-label__content-in">Номер 2</span>-->
<!--                                            </label>-->
<!--                                            <label class="choise-box__check-in  checkbox-label">-->
<!--                                                <input type="checkbox" class="checkbox-label__input-check  check_branch">-->
<!--                                                <span class="checkbox-label__pseudo-check"></span>-->
<!--                                                <span class="checkbox-label__content-in">Номер 3</span>-->
<!--                                            </label>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btns">
                            <div class="row  justify-content-center">
                                <button class="btns__btn   button button_blue">Очистить</button>
                                <input type="submit" value="Сохранить" class="btns__btn   button button_blue">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <form class="filter">
        <div class="container">
            <div class="filter__in  background-color-white">
                <div class="filter__title  content-text  content-text_medium">
                    <h2>Настройка поиска компаний</h2>
                    <p>Заполните форму для того, чтобы система учла все возможности Вашей компании. По этим параметрам пользователи смогут выбирать вашу компанию среди других или сравнивать компании между собой. Пожалуйста, заполните ее максимально корректно.</p>
                </div>
                <div class="filter__start  row">
                    <div class="filter__start-col  col-sm-6  col-lg-4">
                        <div class="content-text">
                            <h3>Ключевые слова</h3>
                            <input type="text" class="input" placeholder="Автомат установки компонентов SM451">
                        </div>
                    </div>
                    <div class="filter__start-col  col-sm-6  col-lg-4">
                        <div class="content-text">
                            <h3>Направление</h3>
                            <select class="select  select_text_wide" style="display: none;">
                                <option data-display="Электроника">Электроника</option>
                                <option value="1">Микроэлектроника</option>
                                <option value="2">Аддитивные технологии</option>
                            </select><div class="nice-select select select_text_wide" tabindex="0"><span class="current">Электроника</span><ul class="list"><li data-value="Электроника" data-display="Электроника" class="option selected">Электроника</li><li data-value="1" class="option">Микроэлектроника</li><li data-value="2" class="option">Аддитивные технологии</li></ul></div>
                        </div>
                    </div>
                    <div class="filter__start-col  col-sm-6  col-lg-4">
                        <div class="content-text">
                            <h3>Тема</h3>
                            <select class="select  select_text_wide" style="display: none;">
                                <option data-display="Контактное производство">Контактное производство</option>
                                <option value="1">Микроэлектроника</option>
                                <option value="2">Аддитивные технологии</option>
                            </select><div class="nice-select select select_text_wide" tabindex="0"><span class="current">Контактное производство</span><ul class="list"><li data-value="Контактное производство" data-display="Контактное производство" class="option selected">Контактное производство</li><li data-value="1" class="option">Микроэлектроника</li><li data-value="2" class="option">Аддитивные технологии</li></ul></div>
                        </div>
                    </div>
                    <div class="filter__start-col  col-sm-6  col-lg-4">
                        <div class="content-text">
                            <h3>Страна</h3>
                            <select class="select  select_text_wide" style="display: none;">
                                <option data-display="Россия">Россия</option>
                                <option value="1">Украина</option>
                                <option value="2">Беларусь</option>
                            </select><div class="nice-select select select_text_wide" tabindex="0"><span class="current">Россия</span><ul class="list"><li data-value="Россия" data-display="Россия" class="option selected">Россия</li><li data-value="1" class="option">Украина</li><li data-value="2" class="option">Беларусь</li></ul></div>
                        </div>
                    </div>
                    <div class="filter__start-col  col-sm-6  col-lg-4">
                        <div class="content-text">
                            <h3>Регион</h3>
                            <select class="select  select_text_wide" style="display: none;">
                                <option data-display="Московская область">Московская область</option>
                                <option value="1">Тульская область</option>
                                <option value="2">Рязанская область</option>
                            </select><div class="nice-select select select_text_wide" tabindex="0"><span class="current">Московская область</span><ul class="list"><li data-value="Московская область" data-display="Московская область" class="option selected">Московская область</li><li data-value="1" class="option">Тульская область</li><li data-value="2" class="option">Рязанская область</li></ul></div>
                        </div>
                    </div>
                    <div class="filter__start-col  col-sm-6  col-lg-4">
                        <div class="content-text">
                            <h3>Город</h3>
                            <select class="select  select_text_wide" style="display: none;">
                                <option data-display="Москва">Москва</option>
                                <option value="1">Тула</option>
                                <option value="2">Рязань</option>
                            </select><div class="nice-select select select_text_wide" tabindex="0"><span class="current">Москва</span><ul class="list"><li data-value="Москва" data-display="Москва" class="option selected">Москва</li><li data-value="1" class="option">Тула</li><li data-value="2" class="option">Рязань</li></ul></div>
                        </div>
                    </div>
                </div>
                <div class="filter__settings  row  justify-content-between">
                    <div class="filter__settings-col  col-lg-5">
                        <button class="filter__more  filter-more-open  button">
                            <i class="fa fa-arrow-down" aria-hidden="true"></i>
                            <span>Расширенный поиск</span>
                        </button>
                    </div>
                </div>
                <div class="filter__more-components">
                    <div class="choise_box  choise_box_profile">
                        <ul class="flex">
                            <li>
                                <div class="choise-box  h3">
                                    <div class="choise-box__in">
                                        <label class="choise-box__check  checkbox-label">
                                            <input type="checkbox" class="checkbox-label__input-check">
                                            <span class="checkbox-label__pseudo-check"></span>
                                            <span class="checkbox-label__content">Контрактное производство </span>
                                        </label>
                                        <i class="choise-box__caret  fa fa-caret-down"></i>
                                    </div>
                                </div>
                                <div class="site_form">
                                    <div class="choise_box  choise_box_profile_in">
                                        <ul class="flex jcsb">
                                            <li>
                                                <div class="choise-box  h3">
                                                    <div class="choise-box__in">
                                                        <label class="choise-box__check  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  select_all_branches  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Здесь описание темы в двух-трех строчках Здесь описание темы в двух-трех строчках Здесь описание темы в двух-трех строчках">Поверхностный монтаж (SMT)</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="site_form">
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Контрактное производство</span>
                                                    </label>
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Еще категория</span>
                                                    </label>
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Третья категория</span>
                                                    </label>
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Контрактное производство</span>
                                                    </label>
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Контрактное производство</span>
                                                    </label>
                                                </div>
                                                <div class="site_form">
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Контрактное производство</span>
                                                    </label>
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Еще категория</span>
                                                    </label>
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Третья категория</span>
                                                    </label>
                                                </div>
                                                <div class="site_form">
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Контрактное производство</span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="choise-box  h3">
                                                    <div class="choise-box__in">
                                                        <label class="choise-box__check  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  select_all_branches  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Здесь описание темы в двух-трех строчках Здесь описание темы в двух-трех строчках Здесь описание темы в двух-трех строчках">Монтаж в отверстия (THT)</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="site_form">
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Контрактное производство</span>
                                                    </label>
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Еще категория</span>
                                                    </label>
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Третья категория</span>
                                                    </label>
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Контрактное производство</span>
                                                    </label>
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Контрактное производство</span>
                                                    </label>
                                                </div>
                                                <div class="site_form">
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Контрактное производство</span>
                                                    </label>
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Еще категория</span>
                                                    </label>
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Третья категория</span>
                                                    </label>
                                                </div>
                                                <div class="site_form">
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Контрактное производство</span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="choise-box  h3">
                                                    <div class="choise-box__in">
                                                        <label class="choise-box__check  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  select_all_branches  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Здесь описание темы в двух-трех строчках Здесь описание темы в двух-трех строчках Здесь описание темы в двух-трех строчках">Объем производства</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="site_form">
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Контрактное производство</span>
                                                    </label>
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Еще категория</span>
                                                    </label>
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Третья категория</span>
                                                    </label>
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Контрактное производство</span>
                                                    </label>
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Контрактное производство</span>
                                                    </label>
                                                </div>
                                                <div class="site_form">
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Контрактное производство</span>
                                                    </label>
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Еще категория</span>
                                                    </label>
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Третья категория</span>
                                                    </label>
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Контрактное производство</span>
                                                    </label>
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Контрактное производство</span>
                                                    </label>
                                                    <label class="choise-box__check-in  checkbox-label">
                                                        <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                        <span class="checkbox-label__pseudo-check"></span>
                                                        <span class="checkbox-label__content-in">Контрактное производство</span>
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="filter__capabilities  other-capabilities">
                        <a href="#" class="other-capabilities__link  filter-more-open-in  block-centered"><i class="fa fa-arrow-down  color_green" aria-hidden="true"></i> Дополнительные возможности</a>
                        <div class="other-capabilities__text   text-size-medium  block-centered  text-center">У некоторых из найденных компаний есть дополнительные производственные возможности, которые могут быть Вам полезны. Вы можете развернуть расширенный поиск по этим услугам и выбрать необходимые. </div>
                    </div>
                    <div class="filter__more-components-in">
                        <div class="filter__choise_box  choise_box  choise_box_profile">
                            <ul class="flex">
                                <li>
                                    <div class="choise-box  h3">
                                        <div class="choise-box__in">
                                            <label class="choise-box__check  checkbox-label">
                                                <input type="checkbox" class="checkbox-label__input-check">
                                                <span class="checkbox-label__pseudo-check"></span>
                                                <span class="checkbox-label__content">Кабели и Жгуты </span>
                                            </label>
                                            <i class="choise-box__caret  fa fa-caret-down"></i>
                                        </div>
                                    </div>
                                    <div class="site_form ">
                                        <div class="choise_box  choise_box_profile_in">
                                            <ul class="flex">
                                                <li>
                                                    <div class="choise-box  h3">
                                                        <div class="choise-box__in">
                                                            <label class="choise-box__check  checkbox-label">
                                                                <input type="checkbox" class="checkbox-label__input-check  select_all_branches  check_branch">
                                                                <span class="checkbox-label__pseudo-check"></span>
                                                                <span class="checkbox-label__content" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Здесь описание темы в двух-трех строчках Здесь описание темы в двух-трех строчках Здесь описание темы в двух-трех строчках">Намотка</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="site_form">
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Контрактное производство</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Еще категория</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Третья категория</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Контрактное производство</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Контрактное производство</span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="site_form">
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Контрактное производство</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Еще категория</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Третья категория</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Контрактное производство</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Контрактное производство</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Контрактное производство</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Еще категория</span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="site_form">
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Контрактное производство</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Еще категория</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Третья категория</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Контрактное производство</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Контрактное производство</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Контрактное производство</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Еще категория</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Третья категория</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Контрактное производство</span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="choise-box  h3">
                                                        <div class="choise-box__in">
                                                            <label class="choise-box__check  checkbox-label">
                                                                <input type="checkbox" class="checkbox-label__input-check  select_all_branches  check_branch">
                                                                <span class="checkbox-label__pseudo-check"></span>
                                                                <span class="checkbox-label__content" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Здесь описание темы в двух-трех строчках Здесь описание темы в двух-трех строчках Здесь описание темы в двух-трех строчках">Намотка</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="site_form">
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Контрактное производство</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Еще категория</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Третья категория</span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="site_form">
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Контрактное производство</span>
                                                        </label>
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Еще категория</span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="site_form">
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Контрактное производство</span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="site_form">
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Еще категория</span>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="site_form">
                                                        <label class="choise-box__check-in  checkbox-label">
                                                            <input type="checkbox" class="checkbox-label__input-check  check_branch">
                                                            <span class="checkbox-label__pseudo-check"></span>
                                                            <span class="checkbox-label__content-in">Контрактное производство</span>
                                                        </label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="btns">
                    <div class="row  justify-content-center">
                        <button class="btns__btn  margin-b-10  button button_blue">Очистить</button>
                        <input type="submit" class="btns__btn  margin-b-10  button button_blue" value="Сохранить">
                    </div>
                </div>
            </div>
        </div>
    </form>
