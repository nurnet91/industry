<?php
use yii\helpers\Url;

?>

<?php


$class =  isset($class) ? $class: 'block-margin-adaptive';
$active = isset($active) ? $active : 'index';

$menus = [
    'index' => [
        'link' => Url::to(['company/index']),
        'label' => t('Главная')
    ],
    'analytic' => [
        'link' => Url::to(['company/analytic']),
        'label' => t('Статистика')
    ],
    'profile' => [
        'link' => Url::to(['company/profile']),
        'label' => t('Настройка профиля')
    ],
    'tenders' => [
        'link' => Url::to(['company/tenders']),
        'label' => t('Запросы ')
    ],
    //и тендеры
    'activity' => [
        'link' => Url::to(['company/activity']),
        'label' => t('Активность')
    ],
    'advertising' => [
        'link' => Url::to(['company/advertising']),
        'label' => t('Реклама')
    ],
//    'webinars' => [
//        'link' => Url::to(['company/webinars']),
//        'label' => t('Вебинары')
//    ]
];


?>
<div class="company-menu  company-menu_mob  col-md-4  col-lg-3  <?=$class?>">
    <button class="company-menu__btn-close  company-menu__btn-close_close  animated  pulse_bigger  infinite"><i class="fa fa-times" aria-hidden="true"></i></button>
    <ul>
        <?php foreach( $menus as $index => $menu ): ?>
            <?php if($active == $index):?>
                <li class="company-menu__active">
                    <span><?= $menu['label'] ?></span>
                </li>
            <?php else:?>
                <li>
                    <a href="<?= $menu['link'] ?>"><?= $menu['label'] ?></a>
                </li>
            <?php endif?>
        <?php endforeach ?>
    </ul>
</div>
