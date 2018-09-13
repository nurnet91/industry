<form action="" id="SubsForm2">
    <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
    <button data-fancybox-close="" class="header-popup__btn-close  btn-clear"><i class="fa fa-times" aria-hidden="true"></i></button>
    <div class="site_form__title  content-text  text-center">
        <h2>Я интересуюсь</h2>
    </div>
    <div class="choise_box  choise_box_popup">
        <ul class="flex jcsb">
            <?php if (!empty($interests)): ?>
                <?php foreach ($interests as $category): ?>

                        <li>
                            <div class="choise-box  h3">
                                <div class="choise-box__in">
                                    <label class="choise-box__check  checkbox-label">
                                        <input type="checkbox" class="checkbox-label__input-check  select_all_branches">
                                        <span class="checkbox-label__pseudo-check"></span>
                                        <span class="checkbox-label__content"><?=$category->name?></span>
                                    </label>
                                    <i class="choise-box__caret  fa fa-caret-down"></i>
                                </div>
                            </div>
                        </li>
                <?php endforeach ?>
            <?php endif ?>
        </ul>
    </div>

    <div class="site_form__sub-checkboxes  simple-check-list">
        <div class="row  justify-content-between">
            <div class="simple-check-list__col  col-lg-3">
                <label class="checkbox-label">
                    <input id="inform"  name="Subscribers[info_inform]" type="checkbox" class="checkbox-label__input-check" value="1">
                    <span class="checkbox-label__pseudo-check"></span>
                    <span class="checkbox-label__content">Информация</span>
                </label>
            </div>
            <div class="simple-check-list__col  col-lg-4">
                <label class="checkbox-label">
                    <input id="special"  name="Subscribers[info_special]" type="checkbox" class="checkbox-label__input-check" value="1">
                    <span class="checkbox-label__pseudo-check"></span>
                    <span class="checkbox-label__content">Специальные предложения</span>
                </label>
            </div>
            <div class="simple-check-list__col  col-lg-5">
                <label class="checkbox-label">
                    <input id="offer"  name="Subscribers[info_offer]" type="checkbox" class="checkbox-label__input-check" value="1">
                    <span class="checkbox-label__pseudo-check"></span>
                    <span class="checkbox-label__content">Я сам готов предлагать услуги своей компании</span>
                </label>
            </div>
        </div>
    </div>

    <input type="submit" class="site_form__submit  button button_blue  color-white" value="Отправить">
</form>