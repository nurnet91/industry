<?php 

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;

?>
<?php NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => !Yii::$app->user->isGuest ? '/admin' : '/',
    'options' => ['class' => 'navbar-inverse navbar-fixed-top'],
]); ?>

    <?=Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => !Yii::$app->user->isGuest ? [
            [
                'label' => 'Users',
                'items' => [
                    ['label' => 'Users',                    'url' => ['/admin/users']],
                    ['label' => 'Company Profile Variants', 'url' => ['/admin/company-profile-variants']],
                ],
            ],
            [
                'label' => 'Messages',
                'items' => [
                    ['label' => 'Messages',         'url' => ['/admin/messages']],
                    ['label' => 'Users Messages',   'url' => ['/admin/user-messages']],
                ]
            ],
            ['label' => 'Mailer',       'url' => ['/admin/mailer']],
            ['label' => 'Countries',    'url' => ['/admin/countries']],
            ['label' => 'Categories',   'url' => ['/admin/category']],
            [
                'label' => 'Additionally',
                'items' => [
                    ['label' => 'Subscribers',      'url' => ['/admin/subscribers']],
                    ['label' => 'Social Networks',  'url' => ['/admin/socialnetworks']],
                    ['label' => 'Reviews',          'url' => ['/admin/reviews']],
                    ['label' => 'Referrals',        'url' => ['/admin/referals']],
                    ['label' => 'Advices',          'url' => ['/admin/advices']],
                     // '<li class="divider"></li>',
                     // '<li class="dropdown-header">Dropdown Header</li>',
                ]
            ],
            [
                'label' => 'Главная страница',
                'items' => [
                    ['label' => 'Что такое индастри?',      'url' => ['/admin/ih-about']],
                ]
            ],
            [
                'label' => 'Filters',
                'items' => [
                    ['label' => 'Directions',       'url' => ['/admin/directions']],
                    ['label' => 'Service filters',  'url' => ['/admin/filter-main/service']],
                    ['label' => 'Equipment filters','url' => ['/admin/filter-main/equipment']],
                    ['label' => 'Filters position', 'url' => ['/admin/filter-main/sorting']],
                ]
            ],
            [
                'label' => 'Slider',
                'items' => [
                    ['label' => 'Slider items',       'url' => ['/admin/slider-items']],
                    ['label' => 'Slider titles',      'url' => ['/admin/slider-titles']],
                ]
            ],
            [
                'label' => 'About',
                'items' => [
                    ['label' => 'Слово основателя',     'url' => ['/admin/words']],
                    ['label' => 'Нам доверяют',         'url' => ['/admin/reviews']],
                    ['label' => 'Об IH говорят',        'url' => ['/admin/about']],
                    ['label' => 'Наша команда',         'url' => ['/admin/comands']],
                    ['label' => 'Социальные проекты',   'url' => ['/admin/projects']],
                    ['label' => 'Контакты',             'url' => ['/admin/contacts']],
                    ['label' => 'FAQ',                  'url' => ['/admin/faqs']],
                ]
            ],
            [
                'label' => 'News',
                'items' => [
                    ['label' => 'News',         'url' => ['/admin/new-news']],
                    ['label' => 'Events',       'url' => ['/admin/new-events']],
                    ['label' => 'Banner',       'url' => ['/admin/banners']],
                    ['label' => 'Post',         'url' => ['/admin/new-statya']],
                    ['label' => 'Analytics',    'url' => ['/admin/new-analytics']],
                    ['label' => 'Promotions',   'url' => ['/admin/new-promotions']],
                    ['label' => 'Reports',      'url' => ['/admin/new-reports']],
                    ['label' => 'Videos',       'url' => ['/admin/new-videos']],
                    ['label' => 'Presentations','url' => ['/admin/new-presentations']],
                    ['label' => 'Photos',       'url' => ['/admin/new-photos']],
                ],
            ],
            '<li>'.
                Html::beginForm(['/admin/logout'], 'post').
                Html::submitButton('Logout ('.Yii::$app->user->identity->username.')', ['class' => 'btn btn-link logout']).
                Html::endForm().
            '</li>'
        ] : [],
    ]); ?>

<?php NavBar::end(); ?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
