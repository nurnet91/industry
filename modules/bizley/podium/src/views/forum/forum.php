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
use yii\helpers\Url;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => t( 'Main Forum'), 'url' => ['forum/index']];
$this->params['breadcrumbs'][] = ['label' => $model->category->name, 'url' => ['forum/category', 'id' => $model->category->id, 'slug' => $model->category->slug]];
$this->params['breadcrumbs'][] = $this->title;

?>
<?php if (!Podium::getInstance()->user->isGuest): ?>
<div class="row">
    <div class="col-sm-12 text-right">
        <ul class="list-inline">
<?php if (User::can(Rbac::PERM_CREATE_THREAD)): ?>
            <li><a href="<?= Url::to(['forum/new-thread', 'cid' => $model->category->id, 'fid' => $model->id]) ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> <?= t( 'Create new thread') ?></a></li>
<?php endif; ?>
            <li><a href="<?= Url::to(['forum/unread-posts']) ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-flash"></span> <?= t( 'Unread posts') ?></a></li>
        </ul>
    </div>
</div>
<?php endif; ?>

<div class="row">
    <div class="col-sm-12">
        <div class="panel-group" role="tablist">
            <?= $this->render('/elements/forum/_forum_section', ['model' => $model, 'filters' => $filters]) ?>
        </div>
    </div>
</div>
