<?php

use yii\helpers\Html;

?>
<hr>
<p><strong><?= t( 'Poll'); ?>: <?= Html::encode($model->pollQuestion) ?></strong></p>
<ul class="list-inline">
    <li><small><?= t( 'Number of votes'); ?>: <span class="badge"><?= Html::encode($model->pollVotes) ?></span></small></li>
<?php if ($model->pollHidden): ?>
    <li><small><span class="glyphicon glyphicon-eye-close"></span> <?= t( 'Results hidden before voting'); ?></small></li>
<?php else: ?>
    <li><small><span class="glyphicon glyphicon-eye-open"></span> <?= t( 'Results visible before voting'); ?></small></li>
<?php endif; ?>
    <li><small>
        <span class="glyphicon glyphicon-calendar"></span>
        <?= t( 'Poll ends at'); ?>:
        <?= empty($model->pollEnd) ? '-' : Html::encode($model->pollEnd) . ' 23:59' ?>
    </small></li>
</ul>
<ul>
<?php foreach ($model->pollAnswers as $answer): ?>
<?php if (!empty($answer)): ?>
    <li><?= Html::encode($answer) ?></li>
<?php endif; ?>
<?php endforeach; ?>
</ul>