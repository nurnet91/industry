<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */

use app\modules\bizley\podium\src\models\Post;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\Pjax;

$this->title = t( 'Posts created by {name}', ['name' => $user->podiumName]);
$this->params['breadcrumbs'][] = ['label' => t( 'Members List'), 'url' => ['members/index']];
$this->params['breadcrumbs'][] = ['label' => t( 'Member View'), 'url' => ['members/view', 'id' => $user->id, 'slug' => $user->podiumSlug]];
$this->params['breadcrumbs'][] = $this->title;

?>
<ul class="nav nav-tabs">
    <li role="presentation"><a href="<?= Url::to(['members/index']) ?>"><span class="glyphicon glyphicon-user"></span> <?= t( 'Members List') ?></a></li>
    <li role="presentation"><a href="<?= Url::to(['members/mods']) ?>"><span class="glyphicon glyphicon-scissors"></span> <?= t( 'Moderation Team') ?></a></li>
    <li role="presentation"><a href="<?= Url::to(['members/view', 'id' => $user->id, 'slug' => $user->podiumSlug]) ?>"><span class="glyphicon glyphicon-eye-open"></span> <?= t( 'Member View') ?></a></li>
    <li role="presentation" class="active"><a href="#"><span class="glyphicon glyphicon-comment"></span> <?= t( 'Posts created by {name}', ['name' => $user->podiumName]) ?></a></li>
</ul>
<br>
<?php Pjax::begin();
echo ListView::widget([
    'dataProvider'     => (new Post())->searchByUser($user->id),
    'itemView'         => '/elements/forum/_post',
    'viewParams'       => ['parent' => true],
    'summary'          => '',
    'emptyText'        => t( 'No posts have been added yet.'),
    'emptyTextOptions' => ['tag' => 'h3', 'class' => 'text-muted'],
    'pager'            => ['options' => ['class' => 'pagination pull-right']]
]);
Pjax::end(); ?>
<br>
