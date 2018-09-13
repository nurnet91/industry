<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */

use yii\helpers\Html;

if (!isset($author)) {
    $author = '';
}
if (!isset($model)) {
    $type    = 'posts';
    $display = 'topics';
}
else {
    $type    = $model->type;
    $display = $model->display;
}
?>
<?php if (!empty($dataProvider)): ?>
<?php
$typeName = $type == 'topics' ? t( 'threads') : t( 'posts');
if (!empty($query) && !empty($author)) {
    $this->title = t( 'Search for {type} with "{query}" by "{author}"', ['query' => Html::encode($query), 'author' => Html::encode($author), 'type' => $typeName]);
}
elseif (!empty($query) && empty($author)) {
    $this->title = t( 'Search for {type} with "{query}"', ['query' => Html::encode($query), 'type' => $typeName]);
}
elseif (empty($query) && !empty($author)) {
    $this->title = t( 'Search for {type} by "{author}"', ['author' => Html::encode($author), 'type' => $typeName]);
}
else {
    $this->title = t( 'Search for {type}', ['type' => $typeName]);
}
$this->params['breadcrumbs'][] = ['label' => t( 'Main Forum'), 'url' => ['forum/index']];
$this->params['breadcrumbs'][] = ['label' => t( 'Search Forum'), 'url' => ['forum/search']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-sm-12">
<?php switch ($display): ?>
<?php case 'posts': ?>
        <div class="panel-group" role="tablist">
            <?= $this->render('/elements/search/_forum_search_posts', ['dataProvider' => $dataProvider, 'query' => $query, 'author' => $author, 'type' => $type]) ?>
        </div>
<?php break; default: ?>
        <div class="panel-group" role="tablist">
            <?= $this->render('/elements/search/_forum_search_topics', ['dataProvider' => $dataProvider, 'query' => $query, 'author' => $author, 'type' => $type]) ?>
        </div>
<?php endswitch; ?>
    </div>
</div>
<?php else: ?>
<?php
$this->title = t( 'Search Forum');
$this->params['breadcrumbs'][] = ['label' => t( 'Main Forum'), 'url' => ['forum/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
<?= $this->render('/elements/search/_search', ['model' => $model, 'list' => $list]) ?>
</div>
<?php endif;
