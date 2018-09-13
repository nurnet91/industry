<?php

/**
 * Podium Module
 * Yii 2 Forum Module
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */

use app\modules\bizley\podium\src\models\User;
use app\modules\bizley\podium\src\widgets\gridview\ActionColumn;
use app\modules\bizley\podium\src\widgets\gridview\GridView;
use app\modules\bizley\podium\src\widgets\Modal;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$this->title = t( 'Forum Members');
$this->params['breadcrumbs'][] = ['label' => t( 'Administration Dashboard'), 'url' => ['admin/index']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs("$('#podiumModalDelete').on('show.bs.modal', function(e) { var button = $(e.relatedTarget); $('#deleteUrl').attr('href', button.data('url')); });");
$this->registerJs("$('#podiumModalBan').on('show.bs.modal', function(e) { var button = $(e.relatedTarget); $('#banUrl').attr('href', button.data('url')); });");
$this->registerJs("$('#podiumModalUnBan').on('show.bs.modal', function(e) { var button = $(e.relatedTarget); $('#unbanUrl').attr('href', button.data('url')); });");

$loggedId = User::loggedId();

?>
<?= $this->render('/elements/admin/_navbar', ['active' => 'members']); ?>
<br>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'attribute' => 'id',
            'label' => t( 'ID'),
            'contentOptions' => ['class' => 'col-sm-1 text-right'],
            'headerOptions' => ['class' => 'col-sm-1 text-right'],
        ],
        [
            'attribute' => 'username',
            'label' => t( 'Username'),
        ],
        [
            'attribute' => 'email',
            'label' => t( 'E-mail'),
            'format' => 'raw',
            'value' => function ($model) {
                return Html::mailto($model->email);
            },
        ],
        [
            'attribute' => 'role',
            'label' => t( 'Role'),
            'filter' => User::getRoles(),
            'value' => function ($model) {
                return ArrayHelper::getValue(User::getRoles(), $model->role);
            },
        ],
        [
            'attribute' => 'status',
            'label' => t( 'Status'),
            'filter' => User::getStatuses(),
            'value' => function ($model) {
                return ArrayHelper::getValue(User::getStatuses(), $model->status);
            },
        ],
        [
            'class' => ActionColumn::className(),
            'template' => '{view} {pm} {ban} {delete}',
            'buttons' => [
                'view' => function($url) {
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ActionColumn::buttonOptions([
                        'title' => t( 'View Member')
                    ]));
                },
                'pm' => function($url, $model) use ($loggedId) {
                    if ($model->id !== $loggedId) {
                        return Html::a('<span class="glyphicon glyphicon-envelope"></span>', ['messages/new', 'user' => $model->id], ActionColumn::buttonOptions([
                            'title' => t( 'Send Message')
                        ]));
                    }
                    return ActionColumn::mutedButton('glyphicon glyphicon-envelope');
                },
                'ban' => function($url, $model) use ($loggedId) {
                    if ($model->id !== $loggedId) {
                        if ($model->status !== User::STATUS_BANNED) {
                            return Html::tag('span', Html::tag('button', '<span class="glyphicon glyphicon-ban-circle"></span>', ActionColumn::buttonOptions([
                                'class' => 'btn btn-danger btn-xs',
                                'title' => t( 'Ban Member')
                            ])), ['data-toggle' => 'modal', 'data-target' => '#podiumModalBan', 'data-url' => $url]);
                        }
                        return Html::tag('span', Html::tag('button', '<span class="glyphicon glyphicon-ok-circle"></span>', ActionColumn::buttonOptions([
                            'class' => 'btn btn-success btn-xs',
                            'title' => t( 'Unban Member')
                        ])), ['data-toggle' => 'modal', 'data-target' => '#podiumModalUnBan', 'data-url' => $url]);
                    }
                    return ActionColumn::mutedButton('glyphicon glyphicon-ban-circle');
                },
                'delete' => function($url, $model) use ($loggedId) {
                    if ($model->id !== $loggedId) {
                        return Html::tag('span', Html::tag('button', '<span class="glyphicon glyphicon-trash"></span>', ActionColumn::buttonOptions([
                            'class' => 'btn btn-danger btn-xs',
                            'title' => t( 'Delete Member')
                        ])), ['data-toggle' => 'modal', 'data-target' => '#podiumModalDelete', 'data-url' => $url]);
                    }
                    return ActionColumn::mutedButton('glyphicon glyphicon-trash');
                },
            ],
        ]
    ],
]); ?>

<?php Modal::begin([
    'id' => 'podiumModalDelete',
    'header' => t( 'Delete User'),
    'footer' => t( 'Delete User'),
    'footerConfirmOptions' => ['class' => 'btn btn-danger', 'id' => 'deleteUrl']
 ]) ?>
<p><?= t( 'Are you sure you want to delete this user?') ?></p>
<p><?= t( 'The user can register again using the same name but all previously created posts will not be linked back to him.') ?></p>
<p><strong><?= t( 'This action can not be undone.') ?></strong></p>
<?php Modal::end() ?>
<?php Modal::begin([
    'id' => 'podiumModalBan',
    'header' => t( 'Ban User'),
    'footer' => t( 'Ban User'),
    'footerConfirmOptions' => ['class' => 'btn btn-danger', 'id' => 'banUrl']
 ]) ?>
<p><?= t( 'Are you sure you want to ban this user?') ?></p>
<p><?= t( 'The user will not be deleted but will not be able to sign in again.') ?></p>
<p><strong><?= t( 'You can always unban the user if you change your mind later on.') ?></strong></p>
<?php Modal::end() ?>
<?php Modal::begin([
    'id' => 'podiumModalUnBan',
    'header' => t( 'Unban User'),
    'footer' => t( 'Unban User'),
    'footerConfirmOptions' => ['class' => 'btn btn-success', 'id' => 'unbanUrl']
 ]) ?>
<p><?= t( 'Are you sure you want to unban this user?') ?></p>
<p><?= t( 'The user will be able to sign in again.') ?></p>
<?php Modal::end();
