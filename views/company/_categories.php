<?php

use app\models\FilterMain;

?>
<div class="tabs-section tabs-section_overflow  tabs">
    <nav class="tabs-section__tabs-nav  tabs-nav">
        <ul class="tabs-nav__list  list  nav nav-tabs  nav-tabs_parent">
            <?php foreach ($directions as $key1 => $direction): ?>
                <li class="nav-item"><a href="#tab-pane<?= $direction->id ?>"
                                        class="nav-link <?= $key1 == 0 ? 'active' : '' ?>"
                                        data-toggle="tab"><span><?= $direction->name ?></span></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <div class="tabs-section__panel tab-content">
        <?php foreach ($directions as $key2 => $direction): ?>
            <div class="tabs-section__pane  tab-pane fade <?= $key2 == 0 ? 'show active' : '' ?>" id="tab-pane<?= $direction->id ?>">
                <div class="tabs-section__in  container">
                    <div class="tabs-section  tabs-section_in  tabs  background-color-white">
                        <nav class="company-filter-tab  company-filter-tab_in  gutters flex  justify-content-center">
                            <ul class="list  nav nav-tabs  flex  justify-content-center">
                                <?php if ($direction->subs): ?>
                                    <?php foreach ($direction->subs as $key3 => $sub): ?>
                                        <?php if($sub->theme->subsService || $sub->theme->subsEquipment): ?>
                                        <li class="nav-item"><a href="#tab-pane-in-<?= $direction->id ?>_<?= $sub->theme->id ?>" id="hui"
                                                                class="nav-link <?= $key3 == 0 ? 'active' : '' ?>"
                                                                data-toggle="tab"><span><?= $sub->theme->name ?></span></a>
                                        </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </nav>
                        <div class="tabs-section__panel tab-content">
                            <?php if ($direction->subs): ?>
                                <?php foreach ($direction->subs as $key => $sub): ?>
                                    <?php if($sub->theme->subsService || $sub->theme->subsEquipment): ?>
                                    <div class="tabs-section__pane  tabs-section__pane_in  tab-pane fade <?= $key == 0 ? 'show active' : '' ?>"
                                         id="tab-pane-in-<?= $direction->id ?>_<?= $sub->theme->id ?>">
                                        <div class="company-profile-filter-main">

                                            <div class="company-profile-filter-main__content  content-text">
                                                <h3>Области деятельности и решения</h3>
                                                <p>Заполните форму для того, чтобы система учла все возможности Вашей
                                                    компании. По
                                                    этим параметрам пользователи смогут выбирать вашу компанию среди других
                                                    или
                                                    сравнивать компании между собой. Пожалуйста, заполните ее максимально
                                                    корректно.</p>
                                            </div>


                                        <?php if ($sub->type == FilterMain::TYPE_SERVICE): ?>
                                            <div class="filter__more-components">
                                                <div class="choise_box  choise_box_profile">
                                                    <ul class="flex">
                                                        <li class="choise-li  choise-li_main">
                                                            <div class="choise-box choise-box_main h3">
                                                                <div class="choise-box__in">
                                                                    <label class="choise-box__check  checkbox-label">
                                                                        <input type="checkbox"
                                                                               class="checkbox-label__input-check  select_all_branches">
                                                                        <span class="checkbox-label__pseudo-check"></span>
                                                                        <span class="checkbox-label__content"><?= $sub->theme->name ?></span>
                                                                    </label>
                                                                    <i class="choise-box__caret  fa fa-caret-down"></i>
                                                                </div>
                                                            </div>
                                                            <div class="site_form">
                                                                <div class="choise_box  choise_box_profile_in">
                                                                    <ul class="flex jcsb">
                                                                        <?php foreach ($sub->theme->subsService as $themeSubKey => $childService): ?>
                                                                            <?php if ($themeSubKey == 0): ?>
                                                                                <li class="choise-li">
                                                                                    <div class="choise-box  h3">
                                                                                        <div class="choise-box__in">
                                                                                            <label class="choise-box__check  checkbox-label">
                                                                                                <input type="checkbox"
                                                                                                       class="checkbox-label__input-check  select_all_branches  check_branch">
                                                                                                <span class="checkbox-label__pseudo-check"></span>
                                                                                                <span class="checkbox-label__content"
                                                                                                      data-toggle="tooltip"
                                                                                                      data-placement="bottom"><?= $childService->technology->name ?></span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="site_form">
                                                                            <?php endif; ?>
                                                                                <?php if ($childService->technology->subs): ?>
                                                                                    <?php foreach ($childService->technology->subs as $techSub): ?>
                                                                                        <label class="choise-box__check-in  checkbox-label">
                                                                                            <input type="checkbox"
                                                                                                   class="checkbox-label__input-check  check_branch">
                                                                                            <span class="checkbox-label__pseudo-check"></span>
                                                                                            <span class="checkbox-label__content-in"><?= $techSub->operation->name ?></span>
                                                                                        </label>
                                                                                    <?php endforeach; ?>
                                                                                <?php endif ?>
                                                                            <?php if($themeSubKey == count($sub->theme->subsService)): ?>
                                                                                    </div>
                                                                                </li>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <?php elseif ($sub->type == FilterMain::TYPE_EQUIPMENT): ?>
                                                <div class="filter-result__check-list  row">
                                                    <?php foreach ($sub->theme->subsEquipment as $childEquipment): ?>
                                                        <div class="filter-result__check-col  col-lg-4">
                                                            <label class="choise-box__check  checkbox-label">
                                                                <input type="checkbox" class="checkbox-label__input-check">
                                                                <span class="checkbox-label__pseudo-check"></span>
                                                                <span class="checkbox-label__content"><?= $childEquipment->subTheme->name ?></span>
                                                            </label>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                                <div class="container">
                                                    <ol id="filter_checkbox_<?= $direction->id ?>_<?= $sub->theme->id ?>" class="filter-check auto-checkboxes">
                                                        <?php foreach ($sub->theme->subsEquipment as $childEquipment): ?>
                                                            <li id="<?= $childEquipment->subTheme->id ?>"><?= $childEquipment->subTheme->name ?>
                                                                <i class="filter-check__caret fa fa-caret-down"></i>
                                                                <ol >
                                                            <?php foreach ($childEquipment->subTheme->subs as $subThemeChild): ?>

                                                                <li id="<?= $subThemeChild->technology->id ?>"><?= $subThemeChild->technology->name ?>
                                                                    <ol>
                                                                <?php foreach ($subThemeChild->technology->subs as $techKey => $techSub): ?>
                                                                    <li class="d-flex flex-wrap align-items-start">
                                                                        <?= $techSub->operation->name ?>
                                                                        <ol class="col-lg check-simple">
                                                                            <li>
                                                                                Выберите оборудование
                                                                                <i class="filter-check__caret fa fa-caret-down"></i>
                                                                                <ol class="col-lg ol_hidden">
                                                                                <?php foreach($techSub->operation->subsEquipment as $operationSub): ?>
                                                                                    <li class="d-flex flex-wrap flex-lg-nowrap align-items-start">
                                                                                        <?= $operationSub->eType->name ?>
                                                                                        <ol class="col-lg-6 check-simple">
                                                                                            <li>Выберите производителя
                                                                                                <i class="filter-check__caret fa fa-caret-down"></i>
                                                                                                <ol class="ol_hidden">
                                                                                                    <?php foreach($operationSub->eType->subs as $eTypeSub): ?>
                                                                                                    <li><?= $eTypeSub->eManufacturer->name ?></li>
                                                                                                    <?php endforeach; ?>
                                                                                                </ol>
                                                                                            </li>
                                                                                        </ol>
                                                                                    </li>
                                                                                <?php endforeach; ?>
                                                                                </ol>
                                                                            </li>
                                                                        </ol>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                                    </ol>
                                                                </li>
                                                            <?php endforeach; ?>
                                                                </ol>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ol>
                                                </div>
                                            <?php endif; ?>

                                            <div class="btns">
                                                <div class="row  justify-content-center">
                                                    <button class="btns__btn   button button_blue">Сохранить</button>
                                                    <button class="btns__btn   button button_blue">Очистить</button>
                                                </div>
                                            </div>

                                        </div>
                                        <?= $this->render('_our_capabilities', ['model' => $model, 'direction_id' => $direction->id, 'theme_id' => $sub->theme->id, 'first' => $key, 'first2' => $key2]) ?>
                                    </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
                <?php if ($direction->subs): ?>
                    <div class="tabs-section__in  container">
                        <div class="company-office__section  company-office__row  row  justify-content-end">
                            <?= $this->render('_sidebar', ['class' => 0, 'active' => 'profile']) ?>
                            <div class="company-office-content-next  col-md-8 col-lg-9">

                                <?= $this->render('_areas_and_topics', ['model' => $model, 'direction' => $direction, 'first' => $key2]) ?>
                                <?php if($model->companyinfo->profileVariants->extra_sections_ch_n): ?>
                                    <?= $this->render('_why_choose_us', ['model' => $model, 'direction_id' => $direction->id, 'first' => $key2]) ?>
                                <?php endif; ?>
                                <?php if($model->companyinfo->profileVariants->extra_sections_sh_r_c): ?>
                                    <?= $this->render('_our_clients', ['model' => $model, 'direction_id' => $direction->id, 'first' => $key2]) ?>
                                    <?= $this->render('_testimonials', ['model' => $model, 'direction_id' => $direction->id, 'first' => $key2]) ?>
                                <?php endif; ?>

                                <?= $this->render('_about_company', ['model' => $model, 'direction_id' => $direction->id, 'first' => $key2]) ?>
                                <?= $this->render('_certificates', ['model' => $model, 'direction_id' => $direction->id, 'first' => $key2]) ?>

                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php $this->registerJs("

    var yourArray = [];//global variable
    $('#filter_checkbox_1_6').on('change', function(){
        $('input:checkbox[name=undefined]:checked').each(function(c, v){
            yourArray.push(v);
        });
        console.log(yourArray);
    });
    
");?>
