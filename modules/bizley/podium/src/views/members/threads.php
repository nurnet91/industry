<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */

use yii\helpers\Url;

$this->title = t( 'Threads started by {name}', ['name' => $user->podiumName]);
$this->params['breadcrumbs'][] = ['label' => t( 'Members List'), 'url' => ['members/index']];
$this->params['breadcrumbs'][] = ['label' => t( 'Member View'), 'url' => ['members/view', 'id' => $user->id, 'slug' => $user->podiumSlug]];
$this->params['breadcrumbs'][] = $this->title;

?>
<ul class="nav nav-tabs">
    <li role="presentation"><a href="<?= Url::to(['members/index']) ?>"><span class="glyphicon glyphicon-user"></span> <?= t( 'Members List') ?></a></li>
    <li role="presentation"><a href="<?= Url::to(['members/mods']) ?>"><span class="glyphicon glyphicon-scissors"></span> <?= t( 'Moderation Team') ?></a></li>
    <li role="presentation"><a href="<?= Url::to(['members/view', 'id' => $user->id, 'slug' => $user->podiumSlug]) ?>"><span class="glyphicon glyphicon-eye-open"></span> <?= t( 'Member View') ?></a></li>
    <li role="presentation" class="active"><a href="#"><span class="glyphicon glyphicon-comment"></span> <?= t( 'Threads started by {name}', ['name' => $user->podiumName]) ?></a></li>
</ul>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="panel-group" role="tablist">
            <?= $this->render('/elements/members/_members_threads', ['user' => $user]) ?>
        </div>
    </div>
</div>
