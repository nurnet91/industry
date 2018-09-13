<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */

use app\modules\bizley\podium\src\models\User;
use app\modules\bizley\podium\src\Podium;
use app\modules\bizley\podium\src\rbac\Rbac;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;

$items = [['label' => t( 'Home'), 'url' => ['forum/index']]];

$podiumModule = Podium::getInstance();

if (Podium::getInstance()->user->isGuest) {
    if (Podium::getInstance()->podiumConfig->get('members_visible')) {
        $items[] = [
            'label' => t( 'Members'),
            'url' => ['members/index'],
            'active' => $this->context->id == 'members'
        ];
    }
    if ($podiumModule->userComponent === true && $this->context->accessType === 1) {
        if ($podiumModule->podiumConfig->get('registration_off') != '1') {
            $items[] = ['label' => t( 'Register'), 'url' => $podiumModule->registerUrl];
        }
        $items[] = ['label' => t( 'Sign in'), 'url' => $podiumModule->loginUrl];
    }
} else {
    $podiumUser = User::findMe();
    $messageCount = $podiumUser->newMessagesCount;
    $subscriptionCount = $podiumUser->subscriptionsCount;

    if (User::can(Rbac::ROLE_ADMIN)) {
        $items[] = [
            'label' => t( 'Administration'),
            'url' => ['admin/index'],
            'active' => $this->context->id == 'admin'
        ];
    }
    $items[] = [
        'label' => t( 'Members'),
        'url' => ['members/index'],
        'active' => $this->context->id == 'members'
    ];
    $items[] = [
        'label' => t( 'Profile ({name})', ['name' => $podiumUser->podiumName])
                    . ($subscriptionCount ? ' ' . Html::tag('span', $subscriptionCount, ['class' => 'badge']) : ''),
        'url' => ['profile/index'],
        'items' => [
            ['label' => t( 'My Profile'), 'url' => ['profile/index']],
            ['label' => t( 'Account Details'), 'url' => ['profile/details']],
            ['label' => t( 'Forum Details'), 'url' => ['profile/forum']],
            ['label' => t( 'Subscriptions'), 'url' => ['profile/subscriptions']],
        ]
    ];
    $items[] = [
        'label' => t( 'Messages') . ($messageCount ? ' ' . Html::tag('span', $messageCount, ['class' => 'badge']) : ''),
        'url' => ['messages/inbox'],
        'items' => [
            ['label' => t( 'Inbox'), 'url' => ['messages/inbox']],
            ['label' => t( 'Sent'), 'url' => ['messages/sent']],
            ['label' => t( 'New Message'), 'url' => ['messages/new']],
        ]
    ];
    if ($podiumModule->userComponent === true) {
        $items[] = ['label' => t( 'Sign out'), 'url' => ['profile/logout'], 'linkOptions' => ['data-method' => 'post']];
    }
}

NavBar::begin([
    'brandLabel' => $podiumModule->podiumConfig->get('name'),
    'brandUrl' => ['forum/index'],
    'options' => ['class' => 'navbar-light navbar-default', 'id' => 'top','style'=>'background-color:#e9ecef'],
    'innerContainerOptions' => ['class' => 'container-fluid',]
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'encodeLabels' => false,
    'activateParents' => true,
    'items' => $items,
]);
NavBar::end();
