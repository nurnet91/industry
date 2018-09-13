<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */

use app\modules\bizley\podium\src\helpers\Helper;
use app\modules\bizley\podium\src\models\User;
use app\modules\bizley\podium\src\Podium;
use app\modules\bizley\podium\src\widgets\Avatar;
use app\modules\bizley\podium\src\widgets\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = t( 'Member View');
$this->params['breadcrumbs'][] = ['label' => t( 'Administration Dashboard'), 'url' => ['admin/index']];
$this->params['breadcrumbs'][] = ['label' => t( 'Forum Members'), 'url' => ['admin/members']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs("$('[data-toggle=\"tooltip\"]').tooltip();");

$loggedId = User::loggedId();

?>
<?= $this->render('/elements/admin/_navbar', ['active' => 'members']); ?>
<br>
<div class="row">
    <div class="col-sm-9">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="pull-right">
<?php if ($model->id !== $loggedId): ?>
                    <a href="<?= Url::to(['messages/new', 'user' => $model->id]) ?>" class="btn btn-default btn-lg" data-toggle="tooltip" data-placement="top" title="<?= t( 'Send Message') ?>"><span class="glyphicon glyphicon-envelope"></span></a>
<?php else: ?>
                    <a href="#" class="btn btn-lg disabled text-muted"><span class="glyphicon glyphicon-envelope"></span></a>
<?php endif; ?>
<?php if ($model->id !== $loggedId): ?>
<?php if ($model->status !== User::STATUS_BANNED): ?>
                    <span data-toggle="modal" data-target="#podiumModalBan"><button class="btn btn-danger btn-lg" data-toggle="tooltip" data-placement="top" title="<?= t( 'Ban Member') ?>"><span class="glyphicon glyphicon-ban-circle"></span></button></span>
<?php else: ?>
                    <span data-toggle="modal" data-target="#podiumModalUnBan"><button class="btn btn-success btn-lg" data-toggle="tooltip" data-placement="top" title="<?= t( 'Unban Member') ?>"><span class="glyphicon glyphicon-ok-circle"></span></button></span>
<?php endif; ?>
<?php else: ?>
                    <a href="#" class="btn btn-lg disabled text-muted"><span class="glyphicon glyphicon-ban-circle"></span></a>
<?php endif; ?>
<?php if ($model->id !== $loggedId): ?>
                    <span data-toggle="modal" data-target="#podiumModalDelete"><button class="btn btn-danger btn-lg" data-toggle="tooltip" data-placement="top" title="<?= t( 'Delete Member') ?>"><span class="glyphicon glyphicon-trash"></span></button></span>
<?php else: ?>
                    <a href="#" class="btn btn-lg disabled text-muted"><span class="glyphicon glyphicon-trash"></span></a>
<?php endif; ?>
                </div>
                <h2>
                    <?= Html::encode($model->podiumName) ?>
                    <small>
                        <?= Html::encode($model->email) ?>
                        <?= Helper::roleLabel($model->role) ?>
                        <?= Helper::statusLabel($model->status) ?>
                    </small>
                </h2>

                <p><?= t( 'Whereabouts') ?>: <?= !empty($model->meta) && !empty($model->meta->location) ? Html::encode($model->meta->location) : '-' ?></p>

<?php if ($model->status == User::STATUS_ACTIVE): ?>
<?php if ($model->role == User::ROLE_MEMBER): ?>
                <p><button class="btn btn-primary" data-toggle="modal" data-target="#podiumModalPromote"><span class="glyphicon glyphicon-open"></span> <?= t( 'Promote {name} to Moderator', ['name' => Html::encode($model->podiumName)]) ?></button></p>
<?php elseif ($model->role == User::ROLE_MODERATOR): ?>
                <p><button class="btn btn-warning" data-toggle="modal" data-target="#podiumModalDemote"><span class="glyphicon glyphicon-save"></span> <?= t( 'Demote {name} to Member', ['name' => Html::encode($model->podiumName)]) ?></button></p>
<?php endif; ?>
<?php endif; ?>
                <p><?= t( 'Member since {date}', ['date' => Podium::getInstance()->formatter->asDatetime($model->created_at, 'long')]) ?> (<?= Podium::getInstance()->formatter->asRelativeTime($model->created_at) ?>)</p>
<?php if ($model->status == User::STATUS_REGISTERED): ?>
                <p><em><?= t( 'The account is awaiting activation.') ?></em></p>
<?php else: ?>
<?php if (!empty($model->activity)): ?>
                <p><?= t( 'Last action') ?>: <code><?= Html::encode($model->activity->url) ?></code> <small><?= t( 'IP') ?>: <code><?= Html::encode($model->activity->ip) ?></code> <?= t( 'Date') ?>: <?= Podium::getInstance()->formatter->asDatetime($model->activity->created_at) ?> (<?= Podium::getInstance()->formatter->asRelativeTime($model->activity->created_at) ?>)</small></p>
<?php endif; ?>
                <p>
                    <a href="<?= Url::to(['members/threads', 'id' => $model->id, 'slug' => $model->podiumSlug]) ?>" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> <?= t( 'Find all threads started by {name}', ['name' => Html::encode($model->podiumName)]) ?></a>
                    <a href="<?= Url::to(['members/posts', 'id' => $model->id, 'slug' => $model->podiumSlug]) ?>" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> <?= t( 'Find all posts created by {name}', ['name' => Html::encode($model->podiumName)]) ?></a>
                </p>
<?php endif; ?>
            </div>
            <div class="panel-footer">
                <ul class="list-inline">
                    <li><?= t( 'Threads') ?> <span class="badge"><?= $model->threadsCount ?></span></li>
                    <li><?= t( 'Posts') ?> <span class="badge"><?= $model->postsCount ?></span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-sm-3 hidden-xs">
        <?= Avatar::widget([
            'author' => $model,
            'showName' => false
        ]) ?>
    </div>
</div>

<?php Modal::begin([
    'id' => 'podiumModalDelete',
    'header' => t( 'Delete User'),
    'footer' => t( 'Delete User'),
    'footerConfirmOptions' => ['class' => 'btn btn-danger'],
    'footerConfirmUrl' => Url::to(['admin/delete', 'id' => $model->id])
 ]) ?>
<p><?= t( 'Are you sure you want to delete this user?') ?></p>
<p><?= t( 'The user can register again using the same name but all previously created posts will not be linked back to him.') ?></p>
<p><strong><?= t( 'This action can not be undone.') ?></strong></p>
<?php Modal::end() ?>
<?php Modal::begin([
    'id' => 'podiumModalBan',
    'header' => t( 'Ban User'),
    'footer' => t( 'Ban User'),
    'footerConfirmOptions' => ['class' => 'btn btn-danger'],
    'footerConfirmUrl' => Url::to(['admin/ban', 'id' => $model->id])
 ]) ?>
<p><?= t( 'Are you sure you want to ban this user?') ?></p>
<p><?= t( 'The user will not be deleted but will not be able to sign in again.') ?></p>
<p><strong><?= t( 'You can always unban the user if you change your mind later on.') ?></strong></p>
<?php Modal::end() ?>
<?php Modal::begin([
    'id' => 'podiumModalUnBan',
    'header' => t( 'Unban User'),
    'footer' => t( 'Unban User'),
    'footerConfirmOptions' => ['class' => 'btn btn-success'],
    'footerConfirmUrl' => Url::to(['admin/ban', 'id' => $model->id])
 ]) ?>
<p><?= t( 'Are you sure you want to unban this user?') ?></p>
<p><?= t( 'The user will be able to sign in again.') ?></p>
<?php Modal::end() ?>
<?php Modal::begin([
    'id' => 'podiumModalPromote',
    'header' => t( 'Promote User'),
    'footer' => t( 'Promote User'),
    'footerConfirmOptions' => ['class' => 'btn btn-success'],
    'footerConfirmUrl' => Url::to(['admin/promote', 'id' => $model->id])
 ]) ?>
<p><?= t( 'Are you sure you want to promote this user to Moderator?') ?></p>
<p><?= t( 'You can choose forums for this user to moderate in next step.') ?></p>
<?php Modal::end() ?>
<?php Modal::begin([
    'id' => 'podiumModalDemote',
    'header' => t( 'Demote User'),
    'footer' => t( 'Demote User'),
    'footerConfirmOptions' => ['class' => 'btn btn-danger'],
    'footerConfirmUrl' => Url::to(['admin/demote', 'id' => $model->id])
 ]) ?>
<p><?= t( 'Are you sure you want to demote this user to Member?') ?></p>
<p><?= t( 'All his moderation assignments will be removed.') ?></p>
<?php Modal::end();
