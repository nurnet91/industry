<?php

use app\models\Categories;
use app\models\Directions;

$categories = Categories::menuList();
$interests = Directions::find()->all();

?>

<ul class="flex">
    <?php if (!empty($categories)): ?>
        <?php foreach ($categories as $key => $value): ?>
            <li class="<?=$key == 0 ? 'active' : '' ?>">
                <?php if (!empty($value['childs']) || $value['model']->is_direction): ?>
                    <?php if ($key == 0): ?>
                        <span><?=$value['model']->name ?></span>
                    <?php else: ?>
                        <a href="<?=$value['model']->link ?>"><?=$value['model']->name ?>
                            <?php if (!empty($value['model']->news)): ?>
                                <span class="header_menu__indicator  indicator"><?= count($value['model']->news) ?></span>
                            <?php endif; ?>
                        </a>
                    <?php endif ?>
                    <i class="fa fa-caret-down"></i>
                    <?php if($value['model']->is_direction): ?>
                        <ul class="header_menu__popup">
                            <?php foreach ($interests as $direction): ?>
                                <li>
                                    <a href="/main/directions?id=<?=$direction->id ?>"><?=$direction->name ?></a>
<!--                                --><?php //foreach ($value['childs'] as $key2 => $value2): ?>
<!--                                        --><?php //if (!empty($value2['childs'])): ?>
                                            <i class="fa fa-caret-right"></i>
                                        <div class="header_menu__popup-in">
                                            <div class="header_menu__title  content-text">
                                                <h3><?=$direction->name ?></h3>
                                            </div>
                                            <ul>
                                                <li>
                                                    <a href="#">Поиск компаний</a>
                                                </li>
                                                <li>
                                                    <a href="#">Главные новости</a>
                                                </li>
                                                <li>
                                                    <a href="#">Новости российских компаний</a>
                                                </li>
                                                <li>
                                                    <a href="#">Новости зарубежных компаний</a>
                                                </li>
                                                <li>
                                                    <a href="#">Новое в Базе Знаний</a>
                                                </li>
                                                <li>
                                                    <a href="#">События</a>
                                                </li>
                                                <li>
                                                    <a href="#">Репортажи, интервью</a>
                                                </li>
                                                <li>
                                                    <a href="#">Акции</a>
                                                </li>
                                            </ul>
                                            <ul>
                                                <li>
                                                    <a href="#">Вебинары</a>
                                                </li>
                                                <li>
                                                    <a href="#">Б/У оборудование</a>
                                                </li>
                                                <li>
                                                    <a href="#">Коммерческие тендеры</a>
                                                </li>
                                                <li>
                                                    <a href="#">Резюме и вакансии</a>
                                                </li>
                                            </ul>
                                        </div>
<!--                                            <div class="header_menu__popup-in">-->
<!--                                                <div class="header_menu__title  content-text">-->
<!--                                                    <h3>--><?//=$direction->name ?><!--</h3>-->
<!--                                                </div>-->
<!--                                                <ul>-->
<!--                                                    --><?php //foreach ($value2['childs'] as $key3 => $value3): ?>
<!--                                                        <li>-->
<!--                                                            <a href="--><?//=$value3['model']->link ?><!--">--><?//=$value3['model']->name ?><!--</a>-->
<!--                                                        </li>-->
<!--                                                    --><?php //endforeach ?>
<!--                                                </ul>-->
<!--                                            </div>-->
<!--                                        --><?php //endif ?>
<!--                                --><?php //endforeach ?>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    <?php else: ?>
                    <ul class="header_menu__popup">
                        <?php foreach ($value['childs'] as $key2 => $value2): ?>
                            <li>
                                <a href="<?=$value2['model']->link ?>"><?=$value2['model']->name ?></a>
                                <?php if (!empty($value2['childs'])): ?>
                                    <i class="fa fa-caret-right"></i>
                                    <div class="header_menu__popup-in">
                                        <div class="header_menu__title  content-text">
                                            <h3><?=$value2['model']->name ?></h3>
                                        </div>
                                        <ul>
                                            <?php foreach ($value2['childs'] as $key3 => $value3): ?>
                                                <li>
                                                    <a href="<?=$value3['model']->link ?>"><?=$value3['model']->name ?></a>
                                                </li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                <?php endif ?>
                            </li>
                        <?php endforeach ?>
                    </ul>
                    <?php endif; ?>
                <?php else: ?>
                    <a href="<?=$value['model']->link ?>"><?=$value['model']->name ?>
                        <?php if (!empty($value['model']->news)): ?>
                            <span class="header_menu__indicator  indicator"><?= count($value['model']->news) ?></span>
                        <?php endif; ?>
                    </a>
                <?php endif ?>

            </li>
        <?php endforeach ?>
    <?php endif ?>
</ul>