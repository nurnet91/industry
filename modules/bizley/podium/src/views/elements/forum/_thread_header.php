<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */

use app\modules\bizley\podium\src\Podium;
use yii\helpers\Url;

?>
<?php if (isset($category, $forum, $slug)): ?>
<tr>
    <td colspan="4" class="small">
        <ul class="list-inline">
            <li class="text-muted">
                <?= t( 'Show only') ?>
            </li>
<?php if (!Podium::getInstance()->user->isGuest): ?>
            <li>
                <a href="<?= Url::to(['forum/forum', 'cid' => $category, 'id' => $forum, 'slug' => $slug, 'toggle' => 'new']) ?>" class="btn btn-success btn-xs <?= !empty($filters['new']) && $filters['new'] ? 'active' : '' ?>">
                    <span class="glyphicon glyphicon-leaf"></span>
                    <span class="hidden-xs hidden-sm"><?= t( 'New Posts') ?></span>
                    <span class="hidden-xs hidden-md hidden-lg"><?= t( 'New') ?></span>
                </a>
            </li>
            <li>
                <a href="<?= Url::to(['forum/forum', 'cid' => $category, 'id' => $forum, 'slug' => $slug, 'toggle' => 'edit']) ?>" class="btn btn-warning btn-xs <?= !empty($filters['edit']) && $filters['edit'] ? 'active' : '' ?>">
                    <span class="glyphicon glyphicon-comment"></span>
                    <span class="hidden-xs hidden-sm"><?= t( 'Edited Posts') ?></span>
                    <span class="hidden-xs hidden-md hidden-lg"><?= t( 'Edited') ?></span>
                </a>
            </li>
<?php endif; ?>
            <li>
                <a href="<?= Url::to(['forum/forum', 'cid' => $category, 'id' => $forum, 'slug' => $slug, 'toggle' => 'hot']) ?>" class="btn btn-default btn-xs <?= !empty($filters['hot']) && $filters['hot'] ? 'active' : '' ?>">
                    <span class="glyphicon glyphicon-fire"></span>
                    <span class="hidden-xs hidden-sm"><?= t( 'Hot Threads') ?></span>
                    <span class="hidden-xs hidden-md hidden-lg"><?= t( 'Hot') ?></span>
                </a>
            </li>
            <li>
                <a href="<?= Url::to(['forum/forum', 'cid' => $category, 'id' => $forum, 'slug' => $slug, 'toggle' => 'pin']) ?>" class="btn btn-default btn-xs <?= !empty($filters['pin']) && $filters['pin'] ? 'active' : '' ?>">
                    <span class="glyphicon glyphicon-pushpin"></span>
                    <span class="hidden-xs hidden-sm"> <?= t( 'Pinned Threads') ?></span>
                    <span class="hidden-xs hidden-md hidden-lg"> <?= t( 'Pinned') ?></span>
                </a>
            </li>
            <li>
                <a href="<?= Url::to(['forum/forum', 'cid' => $category, 'id' => $forum, 'slug' => $slug, 'toggle' => 'lock']) ?>" class="btn btn-default btn-xs <?= !empty($filters['lock']) && $filters['lock'] ? 'active' : '' ?>">
                    <span class="glyphicon glyphicon-lock"></span>
                    <span class="hidden-xs hidden-sm"> <?= t( 'Locked Threads') ?></span>
                    <span class="hidden-xs hidden-md hidden-lg"> <?= t( 'Locked') ?></span>
                </a>
            </li>
            <li>
                <a href="<?= Url::to(['forum/forum', 'cid' => $category, 'id' => $forum, 'slug' => $slug, 'toggle' => 'all']) ?>" class="btn btn-info btn-xs">
                    <span class="glyphicon glyphicon-asterisk"></span>
                    <span class="hidden-xs hidden-sm"> <?= t( 'All Threads') ?></span>
                    <span class="hidden-xs hidden-md hidden-lg"> <?= t( 'All') ?></span>
                </a>
            </li>
        </ul>
    </td>
</tr>
<?php endif; ?>
<tr>
    <th class="col-sm-7"><small><?= t( 'Thread') ?></small></th>
    <th class="col-sm-1 text-center"><small><?= t( 'Replies') ?></small></th>
    <th class="col-sm-1 text-center"><small><?= t( 'Views') ?></small></th>
    <th class="col-sm-3"><small><?= t( 'Latest Post') ?></small></th>
</tr>
