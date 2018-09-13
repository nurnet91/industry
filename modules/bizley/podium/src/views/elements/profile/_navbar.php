<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */

use app\modules\bizley\podium\src\models\User;
use yii\helpers\Url;

$podiumUser        = User::findMe();
$messageCount      = $podiumUser->getNewMessagesCount();
$subscriptionCount = $podiumUser->getSubscriptionsCount();

?>
<ul class="nav nav-pills nav-stacked">
    <li role="presentation" class="<?= $active == 'profile' ? 'active' : '' ?>"><a href="<?= Url::to(['profile/index']) ?>"><?= t( 'My Profile') ?></a></li>
    <li role="presentation" class="<?= $active == 'details' ? 'active' : '' ?>"><a href="<?= Url::to(['profile/details']) ?>"><?= t( 'Account Details') ?></a></li>
    <li role="presentation" class="<?= $active == 'forum' ? 'active' : '' ?>"><a href="<?= Url::to(['profile/forum']) ?>"><?= t( 'Forum Details') ?></a></li>
    <li role="presentation" class="<?= $active == 'messages' ? 'active' : '' ?>"><a href="<?= Url::to(['messages/inbox']) ?>"><?php if ($messageCount): ?><span class="badge pull-right"><?= $messageCount ?></span><?php endif; ?><?= t( 'Messages') ?></a></li>
    <li role="presentation" class="<?= $active == 'subscriptions' ? 'active' : '' ?>"><a href="<?= Url::to(['profile/subscriptions']) ?>"><?php if ($subscriptionCount): ?><span class="badge pull-right"><?= $subscriptionCount ?></span><?php endif; ?><?= t( 'Subscriptions') ?></a></li>
</ul>
