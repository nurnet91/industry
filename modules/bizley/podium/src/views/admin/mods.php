<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */

use app\modules\bizley\podium\src\widgets\gridview\ActionColumn;
use app\modules\bizley\podium\src\widgets\gridview\GridView;
use yii\grid\CheckboxColumn;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = t( 'Moderators');
$this->params['breadcrumbs'][] = ['label' => t( 'Administration Dashboard'), 'url' => ['admin/index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<?= $this->render('/elements/admin/_navbar', ['active' => 'mods']); ?>
<br>
<?php if (empty($moderators)): ?>
<div class="row">
    <div class="col-sm-12">
        <h3><?= t( 'No moderators have been added yet.') ?></h3>
    </div>
</div>
<?php else: ?>
<div class="row">
    <br>
    <div class="col-sm-3">
        <ul class="nav nav-pills nav-stacked">
<?php foreach ($moderators as $moderator): ?>
            <li role="presentation" class="<?= $moderator->id == $mod->id ? 'active' : '' ?>">
                <a href="<?= Url::to(['admin/mods', 'id' => $moderator->id]) ?>">
                    <span class="glyphicon glyphicon-chevron-right"></span> <?= Html::encode($moderator->podiumName) ?>
                </a>
            </li>
<?php endforeach; ?>
        </ul>
    </div>
    <div class="col-sm-9">
        <h4><?= t( 'List Forums') ?></h4>
        <?= Html::beginForm(); ?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'class' => CheckboxColumn::className(),
            'headerOptions' => ['class' => 'col-sm-1 text-center'],
            'contentOptions' => ['class' => 'col-sm-1 text-center'],
            'checkboxOptions' => function($model) use ($mod) {
                return ['value' => $model->id, 'checked' => $model->isMod($mod->id)];
            }
        ],
        [
            'attribute' => 'id',
            'label' => t( 'ID'),
            'contentOptions' => ['class' => 'col-sm-1 text-center'],
            'headerOptions' => ['class' => 'col-sm-1 text-center'],
        ],
        [
            'attribute' => 'name',
            'label' => t( 'Name'),
            'format' => 'raw',
            'value' => function ($model) use ($mod) {
                return Html::encode($model->name) . ($model->isMod($mod->id) ? Html::hiddenInput('pre[]', $model->id) : '');
            },
        ],
        [
            'class' => ActionColumn::className(),
            'template' => '{mod}',
            'urlCreator' => function ($action, $model) use ($mod) {
                return Url::toRoute([$action, 'fid' => $model->id, 'uid' => $mod->id]);
            },
            'buttons' => [
                'mod' => function($url, $model) use ($mod) {
                    if ($model->isMod($mod->id)) {
                        return Html::a('<span class="glyphicon glyphicon-remove"></span> ' . t( 'Remove'), $url, ActionColumn::buttonOptions([
                            'class' => 'btn btn-danger btn-xs',
                            'title' => t( 'Remove from moderation list')
                        ]));
                    }
                    return Html::a('<span class="glyphicon glyphicon-plus"></span> ' . t( 'Add'), $url, ActionColumn::buttonOptions([
                        'class' => 'btn btn-success btn-xs',
                        'title' => t( 'Add to moderation list')
                    ]));
                },
            ],
        ]
    ],
]); ?>
        <?= Html::hiddenInput('mod_id', $mod->id) ?>
        <div class="row">
            <div class="col-sm-12">
                <?= Html::submitButton('<span class="glyphicon glyphicon-ok-sign"></span> ' . t( 'Save Selected Moderation List'), [
                    'class' => 'btn btn-primary btn-sm',
                    'name' => 'save-button'
                ]) ?>
            </div>
        </div>
        <?= Html::endForm(); ?>
    </div>
</div><br>
<?php endif;
