<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */

use yii\helpers\Html;

$typeName = $type == 'topics' ? t( 'threads') : t( 'posts');

?>
<div class="row">
    <div class="col-sm-12">
        <h4>
<?php if (!empty($query) && !empty($author)): ?>
            <?= t( 'Search for {type} with "{query}" by "{author}"', ['query' => Html::encode($query), 'author' => Html::encode($author), 'type' => $typeName]) ?>
<?php elseif (!empty($query) && empty($author)): ?>
            <?= t( 'Search for {type} with "{query}"', ['query' => Html::encode($query), 'type' => $typeName]) ?>
<?php elseif (empty($query) && !empty($author)): ?>
            <?= t( 'Search for {type} by "{author}"', ['author' => Html::encode($author), 'type' => $typeName]) ?>
<?php else: ?>
            <?= t( 'Search for {type}', ['type' => $typeName]) ?>
<?php endif; ?>
        </h4>
    </div>
</div>
<?= $this->render('/elements/search/_threads_search_posts', ['dataProvider' => $dataProvider, 'type' => $type, 'query' => Html::encode($query)]) ?>
