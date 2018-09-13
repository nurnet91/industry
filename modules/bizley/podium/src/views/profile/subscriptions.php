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

$this->title = t( 'Subscriptions');
$this->params['breadcrumbs'][] = ['label' => t( 'My Profile'), 'url' => ['profile/index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="row">
    <div class="col-md-3 col-sm-4">
        <?= $this->render('/elements/profile/_navbar', ['active' => 'subscriptions']) ?>
    </div>
    <div class="col-md-9 col-sm-8">
        <h4><?= t( 'Subscriptions') ?></h4>
        <?= Html::beginForm(); ?>
<?= GridView::widget([
    'dataProvider'   => $dataProvider,
    'columns' => [
        [
            'class' => CheckboxColumn::className(),
            'headerOptions' => ['class' => 'col-sm-1 text-center'],
            'contentOptions' => ['class' => 'col-sm-1 text-center'],
            'checkboxOptions' => function($model) {
                return ['value' => $model->id];
            }
        ],
        [
            'attribute' => 'thread.name',
            'label' => t( "Thread's Name"),
            'format' => 'raw',
            'value' => function ($model) {
                return Html::a($model->thread->name, ['forum/show', 'id' => $model->thread->latest->id], ['class' => 'center-block']);
            },
        ],
        [
            'attribute' => 'post_seen',
            'headerOptions' => ['class' => 'text-center'],
            'contentOptions' => ['class' => 'text-center'],
            'label' => t( 'New Posts'),
            'format' => 'raw',
            'value' => function ($model) {
                return $model->post_seen ? '' : '<span class="glyphicon glyphicon-ok-sign"></span>';
            },
        ],
        [
            'class' => ActionColumn::className(),
            'template' => '{mark} {delete}',
            'buttons' => [
                'mark' => function($url, $model) {
                    if ($model->post_seen) {
                        return Html::a('<span class="glyphicon glyphicon-eye-close"></span> <span class="hidden-sm">' . t( 'Mark unseen') . '</span>', $url, [
                            'class' => 'btn btn-warning btn-xs'
                        ]);
                    }
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span> <span class="hidden-sm">' . t( 'Mark seen') . '</span>', $url, [
                        'class' => 'btn btn-success btn-xs'
                    ]);
                },
                'delete' => function($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span> <span class="hidden-sm">' . t( 'Unsubscribe') . '</span>', $url, [
                        'class' => 'btn btn-danger btn-xs'
                    ]);
                },
            ],
        ]
    ],
]); ?>
            <div class="row">
                <div class="col-sm-12">
                    <?= Html::submitButton('<span class="glyphicon glyphicon-trash"></span> ' . t( 'Unsubscribe Selected Threads'), ['class' => 'btn btn-danger btn-sm', 'name' => 'delete-button']) ?>
                </div>
            </div>
        <?= Html::endForm(); ?>
    </div>
</div><br>
